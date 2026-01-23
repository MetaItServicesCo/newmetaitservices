<x-default-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header p-5 rounded-top">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        <h3 class="fw-bolder mb-0">{{ __('Create KPI Section') }}</h3>
                        <a href="{{ route('admin.kpi-sections.list') }}" class="btn btn-light btn-md">
                            <i class="bi bi-arrow-left me-2"></i>{{ __('Back to List') }}
                        </a>
                    </div>
                </div>

                <div class="card-body p-5">
                    <form action="{{ route('admin.kpi-sections.store') }}" method="post">
                        @csrf
                        <div class="row">

                            <div class="col-lg-12 mb-4">
                                <label for="tag" class="form-label fw-semibold required">{{ __('Tag') }}</label>
                                <input type="text" id="tag" name="tag"
                                    class="form-control form-control-lg @error('tag') is-invalid @enderror"
                                    value="{{ old('tag') }}">
                                @error('tag')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label for="title" class="form-label fw-semibold required">{{ __('Title') }}</label>
                                <input type="text" id="title" name="content[title]"
                                    class="form-control form-control-lg @error('content.title') is-invalid @enderror"
                                    value="{{ old('content.title') }}">
                                @error('content.title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label for="subtitle" class="form-label fw-semibold required">{{ __('Subtitle') }}</label>
                                <textarea id="subtitle" name="content[subtitle]"
                                    class="form-control form-control-lg @error('content.subtitle') is-invalid @enderror" rows="3">{{ old('content.subtitle') }}</textarea>
                                @error('content.subtitle')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label class="form-label fw-semibold required">{{ __('Points') }}</label>
                                <div class="row">
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" name="content[points][0]" placeholder="Point 1"
                                            class="form-control form-control-lg @error('content.points.0') is-invalid @enderror"
                                            value="{{ old('content.points.0') }}">
                                        @error('content.points.0')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" name="content[points][1]" placeholder="Point 2"
                                            class="form-control form-control-lg @error('content.points.1') is-invalid @enderror"
                                            value="{{ old('content.points.1') }}">
                                        @error('content.points.1')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" name="content[points][2]" placeholder="Point 3"
                                            class="form-control form-control-lg @error('content.points.2') is-invalid @enderror"
                                            value="{{ old('content.points.2') }}">
                                        @error('content.points.2')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                @include('partials/general/_button-indicator', [
                                    'label' => 'Create',
                                ])
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-default-layout>