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
                                <strong class="card-title">Newsletter</strong>
                                <strong class="table-db" style="display:none;">newsletter</strong>\
                                <strong class="view" style="display:none;">dashboard.sections.newsletter</strong>
                                <button id="addItemBtn" class="btn btn-success text-white pull-right" data-toggle="modal" data-target="#addItemModal">
                                    <i class="fa fa-plus-square"></i> &nbsp; Add Message
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th id="id" class="text-center align-middle" style="display: none;">id</th>
                                                <th id="check_all" class="text-center align-middle">
                                                     Check All 
                                                    <input type="checkbox" id="selectAll">
                                                </th>
                                                <th class="text-center align-middle">Email</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td class="text-center align-middle" style="display: none;">{{ $item['id'] }}</td>
                                                <td class="text-center align-middle">
                                                    <input type="checkbox" class="selectItem" value="{{ $item['email'] }}">
                                                </td>
                                                <td class="text-center align-middle">{{ $item['email'] }}</td>
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

        <script>
            document.getElementById('selectAll').addEventListener('click', function(event) {
                const checkboxes = document.querySelectorAll('.selectItem');
                checkboxes.forEach(checkbox => checkbox.checked = event.target.checked);
            });
    
            function show(){
                $('#addItemModal').modal('show');
            }
        </script>
    
@endsection