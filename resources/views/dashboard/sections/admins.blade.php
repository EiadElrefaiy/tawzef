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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <div>
                                    <strong class="card-title">Admins</strong>
                                    <strong class="table-db d-none">users</strong>
                                    <strong class="view d-none">dashboard.sections.users</strong>
                                </div>
                                @if(Auth::user()->role !== 'manager')
                                    <button id="addItemBtn" class="btn btn-success text-white" data-toggle="modal" data-target="#addItemModal">
                                        <i class="fa fa-plus-square"></i> &nbsp; Add Admin
                                    </button>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered w-100">
                                        <thead>
                                            <tr>
                                                <th id="id" class="text-center align-middle d-none">id</th>
                                                <th id="image" class="text-center align-middle">Image</th>
                                                <th id="first_name" class="text-center align-middle">First Name</th>
                                                <th id="last_name" class="text-center align-middle">Last Name</th>
                                                <th id="email" class="text-center align-middle">Email</th>
                                                <th id="password" class="text-center align-middle d-none">password</th>
                                                <th id="password_confirmation" class="text-center align-middle d-none">password_confirmation</th>
                                                <th class="text-center align-middle"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                            <tr>
                                                <td class="text-center align-middle d-none">{{ $item['id'] }}</td>
                                                <td class="text-center align-middle">
                                                    @if(isset($item['image']) && $item['image'])
                                                    <img src="{{ asset($item->image) }}" alt="user" width="60" height="60" class="rounded-circle" />
                                                    @else
                                                    <img src="{{ URL::asset('images/admin.png') }}" alt="user" width="60" height="60" class="rounded-circle">
                                                    @endif
                                                </td>
                                                <td class="text-center align-middle">{{ $item['first_name'] }}</td>
                                                <td class="text-center align-middle">{{ $item['last_name'] }}</td>
                                                <td class="text-center align-middle">{{ $item['email'] }}</td>
                                                <td class="text-center align-middle">
                                                    @if(Auth::user()->role !== 'manager' || Auth::id() === $item['id'])
                                                        <button class="btn btn-warning text-white editBtn same-width">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                    @endif
                                                    @if(Auth::user()->role !== 'manager')
                                                        <button class="btn btn-danger text-white deleteBtn same-width">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    @endif
                                                </td>
                                                <td class="d-none"></td>
                                                <td class="d-none"></td>
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
        </div>
            

@endsection