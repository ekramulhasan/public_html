@extends('frontend.master')
@section('title')
404 | Page
@endsection

@push('frontend_style')

@endpush

@section('main_body')

<div class="main-container text-center error-404 not-found ">
    <div class="container">
        <h1 class="title-404">404</h1>
        <h1 class="title">Opps! This page Could Not Be Found!</h1>
        <p class="subtitle">Sorry bit the page you are looking for does not exist, have been removed or name changed</p>
        <!-- .page-content -->
        <a href="{{ route('home') }}" class="button">Back to hompage</a>
    </div>
</div>

@endsection

@push('frontend_js')

@endpush
