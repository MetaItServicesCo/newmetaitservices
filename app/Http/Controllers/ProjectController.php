<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validation Rules
            $rules = [
                'selected_date' => 'required|date',
                'weekday' => 'required|string',
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:50',
                'company_name' => 'required|string|max:255',
                'website_url' => 'nullable|url|max:255',
                'message' => 'required|string',
                'g-recaptcha-response' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                Log::warning('Project request validation failed', [
                    'errors' => $validator->errors()->toArray(),
                    'ip' => $request->ip(),
                    'email' => $request->input('email'),
                ]);
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Verify reCAPTCHA
            try {
                $recaptchaSecret = config('services.recaptcha.secret');
                
                if (!$recaptchaSecret) {
                    Log::error('reCAPTCHA secret key not configured');
                    return response()->json([
                        'errors' => ['g-recaptcha-response' => ['Captcha configuration error']]
                    ], 422);
                }

                $recapResponse = Http::timeout(10)->asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => $recaptchaSecret,
                    'response' => $request->input('g-recaptcha-response'),
                    'remoteip' => $request->ip(),
                ]);

                $recapBody = $recapResponse->json();

                if (!isset($recapBody['success']) || $recapBody['success'] !== true) {
                    Log::warning('reCAPTCHA verification failed', [
                        'response' => $recapBody,
                        'ip' => $request->ip(),
                        'email' => $request->input('email'),
                    ]);
                    return response()->json([
                        'errors' => ['g-recaptcha-response' => ['Captcha verification failed. Please try again.']]
                    ], 422);
                }
            } catch (Exception $e) {
                Log::error('reCAPTCHA verification error', [
                    'message' => $e->getMessage(),
                    'ip' => $request->ip(),
                    'email' => $request->input('email'),
                ]);
                return response()->json([
                    'errors' => ['g-recaptcha-response' => ['Unable to verify captcha. Please try again.']]
                ], 422);
            }

            // Parse and validate date
            try {
                $selectedDate = $request->input('selected_date');
                $dt = \Carbon\Carbon::parse($selectedDate)->format('Y-m-d');
            } catch (Exception $e) {
                Log::error('Date parsing error', [
                    'selected_date' => $request->input('selected_date'),
                    'error' => $e->getMessage(),
                ]);
                return response()->json([
                    'errors' => ['selected_date' => ['Invalid date format']]
                ], 422);
            }

            // Insert into Database
            try {
                $id = DB::table('project_requests')->insertGetId([
                    'selected_date' => $dt,
                    'weekday' => $request->input('weekday'),
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'email' => $request->input('email'),
                    'phone' => $request->input('phone'),
                    'company_name' => $request->input('company_name'),
                    'website_url' => $request->input('website_url'),
                    'message' => $request->input('message'),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                Log::info('Project request submitted successfully', [
                    'id' => $id,
                    'email' => $request->input('email'),
                    'date' => $dt,
                    'ip' => $request->ip(),
                ]);

                return response()->json([
                    'success' => true,
                    'id' => $id,
                    'message' => 'Thank you for your request. We will contact you soon.'
                ]);

            } catch (Exception $e) {
                Log::error('Database insertion error - Project Request', [
                    'error' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'trace' => $e->getTraceAsString(),
                    'email' => $request->input('email'),
                    'ip' => $request->ip(),
                ]);

                return response()->json([
                    'errors' => ['general' => ['An error occurred while saving your request. Please try again later.']]
                ], 500);
            }

        } catch (Exception $e) {
            Log::critical('Unexpected error in project submission', [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->except(['g-recaptcha-response']),
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'errors' => ['general' => ['An unexpected error occurred. Please try again later.']]
            ], 500);
        }
    }

    public function questionSubmit(Request $request)
    {
        try {
            $rules = [
                'name' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'message' => 'required|string',
                'agree' => 'nullable|in:0,1',
                'g-recaptcha-response' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                Log::warning('Question form validation failed', [
                    'errors' => $validator->errors()->toArray(),
                    'ip' => $request->ip(),
                    'email' => $request->input('email'),
                ]);
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // verify reCAPTCHA
            try {
                $recaptchaSecret = config('services.recaptcha.secret');
                if (!$recaptchaSecret) {
                    Log::error('reCAPTCHA secret key not configured for question form');
                    return response()->json(['errors' => ['g-recaptcha-response' => ['Captcha configuration error']]] , 422);
                }

                $recapResponse = Http::timeout(10)->asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => $recaptchaSecret,
                    'response' => $request->input('g-recaptcha-response'),
                    'remoteip' => $request->ip(),
                ]);

                $recapBody = $recapResponse->json();
                if (!isset($recapBody['success']) || $recapBody['success'] !== true) {
                    Log::warning('Question form reCAPTCHA failed', ['response' => $recapBody]);
                    return response()->json(['errors' => ['g-recaptcha-response' => ['Captcha verification failed. Please try again.']]] , 422);
                }
            } catch (Exception $e) {
                Log::error('reCAPTCHA error (question form)', ['message' => $e->getMessage()]);
                return response()->json(['errors' => ['g-recaptcha-response' => ['Unable to verify captcha. Please try again.']]] , 422);
            }

            // Insert into DB (assumes migration exists for `questions` table)
            try {
                $id = DB::table('questions')->insertGetId([
                    'name' => $request->input('name'),
                    'country' => $request->input('country'),
                    'email' => $request->input('email'),
                    'message' => $request->input('message'),
                    'agree' => $request->input('agree', 0) == '1' ? true : false,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                Log::info('Question submitted', ['id' => $id, 'email' => $request->input('email'), 'ip' => $request->ip()]);

                return response()->json(['success' => true, 'id' => $id, 'message' => 'Thanks — we received your question.'] );
            } catch (Exception $e) {
                Log::error('Database insertion error - Question', ['error' => $e->getMessage()]);
                return response()->json(['errors' => ['general' => ['An error occurred while saving your question. Please try again later.']]] , 500);
            }

        } catch (Exception $e) {
            Log::critical('Unexpected error in question submission', ['error' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return response()->json(['errors' => ['general' => ['An unexpected error occurred. Please try again later.']]] , 500);
        }
    }

    /**
     * Subscribe to newsletter
     */
    public function subscribeNewsletter(Request $request)
    {
        try {
            // Validate email
            $validated = $request->validate([
                'email' => 'required|email|max:255',
            ], [
                'email.required' => 'Email is required',
                'email.email' => 'Please enter a valid email address',
            ]);

            // Check if already subscribed
            $newsletter = \App\Models\Newsletter::where('email', $validated['email'])->first();

            if ($newsletter && $newsletter->is_subscribed) {
                return response()->json([
                    'success' => false,
                    'message' => 'This email is already subscribed to our newsletter',
                    'errors' => ['email' => ['This email is already subscribed']],
                ], 422);
            }

            // Subscribe or resubscribe
            \App\Models\Newsletter::subscribe(
                $validated['email'],
                $request->ip(),
                $request->userAgent()
            );

            Log::info('Newsletter subscription', [
                'email' => $validated['email'],
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Thank you for subscribing.',
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Please fix the errors below',
                'errors' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            Log::error('Newsletter subscription error', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while subscribing. Please try again later.',
            ], 500);
        }
    }


    /**
     * Submit contact form
     */
    public function submitContact(Request $request)
    {
        try {
            // Validation Rules
            $rules = [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone_number' => 'required|string|max:50',
                'company_name' => 'nullable|string|max:255',
                'company_url' => 'nullable|url|max:255',
                'message' => 'required|string|min:10|max:5000',
                'g-recaptcha-response' => 'required',
            ];

            $customMessages = [
                'first_name.required' => 'First name is required',
                'first_name.string' => 'First name must be a valid string',
                'first_name.max' => 'First name cannot exceed 255 characters',
                'last_name.required' => 'Last name is required',
                'last_name.string' => 'Last name must be a valid string',
                'last_name.max' => 'Last name cannot exceed 255 characters',
                'email.required' => 'Email is required',
                'email.email' => 'Please enter a valid email address',
                'email.max' => 'Email cannot exceed 255 characters',
                'phone_number.required' => 'Phone number is required',
                'phone_number.string' => 'Phone number must be a valid string',
                'phone_number.max' => 'Phone number cannot exceed 50 characters',
                'company_name.required' => 'Company name is required',
                'company_name.string' => 'Company name must be a valid string',
                'company_name.max' => 'Company name cannot exceed 255 characters',
                'company_url.url' => 'Please enter a valid company URL (e.g., https://example.com)',
                'company_url.max' => 'Company URL cannot exceed 255 characters',
                'message.required' => 'Message is required',
                'message.string' => 'Message must be a valid string',
                'message.min' => 'Message must be at least 10 characters',
                'message.max' => 'Message cannot exceed 5000 characters',
                'g-recaptcha-response.required' => 'Please verify the reCAPTCHA',
            ];

            $validator = Validator::make($request->all(), $rules, $customMessages);

            if ($validator->fails()) {
                Log::warning('Contact form validation failed', [
                    'errors' => $validator->errors()->toArray(),
                    'ip' => $request->ip(),
                    'email' => $request->input('email'),
                ]);
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Verify reCAPTCHA
            try {
                $recaptchaSecret = config('services.recaptcha.secret');
                
                if (!$recaptchaSecret) {
                    Log::error('reCAPTCHA secret key not configured');
                    return response()->json([
                        'errors' => ['g-recaptcha-response' => ['Captcha configuration error']]
                    ], 422);
                }

                $recapResponse = Http::timeout(10)->asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                    'secret' => $recaptchaSecret,
                    'response' => $request->input('g-recaptcha-response'),
                    'remoteip' => $request->ip(),
                ]);

                $recapBody = $recapResponse->json();

                if (!isset($recapBody['success']) || $recapBody['success'] !== true) {
                    Log::warning('reCAPTCHA verification failed', [
                        'response' => $recapBody,
                        'ip' => $request->ip(),
                        'email' => $request->input('email'),
                    ]);
                    return response()->json([
                        'errors' => ['g-recaptcha-response' => ['Captcha verification failed. Please try again.']]
                    ], 422);
                }
            } catch (Exception $e) {
                Log::error('reCAPTCHA verification error', [
                    'message' => $e->getMessage(),
                    'ip' => $request->ip(),
                    'email' => $request->input('email'),
                ]);
                return response()->json([
                    'errors' => ['g-recaptcha-response' => ['Unable to verify captcha. Please try again.']]
                ], 422);
            }

            // Insert into Database
            try {
                $id = \App\Models\ContactInquiry::create([
                    'first_name' => $request->input('first_name'),
                    'last_name' => $request->input('last_name'),
                    'email' => $request->input('email'),
                    'phone_number' => $request->input('phone_number'),
                    'company_name' => $request->input('company_name'),
                    'company_url' => $request->input('company_url') ?: null,
                    'message' => $request->input('message'),
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ])->id;

                Log::info('Contact inquiry submitted successfully', [
                    'id' => $id,
                    'email' => $request->input('email'),
                    'ip' => $request->ip(),
                ]);

                return response()->json([
                    'success' => true,
                    'id' => $id,
                    'message' => 'Thank you for contacting us! We will get back to you soon.'
                ]);

            } catch (Exception $e) {
                Log::error('Database insertion error - Contact Inquiry', [
                    'error' => $e->getMessage(),
                    'code' => $e->getCode(),
                    'trace' => $e->getTraceAsString(),
                    'email' => $request->input('email'),
                    'ip' => $request->ip(),
                ]);

                return response()->json([
                    'errors' => ['general' => ['An error occurred while saving your inquiry. Please try again later.']]
                ], 500);
            }

        } catch (Exception $e) {
            Log::critical('Unexpected error in contact submission', [
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->except(['g-recaptcha-response']),
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'errors' => ['general' => ['An unexpected error occurred. Please try again later.']]
            ], 500);
        }
    }
}
