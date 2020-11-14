@extends('hub.layouts.main')

@section('breadcrumbs')
    {{ Breadcrumbs::render('jobs') }}
@endsection

@section('content')
    <jobs :auth="{{ $authedUser }}"></jobs>
@endsection