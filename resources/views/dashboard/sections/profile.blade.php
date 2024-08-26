@extends('dashboard.layouts.app')

@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="container-fluid" style="width: 100%;">
                <div class="row d-flex align-items-stretch">
                    <div class="col-lg-6 d-flex">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <strong class="card-title">Admin Profile</strong>
                                <strong class="table-db" style="display:none;">admins</strong>
                                <strong class="view" style="display:none;">dashboard.sections.admins</strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        @if (session('success'))
                                            <div class="alert alert-success">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <form action="{{ route('update_profile') }}" method="post" enctype="multipart/form-data" novalidate="novalidate">
                                            @csrf
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="mx-auto d-block">
                                                            <img class="rounded-circle mx-auto d-block" src="{{ asset(isset($data) && $data->image ? $data->image : 'images/admin.png') }}" alt="Profile Image" id="profile-image-preview" width="150" height="150">
                                                            <h5 class="text-sm-center mt-2 mb-1">{{$data->name}}</h5>
                                                            <div class="location text-sm-center"><i class="fa fa-map-marker"></i> {{$data->role}}</div>
                                                            <input type="file" name="image" id="profile_image" class="form-control mt-2" onchange="previewImage(event)">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label for="name" class="control-label mb-1">Name</label>
                                                        <input id="name" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" value="{{ old('name', isset($data) ? $data->name : '') }}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email" class="control-label mb-1">Email</label>
                                                <input id="email" name="email" type="email" class="form-control" value="{{ old('email', isset($data) ? $data->email : '') }}" placeholder="Email Address">
                                                <span class="help-block" data-valmsg-for="email" data-valmsg-replace="true"></span>
                                            </div>
                                            <div>
                                                <button id="save" type="submit" class="btn btn-primary btn-block w-25 pull-right">
                                                    <span>Save</span>
                                                </button>
                                            </div>
                                        </form>
                                        
                                        <script>
                                            // JavaScript function to preview selected image
                                            function previewImage(event) {
                                                var reader = new FileReader();
                                                reader.onload = function() {
                                                    var output = document.getElementById('profile-image-preview');
                                                    output.src = reader.result;
                                                    output.style.width = '150px'; // Set width to match default image size
                                                    output.style.height = '150px'; // Set height to match default image size
                                                }
                                                reader.readAsDataURL(event.target.files[0]);
                                            }
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div>
                    <!--/.col-->
                    <div class="col-lg-6 d-flex">
                        <div class="card flex-fill w-100">
                            <div class="card-header">
                                <strong class="card-title">Change Password</strong>
                            </div>
                            <div class="card-body">
                                <div id="pay-invoice">
                                    <div class="card-body">
                                        <form action="{{ route('update_password') }}" method="post" novalidate="novalidate">
                                            @csrf
                                            <div class="form-group">
                                                <label for="old_password" class="control-label mb-1">Old Password</label>
                                                <input id="old_password" name="old_password" type="password" class="form-control password @error('old_password') is-invalid @enderror" placeholder="Enter Old Password" required>
                                                @error('old_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password" class="control-label mb-1">New Password</label>
                                                <input id="password" name="password" type="password" class="form-control password @error('password') is-invalid @enderror" placeholder="Enter New Password" required>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password_confirmation" class="control-label mb-1">Confirm New Password</label>
                                                <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required>
                                            </div>
                                            <div>
                                                <button id="payment-button" type="submit" class="btn btn-primary btn-block w-25 pull-right">
                                                    <span id="payment-button-amount">Save</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- .card -->
                    </div>
                    <!--/.col-->
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>

@endsection
