@extends('graduations.layouts.app')

@section('content')

    <!-- End Navigation -->
    <div class="clearfix"></div>

    <!-- Title Header Start -->
    <section class="inner-header-title" style="background-image:url({{URL::asset('assets/site/assets/img/bn2.jpg')}});">
    </section>

        <!-- General Detail Start -->
        <section class="detail-desc">
        <div class="container">
            <div class="ur-detail-wrap top-lay" style="display: block;">
                <div class="row bottom-mrg2">
                @include('graduations.components.detials-section');
               </div>
            </div>
        </div>
    </section>

    <!-- Full Detail Section Start -->
    <section class="full-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <form id="your-form-id" action="#" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Contact Information -->
                        <div class="row bottom-mrg extra-mrg">
                            <h2 class="detail-title">معلومات الاتصال</h2>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input value="{{ auth('graduations')->user()->email ?? '' }}" type="email" class="form-control" name="email" placeholder="البريد الإلكتروني">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input type="text" class="form-control" name="phone" placeholder="رقم التليفون" value="{{ auth('graduations')->user()->phone ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" class="form-control" name="address" placeholder="العنوان" value="{{ auth('graduations')->user()->address ?? '' }}">
                                </div>
                            </div>
                        </div>

                        <!-- Tanta University Faculties and Degrees -->
                        <div class="row bottom-mrg extra-mrg">
                            <h2 class="detail-title">بيانات التعليم</h2>
                            <div id="education-container">
                            @foreach ($graduation->educations as $index => $education)
                            <div class="row education-entry">
                            <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                        <select class="form-control" name="education[{{$index}}][faculty_id]">
                                            <option value="" disabled>اختر الكلية</option>
                                                @foreach($faculties as $faculty)
                                                    <option value="{{ $faculty->id }}" {{ $faculty->id == $education->faculty_id ? 'selected' : '' }}>{{ $faculty->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                        <select class="form-control" name="education[{{$index}}][degree_id]">
                                                @foreach($degrees as $degree)
                                                    <option value="{{ $degree->id }}" {{ $faculty->id == $education->degree_id ? 'selected' : '' }}>{{ $degree->name }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">من</span>
                                        <input type="date" data-lang="en" data-large-mode="true" data-min-year="1970" data-max-year="2024" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" type="text" name="education[{{$index}}][from]" value="{{$education->from}}" class="form-control" placeholder="تاريخ البدء">
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon">إلى</span>
                                        <input type="date" data-lang="en" data-large-mode="true" data-min-year="1970" data-max-year="2024" data-disabled-days="08/17/2017,08/18/2017" data-id="datedropper-0" data-theme="my-style" type="text" name="education[{{$index}}][to]"  value="{{$education->from}}" class="form-control" placeholder="تاريخ الانتهاء">
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                    <select class="form-control" name="education[{{$index}}][grade]">
                                    <option value="مقبول" {{ strtolower(trim($education->grade)) == 'مقبول' ? 'selected' : '' }}>مقبول</option>
                                    <option value="جيد" {{ strtolower(trim($education->grade)) == 'جيد' ? 'selected' : '' }}>جيد</option>
                                    <option value="جيد جدا" {{ strtolower(trim($education->grade)) == 'جيد جدا' ? 'selected' : '' }}>جيد جدا</option>
                                    <option value="امتياز" {{ strtolower(trim($education->grade)) == 'امتياز' ? 'selected' : '' }}>امتياز</option>
                                    </select>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger remove-education-btn">حذف</button>
                                </div>

                            </div>

                                @endforeach
                            </div>
                            <div class="row">
                                 <div class="col-md-12 col-sm-12">
                                   <button type="button" class="btn btn-primary" id="add-education-btn">إضافة كلية جديدة</button>
                                </div>
                            </div>
                        </div>

                        <!-- Experience Section -->
                        <div class="row bottom-mrg extra-mrg">
                            <h2 class="detail-title">الخبرة العملية</h2>
                            <div id="experience-container">

                                @foreach ($graduation->experiences as $index => $experience)
                                    <div class="experience-entry">
                                        <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" value="{{$experience->company}}" name="experience[{{$index}}][company]" placeholder="اسم الشركة">
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <input type="text" class="form-control" value="{{$experience->job}}" name="experience[{{$index}}][job]" placeholder="الوظيفة">
                                        </div>
                                        <div class="col-md-5 col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">من</span>
                                                <input type="date" name="experience[{{$index}}][from]" value="{{$experience->from}}" class="form-control" placeholder="تاريخ البدء">
                                            </div>
                                        </div>
                                        <div class="col-md-5 col-sm-6">
                                            <div class="input-group">
                                                <span class="input-group-addon">إلى</span>
                                                <input type="date" name="experience[{{$index}}][to]" value="{{$experience->to}}" class="form-control" placeholder="تاريخ الانتهاء">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <button type="button" class="btn btn-danger remove-experience-btn">حذف</button>
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                            <button type="button" class="btn btn-primary" id="add-experience-btn">إضافة خبرة جديدة</button>
                        </div>

                        <!-- Skills Section -->
                        <div class="row bottom-mrg extra-mrg">
                            <h2 class="detail-title">المهارات</h2>
                            <div id="skills-container">
                            @foreach ($graduation->skills as $index => $skills)
                            <div class="row skill-entry">
                                <div class="col-md-8 col-sm-8">
                                        <input type="text" class="form-control" name="skills[{{$index}}][name]" value="{{$skills->name}}" placeholder="المهارة, مثل MS Word, Excel ...">
                                    </div>
                                    <div class="col-md-2 col-sm-4">
                                        <input type="text" class="form-control" name="skills[{{$index}}][degree]" value="{{$skills->degree}}" placeholder="85%">
                                    </div>

                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger remove-skill-btn">حذف</button>
                                    </div>
                            </div>
                            @endforeach     


                            </div>
                            <button type="button" class="btn btn-primary" id="add-skill-btn">إضافة مهارة جديدة</button>
                        </div>

                        <!-- CV Upload -->
                        <div class="row bottom-mrg extra-mrg">
                            <h2 class="detail-title">رفع السيرة الذاتية</h2>
                            <div class="col-md-12 col-sm-12">
                               @if(!empty($graduation->resume))
                                    <!-- Display the existing CV -->
                                    <div class="existing-cv">
                                    <p>السيرة الذاتية الحالية: 
                                        <a href="{{ asset('resumes/' . $graduation->resume) }}" target="_blank">
                                            <img src="{{ asset('images/pdf-icon.jpg') }}" alt="PDF" style="width: 20px; height: 20px; margin-right: 5px;">
                                            {{ $graduation->resume }}
                                        </a>
                                    </p>
                                        <!--input type="hidden" name="resume" value="{{ $graduation->resume }}"-->
                                    </div>
                                @endif

                                <!-- Upload New CV -->
                                <input type="file" name="resume" class="form-control">
                                <div class="note">أقصي حد لحجم لملف السيرة الذاتية ( 2 MB ).</div>

                                <!-- Optional: Add a note to inform the user that uploading a new file will replace the current one -->
                                @if(!empty($graduation->resume))
                                    <small class="text-muted">رفع سيرة ذاتية جديدة سيقوم بإستبدال الملف الحالي.</small>
                                @endif
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-primary small-btn">حفــظ</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
document.getElementById('your-form-id').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent the form from submitting

    // Create a FormData object from the form
    const formData = new FormData(this);

    // Initialize an object to store the transformed form data
    const formObj = {
        experience: [],
        skills: [],
        education: []
    };

    // Loop through FormData to populate the object
    formData.forEach((value, key) => {
        if (key.startsWith('experience[')) {
            const [_, index, field] = key.match(/experience\[(\d+)\]\[(\w+)\]/);
            if (!formObj.experience[index]) formObj.experience[index] = {};
            formObj.experience[index][field] = value;
        } else if (key.startsWith('skills[')) {
            const [_, index, field] = key.match(/skills\[(\d+)\]\[(\w+)\]/);
            if (!formObj.skills[index]) formObj.skills[index] = {};
            formObj.skills[index][field] = value;
        } else if (key.startsWith('education[')) {
            const [_, index, field] = key.match(/education\[(\d+)\]\[(\w+)\]/);
            if (!formObj.education[index]) formObj.education[index] = {};
            formObj.education[index][field] = value;
        } else {
            formObj[key] = value;
        }
    });

    // Add resume file to formData if selected
    const resumeFile = $('input[name="resume"]')[0].files[0];
    if (resumeFile) {
        formData.append('resume', resumeFile); // Append the file to formData
    }

    // Send data using AJAX
    $.ajax({
        url: "{{ route('graduation.update', ['id' => auth('graduations')->user()->id]) }}",
        method: "POST",
        data: formData, 
        contentType: false, // Important for file uploads
        processData: false, // Important for file uploads
        success: function(response) {
            alert('Data has been successfully updated!');
            console.log(response); // Debugging
        },
        error: function(xhr, status, error) {
            alert('An error occurred. Please try again.');
            console.log(xhr.responseText); // Debugging
        }
    });
});

// Add more experience fields dynamically
document.getElementById('add-experience-btn').addEventListener('click', function() {
    const container = document.getElementById('experience-container');
    const count = container.querySelectorAll('.experience-entry').length;
    const experienceFields = `
        <div class="experience-entry">
            <div class="col-md-6 col-sm-6">
                <input type="text" class="form-control" name="experience[${count}][company]" placeholder="اسم الشركة">
            </div>
            <div class="col-md-6 col-sm-6">
                <input type="text" class="form-control" name="experience[${count}][job]" placeholder="الوظيفة">
            </div>
            <div class="col-md-5 col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon">من</span>
                    <input type="date" name="experience[${count}][from]" class="form-control" placeholder="تاريخ البدء">
                </div>
            </div>
            <div class="col-md-5 col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon">إلى</span>
                    <input type="date" name="experience[${count}][to]" class="form-control" placeholder="تاريخ الانتهاء">
                </div>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-experience-btn">حذف</button>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', experienceFields);
});

// Add more skills fields dynamically
document.getElementById('add-skill-btn').addEventListener('click', function() {
    const container = document.getElementById('skills-container');
    const count = container.querySelectorAll('.skills-entry').length;
    const skillFields = `
        <div class="skills-entry">
            <div class="col-md-8 col-sm-8">
                <input type="text" class="form-control" name="skills[${count}][name]" placeholder="المهارة, مثل MS Word, Excel ...">
            </div>
            <div class="col-md-2 col-sm-4">
                <input type="text" class="form-control" name="skills[${count}][degree]" placeholder="85%">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-skill-btn">حذف</button>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', skillFields);
});

// Add more education fields dynamically
document.getElementById('add-education-btn').addEventListener('click', function() {
    const container = document.getElementById('education-container');
    const count = container.querySelectorAll('.education-entry').length;
    const educationFields = `
        <div class="row education-entry">
            <div class="col-md-6 col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-university"></i></span>
                    <select class="form-control" name="education[${count}][faculty_id]">
                        <option value="" disabled selected>اختر الكلية</option>
                        @foreach($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                    <select class="form-control" name="education[${count}][degree_id]">
                        <option value="" disabled selected>اختر الدرجة العلمية</option>
                        @foreach($degrees as $degree)
                            <option value="{{ $degree->id }}">{{ $degree->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon">من</span>
                    <input type="date" name="education[${count}][from]" class="form-control" placeholder="تاريخ البدء">
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon">إلى</span>
                    <input type="date" name="education[${count}][to]" class="form-control" placeholder="تاريخ الانتهاء">
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                    <select class="form-control" name="education[${count}][grade]">
                        <option value="مقبول">مقبول</option>
                        <option value="جيد">جيد</option>
                        <option value="جيد جدا">جيد جدا</option>
                        <option value="امتياز">امتياز</option>
                    </select>
                </div>
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger remove-education-btn">حذف</button>
            </div>
        </div>
    `;
    container.insertAdjacentHTML('beforeend', educationFields);
});

</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Remove education entry
        document.getElementById('education-container').addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-education-btn')) {
                e.target.closest('.education-entry').remove();
                rearrangeIndexes('education', 'education-container', 'education-entry');
            }
        });

        // Remove experience entry
        document.getElementById('experience-container').addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-experience-btn')) {
                e.target.closest('.experience-entry').remove();
                rearrangeIndexes('experience', 'experience-container', 'experience-entry');
            }
        });

        // Remove skill entry
        document.getElementById('skills-container').addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-skill-btn')) {
                e.target.closest('.skill-entry').remove();
                rearrangeIndexes('skills', 'skills-container', 'skill-entry');
            }
        });

        // Function to rearrange indexes
        function rearrangeIndexes(fieldType, containerId, entryClass) {
            const container = document.getElementById(containerId);
            const entries = container.getElementsByClassName(entryClass);

            for (let i = 0; i < entries.length; i++) {
                const inputs = entries[i].querySelectorAll('input, select');
                inputs.forEach(input => {
                    const name = input.getAttribute('name');
                    const newName = name.replace(/\[\d+\]/, `[${i}]`);
                    input.setAttribute('name', newName);
                });
            }
        }
    });

</script>


@endsection