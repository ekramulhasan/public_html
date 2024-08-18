@extends('backend.layouts.master')
@section('title')
    Create Product
@endsection

@push('admin_style')
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">

    <style>
        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>
@endpush

@section('content')
    <div class="row">

        <h1>Product create</h1>
        <div class="col-12">
            <div class="d-flex justify-content-start">
                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    <i class="fa-solid fa-backward"></i>
                    Back to Product List
                </a>
            </div>
        </div>
    </div>


    <div class="card mt-3">

        <div class="card-body">

            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- category selection and product name --}}
                <div class="col-12 mt-3">

                    <div class="mb-3">
                        {{--
                        @php
                            dd($category_data);
                        @endphp --}}

                        <label for="category_id" class="form-label">Category Select</label>
                        <select class="form-select" aria-label="Default select example" name="category_id"
                            id="category_select">
                            <option selected disabled>Open this select menu</option>

                            @foreach ($category_data as $value)
                                <option value="{{ $value->id }}">{{ $value->title }}</option>
                            @endforeach


                        </select>

                        @error('category_id')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="subcategory_select" class="form-label">Subcategory Select</label>
                        <select class="form-select" id="subcategory_select" aria-label="Default select example"
                            name="subcategory_id">
                            <option selected disabled>Select Subcategory</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="subsubcategory_select" class="form-label">Sub-subcategory Select</label>
                        <select class="form-select" id="subsubcategory_select" aria-label="Default select example"
                            name="subsubcategory_id">
                            <option selected disabled>Select Sub-subcategory</option>
                        </select>
                    </div>


                    <label class="form-label">Select Product Sizes</label>
                    @foreach ($size_data as $size)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="size_id[]" id="size_{{ $size->id }}"
                                value="{{ $size->id }}">
                            <label class="form-check-label" for="size_{{ $size->id }}">
                                {{ $size->size_name }}
                            </label>
                        </div>
                    @endforeach


                    <label class="form-label mt-3">Select Product Colors</label>
                    @foreach ($color_data as $color)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="color_id[]"
                                id="color_{{ $color->id }}" value="{{ $color->id }}">
                            <label class="form-check-label" for="color_{{ $color->id }}">
                                {{ $color->color_name }}
                            </label>
                        </div>
                    @endforeach


                    <div class="mb-3 mt-3">

                        <label for="product_name" class="form-label">Product Name</label>
                        <input type="text"
                            class="form-control @error('product_name')
                                        is-invalid
                                    @enderror"
                            id="product_name" placeholder="enter product name" name="product_name"
                            value="{{ old('product_name') }}">

                        @error('product_name')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                </div>

                {{-- category selection and product name end --}}


                {{-- product price and code --}}

                <div class="row">


                    <div class="col-3 mb-3">


                        <label for="product_price" class="form-label">Product Price</label>
                        <input type="number"
                            class="form-control @error('product_price')
                                is-invalid
                            @enderror"
                            id="product_price" placeholder="enter product price" name="product_price" min="0"
                            value="{{ old('product_price') }}">

                        @error('product_price')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror


                    </div>

                    <div class="col-3 mb-3">


                        <label for="product_code" class="form-label">Delete Price</label>
                        <input type="number"
                            class="form-control @error('delete_price')
                                is-invalid
                            @enderror"
                            id="delete_price" placeholder="enter delete price" name="delete_price" min="0"
                            value="{{ old('delete_price') }}">

                        @error('delete_price')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                    <div class="col-3 mb-3">


                        <label for="dis_per" class="form-label">Discount Percentage</label>
                        <input type="number"
                            class="form-control @error('dis_per')
                                is-invalid
                            @enderror"
                            id="dis_per" placeholder="enter percentage" name="dis_per" min="0"
                            value="{{ old('dis_per') }}">

                        @error('dis_per')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>


                    <div class="col-3 mb-3">


                        <label for="product_code" class="form-label">Product Code</label>
                        <input type="text"
                            class="form-control @error('product_code')
                            is-invalid
                        @enderror"
                            id="product_code" placeholder="enter product code" name="product_code" min="0"
                            value="{{ old('product_code') }}">

                        @error('product_code')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                    </div>

                </div>

                {{-- product price and code end --}}


                {{-- stock quantity and alert quantity --}}

                <div class="row">

                    <div class="col-6 mb-3">


                        <label for="stock_quantiry" class="form-label">Stock Quantity</label>
                        <input type="number"
                            class="form-control @error('stock_quantiry')
                                is-invalid
                            @enderror"
                            id="stock_quantiry" placeholder="enter stock quantity" name="stock_quantiry" min="0"
                            value="{{ old('stock_quantiry') }}">

                        @error('stock_quantiry')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror


                    </div>

                    <div class="col-6 mb-3">


                        <label for="alert_quantity" class="form-label">Alert Quantity</label>
                        <input type="number"
                            class="form-control @error('alert_quantity')
                                is-invalid
                            @enderror"
                            id="alert_quantity" placeholder="enter product code" name="alert_quantity" min="1"
                            value="{{ old('alert_quantity') }}">

                        @error('alert_quantity')
                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror


                    </div>

                </div>

                {{-- stock quantity and alert quantity end --}}


                {{-- product description and image --}}

                <div class="row">

                    <div class="col-12">


                        <div class="mb-3">

                            <div class="form-floating">

                                <textarea
                                    class="form-control @error('short_description')
                                is-invalid
                                @enderror"
                                    placeholder="Short Description" id="short_description" style="height: 300px" name="short_description">{{ old('short_description') }}</textarea>


                                @error('short_description')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                        </div>


                        <div class="mb-3">

                            <div class="form-floating">

                                <textarea
                                    class="form-control @error('long_description')
                                is-invalid
                                @enderror"
                                    placeholder="Long Description" id="long_description" style="height: 150px" name="long_description">{{ old('long_description') }}</textarea>


                                @error('long_description')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                        </div>


                        {{-- <div class="mb-3">

                            <div class="form-floating">

                                <textarea
                                    class="form-control @error('long_description')
                                is-invalid
                                @enderror"
                                    placeholder="Additional info" id="short_description" style="height: 150px" name="additional_info"></textarea>
                                <label for="long_description"> Additional Info</label>

                                @error('additional_info')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                        </div> --}}



                        <div class="mb-3">

                            <label for="product_img" class="form-label">Product Image</label>
                            <input type="file"
                                class="form-control dropify @error('product_img')
                                is-invalid
                            @enderror"
                                id="" name="product_img">

                            @error('product_img')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>


                        <div class="mb-3">
                            <label for="multiple_product_img" class="form-label">Multiple Image</label>
                            <input
                                class="form-control @error('multiple_product_img')
                                is-invalid
                            @enderror"
                                type="file" id="multiple_product_img" name="multiple_product_img[]" multiple>

                            @error('multiple_product_img')
                                <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="category_check" role="switch"
                                name="is_active" checked>
                            <label class="form-check-label" for="category_check">Active/Inactive</label>
                        </div>

                        <button type="submit" class="btn btn-primary mt-2">Add Product</button>

                    </div>


                </div>


                {{-- product description and image --}}



            </form>



        </div>
    </div>
