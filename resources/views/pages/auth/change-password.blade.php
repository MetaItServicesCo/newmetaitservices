<x-default-layout>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <!-- Begin::Card -->
            <div class="card">
                <!-- Begin::Card Header -->
                <div class="card-header py-3">
                    <h3 class="card-title text-dark">{{ __('Change Password') }}</h3>
                    <p class="text-muted fs-7 mb-0">{{ __('Enter your details to change your password.') }}</p>
                </div>
                <!-- End::Card Header -->

                <!-- Begin::Card Body -->
                <div class="card-body">
                    <form action="{{ route('update-password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Begin::Old Password -->
                        <div class="mb-7">
                            <label class="form-label fw-bold text-dark">{{ __('Old Password') }}</label>
                            <div class="position-relative">
                                <input type="password" name="old_password"
                                    class="form-control @error('old_password') is-invalid @enderror"
                                    placeholder="{{ __('Enter your old Password') }}" required id="old_password_field">
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" id="toggle_old_password" style="cursor: pointer;">
                                    <i class="ki-duotone ki-eye-slash fs-2" id="old_eye_icon_slash">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                    <i class="ki-duotone ki-eye fs-2 d-none" id="old_eye_icon">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </div>
                            @error('old_password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- End::Old Password -->

                        <!-- Begin::New Password -->
                        <div class="mb-7">
                            <label class="form-label fw-bold text-dark">{{ __('New Password') }}</label>
                            <div class="position-relative">
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="{{ __('Enter new password') }}" required id="new_password_field">
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" id="toggle_new_password" style="cursor: pointer;">
                                    <i class="ki-duotone ki-eye-slash fs-2" id="new_eye_icon_slash">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                    <i class="ki-duotone ki-eye fs-2 d-none" id="new_eye_icon">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- End::New Password -->

                        <!-- Begin::Confirm Password -->
                        <div class="mb-7">
                            <label class="form-label fw-bold text-dark">{{ __('Confirm Password') }}</label>
                            <div class="position-relative">
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    placeholder="{{ __('Confirm new password') }}" required id="confirm_password_field">
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" id="toggle_confirm_password" style="cursor: pointer;">
                                    <i class="ki-duotone ki-eye-slash fs-2" id="confirm_eye_icon_slash">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                    <i class="ki-duotone ki-eye fs-2 d-none" id="confirm_eye_icon">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                </span>
                            </div>
                            @error('password_confirmation')
                                <div class="invalid-feedback d-block">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- End::Confirm Password -->

                        <!-- Begin::Submit -->
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary btn-sm ">
                                {{ __('Change Password') }}
                            </button>
                        </div>
                        <!-- End::Submit -->
                    </form>
                </div>
                <!-- End::Card Body -->
            </div>
            <!-- End::Card -->
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Old Password toggle
            const toggleOldPassword = document.getElementById('toggle_old_password');
            const oldPasswordField = document.getElementById('old_password_field');
            const oldEyeIconSlash = document.getElementById('old_eye_icon_slash');
            const oldEyeIcon = document.getElementById('old_eye_icon');

            if (toggleOldPassword && oldPasswordField) {
                toggleOldPassword.addEventListener('click', function(e) {
                    e.preventDefault();
                    const type = oldPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    oldPasswordField.setAttribute('type', type);
                    
                    oldEyeIconSlash.classList.toggle('d-none');
                    oldEyeIcon.classList.toggle('d-none');
                });
            }

            // New Password toggle
            const toggleNewPassword = document.getElementById('toggle_new_password');
            const newPasswordField = document.getElementById('new_password_field');
            const newEyeIconSlash = document.getElementById('new_eye_icon_slash');
            const newEyeIcon = document.getElementById('new_eye_icon');

            if (toggleNewPassword && newPasswordField) {
                toggleNewPassword.addEventListener('click', function(e) {
                    e.preventDefault();
                    const type = newPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    newPasswordField.setAttribute('type', type);
                    
                    newEyeIconSlash.classList.toggle('d-none');
                    newEyeIcon.classList.toggle('d-none');
                });
            }

            // Confirm Password toggle
            const toggleConfirmPassword = document.getElementById('toggle_confirm_password');
            const confirmPasswordField = document.getElementById('confirm_password_field');
            const confirmEyeIconSlash = document.getElementById('confirm_eye_icon_slash');
            const confirmEyeIcon = document.getElementById('confirm_eye_icon');

            if (toggleConfirmPassword && confirmPasswordField) {
                toggleConfirmPassword.addEventListener('click', function(e) {
                    e.preventDefault();
                    const type = confirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                    confirmPasswordField.setAttribute('type', type);
                    
                    confirmEyeIconSlash.classList.toggle('d-none');
                    confirmEyeIcon.classList.toggle('d-none');
                });
            }
        });
    </script>
    @endpush
</x-default-layout>
