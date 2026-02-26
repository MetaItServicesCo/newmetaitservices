<!--begin::Modal - My Profile-->
<div class="modal fade" id="kt_modal_my_profile" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" style="position: fixed; top: 70px; right: 20px; margin: 0; max-width: 350px;">
        <div class="modal-content shadow-lg">
            <!--begin::Modal header-->
            <div class="modal-header pb-3">
                <h5 class="modal-title fw-bold">My Profile</h5>
                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                    {!! getIcon('cross', 'fs-2') !!}
                </div>
            </div>
            <!--end::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body py-5 px-7">
                <!--begin::Profile Details-->
                <div class="d-flex flex-column">
                    <!--begin::Avatar-->
                    <div class="d-flex justify-content-center mb-5">
                        <div class="symbol symbol-75px symbol-circle">
                            @if(Auth::user()->profile_photo_url)
                                <img alt="Profile" src="{{ Auth::user()->profile_photo_url }}"/>
                            @else
                                <div class="symbol-label fs-2 {{ app(\App\Actions\GetThemeType::class)->handle('bg-light-? text-?', Auth::user()->name) }}">
                                    {{ substr(Auth::user()->name, 0, 2) }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <!--end::Avatar-->

                    <!--begin::Details-->
                    <div class="text-center">
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-muted fs-7 mb-1">Name</label>
                            <div class="fw-bold fs-5 text-gray-800">{{ Auth::user()->name }}</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-muted fs-7 mb-1">Email</label>
                            <div class="fw-semibold fs-6 text-gray-800">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    <!--end::Details-->
                </div>
                <!--end::Profile Details-->
            </div>
            <!--end::Modal body-->
        </div>
    </div>
</div>
<!--end::Modal - My Profile-->
