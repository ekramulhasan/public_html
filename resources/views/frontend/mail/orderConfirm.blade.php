<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Invoice</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
</head>

<body style="font-family: 'Poppins', sans-serif; color: #333; margin: 0; padding: 0;">

    <!-- Invoice 1 start -->
    <div class="invoice-1 invoice-content" style="padding: 20px; background-color: #f9f9f9;">

        <div class="container" style="width: 100%; max-width: 1140px; margin: 0 auto;">
            <div class="row" style="display: flex; flex-wrap: wrap;">
                <div class="col-lg-12" style="width: 100%;">
                    <div class="invoice-inner clearfix" style="background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                        <div class="invoice-info clearfix" id="invoice_wrapper" style="border-bottom: 2px solid #e6e6e6; margin-bottom: 20px;">
                            <div class="invoice-headar" style="margin-bottom: 20px;">
                                <div class="row g-0" style="display: flex; flex-wrap: wrap;">
                                    <div class="col-sm-6" style="width: 50%;">
                                        <div class="invoice-logo">
                                            <!-- logo started -->
                                            <div class="logo">
                                                <h2>Fabrish Fashion</h2>
                                            </div>
                                            <!-- logo ended -->
                                        </div>
                                    </div>
                                    <div class="col-sm-6 invoice-id" style="width: 50%; text-align: right;">
                                        <div class="info">
                                            <h1 style="color: white; margin: 0; font-size: 36px;">Invoice</h1>
                                            <p style="color: white; margin: 5px 0;">Invoice Number <span>#{{ $order->id }}</span></p>
                                            <p style="color: white; margin: 0;">Invoice Date <span>{{ $order->created_at->format('Y-m-d') }}</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-top" style="margin-bottom: 20px;">
                                <div class="row" style="display: flex; flex-wrap: wrap;">
                                    <div class="col-sm-6" style="width: 50%;">
                                        <div class="invoice-number mb-30" style="margin-bottom: 30px;">
                                            <h4 style="font-size: 24px; margin-bottom: 10px;">Invoice To</h4>
                                            <h2 class="name mb-10" style="font-size: 28px; margin-bottom: 10px;">{{ $order->billing->name }}</h2>
                                            <p class="invo-addr-1" style="margin: 0;">
                                                {{ $order->billing->mobile }} <br>
                                                {{ $order->billing->email }} <br />
                                                {{ $order->billing->address }}<br />
                                                Upazila: {{ $order->billing->upazila->name ?? '' }}<br />
                                                Distrcit: {{ $order->billing->district->name ?? '' }}<br />
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6" style="width: 50%; text-align: right;">
                                        <div class="invoice-number mb-30" style="margin-bottom: 30px;">
                                            <div class="invoice-number-inner">
                                                <h4 style="font-size: 24px; margin-bottom: 10px;">Invoice From</h4>
                                                <h2 class="name mb-10" style="font-size: 28px; margin-bottom: 10px;">Rashed Khan</h2>
                                                <p class="invo-addr-1" style="margin: 0;">
                                                    Fabrist Fashion <br />
                                                    fabristlifestyle@gmail.com<br />
                                                    Mirpur-10,Dhaka-1216,Bangladesh
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="invoice-center" style="margin-bottom: 20px;">
                                <div class="table-responsive" style="width: 100%; overflow-x: auto;">
                                    <table class="table mb-0 table-striped invoice-table" style="width: 100%; border-collapse: collapse;">
                                        <thead class="bg-active" style="background-color: #f0f0f0;">
                                            <tr class="tr" style="border-bottom: 2px solid #e6e6e6;">
                                                <th style="padding: 10px; text-align: left;">No.</th>
                                                <th class="pl0 text-start" style="padding: 10px; text-align: left;">Item Description</th>
                                                <th class="text-center" style="padding: 10px; text-align: center;">Price</th>
                                                <th class="text-center" style="padding: 10px; text-align: center;">Quantity</th>
                                                <th class="text-end" style="padding: 10px; text-align: right;">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($order->orderDetails as $item)
                                            <tr class="tr" style="border-bottom: 1px solid #e6e6e6;">
                                                <td style="padding: 10px; text-align: left;">
                                                    <div class="item-desc-1">
                                                        <span>0{{ $loop->index + 1 }}</span>
                                                    </div>
                                                </td>
                                                <td class="pl0" style="padding: 10px; text-align: left;">{{ $item->product->title }}</td>
                                                <td class="text-center" style="padding: 10px; text-align: center;">৳ {{ $item->product_price }}</td>
                                                <td class="text-center" style="padding: 10px; text-align: center;">{{ $item->product_qty }}</td>
                                                <td class="text-end" style="padding: 10px; text-align: right;">৳ {{ $item->product_price * $item->product_qty }}</td>
                                            </tr>
                                            @endforeach

                                            <tr class="tr2" style="border-top: 2px solid #e6e6e6;">
                                                <td style="padding: 10px; text-align: left;"></td>
                                                <td style="padding: 10px; text-align: left;"></td>
                                                <td style="padding: 10px; text-align: left;"></td>
                                                <td class="text-center" style="padding: 10px; text-align: center;">SubTotal</td>
                                                <td class="text-end" style="padding: 10px; text-align: right;">৳ {{ $order->sub_total }}</td>
                                            </tr>
                                            <tr class="tr2" style="border-bottom: 1px solid #e6e6e6;">
                                                <td style="padding: 10px; text-align: left;"></td>
                                                <td style="padding: 10px; text-align: left;"></td>
                                                <td style="padding: 10px; text-align: left;"></td>
                                                <td class="text-center" style="padding: 10px; text-align: center;">Delivery Charge</td>
                                                <td class="text-end" style="padding: 10px; text-align: right;">৳ {{ $order->delivery_charge }}</td>
                                            </tr>
                                            <tr class="tr2" style="border-top: 2px solid #e6e6e6; font-weight: bold;">
                                                <td style="padding: 10px; text-align: left;"></td>
                                                <td style="padding: 10px; text-align: left;"></td>
                                                <td style="padding: 10px; text-align: left;"></td>
                                                <td class="text-center f-w-600 active-color" style="padding: 10px; text-align: center;">Grand Total</td>
                                                <td class="f-w-600 text-end active-color" style="padding: 10px; text-align: right;">৳ {{ $order->total }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="invoice-contact clearfix" style="border-top: 2px solid #e6e6e6; padding-top: 20px;">
                                <div class="row g-0" style="display: flex; flex-wrap: wrap;">
                                    <div class="col-lg-9 col-md-11 col-sm-12" style="width: 100%;">
                                        <div class="contact-info" style="display: flex; justify-content: space-between;">
                                            <a href="tel:+55-4XX-634-7071" style="color: #333; text-decoration: none;"><i class="fa fa-phone"></i> +88 01604-000104</a>
                                            <a href="tel:info@themevessel.com" style="color: #333; text-decoration: none;"><i class="fa fa-envelope"></i> fabristlifestyle@gmail.com</a>
                                            <a href="tel:info@themevessel.com" class="mr-0 d-none-580" style="color: #333; text-decoration: none;"><i class="fa fa-map-marker"></i> Mirpur-10, Dhaka, Bangladesh</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Invoice 1 end -->

</body>

</html>
