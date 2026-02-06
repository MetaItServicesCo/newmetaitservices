<x-default-layout>

    @section('title')
        {{ __('Case Study Downloads') }}
    @endsection

    <div class="card">
        <div class="card-header border-0 pt-6">
            <div class="card-title">
                <div class="d-flex align-items-center position-relative my-1">
                    {!! getIcon('magnifier', 'fs-3 position-absolute ms-5') !!}
                    <input type="text" data-kt-user-table-filter="search"
                        class="form-control form-control-solid w-250px ps-13" placeholder="{{ __('Search') }}"
                        id="downloadSearchInput" />
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

    <!-- View Download Modal -->
    <div class="modal fade" id="viewDownloadModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold">Download Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-5">
                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Name</label>
                            <p id="viewName" class="form-control-plaintext fs-6"></p>
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

                        <!-- Location -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Location</label>
                            <p id="viewLocation" class="form-control-plaintext fs-6"></p>
                        </div>

                        <!-- Case Study -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Case Study</label>
                            <p id="viewCaseStudy" class="form-control-plaintext fs-6"></p>
                        </div>

                        <!-- Downloaded At -->
                        <div class="col-md-6 mb-4">
                            <label class="form-label fw-bold text-muted">Downloaded At</label>
                            <p id="viewDownloadedAt" class="form-control-plaintext fs-6"></p>
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
                document.getElementById('downloadSearchInput').addEventListener('keyup', function() {
                    window.LaravelDataTables['case-study-downloads-table'].search(this.value).draw();
                });
            });
        </script>
    @endpush
</x-default-layout>
