<x-default-layout>

    @php
        // Edit or Create
        $isEdit = isset($industry) && !empty($industry->id);

        $url = $isEdit ? route('admin.industries.update', $industry->id) : route('admin.industries.store');

        // sub_details array (for edit)
        $sub = old('sub_details', $industry->sub_details ?? []);

        // HERO SLIDER
        $heroSlider = data_get($sub, 'hero_slider', []);
        if (empty($heroSlider)) {
            $heroSlider = [
                [
                    'title' => '',
                    'excerpt' => '',
                    'description' => '',
                    'image' => '',
                    'image_alt' => '',
                    'gallery_images' => [],
                    'sort_order' => 1,
                ],
            ];
        }

        // ACCORDION SECTION (first one)
        $accordionSection = data_get($sub, 'detail_accordion_section', []);
        $accordionItems = data_get($accordionSection, 'items', []);
        if (empty($accordionItems)) {
            $accordionItems = [['title' => '', 'content' => '', 'sort_order' => 1]];
        }

        // TABS SECTION
        $tabsSection = data_get($sub, 'detail_tabs_section', []);
        $tabsItems = data_get($tabsSection, 'items', []);
        if (empty($tabsItems)) {
            $tabsItems = [['title' => '', 'content' => '', 'sort_order' => 1]];
        }

        // SERVICES SECTION
        $servicesSection = data_get($sub, 'detail_services_section', []);
        $servicesDescription = data_get($servicesSection, 'description', '');
        $servicesAccordionItems = data_get($servicesSection, 'accordion_items', []);
        if (empty($servicesAccordionItems)) {
            $servicesAccordionItems = [['title' => '', 'content' => '', 'sort_order' => 1]];
        }

        // EXPERIENCE SECTION
        $experienceSection = data_get($sub, 'detail_experience_section', []);
        $experienceImages = data_get($experienceSection, 'images', []);
        if (empty($experienceImages)) {
            $experienceImages = ['', '', '', '']; // expecting 4 images
        }
    @endphp

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">

                <div class="card-header p-5 rounded-top">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        <h3 class="fw-bolder mb-0">
                            {{ $isEdit ? __('Edit Industry') : __('Create Industry') }}
                        </h3>

                        <a href="{{ route('admin.industries.list') }}" class="btn btn-light btn-md">
                            <i class="bi bi-arrow-left me-2"></i>{{ __('Back to List') }}
                        </a>
                    </div>
                </div>

                <div class="card-body p-5">
                    <form action="{{ $url }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if ($isEdit)
                            @method('PUT')
                        @endif

                        <div class="row">

                            {{-- ===================== BASIC FIELDS ===================== --}}
                            <div class="col-lg-6 mb-4">
                                <label class="form-label fw-semibold required">{{ __('Name') }}</label>
                                <input type="text" name="name"
                                    class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    value="{{ old('name', $industry->name ?? '') }}" required>
                                @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label class="form-label fw-semibold required">{{ __('Slug') }}</label>
                                <input type="text" name="slug"
                                    class="form-control form-control-lg @error('slug') is-invalid @enderror"
                                    value="{{ old('slug', $industry->slug ?? '') }}" required>
                                @error('slug')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-12 mb-4">
                                <label class="form-label fw-semibold">{{ __('Description') }}</label>
                                <textarea name="description" rows="4"
                                    class="form-control form-control-lg @error('description') is-invalid @enderror">{{ old('description', $industry->description ?? '') }}</textarea>
                                @error('description')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label class="form-label fw-semibold">{{ __('Image') }}</label>
                                <input type="file" id="image" name="image"
                                    class="form-control form-control-lg @error('image') is-invalid @enderror"
                                    accept="image/*">
                                @if ($isEdit && !empty($industry->image))
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $industry->image) }}" alt="image"
                                            width="120">
                                    </div>
                                @endif
                                @error('image')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-lg-6 mb-4">
                                <label class="form-label fw-semibold">{{ __('Image Alt') }}</label>
                                <input type="text" name="image_alt"
                                    class="form-control form-control-lg @error('image_alt') is-invalid @enderror"
                                    value="{{ old('image_alt', $industry->image_alt ?? '') }}">
                                @error('image_alt')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- ===================== SUB DETAILS JSON ===================== --}}
                            <div class="col-lg-12 mt-5">
                                <h3 class="fw-semibold mb-3">{{ __('Industry Detail (sub_details)') }}</h3>
                            </div>

                            {{-- HERO --}}
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header p-5 rounded-top">
                                        <h3 class="fw-bolder mb-0">{{ __('Hero Section') }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Hero Kicker') }}</label>
                                                <input type="text" name="sub_details[hero_kicker]"
                                                    class="form-control @error('sub_details.hero_kicker') is-invalid @enderror"
                                                    value="{{ data_get($sub, 'hero_kicker', '') }}">
                                                @error('sub_details.hero_kicker')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Hero Title') }}</label>
                                                <input type="text" name="sub_details[hero_title]"
                                                    class="form-control @error('sub_details.hero_title') is-invalid @enderror"
                                                    value="{{ data_get($sub, 'hero_title', '') }}">
                                                @error('sub_details.hero_title')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label
                                                    class="form-label fw-semibold">{{ __('Hero Side Title') }}</label>
                                                <input type="text" name="sub_details[hero_side_title]"
                                                    class="form-control @error('sub_details.hero_side_title') is-invalid @enderror"
                                                    value="{{ data_get($sub, 'hero_side_title', '') }}">
                                                @error('sub_details.hero_side_title')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label
                                                    class="form-label fw-semibold">{{ __('Hero Side Description') }}</label>
                                                <textarea name="sub_details[hero_side_description]" rows="3"
                                                    class="form-control @error('sub_details.hero_side_description') is-invalid @enderror">{{ data_get($sub, 'hero_side_description', '') }}</textarea>
                                                @error('sub_details.hero_side_description')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label
                                                    class="form-label fw-semibold">{{ __('Hero Bottom Text') }}</label>
                                                <input type="text" name="sub_details[hero_bottom_text]"
                                                    class="form-control @error('sub_details.hero_bottom_text') is-invalid @enderror"
                                                    value="{{ data_get($sub, 'hero_bottom_text', '') }}">
                                                @error('sub_details.hero_bottom_text')
                                                    <div class="text-danger mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- HERO SLIDER --}}
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header p-5 rounded-top">
                                        <h3 class="fw-bolder mb-0">{{ __('Hero Slider') }}</h3>
                                    </div>

                                    <div class="card-body" id="heroSliderContainer">
                                        @foreach ($heroSlider as $i => $slide)
                                            <div class="border rounded p-4 mb-4 hero-slide-item"
                                                data-index="{{ $i }}">
                                                <div class="d-flex justify-content-between align-items-center mb-3">
                                                    <h5 class="mb-0">{{ __('Slide') }} #{{ $i + 1 }}</h5>
                                                    <button type="button"
                                                        class="btn btn-danger btn-sm remove-hero-slide">
                                                        {{ __('Remove') }}
                                                    </button>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6 mb-3">
                                                        <label
                                                            class="form-label fw-semibold">{{ __('Title') }}</label>
                                                        <input type="text"
                                                            name="sub_details[hero_slider][{{ $i }}][title]"
                                                            class="form-control" value="{{ $slide['title'] ?? '' }}">
                                                    </div>

                                                    <div class="col-lg-6 mb-3">
                                                        <label
                                                            class="form-label fw-semibold">{{ __('Excerpt') }}</label>
                                                        <input type="text"
                                                            name="sub_details[hero_slider][{{ $i }}][excerpt]"
                                                            class="form-control"
                                                            value="{{ $slide['excerpt'] ?? '' }}">
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <label
                                                            class="form-label fw-semibold">{{ __('Description (CKEditor)') }}</label>
                                                        <textarea name="sub_details[hero_slider][{{ $i }}][description]"
                                                            class="form-control hero-slider-description" rows="4">{{ $slide['description'] ?? '' }}</textarea>
                                                    </div>

                                                    <div class="col-lg-4 mb-3">
                                                        <label
                                                            class="form-label fw-semibold">{{ __('Image') }}</label>
                                                        <input type="file"
                                                            name="hero_slider_image[{{ $i }}]"
                                                            class="form-control" accept="image/*">
                                                        @if (!empty($slide['image']))
                                                            <div class="mt-2">
                                                                <img src="{{ asset('storage/' . $slide['image']) }}"
                                                                    width="120" alt="">
                                                                <input type="hidden"
                                                                    name="sub_details[hero_slider][{{ $i }}][image]"
                                                                    value="{{ $slide['image'] }}">
                                                            </div>
                                                        @endif
                                                    </div>

                                                    <div class="col-lg-4 mb-3">
                                                        <label
                                                            class="form-label fw-semibold">{{ __('Image Alt') }}</label>
                                                        <input type="text"
                                                            name="sub_details[hero_slider][{{ $i }}][image_alt]"
                                                            class="form-control"
                                                            value="{{ $slide['image_alt'] ?? '' }}">
                                                    </div>

                                                    <div class="col-lg-4 mb-3">
                                                        <label
                                                            class="form-label fw-semibold">{{ __('Sort Order') }}</label>
                                                        <input type="number" min="0"
                                                            name="sub_details[hero_slider][{{ $i }}][sort_order]"
                                                            class="form-control"
                                                            value="{{ $slide['sort_order'] ?? $i + 1 }}">
                                                    </div>

                                                    <div class="col-lg-12 mb-3">
                                                        <label
                                                            class="form-label fw-semibold">{{ __('Gallery Images') }}</label>
                                                        <input type="file"
                                                            name="hero_slider_gallery[{{ $i }}][]"
                                                            class="form-control" accept="image/*" multiple>

                                                        @php $gImgs = $slide['gallery_images'] ?? []; @endphp
                                                        @if (!empty($gImgs))
                                                            <div class="mt-2 d-flex flex-wrap gap-2">
                                                                @foreach ($gImgs as $gk => $gimg)
                                                                    <div class="border p-2 rounded">
                                                                        <img src="{{ asset('storage/' . $gimg) }}"
                                                                            width="80" alt="">
                                                                        <input type="hidden"
                                                                            name="sub_details[hero_slider][{{ $i }}][gallery_images][{{ $gk }}]"
                                                                            value="{{ $gimg }}">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-success btn-sm" id="addHeroSlide">
                                            {{ __('Add Slide') }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- DETAIL ACCORDION SECTION --}}
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header p-5 rounded-top">
                                        <h3 class="fw-bolder mb-0">{{ __('Detail Accordion Section') }}</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label
                                                    class="form-label fw-semibold">{{ __('Section Title') }}</label>
                                                <input type="text"
                                                    name="sub_details[detail_accordion_section][title]"
                                                    class="form-control"
                                                    value="{{ data_get($accordionSection, 'title', '') }}">
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label
                                                    class="form-label fw-semibold">{{ __('Section Description') }}</label>
                                                <textarea name="sub_details[detail_accordion_section][description]" rows="3" class="form-control">{{ data_get($accordionSection, 'description', '') }}</textarea>
                                            </div>

                                            <div class="col-lg-4 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Image') }}</label>
                                                <input type="file"
                                                    name="sub_details[detail_accordion_section][image]"
                                                    class="form-control" accept="image/*">
                                                @if (!empty($accordionSection['image']))
                                                    <div class="mt-2">
                                                        <img src="{{ asset('storage/' . $accordionSection['image']) }}"
                                                            width="120" alt="">
                                                        <input type="hidden"
                                                            name="sub_details[detail_accordion_section][image]"
                                                            value="{{ $accordionSection['image'] }}">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>

                                        <div id="accordionItemsContainer">
                                            @foreach ($accordionItems as $i => $item)
                                                <div class="border rounded p-4 mb-3 accordion-item-row"
                                                    data-index="{{ $i }}">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mb-3">
                                                        <h5 class="mb-0">{{ __('Item') }} #{{ $i + 1 }}
                                                        </h5>
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm remove-accordion-item">
                                                            {{ __('Remove') }}
                                                        </button>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-5 mb-3">
                                                            <label
                                                                class="form-label fw-semibold">{{ __('Title') }}</label>
                                                            <input type="text"
                                                                name="sub_details[detail_accordion_section][items][{{ $i }}][title]"
                                                                class="form-control"
                                                                value="{{ $item['title'] ?? '' }}">
                                                        </div>

                                                        <div class="col-lg-5 mb-3">
                                                            <label
                                                                class="form-label fw-semibold">{{ __('Content') }}</label>
                                                            <textarea name="sub_details[detail_accordion_section][items][{{ $i }}][content]" class="form-control"
                                                                rows="3">{{ $item['content'] ?? '' }}</textarea>
                                                        </div>

                                                        <div class="col-lg-2 mb-3">
                                                            <label
                                                                class="form-label fw-semibold">{{ __('Sort Order') }}</label>
                                                            <input type="number" min="0"
                                                                name="sub_details[detail_accordion_section][items][{{ $i }}][sort_order]"
                                                                class="form-control"
                                                                value="{{ $item['sort_order'] ?? $i + 1 }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-success btn-sm" id="addAccordionItem">
                                            {{ __('Add Item') }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- DETAIL TABS SECTION --}}
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header p-5 rounded-top">
                                        <h3 class="fw-bolder mb-0">{{ __('Detail Tabs Section') }}</h3>
                                    </div>
                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-12 mb-3">
                                                <label
                                                    class="form-label fw-semibold">{{ __('Section Title') }}</label>
                                                <input type="text" name="sub_details[detail_tabs_section][title]"
                                                    class="form-control"
                                                    value="{{ data_get($tabsSection, 'title', '') }}">
                                            </div>
                                        </div>

                                        <div id="tabsItemsContainer">
                                            @foreach ($tabsItems as $i => $tab)
                                                <div class="border rounded p-4 mb-3 tab-item-row"
                                                    data-index="{{ $i }}">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mb-3">
                                                        <h5 class="mb-0">{{ __('Tab') }} #{{ $i + 1 }}
                                                        </h5>
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm remove-tab-item">
                                                            {{ __('Remove') }}
                                                        </button>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-5 mb-3">
                                                            <label
                                                                class="form-label fw-semibold">{{ __('Tab Title') }}</label>
                                                            <input type="text"
                                                                name="sub_details[detail_tabs_section][items][{{ $i }}][title]"
                                                                class="form-control"
                                                                value="{{ $tab['title'] ?? '' }}">
                                                        </div>

                                                        <div class="col-lg-5 mb-3">
                                                            <label
                                                                class="form-label fw-semibold">{{ __('Tab Content') }}</label>
                                                            <textarea name="sub_details[detail_tabs_section][items][{{ $i }}][content]" class="form-control"
                                                                rows="3">{{ $tab['content'] ?? '' }}</textarea>
                                                        </div>

                                                        <div class="col-lg-2 mb-3">
                                                            <label
                                                                class="form-label fw-semibold">{{ __('Sort Order') }}</label>
                                                            <input type="number" min="0"
                                                                name="sub_details[detail_tabs_section][items][{{ $i }}][sort_order]"
                                                                class="form-control"
                                                                value="{{ $tab['sort_order'] ?? $i + 1 }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-success btn-sm" id="addTabItem">
                                            {{ __('Add Tab') }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- DETAIL SERVICES SECTION --}}
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header p-5 rounded-top">
                                        <h3 class="fw-bolder mb-0">{{ __('Detail Services Section') }}</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Title') }}</label>
                                                <input type="text"
                                                    name="sub_details[detail_services_section][title]"
                                                    class="form-control"
                                                    value="{{ data_get($servicesSection, 'title', '') }}">
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label
                                                    class="form-label fw-semibold">{{ __('Highlight Text') }}</label>
                                                <input type="text"
                                                    name="sub_details[detail_services_section][highlight_text]"
                                                    class="form-control"
                                                    value="{{ data_get($servicesSection, 'highlight_text', '') }}">
                                            </div>

                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Description') }}</label>
                                                <textarea name="sub_details[detail_services_section][description]" class="form-control" rows="4">{{ $servicesDescription }}</textarea>
                                            </div>
                                        </div>

                                        <hr>

                                        <h5 class="fw-semibold mb-3">{{ __('Accordion Items') }}</h5>

                                        <div id="servicesAccordionItemsContainer">
                                            @foreach ($servicesAccordionItems as $i => $item)
                                                <div class="border rounded p-4 mb-3 services-accordion-row"
                                                    data-index="{{ $i }}">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center mb-3">
                                                        <h5 class="mb-0">{{ __('Item') }} #{{ $i + 1 }}
                                                        </h5>
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm remove-services-accordion">
                                                            {{ __('Remove') }}
                                                        </button>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-5 mb-3">
                                                            <label
                                                                class="form-label fw-semibold">{{ __('Title') }}</label>
                                                            <input type="text"
                                                                name="sub_details[detail_services_section][accordion_items][{{ $i }}][title]"
                                                                class="form-control"
                                                                value="{{ $item['title'] ?? '' }}">
                                                        </div>

                                                        <div class="col-lg-5 mb-3">
                                                            <label
                                                                class="form-label fw-semibold">{{ __('Content') }}</label>
                                                            <textarea name="sub_details[detail_services_section][accordion_items][{{ $i }}][content]"
                                                                class="form-control" rows="3">{{ $item['content'] ?? '' }}</textarea>
                                                        </div>

                                                        <div class="col-lg-2 mb-3">
                                                            <label
                                                                class="form-label fw-semibold">{{ __('Sort Order') }}</label>
                                                            <input type="number" min="0"
                                                                name="sub_details[detail_services_section][accordion_items][{{ $i }}][sort_order]"
                                                                class="form-control"
                                                                value="{{ $item['sort_order'] ?? $i + 1 }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    <div class="card-footer">
                                        <button type="button" class="btn btn-success btn-sm"
                                            id="addServicesAccordionItem">
                                            {{ __('Add Accordion Item') }}
                                        </button>
                                    </div>
                                </div>
                            </div>

                            {{-- DETAIL EXPERIENCE SECTION --}}
                            <div class="col-lg-12">
                                <div class="card mb-4">
                                    <div class="card-header p-5 rounded-top">
                                        <h3 class="fw-bolder mb-0">{{ __('Detail Experience Section') }}</h3>
                                    </div>

                                    <div class="card-body">
                                        <div class="row">

                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Title') }}</label>
                                                <input type="text"
                                                    name="sub_details[detail_experience_section][title]"
                                                    class="form-control"
                                                    value="{{ data_get($experienceSection, 'title', '') }}">
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">{{ __('CTA Label') }}</label>
                                                <input type="text"
                                                    name="sub_details[detail_experience_section][cta_label]"
                                                    class="form-control"
                                                    value="{{ data_get($experienceSection, 'cta_label', '') }}">
                                            </div>

                                            <div class="col-lg-6 mb-3">
                                                <label class="form-label fw-semibold">{{ __('CTA URL') }}</label>
                                                <input type="text"
                                                    name="sub_details[detail_experience_section][cta_url]"
                                                    class="form-control"
                                                    value="{{ data_get($experienceSection, 'cta_url', '') }}">
                                            </div>

                                            <div class="col-lg-12 mb-3">
                                                <label class="form-label fw-semibold">{{ __('Images (4)') }}</label>
                                                <div class="row">
                                                    @foreach ($experienceImages as $ei => $imgPath)
                                                        <div class="col-lg-3 mb-3">
                                                            <input type="file"
                                                                name="experience_images[{{ $ei }}]"
                                                                class="form-control" accept="image/*">
                                                            @if (!empty($imgPath))
                                                                <div class="mt-2">
                                                                    <img src="{{ asset('storage/' . $imgPath) }}"
                                                                        width="110" alt="">
                                                                    <input type="hidden"
                                                                        name="sub_details[detail_experience_section][images][{{ $ei }}]"
                                                                        value="{{ $imgPath }}">
                                                                </div>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        @error('general')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                @include('partials/general/_button-indicator', [
                                    'label' => $isEdit ? 'Update' : 'Create',
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

                // Image validation (if you have validateFile helper like services page)
                const imageInput = document.getElementById('image');
                if (imageInput) {
                    if (!document.getElementById('image_error')) {
                        let err = document.createElement('div');
                        err.id = 'image_error';
                        err.classList.add('text-danger', 'mt-1');
                        imageInput.parentNode.appendChild(err);
                    }

                    imageInput.addEventListener('change', function() {
                        if (typeof validateFile === 'function') {
                            validateFile(imageInput, 'image_error');
                        }
                    });
                }

                // Helper: reindex repeated fields after remove
                function reIndex(containerSelector, itemSelector, buildFn) {
                    const container = document.querySelector(containerSelector);
                    if (!container) return;

                    const items = container.querySelectorAll(itemSelector);
                    items.forEach((item, index) => {
                        item.dataset.index = index;
                        if (typeof buildFn === 'function') buildFn(item, index);
                    });
                }

                // CKEditor instances storage
                const ckeditorInstances = new Map();

                // Function to initialize CKEditor for a textarea
                function initCKEditor(textarea) {
                    if (!textarea || ckeditorInstances.has(textarea)) {
                        return;
                    }

                    const uniqueId = 'ckeditor_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
                    textarea.id = uniqueId;

                    ClassicEditor
                        .create(textarea, {
                            ckfinder: {
                                uploadUrl: "{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}&dir=industries/ckeditor"
                            }
                        })
                        .then(editorInstance => {
                            ckeditorInstances.set(textarea, editorInstance);
                            console.log(`CKEditor initialized for slider description`);
                        })
                        .catch(error => {
                            console.error(`CKEditor error:`, error);
                        });
                }

                // Initialize CKEditor for existing hero slider descriptions
                document.querySelectorAll('.hero-slider-description').forEach(textarea => {
                    initCKEditor(textarea);
                });

                // ===================== HERO SLIDER =====================
                const heroContainer = document.getElementById('heroSliderContainer');
                const addHeroSlideBtn = document.getElementById('addHeroSlide');

                function heroSlideTemplate(index) {
                    return `
                        <div class="border rounded p-4 mb-4 hero-slide-item" data-index="${index}">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Slide #${index + 1}</h5>
                                <button type="button" class="btn btn-danger btn-sm remove-hero-slide">Remove</button>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label class="form-label fw-semibold">Title</label>
                                    <input type="text" name="sub_details[hero_slider][${index}][title]" class="form-control">
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label class="form-label fw-semibold">Excerpt</label>
                                    <input type="text" name="sub_details[hero_slider][${index}][excerpt]" class="form-control">
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label class="form-label fw-semibold">Description (CKEditor)</label>
                                    <textarea name="sub_details[hero_slider][${index}][description]" class="form-control hero-slider-description" rows="4"></textarea>
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label fw-semibold">Image</label>
                                    <input type="file" name="hero_slider_image[${index}]" class="form-control" accept="image/*">
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label fw-semibold">Image Alt</label>
                                    <input type="text" name="sub_details[hero_slider][${index}][image_alt]" class="form-control">
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label class="form-label fw-semibold">Sort Order</label>
                                    <input type="number" min="0" name="sub_details[hero_slider][${index}][sort_order]" class="form-control" value="${index+1}">
                                </div>

                                <div class="col-lg-12 mb-3">
                                    <label class="form-label fw-semibold">Gallery Images</label>
                                    <input type="file" name="hero_slider_gallery[${index}][]" class="form-control" accept="image/*" multiple>
                                </div>
                            </div>
                        </div>
                    `;
                }

                if (addHeroSlideBtn && heroContainer) {
                    addHeroSlideBtn.addEventListener('click', function() {
                        const index = heroContainer.querySelectorAll('.hero-slide-item').length;
                        heroContainer.insertAdjacentHTML('beforeend', heroSlideTemplate(index));

                        // Initialize CKEditor for the newly added slider description
                        const newTextarea = heroContainer.querySelector(
                            '.hero-slide-item:last-child .hero-slider-description');
                        if (newTextarea) {
                            initCKEditor(newTextarea);
                        }
                    });
                }

                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-hero-slide')) {
                        if (confirm('Remove this slide?')) {
                            const slideItem = e.target.closest('.hero-slide-item');
                            const textarea = slideItem.querySelector('.hero-slider-description');

                            // Destroy CKEditor instance if exists
                            if (textarea && ckeditorInstances.has(textarea)) {
                                ckeditorInstances.get(textarea).destroy()
                                    .then(() => {
                                        ckeditorInstances.delete(textarea);
                                    })
                                    .catch(err => console.error('Error destroying CKEditor:', err));
                            }

                            slideItem.remove();
                        }
                    }
                });

                // ===================== ACCORDION ITEMS =====================
                const accordionContainer = document.getElementById('accordionItemsContainer');
                const addAccordionBtn = document.getElementById('addAccordionItem');

                function accordionItemTemplate(index) {
                    return `
                        <div class="border rounded p-4 mb-3 accordion-item-row" data-index="${index}">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Item #${index + 1}</h5>
                                <button type="button" class="btn btn-danger btn-sm remove-accordion-item">Remove</button>
                            </div>

                            <div class="row">
                                <div class="col-lg-5 mb-3">
                                    <label class="form-label fw-semibold">Title</label>
                                    <input type="text" name="sub_details[detail_accordion_section][items][${index}][title]" class="form-control">
                                </div>

                                <div class="col-lg-5 mb-3">
                                    <label class="form-label fw-semibold">Content</label>
                                    <textarea name="sub_details[detail_accordion_section][items][${index}][content]" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="col-lg-2 mb-3">
                                    <label class="form-label fw-semibold">Sort Order</label>
                                    <input type="number" min="0" name="sub_details[detail_accordion_section][items][${index}][sort_order]" class="form-control" value="${index+1}">
                                </div>
                            </div>
                        </div>
                    `;
                }

                if (addAccordionBtn && accordionContainer) {
                    addAccordionBtn.addEventListener('click', function() {
                        const index = accordionContainer.querySelectorAll('.accordion-item-row').length;
                        accordionContainer.insertAdjacentHTML('beforeend', accordionItemTemplate(index));
                    });
                }

                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-accordion-item')) {
                        if (confirm('Remove this item?')) {
                            e.target.closest('.accordion-item-row').remove();
                        }
                    }
                });

                // ===================== TABS ITEMS =====================
                const tabsContainer = document.getElementById('tabsItemsContainer');
                const addTabBtn = document.getElementById('addTabItem');

                function tabItemTemplate(index) {
                    return `
                        <div class="border rounded p-4 mb-3 tab-item-row" data-index="${index}">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Tab #${index + 1}</h5>
                                <button type="button" class="btn btn-danger btn-sm remove-tab-item">Remove</button>
                            </div>

                            <div class="row">
                                <div class="col-lg-5 mb-3">
                                    <label class="form-label fw-semibold">Tab Title</label>
                                    <input type="text" name="sub_details[detail_tabs_section][items][${index}][title]" class="form-control">
                                </div>

                                <div class="col-lg-5 mb-3">
                                    <label class="form-label fw-semibold">Tab Content</label>
                                    <textarea name="sub_details[detail_tabs_section][items][${index}][content]" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="col-lg-2 mb-3">
                                    <label class="form-label fw-semibold">Sort Order</label>
                                    <input type="number" min="0" name="sub_details[detail_tabs_section][items][${index}][sort_order]" class="form-control" value="${index+1}">
                                </div>
                            </div>
                        </div>
                    `;
                }

                if (addTabBtn && tabsContainer) {
                    addTabBtn.addEventListener('click', function() {
                        const index = tabsContainer.querySelectorAll('.tab-item-row').length;
                        tabsContainer.insertAdjacentHTML('beforeend', tabItemTemplate(index));
                    });
                }

                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-tab-item')) {
                        if (confirm('Remove this tab?')) {
                            e.target.closest('.tab-item-row').remove();
                        }
                    }
                });

                // ===================== SERVICES ACCORDION ITEMS =====================
                const servicesAccContainer = document.getElementById('servicesAccordionItemsContainer');
                const addServicesAccBtn = document.getElementById('addServicesAccordionItem');

                function servicesAccordionTemplate(index) {
                    return `
                        <div class="border rounded p-4 mb-3 services-accordion-row" data-index="${index}">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h5 class="mb-0">Item #${index + 1}</h5>
                                <button type="button" class="btn btn-danger btn-sm remove-services-accordion">Remove</button>
                            </div>

                            <div class="row">
                                <div class="col-lg-5 mb-3">
                                    <label class="form-label fw-semibold">Title</label>
                                    <input type="text" name="sub_details[detail_services_section][accordion_items][${index}][title]" class="form-control">
                                </div>

                                <div class="col-lg-5 mb-3">
                                    <label class="form-label fw-semibold">Content</label>
                                    <textarea name="sub_details[detail_services_section][accordion_items][${index}][content]" class="form-control" rows="3"></textarea>
                                </div>

                                <div class="col-lg-2 mb-3">
                                    <label class="form-label fw-semibold">Sort Order</label>
                                    <input type="number" min="0" name="sub_details[detail_services_section][accordion_items][${index}][sort_order]" class="form-control" value="${index+1}">
                                </div>
                            </div>
                        </div>
                    `;
                }

                if (addServicesAccBtn && servicesAccContainer) {
                    addServicesAccBtn.addEventListener('click', function() {
                        const index = servicesAccContainer.querySelectorAll('.services-accordion-row').length;
                        servicesAccContainer.insertAdjacentHTML('beforeend', servicesAccordionTemplate(index));
                    });
                }

                document.addEventListener('click', function(e) {
                    if (e.target.classList.contains('remove-services-accordion')) {
                        if (confirm('Remove this item?')) {
                            e.target.closest('.services-accordion-row').remove();
                        }
                    }
                });

            });
        </script>
    @endpush

</x-default-layout>
