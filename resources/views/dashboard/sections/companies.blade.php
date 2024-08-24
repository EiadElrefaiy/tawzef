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
                                <strong class="card-title">Companies</strong>
                                <strong class="table-db" style="display:none;">companies</strong>
                                <strong class="view" style="display:none;">dashboard.sections.companies</strong>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>                                
                                            <tr>
                                                <th id="id" class="text-center align-middle" style="display: none;">id</th>
                                                <th id="name" class="text-center align-middle">username</th>
                                                <th id="phone" class="text-center align-middle">name</th>
                                                <th id="service" class="text-center align-middle">state</th>
                                                <th id="hours_number" class="text-center align-middle">city</th>
                                                <th id="service_date" class="text-center align-middle">address</th>
                                                <th id="location" class="text-center align-middle">commercial index</th>
                                                <th id="location" class="text-center align-middle">tax card</th>
                                                <th id="location" class="text-center align-middle">logo</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="text-center align-middle" style="display: none;">{{ $item['id'] }}</td>
                                                <td class="text-center align-middle">{{ $item['username'] }}</td>
                                                <td class="text-center align-middle">{{ $item['name'] }}</td>
                                                <td class="text-center align-middle">{{ $item['state'] }}</td>
                                                <td class="text-center align-middle">{{ $item['city'] }}</td>
                                                <td class="text-center align-middle">{{ $item['address'] }}</td>
                                                <td class="text-center align-middle">{{ $item['address'] }}</td>
                                                <td class="text-center align-middle">{{ $item['commercial_index'] }}</td>
                                                <td class="text-center align-middle">{{ $item['tax_card'] }}</td>
                                                <td class="text-center align-middle">{{ $item['logo'] }}</td>
                                                <td class="text-center align-middle">
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