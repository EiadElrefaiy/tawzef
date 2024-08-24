<script>
$(document).ready(function() {
    // Function to show success message
    function showSuccessMessage(message) {
    var alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                        message +
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                        '</button>' +
                    '</div>';
    var $alert = $(alert).appendTo('#successMessageContainer');

    // Automatically hide the alert after 4 seconds
    setTimeout(function() {
        $alert.fadeOut(function() {
            $(this).remove();
        });
    }, 4000);
}
    
    // Handle Delete button click
    var rowToDelete;
    var itemId; // Variable to store the item ID to be deleted
    $(document).on('click', '.deleteBtn', function() {
        rowToDelete = $(this).closest('tr');
        itemId = rowToDelete.find('td:first').text().trim(); // Ensure trimming any extra whitespace
        $('#deleteModal').modal('show');
    });

    // Confirm delete
    $('#confirmDeleteBtn').click(function() {
        var formData = new FormData(); // Create form data object

        formData.append('table', $(".table-db").text().trim()); // Ensure trimming any extra whitespace
        formData.append('id', itemId);
        formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token
        console.log('Form Data:', formData); // Log form data to console

        $.ajax({
            url: '{{ route("delete") }}', // Replace with your delete URL
            type: 'POST',
            data: formData,
            processData: false, // Prevent jQuery from automatically processing data
            contentType: false, // Set content type to false for FormData
            success: function(response) {
                console.log('Delete Response:', response); // Log response to console
                    rowToDelete.remove();
                    $('#deleteModal').modal('hide');
                    showSuccessMessage('Item successfully deleted!');
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
                // Optionally, show an error message to the user
            }
        });
    });
});
</script>
