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
            onclick="viewProjectRequest({{ $row->id }}); return false;">
            {{ __('View') }}
        </a>
    </div>

    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3"
            onclick="deleteProjectRequest({{ $row->id }}); return false;">
            {{ __('Delete') }}
        </a>
    </div>    
</div>

<script>
    function viewProjectRequest(id) {
        fetch(`/admin/project-requests/${id}`)
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const pr = data.data;
                    document.getElementById('viewFirstName').textContent = pr.first_name;
                    document.getElementById('viewLastName').textContent = pr.last_name;
                    document.getElementById('viewEmail').textContent = pr.email;
                    document.getElementById('viewPhone').textContent = pr.phone;
                    document.getElementById('viewCompany').textContent = pr.company_name || '-';
                    document.getElementById('viewWebsite').innerHTML = pr.website_url 
                        ? `<a href="${pr.website_url}" target="_blank" class="text-primary">${pr.website_url}</a>` 
                        : '-';
                    document.getElementById('viewDate').textContent = pr.selected_date;
                    document.getElementById('viewWeekday').textContent = pr.weekday;
                    document.getElementById('viewMessage').textContent = pr.message;
                    document.getElementById('viewSubmittedAt').textContent = pr.created_at;
                    
                    const modal = new bootstrap.Modal(document.getElementById('viewProjectModal'));
                    modal.show();
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error(data.message || 'Error loading project request');
                    }
                }
            })
            .catch(err => {
                console.error('Error:', err);
                if (typeof toastr !== 'undefined') {
                    toastr.error('An error occurred while loading the project request');
                }
            });
    }

    function deleteProjectRequest(id) {
        if (confirm('Are you sure you want to delete this project request?')) {
            // Get CSRF token safely
            const tokenElement = document.querySelector("meta[name='csrf-token']");
            const csrfToken = tokenElement ? tokenElement.getAttribute('content') : '';
            
            fetch(`/admin/project-requests/${id}`, {
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
                    // Reload datatable
                    if (typeof LaravelDataTables !== 'undefined' && LaravelDataTables['projectrequest-table']) {
                        LaravelDataTables['projectrequest-table'].draw();
                    }
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error(data.message || 'Error deleting project request');
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
