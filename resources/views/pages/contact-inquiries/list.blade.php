<x-default-layout>

    @section('title')
        {{ __('Contact Inquiries') }}
    @endsection

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="{{ __('Search') }}"
                        id="inquirySearchInput" />
                </div>
            </div>
        </div>
        <!--end::Card header-->

        <!--begin::Card body-->
        <div class="card-body py-4">
            <div class="table-responsive">
                {{ $dataTable->table() }}
            </div>
        </div>
        <!--end::Card body-->
    </div>

    <!-- View Inquiry Modal -->
    <div class="modal fade" id="viewInquiryModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold">Contact Inquiry Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-5">
                    <div class="row">
                        <!-- First Name -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">First Name</label>
                            <p id="viewFirstName" class="form-control-plaintext fs-6"></p>
                        </div>

                        <!-- Last Name -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Last Name</label>
                            <p id="viewLastName" class="form-control-plaintext fs-6"></p>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Email</label>
                            <p id="viewEmail" class="form-control-plaintext fs-6"></p>
                        </div>

                        <!-- Phone -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Phone</label>
                            <p id="viewPhone" class="form-control-plaintext fs-6"></p>
                        </div>

                        <!-- Company Name -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Company Name</label>
                            <p id="viewCompany" class="form-control-plaintext fs-6"></p>
                        </div>

                        <!-- Company Website -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Company Website</label>
                            <p id="viewWebsite" class="form-control-plaintext fs-6"></p>
                        </div>

                        <!-- Submitted At -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Submitted At</label>
                            <p id="viewSubmittedAt" class="form-control-plaintext fs-6"></p>
                        </div>

                        <!-- Message (Full Width) -->
                        <div class="col-12 mb-4">
                            <label class="form-label fw-bold text-muted">Message</label>
                            <div class="bg-light p-3 rounded" style="min-height: 100px;">
                                <p id="viewMessage" class="form-control-plaintext fs-6 m-0" style="white-space: pre-wrap;"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        {{ $dataTable->scripts() }}

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Search Filter
                document.getElementById('inquirySearchInput').addEventListener('keyup', function() {
                    window.LaravelDataTables['contact-inquiries-table'].search(this.value).draw();
                });
            });
        </script>
    @endpush
</x-default-layout>
