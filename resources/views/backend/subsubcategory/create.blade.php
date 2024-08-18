@extends('backend.layouts.master')
@section('title')
Create Subsubcategory
@endsection

@push('admin_style')

<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">


@endpush

@section('content')


<div class="row">

    <h1>SubsubCategory create</h1>
    <div class="col-12">
        <div class="d-flex justify-content-start">
            <a href="{{ route('subcategory.index') }}" class="btn btn-primary">
                <i class="fa-solid fa-backward"></i>
                Back to Subsubcategory

            </a>
        </div>
    </div>

    <div class="col-12 mt-3">

        <div class="card">

            <div class="card-body">

                <form action="{{ route('subsubcategory.store') }}" method="post">
                    @csrf

                    <div class="mb-3">

                        <label for="category_id" class="form-label">SubCategory Select</label>
                        <select class="form-select @error('subcategory_id')
                            is-invalid
                        @enderror" aria-label="Default select example" name="subcategory_id">
                            <option selected disabled>Open this select menu</option>

                            @foreach ($subcategory as $value)
                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                            @endforeach


                        </select>

                        @error('subcategory_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="subcategory" class="form-label">Subsubcategory Name</label>
                        <input type="text" class="form-control @error('new_subsubcategory')
                            is-invalid
                        @enderror" id="subcategory" placeholder="enter subsubcategory name" name="new_subsubcategory">

                        @error('new_subsubcategory')

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
