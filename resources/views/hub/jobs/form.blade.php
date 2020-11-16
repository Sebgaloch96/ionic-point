@extends('hub.layouts.main')

@section('breadcrumbs')
    {{ Breadcrumbs::render('jobs.create') }}
@endsection

@section('content')
    <job-form></job-form>
@endsection