@extends('frontend.master')
@section('title')
    Products | Page
@endsection

@push('frontend_style')
@endpush

@php

    $subTitle = '';
    if (!empty($subProduct)) {
        $subTitle = $subProduct[0]->title;
    }

    // $currencySymbols = [
    //                 'USD' => '$',
    //                 'EUR' => '€',
    //                 'GBP' => '£'
    //             ];
    // $currency = session('currency', 'USD');

@endphp

@section('main_body')
    <div class="section-001">
        <div class="container mt-5">
            <div class="akasha-heading style-01">
                <div class="heading-inner">
                    <h3 class="title">{{ $subTitle }} Products</h3>
                    <div class="subtitle">Made with care for your little ones, our products are perfect for every
                        occasion. Check it out.
                    </div>
                </div>
            </div>

            <div class="auto-clear equal-container better-height akasha-products">

                <ul class="row products columns-3">


                    @foreach ($subProduct as $value)
                        @if ($value->products->isNotEmpty())
                            @foreach ($value->products as $product)
                                <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-ts-6 style-02 post-30 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-specials product_tag-light product_tag-table product_tag-sock last instock featured downloadable shipping-taxable purchasable product-type-simple"
                                    data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                                    <div class="product-inner tooltip-left">
                                        <div class="product-thumb">
                                            <a class="thumb-link"
                                                href="{{ route('productDetails.page', [$product->slug]) }}">
                                                <img class="img-responsive"
                                                    src="{{ asset('assets/uploads/products') }}/{{ $product->product_img }}"
                                                    alt="Long Oversized" width="600" height="778">
                                            </a>
                                            <div class="flash">
                                                @if (filled($product->discount_per))
                                                    <span class="onsale"><span
                                                            class="number">-{{ $product->discount_per }}%</span></span>
                                                @endif
                                                <span class="onnew"><span class="text">New</span></span>
                                            </div>

                                        </div>

                                        <div class="product-info equal-elem">
                                            <div class="rating-wapper nostar">
                                                <div class="star-rating"><span style="width:1%">Rated <strong
                                                            class="rating">0</strong> out of 5</span></div>
                                                <span class="review">(0)</span>
                                            </div>
                                            <h3 class="product-name product_title">
                                                <a
                                                    href="{{ route('productDetails.page', [$product->slug]) }}">{{ $product->title }}</a>
                                            </h3>

                                            <div class="">
                                                @if (!is_null($product->delete_price))
                                                    <p class="price"><del class="text-danger"><span
                                                                class="akasha-Price-amount amount text-danger ml-1">৳
                                                                {{ $product->delete_price }}</span></del> </p>
                                                @endif
                                                <span class="price"><span class="akasha-Price-amount amount">
                                                        <span
                                                            class="akasha-Price-currencySymbol">৳</span>{{ $product->price }}</span></span>
                                            </div>

                                            <div class="text-center mt-2">
                                                <a href="{{ route('productDetails.page', [$product->slug]) }}" class="btn rounded"
                                                    style="background-color: black;color:white;">Order Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @else
                            <h2 class="text-center">Empty</h2>
                        @endif
                    @endforeach


                </ul>
            </div>

        </div>
    </div>
    </div>
@endsection

@push('frontend_js')
@endpush
