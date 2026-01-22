<?php

namespace App\Http\Controllers;

use App\DataTables\SeoMetaDataTable;
use App\Helpers\pageHelper;
use App\Models\SeoMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SeoMetaController extends Controller
{
    public function index(SeoMetaDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.seo-meta.index');
        } catch (\Throwable $e) {
            Log::error('SEO Meta Index Error: '.$e->getMessage());

            return redirect()->back()->with('error', 'Unable to load SEO meta list.');
        }
    }

    public function create()
    {
        try {
            $pages = pageHelper::labels();

            return view('pages.seo-meta.create', compact('pages'));
        } catch (\Throwable $e) {
            Log::error('SEO Meta Create Page Error: '.$e->getMessage());

            return redirect()->back()->with('error', 'Unable to open create page.');
        }
    }

    public function store(Request $request)
    {
        $rules = [
            'page_name' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:1000',
            'is_active' => 'nullable|boolean',
        ];

        $customMessages = [
            'page_name.required' => 'Please select a page.',
            'meta_title.required' => 'Meta title is required.',
        ];

        // Validation errors → auto redirect back → show under inputs
        $request->validate($rules, $customMessages);

        try {
            DB::beginTransaction();

            SeoMeta::create([
                'page_name' => $request->page_name,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
                'is_active' => $request->is_active ?? 0,
            ]);

            DB::commit();

            return redirect()
                ->route('admin-seo-meta.list')
                ->with('success', 'SEO meta data created successfully!');

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('SEO Meta Store Error: '.$e->getMessage());

            // Check for duplicate entry error
            if ($e instanceof \Illuminate\Database\QueryException && $e->getCode() == '23000') {
                return back()
                    ->withInput()
                    ->with('error', 'This page already has SEO meta data. Please choose a different page.');
            }

            return back()
                ->withInput()
                ->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function edit($id)
    {
        try {
            $seo = SeoMeta::findOrFail($id);
            $pages = pageHelper::labels();

            return view('pages.seo-meta.create', compact('seo', 'pages'));
        } catch (\Throwable $e) {
            Log::error('SEO Meta Edit Page Error: '.$e->getMessage());

            return redirect()->back()->with('error', 'Unable to open edit page.');
        }
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'page_name' => 'required|string|max:255',
            'meta_title' => 'required|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string|max:1000',
            'is_active' => 'nullable|boolean',
        ];

        $customMessages = [
            'page_name.required' => 'Please select a page.',
            'meta_title.required' => 'Meta title is required.',
        ];

        // Validation errors → auto redirect back → show under inputs
        $request->validate($rules, $customMessages);

        try {
            DB::beginTransaction();

            $seo = SeoMeta::findOrFail($id);

            $seo->update([
                'page_name' => $request->page_name,
                'meta_title' => $request->meta_title,
                'meta_description' => $request->meta_description,
                'meta_keywords' => $request->meta_keywords,
                'is_active' => $request->is_active ?? 0,
            ]);

            DB::commit();

            return redirect()
                ->route('admin-seo-meta.list')
                ->with('success', 'SEO meta data updated successfully!');

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error('SEO Meta Update Error: '.$e->getMessage());

            // Check for duplicate entry error
            if ($e instanceof \Illuminate\Database\QueryException && $e->getCode() == '23000') {
                return back()
                    ->withInput()
                    ->with('error', 'This page already has SEO meta data. Please choose a different page.');
            }

            // NO manual field-level errors
            return back()
                ->withInput()
                ->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function destroy($id)
    {
        try {
            $seo = SeoMeta::findOrFail($id);
            $seo->delete();

            return redirect()->route('admin-seo-meta.list')
                ->with('success', 'SEO meta data deleted successfully!');
        } catch (\Throwable $e) {
            Log::error('SEO Meta Delete Error: '.$e->getMessage());

            return back()->withErrors(['error' => 'Unable to delete SEO meta data.']);
        }
    }
}
