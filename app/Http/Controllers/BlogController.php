<?php

namespace App\Http\Controllers;

use App\DataTables\BlogsDataTable;
use App\Models\Blog;
use App\Models\Category;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    use UploadImageTrait;

    public function list(BlogsDataTable $dataTable)
    {
        return $dataTable->render('pages.blog.list');
    }

    public function create()
    {
        $categories = Category::where('status', true)->get();

        return view('pages.blog.create', compact('categories'));
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {

            $file = $request->file('upload');

            // Use trait method
            $filename = $this->uploadImage($file, 'blog/ckeditor');

            if ($filename) {
                $url = asset('storage/blog/ckeditor/'.$filename);

                return response()->json([
                    'uploaded' => 1,
                    'fileName' => $filename,
                    'url' => $url,
                ]);
            }
        }

        return response()->json([
            'uploaded' => 0,
            'error' => ['message' => 'File upload failed.'],
        ]);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            // Validate data
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:blogs,slug',
                'category_id' => 'required|exists:categories,id',
                'is_active' => 'nullable|in:0,1',
                'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:300',
                'image_alt_text' => 'nullable|string|max:255',
                'short_description' => 'nullable|string',
                'description' => 'nullable|string',
                'type' => 'nullable|string',
                'read_time' => 'nullable|string',

                'meta_title' => 'nullable|string|max:255',
                'meta_keywords' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
            ]);

            $validated['slug'] = Str::slug($request->slug);
            $validated['created_by'] = auth()->id();

            // ⬇ IMAGE UPLOAD USING TRAIT
            if ($request->hasFile('image')) {
                $validated['image'] = $this->uploadImage($request->file('image'), 'blog/images');
            }

            Blog::create($validated);

            DB::commit();

            return redirect()
                ->route('admin-blogs.list')
                ->with('success', 'Blog created successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {

            DB::rollBack();

            return redirect()->back()
                ->withErrors($e->errors())
                ->withInput();
        } catch (\Exception $e) {

            DB::rollBack();

            Log::error('Blog Create Error: '.$e->getMessage(), [
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ]);

            return redirect()->back()
                ->with('error', 'Something went wrong. Please try again later.')
                ->withInput();
        }
    }

    public function edit($id)
    {
        try {
            // Fetch blog
            $blog = Blog::find($id);

            if (! $blog) {
                return redirect()
                    ->route('admin-blogs.list')
                    ->with('error', 'Blog not found.');
            }

            // Fetch categories
            $categories = Category::where('status', true)->orderBy('name')->get();

            // Return view
            return view('pages.blog.create', [
                'data' => $blog,
                'categories' => $categories,
            ]);
        } catch (\Throwable $e) {

            // Log error
            Log::error('Blog Edit Error: '.$e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
            ]);

            // Redirect back with error message
            return redirect()
                ->route('admin-blogs.list')
                ->with('error', 'Something went wrong while loading the blog.');
        }
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        DB::beginTransaction();

        try {
            // Validation
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'slug' => "required|string|max:255|unique:blogs,slug,{$blog->id}",
                'category_id' => 'required|exists:categories,id',
                'is_active' => 'nullable|in:0,1',
                'image' => 'nullable|image|mimes:png,jpg,jpeg,webp|max:300',
                'image_alt_text' => 'nullable|string|max:255',
                'short_description' => 'nullable|string',
                'description' => 'nullable|string',
                'type' => 'nullable|string',
                'read_time' => 'nullable|string',

                'meta_title' => 'nullable|string|max:255',
                'meta_keywords' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
            ]);

            $validated['slug'] = Str::slug($request->slug);
            $validated['updated_by'] = auth()->id();

            // ⬇ UPDATE IMAGE USING TRAIT
            $validated['image'] = $this->updateImage($request, 'image', 'blog/images', $blog->image);

            $blog->update($validated);

            DB::commit();

            return redirect()
                ->route('admin-blogs.list')
                ->with('success', 'Blog updated successfully!');
        } catch (\Exception $e) {

            DB::rollBack();

            Log::error('Blog Update Error: '.$e->getMessage(), [
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
            // Fetch blog
            $blog = Blog::find($id);

            if (! $blog) {
                return redirect()
                    ->route('admin-blogs.list')
                    ->with('error', 'Blog not found.');
            }
            $blog->delete();

            // Redirect with success message
            return redirect()
                ->route('admin-blogs.list')
                ->with('success', 'Blog deleted successfully.');
        } catch (\Throwable $e) {

            // Log detailed error
            Log::error('Blog Delete Error: '.$e->getMessage(), [
                'id' => $id,
                'trace' => $e->getTraceAsString(),
            ]);

            // Redirect back with user-friendly message
            return redirect()
                ->route('admin-blogs.list')
                ->with('error', 'Something went wrong while deleting the blog.');
        }
    }

    public function blogs()
    {
        try {
            $categories = Category::whereIn('id', function ($query) {
                $query->select('category_id')
                    ->from('blogs')
                    ->whereNotNull('category_id')
                    ->distinct();
            })
                ->where('status', 1)
                ->select('id', 'name', 'slug')
                ->orderBy('name')
                ->get() ?? collect();

            // Default: All blogs
            $blogs = Blog::where('is_active', 1)
                ->latest()
                ->paginate(12); // 12 per page

            $maketingBlogs = Blog::where('type', 'marketing')->where('is_active', 1)->latest()->take(9)->select('id', 'title', 'slug', 'short_description', 'image_alt_text', 'created_at', 'image')->get();

            return view('frontend.pages.blogs', compact('categories', 'blogs', 'maketingBlogs'));
        } catch (\Throwable $e) {
            Log::error('Blog Landing Page Error: '.$e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()
                ->back()
                ->with('error', 'Something went wrong while loading the blog page.');
        }
    }

    public function filterBlogs(Request $request)
    {
        $slug = $request->slug ?? 'all';

        $query = Blog::where('is_active', 1);

        if ($slug !== 'all') {
            $categoryId = Category::where('slug', $slug)->value('id');
            $query->where('category_id', $categoryId ?? 0);
        }

        $blogs = $query->latest()->paginate(12);

        return response()->json([
            'html' => view('partials.blog-cards', compact('blogs'))->render(),
            'pagination' => $blogs->links('vendor.pagination.blogs-pagination')->render(),
        ]);
    }

    public function blogDetail($slug)
    {
        try {
            // Main blog with category
            $blog = Blog::with('category')
                ->where('slug', $slug)
                ->where('is_active', 1)
                ->firstOrFail();

            return view('frontend.pages.blogsdetaile', compact('blog'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(404);
        } catch (\Throwable $e) {
            Log::error('Blog Detail Error', [
                'slug' => $slug,
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return redirect()
                ->route('home')
                ->with('error', 'Something went wrong while loading the blog.');
        }
    }
}
