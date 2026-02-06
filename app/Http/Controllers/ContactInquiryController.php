<?php

namespace App\Http\Controllers;

use App\DataTables\ContactInquiriesDataTable;
use App\Models\ContactInquiry;
use Illuminate\Support\Facades\Log;

class ContactInquiryController extends Controller
{
    /**
     * List all contact inquiries
     */
    public function index(ContactInquiriesDataTable $dataTable)
    {
        return $dataTable->render('pages.contact-inquiries.list');
    }

    /**
     * Show contact inquiry details
     */
    public function show($id)
    {
        try {
            $inquiry = ContactInquiry::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $inquiry->id,
                    'first_name' => $inquiry->first_name,
                    'last_name' => $inquiry->last_name,
                    'email' => $inquiry->email,
                    'phone_number' => $inquiry->phone_number,
                    'company_name' => $inquiry->company_name,
                    'company_url' => $inquiry->company_url,
                    'message' => $inquiry->message,
                    'created_at' => \Carbon\Carbon::parse($inquiry->created_at)->format('d-M-Y H:i'),
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Contact Inquiry Show Error: '.$e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Inquiry not found.',
            ], 404);
        }
    }

    /**
     * Delete contact inquiry
     */
    public function destroy($id)
    {
        try {
            $inquiry = ContactInquiry::findOrFail($id);
            $inquiry->delete();

            return response()->json([
                'success' => true,
                'message' => 'Inquiry deleted successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Contact Inquiry Delete Error: '.$e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error deleting inquiry.',
            ], 500);
        }
    }
}
