@extends('backend.layouts.master')
@section('title')
create subcategory
@endsection

@push('admin_style')

<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">


@endpush

@section('content')


<div class="row">

    <h1>Category create</h1>
    <div class="col-12">
        <div class="d-flex justify-content-start">
            <a href="{{ route('subcategory.index') }}" class="btn btn-primary">
                <i class="fa-solid fa-backward"></i>
                Back to Subcategory

            </a>
        </div>
    </div>

    <div class="col-12 mt-3">

        <div class="card">

            <div class="card-body">

                <form action="{{ route('subcategory.store') }}" method="post">
                    @csrf

                    <div class="mb-3">

                        <label for="category_id" class="form-label">Category Select</label>
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected disabled>Open this select menu</option>

                            @foreach ($category as $value)
                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                            @endforeach


                        </select>

                        @error('subcategory_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="subcategory" class="form-label">Subcategory Name</label>
                        <input type="text" class="form-control @error('new_category')
                            is-invalid
                        @enderror" id="subcategory" placeholder="enter subcategory name" name="new_subcategory">

                        @error('new_category')

                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                        @enderror
                      </div>

                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="subcategory_check" role="switch" name="is_active" checked>
                        <label class="form-check-label" for="subcategory_check">Active/Inactive</label>
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
