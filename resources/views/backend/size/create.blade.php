@extends('backend.layouts.master')
@section('title')
size size
@endsection

@push('admin_style')

<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">


@endpush

@section('content')


<div class="row">

    <h1>Size create</h1>
    <div class="col-12">
        <div class="d-flex justify-content-start">
            <a href="{{ route('size.index') }}" class="btn btn-primary">
                <i class="fa-solid fa-backward"></i>
                Back to size

            </a>
        </div>
    </div>

    <div class="col-12 mt-3">

        <div class="card">

            <div class="card-body">

                <form action="{{ route('size.store') }}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="size" class="form-label">Create Size</label>
                        <input type="text" class="form-control @error('new_size')
                            is-invalid
                        @enderror" id="size" placeholder="enter size name" name="new_size">

                        @error('new_size')

                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                        @enderror
                      </div>

                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="size_check" role="switch" name="is_active" checked>
                        <label class="form-check-label" for="size_check">Active/Inactive</label>
                      </div>

                      <button type="submit" class="btn btn-primary mt-2">Add</button>

                </form>

            </div>

        </div>

    </div>


</div>




@endsection


@push('admin_script')

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

@endpush
