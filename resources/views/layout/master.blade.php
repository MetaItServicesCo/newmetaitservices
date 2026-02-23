<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {!! printHtmlAttributes('html') !!}>
<!--begin::Head-->

<head>
    <base href="" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="" />
    <link rel="canonical" href="{{ url()->current() }}" />

    {!! includeFavicon() !!}

    <!--begin::Fonts-->
    {!! includeFonts() !!}
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    @foreach (getGlobalAssets('css') as $path)
        {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
    @endforeach
    <!--end::Global Stylesheets Bundle-->

    <!--begin::Vendor Stylesheets(used by this page)-->
    @foreach (getVendors('css') as $path)
        {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
    @endforeach
    <!--end::Vendor Stylesheets-->

    <!--begin::Custom Stylesheets(optional)-->
    @foreach (getCustomCss() as $path)
        {!! sprintf('<link rel="stylesheet" href="%s">', asset($path)) !!}
    @endforeach
    <!--end::Custom Stylesheets-->

    <style>
        .image-preview-wrapper {
            position: relative;
            display: inline-block;
            margin-top: 0.5rem;
        }

        .image-remove-btn {
            position: absolute;
            top: -8px;
            right: -8px;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            border: none;
            background: #f1416c;
            color: #fff;
            font-size: 16px;
            line-height: 1;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .image-preview-removed img {
            display: none;
        }
    </style>

    @livewireStyles
</head>
<!--end::Head-->

<!--begin::Body-->

<body {!! printHtmlClasses('body') !!} {!! printHtmlAttributes('body') !!}>

    @include('partials/theme-mode/_init')

    @yield('content')

    <!--begin::Javascript-->
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    @foreach (getGlobalAssets() as $path)
        {!! sprintf('<script src="%s"></script>', asset($path)) !!}
    @endforeach
    <!--end::Global Javascript Bundle-->

    <!--begin::Vendors Javascript(used by this page)-->
    @foreach (getVendors('js') as $path)
        {!! sprintf('<script src="%s"></script>', asset($path)) !!}
    @endforeach
    <!--end::Vendors Javascript-->

    <!--begin::Custom Javascript(optional)-->
    @foreach (getCustomJs() as $path)
        {!! sprintf('<script src="%s"></script>', asset($path)) !!}
    @endforeach
    <!--end::Custom Javascript-->
    <script src="{{ asset('assets/plugins/custom/ckeditor/ckeditor-classic.bundle.js') }}"></script>

    @stack('scripts')
    <!--end::Javascript-->

    @if (session('success'))
        <script>
            toastr.success("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            toastr.error("{{ session('error') }}");
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const maxSize = 10000 * 1024; // 300 KB

            // Global function for file validation
            window.validateFile = function(input, errorContainerId) {
                const files = input.files;
                let errorMessage = '';

                for (let i = 0; i < files.length; i++) {
                    if (files[i].size > maxSize) {
                        errorMessage = `File "${files[i].name}" is too large. Maximum allowed size is 300 KB.`;
                        input.value = '';
                        break;
                    }
                }

                const errorContainer = document.getElementById(errorContainerId);
                if (errorContainer) {
                    errorContainer.textContent = errorMessage;
                }
            };
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const normalizeInputName = (name) => name.replace(/\W+/g, '_').replace(/^_+|_+$/g, '');

            document.querySelectorAll('input[type="file"]').forEach((input) => {
                if (input.multiple) {
                    return;
                }

                const container = input.closest('.image-input-group') || input.parentElement;
                if (!container) {
                    return;
                }

                const img = container.querySelector('img');
                if (!img) {
                    return;
                }

                const form = input.closest('form');
                if (!form || !input.name) {
                    return;
                }

                const normalized = normalizeInputName(input.name);
                if (!normalized) {
                    return;
                }

                const removeName = `remove_${normalized}`;
                let hidden = form.querySelector(`input[name="${removeName}"]`);
                if (!hidden) {
                    hidden = document.createElement('input');
                    hidden.type = 'hidden';
                    hidden.name = removeName;
                    hidden.value = '0';
                    form.appendChild(hidden);
                }

                if (container.querySelector('.image-remove-btn')) {
                    return;
                }

                const wrapper = document.createElement('div');
                wrapper.className = 'image-preview-wrapper';
                img.parentNode.insertBefore(wrapper, img);
                wrapper.appendChild(img);

                const removeBtn = document.createElement('button');
                removeBtn.type = 'button';
                removeBtn.className = 'image-remove-btn';
                removeBtn.innerHTML = '&times;';
                wrapper.appendChild(removeBtn);

                removeBtn.addEventListener('click', () => {
                    hidden.value = '1';
                    wrapper.classList.add('image-preview-removed');
                    input.value = '';
                });

                input.addEventListener('change', () => {
                    if (input.files && input.files.length > 0) {
                        hidden.value = '0';
                        wrapper.classList.remove('image-preview-removed');
                    }
                });
            });

            document.querySelectorAll('.gallery-remove-btn').forEach((btn) => {
                btn.addEventListener('click', () => {
                    const removeName = btn.dataset.removeName;
                    const removeValue = btn.dataset.removeValue;
                    const container = btn.closest('.gallery-image-item');
                    const form = btn.closest('form');

                    if (!removeName || !form) {
                        return;
                    }

                    if (removeValue) {
                        const existing = form.querySelector(
                            `input[name="${removeName}"][value="${removeValue}"]`
                        );
                        if (!existing) {
                            const hidden = document.createElement('input');
                            hidden.type = 'hidden';
                            hidden.name = removeName;
                            hidden.value = removeValue;
                            form.appendChild(hidden);
                        }
                    }

                    if (container) {
                        container.remove();
                    }
                });
            });
        });
    </script>


    <script>
        document.addEventListener('livewire:init', () => {
            Livewire.on('success', (message) => {
                toastr.success(message);
            });
            Livewire.on('error', (message) => {
                toastr.error(message);
            });

            Livewire.on('swal', (message, icon, confirmButtonText) => {
                if (typeof icon === 'undefined') {
                    icon = 'success';
                }
                if (typeof confirmButtonText === 'undefined') {
                    confirmButtonText = 'Ok, got it!';
                }
                Swal.fire({
                    text: message,
                    icon: icon,
                    buttonsStyling: false,
                    confirmButtonText: confirmButtonText,
                    customClass: {
                        confirmButton: 'btn btn-primary'
                    }
                });
            });
        });
    </script>

    @livewireScripts
</body>
<!--end::Body-->

</html>
