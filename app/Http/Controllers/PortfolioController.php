<?php

namespace App\Http\Controllers;

use App\DataTables\PortfolioDataTable;
use App\Http\Requests\StorePortfolioRequest;
use App\Http\Requests\UpdatePortfolioRequest;
use App\Models\Category;
use App\Models\Portfolio;
use App\Traits\UploadImageTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    use UploadImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(): RedirectResponse
    {
        return redirect()->route('admin.portfolios.list');
    }

    /**
     * List portfolios using DataTable.
     */
    public function list(PortfolioDataTable $dataTable)
    {
        try {
            return $dataTable->render('pages.portfolios.list');
        } catch (\Throwable $e) {
            Log::error('Portfolio List Error: '.$e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to load portfolios.');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        try {
            $categories = Category::where('status', true)->get();

            return view('pages.portfolios.create', compact('categories'));
        } catch (\Throwable $e) {
            Log::error('Portfolio Create Page Error: '.$e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to open create page.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePortfolioRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();

            // Handle thumbnail
            if ($request->hasFile('thumbnail')) {
                $data['thumbnail'] = $this->uploadImage($request->file('thumbnail'), 'portfolios/thumbnails');
            }

            // Handle gallery images
            $galleryImages = [];
            if ($request->hasFile('gallery_images')) {
                $galleryImages = $this->uploadMultipleImages($galleryImages, $request->file('gallery_images'), 'portfolios/gallery');
            }
            $data['gallery_images'] = $galleryImages;
            $data['slug'] = \Str::slug($data['slug']);

            Portfolio::create($data);

            return redirect()->route('admin.portfolios.list')
                ->with('success', 'Portfolio created successfully.');
        } catch (\Throwable $e) {
            Log::error('Portfolio Store Error: '.$e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to create portfolio.')
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Portfolio $portfolio): View
    {
        try {
            return view('pages.portfolios.show', compact('portfolio'));
        } catch (\Throwable $e) {
            Log::error('Portfolio Show Error: '.$e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to load portfolio.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Portfolio $portfolio): View
    {
        try {
            $categories = Category::where('status', true)->get();

            return view('pages.portfolios.create', compact('portfolio', 'categories'));
        } catch (\Throwable $e) {
            Log::error('Portfolio Edit Page Error: '.$e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to open edit page.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePortfolioRequest $request, Portfolio $portfolio): RedirectResponse
    {
        try {
            $data = $request->validated();

            // Handle thumbnail
            $data['thumbnail'] = $this->updateImage($request, 'thumbnail', 'portfolios/thumbnails', $portfolio->thumbnail);

            // Handle gallery images
            $galleryImages = $portfolio->gallery_images ?? [];
            if ($request->hasFile('gallery_images')) {
                $galleryImages = $this->uploadMultipleImages($galleryImages, $request->file('gallery_images'), 'portfolios/gallery');
            }
            $data['gallery_images'] = $galleryImages;
            $data['slug'] = \Str::slug($data['slug']);

            $portfolio->update($data);

            return redirect()->route('admin.portfolios.list')
                ->with('success', 'Portfolio updated successfully.');
        } catch (\Throwable $e) {
            Log::error('Portfolio Update Error: '.$e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to update portfolio.')
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio): RedirectResponse
    {
        try {
            // Delete images
            if ($portfolio->thumbnail) {
                \Storage::disk('public')->delete('portfolios/thumbnails/'.$portfolio->thumbnail);
            }
            if ($portfolio->gallery_images) {
                foreach ($portfolio->gallery_images as $image) {
                    \Storage::disk('public')->delete('portfolios/gallery/'.$image);
                }
            }

            $portfolio->delete();

            return redirect()->route('admin.portfolios.list')
                ->with('success', 'Portfolio deleted successfully.');
        } catch (\Throwable $e) {
            Log::error('Portfolio Destroy Error: '.$e->getMessage());

            return redirect()->back()
                ->with('error', 'Unable to delete portfolio.');
        }
    }

    public function removeGalleryImage(Request $request): JsonResponse
    {
        try {
            // Validate request
            $request->validate([
                'portfolio_id' => 'required|exists:portfolios,id',
                'image' => 'required|string',
            ]);

            $portfolio = Portfolio::findOrFail($request->portfolio_id);

            // gallery_images should be casted as array in model
            $galleryImages = $portfolio->gallery_images ?? [];

            if (! in_array($request->image, $galleryImages)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Image not found in this portfolio.',
                ], 404);
            }

            // Remove image from array
            $updatedImages = array_values(array_filter(
                $galleryImages,
                fn ($img) => $img !== $request->image
            ));

            // Save updated gallery images
            $portfolio->update([
                'gallery_images' => $updatedImages,
            ]);

            // Delete image from storage
            $imagePath = 'public/portfolios/gallery/'.$request->image;

            if (Storage::exists($imagePath)) {
                Storage::delete($imagePath);
            }

            return response()->json([
                'success' => true,
                'message' => 'Image removed successfully.',
            ]);
        } catch (\Throwable $e) {
            Log::error('Remove Gallery Image Error: '.$e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Unable to remove image.',
            ], 500);
        }
    }
}
