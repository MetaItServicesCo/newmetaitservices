<?php

namespace App\Http\Controllers;

use App\DataTables\IndustryDataTable;
use App\Models\Industry;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IndustryController extends Controller
{
    public function index(IndustryDataTable $dataTable)
    {
        return $dataTable->render('pages.industries.index');
    }

    public function create()
    {
        return view('pages.industries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:industries,slug',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'sub_details' => 'nullable|array',

            // Meta fields
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        try {
            // Handle main image
            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('industries', 'public');
            }

            // Get sub_details from request
            $subDetails = $request->input('sub_details', []);

            // Handle hero slider images
            if (isset($subDetails['hero_slider']) && is_array($subDetails['hero_slider'])) {
                foreach ($subDetails['hero_slider'] as $index => &$slide) {
                    // Handle hero slider main image
                    if ($request->hasFile("hero_slider_image.{$index}")) {
                        $slide['image'] = $request->file("hero_slider_image.{$index}")->store('industries/hero-slider', 'public');
                    }

                    // Handle hero slider gallery images
                    if ($request->hasFile("hero_slider_gallery.{$index}")) {
                        $galleryImages = [];
                        foreach ($request->file("hero_slider_gallery.{$index}") as $galleryFile) {
                            if ($galleryFile) {
                                $galleryImages[] = $galleryFile->store('industries/hero-slider/gallery', 'public');
                            }
                        }
                        // Merge with existing gallery images if any
                        $existingGallery = $slide['gallery_images'] ?? [];
                        $slide['gallery_images'] = array_merge($existingGallery, $galleryImages);
                    }
                }
            }

            // Handle detail accordion section image
            // Initialize detail_accordion_section if it doesn't exist
            if (! isset($subDetails['detail_accordion_section'])) {
                $subDetails['detail_accordion_section'] = [];
            }

            // Handle accordion section image upload
            // Check for file in nested structure
            $accordionImageFile = null;
            if ($request->hasFile('sub_details.detail_accordion_section.image')) {
                $accordionImageFile = $request->file('sub_details.detail_accordion_section.image');
            } elseif (isset($request->allFiles()['sub_details']['detail_accordion_section']['image'])) {
                $accordionImageFile = $request->allFiles()['sub_details']['detail_accordion_section']['image'];
            }

            if ($accordionImageFile) {
                $subDetails['detail_accordion_section']['image'] = $accordionImageFile->store('industries/accordion', 'public');
            } elseif (isset($subDetails['detail_accordion_section']['image']) && ! empty($subDetails['detail_accordion_section']['image'])) {
                // Keep existing value from hidden input (if editing)
                // Value is already set from form's hidden input
            } else {
                // Set empty if no file and no existing value
                $subDetails['detail_accordion_section']['image'] = '';
            }

            // Handle experience section images
            // Initialize detail_experience_section if it doesn't exist
            if (! isset($subDetails['detail_experience_section'])) {
                $subDetails['detail_experience_section'] = [];
            }
            if (! isset($subDetails['detail_experience_section']['images'])) {
                $subDetails['detail_experience_section']['images'] = [];
            }

            // Handle experience images (4 images)
            for ($i = 0; $i < 4; $i++) {
                if ($request->hasFile("experience_images.{$i}")) {
                    // New file uploaded, store it
                    $subDetails['detail_experience_section']['images'][$i] = $request->file("experience_images.{$i}")->store('industries/experience', 'public');
                } else {
                    // No file uploaded - check if hidden input has value (from form), otherwise set empty
                    $hiddenValue = $subDetails['detail_experience_section']['images'][$i] ?? '';
                    $subDetails['detail_experience_section']['images'][$i] = ! empty($hiddenValue) ? $hiddenValue : '';
                }
            }

            Industry::create([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'description' => $request->description,
                'image' => $imagePath,
                'image_alt' => $request->image_alt,
                'sub_details' => $subDetails,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,

            ]);

            return redirect()->route('admin.industries.list')->with('success', 'Industry created successfully.');
        } catch (Exception $e) {
            Log::error('Industry creation failed', [
                'request_data' => $request->all(),
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return back()->withInput()->with('error', 'Failed to create industry: '.$e->getMessage());
        }
    }

    public function edit(Industry $industry)
    {
        return view('pages.industries.create', compact('industry'));
    }

    public function update(Request $request, Industry $industry)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:industries,slug,'.$industry->id,
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_alt' => 'nullable|string|max:255',
            'sub_details' => 'nullable|array',
            // Meta fields
            'meta_title' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string',
            'meta_description' => 'nullable|string',
        ]);

        try {
            // Handle main image
            $imagePath = $industry->image;
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                    Storage::disk('public')->delete($imagePath);
                }
                $imagePath = $request->file('image')->store('industries', 'public');
            }

            // Get sub_details from request
            $subDetails = $request->input('sub_details', []);
            $existingSubDetails = $industry->sub_details ?? [];

            // Handle hero slider images
            if (isset($subDetails['hero_slider']) && is_array($subDetails['hero_slider'])) {
                foreach ($subDetails['hero_slider'] as $index => &$slide) {
                    // Handle hero slider main image
                    if ($request->hasFile("hero_slider_image.{$index}")) {
                        // Delete old image if exists
                        if (isset($slide['image']) && $slide['image'] && Storage::disk('public')->exists($slide['image'])) {
                            Storage::disk('public')->delete($slide['image']);
                        }
                        $slide['image'] = $request->file("hero_slider_image.{$index}")->store('industries/hero-slider', 'public');
                    } elseif (isset($existingSubDetails['hero_slider'][$index]['image'])) {
                        // Keep existing image if no new file uploaded
                        $slide['image'] = $existingSubDetails['hero_slider'][$index]['image'];
                    }

                    // Handle hero slider gallery images
                    if ($request->hasFile("hero_slider_gallery.{$index}")) {
                        $galleryImages = [];
                        // Keep existing gallery images
                        if (isset($existingSubDetails['hero_slider'][$index]['gallery_images'])) {
                            $galleryImages = $existingSubDetails['hero_slider'][$index]['gallery_images'];
                        }
                        // Add new gallery images
                        foreach ($request->file("hero_slider_gallery.{$index}") as $galleryFile) {
                            if ($galleryFile) {
                                $galleryImages[] = $galleryFile->store('industries/hero-slider/gallery', 'public');
                            }
                        }
                        $slide['gallery_images'] = $galleryImages;
                    } elseif (isset($existingSubDetails['hero_slider'][$index]['gallery_images'])) {
                        // Keep existing gallery images if no new files uploaded
                        $slide['gallery_images'] = $existingSubDetails['hero_slider'][$index]['gallery_images'];
                    }
                }
            }

            // Handle detail accordion section image
            // Initialize detail_accordion_section if it doesn't exist
            if (! isset($subDetails['detail_accordion_section'])) {
                $subDetails['detail_accordion_section'] = [];
            }

            $existingAccordionImage = $existingSubDetails['detail_accordion_section']['image'] ?? null;

            // Handle accordion section image upload
            // Check for file in nested structure
            $accordionImageFile = null;
            if ($request->hasFile('sub_details.detail_accordion_section.image')) {
                $accordionImageFile = $request->file('sub_details.detail_accordion_section.image');
            } elseif (isset($request->allFiles()['sub_details']['detail_accordion_section']['image'])) {
                $accordionImageFile = $request->allFiles()['sub_details']['detail_accordion_section']['image'];
            }

            if ($accordionImageFile) {
                // Delete old image if exists
                if ($existingAccordionImage && Storage::disk('public')->exists($existingAccordionImage)) {
                    Storage::disk('public')->delete($existingAccordionImage);
                }
                $subDetails['detail_accordion_section']['image'] = $accordionImageFile->store('industries/accordion', 'public');
            } elseif (isset($subDetails['detail_accordion_section']['image']) && ! empty($subDetails['detail_accordion_section']['image'])) {
                // Keep value from hidden input (existing image path)
                // This is already set from the form's hidden input
            } elseif ($existingAccordionImage) {
                // Keep existing image if no new file uploaded and no hidden input
                $subDetails['detail_accordion_section']['image'] = $existingAccordionImage;
            } else {
                // Set empty string if no file and no existing value
                $subDetails['detail_accordion_section']['image'] = '';
            }

            // Handle experience section images
            // Initialize detail_experience_section if it doesn't exist
            if (! isset($subDetails['detail_experience_section'])) {
                $subDetails['detail_experience_section'] = [];
            }
            if (! isset($subDetails['detail_experience_section']['images'])) {
                $subDetails['detail_experience_section']['images'] = [];
            }

            $existingExperienceImages = $existingSubDetails['detail_experience_section']['images'] ?? [];

            // Handle experience images (4 images)
            for ($i = 0; $i < 4; $i++) {
                if ($request->hasFile("experience_images.{$i}")) {
                    // Delete old image if exists
                    if (isset($existingExperienceImages[$i]) && $existingExperienceImages[$i] && Storage::disk('public')->exists($existingExperienceImages[$i])) {
                        Storage::disk('public')->delete($existingExperienceImages[$i]);
                    }
                    $subDetails['detail_experience_section']['images'][$i] = $request->file("experience_images.{$i}")->store('industries/experience', 'public');
                } elseif (isset($subDetails['detail_experience_section']['images'][$i]) && ! empty($subDetails['detail_experience_section']['images'][$i])) {
                    // Keep value from hidden input (existing image path)
                    // This is already set from the form's hidden input
                } elseif (isset($existingExperienceImages[$i])) {
                    // Keep existing image if no new file uploaded and no hidden input
                    $subDetails['detail_experience_section']['images'][$i] = $existingExperienceImages[$i];
                } else {
                    // Set empty string if no file and no existing value
                    $subDetails['detail_experience_section']['images'][$i] = '';
                }
            }

            $industry->update([
                'name' => $request->name,
                'slug' => Str::slug($request->slug),
                'description' => $request->description,
                'image' => $imagePath,
                'image_alt' => $request->image_alt,
                'sub_details' => $subDetails,
                'meta_title' => $request->meta_title,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);

            return redirect()->route('admin.industries.list')->with('success', 'Industry updated successfully.');
        } catch (Exception $e) {
            Log::error('Industry update failed', [
                'industry_id' => $industry->id,
                'request_data' => $request->all(),
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return back()->withInput()->with('error', 'Failed to update industry: '.$e->getMessage());
        }
    }

    public function destroy(Industry $industry)
    {
        try {
            // Delete main image
            if ($industry->image && Storage::disk('public')->exists($industry->image)) {
                Storage::disk('public')->delete($industry->image);
            }

            // Delete hero slider images
            if (isset($industry->sub_details['hero_slider']) && is_array($industry->sub_details['hero_slider'])) {
                foreach ($industry->sub_details['hero_slider'] as $slide) {
                    if (isset($slide['image']) && Storage::disk('public')->exists($slide['image'])) {
                        Storage::disk('public')->delete($slide['image']);
                    }
                    if (isset($slide['gallery_images']) && is_array($slide['gallery_images'])) {
                        foreach ($slide['gallery_images'] as $galleryImage) {
                            if (Storage::disk('public')->exists($galleryImage)) {
                                Storage::disk('public')->delete($galleryImage);
                            }
                        }
                    }
                }
            }

            // Delete detail accordion section image
            if (isset($industry->sub_details['detail_accordion_section']['image']) && $industry->sub_details['detail_accordion_section']['image'] && Storage::disk('public')->exists($industry->sub_details['detail_accordion_section']['image'])) {
                Storage::disk('public')->delete($industry->sub_details['detail_accordion_section']['image']);
            }

            // Delete experience section images
            if (isset($industry->sub_details['detail_experience_section']['images']) && is_array($industry->sub_details['detail_experience_section']['images'])) {
                foreach ($industry->sub_details['detail_experience_section']['images'] as $expImage) {
                    if ($expImage && Storage::disk('public')->exists($expImage)) {
                        Storage::disk('public')->delete($expImage);
                    }
                }
            }

            $industry->delete();

            return redirect()->route('admin.industries.list')->with('success', 'Industry deleted successfully.');
        } catch (Exception $e) {
            Log::error('Industry delete failed', [
                'industry_id' => $industry->id,
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()
                ->route('admin.industries.list')
                ->with('error', 'Unable to delete industry. Please try again later.');
        }
    }

    public function industry()
    {
        try {
            $industries = Industry::latest()->paginate(6);

            $seoMeta = \App\Models\SeoMeta::where('page_name', 'industry')
                ->where('is_active', 1)
                ->first();

            return view('frontend.pages.industry', compact('industries', 'seoMeta'));
        } catch (\Exception $e) {

            Log::error('Industry list error: '.$e->getMessage());

            return abort(500, 'Something went wrong. Please try again later.');
        }
    }

    public function loadMore(Request $request)
    {
        try {
            $page = $request->input('page', 2);
            $industries = Industry::latest()->paginate(6, ['*'], 'page', $page);

            return response()->json([
                'success' => true,
                'html' => view('frontend.pages.industry-items', compact('industries'))->render(),
                'hasMore' => $industries->hasMorePages(),
                'nextPage' => $industries->currentPage() + 1,
            ]);
        } catch (\Exception $e) {
            Log::error('Industry load more error: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Error loading more industries',
            ], 500);
        }
    }

    public function industryDetail($slug)
    {
        try {
            $industry = Industry::where('slug', $slug)->firstOrFail();

            return view('frontend.pages.subindustry', compact('industry'));
        } catch (ModelNotFoundException $e) {

            // Agar slug exist nahi karta
            return abort(404, 'Industry not found');
        } catch (\Exception $e) {

            Log::error('Industry detail error: '.$e->getMessage(), [
                'slug' => $slug,
            ]);

            return abort(500, 'Something went wrong. Please try again later.');
        }
    }
}
