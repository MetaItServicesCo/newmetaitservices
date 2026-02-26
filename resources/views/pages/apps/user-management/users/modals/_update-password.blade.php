
<div class="modal fade" id="kt_modal_update_password" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2 class="fw-bold">Update Password</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                    <i class="ki-duotone ki-cross fs-1">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <!--begin::Form-->
                <form id="kt_modal_update_password_form" class="form" action="#">
                    <!--begin::Input group=-->
                    <div class="fv-row mb-10">
                        <label class="required form-label fs-6 mb-2">Current Password</label>
                        <div class="position-relative">
                            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="current_password" autocomplete="off" id="modal_current_password_field" />
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" id="toggle_modal_current_password" style="cursor: pointer;">
                                <i class="ki-duotone ki-eye-slash fs-1" id="modal_current_eye_icon_slash">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                                <i class="ki-duotone ki-eye d-none fs-1" id="modal_current_eye_icon">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </div>
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                        <!--begin::Wrapper-->
                        <div class="mb-1">
                            <!--begin::Label-->
                            <label class="form-label fw-semibold fs-6 mb-2">New Password</label>
                            <!--end::Label-->
                            <!--begin::Input wrapper-->
                            <div class="position-relative mb-3">
                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="new_password" autocomplete="off" />
                                <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" data-kt-password-meter-control="visibility">
                                    <i class="ki-duotone ki-eye-slash fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                    <i class="ki-duotone ki-eye d-none fs-1">
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
                        <div class="text-muted">Use 8 or more characters with a mix of letters, numbers & symbols.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Input group=-->
                    <div class="fv-row mb-10">
                        <label class="form-label fw-semibold fs-6 mb-2">Confirm New Password</label>
                        <div class="position-relative">
                            <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="confirm_password" autocomplete="off" id="modal_confirm_password_field" />
                            <span class="btn btn-sm btn-icon position-absolute translate-middle top-50 end-0 me-n2" id="toggle_modal_confirm_password" style="cursor: pointer;">
                                <i class="ki-duotone ki-eye-slash fs-1" id="modal_confirm_eye_icon_slash">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                                <i class="ki-duotone ki-eye d-none fs-1" id="modal_confirm_eye_icon">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                </i>
                            </span>
                        </div>
                    </div>
                    <!--end::Input group=-->
                    <!--begin::Actions-->
                    <div class="text-center pt-15">
                        <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                        <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal Current Password toggle
        const toggleModalCurrentPassword = document.getElementById('toggle_modal_current_password');
        const modalCurrentPasswordField = document.getElementById('modal_current_password_field');
        const modalCurrentEyeIconSlash = document.getElementById('modal_current_eye_icon_slash');
        const modalCurrentEyeIcon = document.getElementById('modal_current_eye_icon');

        if (toggleModalCurrentPassword && modalCurrentPasswordField) {
            toggleModalCurrentPassword.addEventListener('click', function(e) {
                e.preventDefault();
                const type = modalCurrentPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                modalCurrentPasswordField.setAttribute('type', type);
                
                modalCurrentEyeIconSlash.classList.toggle('d-none');
                modalCurrentEyeIcon.classList.toggle('d-none');
            });
        }

        // Modal Confirm Password toggle
        const toggleModalConfirmPassword = document.getElementById('toggle_modal_confirm_password');
        const modalConfirmPasswordField = document.getElementById('modal_confirm_password_field');
        const modalConfirmEyeIconSlash = document.getElementById('modal_confirm_eye_icon_slash');
        const modalConfirmEyeIcon = document.getElementById('modal_confirm_eye_icon');

        if (toggleModalConfirmPassword && modalConfirmPasswordField) {
            toggleModalConfirmPassword.addEventListener('click', function(e) {
                e.preventDefault();
                const type = modalConfirmPasswordField.getAttribute('type') === 'password' ? 'text' : 'password';
                modalConfirmPasswordField.setAttribute('type', type);
                
                modalConfirmEyeIconSlash.classList.toggle('d-none');
                modalConfirmEyeIcon.classList.toggle('d-none');
            });
        }
    });
</script>
@endpush