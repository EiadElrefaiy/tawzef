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
        $('#successMessageContainer').append(alert);
    }

    // Function to create form fields based on table headers
    var tables = ""; 
    $('#bootstrap-data-table-export th').each(function(index) {
        var headerId = $(this).attr('id');
        var headerText = $(this).text();
        tables += "/" + headerId; 
    });
    alert(tables);

    function createFormFields() {
        $('#bootstrap-data-table-export th').each(function(index) {
            var headerId = $(this).attr('id');
            var headerText = $(this).text();
            tables += "/" + headerId; 

            if (headerText && headerId) {
                var inputField = '';

                if (headerId === 'image' && headerText === 'Image') {
                    inputField = `
                        <div class="form-group">
                            <label for="${headerId}">${headerText}</label>
                            <div class="mb-3 text-center">
                                <img id="previewImage" src="images/admin.png" class="rounded-circle" alt="image" width="120" height="120">
                            </div>
                            <input type="file" class="form-control" id="${headerId}" name="${headerId}">
                        </div>`;
                } else if (headerId === 'image' && headerText === 'Icon') {
                    inputField = `
                        <div class="form-group">
                            <label for="${headerId}">${headerText}</label>
                            <div class="mb-3 text-center">
                                <img id="previewImage" src="images/default.jpg" alt="image" width="200" height="120">
                            </div>
                            <input type="file" class="form-control" id="${headerId}" name="${headerId}">
                        </div>`;
                } else if(headerId === 'image' && headerText === 'picture'){
                    inputField = `
                    <div class="form-group">
                        <label for="${headerId}">${headerText}</label>
                        <div class="mb-3 text-center">
                            <img id="previewImage" src="images/default.jpg" alt="image" width="200" height="120">
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
                } else if (headerId === 'call') {
                    inputField = `
                        <div class="form-group">
                            <label for="${headerId}">${headerText}</label>
                            <select class="form-control" id="${headerId}" name="${headerId}" required>
                                <option value="call">call</option>
                                <option value="item">item</option>
                            </select>
                        </div>`;
                } else if (headerId === 'step_id') {
                    inputField = `
                        <div class="form-group">
                            <label for="${headerId}">${headerText}</label>
                                <select class="form-control" id="${headerId}" name="${headerId}">
                                    <option value="1">وصف الخطوة الاولى <br> Description of Step 1</option>
                                    <option value="2">وصف الخطوة الثانية <br> Description of Step 2</option>
                                    <option value="3">وصف الخطوة الثالثة <br> Description of Step 3</option>
                                </select>
                        </div>`;
                } else if (headerId.includes('id')) {
                    inputField = `
                        <div class="form-group" style="display:none;">
                            <label for="${headerId}">${headerText}</label>
                            <input type="text" class="form-control" id="${headerId}" name="${headerId}" value="0" required>
                        </div>`;
                } else {
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

    // Handle Save button click for adding new item
    $('#saveItemBtn').off('click').on('click', function() {
        var isValid = $('#addItemForm')[0].checkValidity();

        if (isValid) {
            var formData = {}; // Object to store form data

            $('#addItemForm').find('input, select, textarea').each(function() {
                var inputField = $(this);
                var fieldName = inputField.attr('name');
                var fieldValue = inputField.val();

                formData[fieldName] = fieldValue;
            });

            console.log('Form Data:', formData); // Log form data to console

            var newRow = '<tr>';
            var promises = [];

            $('#addItemForm').find('input, select, textarea').each(function() {
                if ($(this).attr('type') !== 'password') {
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
                    } else {
                        if ($(this).attr('id').includes('id')) {
                            newRow += `<td class="text-center align-middle" style="display:none">${$(this).val()}</td>`;
                        } else {
                            newRow += `<td class="text-center align-middle">${$(this).val()}</td>`;
                        }
                    }
                }
            });
            
            Promise.all(promises).then(function() {
                var onlyDelete = $('.card-title').text() === 'Review' ? 1 : 0;

                if (onlyDelete === 0) {
                    newRow += `
                        <td class="text-center align-middle">
                            <button class="btn btn-warning text-white editBtn mb-1"><i class="fa fa-edit"></i> edit</button>
                            <button class="btn btn-danger text-white deleteBtn mb-1"><i class="fa fa-trash"></i> delete</button>
                        </td>
                    </tr>`;
                } else {
                    newRow += `
                        <td class="text-center align-middle">
                            <button class="btn btn-danger text-white deleteBtn"><i class="fa fa-trash"></i> delete</button>
                        </td>
                    </tr>`;
                }

                $('#bootstrap-data-table-export tbody').append(newRow);
                $('#addItemModal').removeClass('show');
                $('.modal-backdrop').removeClass('show');
                $('body').removeClass('modal-open');
                showSuccessMessage('Item successfully added!');
            });
        } else {
            $('#addItemForm')[0].reportValidity();
        }
    });
});
