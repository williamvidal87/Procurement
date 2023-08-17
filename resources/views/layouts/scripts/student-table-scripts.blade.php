
@push('student-table-scripts')
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        
        window.initStudent_idDrop = () => {
            $('#course_id').select2({
                dropdownParent: $("#studentModal"),
                placeholder: 'Select a Course',
                allowClear: false,
                closeOnSelect: true,
            
            });
        }
        
        initStudent_idDrop();
        $('#course_id').on('change', function(e) {
            livewire.emit('selectedCourse', e.target.value)
        });
        
        window.livewire.on('select2', () => {
            initStudent_idDrop();
        });
        
        $(function () {
            $("#dataTable").DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    'pageLength'
                ]
            });
        });
        
        window.livewire.on('EmitTable', () => {
            if ($.fn.DataTable.isDataTable("#dataTable")) {
                $('#dataTable').DataTable().destroy();
            }
            $("#dataTable").DataTable({
                dom: 'Bfrtip',
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: [
                    'pageLength'
                ]
            });
        });
        
        window.livewire.on('openStudentModal', () => {
            $('#studentModal').modal('show')
        });
        
        window.livewire.on('closeStudentModal', () => {
            $('#studentModal').modal('hide')
        });
        
        
        
        window.livewire.on('openSwalDelete', (StudentID) => {
            swal("Are you sure you want to delete this Data?", {
                dangerMode: true,
                buttons: true,
            }).then(okay => {
                if (okay) {
                    window.Livewire.emit('DeleteData', StudentID)
                }else{
                    window.Livewire.emit('refresh_student_table')
                }
                });
        });
        
        
        // for store alert
        window.livewire.on('alert_store', () => {
            Toastify({
            text: "Successfully stored.",
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
            style: {
            background: "linear-gradient(to right, #1cc88a, #1cc88a)",
            },
            onClick: function(){}
        }).showToast();
        });
        // for update alert
        window.livewire.on('alert_update', () => {
            Toastify({
            text: "Successfully updated.",
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
            style: {
            background: "linear-gradient(to right, #4e73df, #4e73df)",
            },
            onClick: function(){}
        }).showToast();
        });
        // for delete alert
        window.livewire.on('alert_delete', () => {
            Toastify({
            text: "Successfully deleted.",
            duration: 3000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
            style: {
            background: "linear-gradient(to right, #e74a3b, #e74a3b)",
            },
            onClick: function(){}
        }).showToast();
        });
        // for warning alert
        window.livewire.on('alert_warning', () => {
            Toastify({
            text: "Your are not allowed to edit this record right now.",
            duration: 6000,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
            style: {
            background: "linear-gradient(to right, #f6c23e, #f6c23e)",
            },
            onClick: function(){}
        }).showToast();
        });
        
        
    })

</script>
@endpush