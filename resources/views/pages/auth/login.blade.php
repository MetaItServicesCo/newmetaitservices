<x-auth-layout>

    <!--begin::Form-->
    <form method="POST" class="form w-100" novalidate="novalidate" id="kt_sign_in_form" data-kt-redirect-url="{{ route('dashboard') }}" action="{{ route('login') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <!--begin::Title-->
            <h1 class="text-gray-900 fw-bolder mb-3">
                Sign In
            </h1>
            <!--end::Title-->
        </div>
        <!--begin::Heading-->

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent" value="mubeenmetait@gmail.com"/>
            <!--end::Email-->
        </div>

        <!--end::Input group--->
        <div class="fv-row mb-3">
            <!--begin::Password-->
            <div class="position-relative">
                <input type="password" placeholder="Password" name="password" autocomplete="off" class="form-control bg-transparent" value="Mubeen@123" id="login_password_field"/>
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" id="toggle_login_password" style="cursor: pointer;">
                    <i class="ki-duotone ki-eye-slash fs-2" id="login_eye_icon_slash">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                    </i>
                    <i class="ki-duotone ki-eye fs-2 d-none" id="login_eye_icon">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                </span>
            </div>
            <!--end::Password-->
        </div>
        <!--end::Input group--->

        <!--begin::Wrapper-->
        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
            <div></div>

            <!--begin::Link-->
            <a href="{{ route('password.request') }}" class="link-primary">
                Forgot Password ?
            </a>
            <!--end::Link-->
        </div>
        <!--end::Wrapper-->

        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                @include('partials/general/_button-indicator', ['label' => 'Sign In'])
            </button>
        </div>
        <!--end::Submit button-->

        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">
            Not a Member yet?

            <a href="{{ route('register') }}" class="link-primary">
                Sign up
            </a>
        </div>
        <!--end::Sign up-->
    </form>
    <!--end::Form-->

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleLoginPassword = document.getElementById('toggle_login_password');
            const loginPasswordField = document.getElementById('login_password_field');
            const loginEyeIconSlash = document.getElementById('login_eye_icon_slash');
            const loginEyeIcon = document.getElementById('login_eye_icon');

            if (toggleLoginPassword && loginPasswordField) {
                toggleLoginPassword.addEventListener('click', function(e) {
                    e.preventDefault();
                    const type = loginPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    loginPasswordField.setAttribute('type', type);
                    
                    loginEyeIconSlash.classList.toggle('d-none');
                    loginEyeIcon.classList.toggle('d-none');
                });
            }

            // Prevent duplicate SweetAlert modals
            let swalShown = false;
            const originalSwalFire = Swal.fire;
            Swal.fire = function(...args) {
                if (swalShown) {
                    return Promise.resolve({ isConfirmed: false });
                }
                swalShown = true;
                return originalSwalFire.apply(this, args).then(result => {
                    setTimeout(() => { swalShown = false; }, 1000);
                    return result;
                });
            };

            // Remove duplicate error messages
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    mutation.addedNodes.forEach(function(node) {
                        if (node.nodeType === 1 && node.classList && node.classList.contains('fv-plugins-message-container')) {
                            const parent = node.parentElement;
                            const errorMessages = parent.querySelectorAll('.fv-plugins-message-container');
                            
                            if (errorMessages.length > 1) {
                                for (let i = 1; i < errorMessages.length; i++) {
                                    errorMessages[i].remove();
                                }
                            }
                        }
                    });
                });
            });

            const form = document.getElementById('kt_sign_in_form');
            if (form) {
                observer.observe(form, {
                    childList: true,
                    subtree: true
                });
            }
        });
    </script>
    @endpush

</x-auth-layout>
