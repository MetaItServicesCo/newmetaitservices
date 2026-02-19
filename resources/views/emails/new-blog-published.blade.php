@php
    $blogUrl = route('blog.detail', $blog->slug);
@endphp

<p>Hello,</p>
<p>We just published a new blog post:</p>
<p><strong>{{ $blog->title }}</strong></p>
@if (!empty($blog->short_description))
    <p>{{ $blog->short_description }}</p>
@endif
<p><a href="{{ $blogUrl }}">Read the full post</a></p>
