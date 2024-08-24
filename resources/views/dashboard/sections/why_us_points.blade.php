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
                                <strong class="card-title">Why Us Point</strong>
                                <strong class="table-db" style="display:none;">why_us_points</strong>
                                <strong class="view" style="display:none;">dashboard.sections.why_us_points</strong>

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
                                                <th id="why_id" class="text-center align-middle">Why</th>
                                                <th id="title" class="text-center align-middle">عنوان (عربي)</th>
                                                <th id="title_eng" class="text-center align-middle">Title (English)</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="text-center align-middle" style="display: none;">{{ $item['id'] }}</td>
                                                <td class="text-center align-middle">
                                                    <p class="text-dark">{{$item->why->title}} : {{$item->why->title_eng}}</p>
                                                    <p class="text-dark"></p>
                                                </td>
                                                <td class="text-center align-middle">{{ $item['title'] }}</td>
                                                <td class="text-center align-middle">{{ $item['title_eng'] }}</td>
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