<x-auth-layout>

    <!--begin::Form-->
    <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form" data-kt-redirect-url="{{ route('login') }}" action="{{ route('register') }}">
        @csrf
        <!--begin::Heading-->
        <div class="text-center mb-11">
            <h1 class="text-gray-900 fw-bolder mb-3">
                Sign Up
            </h1>
        
        </div>
        
        <div class="fv-row mb-8">
            <!--begin::Name-->
            <input type="text" placeholder="Name" name="name" autocomplete="off" class="form-control bg-transparent"/>
            <!--end::Name-->
        </div>

        <!--begin::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Email-->
            <input type="text" placeholder="Email" name="email" autocomplete="off" class="form-control bg-transparent"/>
            <!--end::Email-->
        </div>

        <!--begin::Input group-->
        <div class="fv-row mb-8" data-kt-password-meter="true">
            <!--begin::Wrapper-->
            <div class="mb-1">
                <!--begin::Input wrapper-->
                <div class="position-relative mb-3">
                    <input class="form-control bg-transparent" type="password" placeholder="Password" name="password" autocomplete="off" id="register_password_field"/>

                    <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" id="toggle_register_password" style="cursor: pointer;">
                        <i class="ki-duotone ki-eye-slash fs-2" id="register_eye_icon_slash">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                        <i class="ki-duotone ki-eye fs-2 d-none" id="register_eye_icon">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </span>
                </div>
                <!--end::Input wrapper-->

                <!--begin::Meter-->
                <div class="d-flex align-items-center mb-3" data-kt-password-meter-control="highlight">
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px me-2"></div>
                    <div class="flex-grow-1 bg-secondary bg-active-success rounded h-5px"></div>
                </div>
                <!--end::Meter-->
            </div>
            <!--end::Wrapper-->

            <!--begin::Hint-->
            <div class="text-muted">
                Use 8 or more characters with a mix of letters, numbers & symbols.
            </div>
            <!--end::Hint-->
        </div>
        <!--end::Input group--->

        <!--end::Input group--->
        <div class="fv-row mb-8">
            <!--begin::Repeat Password-->
            <div class="position-relative">
                <input placeholder="Repeat Password" name="password_confirmation" type="password" autocomplete="off" class="form-control bg-transparent" id="register_password_confirmation_field"/>
                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" id="toggle_register_password_confirmation" style="cursor: pointer;">
                    <i class="ki-duotone ki-eye-slash fs-2" id="register_eye_icon_slash_confirm">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                    </i>
                    <i class="ki-duotone ki-eye fs-2 d-none" id="register_eye_icon_confirm">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                    </i>
                </span>
            </div>
            <!--end::Repeat Password-->
        </div>
        <!--end::Input group--->

        <!--begin::Input group--->
        <div class="fv-row mb-10">
            <div class="form-check form-check-custom form-check-solid form-check-inline">
                <input class="form-check-input" type="checkbox" name="toc" value="1"/>

                <label class="form-check-label fw-semibold text-gray-700 fs-6">
                    I Agree &

                    <a href="#" class="ms-1 link-primary">Terms and conditions</a>.
                </label>
            </div>
        </div>
        <!--end::Input group--->

        <!--begin::Submit button-->
        <div class="d-grid mb-10">
            <button type="submit" id="kt_sign_up_submit" class="btn btn-primary">
                @include('partials/general/_button-indicator', ['label' => 'Sign Up'])
            </button>
        </div>
        <!--end::Submit button-->

        <!--begin::Sign up-->
        <div class="text-gray-500 text-center fw-semibold fs-6">
            Already have an Account?

            <a href="/login" class="link-primary fw-semibold">
                Sign in
            </a>
        </div>
        <!--end::Sign up-->
    </form>
    <!--end::Form-->

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Password toggle
            const toggleRegisterPassword = document.getElementById('toggle_register_password');
            const registerPasswordField = document.getElementById('register_password_field');
            const registerEyeIconSlash = document.getElementById('register_eye_icon_slash');
            const registerEyeIcon = document.getElementById('register_eye_icon');

            if (toggleRegisterPassword && registerPasswordField) {
                toggleRegisterPassword.addEventListener('click', function(e) {
                    e.preventDefault();
                    const type = registerPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    registerPasswordField.setAttribute('type', type);
                    
                    registerEyeIconSlash.classList.toggle('d-none');
                    registerEyeIcon.classList.toggle('d-none');
                });
            }

            // Password confirmation toggle
            const toggleRegisterPasswordConfirmation = document.getElementById('toggle_register_password_confirmation');
            const registerPasswordConfirmationField = document.getElementById('register_password_confirmation_field');
            const registerEyeIconSlashConfirm = document.getElementById('register_eye_icon_slash_confirm');
            const registerEyeIconConfirm = document.getElementById('register_eye_icon_confirm');

            if (toggleRegisterPasswordConfirmation && registerPasswordConfirmationField) {
                toggleRegisterPasswordConfirmation.addEventListener('click', function(e) {
                    e.preventDefault();
                    const type = registerPasswordConfirmationField.getAttribute('type') === 'password' ? 'text' : 'password';
                    registerPasswordConfirmationField.setAttribute('type', type);
                    
                    registerEyeIconSlashConfirm.classList.toggle('d-none');
                    registerEyeIconConfirm.classList.toggle('d-none');
                });
            }
        });
    </script>
    @endpush

</x-auth-layout>
