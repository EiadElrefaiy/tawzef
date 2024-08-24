@extends('dashboard.layouts.app')

@section('content')

        <div class="col-sm-6 col-lg-12">

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <img src="{{URL::asset('images/multiple-users-silhouette (1).png')}}" width="50" style="position: relative; top: -10px;">
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$data['users']->count()}}</span>
                        </h4>
                        <p class="text-light">Admins</p>

                    </div>

                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="float-right">
                                <img src="{{URL::asset('images/slider (1).png')}}" width="60" style="position: relative; top: -10px;">
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$data['companies']->count()}}</span>
                        </h4>
                        <p class="text-light">Companies</p>
                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <img src="{{URL::asset('images/responsible (1).png')}}" width="50" style="position: relative; top: -10px;">
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$data['degree']->count()}}</span>
                        </h4>
                        <p class="text-light">Degrees</p>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-5">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <img src="{{URL::asset('images/process (1).png')}}" width="50" style="position: relative; top: -10px;">
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$data['educations']->count()}}</span>
                        </h4>
                        <p class="text-light">Educations</p>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <img src="{{URL::asset('images/responsible (1).png')}}" width="50" style="position: relative; top: -10px;">
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$data['experiences']->count()}}</span>
                        </h4>
                        <p class="text-light">Experience</p>

                    </div>
                </div>
            </div>
            <!--/.col-->

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <img src="{{URL::asset('images/blog (1).png')}}" width="48" style="position: relative; top: -10px;">
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$data['faculty']->count()}}</span>
                        </h4>
                        <p class="text-light">faculties</p>

                    </div>
                </div>
            </div>

            <!--/.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <img src="{{URL::asset('images/satisfaction (1).png')}}" width="48" style="position: relative; top: -10px;">
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$data['fields']->count()}}</span>
                        </h4>
                        <p class="text-light">Fields</p>

                    </div>
                </div>
            </div>
            <!--/.col-->


            <!--/.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <img src="{{URL::asset('images/email (1).png')}}" width="48" style="position: relative; top: -7px;">
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$data['graduations']->count()}}</span>
                        </h4>
                        <p class="text-light">Graduations</p>

                    </div>
                </div>
            </div>
            <!--/.col-->



            <!--/.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-5">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <img src="{{URL::asset('images/mail.png')}}" width="48" style="position: relative; top: -7px;">
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$data['jobs']->count()}}</span>
                        </h4>
                        <p class="text-light">Jobs</p>

                    </div>
                </div>
            </div>
            <!--/.col-->

            
            <!--/.col-->
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <img src="{{URL::asset('images/footer (1).png')}}" width="48" style="position: relative; top: -7px;">
                        </div>
                        <h4 class="mb-0">
                            <span class="count">{{$data['job_applications']->count()}}</span>
                        </h4>
                        <p class="text-light">Job applications</p>

                    </div>
                </div>
            </div>
            <!--/.col-->
        </div>


            <div class="col-xl-6">
                <div class="card">
                    <div class="calendar">
                        <div class="calendar-header">
                            <button class="btn btn-primary" id="prevMonth">Previous</button>
                            <h4 id="calendarTitle"></h4>
                            <button class="btn btn-primary" id="nextMonth">Next</button>
                        </div>
                        <div class="calendar-body">
                            <div class="calendar-day-header">Sun</div>
                            <div class="calendar-day-header">Mon</div>
                            <div class="calendar-day-header">Tue</div>
                            <div class="calendar-day-header">Wed</div>
                            <div class="calendar-day-header">Thu</div>
                            <div class="calendar-day-header">Fri</div>
                            <div class="calendar-day-header">Sat</div>
                        </div>
                        <div class="calendar-body" id="calendarDays"></div>
                    </div>
                </div>
            </div>
    
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Visitors</div>
                                <div class="stat-digit">{{$data['visits']->count()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">New Visitors</div>
                                <div class="stat-digit">{{$data['visits']->where('created_at', '>=', today())->count()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Old Visitors</div>
                                <div class="stat-digit">{{$data['visits']->count() - $data['visits']->where('created_at', '>=', today())->count()}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection