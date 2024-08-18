@extends('frontend.master')
@section('title')
    Products | Page
@endsection

@push('frontend_style')
@endpush

@section('main_body')
    <div class="section-001">
        <div class="container mt-5">
            <div class="akasha-heading style-01">
                <div class="heading-inner">
                    <h3 class="title">All Products</h3>
                    <div class="subtitle">Made with care for your little ones, our products are perfect for every
                        occasion. Check it out.
                    </div>
                </div>
            </div>



            <div class="auto-clear equal-container better-height akasha-products">

                <ul class="row products columns-3">


                    @foreach ($product as $value)

                                <li class="product-item wow fadeInUp product-item rows-space-30 col-bg-3 col-xl-3 col-lg-4 col-md-6 col-sm-6 col-ts-6 style-02 post-30 product type-product status-publish has-post-thumbnail product_cat-light product_cat-bed product_cat-specials product_tag-light product_tag-table product_tag-sock last instock featured downloadable shipping-taxable purchasable product-type-simple"
                                    data-wow-duration="1s" data-wow-delay="0ms" data-wow="fadeInUp">
                                    <div class="product-inner tooltip-left">
                                        <div class="product-thumb">
                                            <a class="thumb-link" href="{{ route('productDetails.page', [$value->slug]) }}">
                                                <img class="img-responsive"
                                                    src="{{ asset('assets/uploads/products') }}/{{ $value->product_img }}"
                                                    alt="Long Oversized" width="600" height="778">
                                            </a>
                                            <div class="flash">
                                                @if (filled($value->discount_per))
                                                    <span class="onsale"><span
                                                            class="number">-{{ $value->discount_per }}%</span></span>
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
                                                    href="{{ route('productDetails.page', [$value->slug]) }}">{{ $value->title }}</a>
                                            </h3>

                                            @if (!is_null($value->delete_price))
                                                <p class="price"><del class="text-danger"><span
                                                            class="akasha-Price-amount amount text-danger ml-1">৳
                                                            {{ $value->delete_price }}</span></del> </p>
                                            @endif
                                            <span class="price"><span class="akasha-Price-amount amount">
                                                    <span
                                                        class="akasha-Price-currencySymbol">৳</span>{{ $value->price }}</span></span>
                                        </div>
                                    </div>
                                </li>

                    @endforeach


                </ul>
            </div>

            {{-- <nav class="akasha-pagination text-center mt-5">
                {{ $product->links() }}
            </nav> --}}

        </div>
    </div>
    </div>
@endsection

@push('frontend_js')
@endpush
