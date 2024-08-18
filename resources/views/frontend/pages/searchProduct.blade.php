@extends('frontend.master')
@section('title')
    Product | Page
@endsection

@push('frontend_style')
@endpush

@section('main_body')


    <div class="section-001">
        <div class="container mt-5">
            <div class="akasha-heading style-01">
                <div class="heading-inner">
                    <h3 class="title">Search Products</h3>
                    <div class="subtitle">Made with care for your little ones, our products are perfect for every
                        occasion. Check it out.
                    </div>
                </div>
            </div>
            <div class="akasha-products style-02">
                <div class="response-product product-list-owl owl-slick equal-container better-height"
                    data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:30,&quot;dots&quot;:false,&quot;infinite&quot;:false,&quot;speed&quot;:300,&quot;slidesToShow&quot;:4,&quot;rows&quot;:2}"
                    data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:4,&quot;slidesMargin&quot;:&quot;30&quot;}}]">



                    @if ($product->isNotEmpty())
                        @foreach ($product as $value)
                            <div
                                class="product-item featured_products style-02 rows-space-30 post-34 product type-product status-publish has-post-thumbnail product_cat-light product_cat-new-arrivals product_tag-light product_tag-hat product_tag-sock first instock sale featured shipping-taxable product-type-grouped">
                                <div class="product-inner tooltip-top">
                                    <div class="product-thumb">
                                        <a class="thumb-link" href="{{ route('productDetails.page', [$value->slug]) }}"
                                            tabindex="0">
                                            <img class="img-responsive"
                                                src="{{ asset('assets/uploads/products') }}/{{ $value->product_img }}"
                                                alt="Maternity Shoulder" width="270" height="350">
                                        </a>
                                        <div class="flash">
                                            <span class="onnew"><span class="text">New</span></span>
                                            @if (filled($value->discount_per))
                                                <span class="onsale"><span
                                                        class="number">-{{ $value->discount_per }}%</span></span>
                                            @endif
                                        </div>
                                        <a href="#" class="button yith-wcqv-button">Quick View</a>
                                    </div>
                                    <div class="product-info">
                                        <div class="rating-wapper nostar">
                                            <div class="star-rating"><span style="width:0%">Rated <strong
                                                        class="rating">0</strong>
                                                    out of 5</span></div>
                                            <span class="review">(0)</span>
                                        </div>
                                        <h3 class="product-name product_title">
                                            <a href="{{ route('productDetails.page', [$value->slug]) }}"
                                                tabindex="0">{{ $value->title }}</a>
                                        </h3>
                                         @if (!is_null($value->delete_price))
                                            <p class="price"><del class="text-danger"><span
                                                        class="akasha-Price-amount amount text-danger ml-1">৳
                                                        {{ $value->delete_price }}</span></del> </p>
                                        @endif
                                        <span class="price"><span class="akasha-Price-amount amount"><span
                                                    class="akasha-Price-currencySymbol">৳ </span>{{ $value->price }}</span>
                                    </div>
                                 
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h2 class="text-center">Empty</h2>
                    @endif


                </div>
            </div>
            <nav class="akasha-pagination text-center mt-5">
                {{ $product->links() }}
            </nav>
        </div>
    </div>
    </div>

@endsection

@push('frontend_js')
@endpush
