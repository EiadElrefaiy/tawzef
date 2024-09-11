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
                                <strong class="card-title">Header</strong>
                                <strong class="table-db" style="display:none;">Graduations</strong>
                                <strong class="view" style="display:none;">dashboard.sections.graduations</strong>
                                <button id="addItemBtn" class="btn btn-success text-white pull-right" data-toggle="modal" data-target="#addItemModal">
                                    <i class="fa fa-plus-square"></i> &nbsp; Add Graduation
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th id="id" class="text-center align-middle" style="display: none;">id</th>
                                                <th id="image" class="text-center align-middle">Image</th>
                                                <th id="email" class="text-center align-middle">Email</th>
                                                <th id="name" class="text-center align-middle">Name</th>
                                                <th id="address" class="text-center align-middle">Address</th>
                                                <th id="facebook" class="text-center align-middle">Facebook</th>
                                                <th id="linkedin" class="text-center align-middle">Linkedin</th>
                                                <th id="google" class="text-center align-middle">Google</th>
                                                <th id="resume" class="text-center align-middle">Resume</th>
                                                <th id="password" class="text-center align-middle d-none">password</th>
                                                <th id="password_confirmation" class="text-center align-middle d-none">password_confirmation</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>
                                                @if(isset($item['image']) && $item['image'])
                                                <img src="{{ asset($item->image) }}" alt="contact" width="60" height="60" />
                                                @else
                                                <img src="{{ URL::asset('images/default.jpg') }}" alt="contact" width="60" height="60">
                                                @endif
                                                </td>
                                                <td class="text-center align-middle" style="display: none;">{{ $item['id'] }}</td>
                                                <td class="text-center align-middle">{{ $item['email'] }}</td>
                                                <td class="text-center align-middle">{{ $item['name'] }}</td>
                                                <td class="text-center align-middle">{{ $item['address'] }}</td>
                                                <td class="text-center align-middle">{{ $item['facebook'] }}</td>
                                                <td class="text-center align-middle">{{ $item['linkedin'] }}</td>
                                                <td class="text-center align-middle">{{ $item['google'] }}</td>
                                                <td class="text-center align-middle">{{ $item['resume'] }}</td>
                                                <td class="text-center align-middle">
                                                    <button class="btn btn-warning text-white editBtn same-width">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <button class="btn btn-danger text-white deleteBtn same-width">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
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