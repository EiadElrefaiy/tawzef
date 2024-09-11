@extends('dashboard.layouts.app')

@section('content')

    <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-12">
                        <div id="successMessageContainer"></div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Educations</strong>
                                <strong class="table-db" style="display:none;">educations</strong>
                                <strong class="view" style="display:none;">dashboard.sections.educations</strong>
                                <!--button id="addItemBtn" class="btn btn-success text-white pull-right" data-toggle="modal" data-target="#addItemModal">
                                    <i class="fa fa-plus-square"></i> &nbsp; Add education
                                </button-->
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th id="id" class="text-center align-middle" style="display: none;">id</th>
                                                <th id="field_id" class="text-center align-middle">field</th>
                                                <th id="company_id" class="text-center align-middle">Company</th>
                                                <th id="name" class="text-center align-middle">Name</th>
                                                <th id="location" class="text-center align-middle">Location</th>
                                                <th id="number" class="text-center align-middle">Number</th>
                                                <th id="announcement_date" class="text-center align-middle">Date</th>
                                                <th id="years_of_experience" class="text-center align-middle">Years Of Experience</th>
                                                <th id="required_qualification" class="text-center align-middle">Required Qualification</th>
                                                <th id="type" class="text-center align-middle">Type</th>
                                                <th id="required_gender" class="text-center align-middle">Gender</th>
                                                <th id="salary" class="text-center align-middle">Salary</th>
                                                <th id="computer_type" class="text-center align-middle">Computer type</th>
                                                <th id="description	" class="text-center align-middle">Description</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="text-center align-middle" style="display: none;">{{ $item['id'] }}</td>
                                                <td class="text-center align-middle"> {{$item->field->name}}</td>
                                                <td class="text-center align-middle">

                                                @if(isset($item->company->image) && $item->company->image)
                                                    <img src="{{ asset($item->company->image) }}" alt="contact" width="60" height="60" class="rounded-circle" />
                                                @else
                                                    <img src="{{ URL::asset('images/default.jpg') }}" alt="contact" width="60" height="60" class="rounded-circle">
                                                @endif

                                                     {{$item->company->name}}
                                                </td>
                                                <td class="text-center align-middle"> {{$item->name}}</td>
                                                <td class="text-center align-middle"> {{$item->location}}</td>
                                                <td class="text-center align-middle"> {{$item->number}}</td>
                                                <td class="text-center align-middle"> {{$item->announcement_date}}</td>
                                                <td class="text-center align-middle"> {{$item->years_of_experience}}</td>
                                                <td class="text-center align-middle"> {{$item->required_qualification}}</td>
                                                <td class="text-center align-middle"> {{$item->type}}</td>
                                                <td class="text-center align-middle"> {{$item->required_gender}}</td>
                                                <td class="text-center align-middle"> {{$item->salary}}</td>
                                                <td class="text-center align-middle"> {{$item->computer_type}}</td>
                                                <td class="text-center align-middle"> {{$item->description}}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->

@endsection