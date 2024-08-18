@extends('backend.layouts.master')
@section('title')
edit size
@endsection

@push('admin_style')

<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">


@endpush

@section('content')


<div class="row">

    <h1>Size Update</h1>
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

                <form action="{{ route('size.update', $size_update->id) }}" method="post">

                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="size" class="form-label">Update Size</label>
                        <input type="text" class="form-control @error('update_size')
                            is-invalid
                        @enderror" id="size" placeholder="enter size name" name="update_size" value="{{ $size_update->size_name }}">

                        @error('update_size')

                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                        @enderror
                      </div>

                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="category_check" role="switch" name="is_active"  @if ($size_update->isActive)
                        checked
                        @endif>
                        <label class="form-check-label" for="category_check">Active/Inactive</label>
                      </div>

                      <button type="submit" class="btn btn-primary mt-2">Update</button>

                </form>

            </div>

        </div>

    </div>


</div>




@endsection


@push('admin_script')

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>

@endpush