@endsection


@push('admin_script')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>

    <script>
        $('.dropify').dropify();
    </script>

    <script>
        $(document).ready(function() {
            $('#category_select').change(function() {
                var categoryId = $(this).val();

                $.ajax({
                    url: "{{ route('subcategory.get', ':category') }}".replace(':category',
                        categoryId),
                    method: 'GET',
                    success: function(response) {
                        $('#subcategory_select').empty();
                        $('#subcategory_select').append(
                            '<option selected disabled>Select Subcategory</option>');
                        $.each(response, function(key, value) {

                            $('#subcategory_select').append('<option value="' + value
                                .id + '">' + value.title + '</option>');
                        });
                    }
                });
            });

            $('#subcategory_select').change(function() {
                var subcategoryId = $(this).val();

                $.ajax({
                    url: "{{ route('subsubcategory.get', ':subcategory') }}".replace(
                        ':subcategory',
                        subcategoryId),
                    method: 'GET',
                    success: function(response) {

                        $('#subsubcategory_select').empty();
                        $('#subsubcategory_select').append(
                            '<option selected disabled>Select Sub-subcategory</option>');
                        $.each(response, function(key, value) {

                            $('#subsubcategory_select').append('<option value="' + value
                                .id + '">' + value.title + '</option>');
                        });
                    }
                });
            });
        });
    </script>

    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#short_description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#long_description'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
