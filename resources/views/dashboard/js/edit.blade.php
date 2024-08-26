<script>

$(document).ready(function() {
    // Function to show success message
    function showSuccessMessage(message) {
    var alert = `
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            ${message}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>`;
    var $alert = $(alert).appendTo('#successMessageContainer');

    // Automatically hide the alert after 4 seconds
    setTimeout(function() {
        $alert.fadeOut(function() {
            $(this).remove();
        });
    }, 4000);
}

    $(document).on('click', '.editBtn', function() {
        $('#saveItemBtnAdd').css('display', 'none');
        $('#saveItemBtnEdit').css('display', 'block');
        var row = $(this).closest('tr');
        var buttonColumnIndex = row.find('td').length - 1; // Assuming buttons are in the last column
        var buttonColumnHtml = row.find('td').eq(buttonColumnIndex).html(); // Save the HTML of the button column

        $('#addItemForm').empty(); // Clear form fields before populating

        $('#bootstrap-data-table-export th').each(function(index) {
            var headerId = $(this).attr('id');
            var headerText = $(this).text().trim();
            if (headerText) {
                var cellValue = row.find('td').eq(index).text().trim();
                var inputField = '';

                var imageSrc = row.find('td').eq(index).find('img').attr('src');
                if (headerId === 'image' && headerText === 'Image') {
                    inputField = `
                        <div class="form-group">
                            <label for="${headerId}">${headerText}</label>
                            <div class="mb-3 text-center">
                                <img id="previewImage" src="${imageSrc}" class="rounded-circle" alt="image" width="120" height="120">
                            </div>
                            <input type="file" class="form-control" id="${headerId}" name="${headerId}">
                        </div>`;
                }  else if (headerId === 'image' && (headerText === 'Icon' || headerText === 'picture')) {
                    inputField = `
                        <div class="form-group">
                            <label for="${headerId}">${headerText}</label>
                            <div class="mb-3 text-center">
                                <img id="previewImage" src="${imageSrc}" alt="image" width="200" height="120">
                            </div>
                            <input type="file" class="form-control" id="${headerId}" name="${headerId}">
                        </div>`;
                } else if (headerId === 'password' || headerId === 'password_confirmation') {
                    inputField = `
                        <div class="form-group">
                            <label for="${headerId}">${headerText}</label>
                            <input type="password" class="form-control" id="${headerId}" name="${headerId}">
                        </div>`;
                }  else if(headerId == 'id'){
                    inputField = `
                        <div class="form-group" style="display:none;">
                            <label for="${headerId}">${headerText}</label>
                            <input type="text" class="form-control" id="${headerId}" name="${headerId}" value="${cellValue}" required>
                        </div>`;
                } 
                else if (headerId === 'state') {

                var inputField = `<div class="form-group">
                        <label for="${headerId}">${headerText}</label>
                        <select class="form-control" id="${headerId}" name="${headerId}">`;

                            inputField += `
                            <option ${cellValue === 'القاهرة' ? 'selected' : ''} value="القاهرة">القاهرة</option>
                            <option ${cellValue === 'الإسكندرية' ? 'selected' : ''} value="الإسكندرية">الإسكندرية</option>
                            <option ${cellValue === 'الجيزة' ? 'selected' : ''} value="الجيزة">الجيزة</option>
                            <option ${cellValue === 'أسوان' ? 'selected' : ''} value="أسوان">أسوان</option>
                            <option ${cellValue === 'أسيوط' ? 'selected' : ''} value="أسيوط">أسيوط</option>
                            <option ${cellValue === 'البحيرة' ? 'selected' : ''} value="البحيرة">البحيرة</option>
                            <option ${cellValue === 'بني سويف' ? 'selected' : ''} value="بني سويف">بني سويف</option>
                            <option ${cellValue === 'الدقهلية' ? 'selected' : ''} value="الدقهلية">الدقهلية</option>
                            <option ${cellValue === 'دمياط' ? 'selected' : ''} value="دمياط">دمياط</option>
                            <option ${cellValue === 'الفيوم' ? 'selected' : ''} value="الفيوم">الفيوم</option>
                            <option ${cellValue === 'الغربية' ? 'selected' : ''} value="الغربية">الغربية</option>
                            <option ${cellValue === 'الإسماعيلية' ? 'selected' : ''} value="الإسماعيلية">الإسماعيلية</option>
                            <option ${cellValue === 'كفر الشيخ' ? 'selected' : ''} value="كفر الشيخ">كفر الشيخ</option>
                            <option ${cellValue === 'الأقصر' ? 'selected' : ''} value="الأقصر">الأقصر</option>
                            <option ${cellValue === 'مطروح' ? 'selected' : ''} value="مطروح">مطروح</option>
                            <option ${cellValue === 'المنيا' ? 'selected' : ''} value="المنيا">المنيا</option>
                            <option ${cellValue === 'المنوفية' ? 'selected' : ''} value="المنوفية">المنوفية</option>
                            <option ${cellValue === 'الوادي الجديد' ? 'selected' : ''} value="الوادي الجديد">الوادي الجديد</option>
                            <option ${cellValue === 'شمال سيناء' ? 'selected' : ''} value="شمال سيناء">شمال سيناء</option>
                            <option ${cellValue === 'بورسعيد' ? 'selected' : ''} value="بورسعيد">بورسعيد</option>
                            <option ${cellValue === 'القليوبية' ? 'selected' : ''} value="القليوبية">القليوبية</option>
                            <option ${cellValue === 'قنا' ? 'selected' : ''} value="قنا">قنا</option>
                            <option ${cellValue === 'البحر الأحمر' ? 'selected' : ''} value="البحر الأحمر">البحر الأحمر</option>
                            <option ${cellValue === 'الشرقية' ? 'selected' : ''} value="الشرقية">الشرقية</option>
                            <option ${cellValue === 'سوهاج' ? 'selected' : ''} value="سوهاج">سوهاج</option>
                            <option ${cellValue === 'جنوب سيناء' ? 'selected' : ''} value="جنوب سيناء">جنوب سيناء</option>
                            <option ${cellValue === 'السويس' ? 'selected' : ''} value="السويس">السويس</option>
                            `;

                        inputField += `</select></div>`;

                }

                else if (headerId === 'from' || headerId === 'to') {
                    inputField = `
                        <div class="form-group">
                            <label for="${headerId}">${headerText}</label>
                            <input type="number" class="form-control" id="${headerId}" name="${headerId}" min="1900" max="2100" step="1" placeholder="YYYY" value="${cellValue || ''}" required>
                        </div>`;
                }

                else {
                    inputField = `
                        <div class="form-group">
                            <label for="${headerId}">${headerText}</label>
                            <input type="text" class="form-control" id="${headerId}" name="${headerId}" value="${cellValue}" required>
                        </div>`;
                }
                $('#addItemForm').append(inputField);
            }
        });

        $('#addItemModal').modal('show');

        // Handle Save button click for editing
        $('#saveItemBtnEdit').off('click').on('click', function() {
            console.log('edit');
            var isValid = $('#addItemForm')[0].checkValidity(); // Check form validity
            if (isValid) {
                var formData = new FormData($('#addItemForm')[0]); // Create form data object

                formData.append('table', $(".table-db").text());
                formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token

                console.log('Form Data:', formData); // Log form data to console

                $.ajax({
                    url: '{{ route("update") }}', // Replace with your update URL
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        row.find('td').each(function(index) {
                            if (index !== buttonColumnIndex) { // Skip the button column
                                var inputField = $('#addItemForm').find('input, select, textarea').eq(index);
                                if (inputField.attr('type') !== 'password') {
                                    if (inputField.attr('type') === 'file') {
                                        var imageSrc = $('#previewImage').attr('src');
                                        var table = $('.card-title').text();
                                        if (table === 'Admins') {
                                            $(this).html('<img src="' + imageSrc + '" alt="image" class="rounded-circle" width="50" height="50">');
                                        } else if (table === 'Blogs' || table === 'Review' || table === 'Services') {
                                            $(this).html('<img src="' + imageSrc + '" alt="image" width="150">');
                                        } else {
                                            $(this).html('<img src="' + imageSrc + '" alt="image" width="60" height="60">');
                                        }
                                    } else if (inputField.is('select')) {
                                        $(this).text(inputField.find('option:selected').text());
                                    } else {
                                        $(this).html(inputField.val() ? inputField.val().replace(/\n/g, '<br>') : '');
                                   }
                                }
                            }
                        });

                        // Restore the button column HTML
                        row.find('td').eq(buttonColumnIndex).html(buttonColumnHtml);

                        // Logging form data (key and value) to console
                        $('#addItemForm').find('input, select, textarea').each(function() {
                            var fieldName = $(this).attr('name');
                            var fieldValue = $(this).val();
                            console.log(fieldName + ': ' + fieldValue);
                        });

                        $('#addItemModal').modal('hide'); // Use Bootstrap's hide method
                        showSuccessMessage('Item successfully updated!');
                    },
                    error: function(error) {
                        if (error.status === 422) {
                            var errors = error.responseJSON.errors;
                            var validationMessages = '';

                            $.each(errors, function(key, value) {
                                validationMessages += '' + value;
                            });

                            // Log to console for debugging
                            alert(validationMessages);

                        } else {
                            console.error('Error:', error);
                            alert('An error occurred while updating profile.');
                        }
                    }
                });
            } else {
                $('#addItemForm')[0].reportValidity(); // Show validation messages
            }
        });
    });
});

</script>