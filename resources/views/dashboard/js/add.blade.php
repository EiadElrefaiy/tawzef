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

function createFormFields() {
    $('#bootstrap-data-table-export th').each(function(index) {
        var headerId = $(this).attr('id');
        var headerText = $(this).text();

        if (headerText && headerId) {
            var inputField = '';

            if (headerId === 'image' && headerText === 'Image') {
                inputField = `
                    <div class="form-group">
                        <label for="${headerId}">${headerText}</label>
                        <div class="mb-3 text-center">
                            <img id="previewImage" src="{{ URL::asset('assets/site/assets/images/admin.png') }}" class="rounded-circle" alt="image" width="120" height="120">
                        </div>
                        <input type="file" class="form-control" id="${headerId}" name="${headerId}">
                    </div>`;
            } else if (headerId === 'image' && headerText === 'Icon'){
                inputField = `
                    <div class="form-group">
                        <label for="${headerId}">${headerText}</label>
                        <div class="mb-3 text-center">
                            <img id="previewImage" src="{{ URL::asset('assets/site/assets/images/default.jpg') }}" alt="image" width="200" height="120">
                        </div>
                        <input type="file" class="form-control" id="${headerId}" name="${headerId}">
                    </div>`;
            }

            else if(headerId === 'image' && headerText === 'picture'){
                inputField = `
                <div class="form-group">
                    <label for="${headerId}">${headerText}</label>
                    <div class="mb-3 text-center">
                        <img id="previewImage" src="{{ URL::asset('assets/site/assets/images/default.jpg') }}" alt="image" width="200" height="120">
                    </div>
                    <input type="file" class="form-control" id="${headerId}" name="${headerId}">
                </div>`;
            }
        
            else if (headerId === 'password' || headerId === 'password_confirmation') {
                inputField = `
                    <div class="form-group">
                        <label for="${headerId}">${headerText}</label>
                        <input type="password" class="form-control" id="${headerId}" name="${headerId}" required>
                    </div>`;
            } else if (headerId === 'check_all') {
                inputField = `
                    <div class="form-group">
                        <label for="subjectInput">Subject</label>
                        <input type="text" class="form-control" id="subjectInput" name="subject" placeholder="Enter subject" required>
                    </div>
                    <div class="form-group">
                        <label for="messageTextarea">Message</label>
                        <textarea class="form-control" id="messageTextarea" name="message" rows="4" placeholder="Enter your message here" required></textarea>
                    </div>`;
            } else if (headerId === 'login') {
                inputField = `
                    <div class="form-group">
                        <label for="${headerId}">${headerText}</label>
                        <select class="form-control" id="${headerId}" name="${headerId}" required>
                            <option value="item">item</option>
                            <option value="login">login</option>
                        </select>
                    </div>`;
            }  else if (headerId.includes('id')) {
                inputField = `
                    <div class="form-group" style="display:none;">
                        <label for="${headerId}">${headerText}</label>
                        <input type="text" class="form-control" id="${headerId}" name="${headerId}" value="0" required>
                    </div>`;
            } 
            else if (headerId === 'state') {

            var inputField = `<div class="form-group">
                    <label for="${headerId}">${headerText}</label>
                    <select class="form-control" id="${headerId}" name="${headerId}">`;

                        inputField += `
                            <option value="القاهرة">القاهرة</option>
                            <option value="الإسكندرية">الإسكندرية</option>
                            <option value="الجيزة">الجيزة</option>
                            <option value="أسوان">أسوان</option>
                            <option value="أسيوط">أسيوط</option>
                            <option value="البحيرة">البحيرة</option>
                            <option value="بني سويف">بني سويف</option>
                            <option value="الدقهلية">الدقهلية</option>
                            <option value="دمياط">دمياط</option>
                            <option value="الفيوم">الفيوم</option>
                            <option value="الغربية">الغربية</option>
                            <option value="الإسماعيلية">الإسماعيلية</option>
                            <option value="كفر الشيخ">كفر الشيخ</option>
                            <option value="الأقصر">الأقصر</option>
                            <option value="مطروح">مطروح</option>
                            <option value="المنيا">المنيا</option>
                            <option value="المنوفية">المنوفية</option>
                            <option value="الوادي الجديد">الوادي الجديد</option>
                            <option value="شمال سيناء">شمال سيناء</option>
                            <option value="بورسعيد">بورسعيد</option>
                            <option value="القليوبية">القليوبية</option>
                            <option value="قنا">قنا</option>
                            <option value="البحر الأحمر">البحر الأحمر</option>
                            <option value="الشرقية">الشرقية</option>
                            <option value="سوهاج">سوهاج</option>
                            <option value="جنوب سيناء">جنوب سيناء</option>
                            <option value="السويس">السويس</option>
                        `;

                    inputField += `</select></div>`;

            }

            else if (headerId === 'from' || headerId === 'to') {
                inputField = `
                    <div class="form-group">
                        <label for="${headerId}">${headerText}</label>
                        <input type="number" class="form-control" id="${headerId}" name="${headerId}" min="1900" max="2100" value="2024" step="1" placeholder="YYYY" required>
                    </div>`;
            }
            
            else {
                inputField = `
                    <div class="form-group">
                        <label for="${headerId}">${headerText}</label>
                        <input type="text" class="form-control" id="${headerId}" name="${headerId}" required>
                    </div>`;
            }
            $('#addItemForm').append(inputField);
        }
    });
}

