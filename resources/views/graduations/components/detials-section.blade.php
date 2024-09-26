<div class="col-xs-12 col-md-3 skills-section done position-relative" style="display: inline-block;">
    <!-- Regular Image (non-circular) with ID for preview -->
    <img id="preview-image" src="{{URL::asset('assets/site/assets/img/client-3.jpg')}}" 
         class="img-thumbnail center-block" 
         style="width: 100%; object-fit: cover;">

    <!-- Edit Icon with colored background -->
    <label for="image-upload" 
           style="position: absolute; bottom: 10px; right: 10px; background-color: #007bff; border-radius: 50%; width: 40px; height: 40px; 
           display: flex; justify-content: center; align-items: center; cursor: pointer;">
        <i class="fa fa-pencil text-white" style="color: white;"></i>
    </label>
    
    <!-- Hidden File Input -->
    <input id="image-upload" type="file" name="user_photo" style="display: none;" accept="image/*">
</div>

<div class="col-xs-12 col-md-9">
    <h3>{{auth('graduations')->user()->name}}</h3>
    <ul class="main-info">
        <li><i class="fa fa-university"></i> {{auth('graduations')->user()->educations[0]->faculty->name}} </li>
        <li><i class="fa fa-calendar"></i> عام التخرج : {{ \Carbon\Carbon::parse(auth('graduations')->user()->educations[0]->to)->year }} </li>
        <li><i class="fa fa-calendar"></i> التقدير : {{auth('graduations')->user()->educations[0]->grade}} </li>
        <li><i class="fa fa-envelope"></i> البــريد الالكتــروني : {{auth('graduations')->user()->email}}</li>
        <li><i class="fa fa-map-marker"></i> العنــوان : {{auth('graduations')->user()->address}}</li>
    </ul>
</div>

<!-- JavaScript for Image Upload and Preview -->
<script>
    // Get the input element and image preview element
    const imageInput = document.getElementById('image-upload');
    const previewImage = document.getElementById('preview-image');

    // Add an event listener to the file input
    imageInput.addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            // Create a temporary URL for the selected image file
            const reader = new FileReader();
            
            // Once the file is read, update the preview image
            reader.onload = function(e) {
                previewImage.src = e.target.result;
            }

            // Read the image file as a data URL
            reader.readAsDataURL(file);
        }
    });
</script>
