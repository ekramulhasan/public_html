<div class="section-001">
    <div class="container">
        <div class="akasha-heading style-01">
            <div class="heading-inner">
                <h3 class="title">Best Seller</h3>
                <div class="subtitle">Made with care for your little ones, our products are perfect for every
                    occasion. Check it out.
                </div>
            </div>
        </div>
        <div class="akasha-products style-02">
            <div class="response-product product-list-owl owl-slick equal-container better-height"
                data-slick='{
                        "arrows": true,
                        "slidesMargin": 0,
                        "dots": true,
                        "infinite": true,
                        "speed": 300,
                        "autoplay": true,
                        "autoplaySpeed": 3000,
                        "slidesToShow": 3,
                        "rows": 2
                    }'
                data-responsive='[
                        {"breakpoint": 480, "settings": {"slidesToShow": 3, "slidesMargin": 10}},
                        {"breakpoint": 768, "settings": {"slidesToShow": 3, "slidesMargin": 10}},
                        {"breakpoint": 992, "settings": {"slidesToShow": 4, "slidesMargin": 10}},
                        {"breakpoint": 1200, "settings": {"slidesToShow": 4, "slidesMargin": 10}},
                        {"breakpoint": 1500, "settings": {"slidesToShow": 4, "slidesMargin": 10}}
                    ]'>

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
                                    @if (filled($value->discount_per))
                                        <span class="onsale"><span
                                                class="number">-{{ $value->discount_per }}%</span></span>
                                    @endif

                                    <span class="onnew"><span class="text">New</span></span>
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
                                <div class="">

                                    @if (!is_null($value->delete_price))
                                        <p class="price"><del class="text-danger"><span
                                                    class="akasha-Price-amount amount text-danger ml-1">৳
                                                    {{ $value->delete_price }}</span></del> </p>
                                    @endif

                                    <span class="price"><span class="akasha-Price-amount amount"><span
                                                class="akasha-Price-currencySymbol">৳ </span>{{ $value->price }}</span>
                                </div>

                                <div class="text-center mt-2">
                                    <a href="{{ route('productDetails.page', [$value->slug]) }}" class="btn rounded"
                                        style="background-color: black;color:white;">Order Now</a>
                                </div>



                            </div>

                            {{-- <div class="group-button clearfix">
                        <div class="yith-wcwl-add-to-wishlist">
                            <div class="yith-wcwl-add-button show">
                                <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                            </div>
                        </div>
                        <div class="add-to-cart">
                            <a href="{{ route('productDetails.page',[$value->slug]) }}" class="button product_type_grouped">
                                View products</a>
                        </div>
                        <div class="akasha product compare-button">
                            <a href="#" class="compare button">Compare</a>
                        </div>
                    </div> --}}
                        </div>
                    </div>
                @endforeach


            </div>
        </div>

    </div>
</div>
</div>
