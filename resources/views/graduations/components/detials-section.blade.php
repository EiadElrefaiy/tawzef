<form id="image-upload-form" method="POST" action="{{ route('graduation.update.image', ['id' => auth('graduations')->user()->id]) }}" enctype="multipart/form-data">
    @csrf
    <div class="col-xs-12 col-md-3 skills-section done position-relative" style="display: inline-block;">
        <!-- Regular Image (non-circular) with ID for preview -->
        <img id="preview-image" src="{{ URL::asset('images/users/' . auth('graduations')->user()->image) }}" 
             class="img-thumbnail center-block" 
             style="width: 100%; object-fit: cover;">

        <!-- Edit Icon with colored background -->
        <label for="image" 
               style="position: absolute; bottom: 10px; right: 10px; background-color: #007bff; border-radius: 50%; width: 40px; height: 40px; 
               display: flex; justify-content: center; align-items: center; cursor: pointer;">
            <i class="fa fa-pencil text-white" style="color: white;"></i>
        </label>
        
        <!-- Hidden File Input -->
        <input id="image" type="file" name="image" style="display: none;" accept="image/*">
    </div>

    <div class="col-xs-12 col-md-9">
        <h3>{{ auth('graduations')->user()->name }}</h3>
        <ul class="main-info">
            @if(isset(auth('graduations')->user()->educations[0]))
                <li><i class="fa fa-university"></i> {{ auth('graduations')->user()->educations[0]->faculty->name }}</li>
                <li><i class="fa fa-calendar"></i> عام التخرج : {{ \Carbon\Carbon::parse(auth('graduations')->user()->educations[0]->to)->year }}</li>
                <li><i class="fa fa-calendar"></i> التقدير : {{ auth('graduations')->user()->educations[0]->grade }}</li>
                <li><i class="fa fa-envelope"></i> البــريد الالكتــروني : {{ auth('graduations')->user()->email }}</li>
                <li><i class="fa fa-map-marker"></i> العنــوان : {{ auth('graduations')->user()->address }}</li>
            @else
                <li><i class="fa fa-envelope"></i> البــريد الالكتــروني : {{ auth('graduations')->user()->email }}</li>
                <li><i class="fa fa-map-marker"></i> العنــوان : {{ auth('graduations')->user()->address }}</li>
            @endif
        </ul>
    </div>
</form>

<!-- JavaScript for Image Upload and Preview -->
<script>
    // Get the input element and image preview element
    const imageInput = document.getElementById('image');
    const previewImage = document.getElementById('preview-image');
    const form = document.getElementById('image-upload-form');

    // Add an event listener for the edit icon to trigger the file input
    document.querySelector('label[for="image"]').addEventListener('click', function() {
        imageInput.click();
    });

    // Variable to track if upload is in progress
    let isUploading = false;

    // Add an event listener to the file input
    imageInput.addEventListener('change', function() {
        // Check if an upload is already in progress
        if (isUploading) return;

        const file = this.files[0];
        if (file) {
            // Create a temporary URL for the selected image file
            const reader = new FileReader();
            
            // Once the file is read, update the preview image
            reader.onload = function(e) {
                previewImage.src = e.target.result;
            };

            // Read the image file as a data URL
            reader.readAsDataURL(file);

            // Set the uploading flag to true
            isUploading = true;

            // Create a FormData object to send the file
            const formData = new FormData(form);
            formData.append('id', {{ auth('graduations')->user()->id }});
            
            // Submit the form using AJAX
            submitImage(formData);
        }
    });

    function submitImage(formData) {
        // Use fetch API to submit the form data
        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value // Include CSRF token
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                console.log(data.message); // Display success message
            } else {
                alert('Error: ' + data.message); // Display error message
            }
        })
        .catch(error => {
            console.error('Error:', error);
        })
        .finally(() => {
            // Reset the uploading flag after the AJAX call completes
            isUploading = false;
            // Reset the file input to allow new selections
            imageInput.value = ''; 
        });
    }
</script>
