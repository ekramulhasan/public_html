<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">

    <!-- External CSS libraries -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/invoice_assets/css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet"
        href="{{ asset('assets') }}/invoice_assets/fonts/font-awesome/css/font-awesome.min.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="{{ asset('assets') }}/invoice_assets/img/favicon.ico" type="image/x-icon">

    <!-- Google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900">

    <!-- Custom Stylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('assets') }}/invoice_assets/css/style.css">
</head>

<body>

    <!-- Invoice 1 start -->
    <div class="invoice-1 invoice-content">


        {{-- @php
        dd($user_data )
    @endphp --}}

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="invoice-inner clearfix">
                        <div class="invoice-info clearfix" id="invoice_wrapper">
                            <div class="invoice-headar">
                                <div class="row g-0">
                                    <div class="col-sm-6">
                                        <div class="invoice-logo">
                                            <!-- logo started -->
                                            <div class="logo">

                                                {{-- <img src="{{ asset('assets/frontend/logo/in_logo.png') }}" alt="logo"> --}}
                                                <h2>Fabrist Fashion</h2>

                                            </div>
                                            <!-- logo ended -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6 invoice-id">
                                        <div class="info">
                                            <h1 class="color-white inv-header-1">Invoice</h1>
                                            <p class="color-white mb-1">Invoice Number <span>#{{ $order->id }}</span>
                                            </p>
                                            <p class="color-white mb-0">Invoice Date
                                                <span>{{ $order->created_at->format('Y-m-d') }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="invoice-number mb-30">
                                            <h4 class="inv-title-1">Invoice To</h4>
                                            <h2 class="name mb-10">{{ $order->billing->name }}</h2>
                                            <p class="invo-addr-1">
                                                {{ $order->billing->mobile }} <br>
                                                {{ $order->billing->email }} <br />
                                                {{ $order->billing->address }}<br />
                                                Upazila: {{ $order->billing->upazila->upazila_name_en ?? '' }}<br/>
                                                Distrcit: {{ $order->billing->district->district_name_en ?? '' }}<br/>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="invoice-number mb-30">
                                            <div class="invoice-number-inner">
                                                <h4 class="inv-title-1">Invoice From</h4>
                                                <h2 class="name mb-10">Rashed Khan</h2>
                                                <p class="invo-addr-1">
                                                    Fabrist Fashion <br />
                                                    fabristlifestyle@gmail.com<br />
                                                    Mirpur-10, Dhaka, Bangladesh
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center">
                                <div class="table-responsive">
                                    <table class="table mb-0 table-striped invoice-table">
                                        <thead class="bg-active">
                                            <tr class="tr">
                                                <th>No.</th>
                                                <th class="pl0 text-start">Item Description</th>
                                                <th class="text-center">Price</th>
                                                <th class="text-center">Quantity</th>
                                                <th class="text-end">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($order->orderDetails as $item)
                                                <tr class="tr">
                                                    <td>
                                                        <div class="item-desc-1">
                                                            <span>0{{ $loop->index + 1 }}</span>
                                                        </div>
                                                    </td>
                                                    <td class="pl0">{{ $item->product->title }}</td>
                                                    <td class="text-center">৳ {{ $item->product_price }}</td>
                                                    <td class="text-center">{{ $item->product_qty }}</td>
                                                    <td class="text-end">৳ {{ $item->product_price * $item->product_qty }}
                                                    </td>
                                                </tr>
                                            @endforeach




                                            <tr class="tr2">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">SubTotal</td>
                                                <td class="text-end">৳ {{ $order->sub_total }}</td>
                                            </tr>
                                            <tr class="tr2">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center">Delivery Charge</td>
                                                <td class="text-end">৳ {{ $order->delivery_charge }}</td>
                                            </tr>
                                            <tr class="tr2">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="text-center f-w-600 active-color">Grand Total</td>
                                                <td class="f-w-600 text-end active-color">৳ {{ $order->total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="invoice-contact clearfix">
                                <div class="row g-0">
                                    <div class="col-lg-9 col-md-11 col-sm-12">
                                        <div class="contact-info">
                                            <a href="tel:+55-4XX-634-7071"><i class="fa fa-phone"></i> +88 01604-000104</a>
                                            <a href="tel:info@themevessel.com"><i class="fa fa-envelope"></i>
                                                fabristlifestyle@gmail.com</a>
                                            <a href="tel:info@themevessel.com" class="mr-0 d-none-580"><i
                                                    class="fa fa-map-marker"></i> Mirpur-10, Dhaka, Bangladesh</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="invoice-btn-section clearfix d-print-none">

                            @if ($user_data->role_id == 1)
                                <a href="javascript:window.print()" class="btn btn-lg btn-print">
                                    <i class="fa fa-print"></i> Print Invoice
                                </a>
                            @else
                                <a href="javascript:window.print()" class="btn btn-lg btn-print">
                                    <i class="fa fa-download"></i> Download Invoice
                                </a>
                            @endif






                            {{-- <a href="{{ route('download.invoice',[$order->id]) }}" id="invoice_download_btn" class="btn btn-lg btn-download btn-theme">
                            <i class="fa fa-download"></i> Download Invoice
                        </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Invoice 1 end -->

    <script src="{{ asset('assets') }}/invoice_assets/js/jquery.min.js"></script>
    <script src="{{ asset('assets') }}/invoice_assets/js/jspdf.min.js"></script>
    <script src="{{ asset('assets') }}/invoice_assets/js/html2canvas.js"></script>
    <script src="{{ asset('assets') }}/invoice_assets/js/app.js"></script>
</body>

</html>
