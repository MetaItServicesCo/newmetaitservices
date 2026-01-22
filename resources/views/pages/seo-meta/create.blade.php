<x-default-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header p-5 rounded-top">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        @if (isset($seo->id) && !empty($seo->id))
                            <h3 class="fw-bolder mb-0">{{ __('Edit Seo Meta') }}</h3>
                        @else
                            <h3 class="fw-bolder mb-0">{{ __('Create Seo Meta') }}</h3>
                        @endif
                        <a href="{{ route('admin-seo-meta.list') }}" class="btn btn-light btn-md">
                            <i class="bi bi-arrow-left me-2"></i>{{ __('Back to List') }}
                        </a>
                    </div>
                </div>

                @php
                    $url =
                        isset($seo) && $seo->id
                            ? route('admin-seo-meta.update', $seo->id)
                            : route('admin-seo-meta.store');
                @endphp

                <div class="card-body p-5">
                    <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($seo->id))
                            @method('PUT')
                        @endif
                        <div class="row">

                            <div class="col-lg-6 mb-4">
                                <label for="page_name"
                                    class="form-label fw-semibold required">{{ __('Page Name') }}</label>
                                <select name="page_name" id="page_name" data-control="select2"
                                    class="form-select form-select-lg @error('page_name') is-invalid @enderror"
                                    required>
                                    <option value="">{{ __('Select Page') }}</option>
                                    @foreach ($pages as $key => $label)
                                        <option value="{{ $key }}"
                                            {{ old('page_name', $seo->page_name ?? '') == $key ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('page_name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="is_active" class="form-label fw-semibold">{{ __('Active') }}</label>
                                <select name="is_active" id="is_active"
                                    class="form-select form-select-lg @error('is_active') is-invalid @enderror">
                                    <option value="1"
                                        {{ old('is_active', $seo->is_active ?? 1) == 1 ? 'selected' : '' }}>
                                        {{ __('Yes') }}
                                    </option>

                                    <option value="0"
                                        {{ old('is_active', $seo->is_active ?? 1) == 0 ? 'selected' : '' }}>
                                        {{ __('No') }}
                                    </option>
                                </select>
                                @error('is_active')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label for="meta_title"
                                    class="form-label fw-semibold required">{{ __('Meta Title') }}</label>
                                <input type="text" id="meta_title" name="meta_title"
                                    class="form-control form-control-lg @error('meta_title') is-invalid @enderror"
                                    value="{{ old('meta_title', $seo->meta_title ?? '') }}">
                                @error('meta_title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label for="meta_keywords"
                                    class="form-label fw-semibold">{{ __('Meta Keyword') }}</label>
                                <input type="text" id="meta_keywords" name="meta_keywords"
                                    class="form-control form-control-lg @error('meta_keywords') is-invalid @enderror"
                                    value="{{ old('meta_keywords', $seo->meta_keywords ?? '') }}">

                                @error('meta_keywords')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>



                            <div class="col-lg-12 mb-4">
                                <label for="meta_description"
                                    class="form-label fw-semibold">{{ __('Meta Description') }}</label>
                                <textarea id="meta_description" name="meta_description"
                                    class="form-control form-control-lg @error('meta_description') is-invalid @enderror" rows="5">{{ old('meta_description', $seo->meta_description ?? '') }}</textarea>
                                @error('meta_description')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    @include('partials/general/_button-indicator', [
                                        'label' => isset($seo->id) ? 'Update' : 'Create',
                                    ])
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    @endpush

</x-default-layout>
