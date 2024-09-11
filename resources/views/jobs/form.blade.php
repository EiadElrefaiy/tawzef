    <!-- full detail Section Start-->
    <section class="full-detail" style="margin-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <!-- Flash Messages -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Job Form Start -->
                    <form action="{{ isset($data) ? route('jobs.update' , ['id'=>$data->id]) : route('jobs.store') }}" method="POST">
                        @csrf

                        <!-- Job Information -->
                        <div class="row bottom-mrg extra-mrg">
                            <h2 class="detail-title">معلومات الوظيفة</h2>
                            
                            <!-- Job Name -->
                            <div class="col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-address-card"></i></span>
                                    <input type="text" name="name" class="form-control" placeholder="اسم الوظيفة" value="{{ isset($data) ? $data->name : '' }}">
                                </div>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Work Location -->
                            <div class="col-md-12 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                    <input type="text" name="location" class="form-control" placeholder="مقر العمل" value="{{ isset($data) ? $data->location : ''  }}">
                                </div>
                                @error('location')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>        

                            <!-- Number of Vacancies -->
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-users"></i></span>
                                    <input type="number" name="number" class="form-control" placeholder="العدد المطلوب" value="{{ isset($data) ? $data->number : ''  }}">
                                </div>
                                @error('number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>    

                            <!-- Announcement Date -->
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon">تاريخ الاعلان</span>
                                    <input type="date" name="announcement_date" class="form-control" placeholder="تاريخ الاعلان" value="{{ isset($data) ? $data->announcement_date : ''  }}">
                                </div>
                                @error('announcement_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        
                        <!-- Job Details -->
                        <div class="row bottom-mrg extra-mrg">
                            <h2 class="detail-title">تفاصيل الوظيفة</h2>
                            
                            <!-- Salary -->
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                    <input type="number" step="0.01" name="salary" class="form-control" placeholder="الراتب" value="{{ isset($data) ? $data->salary : ''  }}">
                                </div>  
                                @error('salary')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <!-- Job Field (Select) -->
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                    <select name="field_id" class="form-control">
                                        <option value="">مجال العمل</option>
                                        @foreach($fields as $field)
                                            <option value="{{ $field->id }}" 
                                                {{ old('field_id', isset($data) ? $data->field_id : '') == $field->id ? 'selected' : '' }}>
                                                {{ $field->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>  
                                @error('field_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Job Type (Select) -->
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
                                    <select name="type" class="form-control">
                                        <option value="">نوع الوظيفة</option>
                                        <option value="Full time" {{ old('type', isset($data) ? $data->type : '') == 'Full time' ? 'selected' : '' }}>دوام كامل</option>
                                        <option value="Part time" {{ old('type', isset($data) ? $data->type : '') == 'Part time' ? 'selected' : '' }}>دوام جزئي</option>
                                        <option value="Remotely" {{ old('type', isset($data) ? $data->type : '') == 'Remotely' ? 'selected' : '' }}>عن بُعد</option>
                                    </select>
                                </div>
                                @error('type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Years of Experience -->
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input type="number" name="years_of_experience" class="form-control" placeholder="سنوات الخبرة" value="{{ isset($data) ? $data->years_of_experience : ''  }}">
                                </div>  
                                @error('years_of_experience')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Required Gender -->
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                                    <select name="required_gender" class="form-control">
                                        <option value="">الجنس المطلوب</option>
                                        <option value="Male" {{ old('required_gender', isset($data) ? $data->required_gender : '') == 'Male' ? 'selected' : '' }}>ذكر</option>
                                        <option value="Female" {{ old('required_gender', isset($data) ? $data->required_gender : '') == 'Female' ? 'selected' : '' }}>أنثى</option>
                                        <option value="Not Specified" {{ old('required_gender', isset($data) ? $data->required_gender : '') == 'Not Specified' ? 'selected' : '' }}>لا يشترط</option>
                                    </select>
                                </div>  
                                @error('required_gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Required Qualification -->
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                    <select name="required_qualification" class="form-control">
                                        <option value="">المؤهل المطلوب</option>
                                        <option value="مؤهل عالي" {{ old('required_qualification', isset($data) ? $data->required_qualification : '') == 'مؤهل عالي' ? 'selected' : '' }}>مؤهل عالي</option>
                                        <option value="مؤهل متوسط" {{ old('required_qualification', isset($data) ? $data->required_qualification : '') == 'مؤهل متوسط' ? 'selected' : '' }}>مؤهل متوسط</option>
                                        <option value="لا يشترط" {{ old('required_qualification', isset($data) ? $data->required_qualification : '') == 'لا يشترط' ? 'selected' : '' }}>لا يشترط</option>
                                    </select>
                                </div>
                                @error('required_qualification')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Computer Skills -->
                            <div class="col-md-6 col-sm-6">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-laptop"></i></span>
                                    <select name="computer_type" class="form-control">
                                        <option value="">الحاسب الآلي</option>
                                        <option value="ممتاز" {{ old('computer_type', isset($data) ? $data->computer_type : '') == 'ممتاز' ? 'selected' : '' }}>ممتاز</option>
                                        <option value="جيد" {{ old('computer_type', isset($data) ? $data->computer_type : '') == 'جيد' ? 'selected' : '' }}>جيد</option>
                                        <option value="مقبول" {{ old('computer_type', isset($data) ? $data->computer_type : '') == 'مقبول' ? 'selected' : '' }}>مقبول</option>
                                    </select>
                                </div>
                                @error('computer_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        <!-- Job Description -->
                        <div class="row bottom-mrg extra-mrg">
                            <h2 class="detail-title">وصف الوظيفة</h2>
                            <div class="col-md-12 col-sm-12">
                                <textarea class="form-control" name="description" id="description">{{ isset($data) ? $data->description : ''  }}</textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn btn-success btn-primary small-btn" type="submit">حفــظ</button>
                            </div>
                        </div>
                    </form>
                    <!-- Job Form End -->
                    
                </div>
            </div>
        </div>
    </section>
    <!-- full detail Section End -->
