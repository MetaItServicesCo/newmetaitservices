<x-default-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header p-5 rounded-top">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        <h3 class="fw-bolder mb-0">{{ __('Case Study') }}</h3>
                    </div>
                </div>
                @php
                    $url = isset($data->id)
                        ? route('admin.case-studies.update', $data->id)
                        : route('admin.case-studies.store');
                    $method = isset($data->id) ? 'PUT' : 'POST';
                @endphp

                <div class="card-body p-5">
                    <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if(isset($data->id))
                            @method('PUT')
                        @endif
                        <input type="hidden" name="id" value="{{ $data->id ?? '' }}">

                        <div class="row g-4">
                            <!-- Heading -->
                            <div class="col-lg-12">
                                <label for="title"
                                    class="form-label fw-semibold required">{{ __('Title') }}</label>
                                <input type="text" name="title" id="title"
                                    class="form-control form-control-lg @error('title') is-invalid @enderror"
                                    value="{{ old('title', $data->title ?? '') }}" required>
                                @error('title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Short Description -->
                            <div class="col-lg-12">
                                <label for="sub_title" class="form-label fw-semibold">{{ __('Sub Title') }}</label>
                                <textarea name="sub_title" id="sub_title" rows="3"
                                    class="form-control form-control-lg @error('sub_title') is-invalid @enderror">{{ old('sub_title', $data->sub_title ?? '') }}</textarea>
                                @error('sub_title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- image -->
                            <div class="col-lg-6 mb-4">
                                <label for="image" class="form-label fw-semibold">{{ __('Image') }}</label>
                                <input type="file" id="image" name="image"
                                    class="form-control form-control-lg @error('image') is-invalid @enderror">
                                @if (!empty($data->image))
                                    <img src="{{ asset('storage/case_study/' . $data->image) }}" class="mt-2"
                                        style="max-height:80px;">
                                @endif
                                @error('image')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- image Alt -->
                            <div class="col-lg-6 mb-4">
                                <label for="image_alt" class="form-label fw-semibold">{{ __('image Alt') }}</label>
                                <input type="text" id="image_alt" name="image_alt"
                                    class="form-control form-control-lg @error('image_alt') is-invalid @enderror"
                                    value="{{ old('image_alt', $data->image_alt ?? '') }}">
                                @error('image_alt')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- document -->
                            <div class="col-lg-12 mb-4">
                                <label for="document" class="form-label fw-semibold">{{ __('Document') }}</label>
                                <input type="file" id="document" name="document"
                                    class="form-control form-control-lg @error('document') is-invalid @enderror">
                                @if (!empty($data->document))
                                    <a href="{{ asset('storage/case_study/' . $data->document) }}" target="_blank"
                                        class="btn btn-sm btn-outline-primary mt-2">{{ __('View Document') }}</a>
                                @endif
                                @error('document')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="col-lg-12">
                                <label for="description" class="form-label fw-semibold">{{ __('Description') }}</label>
                                <textarea name="description" id="description" rows="3"
                                    class="form-control form-control-lg @error('description') is-invalid @enderror">{{ old('description', $data->description ?? '') }}</textarea>
                                @error('description')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-end mt-4">
                            @if (isset($data->id) && $data->id)
                                <button type="submit" class="btn btn-primary">
                                    @include('partials/general/_button-indicator', [
                                        'label' => 'Update',
                                    ])
                                </button>
                            @else
                                <button type="submit" class="btn btn-primary">
                                    @include('partials/general/_button-indicator', [
                                        'label' => 'Create',
                                    ])
                                </button>
                            @endif
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const editors = [{
                    id: 'description',
                    uploadDir: 'case_study/ckeditor'
                }];

                editors.forEach(editorConfig => {
                    const el = document.querySelector(`#${editorConfig.id}`);
                    if (el) {
                        ClassicEditor
                            .create(el, {
                                ckfinder: {
                                    uploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}&dir=" +
                                        editorConfig.uploadDir
                                }
                            })
                            .then(editorInstance => {
                                console.log(`CKEditor initialized for #${editorConfig.id}`);
                            })
                            .catch(error => console.error(`CKEditor error for #${editorConfig.id}:`, error));
                    }
                });
            });
        </script>
    @endpush

</x-default-layout>
