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
                <h5 class="mb-0">Apperance Setting Create</h5>
                <small class="text-muted float-end"><a href="{{ route('admin.dashbord') }}" class="btn btn-primary"> <i class='bx bx-left-arrow-alt'></i> Back Dashboard</a></small>
            </div>
            <div class="card-body">
                <form action="{{ route('settings.apperance.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">

                        <label class="form-label" for="site_bg_color">Site Background Color</label>
                        <input type="text" class="form-control @error('site_bg_color')
                            is-invalid

                        @enderror" id="site_bg_color" placeholder="Site Background Color" name="site_bg_color" value="{{ Setting('site_bg_color') }}" >

                        @error('site_bg_color')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label" for="banner_t1">Category Banner Title-1</label>
                        <input type="text" class="form-control @error('banner_t1')
                            is-invalid

                        @enderror" id="banner_t1" placeholder="Category Banner Title" name="banner_t1" value="{{ Setting('banner_t1') }}" >

                        @error('banner_t1')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label" for="banner_t2">Category Banner Title-2</label>
                        <input type="text" class="form-control @error('banner_t2')
                            is-invalid

                        @enderror" id="banner_t2" placeholder="Category Banner Title" name="banner_t2" value="{{ Setting('banner_t2') }}" >

                        @error('banner_t2')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label" for="banner_t2">Category Banner Title-3</label>
                        <input type="text" class="form-control @error('banner_t3')
                            is-invalid

                        @enderror" id="banner_t3" placeholder="Category Banner Title" name="banner_t3" value="{{ Setting('banner_t3') }}" >

                        @error('banner_t3')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">

                        <label class="form-label mt-3" for="basic-default-fullname">Site Logo (Size: 144x31)</label>
                        <input type="file" class="dropify" data-height="200" name="logo_img" data-default-file="{{ asset('uploads/system_img') }}/{{ Setting('logo_img') }}" />

                    </div>

                    <div class="mb-3">

                        <label class="form-label mt-3" for="basic-default-fullname">Slide Banner-1 (Size: 1920x940)</label>
                        <input type="file" class="dropify" data-height="200" name="slide_one" data-default-file="{{ asset('uploads/system_img') }}/{{ Setting('slide_one') }}" />

                    </div>

                    <div class="mb-3">

                        <label class="form-label mt-3" for="basic-default-fullname">Slide Banner-2 (Size: 1920x940)</label>
                        <input type="file" class="dropify" data-height="200" name="slide_two" data-default-file="{{ asset('uploads/system_img') }}/{{ Setting('slide_two') }}" />

                    </div>

                    <!--<div class="mb-3">-->

                    <!--    <label class="form-label mt-3" for="basic-default-fullname">Slide Banner-3 (Size: 1920x940)</label>-->
                    <!--    <input type="file" class="dropify" data-height="200" name="slide_tree" data-default-file="{{ asset('uploads/system_img') }}/{{ Setting('slide_tree') }}" />-->

                    <!--</div>-->

                    <div class="mb-3">

                        <label class="form-label mt-3" for="basic-default-fullname">Category Banner-1 (Size: 570x570)</label>
                        <input type="file" class="dropify" data-height="200" name="category_b1" data-default-file="{{ asset('uploads/system_img') }}/{{ Setting('category_b1') }}" />

                    </div>

                    <div class="mb-3">

                        <label class="form-label mt-3" for="basic-default-fullname">Category Banner-2 (Size: 570x270)</label>
                        <input type="file" class="dropify" data-height="200" name="category_b2" data-default-file="{{ asset('uploads/system_img') }}/{{ Setting('category_b2') }}" />

                    </div>

                    <div class="mb-3">

                        <label class="form-label mt-3" for="basic-default-fullname">Category Banner-3 (Size: 570x270)</label>
                        <input type="file" class="dropify" data-height="200" name="category_b3" data-default-file="{{ asset('uploads/system_img') }}/{{ Setting('category_b3') }}" />

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
