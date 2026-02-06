<?php

namespace App\Http\Controllers;

use App\DataTables\ServiceInquiriesDataTable;
use App\Models\ServiceInquiry;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

class ServiceInquiryController extends Controller
{
    /**
     * Store service inquiry from frontend form
     */
    public function store(Request $request)
    {
        try {
            // Validate reCAPTCHA first
            $recaptchaResponse = $request->input('g-recaptcha-response');
            if (!$recaptchaResponse) {
                return response()->json([
                    'success' => false,
                    'message' => 'Please verify the reCAPTCHA',
                    'errors' => ['captcha' => ['Please verify the reCAPTCHA']],
                ], 422);
            }

            // Verify reCAPTCHA with Google
            $recaptchaSecret = config('services.recaptcha.secret');
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $recaptchaSecret,
                'response' => $recaptchaResponse,
            ]);

            $recaptchaData = $response->json();

            // Check if reCAPTCHA verification was successful
            // Handle both v2 (checkbox) and v3 (score-based)
            $isRecaptchaValid = false;
            
            if (isset($recaptchaData['success']) && $recaptchaData['success']) {
                // For v3, check score (if present)
                if (isset($recaptchaData['score'])) {
                    $isRecaptchaValid = $recaptchaData['score'] >= 0.5;
                } else {
                    // For v2, just check success flag
                    $isRecaptchaValid = true;
                }
            }

            if (!$isRecaptchaValid) {
                return response()->json([
                    'success' => false,
                    'message' => 'reCAPTCHA verification failed',
                    'errors' => ['captcha' => ['reCAPTCHA verification failed. Please try again.']],
                ], 422);
            }

            // Validate form data
            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'country_code' => 'required|string|max:10',
                'phone_number' => 'required|string|max:20',
                'has_website' => 'required|in:yes,no',
                'services' => 'required|array|min:1',
                'services.*' => 'required|integer|exists:services,id',
                'message' => 'required|string|min:10|max:5000',
            ], [
                'first_name.required' => 'First name is required',
                'last_name.required' => 'Last name is required',
                'email.required' => 'Email is required',
                'email.email' => 'Please enter a valid email',
                'phone_number.required' => 'Phone number is required',
                'services.required' => 'Please select at least one service',
                'services.min' => 'Please select at least one service',
                'message.required' => 'Message is required',
                'message.min' => 'Message must be at least 10 characters',
            ]);

            DB::beginTransaction();

            try {
                // Create service inquiry
                $inquiry = ServiceInquiry::create([
                    'first_name' => $validated['first_name'],
                    'last_name' => $validated['last_name'],
                    'email' => $validated['email'],
                    'country_code' => $validated['country_code'],
                    'phone_number' => $validated['phone_number'],
                    'has_website' => $validated['has_website'] === 'yes',
                    'services' => $validated['services'],
                    'message' => $validated['message'],
                    'status' => 'pending',
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);

                DB::commit();

                // Log successful submission
                Log::info('Service inquiry submitted', [
                    'inquiry_id' => $inquiry->id,
                    'email' => $inquiry->email,
                    'ip_address' => $inquiry->ip_address,
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Thank you! Your inquiry has been submitted successfully. We will contact you soon.',
                ], 200);
            } catch (\Exception $e) {
                DB::rollBack();

                Log::error('Service inquiry creation failed', [
                    'error' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ]);

                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred while submitting your inquiry. Please try again.',
                ], 500);
            }
        } catch (ValidationException $e) {
            // Return validation errors
            return response()->json([
                'success' => false,
                'message' => 'Please fix the errors below',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Service inquiry error', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again later.',
            ], 500);
        }
    }

    /**
     * Get all inquiries (admin)
     */
    public function index(ServiceInquiriesDataTable $dataTable)
    {
        return $dataTable->render('pages.service-inquiries.list');
    }

    /**
     * Show single inquiry
     */
    public function show($id)
    {
        try {
            $inquiry = ServiceInquiry::findOrFail($id);

            // Get service names
            $serviceIds = is_array($inquiry->services) ? $inquiry->services : json_decode($inquiry->services, true);
            $services = Services::whereIn('id', $serviceIds ?? [])->pluck('title')->toArray();

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $inquiry->id,
                    'first_name' => $inquiry->first_name,
                    'last_name' => $inquiry->last_name,
                    'email' => $inquiry->email,
                    'phone' => $inquiry->country_code . ' ' . $inquiry->phone_number,
                    'country_code' => $inquiry->country_code,
                    'has_website' => $inquiry->has_website ? 'Yes' : 'No',
                    'services' => implode(', ', $services),
                    'message' => $inquiry->message,
                    'status' => ucfirst($inquiry->status),
                    'created_at' => $inquiry->created_at->format('d-M-Y H:i'),
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Service inquiry show error', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Unable to load inquiry',
            ], 404);
        }
    }

    /**
     * Delete inquiry
     */
    public function destroy($id)
    {
        try {
            $inquiry = ServiceInquiry::findOrFail($id);
            $inquiry->delete();

            return response()->json([
                'success' => true,
                'message' => 'Inquiry deleted successfully',
            ]);
        } catch (\Exception $e) {
            Log::error('Service inquiry delete error', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Unable to delete inquiry',
            ], 500);
        }
    }

    /**
     * Update inquiry status
     */
    public function updateStatus($id)
    {
        try {
            $inquiry = ServiceInquiry::findOrFail($id);
            $status = request()->input('status');

            // Validate status
            $validStatuses = ['pending', 'reviewed', 'contacted'];
            if (!in_array($status, $validStatuses)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid status',
                ], 422);
            }

            $inquiry->update(['status' => $status]);

            Log::info('Service inquiry status updated', [
                'inquiry_id' => $inquiry->id,
                'status' => $status,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Status updated to ' . ucfirst($status),
            ]);
        } catch (\Exception $e) {
            Log::error('Service inquiry status update error', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Unable to update status',
            ], 500);
        }
    }
}
