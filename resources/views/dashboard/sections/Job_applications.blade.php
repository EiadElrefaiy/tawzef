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
                        <strong class="card-title">Job Applications</strong>
                        <strong class="table-db" style="display:none;">job_applications</strong>
                        <strong class="view" style="display:none;">dashboard.sections.job_applications</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th id="id" class="text-center align-middle" style="display: none;">ID</th>
                                        <th id="graduation_id" class="text-center align-middle">Graduation</th>
                                        <th id="company" class="text-center align-middle">Company</th>
                                        <th id="job_id" class="text-center align-middle">Job</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $application)
                                        <tr>
                                            <td class="text-center align-middle" style="display: none;">{{ $application->id }}</td>
                                            <td class="text-center align-middle">
                                                {{ $application->graduation->name ?? 'N/A' }}
                                            </td>
                                            <td class="text-center align-middle">
                                                @if(isset($application->job->company->image) && $application->job->company->image)
                                                    <img src="{{ asset($application->job->company->image) }}" alt="company" width="60" height="60" class="rounded-circle" />
                                                @else
                                                    <img src="{{ URL::asset('images/default.jpg') }}" alt="company" width="60" height="60" class="rounded-circle">
                                                @endif
                                                {{ $application->job->company->name ?? 'N/A' }}
                                            </td>
                                            <td class="text-center align-middle">
                                                {{ $application->job->name ?? 'N/A' }}
                                            </td>
                                            <td class="text-center align-middle">
                                                <!-- Add action buttons here (e.g., edit, delete) -->
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
</div>

@endsection
