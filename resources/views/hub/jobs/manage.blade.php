@extends('hub.layouts.main')

@section('breadcrumbs')
    {{ Breadcrumbs::render('jobs.manage') }}
@endsection

@section('content')
    <div class="row px-1 px-md-4">
        <div class="col-6">
            <a href="{{ route('hub.jobs.create') }}" class="btn bg-custom-dark text-custom-light rounded-0">
                <i class="fas fa-plus"></i>
                Create Job
            </a>
        </div>
    </div>

    <div class="row px-1 px-md-4">
        <div class="col-12">
            <table class="table table-responsive-sm table-hover" id="manage_jobs_datatable">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Start Date</th>
                        <th>Location</th>
                        <th>Interest</th>
                        <th>Public</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
@endsection