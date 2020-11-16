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
@endsection