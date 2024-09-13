@extends('frontend.master')
@section('title')
    Fabrist Fashion
@endsection

@push('frontend_style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('main_body')
    @include('frontend.inc_page.slide')

    @include('frontend.inc_page.categoryBanner')
    @include('frontend.inc_page.bestSeller')
    {{-- @include('frontend.inc_page.bestSellerBanner') --}}
    @include('frontend.inc_page.serviceBanner')
    @include('frontend.inc_page.newArrival')
    {{-- @include('frontend.inc_page.newCollectionBanner') --}}
@endsection

@push('frontend_js')
@endpush
