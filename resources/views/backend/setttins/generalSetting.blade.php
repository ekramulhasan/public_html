@extends('backend.layouts.master')
@section('title') setting @endsection

@push('admin_style')

<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

@endpush

@section('content')


<div class="row">

    <div class="col">

        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">General Setting Create</h5>
                <small class="text-muted float-end"><a href="{{ route('admin.dashbord') }}" class="btn btn-primary"> <i class='bx bx-left-arrow-alt'></i> Back Dashboard</a></small>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.general.update') }}" method="POST">
                    @csrf

                    <div class="mb-3">

                        <label class="form-label" for="site_title">Site Title</label>
                        <input type="text" class="form-control @error('site_title')
                            is-invalid

                        @enderror" id="site_title" placeholder="Site Title" name="site_title" value="{{ Setting('site_title') }}" >

                        @error('site_title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label" for="site_address">Site Address</label>
                        <input type="text" class="form-control @error('site_address')
                            is-invalid

                        @enderror" id="site_address" placeholder="Site Address" name="site_address" value="{{ Setting('site_address') }}">

                        @error('site_address')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label" for="site_phone">Site Phone</label>
                        <input type="text" class="form-control @error('site_phone')
                            is-invalid

                        @enderror" id="site_phone" placeholder="Site Phone" name="site_phone" value="{{ Setting('site_phone') }}">

                        @error('site_phone')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label" for="site_email">Site Email</label>
                        <input type="text" class="form-control @error('site_email')
                            is-invalid

                        @enderror" id="site_email" placeholder="Site Email" name="site_email" value="{{ Setting('site_email') }}">

                        @error('site_email')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label" for="site_facebook_link">Site Facebook Link (<i class='bx bxl-facebook-square'></i>)</label>
                        <input type="text" class="form-control @error('site_facebook_link')
                            is-invalid

                        @enderror" id="site_facebook_link" placeholder="Site Facebook Link" name="site_facebook_link" value="{{ Setting('site_facebook_link') }}">

                        @error('site_facebook_link')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label" for="site_linkeding_link">Site Linkedin Link (<i class='bx bxl-linkedin-square' ></i>)</label>
                        <input type="text" class="form-control @error('site_linkeding_link')
                            is-invalid

                        @enderror" id="site_linkeding_link" placeholder="Site Linkedin Link" name="site_linkeding_link" value="{{ Setting('site_linkeding_link') }}">

                        @error('site_linkeding_link')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="meta_des">Meta Description</label>
                        <input type="text" class="form-control @error('meta_des') is-invalid @enderror" id="meta_des" placeholder="Meta Description" name="meta_des" value="{{ Setting('meta_des') }}">
                        @error('meta_des')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="meta_key">Meta Keywords</label>
                        <input type="text" class="form-control @error('meta_key') is-invalid @enderror" id="meta_key" placeholder="Meta Keywords" name="meta_key" value="{{ Setting('meta_key') }}">
                        @error('meta_key')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="meta_auth">Meta Author</label>
                        <input type="text" class="form-control @error('meta_auth') is-invalid @enderror" id="meta_auth" placeholder="Meta Author" name="meta_auth" value="{{ Setting('meta_auth') }}">
                        @error('meta_auth')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="meta_page_title">Meta Page Title</label>
                        <input type="text" class="form-control @error('meta_page_title') is-invalid @enderror" id="meta_page_title" placeholder="Meta Page Title" name="meta_page_title" value="{{ Setting('meta_page_title') }}">
                        @error('meta_page_title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="meta_page_des">Meta Page Description</label>
                        <input type="text" class="form-control @error('meta_page_des') is-invalid @enderror" id="meta_page_des" placeholder="Meta Page Description" name="meta_page_des" value="{{ Setting('meta_page_des') }}">
                        @error('meta_page_des')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="meta_img_url">Meta Image URL</label>
                        <input type="text" class="form-control @error('meta_img_url') is-invalid @enderror" id="meta_img_url" placeholder="Meta Image URL" name="meta_img_url" value="{{ Setting('meta_img_url') }}">
                        @error('meta_img_url')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="meta_page_url">Meta Page URL</label>
                        <input type="text" class="form-control @error('meta_page_url') is-invalid @enderror" id="meta_page_url" placeholder="Meta Page URL" name="meta_page_url" value="{{ Setting('meta_page_url') }}">
                        @error('meta_page_url')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="meta_twi_page_title">Meta Twitter Page Title</label>
                        <input type="text" class="form-control @error('meta_twi_page_title') is-invalid @enderror" id="meta_twi_page_title" placeholder="Meta Twitter Page Title" name="meta_twi_page_title" value="{{ Setting('meta_twi_page_title') }}">
                        @error('meta_twi_page_title')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="meta_twi_page_des">Meta Twitter Page Description</label>
                        <input type="text" class="form-control @error('meta_twi_page_des') is-invalid @enderror" id="meta_twi_page_des" placeholder="Meta Twitter Page Description" name="meta_twi_page_des" value="{{ Setting('meta_twi_page_des') }}">
                        @error('meta_twi_page_des')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="meta_twi_img_url">Meta Twitter Image URL</label>
                        <input type="text" class="form-control @error('meta_twi_img_url') is-invalid @enderror" id="meta_twi_img_url" placeholder="Meta Twitter Image URL" name="meta_twi_img_url" value="{{ Setting('meta_twi_img_url') }}">
                        @error('meta_twi_img_url')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="meta_fb_id">Meta Facebook Pixel ID</label>
                        <input type="text" class="form-control @error('meta_fb_id') is-invalid @enderror" id="meta_fb_id" placeholder="Meta Facebook Pixel ID" name="meta_fb_id" value="{{ Setting('meta_fb_id') }}">
                        @error('meta_fb_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="meta_gtm_id">Meta GTM ID</label>
                        <input type="text" class="form-control @error('meta_gtm_id') is-invalid @enderror" id="meta_gtm_id" placeholder="Meta GTM ID" name="meta_gtm_id" value="{{ Setting('meta_gtm_id') }}">
                        @error('meta_gtm_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror
                    </div>


                    <div class="mb-3">

                        <label class="form-label" for="site_description">Site Description</label>
                        <textarea name="site_description" id="" cols="30" rows="10" class="form-control @error('site_description')
                        is-invalid

                    @enderror" id="site_description">{{ Setting('site_description') }}</textarea>


                        @error('site_description')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <button type="submit" class="btn btn-primary">Create</button>

                </form>
            </div>
        </div>



    </div>
</div>


@endsection


@push('admin_script')

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

<script>
    $('.dropify').dropify();
</script>

@endpush
