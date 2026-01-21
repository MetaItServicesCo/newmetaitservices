<?php

namespace App\Http\Controllers;

use App\DataTables\FaqsDataTable;
use App\Helpers\PageHelper;
use App\Models\Faq as ModelsFaq;
use App\Models\FaqLandingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class FaqController extends Controller
{

    public function index(FaqsDataTable $dataTable)
    {
        return $dataTable->render('pages.faqs.index');
    }

    // ===========================
    // CREATE FUNCTION
    // ===========================
    public function create()
    {
        try {
            $pages = PageHelper::labels();

            return view('pages.faqs.create', compact('pages'));
        } catch (\Exception $e) {
            Log::error('FAQ Create Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'user_id' => auth()->id(),
            ]);

            return redirect()->route('admin-faqs.index')
                ->withErrors(['general' => 'Something went wrong while loading the FAQ create page.']);
        }
    }

    // ===========================
    // STORE FUNCTION
    // ===========================
    public function store(Request $request)
    {
        // Validation rules
        $rules = [
            'page_name' => 'required|string',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ];

        $messages = [
            'page_name.required' => 'Please select a page.',
            'question.required' => 'The question field is required.',
            'answer.required' => 'The answer field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            // Validation failed, return errors
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Get validated data
        $validated = $validator->validated();

        try {
            DB::beginTransaction();

            $faq = new ModelsFaq;
            $faq->page_name = $validated['page_name']; // <-- use validated data
            $faq->question = $validated['question'];
            $faq->answer = $validated['answer'];
            $faq->created_by = Auth::id();
            $faq->save();

            DB::commit();

            return redirect()->route('admin-faqs.index')
                ->with('success', 'FAQ created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error for debugging
            Log::error(
                'FAQ Store Error',
                [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                    'user_id' => Auth::id(),
                    'input' => $request->all(),
                ]
            );

            // Return back with old input and error message
            return back()
                ->withInput()
                ->withErrors(['general' => 'Something went wrong: '.$e->getMessage()]);
        }
    }

    // ===========================
    // EDIT FUNCTION
    // ===========================
    public function edit($id)
    {
        try {
            $data = ModelsFaq::findOrFail($id);
            $pages = PageHelper::labels();

            return view('pages.faqs.create', compact('pages', 'data'));
        } catch (\Exception $e) {
            Log::error('FAQ Edit Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'user_id' => auth()->id(),
                'faq_id' => $id,
            ]);

            return redirect()->route('admin-faqs.index')
                ->withErrors(['general' => 'Something went wrong while loading the FAQ edit page.']);
        }
    }

    // ===========================
    // UPDATE FUNCTION
    // ===========================
    public function update(Request $request, $id)
    {
        $rules = [
            'page_name' => 'required|string',
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ];

        $messages = [
            'page_name.required' => 'Please select a page.',
            'question.required' => 'The question field is required.',
            'answer.required' => 'The answer field is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        try {
            DB::beginTransaction();

            $faq = ModelsFaq::findOrFail($id);
            $faq->page_name = $validated['page_name'];
            $faq->question = $validated['question'];
            $faq->answer = $validated['answer'];
            $faq->updated_by = Auth::id();
            $faq->save();

            DB::commit();

            return redirect()->route('admin-faqs.index')
                ->with('success', 'FAQ updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('FAQ Update Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'user_id' => Auth::id(),
                'faq_id' => $id,
                'input' => $request->all(),
            ]);

            return back()
                ->withInput()
                ->withErrors(['general' => 'Something went wrong: '.$e->getMessage()]);
        }
    }

    // ===========================
    // DESTROY FUNCTION (SOFT DELETE)
    // ===========================
    public function destroy($id)
    {
        try {
            DB::beginTransaction();

            $faq = ModelsFaq::findOrFail($id);
            $faq->delete(); // Soft delete

            DB::commit();

            return redirect()->route('admin-faqs.index')
                ->with('success', 'FAQ deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('FAQ Destroy Error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'user_id' => Auth::id(),
                'faq_id' => $id,
            ]);

            return redirect()->route('admin-faqs.index')
                ->withErrors(['general' => 'Something went wrong while deleting the FAQ.']);
        }
    }
}
