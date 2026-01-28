<x-default-layout>

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header p-5 rounded-top">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        @if (isset($data->id) && !empty($data->id))
                            <h3 class="fw-bolder mb-0">{{ __('Edit Sub Service') }}</h3>
                        @else
                            <h3 class="fw-bolder mb-0">{{ __('Create Sub Service') }}</h3>
                        @endif
                        <a href="{{ route('admin.sub-services.list') }}" class="btn btn-light btn-md">
                            <i class="bi bi-arrow-left me-2"></i>{{ __('Back to List') }}
                        </a>
                    </div>
                </div>

                @php
                    $url = isset($data->id)
                        ? route('admin.sub-services.update', $data->id)
                        : route('admin.sub-services.store');
                @endphp

                <div class="card-body p-5">
                    <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if (isset($data->id))
                            @method('PUT')
                        @endif
                        <div class="row">

                            <!-- services -->
                            <div class="col-lg-4 mb-4">
                                <label for="service_id"
                                    class="form-label fw-semibold required">{{ __('services') }}</label>
                                <select name="service_id" id="service_id" data-control="select2"
                                    class="form-select form-select-lg @error('service_id') is-invalid @enderror"
                                    required>
                                    <option value="">{{ __('Select Service') }}</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}"
                                            {{ old('service_id', $data->service_id ?? '') == $service->id ? 'selected' : '' }}>
                                            {{ $service->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-8 mb-4">
                                <label for="title"
                                    class="form-label fw-semibold required">{{ __('Title') }}</label>
                                <input type="text" id="title" name="title"
                                    class="form-control form-control-lg @error('title') is-invalid @enderror"
                                    value="{{ old('title', $data->title ?? '') }}">
                                @error('title')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="slug"
                                    class="form-label fw-semibold required">{{ __('Slug') }}</label>
                                <input type="text" id="slug" name="slug"
                                    class="form-control form-control-lg @error('slug') is-invalid @enderror"
                                    value="{{ old('slug', $data->slug ?? '') }}">
                                @error('slug')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="short_description"
                                    class="form-label fw-semibold">{{ __('Short Description') }}</label>
                                <input type="text" id="short_description" name="short_description"
                                    class="form-control form-control-lg @error('short_description') is-invalid @enderror"
                                    value="{{ old('short_description', $data->short_description ?? '') }}">
                                @error('short_description')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="icon" class="form-label fw-semibold">{{ __('Icon') }}</label>
                                <input type="file" id="icon" name="icon"
                                    class="form-control form-control-lg @error('icon') is-invalid @enderror">
                                @if (isset($data) && $data->icon)
                                    <div class="mt-2">
                                        <small class="text-muted">{{ __('Current Icon:') }}</small><br>
                                        <img src="{{ asset('storage/' . $data->icon) }}" alt="Current Icon"
                                            style="max-width: 100px; max-height: 100px;">
                                    </div>
                                @endif
                                @error('icon')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-lg-6 mb-4">
                                <label for="is_active" class="form-label fw-semibold">{{ __('Active') }}</label>
                                <select name="is_active" id="is_active"
                                    class="form-select form-select-lg @error('is_active') is-invalid @enderror">
                                    <option value="1"
                                        {{ old('is_active', $data->is_active ?? 1) == 1 ? 'selected' : '' }}>
                                        {{ __('Yes') }}
                                    </option>

                                    <option value="0"
                                        {{ old('is_active', $data->is_active ?? 1) == 0 ? 'selected' : '' }}>
                                        {{ __('No') }}
                                    </option>
                                </select>
                                @error('is_active')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="show_on_services_page"
                                    class="form-label fw-semibold">{{ __('Show on Services Page') }}</label>
                                <select name="show_on_services_page" id="show_on_services_page"
                                    class="form-select form-select-lg @error('show_on_services_page') is-invalid @enderror">
                                    <option value="1"
                                        {{ old('show_on_services_page', $data->show_on_services_page ?? 0) == 1 ? 'selected' : '' }}>
                                        {{ __('Yes') }}</option>
                                    <option value="0"
                                        {{ old('show_on_services_page', $data->show_on_services_page ?? 0) == 0 ? 'selected' : '' }}>
                                        {{ __('No') }}</option>
                                </select>
                                @error('show_on_services_page')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label for="show_on_landing_page"
                                    class="form-label fw-semibold">{{ __('Show on Landing Page') }}</label>
                                <select name="show_on_landing_page" id="show_on_landing_page"
                                    class="form-select form-select-lg @error('show_on_landing_page') is-invalid @enderror">
                                    <option value="1"
                                        {{ old('show_on_landing_page', $data->show_on_landing_page ?? 0) == 1 ? 'selected' : '' }}>
                                        {{ __('Yes') }}</option>
                                    <option value="0"
                                        {{ old('show_on_landing_page', $data->show_on_landing_page ?? 0) == 0 ? 'selected' : '' }}>
                                        {{ __('No') }}</option>
                                </select>
                                @error('show_on_landing_page')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- main_points start here --}}
                            <div class="col-lg-12 mb-4">
                                <label for="main_points" class="form-label fw-semibold">{{ __('Main Points') }}</label>
                                <div class="main-points-container">
                                    @php
                                        $mainPoints = old('main_points', $data->main_points ?? []);
                                        if (empty($mainPoints)) {
                                            $mainPoints = [''];
                                        }
                                    @endphp
                                    @foreach ($mainPoints as $index => $point)
                                        <div class="input-group mb-2 main-point-item">
                                            <input type="text" name="main_points[{{ $index }}]"
                                                class="form-control" placeholder="Enter main point"
                                                value="{{ $point }}">
                                            <button type="button" class="btn btn-danger remove-main-point">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-success add-main-point">Add More</button>
                                </div>
                                @error('main_points')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Sub-Service Content start here --}}
                            <div class="col-lg-12 mb-4">
                                <h4 class="fw-semibold mb-3">{{ __('Page Content') }}</h4>

                                <!-- Hero Section -->
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="mb-0">{{ __('Hero Section') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Main Heading') }}</label>
                                                <input type="text" name="page_content[hero_section][main_heading]"
                                                    class="form-control @error('page_content.hero_section.main_heading') is-invalid @enderror"
                                                    value="{{ old('page_content.hero_section.main_heading', $data->page_content['hero_section']['main_heading'] ?? '') }}">
                                                @error('page_content.hero_section.main_heading')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label
                                                    class="form-label fw-semibold">{{ __('Short Description') }}</label>
                                                <textarea name="page_content[hero_section][short_description]"
                                                    class="form-control @error('page_content.hero_section.short_description') is-invalid @enderror" rows="3">{{ old('page_content.hero_section.short_description', $data->page_content['hero_section']['short_description'] ?? '') }}</textarea>
                                                @error('page_content.hero_section.short_description')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Campaign Section -->
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="mb-0">{{ __('Campaign Section') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">{{ __('Title') }}</label>
                                            <input type="text" name="page_content[campaign_section][title]"
                                                class="form-control @error('page_content.campaign_section.title') is-invalid @enderror"
                                                value="{{ old('page_content.campaign_section.title', $data->page_content['campaign_section']['title'] ?? '') }}">
                                            @error('page_content.campaign_section.title')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="campaign-points-container">
                                            <label class="form-label fw-semibold">{{ __('Points') }}</label>
                                            @php
                                                $campaignPoints = old(
                                                    'page_content.campaign_section.points',
                                                    $data->page_content['campaign_section']['points'] ?? [],
                                                );
                                                if (empty($campaignPoints)) {
                                                    $campaignPoints = [''];
                                                }
                                            @endphp
                                            @foreach ($campaignPoints as $index => $point)
                                                <div class="input-group mb-2 campaign-point-item">
                                                    <input type="text"
                                                        name="page_content[campaign_section][points][{{ $index }}]"
                                                        class="form-control" placeholder="Enter campaign point"
                                                        value="{{ $point }}">
                                                    <button type="button"
                                                        class="btn btn-danger remove-campaign-point">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            @endforeach
                                            <button type="button" class="btn btn-success add-campaign-point">Add
                                                More</button>
                                        </div>
                                        @error('page_content.campaign_section.points')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Development Process -->
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="mb-0">{{ __('Development Process') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">{{ __('Title') }}</label>
                                            <input type="text" name="page_content[development_process][title]"
                                                class="form-control @error('page_content.development_process.title') is-invalid @enderror"
                                                value="{{ old('page_content.development_process.title', $data->page_content['development_process']['title'] ?? '') }}">
                                            @error('page_content.development_process.title')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="development-steps-container">
                                            <label class="form-label fw-semibold">{{ __('Steps') }}</label>
                                            @php
                                                $steps = old(
                                                    'page_content.development_process.steps',
                                                    $data->page_content['development_process']['steps'] ?? [],
                                                );
                                                if (empty($steps)) {
                                                    $steps = [['title' => '', 'description' => '']];
                                                }
                                            @endphp
                                            @foreach ($steps as $index => $step)
                                                <div class="step-item card mb-2">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <input type="text"
                                                                    name="page_content[development_process][steps][{{ $index }}][title]"
                                                                    class="form-control" placeholder="Step Title"
                                                                    value="{{ $step['title'] ?? '' }}">
                                                            </div>
                                                            <div class="col-md-5">
                                                                <textarea name="page_content[development_process][steps][{{ $index }}][description]" class="form-control"
                                                                    rows="2" placeholder="Step Description">{{ $step['description'] ?? '' }}</textarea>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="button"
                                                                    class="btn btn-danger remove-step">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <button type="button" class="btn btn-success add-step">Add More
                                                Step</button>
                                        </div>
                                        @error('page_content.development_process.steps')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Commitments Section -->
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="mb-0">{{ __('Commitments Section') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Title') }}</label>
                                                <input type="text" name="page_content[commitments_section][title]"
                                                    class="form-control @error('page_content.commitments_section.title') is-invalid @enderror"
                                                    value="{{ old('page_content.commitments_section.title', $data->page_content['commitments_section']['title'] ?? '') }}">
                                                @error('page_content.commitments_section.title')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Description') }}</label>
                                                <textarea name="page_content[commitments_section][description]"
                                                    class="form-control @error('page_content.commitments_section.description') is-invalid @enderror" rows="3">{{ old('page_content.commitments_section.description', $data->page_content['commitments_section']['description'] ?? '') }}</textarea>
                                                @error('page_content.commitments_section.description')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="commitments-points-container">
                                            <label class="form-label fw-semibold">{{ __('Points') }}</label>
                                            @php
                                                $commitmentPoints = old(
                                                    'page_content.commitments_section.points',
                                                    $data->page_content['commitments_section']['points'] ?? [],
                                                );
                                                if (empty($commitmentPoints)) {
                                                    $commitmentPoints = [
                                                        ['icon' => '', 'title' => '', 'sub_title' => ''],
                                                    ];
                                                }
                                            @endphp
                                            @foreach ($commitmentPoints as $index => $point)
                                                <div class="commitment-point-item card mb-2">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <input type="file"
                                                                    name="commitment_icons[{{ $index }}]"
                                                                    class="form-control">
                                                                @if (isset($data->page_content['commitments_section']['icons'][$index]) &&
                                                                        $data->page_content['commitments_section']['icons'][$index]
                                                                )
                                                                    <img src="{{ asset('storage/' . $data->page_content['commitments_section']['icons'][$index]) }}"
                                                                        alt="" width="50" class="mt-2">
                                                                @endif
                                                            </div>
                                                            <div class="col-md-3">
                                                                <input type="text"
                                                                    name="page_content[commitments_section][points][{{ $index }}][title]"
                                                                    class="form-control" placeholder="Title"
                                                                    value="{{ $point['title'] ?? '' }}">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <textarea name="page_content[commitments_section][points][{{ $index }}][sub_title]" class="form-control"
                                                                    rows="2" placeholder="Sub Title">{{ $point['sub_title'] ?? '' }}</textarea>
                                                            </div>
                                                            <div class="col-md-2">
                                                                <button type="button"
                                                                    class="btn btn-danger remove-commitment-point">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <button type="button" class="btn btn-success add-commitment-point">Add
                                                More Point</button>
                                        </div>
                                        @error('page_content.commitments_section.points')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Why Choose Section -->
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="mb-0">{{ __('Why Choose Section') }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label fw-semibold">{{ __('Title') }}</label>
                                            <input type="text" name="page_content[why_choose_section][title]"
                                                class="form-control @error('page_content.why_choose_section.title') is-invalid @enderror"
                                                value="{{ old('page_content.why_choose_section.title', $data->page_content['why_choose_section']['title'] ?? '') }}">
                                            @error('page_content.why_choose_section.title')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="why-choose-points-container">
                                            <label class="form-label fw-semibold">{{ __('Points') }}</label>
                                            @php
                                                $whyChoosePoints = old(
                                                    'page_content.why_choose_section.points',
                                                    $data->page_content['why_choose_section']['points'] ?? [],
                                                );
                                                if (empty($whyChoosePoints)) {
                                                    $whyChoosePoints = [['strong_text' => '', 'text' => '']];
                                                }
                                            @endphp
                                            @foreach ($whyChoosePoints as $index => $point)
                                                <div class="why-choose-point-item row mb-2">
                                                    <div class="col-md-4">
                                                        <input type="text"
                                                            name="page_content[why_choose_section][points][{{ $index }}][strong_text]"
                                                            class="form-control" placeholder="Strong Text"
                                                            value="{{ $point['strong_text'] ?? '' }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <textarea name="page_content[why_choose_section][points][{{ $index }}][text]" class="form-control"
                                                            rows="2" placeholder="Description">{{ $point['text'] ?? '' }}</textarea>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button"
                                                            class="btn btn-danger remove-why-choose-point">Remove</button>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <button type="button" class="btn btn-success add-why-choose-point">Add
                                                More Point</button>
                                        </div>
                                        @error('page_content.why_choose_section.points')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                             <div class="col-lg-12 mb-4 mt-5">
                                <h3 class="fw-semibold mb-3">{{ __('FAQs') }}</h3>
                                <div class="faqs-container">
                                    @php
                                        $faqs = old('faqs', $data->faqs ?? []);
                                        if (empty($faqs)) {
                                            $faqs = [['question' => '', 'answer' => '']];
                                        }
                                    @endphp
                                    @foreach ($faqs as $index => $faq)
                                        <div class="faq-item row mb-2">
                                            <div class="col-md-5">
                                                <input type="text" name="faqs[{{ $index }}][question]"
                                                    class="form-control @error('faqs.' . $index . '.question') is-invalid @enderror"
                                                    placeholder="Question"
                                                    value="{{ $faq['question'] ?? '' }}">
                                                @error('faqs.' . $index . '.question')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-5">
                                                <textarea name="faqs[{{ $index }}][answer]" class="form-control @error('faqs.' . $index . '.answer') is-invalid @enderror"
                                                    rows="2" placeholder="Answer">{{ $faq['answer'] ?? '' }}</textarea>
                                                @error('faqs.' . $index . '.answer')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="btn btn-danger remove-faq">Remove</button>
                                            </div>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-success add-faq">Add More</button>
                                </div>
                            </div>

                             {{-- Yaha pa b hum ne FAQ wala section bana hai .. same like jesa k hum ne services ma bana tha --}}
                            <div class="col-lg-12 mb-4 mt-5">
                                <h3 class="fw-semibold mb-3">{{ __('SEO Section') }}</h3>
                                <div class="col-lg-12 mb-4">
                                    <label for="meta_title"
                                        class="form-label fw-semibold">{{ __('Meta Title') }}</label>
                                    <input type="text" id="meta_title" name="meta_title"
                                        class="form-control form-control-lg @error('meta_title') is-invalid @enderror"
                                        value="{{ old('meta_title', $data->meta_title ?? '') }}">
                                    @error('meta_title')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-4">
                                    <label for="meta_keywords"
                                        class="form-label fw-semibold">{{ __('Meta Keyword') }}</label>
                                    <input type="text" id="meta_keywords" name="meta_keywords"
                                        class="form-control form-control-lg @error('meta_keywords') is-invalid @enderror"
                                        value="{{ old('meta_keywords', $data->meta_keywords ?? '') }}">

                                    @error('meta_keywords')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>



                                <div class="col-lg-12 mb-4">
                                    <label for="meta_description"
                                        class="form-label fw-semibold">{{ __('Meta Description') }}</label>
                                    <textarea id="meta_description" name="meta_description"
                                        class="form-control form-control-lg @error('meta_description') is-invalid @enderror" rows="5">{{ old('meta_description', $data->meta_description ?? '') }}</textarea>
                                    @error('meta_description')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">
                                    @include('partials/general/_button-indicator', [
                                        'label' => isset($data->id) ? 'Update' : 'Create',
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

                // Main Points Add/Remove
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('add-main-point') || e.target.closest('.add-main-point')) {
                        const container = document.querySelector('.main-points-container');
                        const items = container.querySelectorAll('.main-point-item');
                        const newIndex = items.length;
                        const newItem = document.createElement('div');
                        newItem.className = 'input-group mb-2 main-point-item';
                        newItem.innerHTML = `
                            <input type="text" name="main_points[${newIndex}]" class="form-control" placeholder="Enter main point">
                            <button type="button" class="btn btn-danger remove-main-point">
                                <i class="bi bi-trash"></i>
                            </button>
                        `;
                        container.insertBefore(newItem, document.querySelector('.add-main-point'));
                    }

                    if (e.target.classList.contains('remove-main-point') || e.target.closest(
                            '.remove-main-point')) {
                        if (confirm('Are you sure you want to remove this main point?')) {
                            e.target.closest('.main-point-item').remove();
                        }
                    }

                    // Campaign Points
                    if (e.target.classList.contains('add-campaign-point') || e.target.closest(
                            '.add-campaign-point')) {
                        const container = document.querySelector('.campaign-points-container');
                        const items = container.querySelectorAll('.campaign-point-item');
                        const newIndex = items.length;
                        const newItem = document.createElement('div');
                        newItem.className = 'input-group mb-2 campaign-point-item';
                        newItem.innerHTML = `
                            <input type="text" name="page_content[campaign_section][points][${newIndex}]" class="form-control" placeholder="Enter campaign point">
                            <button type="button" class="btn btn-danger remove-campaign-point">
                                <i class="bi bi-trash"></i>
                            </button>
                        `;
                        container.insertBefore(newItem, document.querySelector('.add-campaign-point'));
                    }

                    if (e.target.classList.contains('remove-campaign-point') || e.target.closest(
                            '.remove-campaign-point')) {
                        if (confirm('Are you sure you want to remove this campaign point?')) {
                            e.target.closest('.campaign-point-item').remove();
                        }
                    }

                    // Development Steps
                    if (e.target.classList.contains('add-step') || e.target.closest('.add-step')) {
                        const container = document.querySelector('.development-steps-container');
                        const items = container.querySelectorAll('.step-item');
                        const newIndex = items.length;
                        const newItem = document.createElement('div');
                        newItem.className = 'step-item card mb-2';
                        newItem.innerHTML = `
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="text" name="page_content[development_process][steps][${newIndex}][title]" class="form-control" placeholder="Step Title">
                                    </div>
                                    <div class="col-md-5">
                                        <textarea name="page_content[development_process][steps][${newIndex}][description]" class="form-control" rows="2" placeholder="Step Description"></textarea>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-step">Remove</button>
                                    </div>
                                </div>
                            </div>
                        `;
                        container.insertBefore(newItem, document.querySelector('.add-step'));
                    }

                    if (e.target.classList.contains('remove-step') || e.target.closest('.remove-step')) {
                        if (confirm('Are you sure you want to remove this step?')) {
                            e.target.closest('.step-item').remove();
                        }
                    }

                    // Commitment Points
                    if (e.target.classList.contains('add-commitment-point') || e.target.closest(
                            '.add-commitment-point')) {
                        const container = document.querySelector('.commitments-points-container');
                        const items = container.querySelectorAll('.commitment-point-item');
                        const newIndex = items.length;
                        const newItem = document.createElement('div');
                        newItem.className = 'commitment-point-item card mb-2';
                        newItem.innerHTML = `
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <input type="file" name="commitment_icons[${newIndex}]" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="page_content[commitments_section][points][${newIndex}][title]" class="form-control" placeholder="Title">
                                    </div>
                                    <div class="col-md-4">
                                        <textarea name="page_content[commitments_section][points][${newIndex}][sub_title]" class="form-control" rows="2" placeholder="Sub Title"></textarea>
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-commitment-point">Remove</button>
                                    </div>
                                </div>
                            </div>
                        `;
                        container.insertBefore(newItem, document.querySelector('.add-commitment-point'));
                    }

                    if (e.target.classList.contains('remove-commitment-point') || e.target.closest(
                            '.remove-commitment-point')) {
                        if (confirm('Are you sure you want to remove this commitment point?')) {
                            e.target.closest('.commitment-point-item').remove();
                        }
                    }

                    // Why Choose Points
                    if (e.target.classList.contains('add-why-choose-point') || e.target.closest(
                            '.add-why-choose-point')) {
                        const container = document.querySelector('.why-choose-points-container');
                        const items = container.querySelectorAll('.why-choose-point-item');
                        const newIndex = items.length;
                        const newItem = document.createElement('div');
                        newItem.className = 'why-choose-point-item row mb-2';
                        newItem.innerHTML = `
                            <div class="col-md-4">
                                <input type="text" name="page_content[why_choose_section][points][${newIndex}][strong_text]" class="form-control" placeholder="Strong Text">
                            </div>
                            <div class="col-md-6">
                                <textarea name="page_content[why_choose_section][points][${newIndex}][text]" class="form-control" rows="2" placeholder="Description"></textarea>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger remove-why-choose-point">Remove</button>
                            </div>
                        `;
                        container.insertBefore(newItem, document.querySelector('.add-why-choose-point'));
                    }

                    if (e.target.classList.contains('remove-why-choose-point') || e.target.closest(
                            '.remove-why-choose-point')) {
                        if (confirm('Are you sure you want to remove this why choose point?')) {
                            e.target.closest('.why-choose-point-item').remove();
                        }
                    }
                });

                // Add/Remove FAQs
                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('add-faq')) {
                        const container = e.target.closest('.faqs-container');
                        const faqItems = container.querySelectorAll('.faq-item');
                        const newIndex = faqItems.length;
                        const newFaq = document.createElement('div');
                        newFaq.className = 'faq-item row mb-2';
                        newFaq.innerHTML = `
                            <div class="col-md-5">
                                <input type="text" name="faqs[${newIndex}][question]" class="form-control" placeholder="Question">
                            </div>
                            <div class="col-md-5">
                                <textarea name="faqs[${newIndex}][answer]" class="form-control" rows="2" placeholder="Answer"></textarea>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger remove-faq">Remove</button>
                            </div>
                        `;
                        container.insertBefore(newFaq, e.target);
                    }

                    if (e.target.classList.contains('remove-faq')) {
                        if (confirm('Are you sure you want to remove this FAQ?')) {
                            e.target.closest('.faq-item').remove();
                        }
                    }
                });


            });
        </script>
    @endpush

</x-default-layout>
