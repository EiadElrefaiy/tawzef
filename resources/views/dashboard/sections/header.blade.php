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
                                <strong class="table-db" style="display:none;">header</strong>
                                <strong class="view" style="display:none;">dashboard.sections.header</strong>
                                <button id="addItemBtn" class="btn btn-success text-white pull-right" data-toggle="modal" data-target="#addItemModal">
                                    <i class="fa fa-plus-square"></i> &nbsp; Add Item
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th id="id" class="text-center align-middle" style="display: none;">id</th>
                                                <th id="label" class="text-center align-middle">كلمة (عربي)</th>
                                                <th id="label_eng" class="text-center align-middle">Label (English)</th>
                                                <th id="url" class="text-center align-middle">Link</th>
                                                <th id="login" class="text-center align-middle">login</th>
                                                <th id="arrangement" class="text-center align-middle">Arrangement</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="text-center align-middle" style="display: none;">{{ $item['id'] }}</td>
                                                <td class="text-center align-middle">{{ $item['label'] }}</td>
                                                <td class="text-center align-middle">{{ $item['label_eng'] }}</td>
                                                <td class="text-center align-middle">{{ $item['url'] }}</td>
                                                <td class="text-center align-middle">{{ $item['login'] }}</td>
                                                <td class="text-center align-middle">{{ $item['arrangement'] }}</td>
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