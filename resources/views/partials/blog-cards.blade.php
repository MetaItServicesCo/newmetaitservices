@forelse ($blogs as $blog)
<div class="col-lg-4 col-md-6">
    <div class="blog-card">
        <img src="{{ asset('storage/blog/images/' . $blog->image) }}" alt="{{ $blog->image_alt_text ?? $blog->title }}">
        <div class="body">
            @if ($blog->category)
                <button class="blog-tag">{{ $blog->category?->name ?? '' }}</button>
            @endif
            <h4>{{ \Str::limit($blog->title, 60 ?? '') }}</h4>
            <p>{{ \Str::limit($blog->short_description, 140) }}</p>
            <div class="blog-footer">
                <span>{{ $blog->created_at->format('M d, Y') }}</span>
                <a href="{{ route('blog.detail', $blog->slug) }}">Read More →</a>
            </div>
        </div>
    </div>
</div>
@empty
    <div class="col-12 text-center py-5">
        <p class="text-muted">No blogs found.</p>
    </div>
@endforelse
