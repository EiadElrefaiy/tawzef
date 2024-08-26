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
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <strong class="card-title">Companies</strong>
                                <strong class="table-db" style="display:none;">companies</strong>
                                <strong class="view" style="display:none;">dashboard.sections.companies</strong>

                                <button id="addItemBtn" class="btn btn-success text-white" data-toggle="modal" data-target="#addItemModal">
                                    <i class="fa fa-plus-square"></i> &nbsp; Add Company
                                </button>

                              </div>
                            </div>


                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>                                
                                            <tr>
                                                <th id="id" class="text-center align-middle" style="display: none;">id</th>
                                                <th id="image" class="text-center align-middle">Icon</th>
                                                <th id="email" class="text-center align-middle">email</th>
                                                <th id="name" class="text-center align-middle">name</th>
                                                <th id="state" class="text-center align-middle">state</th>
                                                <th id="city" class="text-center align-middle">city</th>
                                                <th id="address" class="text-center align-middle">address</th>
                                                <th id="commercial_index" class="text-center align-middle">commercial_index</th>
                                                <th id="tax_card" class="text-center align-middle">tax_card</th>
                                                <th id="password" class="text-center align-middle d-none">password</th>
                                                <th id="password_confirmation" class="text-center align-middle d-none">password_confirmation</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="text-center align-middle" style="display: none;">{{ $item['id'] }}</td>
                                                <td>
                                                @if(isset($item['image']) && $item['image'])
                                                <img src="{{ asset($item->image) }}" alt="contact" width="60" height="60" />
                                                @else
                                                <img src="{{ URL::asset('images/default.jpg') }}" alt="contact" width="60" height="60">
                                                @endif
                                                </td> 
                                                <td class="text-center align-middle">{{ $item['email'] }}</td>
                                                <td class="text-center align-middle">{{ $item['name'] }}</td>
                                                <td class="text-center align-middle">{{ $item['state'] }}</td>
                                                <td class="text-center align-middle">{{ $item['city'] }}</td>
                                                <td class="text-center align-middle">{{ $item['address'] }}</td>
                                                <td class="text-center align-middle">{{ $item['commercial_index'] }}</td>
                                                <td class="text-center align-middle">{{ $item['tax_card'] }}</td>
                                                <td class="text-center align-middle">
                                                    <button class="btn btn-danger text-white deleteBtn same-width">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <button class="btn btn-warning text-white editBtn same-width">
                                                        <i class="fa fa-edit"></i>
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