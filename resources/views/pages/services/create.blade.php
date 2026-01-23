<x-default-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header p-5 rounded-top">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        @if (isset($service->id) && !empty($service->id))
                            <h3 class="fw-bolder mb-0">{{ __('Edit Service') }}</h3>
                        @else
                            <h3 class="fw-bolder mb-0">{{ __('Create Service') }}</h3>
                        @endif
                        <a href="{{ route('admin.services.list') }}" class="btn btn-light btn-md">
                            <i class="bi bi-arrow-left me-2"></i>{{ __('Back to List') }}
                        </a>
                    </div>
                </div>

                @php
                    $url = isset($service->id)
                        ? route('admin.services.update', $service->id)
                        : route('admin.services.store');
                @endphp

                <div class="card-body p-5">
                    <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($service->id))
                            @method('PUT')
                        @endif
                        <div class="row">

                            <div class="col-lg-12 mb-4">
                                <label for="title"
                                    class="form-label fw-semibold required">{{ __('Title') }}</label>
                                <input type="text" id="title" name="title"
                                    class="form-control form-control-lg @error('title') is-invalid @enderror"
                                    value="{{ old('title', $service->title ?? '') }}">
                                @error('title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label for="slug"
                                    class="form-label fw-semibold required">{{ __('Slug') }}</label>
                                <input type="text" id="slug" name="slug"
                                    class="form-control form-control-lg @error('slug') is-invalid @enderror"
                                    value="{{ old('slug', $service->slug ?? '') }}">
                                @error('slug')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label for="short_description"
                                    class="form-label fw-semibold">{{ __('Short Description') }}</label>
                                <textarea id="short_description" name="short_description"
                                    class="form-control form-control-lg @error('short_description') is-invalid @enderror" rows="3">{{ old('short_description', $service->short_description ?? '') }}</textarea>
                                @error('short_description')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="col-lg-6 mb-4">
                                <label for="thumbnail" class="form-label fw-semibold">{{ __('Thumbnail') }}</label>
                                <input type="file" id="thumbnail" name="thumbnail"
                                    class="form-control form-control-lg @error('thumbnail') is-invalid @enderror">
                                @if (isset($service) && $service->thumbnail)
                                    <img src="{{ asset('storage/' . $service->thumbnail) }}" alt="Thumbnail"
                                        class="img-thumbnail mt-2" width="100">
                                @endif
                                @error('thumbnail')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="col-lg-3 mb-4">
                                <label for="thumbnail_alt" class="form-label fw-semibold">{{ __('Image Alt') }}</label>
                                <input type="text" id="thumbnail_alt" name="thumbnail_alt"
                                    class="form-control form-control-lg @error('thumbnail_alt') is-invalid @enderror"
                                    value="{{ old('thumbnail_alt', $service->thumbnail_alt ?? '') }}">
                                @error('thumbnail_alt')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-3 mb-4">
                                <label for="is_active" class="form-label fw-semibold">{{ __('Active') }}</label>
                                <select name="is_active" id="is_active"
                                    class="form-select form-select-lg @error('is_active') is-invalid @enderror">
                                    <option value="1"
                                        {{ old('is_active', $service->is_active ?? 1) == 1 ? 'selected' : '' }}>
                                        {{ __('Yes') }}
                                    </option>

                                    <option value="0"
                                        {{ old('is_active', $service->is_active ?? 1) == 0 ? 'selected' : '' }}>
                                        {{ __('No') }}
                                    </option>
                                </select>
                                @error('is_active')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- engaging_content --}}
                            <div class="col-lg-12 mb-4 mt-5">
                                <h3 class="fw-semibold mb-3">{{ __('Engaging Content') }}</h3>

                                <!-- Section One -->
                                <div class="card mb-3">
                                    <div class="card-header p-5 rounded-top">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <h3 class="fw-bolder mb-0">{{ __('Section One') }}</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Heading') }}</label>
                                                <input type="text" name="engaging_content[section_one][heading]"
                                                    class="form-control @error('engaging_content.section_one.heading') is-invalid @enderror"
                                                    value="{{ old('engaging_content.section_one.heading', $service->engaging_content['section_one']['heading'] ?? '') }}">
                                                @error('engaging_content.section_one.heading')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Image') }}</label>
                                                <input type="file" name="section_one_image"
                                                    class="form-control @error('section_one_image') is-invalid @enderror">
                                                @if (isset($service->engaging_content['section_one']['image']['path']))
                                                    <img src="{{ asset('storage/' . $service->engaging_content['section_one']['image']['path']) }}"
                                                        alt="" class="img-thumbnail mt-2" width="100">
                                                @endif
                                                @error('section_one_image')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Image Alt') }}</label>
                                                <input type="text" name="engaging_content[section_one][image][alt]"
                                                    class="form-control @error('engaging_content.section_one.image.alt') is-invalid @enderror"
                                                    value="{{ old('engaging_content.section_one.image.alt', $service->engaging_content['section_one']['image']['alt'] ?? '') }}">
                                                @error('engaging_content.section_one.image.alt')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="points-container" data-section="section_one">
                                            <label class="form-label fw-semibold">{{ __('Points') }}</label>
                                            @php
                                                $points = old(
                                                    'engaging_content.section_one.points',
                                                    $service->engaging_content['section_one']['points'] ?? [],
                                                );
                                                if (empty($points)) {
                                                    $points = [['title' => '', 'sub_title' => '']];
                                                }
                                            @endphp
                                            @foreach ($points as $index => $point)
                                                <div class="point-item row mb-2">
                                                    <div class="col-md-5">
                                                        <input type="text"
                                                            name="engaging_content[section_one][points][{{ $index }}][title]"
                                                            class="form-control" placeholder="Title"
                                                            value="{{ $point['title'] ?? '' }}">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <textarea name="engaging_content[section_one][points][{{ $index }}][sub_title]" class="form-control"
                                                            rows="2" placeholder="Sub Title">{{ $point['sub_title'] ?? '' }}</textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button"
                                                            class="btn btn-danger remove-point">Remove</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <button type="button" class="btn btn-success add-point"
                                                data-section="section_one">Add More</button>
                                        </div>
                                    </div>
                                </div>

                                <!-- Section Two -->
                                <div class="card mb-3">
                                    <div class="card-header p-5 rounded-top">
                                        <div class="d-flex w-100 justify-content-between align-items-center">
                                            <h3 class="fw-bolder mb-0">{{ __('Section Two') }}</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Heading') }}</label>
                                                <input type="text" name="engaging_content[section_two][heading]"
                                                    class="form-control @error('engaging_content.section_two.heading') is-invalid @enderror"
                                                    value="{{ old('engaging_content.section_two.heading', $service->engaging_content['section_two']['heading'] ?? '') }}">
                                                @error('engaging_content.section_two.heading')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Description') }}</label>
                                                <textarea name="engaging_content[section_two][description]"
                                                    class="form-control @error('engaging_content.section_two.description') is-invalid @enderror" rows="3">{{ old('engaging_content.section_two.description', $service->engaging_content['section_two']['description'] ?? '') }}</textarea>
                                                @error('engaging_content.section_two.description')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Image') }}</label>
                                                <input type="file" name="section_two_image"
                                                    class="form-control @error('section_two_image') is-invalid @enderror">
                                                @if (isset($service->engaging_content['section_two']['image']['path']))
                                                    <img src="{{ asset('storage/' . $service->engaging_content['section_two']['image']['path']) }}"
                                                        alt="" class="img-thumbnail mt-2" width="100">
                                                @endif
                                                @error('section_two_image')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Image Alt') }}</label>
                                                <input type="text" name="engaging_content[section_two][image][alt]"
                                                    class="form-control @error('engaging_content.section_two.image.alt') is-invalid @enderror"
                                                    value="{{ old('engaging_content.section_two.image.alt', $service->engaging_content['section_two']['image']['alt'] ?? '') }}">
                                                @error('engaging_content.section_two.image.alt')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="points-container" data-section="section_two">
                                            <label class="form-label fw-semibold">{{ __('Points') }}</label>
                                            @php
                                                $points2 = old(
                                                    'engaging_content.section_two.points',
                                                    $service->engaging_content['section_two']['points'] ?? [],
                                                );
                                                if (empty($points2)) {
                                                    $points2 = [['title' => '', 'sub_title' => '']];
                                                }
                                            @endphp
                                            @foreach ($points2 as $index => $point)
                                                <div class="point-item row mb-2">
                                                    <div class="col-md-5">
                                                        <input type="text"
                                                            name="engaging_content[section_two][points][{{ $index }}][title]"
                                                            class="form-control" placeholder="Title"
                                                            value="{{ $point['title'] ?? '' }}">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <textarea name="engaging_content[section_two][points][{{ $index }}][sub_title]" class="form-control"
                                                            rows="2" placeholder="Sub Title">{{ $point['sub_title'] ?? '' }}</textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button"
                                                            class="btn btn-danger remove-point">Remove</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <button type="button" class="btn btn-success add-point"
                                                data-section="section_two">Add More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 mb-4 mt-5">
                                <h3 class="fw-semibold mb-3">{{ __('SEO Section') }}</h3>
                                <div class="col-lg-12 mb-4">
                                    <label for="meta_title"
                                        class="form-label fw-semibold">{{ __('Meta Title') }}</label>
                                    <input type="text" id="meta_title" name="meta_title"
                                        class="form-control form-control-lg @error('meta_title') is-invalid @enderror"
                                        value="{{ old('meta_title', $service->meta_title ?? '') }}">
                                    @error('meta_title')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <label for="meta_keywords"
                                        class="form-label fw-semibold">{{ __('Meta Keyword') }}</label>
                                    <input type="text" id="meta_keywords" name="meta_keywords"
                                        class="form-control form-control-lg @error('meta_keywords') is-invalid @enderror"
                                        value="{{ old('meta_keywords', $service->meta_keywords ?? '') }}">

                                    @error('meta_keywords')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="col-lg-12 mb-4">
                                    <label for="meta_description"
                                        class="form-label fw-semibold">{{ __('Meta Description') }}</label>
                                    <textarea id="meta_description" name="meta_description"
                                        class="form-control form-control-lg @error('meta_description') is-invalid @enderror" rows="5">{{ old('meta_description', $service->meta_description ?? '') }}</textarea>
                                    @error('meta_description')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                @include('partials/general/_button-indicator', [
                                    'label' => isset($service->id) ? 'Update' : 'Create',
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

                // Add/Remove points
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('add-point')) {
                        const section = e.target.getAttribute('data-section');
                        const container = e.target.closest('.points-container');
                        const pointItems = container.querySelectorAll('.point-item');
                        const newIndex = pointItems.length;
                        const newPoint = document.createElement('div');
                        newPoint.className = 'point-item row mb-2';
                        newPoint.innerHTML = `
                            <div class="col-md-5">
                                <input type="text" name="engaging_content[${section}][points][${newIndex}][title]" class="form-control" placeholder="Title">
                            </div>
                            <div class="col-md-5">
                                <textarea name="engaging_content[${section}][points][${newIndex}][sub_title]" class="form-control" rows="2" placeholder="Sub Title"></textarea>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger remove-point">Remove</button>
                            </div>
                        `;
                        container.insertBefore(newPoint, e.target);
                    }

                    if (e.target.classList.contains('remove-point')) {
                        if (confirm('Are you sure you want to remove this point?')) {
                            e.target.closest('.point-item').remove();
                        }
                    }
                });

            });
        </script>
    @endpush

</x-default-layout>
