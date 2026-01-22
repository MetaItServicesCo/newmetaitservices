<x-default-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header p-5 rounded-top">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        @if (isset($portfolio->id) && !empty($portfolio->id))
                            <h3 class="fw-bolder mb-0">{{ __('Edit Portfolio') }}</h3>
                        @else
                            <h3 class="fw-bolder mb-0">{{ __('Create Portfolio') }}</h3>
                        @endif
                        <a href="{{ route('admin.portfolios.list') }}" class="btn btn-light btn-md">
                            <i class="bi bi-arrow-left me-2"></i>{{ __('Back to List') }}
                        </a>
                    </div>
                </div>

                @php
                    $url = isset($portfolio->id)
                        ? route('admin.portfolios.update', $portfolio->id)
                        : route('admin.portfolios.store');
                @endphp

                <div class="card-body p-5">
                    <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($portfolio->id))
                            @method('PUT')
                        @endif
                        <div class="row">

                            <!-- Category -->
                            <div class="col-lg-4 mb-4">
                                <label for="category_id"
                                    class="form-label fw-semibold required">{{ __('Category') }}</label>
                                <select name="category_id" id="category_id" data-control="select2"
                                    class="form-select form-select-lg @error('category_id') is-invalid @enderror"
                                    required>
                                    <option value="">{{ __('Select Category') }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ old('category_id', $portfolio->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-8 mb-4">
                                <label for="title"
                                    class="form-label fw-semibold required">{{ __('Title') }}</label>
                                <input type="text" id="title" name="title"
                                    class="form-control form-control-lg @error('title') is-invalid @enderror"
                                    value="{{ old('title', $portfolio->title ?? '') }}">
                                @error('title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="slug"
                                    class="form-label fw-semibold required">{{ __('Slug') }}</label>
                                <input type="text" id="slug" name="slug"
                                    class="form-control form-control-lg @error('slug') is-invalid @enderror"
                                    value="{{ old('slug', $portfolio->slug ?? '') }}">
                                @error('slug')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="sub_title" class="form-label fw-semibold">{{ __('Sub Title') }}</label>
                                <input type="text" id="sub_title" name="sub_title"
                                    class="form-control form-control-lg @error('sub_title') is-invalid @enderror"
                                    value="{{ old('sub_title', $portfolio->sub_title ?? '') }}">
                                @error('sub_title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label for="description" class="form-label fw-semibold">{{ __('Description') }}</label>
                                <textarea id="description" name="description"
                                    class="form-control form-control-lg @error('description') is-invalid @enderror" rows="5">{{ old('description', $portfolio->description ?? '') }}</textarea>
                                @error('description')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="thumbnail" class="form-label fw-semibold">{{ __('Thumbnail') }}</label>
                                <input type="file" id="thumbnail" name="thumbnail"
                                    class="form-control form-control-lg @error('thumbnail') is-invalid @enderror">
                                @if (isset($portfolio) && $portfolio->thumbnail)
                                    <img src="{{ asset('storage/portfolios/thumbnails/' . $portfolio->thumbnail) }}"
                                        alt="Thumbnail" class="img-thumbnail mt-2" width="100">
                                @endif
                                @error('thumbnail')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="gallery_images"
                                    class="form-label fw-semibold">{{ __('Gallery Images') }}</label>
                                <input type="file" id="gallery_images" name="gallery_images[]" multiple
                                    class="form-control form-control-lg @error('gallery_images') is-invalid @enderror">

                                @if (isset($portfolio) && !empty($portfolio->gallery_images))

                                    <div class="d-flex flex-wrap mt-2" id="gallery-images-wrapper">
                                        @foreach ($portfolio->gallery_images as $img)
                                            <div class="text-center me-2 mb-2 gallery-image-item"
                                                data-img="{{ $img }}">
                                                <img src="{{ asset('storage/portfolios/gallery/' . $img) }}"
                                                    alt="Gallery" class="img-thumbnail" width="80">
                                                <br>
                                                <span class="text-danger remove-gallery-image"
                                                    style="cursor:pointer; font-size:0.85rem;">
                                                    Remove
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                @error('gallery_images')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="image_alt" class="form-label fw-semibold">{{ __('Image Alt') }}</label>
                                <input type="text" id="image_alt" name="image_alt"
                                    class="form-control form-control-lg @error('image_alt') is-invalid @enderror"
                                    value="{{ old('image_alt', $portfolio->image_alt ?? '') }}">
                                @error('image_alt')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="is_active" class="form-label fw-semibold">{{ __('Active') }}</label>
                                <select name="is_active" id="is_active"
                                    class="form-select form-select-lg @error('is_active') is-invalid @enderror">
                                    <option value="1"
                                        {{ old('is_active', $portfolio->is_active ?? 1) == 1 ? 'selected' : '' }}>
                                        {{ __('Yes') }}
                                    </option>

                                    <option value="0"
                                        {{ old('is_active', $portfolio->is_active ?? 1) == 0 ? 'selected' : '' }}>
                                        {{ __('No') }}
                                    </option>
                                </select>
                                @error('is_active')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="show_on_landing_page"
                                    class="form-label fw-semibold">{{ __('Show on Landing Page') }}</label>
                                <select name="show_on_landing_page" id="show_on_landing_page"
                                    class="form-select form-select-lg @error('show_on_landing_page') is-invalid @enderror">
                                    <option value="1"
                                        {{ old('show_on_landing_page', $portfolio->show_on_landing_page ?? 0) == 1 ? 'selected' : '' }}>
                                        {{ __('Yes') }}</option>
                                    <option value="0"
                                        {{ old('show_on_landing_page', $portfolio->show_on_landing_page ?? 0) == 0 ? 'selected' : '' }}>
                                        {{ __('No') }}</option>
                                </select>
                                @error('show_on_landing_page')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    @include('partials/general/_button-indicator', [
                                        'label' => isset($portfolio->id) ? 'Update' : 'Create',
                                    ])
                                </button>
                            </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                // Thumbnail validation
                const thumbnailInput = document.getElementById('thumbnail');
                if (thumbnailInput) {
                    if (!document.getElementById('thumbnail_error')) {
                        let thumbError = document.createElement('div');
                        thumbError.id = 'thumbnail_error';
                        thumbError.classList.add('text-danger', 'mt-1');
                        thumbnailInput.parentNode.appendChild(thumbError);
                    }

                    thumbnailInput.addEventListener('change', function() {
                        validateFile(thumbnailInput, 'thumbnail_error');
                    });
                }

                // Gallery images validation
                const galleryInput = document.getElementById('gallery_images');
                if (galleryInput) {
                    if (!document.getElementById('gallery_images_error')) {
                        let galleryError = document.createElement('div');
                        galleryError.id = 'gallery_images_error';
                        galleryError.classList.add('text-danger', 'mt-1');
                        galleryInput.parentNode.appendChild(galleryError);
                    }

                    galleryInput.addEventListener('change', function() {
                        validateFile(galleryInput, 'gallery_images_error');
                    });
                }

            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Attach click event to all remove-gallery-image elements
                document.querySelectorAll('.remove-gallery-image').forEach(span => {
                    span.addEventListener('click', function() {
                        const container = this.closest('.gallery-image-item');
                        const imgName = container.getAttribute('data-img');
                        const portfolioId = "{{ $portfolio->id ?? 0 }}"; // Current portfolio ID

                        if (!portfolioId) return;
                        // Confirmation dialog
                        if (confirm(`Are you sure you want to remove this image?`)) {
                            // Send AJAX request to remove image
                            fetch("{{ route('admin.portfolios.remove-gallery-image') }}", {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        portfolio_id: portfolioId,
                                        image: imgName
                                    })
                                })
                                .then(res => res.json())
                                .then(data => {
                                    if (data.success) {
                                        container.remove(); // Remove image from DOM
                                        toastr.success(data.message ||
                                            'Image removed successfully');
                                    } else {
                                        toastr.error(data.message || 'Something went wrong');
                                    }
                                })
                                .catch(err => {
                                    console.error(err);
                                    toastr.error('Error removing image');
                                });
                        }
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                ClassicEditor
                    .create(document.querySelector('#description'), {
                        ckfinder: {
                            uploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}&dir=products/ckeditor"
                        }
                    })
                    .then(editor => {
                        console.log(`CKEditor initialized for #description`);
                    })
                    .catch(error => console.error(error));
            });
        </script>
    @endpush

</x-default-layout>
