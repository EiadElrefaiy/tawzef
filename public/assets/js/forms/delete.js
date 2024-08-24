$(document).ready(function() {

        // Function to show success message
        function showSuccessMessage(message) {
            var alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                                message +
                                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                                    '<span aria-hidden="true">&times;</span>' +
                                '</button>' +
                            '</div>';
            $('#successMessageContainer').append(alert);
        }
            
        // Handle Delete button click
        var rowToDelete;
        $(document).on('click', '.deleteBtn', function() {
            rowToDelete = $(this).closest('tr');
            $('#deleteModal').modal('show');
        });
    
        // Confirm delete
        $('#confirmDeleteBtn').click(function() {
            rowToDelete.remove();
            $('#deleteModal').modal('hide');
            showSuccessMessage('Item successfully deleted!');
        });
});
    
