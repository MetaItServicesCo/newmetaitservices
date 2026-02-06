<a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm" data-kt-menu-trigger="click"
    data-kt-menu-placement="bottom-end">
    {{ __('Actions') }}
    <i class="ki-duotone ki-down fs-5 ms-1"></i>
</a>
<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
    data-kt-menu="true">
    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" 
            onclick="viewInquiry({{ $row->id }}); return false;">
            {{ __('View') }}
        </a>
    </div>

    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-start">
            {{ __('Mark as Contacted') }}
            <i class="ki-duotone ki-right fs-5 ms-1"></i>
        </a>
        <div class="menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
            <div class="menu-item px-3">
                <a href="#" class="menu-link px-3" onclick="updateStatus({{ $row->id }}, 'contacted'); return false;">
                    Contacted
                </a>
            </div>
        </div>
    </div>

    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3"
            onclick="deleteInquiry({{ $row->id }}); return false;">
            {{ __('Delete') }}
        </a>
    </div>    
</div>

<script>
    function viewInquiry(id) {
        fetch(`/admin/service-inquiries/${id}`)
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const inquiry = data.data;
                    document.getElementById('viewFirstName').textContent = inquiry.first_name;
                    document.getElementById('viewLastName').textContent = inquiry.last_name;
                    document.getElementById('viewEmail').textContent = inquiry.email;
                    document.getElementById('viewPhone').textContent = inquiry.phone;
                    document.getElementById('viewCountry').textContent = inquiry.country_code;
                    document.getElementById('viewWebsite').textContent = inquiry.has_website;
                    
                    // Parse services and display as list
                    const servicesList = document.getElementById('viewServices');
                    servicesList.innerHTML = '';
                    const services = inquiry.services.split(', ');
                    services.forEach(service => {
                        const li = document.createElement('li');
                        li.textContent = service;
                        li.className = 'mb-2 fs-6';
                        servicesList.appendChild(li);
                    });
                    
                    document.getElementById('viewMessage').textContent = inquiry.message;
                    document.getElementById('viewStatus').textContent = inquiry.status;
                    document.getElementById('viewSubmittedAt').textContent = inquiry.created_at;
                    
                    const modal = new bootstrap.Modal(document.getElementById('viewInquiryModal'));
                    modal.show();
                    
                    // Auto-update status to reviewed only if current status is pending
                    if (inquiry.status === 'pending') {
                        updateStatusSilent(id, 'reviewed');
                    }
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error(data.message || 'Error loading inquiry');
                    }
                }
            })
            .catch(err => {
                console.error('Error:', err);
                if (typeof toastr !== 'undefined') {
                    toastr.error('An error occurred while loading the inquiry');
                }
            });
    }

    function updateStatusSilent(id, status) {
        const tokenElement = document.querySelector("meta[name='csrf-token']");
        const csrfToken = tokenElement ? tokenElement.getAttribute('content') : '';
        
        fetch(`/admin/service-inquiries/${id}/update-status`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ status: status })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success && typeof LaravelDataTables !== 'undefined' && LaravelDataTables['service-inquiries-table']) {
                LaravelDataTables['service-inquiries-table'].draw();
            }
        })
        .catch(err => {
            console.error('Error:', err);
        });
    }

    function updateStatus(id, status) {
        const tokenElement = document.querySelector("meta[name='csrf-token']");
        const csrfToken = tokenElement ? tokenElement.getAttribute('content') : '';
        
        fetch(`/admin/service-inquiries/${id}/update-status`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ status: status })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                if (typeof toastr !== 'undefined') {
                    toastr.success(data.message);
                }
                if (typeof LaravelDataTables !== 'undefined' && LaravelDataTables['service-inquiries-table']) {
                    LaravelDataTables['service-inquiries-table'].draw();
                }
            } else {
                if (typeof toastr !== 'undefined') {
                    toastr.error(data.message || 'Error updating status');
                }
            }
        })
        .catch(err => {
            console.error('Error:', err);
            if (typeof toastr !== 'undefined') {
                toastr.error('An error occurred while updating status');
            }
        });
    }

    function deleteInquiry(id) {
        if (confirm('Are you sure you want to delete this inquiry?')) {
            const tokenElement = document.querySelector("meta[name='csrf-token']");
            const csrfToken = tokenElement ? tokenElement.getAttribute('content') : '';
            
            fetch(`/admin/service-inquiries/${id}`, {
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
                    if (typeof LaravelDataTables !== 'undefined' && LaravelDataTables['service-inquiries-table']) {
                        LaravelDataTables['service-inquiries-table'].draw();
                    }
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error(data.message || 'Error deleting inquiry');
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
