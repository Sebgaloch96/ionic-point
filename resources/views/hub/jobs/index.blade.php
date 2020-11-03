@extends('hub.layouts.main')

@section('breadcrumbs')
    {{ Breadcrumbs::render('jobs') }}
@endsection

@section('content')
    <jobs :jobs="{{ $jobs }}"></jobs>
@endsection