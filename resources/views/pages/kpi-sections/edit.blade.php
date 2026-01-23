<x-default-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header p-5 rounded-top">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        <h3 class="fw-bolder mb-0">{{ __('Edit KPI Section') }}</h3>
                        <a href="{{ route('admin.kpi-sections.list') }}" class="btn btn-light btn-md">
                            <i class="bi bi-arrow-left me-2"></i>{{ __('Back to List') }}
                        </a>
                    </div>
                </div>

                <div class="card-body p-5">
                    <form action="{{ route('admin.kpi-sections.update', $kpiSection->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">

                            <div class="col-lg-12 mb-4">
                                <label for="tag" class="form-label fw-semibold required">{{ __('Tag') }}</label>
                                <input type="text" id="tag" name="tag"
                                    class="form-control form-control-lg @error('tag') is-invalid @enderror"
                                    value="{{ old('tag', $kpiSection->tag) }}">
                                @error('tag')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label for="title" class="form-label fw-semibold required">{{ __('Title') }}</label>
                                <input type="text" id="title" name="content[title]"
                                    class="form-control form-control-lg @error('content.title') is-invalid @enderror"
                                    value="{{ old('content.title', $kpiSection->content['title'] ?? '') }}">
                                @error('content.title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label for="subtitle" class="form-label fw-semibold required">{{ __('Subtitle') }}</label>
                                <textarea id="subtitle" name="content[subtitle]"
                                    class="form-control form-control-lg @error('content.subtitle') is-invalid @enderror" rows="3">{{ old('content.subtitle', $kpiSection->content['subtitle'] ?? '') }}</textarea>
                                @error('content.subtitle')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label class="form-label fw-semibold required">{{ __('Points') }}</label>
                                <div class="row">
                                    @for($i = 0; $i < 3; $i++)
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" name="content[points][{{ $i }}]" placeholder="Point {{ $i + 1 }}"
                                            class="form-control form-control-lg @error('content.points.' . $i) is-invalid @enderror"
                                            value="{{ old('content.points.' . $i, $kpiSection->content['points'][$i] ?? '') }}">
                                        @error('content.points.' . $i)
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @endfor
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                @include('partials/general/_button-indicator', [
                                    'label' => 'Update',
                                ])
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-default-layout>