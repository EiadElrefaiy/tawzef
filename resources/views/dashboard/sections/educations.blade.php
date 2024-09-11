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
                                                <th id="graduation_id" class="text-center align-middle">graduation</th>
                                                <th id="faculty_id" class="text-center align-middle">Faculty</th>
                                                <th id="degree_id" class="text-center align-middle">degree</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="text-center align-middle" style="display: none;">{{ $item['id'] }}</td>
                                                <td class="text-center align-middle">
                                                    <p class="text-dark">{{$item->graduation->name}}</p>
                                                    <p class="text-dark"></p>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <p class="text-dark">{{$item->faculty->name}}</p>
                                                    <p class="text-dark"></p>
                                                </td>
                                                <td class="text-center align-middle">
                                                    <p class="text-dark">{{$item->degree->name}}</p>
                                                    <p class="text-dark"></p>
                                                </td>
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