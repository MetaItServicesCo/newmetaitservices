<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click"
    data-kt-menu-placement="bottom-end">
    {{ __('Actions') }}
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
    data-kt-menu="true">
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" 
            onclick="viewDownload({{ $row->id }}); return false;">
            {{ __('View') }}
        </a>
    </div>

    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3"
            onclick="deleteDownload({{ $row->id }}); return false;">
            {{ __('Delete') }}
        </a>
    </div>    
</div>

<script>
    function viewDownload(id) {
        fetch(`/admin/case-study-downloads/${id}`)
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const download = data.data;
                    document.getElementById('viewName').textContent = download.name;
                    document.getElementById('viewEmail').textContent = download.email;
                    document.getElementById('viewPhone').textContent = download.phone_number;
                    document.getElementById('viewLocation').textContent = download.location;
                    document.getElementById('viewCaseStudy').textContent = download.case_study_title;
                    document.getElementById('viewDownloadedAt').textContent = download.created_at;
                    
                    const modal = new bootstrap.Modal(document.getElementById('viewDownloadModal'));
                    modal.show();
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error(data.message || 'Error loading download');
                    }
                }
            })
            .catch(err => {
                console.error('Error:', err);
                if (typeof toastr !== 'undefined') {
                    toastr.error('An error occurred while loading the download');
                }
            });
    }

    function deleteDownload(id) {
        if (confirm('Are you sure you want to delete this download record?')) {
            const tokenElement = document.querySelector("meta[name='csrf-token']");
            const csrfToken = tokenElement ? tokenElement.getAttribute('content') : '';
            
            fetch(`/admin/case-study-downloads/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'application/json',
                }
            })
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    if (typeof toastr !== 'undefined') {
                        toastr.success(data.message);
                    }
                    if (typeof LaravelDataTables !== 'undefined' && LaravelDataTables['case-study-downloads-table']) {
                        LaravelDataTables['case-study-downloads-table'].draw();
                    }
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error(data.message || 'Error deleting download');
                    }
                }
            })
            .catch(err => {
                console.error('Error:', err);
                if (typeof toastr !== 'undefined') {
                    toastr.error('An error occurred while deleting');
                }
            });
        }
    }
</script>
