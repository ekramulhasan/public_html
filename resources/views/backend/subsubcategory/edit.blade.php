@extends('backend.layouts.master')
@section('title')
Edit Subsubcategory
@endsection

@push('admin_style')

<link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">


@endpush

@section('content')


<div class="row">

    <h1>Subsubcategory Update</h1>
    <div class="col-12">
        <div class="d-flex justify-content-start">
            <a href="{{ route('subsubcategory.index') }}" class="btn btn-primary">
                <i class="fa-solid fa-backward"></i>
                Back to Subsubcategory

            </a>
        </div>
    </div>

    <div class="col-12 mt-3">

        <div class="card">

            <div class="card-body">

                <form action="{{ route('subsubcategory.update', $subsubcategory_update->slug) }}" method="post">

                    @csrf
                    @method('PUT')


                    <div class="mb-3">

                        <label for="subcategory_id" class="form-label">SubCategory Select</label>
                        <select class="form-select @error('update_subcategory_id')
                            is-invalid
                        @enderror" aria-label="Default select example" name="update_subcategory_id">
                            <option selected disabled>Open this select menu</option>

                            @foreach ($subcategory as $value)
                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                            @endforeach


                        </select>

                        @error('update_subcategory_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="subcategory" class="form-label">Subsubcategory Name</label>
                        <input type="text" class="form-control @error('new_category')
                            is-invalid
                        @enderror" id="subcategory" placeholder="enter subsubcategory name" name="update_subsubcategory" value="{{ $subsubcategory_update->title }}">

                        @error('update_subsubcategory')

                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>

                        @enderror
                      </div>

                      <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="subsubcategory_check" role="switch" name="is_active" @if ($subsubcategory_update->isActive)
                        checked
                        @endif>
                        <label class="form-check-label" for="subsubcategory_check">Active/Inactive</label>
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
