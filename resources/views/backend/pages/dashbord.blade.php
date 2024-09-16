
@extends('backend.layouts.master')
@section('title')
    Dashbord
@endsection

@push('admin_style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('assets/font-awesome/css/all.min.css') }}">

    <style>
        .dataTables_length {
            padding: 20px 0;
        }
    </style>
@endpush


@section('content')

    <div class="row">

        <div class="col-12 mt-3 mb-3 ">
            <h1>Admin Dashboard !</h1>
        </div>

    </div>

    <div class="row">

        <div class="col-12">

            <div class="mb-5">
                <div class="row g-2">

                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="cs-icon cs-icon-dollar text-primary">
                                        <circle cx="10" cy="10" r="8"></circle>
                                        <path
                                            d="M8.2474 12.7882C9.21854 13.0238 10.3165 13.1347 11.255 12.7328C11.8747 12.4349 12.0341 11.9499 11.9943 11.3645C11.9508 10.4361 10.8492 10.0759 10.023 9.97886C9.37073 9.86455 8.53367 9.66016 8.15681 9.09552C7.83068 8.47891 8.00824 7.59903 8.73659 7.25954C9.4 6.95033 10.8166 6.87849 11.6536 7.25954">
                                        </path>
                                        <path d="M10 5.5V7M10 13V14.5"></path>
                                    </svg>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">EARNINGS</div>
                                <div class="text-primary cta-4">$ {{ $total_earning }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="cs-icon cs-icon-basket text-primary">
                                        <path
                                            d="M13.4444 7C15.2227 7 16.1119 7 16.6649 7.45341C16.9019 7.64779 17.0912 7.89407 17.2179 8.17322C17.5135 8.82437 17.2844 9.68352 16.8262 11.4018L16.0262 14.4018C15.7421 15.4672 15.6 15.9998 15.2575 16.3661C15.108 16.5259 14.9333 16.6602 14.7404 16.7634C14.2982 17 13.7469 17 12.6444 17L7.35564 17C6.25306 17 5.70177 17 5.25964 16.7634C5.06667 16.6602 4.89196 16.5259 4.74247 16.3661C4.39996 15.9998 4.25791 15.4672 3.97382 14.4018L3.17382 11.4018C2.7156 9.68352 2.4865 8.82436 2.78211 8.17322C2.90885 7.89407 3.09806 7.64779 3.33513 7.45341C3.88812 7 4.77729 7 6.55564 7L13.4444 7Z">
                                        </path>
                                        <path d="M12 11V13M8 11V13M12 2 15 7M8 2 5 7"></path>
                                    </svg>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">TOTAL ORDERS
                                </div>
                                <div class="text-primary cta-4">{{ $total_order }}</div>
                            </div>
                        </div>
                    </div>


                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="cs-icon cs-icon-server text-primary">
                                        <path
                                            d="M15 2H5C4.06812 2 3.60218 2 3.23463 2.15224 2.74458 2.35523 2.35523 2.74458 2.15224 3.23463 2 3.60218 2 4.06812 2 5 2 5.93188 2 6.39782 2.15224 6.76537 2.35523 7.25542 2.74458 7.64477 3.23463 7.84776 3.60218 8 4.06812 8 5 8H15C15.9319 8 16.3978 8 16.7654 7.84776 17.2554 7.64477 17.6448 7.25542 17.8478 6.76537 18 6.39782 18 5.93188 18 5 18 4.06812 18 3.60218 17.8478 3.23463 17.6448 2.74458 17.2554 2.35523 16.7654 2.15224 16.3978 2 15.9319 2 15 2zM15 12H5C4.06812 12 3.60218 12 3.23463 12.1522 2.74458 12.3552 2.35523 12.7446 2.15224 13.2346 2 13.6022 2 14.0681 2 15 2 15.9319 2 16.3978 2.15224 16.7654 2.35523 17.2554 2.74458 17.6448 3.23463 17.8478 3.60218 18 4.06812 18 5 18H15C15.9319 18 16.3978 18 16.7654 17.8478 17.2554 17.6448 17.6448 17.2554 17.8478 16.7654 18 16.3978 18 15.9319 18 15 18 14.0681 18 13.6022 17.8478 13.2346 17.6448 12.7446 17.2554 12.3552 16.7654 12.1522 16.3978 12 15.9319 12 15 12z">
                                        </path>
                                        <path d="M13 5H15M13 15H15M7 8 7 12M13 8 13 12"></path>
                                    </svg>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">TODAY ORDERS
                                </div>
                                <div class="text-primary cta-4">{{ $orderStatus['todayOrder'] }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="cs-icon cs-icon-dollar text-primary">
                                        <circle cx="10" cy="10" r="8"></circle>
                                        <path
                                            d="M8.2474 12.7882C9.21854 13.0238 10.3165 13.1347 11.255 12.7328C11.8747 12.4349 12.0341 11.9499 11.9943 11.3645C11.9508 10.4361 10.8492 10.0759 10.023 9.97886C9.37073 9.86455 8.53367 9.66016 8.15681 9.09552C7.83068 8.47891 8.00824 7.59903 8.73659 7.25954C9.4 6.95033 10.8166 6.87849 11.6536 7.25954">
                                        </path>
                                        <path d="M10 5.5V7M10 13V14.5"></path>
                                    </svg>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">PROCESS ORDERS
                                </div>
                                <div class="text-primary cta-4">{{ $orderStatus['orderProcess'] }}</div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="cs-icon cs-icon-basket text-primary">
                                        <path
                                            d="M13.4444 7C15.2227 7 16.1119 7 16.6649 7.45341C16.9019 7.64779 17.0912 7.89407 17.2179 8.17322C17.5135 8.82437 17.2844 9.68352 16.8262 11.4018L16.0262 14.4018C15.7421 15.4672 15.6 15.9998 15.2575 16.3661C15.108 16.5259 14.9333 16.6602 14.7404 16.7634C14.2982 17 13.7469 17 12.6444 17L7.35564 17C6.25306 17 5.70177 17 5.25964 16.7634C5.06667 16.6602 4.89196 16.5259 4.74247 16.3661C4.39996 15.9998 4.25791 15.4672 3.97382 14.4018L3.17382 11.4018C2.7156 9.68352 2.4865 8.82436 2.78211 8.17322C2.90885 7.89407 3.09806 7.64779 3.33513 7.45341C3.88812 7 4.77729 7 6.55564 7L13.4444 7Z">
                                        </path>
                                        <path d="M12 11V13M8 11V13M12 2 15 7M8 2 5 7"></path>
                                    </svg>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">CONFIRM ORDERS
                                </div>
                                <div class="text-primary cta-4">{{ $orderStatus['orderConfirm'] }}</div>
                            </div>
                        </div>
                    </div>


                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="cs-icon cs-icon-server text-primary">
                                        <path
                                            d="M15 2H5C4.06812 2 3.60218 2 3.23463 2.15224 2.74458 2.35523 2.35523 2.74458 2.15224 3.23463 2 3.60218 2 4.06812 2 5 2 5.93188 2 6.39782 2.15224 6.76537 2.35523 7.25542 2.74458 7.64477 3.23463 7.84776 3.60218 8 4.06812 8 5 8H15C15.9319 8 16.3978 8 16.7654 7.84776 17.2554 7.64477 17.6448 7.25542 17.8478 6.76537 18 6.39782 18 5.93188 18 5 18 4.06812 18 3.60218 17.8478 3.23463 17.6448 2.74458 17.2554 2.35523 16.7654 2.15224 16.3978 2 15.9319 2 15 2zM15 12H5C4.06812 12 3.60218 12 3.23463 12.1522 2.74458 12.3552 2.35523 12.7446 2.15224 13.2346 2 13.6022 2 14.0681 2 15 2 15.9319 2 16.3978 2.15224 16.7654 2.35523 17.2554 2.74458 17.6448 3.23463 17.8478 3.60218 18 4.06812 18 5 18H15C15.9319 18 16.3978 18 16.7654 17.8478 17.2554 17.6448 17.6448 17.2554 17.8478 16.7654 18 16.3978 18 15.9319 18 15 18 14.0681 18 13.6022 17.8478 13.2346 17.6448 12.7446 17.2554 12.3552 16.7654 12.1522 16.3978 12 15.9319 12 15 12z">
                                        </path>
                                        <path d="M13 5H15M13 15H15M7 8 7 12M13 8 13 12"></path>
                                    </svg>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">CANCEL ORDERS
                                </div>
                                <div class="text-primary cta-4">{{ $orderStatus['orderCancel'] }}</div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>


        </div>

    </div>


    <div class="row">

        <div class="col-12">

            <div class="mb-5">
                <div class="row g-2">

                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="cs-icon cs-icon-user text-primary">
                                        <path
                                            d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z">
                                        </path>
                                        <path
                                            d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5">
                                        </path>
                                    </svg>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">USERS</div>
                                <div class="text-primary cta-4">{{ $total_user }}</div>
                            </div>
                        </div>
                    </div>


                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="card h-100 hover-scale-up cursor-pointer">
                            <div class="card-body d-flex flex-column align-items-center">
                                <div
                                    class="sw-6 sh-6 rounded-xl d-flex justify-content-center align-items-center border border-primary mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="cs-icon cs-icon-arrow-top-left text-primary">
                                        <path d="M7 12L2.35355 7.35355C2.15829 7.15829 2.15829 6.84171 2.35355 6.64645L7 2">
                                        </path>
                                        <path
                                            d="M18 18V11C18 9.93913 17.5786 8.92172 16.8284 8.17157C16.0783 7.42143 15.0609 7 14 7H2.5">
                                        </path>
                                    </svg>
                                </div>
                                <div class="mb-1 d-flex align-items-center text-alternate text-small lh-1-25">PRODUCT</div>
                                <div class="text-primary cta-4">{{ $total_product }}</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>

    <div class="row">


        <div class="col-md-12">

            <h1>Order Table List</h1>

            <div class="table-responsive my-2">

                <table class="table table-bordered table-striped" id="my_table">

                    <thead>
                        <tr>

                            <th scope="col">ID</th>
                            <th scope="col">View Details</th>
                            <th scope="col">Invoice</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Sub-Total</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Total</th>
                            <th scope="col">Action</th>

                        </tr>
                    </thead>

                    <tbody>


                        @forelse ($order as $value)
                            <tr>

                                <td scope="row">{{ $order->firstItem() + $loop->index }}</td>

                                <td>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#Modal{{ $value->id }}">
                                        Order details
                                    </button>


                                    <!-- Modal -->
                                    <div class="modal fade" id="Modal{{ $value->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="Modal{{ $value->id }}">#Order ID:
                                                        {{ $value->id }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <table
                                                                    class="table table-striped table-inverse table-responsive">
                                                                    <thead class="thead-inverse">
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Name</th>
                                                                            <th>Image</th>
                                                                            <th>Size</th>
                                                                            <th>Qty</th>
                                                                            <th>Price</th>
                                                                            <th>Total</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($value->orderDetails as $item)
                                                                            <tr>
                                                                                <td>{{ $loop->index + 1 }}</td>
                                                                                <td>{{ $item->product->title ?? 'none' }}
                                                                                </td>
                                                                                <td>
                                                                                    <img class="img-fluid  h-100 w-100" src="{{ asset('assets/uploads/products') }}/{{ $item->product_img  }}" alt="">
                                                                                </td>
                                                                                <td>{{ $item->product_size }}</td>
                                                                                <td>{{ $item->product_qty }}</td>
                                                                                <td>{{ $item->product_price }}</td>
                                                                                <td>{{ $item->product_price * $item->product_qty }}
                                                                                </td>
                                                                            </tr>
                                                                        @endforeach
                                                                        <tr class="mb-5">
                                                                            <td colspan="6">
                                                                                Total Payable Amount:
                                                                            </td>
                                                                            <td><strong class="fw-bold text-danger">
                                                                                    ৳{{ $value->total }}</strong></td>
                                                                        </tr>
                                                                        <tr class="mt-5">
                                                                            <td colspan="50">
                                                                                <p class="text-primary">Billing Address:
                                                                                </p>
                                                                                <p><b>Recipent Name:</b>
                                                                                    {{ $value->billing->name }}</p>
                                                                                <p><b>Mobile Number:</b>
                                                                                    {{ $value->billing->mobile }}</p>
                                                                                <p>Address: {{ $value->billing->address }}
                                                                                </p>
                                                                                <p>Upazila:
                                                                                    {{ $value->billing->upazila->upazila_name_en ?? '' }},
                                                                                    Distrcit:
                                                                                    {{ $value->billing->district->district_name_en ?? '' }}
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </td>
                                <td><a href="{{ route('admin.invoice', [$value->id]) }}" class="btn btn-primary">view</a>
                                </td>

                                <td>{{ $value->created_at->format('d-M-Y H:i:s') }}</td>
                                <td>{{ $value->sub_total }}</td>
                                <td>{{ $value->discount_amount }}({{ $value->coupon_name }})</td>
                                <td>{{ $value->total }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <form action="{{ route('order.status') }}" method="POST"
                                            class="d-flex align-items-center">
                                            @csrf



                                            <select name="status" id="" class="form-select me-2"
                                                aria-label="Default select example">

                                                @if (!empty($value->orderStatus))
                                                    <option value="{{ $value->orderStatus->status }}" selected disabled>
                                                        {{ $value->orderStatus->status }}</option>
                                                @else
                                                    <option value="" selected disabled>Select</option>
                                                @endif

                                                <option value="Processing">Processing</option>
                                                <option value="Confirm">Confirm</option>
                                                <option value="Cancel">Cancel</option>
                                            </select>

                                            <input type="number" name="order_id" value="{{ $value->id }}" hidden>
                                            <button type="submit" class="btn btn-info">submit</button>
                                        </form>
                                    </div>
                                </td>




                            </tr>


                        @empty
                            <tr>
                                <td colspan="50">
                                    <p class="text-center">No order Found !!!</p>
                                </td>
                            </tr>
                        @endforelse

                    </tbody>
                </table>

                {{ $order->links() }}

            </div>

        </div>


        {{-- <div class="col-md-4">

        <canvas id="myChart"></canvas>

    </div> --}}

    </div>

@endsection

@push('admin_script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['2021', '2022', '2023'],
                datasets: [{
                    label: '# of Order',
                    data: <?php echo json_encode($order_year_wise); ?>,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>



    {{-- this is chart js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js"
        integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script> --}}

    <script>
        $(document).ready(function() {

            $('#my_table').DataTable({
                // pagingType: 'first_last_numbers'
            });

            $('.delete-corfirm').click(function(event) {

                let form = $(this).closest('form')

                event.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                })


            })

        });
    </script>
@endpush
