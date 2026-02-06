<?php

namespace App\Http\Controllers;

use App\DataTables\CaseStudyDataTable;
use App\Models\CaseStudy;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CaseStudyController extends Controller
{
    use UploadImageTrait;

    public function list(CaseStudyDataTable $dataTable)
    {
        return $dataTable->render('pages.case-studies.list');
    }

    public function create()
    {
        return view('pages.case-studies.create');
    }

    public function edit($id)
    {
        try {
            $data = CaseStudy::findOrFail($id);

            return view('pages.case-studies.create', compact('data'));
        } catch (\Throwable $e) {
            Log::error('Case Study Edit Error: '.$e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()
                ->route('admin.case-studies.list')
                ->with('error', 'Case study not found.');
        }
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Validate data
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'sub_title' => 'nullable|string',
                'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:300',
                'image_alt' => 'nullable|string|max:255',
                'description' => 'nullable|string',
                'document' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            ]);

            // Handle image upload using trait
            if ($request->hasFile('image')) {
                $validated['image'] = $this->uploadImage($request->file('image'), 'case_study');
            }

            if ($request->hasFile('document')) {
                $validated['document'] = $this->uploadImage($request->file('document'), 'case_study');
            }

            CaseStudy::create($validated);

            DB::commit();

            return redirect()
                ->route('admin.case-studies.list')
                ->with('success', 'Case study created successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();

            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Case Study Create Error: '.$e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return redirect()->back()
                ->with('error', 'Something went wrong. Please try again later.')
                ->withInput();
        }
    }

    public function update(Request $request, $id)
    {
        $caseStudy = CaseStudy::findOrFail($id);

        DB::beginTransaction();

        try {
            // Validate data
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'sub_title' => 'nullable|string',
                'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:300',
                'image_alt' => 'nullable|string|max:255',
                'description' => 'nullable|string',
            ]);

            // Handle image update using trait
            $validated['image'] = $this->updateImage($request, 'image', 'case_study', $caseStudy->image);

            $validated['document'] = $this->updateImage($request, 'document', 'case_study', $caseStudy->document);

            $caseStudy->update($validated);

            DB::commit();

            return redirect()
                ->route('admin.case-studies.list')
                ->with('success', 'Case study updated successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            DB::rollBack();

            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('Case Study Update Error: '.$e->getMessage(), [
                'id' => $id,
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return redirect()->back()
                ->with('error', 'Something went wrong while updating.')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        try {
            $caseStudy = CaseStudy::findOrFail($id);
            $caseStudy->delete();

            return redirect()
                ->route('admin.case-studies.list')
                ->with('success', 'Case study deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('Case Study Delete Error: '.$e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()
                ->route('admin.case-studies.list')
                ->with('error', 'Something went wrong while deleting the case study.');
        }
    }

    public function caseStudiesPage()
    {
        try {
            $caseStudies = CaseStudy::orderBy('created_at', 'desc')->paginate(15);

            $seoMeta = \App\Models\SeoMeta::where('page_name', 'case_study')
                ->where('is_active', 1)
                ->first();

            return view('frontend.pages.case-study', compact('caseStudies', 'seoMeta'));

        } catch (\Throwable $e) {

            // Log error for debugging
            Log::error('Case Studies Page Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            // Optional: empty collection so view doesn't break
            $caseStudies = collect();

            // Option 1: show page with no data + flash message
            return view('frontend.pages.case-study', compact('caseStudies'))
                ->with('error', 'Something went wrong. Please try again later.');

            // Option 2 (alternative): redirect back
            // return redirect()->back()->with('error', 'Unable to load case studies.');
        }
    }

    /**
     * List case study downloads
     */
    public function downloadsList(\App\DataTables\CaseStudyDownloadsDataTable $dataTable)
    {
        return $dataTable->render('pages.case-study-downloads.list');
    }

    /**
     * Show case study download details
     */
    public function showDownload($id)
    {
        try {
            $download = \App\Models\CaseStudyDownload::with('caseStudy')->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $download->id,
                    'name' => $download->name,
                    'email' => $download->email,
                    'phone_number' => $download->phone_number,
                    'location' => $download->location,
                    'case_study_title' => $download->caseStudy?->title ?? 'N/A',
                    'created_at' => \Carbon\Carbon::parse($download->created_at)->format('d-M-Y H:i'),
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Case Study Download Show Error: '.$e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Download record not found.',
            ], 404);
        }
    }

    /**
     * Delete case study download record
     */
    public function destroyDownload($id)
    {
        try {
            $download = \App\Models\CaseStudyDownload::findOrFail($id);
            $download->delete();

            return response()->json([
                'success' => true,
                'message' => 'Download record deleted successfully.',
            ]);
        } catch (\Exception $e) {
            Log::error('Case Study Download Delete Error: '.$e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Error deleting download record.',
            ], 500);
        }
    }

    /**
     * Download case study document
     */
    public function downloadCaseStudy(Request $request)
    {
        try {
            // Validation Rules
            $rules = [
                'case_study_id' => 'required|exists:case_studies,id',
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone_number' => 'required|string|max:50',
                'location' => 'required|string|max:255',
            ];

            $customMessages = [
                'case_study_id.required' => 'Case study ID is required',
                'case_study_id.exists' => 'Invalid case study',
                'name.required' => 'Name is required',
                'name.string' => 'Name must be a valid string',
                'name.max' => 'Name cannot exceed 255 characters',
                'email.required' => 'Email is required',
                'email.email' => 'Please enter a valid email address',
                'email.max' => 'Email cannot exceed 255 characters',
                'phone_number.required' => 'Phone number is required',
                'phone_number.string' => 'Phone number must be a valid string',
                'phone_number.max' => 'Phone number cannot exceed 50 characters',
                'location.required' => 'Location is required',
                'location.string' => 'Location must be a valid string',
                'location.max' => 'Location cannot exceed 255 characters',
            ];

            $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $customMessages);

            if ($validator->fails()) {
                Log::warning('Case study download validation failed', [
                    'errors' => $validator->errors()->toArray(),
                    'ip' => $request->ip(),
                    'email' => $request->input('email'),
                ]);

                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Get case study
            $caseStudy = CaseStudy::findOrFail($request->input('case_study_id'));

            // Check if document exists
            if (! $caseStudy->document) {
                Log::warning('Case study document not found', [
                    'case_study_id' => $caseStudy->id,
                    'ip' => $request->ip(),
                ]);

                return response()->json([
                    'errors' => ['general' => ['Document not available for download']],
                ], 404);
            }

            // Record download
            try {
                \App\Models\CaseStudyDownload::create([
                    'case_study_id' => $caseStudy->id,
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phone_number' => $request->input('phone_number'),
                    'location' => $request->input('location'),
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->userAgent(),
                ]);

                Log::info('Case study download recorded', [
                    'case_study_id' => $caseStudy->id,
                    'email' => $request->input('email'),
                    'ip' => $request->ip(),
                ]);
            } catch (\Exception $e) {
                Log::error('Error recording case study download', [
                    'error' => $e->getMessage(),
                    'case_study_id' => $caseStudy->id,
                ]);
                // Continue with download even if recording fails
            }

            // Return download URL
            return response()->json([
                'success' => true,
                'message' => 'Download starting...',
                'download_url' => asset('storage/case_study/'.$caseStudy->document),
            ]);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Please fix the errors below',
                'errors' => $e->errors(),
            ], 422);
        } catch (\Exception $e) {
            Log::error('Case study download error', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'ip' => $request->ip(),
            ]);

            return response()->json([
                'success' => false,
                'message' => 'An error occurred while processing your request. Please try again later.',
            ], 500);
        }
    }
}
