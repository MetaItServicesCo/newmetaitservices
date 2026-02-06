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
            onclick="viewQuestion({{ $row->id }}); return false;">
            {{ __('View') }}
        </a>
    </div>

    <div class="menu-item px-3">
        <a href="#" class="menu-link px-3"
            onclick="deleteQuestion({{ $row->id }}); return false;">
            {{ __('Delete') }}
        </a>
    </div>    
</div>

<script>
    function viewQuestion(id) {
        fetch(`/admin/questions/${id}`)
            .then(res => res.json())
            .then(data => {
                if (data.success) {
                    const q = data.data;
                    document.getElementById('viewName').textContent = q.name;
                    document.getElementById('viewEmail').textContent = q.email;
                    document.getElementById('viewCountry').textContent = q.country;
                    document.getElementById('viewMessage').textContent = q.message;
                    document.getElementById('viewAgree').textContent = q.agree;
                    document.getElementById('viewSubmittedAt').textContent = q.created_at;
                    
                    const modal = new bootstrap.Modal(document.getElementById('viewQuestionModal'));
                    modal.show();
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error(data.message || 'Error loading question');
                    }
                }
            })
            .catch(err => {
                console.error('Error:', err);
                if (typeof toastr !== 'undefined') {
                    toastr.error('An error occurred while loading the question');
                }
            });
    }

    function deleteQuestion(id) {
        if (confirm('Are you sure you want to delete this question?')) {
            const tokenElement = document.querySelector("meta[name='csrf-token']");
            const csrfToken = tokenElement ? tokenElement.getAttribute('content') : '';
            
            fetch(`/admin/questions/${id}`, {
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
                    if (typeof LaravelDataTables !== 'undefined' && LaravelDataTables['questions-table']) {
                        LaravelDataTables['questions-table'].draw();
                    }
                } else {
                    if (typeof toastr !== 'undefined') {
                        toastr.error(data.message || 'Error deleting question');
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