// Show modal when Add Item button is clicked
$('#addItemBtn').click(function() {
    $('#saveItemBtnAdd').css('display', 'block');
    $('#saveItemBtnEdit').css('display', 'none');

    createFormFields();
    $('#addItemModal').modal('show');
});

// Preview image when file input changes
$(document).on('change', '#image', function(event) {
    var reader = new FileReader();
    reader.onload = function(e) {
        $('#previewImage').attr('src', e.target.result);
    };
    reader.readAsDataURL(event.target.files[0]);
});

// Clear modal content when modal is hidden
$('#addItemModal').on('hidden.bs.modal', function () {
    $('#addItemForm').empty();
    if ($('.modal-backdrop').is(':visible')) {
        $('.modal-backdrop').remove();
    }
});

$('#saveItemBtnAdd').off('click').on('click', function() {
    console.log('add');
    var isValid = $('#addItemForm')[0].checkValidity();

    if (isValid) {
        if ($(".table-db").text() === 'newsletter') {
            // Send emails if table is "newsletter"
            var selectedEmails = [];
            $('.selectItem:checked').each(function() {
                selectedEmails.push($(this).val()); // Use .val() to get the value of the checkbox
            });

            console.log(selectedEmails); // Check the output here
            var emailSubject = document.getElementById('subjectInput').value;
            var emailMessage = document.getElementById('messageTextarea').value;
 
            console.log(selectedEmails);
            if (selectedEmails.length > 0) {
                $.ajax({
                    url: '{{ route("sendEmails") }}', // Replace with your email sending route
                    type: 'POST',
                    data: {
                        emails: selectedEmails,
                        subject: emailSubject,
                        message: emailMessage,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        if (response.status) {
                            $('#addItemModal').modal('hide');
                            showSuccessMessage('Emails successfully sent!');
                        } else {
                            console.error('Email send request failed');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            } else {
                alert('No emails selected.');
            }
        } else {
            var formData = new FormData(); // Use FormData to include file data

            $('#addItemForm').find('input, select, textarea').each(function() {
                var inputField = $(this);
                var fieldName = inputField.attr('name');
                var fieldValue = inputField.val();

                var cellValue = $(this).val();

                if (fieldName === 'description' || fieldName === 'description_eng') {
                    // Replace the placeholder with <br> tags
                    cellValue = cellValue.replace(/__BR__/g, '<br>');
                }

                if (inputField.attr('type') === 'file') {
                    var fileInput = inputField[0].files[0];
                    if (fileInput) {
                        formData.append(fieldName, fileInput);
                    } else {
                        formData.append(fieldName, $(".table-db").text() == 'users' ? 'images/admin.png' :'images/default.jpg'); // Append default image if no file is selected
                    }
                } else {
                    formData.append(fieldName, fieldValue);
                }
                formData[fieldName] = fieldValue;
            });

            // Append additional data
            formData.append('table', $(".table-db").text());
            formData.append('_token', '{{ csrf_token() }}'); // Add CSRF token

            console.log('Form Data:', formData); // Log form data to console

            // AJAX request to send form data to the server
            $.ajax({
                url: '{{ route("create") }}', // Replace with your server endpoint
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // Handle successful response
                    var newRow = '<tr>';
                    var promises = [];

                    $('#addItemForm').find('input, select, textarea').each(function() {
                    if ($('.card-title').text() !== 'Newsletter') {
                        if ($(this).attr('type') !== 'password') {
                            var fieldName = $(this).attr('name');
                            var fieldValue = $(this).val();
                            
                            // Handle special cases
                            if ($(this).attr('type') === 'file') {
                                var imageSrc = $('#previewImage').attr('src');
                                var imageText = $(this).parent().find('label').text();

                                if (imageText === 'Image') {
                                    newRow += `<td class="text-center align-middle"><img src="${imageSrc}" alt="image" class="rounded-circle" width="60" height="60"></td>`;
                                } else if (imageText === 'picture') {
                                    newRow += `<td class="text-center align-middle"><img src="${imageSrc}" width="150"></td>`;
                                } else {
                                    newRow += `<td class="text-center align-middle"><img src="${imageSrc}" alt="image" width="60" height="60"></td>`;
                                }
                            } else if ($(this).is('select')) {
                                // Handle select elements
                                var selectedText = $(this).find('option:selected').text();
                                newRow += `<td class="text-center align-middle">${selectedText}</td>`;
                            } 
                                // Handle text fields, including description and description_eng
                              else if (fieldName === 'description' || fieldName === 'description_eng') {
                                // Replace line breaks with <br> tags for HTML display
                                fieldValue = fieldValue.replace(/\n/g, '<br>');
                                if(fieldName === 'description'){
                                    newRow += `<td class="text-start" style="text-align: right;">${fieldValue}</td>`;
                                }
                                if(fieldName === 'description_eng'){
                                    newRow += `<td class="text-end" style="text-align: left;">${fieldValue}</td>`;
                                }
                            }

                            else {
                                // Check if ID field
                                if ($(this).attr('id').includes('id')) {
                                    newRow += `<td class="text-center align-middle" style="display:none">${response.data.id}</td>`;
                                } else {
                                    newRow += `<td class="text-center align-middle">${fieldValue}</td>`;
                                }
                            }
                        }
                    }
                });
                    Promise.all(promises).then(function() {
                        if($('.card-title').text() !== 'Newsletter'){
                            var onlyDelete = $('.card-title').text() === 'Review' ? 1 : 0;

                            if (onlyDelete === 0) {
                                newRow += `
                                    <td class="text-center align-middle">
                                        <button class="btn btn-warning text-white editBtn same-width"><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger text-white deleteBtn same-width"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>`;
                            } else {
                                newRow += `
                                    <td class="text-center align-middle">
                                        <button class="btn btn-danger text-white deleteBtn same-width"><i class="fa fa-trash"></i></button>
                                    </td>
                                </tr>`;
                            }
                        }
                        $('#bootstrap-data-table-export tbody').append(newRow);
                        $('#addItemModal').removeClass('show');
                        $('.modal-backdrop').removeClass('show');
                        $('body').removeClass('modal-open');
                        showSuccessMessage('Item successfully added!');
                    });
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
      }
    } else {
        $('#addItemForm')[0].reportValidity();
    }
 });
});

</script>