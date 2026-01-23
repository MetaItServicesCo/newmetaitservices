<?php

namespace App\Http\Controllers;

use App\DataTables\ServicesDataTable;
use App\DataTables\SubServicesDataTable;
use App\Models\Services;
use App\Models\SubService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ServicesController extends Controller
{
    // ===========================
    // Services
    // ===========================

    public function index(ServicesDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.services.index');
        } catch (Exception $e) {

            Log::error('Services index error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()
                ->back()
                ->with('error', 'Something went wrong while loading services list.');
        }
    }

    public function create()
    {
        try {
            return view('pages.services.create');
        } catch (Exception $e) {

            Log::error('Services create page error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()
                ->route('admin.services.list')
                ->with('error', 'Unable to open create service page.');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug',
            'short_description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_alt' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
            'engaging_content.section_one.heading' => 'required|string|max:255',
            'engaging_content.section_one.image.alt' => 'nullable|string|max:255',
            'engaging_content.section_one.points' => 'required|array|min:1',
            'engaging_content.section_one.points.*.title' => 'required|string|max:255',
            'engaging_content.section_one.points.*.sub_title' => 'required|string',
            'engaging_content.section_two.heading' => 'required|string|max:255',
            'engaging_content.section_two.description' => 'required|string',
            'engaging_content.section_two.image.alt' => 'nullable|string|max:255',
            'engaging_content.section_two.points' => 'required|array|min:1',
            'engaging_content.section_two.points.*.title' => 'required|string|max:255',
            'engaging_content.section_two.points.*.sub_title' => 'required|string',
            'section_one_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'section_two_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        try {
            $engagingContent = $request->input('engaging_content');

            // Handle section_one image
            if ($request->hasFile('section_one_image')) {
                $engagingContent['section_one']['image']['path'] = $request->file('section_one_image')->store('services', 'public');
            }

            // Handle section_two image
            if ($request->hasFile('section_two_image')) {
                $engagingContent['section_two']['image']['path'] = $request->file('section_two_image')->store('services', 'public');
            }

            // Handle thumbnail
            $thumbnailPath = null;
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('service/thumbnails', 'public');
            }

            Services::create([
                'title' => $request->title,
                'slug' => \Str::slug($request->slug),
                'short_description' => $request->short_description,
                'thumbnail' => $thumbnailPath,
                'thumbnail_alt' => $request->thumbnail_alt,
                'engaging_content' => $engagingContent,
                'is_active' => $request->is_active,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);

            return redirect()->route('admin.services.list')->with('success', 'Service created successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to create service: '.$e->getMessage());
        }
    }

    public function edit(Services $service)
    {
        try {
            return view('pages.services.create', compact('service'));
        } catch (Exception $e) {

            Log::error('Services edit page error', [
                'service_id' => $service->id ?? null,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()
                ->route('admin.services.list')
                ->with('error', 'Unable to open edit service page.');
        }
    }

    public function update(Request $request, Services $service)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug,'.$service->id,
            'short_description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail_alt' => 'nullable|string|max:255',
            'is_active' => 'required|boolean',
            'engaging_content.section_one.heading' => 'required|string|max:255',
            'engaging_content.section_one.image.alt' => 'nullable|string|max:255',
            'engaging_content.section_one.points' => 'required|array|min:1',
            'engaging_content.section_one.points.*.title' => 'required|string|max:255',
            'engaging_content.section_one.points.*.sub_title' => 'required|string',
            'engaging_content.section_two.heading' => 'required|string|max:255',
            'engaging_content.section_two.description' => 'required|string',
            'engaging_content.section_two.image.alt' => 'nullable|string|max:255',
            'engaging_content.section_two.points' => 'required|array|min:1',
            'engaging_content.section_two.points.*.title' => 'required|string|max:255',
            'engaging_content.section_two.points.*.sub_title' => 'required|string',
            'section_one_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'section_two_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        try {
            $engagingContent = $request->input('engaging_content');

            // Handle section_one image
            if ($request->hasFile('section_one_image')) {
                $engagingContent['section_one']['image']['path'] = $request->file('section_one_image')->store('services', 'public');
            } else {
                $engagingContent['section_one']['image'] = $service->engaging_content['section_one']['image'];
            }

            // Handle section_two image
            if ($request->hasFile('section_two_image')) {
                $engagingContent['section_two']['image']['path'] = $request->file('section_two_image')->store('services', 'public');
            } else {
                $engagingContent['section_two']['image'] = $service->engaging_content['section_two']['image'];
            }

            // Handle thumbnail
            $thumbnailPath = $service->thumbnail;
            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('service/thumbnails', 'public');
            }

            $service->update([
                'title' => $request->title,
                'slug' => \Str::slug($request->slug),
                'short_description' => $request->short_description,
                'thumbnail' => $thumbnailPath,
                'thumbnail_alt' => $request->thumbnail_alt,
                'engaging_content' => $engagingContent,
                'is_active' => $request->is_active,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);

            return redirect()->route('admin.services.list')->with('success', 'Service updated successfully.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to update service: '.$e->getMessage());
        }
    }

    public function destroy(Services $service)
    {
        try {
            $service->delete();

            return redirect()
                ->route('admin.services.list')
                ->with('success', 'Service deleted successfully.');
        } catch (Exception $e) {

            Log::error('Service delete failed', [
                'service_id' => $service->id,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()
                ->route('admin.services.list')
                ->with('error', 'Unable to delete service. Please try again later.');
        }
    }

    // ===========================
    // Sub Services
    // ===========================

    public function subServices(SubServicesDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.sub-services.index');
        } catch (Exception $e) {

            Log::error('Sub Services index error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()
                ->back()
                ->with('error', 'Something went wrong while loading sub-services list.');
        }
    }

    public function subServiceCreate()
    {
        try {
            $services = Services::where('is_active', true)->get();

            return view('pages.sub-services.create', compact('services'));
        } catch (Exception $e) {

            Log::error('Sub Services create page error', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()
                ->route('admin.sub-services.list')
                ->with('error', 'Unable to open create service page.');
        }
    }

    public function subServicestore(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:sub_services,slug',
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_description' => 'nullable|string',
            'main_points' => 'nullable|array',
            'main_points.*' => 'nullable|string',
            'is_active' => 'required|boolean',
            'show_on_services_page' => 'required|boolean',
            'show_on_landing_page' => 'required|boolean',
            // Hero Section
            'page_content.hero_section.main_heading' => 'required|string|max:255',
            'page_content.hero_section.short_description' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Campaign Section
            'page_content.campaign_section.title' => 'required|string|max:255',
            'page_content.campaign_section.points' => 'nullable|array',
            'page_content.campaign_section.points.*' => 'nullable|string',
            'campaign_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Development Process
            'page_content.development_process.title' => 'required|string|max:255',
            'page_content.development_process.steps' => 'nullable|array',
            'page_content.development_process.steps.*.title' => 'nullable|string|max:255',
            'page_content.development_process.steps.*.description' => 'nullable|string',
            // Commitments Section
            'page_content.commitments_section.title' => 'required|string|max:255',
            'page_content.commitments_section.description' => 'nullable|string',
            'page_content.commitments_section.points' => 'nullable|array',
            'page_content.commitments_section.points.*.title' => 'nullable|string|max:255',
            'page_content.commitments_section.points.*.sub_title' => 'nullable|string',
            'commitment_icons' => 'nullable|array',
            'commitment_icons.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Why Choose Section
            'page_content.why_choose_section.title' => 'required|string|max:255',
            'page_content.why_choose_section.points' => 'nullable|array',
            'page_content.why_choose_section.points.*.strong_text' => 'nullable|string|max:255',
            'page_content.why_choose_section.points.*.text' => 'nullable|string',
            // Meta fields
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        try {
            $pageContent = $request->input('page_content', []);

            // Handle hero image
            if ($request->hasFile('hero_image')) {
                $pageContent['hero_section']['image'] = $request->file('hero_image')->store('sub-services', 'public');
            }

            // Handle campaign image
            if ($request->hasFile('campaign_image')) {
                $pageContent['campaign_section']['image'] = $request->file('campaign_image')->store('sub-services', 'public');
            }

            // Handle commitment icons
            $commitmentIcons = [];
            if ($request->hasFile('commitment_icons')) {
                foreach ($request->file('commitment_icons') as $index => $file) {
                    if ($file) {
                        $commitmentIcons[$index] = $file->store('sub-services/commitments', 'public');
                    }
                }
            }
            $pageContent['commitments_section']['icons'] = $commitmentIcons;

            // Handle icon
            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('sub-services/icons', 'public');
            } else {
                $iconPath = null;
            }

            SubService::create([
                'service_id' => $request->service_id,
                'title' => $request->title,
                'slug' => \Str::slug($request->slug),
                'icon' => $iconPath,
                'short_description' => $request->short_description,
                'main_points' => $request->main_points,
                'page_content' => $pageContent,
                'is_active' => $request->is_active,
                'show_on_services_page' => $request->show_on_services_page,
                'show_on_landing_page' => $request->show_on_landing_page,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);

            return redirect()->route('admin.sub-services.list')->with('success', 'Sub-service created successfully.');
        } catch (\Exception $e) {
            Log::error('Sub Service creation failed', [
                'request_data' => $request->all(),
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return back()->withInput()->with('error', 'Failed to create sub-service: '.$e->getMessage());
        }
    }

    public function subServiceedit(SubService $subService)
    {
        $services = Services::where('is_active', true)->get();

        $data = $subService;

        return view('pages.sub-services.create', compact('data', 'services'));
    }

    public function subServiceupdate(Request $request, SubService $subService)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:sub_services,slug,'.$subService->id,
            'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'short_description' => 'nullable|string',
            'main_points' => 'nullable|array',
            'main_points.*' => 'nullable|string',
            'is_active' => 'required|boolean',
            'show_on_services_page' => 'required|boolean',
            'show_on_landing_page' => 'required|boolean',
            // Hero Section
            'page_content.hero_section.main_heading' => 'required|string|max:255',
            'page_content.hero_section.short_description' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Campaign Section
            'page_content.campaign_section.title' => 'required|string|max:255',
            'page_content.campaign_section.points' => 'nullable|array',
            'page_content.campaign_section.points.*' => 'nullable|string',
            'campaign_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Development Process
            'page_content.development_process.title' => 'required|string|max:255',
            'page_content.development_process.steps' => 'nullable|array',
            'page_content.development_process.steps.*.title' => 'nullable|string|max:255',
            'page_content.development_process.steps.*.description' => 'nullable|string',
            // Commitments Section
            'page_content.commitments_section.title' => 'required|string|max:255',
            'page_content.commitments_section.description' => 'nullable|string',
            'page_content.commitments_section.points' => 'nullable|array',
            'page_content.commitments_section.points.*.title' => 'nullable|string|max:255',
            'page_content.commitments_section.points.*.sub_title' => 'nullable|string',
            'commitment_icons' => 'nullable|array',
            'commitment_icons.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // Why Choose Section
            'page_content.why_choose_section.title' => 'required|string|max:255',
            'page_content.why_choose_section.points' => 'nullable|array',
            'page_content.why_choose_section.points.*.strong_text' => 'nullable|string|max:255',
            'page_content.why_choose_section.points.*.text' => 'nullable|string',
            // Meta fields
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        try {
            $pageContent = $request->input('page_content', []);

            // Handle hero image
            if ($request->hasFile('hero_image')) {
                $pageContent['hero_section']['image'] = $request->file('hero_image')->store('sub-services', 'public');
            } else {
                $pageContent['hero_section']['image'] = $subService->page_content['hero_section']['image'] ?? null;
            }

            // Handle campaign image
            if ($request->hasFile('campaign_image')) {
                $pageContent['campaign_section']['image'] = $request->file('campaign_image')->store('sub-services', 'public');
            } else {
                $pageContent['campaign_section']['image'] = $subService->page_content['campaign_section']['image'] ?? null;
            }

            // Handle commitment icons
            $commitmentIcons = $subService->page_content['commitments_section']['icons'] ?? [];
            if ($request->hasFile('commitment_icons')) {
                foreach ($request->file('commitment_icons') as $index => $file) {
                    if ($file) {
                        $commitmentIcons[$index] = $file->store('sub-services/commitments', 'public');
                    }
                }
            }
            $pageContent['commitments_section']['icons'] = $commitmentIcons;

            // Handle icon
            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('sub-services/icons', 'public');
            } else {
                $iconPath = $subService->icon;
            }

            $subService->update([
                'service_id' => $request->service_id,
                'title' => $request->title,
                'slug' => \Str::slug($request->slug),
                'icon' => $iconPath,
                'short_description' => $request->short_description,
                'main_points' => $request->main_points,
                'page_content' => $pageContent,
                'is_active' => $request->is_active,
                'show_on_services_page' => $request->show_on_services_page,
                'show_on_landing_page' => $request->show_on_landing_page,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);

            return redirect()->route('admin.sub-services.list')->with('success', 'Sub-service updated successfully.');
        } catch (\Exception $e) {
            Log::error('Sub Service update failed', [
                'sub_service_id' => $subService->id,
                'request_data' => $request->all(),
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return back()->withInput()->with('error', 'Failed to update sub-service: '.$e->getMessage());
        }
    }

    public function subServicedestroy(SubService $subService)
    {
        try {
            $subService->delete();

            return redirect()
                ->route('admin.sub-services.list')
                ->with('success', 'Sub-service deleted successfully.');
        } catch (Exception $e) {

            Log::error('Sub Service delete failed', [
                'sub_service_id' => $subService->id,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()
                ->route('admin.sub-services.list')
                ->with('error', 'Unable to delete sub-service. Please try again later.');
        }
    }

    // ===========================
    // Frontend Functions
    // ===========================

    public function services()
    {
        $subServices = SubService::select('title', 'slug', 'short_description', 'icon')->where('is_active', true)
            ->where('show_on_services_page', true)
            ->get();
        $seoMeta = \App\Models\SeoMeta::where('page_name', 'services')->where('is_active', 1)->first();

        return view('frontend.pages.services', compact('seoMeta', 'subServices'));
    }

    public function service($slug)
    {
        $service = Services::where('slug', $slug)->where('is_active', true)->firstOrFail();

        $subServices = SubService::select('title', 'slug', 'main_points', 'icon')->where('is_active', true)
            ->where('show_on_services_page', true)->where('service_id', $service->id)
            ->get();

        return view('frontend.pages.main-services', compact('service', 'subServices'));
    }

    public function subService($serviceSlug, $subServiceSlug)
    {
        $service = Services::where('slug', $serviceSlug)->where('is_active', true)->firstOrFail();

        $subService = SubService::where('slug', $subServiceSlug)
            ->where('is_active', true)
            ->where('service_id', $service->id)
            ->firstOrFail();

        return view('frontend.pages.subservices', compact('service', 'subService'));
    }
}
