{{-- <div class="banner-wrapper no_background mt-5">
    <div class="banner-wrapper-inner">
        <nav class="akasha-breadcrumb"><a href="index.html">Home</a><i class="fa fa-angle-right"></i><a href="#">Shop</a>
            <i class="fa fa-angle-right"></i>Single Product
        </nav>
    </div>
</div> --}}
<div class="single-thumb-vertical main-container shop-page no-sidebar">
    <div class="container">
        <div class="row mt-5">
            <div class="main-content col-md-12">
                <div class="akasha-notices-wrapper"></div>
                <div id="product-27"
                    class="post-27 product type-product status-publish has-post-thumbnail product_cat-table product_cat-new-arrivals product_cat-lamp product_tag-table product_tag-sock first instock shipping-taxable purchasable product-type-variable has-default-attributes">
                    <div class="main-contain-summary">
                        <div class="contain-left has-gallery">
                            <div class="single-left">
                                <div
                                    class="akasha-product-gallery akasha-product-gallery--with-images akasha-product-gallery--columns-6 images">
                                    <a href="#" class="akasha-product-gallery__trigger">
                                        <img draggable="false" class="emoji" alt="🔍"
                                            src="https://s.w.org/images/core/emoji/11/svg/1f50d.svg"></a>

                                    <div class="flex-viewport">

                                        <figure class="akasha-product-gallery__wrapper">

                                            <div class="akasha-product-gallery__image">
                                                <img alt="img"
                                                    src="{{ asset('assets/uploads/products') }}/{{ $product->product_img }}">
                                            </div>


                                            @foreach ($product->productImage as $moreImage)
                                                <div class="akasha-product-gallery__image">
                                                    <img src="{{ asset('assets/uploads/products') }}/{{ $moreImage->product_multiple_img_name }}"
                                                        alt="img">
                                                </div>
                                            @endforeach


                                        </figure>
                                    </div>
                                    <ol class="flex-control-nav flex-control-thumbs">

                                        <li>
                                            <img src="{{ asset('assets/uploads/products') }}/{{ $product->product_img }}"
                                                alt="img">
                                        </li>

                                        @foreach ($product->productImage as $moreImage)
                                            <li>
                                                <img src="{{ asset('assets/uploads/products') }}/{{ $moreImage->product_multiple_img_name }}"
                                                    alt="img">
                                            </li>
                                        @endforeach

                                    </ol>
                                </div>
                            </div>
                            <div class="summary entry-summary">
                                <div class="flash">
                                    <span class="onnew"><span class="text">New</span></span>
                                </div>
                                <h1 class="product_title entry-title">{{ $product->title }}</h1>

                                <p class="price"><span class="akasha-Price-amount amount mr-3"><span
                                            class="akasha-Price-currencySymbol">৳ </span>{{ $product->price }}</span>

                                    @if (!is_null($product->delete_price))
                                        <p class="price"><del class="text-danger"><span
                                                    class="akasha-Price-amount amount text-danger">৳
                                                    {{ $product->delete_price }}</span></del> </p>
                                    @endif

                                <p class="stock in-stock">

                                    @if ($product->product_stock == 0)
                                        Availability: <span class="text-danger font-weight-bold"> Stock out </span>
                                    @else
                                        Availability: <span> In stock</span>
                                    @endif

                                </p>
                                <div class="akasha-product-details__short-description">
                                    {{-- <p>{{ $product->short_description }}</p> --}}
                                    <div class="">
                                        {!! $product->short_description !!}
                                    </div>
                                </div>

                                <form class="variations_form cart"
                                    action="{{ route('addTo.cart', ['product_slug' => $product->slug]) }}"
                                    method="post">
                                    @csrf

                                    <div class="ml-3">
                                        <label for="">Size :</label>
                                        <div class="form-check">
                                            @foreach ($product->sizes as $size)
                                                <input class="form-check-input" type="checkbox"
                                                    value="{{ $size->id }}" id="size" name="size">
                                                <label class="form-check-label mr-4" for="size{{ $size->id }}">
                                                    {{ $size->size_name }}
                                                </label>
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="col-3 mt-3">


                                        <label class="qty-label">Qty :</label>
                                        <div class="quantity">
                                            <label class="qty-label">Qty :</label>
                                            <div class="control">
                                                <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                                                <input type="number" data-step="1" min="1" max=""
                                                    name="quantity" value="1" title="Qty"
                                                    class="input-qty input-text qty text" size="4"
                                                    pattern="[0-9]*" inputmode="numeric" required>
                                                <a class="btn-number qtyplus quantity-plus" href="#">+</a>
                                            </div>
                                        </div>


                                    </div>

                                    <input type="hidden" name="product_slug" value="{{ $product->slug }}">

                                    <div class="single_variation_wrap">
                                        <div class="akasha-variation single_variation"></div>

                                        <div class="mb-3">

                                            <br>
                                            <div class="button-container">
                                                <div class="add-to-cart ml-3 mr-2">
                                                    <button type="submit"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        onclick="return validateAndSubmitForm(this, '{{ route('addTo.cart', ['product_slug' => $product->slug]) }}')"
                                                        style="cursor:pointer">
                                                        Add to cart
                                                    </button>
                                                </div>

                                                <div class="add-to-cart">
                                                    <button type="submit"
                                                        class="button product_type_simple add_to_cart_button ajax_add_to_cart"
                                                        onclick="return validateAndSubmitForm(this, '{{ route('direct.order', ['product_slug' => $product->slug]) }}')"
                                                        style="cursor:pointer">
                                                        Order now
                                                    </button>
                                                </div>
                                            </div>


                                            {{-- <input name="add-to-cart" value="27" type="hidden">
                                            <input name="product_id" value="27" type="hidden">
                                            <input name="variation_id" class="variation_id" value="0"
                                                type="hidden"> --}}
                                        </div>
                                    </div>
                                </form>

                                <div class="product_meta">

                                    <span class="posted_in">Categories: <a href="#"
                                            rel="tag">{{ $product->category->title }}</a>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="akasha-tabs akasha-tabs-wrapper">
                        <ul class="tabs dreaming-tabs" role="tablist">
                            <li class="description_tab active" id="tab-title-description" role="tab"
                                aria-controls="tab-description">
                                <a href="#tab-description">Description</a>
                            </li>
                            {{-- <li class="additional_information_tab" id="tab-title-additional_information"
                                role="tab" aria-controls="tab-additional_information">
                                <a href="#tab-additional_information">Additional information</a>
                            </li> --}}
                            <li class="reviews_tab" id="tab-title-reviews" role="tab"
                                aria-controls="tab-reviews">
                                <a href="#tab-reviews">Reviews (0)</a>
                            </li>
                        </ul>
                        <div class="akasha-Tabs-panel akasha-Tabs-panel--description panel entry-content akasha-tab"
                            id="tab-description" role="tabpanel" aria-labelledby="tab-title-description">
                            <h2>Description</h2>
                            <div class="container-table">
                                <div class="container-cell">
                                    <h2 class="az_custom_heading">{{ $product->title }}</h2>
                                    <div class="">
                                        {!! $product->long_description !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="akasha-Tabs-panel akasha-Tabs-panel--additional_information panel entry-content akasha-tab"
                            id="tab-additional_information" role="tabpanel"
                            aria-labelledby="tab-title-additional_information">
                            <h2>Additional information</h2>
                            <p>{{ $product->additional_info }}</p>
                        </div>
                        <div class="akasha-Tabs-panel akasha-Tabs-panel--reviews panel entry-content akasha-tab"
                            id="tab-reviews" role="tabpanel" aria-labelledby="tab-title-reviews">
                            <div id="reviews" class="akasha-Reviews">
                                <div id="comments">
                                    <h2 class="akasha-Reviews-title">Reviews</h2>
                                    <p class="akasha-noreviews">There are no reviews yet.</p>
                                </div>
                                <div id="review_form_wrapper">
                                    <div id="review_form">
                                        <div id="respond" class="comment-respond">
                                            <span id="reply-title" class="comment-reply-title">Be the first to review
                                                "{{ $product->title }}"</span>
                                            <form id="commentform" class="comment-form">
                                                <p class="comment-notes"><span id="email-notes">Your email adchair
                                                        will not be published.</span>
                                                    Required fields are marked <span class="required">*</span></p>
                                                <p class="comment-form-author">
                                                    <label for="author">Name&nbsp;<span
                                                            class="required">*</span></label>
                                                    <input id="author" name="author" value=""
                                                        size="30" required="" type="text">
                                                </p>
                                                <p class="comment-form-email"><label for="email">Email&nbsp;
                                                        <span class="required">*</span></label>
                                                    <input id="email" name="email" value=""
                                                        size="30" required="" type="email">
                                                </p>
                                                <div class="comment-form-rating"><label for="rating">Your
                                                        rating</label>
                                                    <p class="stars">
                                                        <span>
                                                            <a class="star-1" href="#">1</a>
                                                            <a class="star-2" href="#">2</a>
                                                            <a class="star-3" href="#">3</a>
                                                            <a class="star-4" href="#">4</a>
                                                            <a class="star-5" href="#">5</a>
                                                        </span>
                                                    </p>
                                                    <select title="product_cat" name="rating" id="rating"
                                                        required="" style="display: none;">
                                                        <option value="">Rate…</option>
                                                        <option value="5">Perfect</option>
                                                        <option value="4">Good</option>
                                                        <option value="3">Average</option>
                                                        <option value="2">Not that bad</option>
                                                        <option value="1">Very poor</option>
                                                    </select>
                                                </div>
                                                <p class="comment-form-comment"><label for="comment">Your
                                                        review&nbsp;<span class="required">*</span></label>
                                                    <textarea id="comment" name="comment" cols="45" rows="8" required=""></textarea>
                                                </p><input name="wpml_language_code" value="en" type="hidden">
                                                <p class="form-submit"><input name="submit" id="submit"
                                                        class="submit" value="Submit" type="submit"> <input
                                                        name="comment_post_ID" value="27" id="comment_post_ID"
                                                        type="hidden">
                                                    <input name="comment_parent" id="comment_parent" value="0"
                                                        type="hidden">
                                                </p>
                                            </form>
                                        </div><!-- #respond -->
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-12 col-sm-12 dreaming_related-product">
                <div class="block-title">
                    <h2 class="product-grid-title">
                        <span>Related Products</span>
                    </h2>
                </div>
                <div class="akasha-products style-01">
                    <div class="response-product product-list-owl owl-slick equal-container better-height"
                        data-slick='{
                        "arrows": true,
                        "slidesMargin": 0,
                        "dots": true,
                        "infinite": true,
                        "speed": 300,
                        "autoplay": true,
                        "autoplaySpeed": 3000,
                        "slidesToShow": 4,
                        "rows": 1
                    }'
                        data-responsive='[
                        {"breakpoint": 480, "settings": {"slidesToShow": 3, "slidesMargin": 10}},
                        {"breakpoint": 768, "settings": {"slidesToShow": 3, "slidesMargin": 10}},
                        {"breakpoint": 992, "settings": {"slidesToShow": 4, "slidesMargin": 10}},
                        {"breakpoint": 1200, "settings": {"slidesToShow": 4, "slidesMargin": 10}},
                        {"breakpoint": 1500, "settings": {"slidesToShow": 4, "slidesMargin": 10}}
                    ]'>

                        @foreach ($related_product as $value)
                            <div
                                class="product-item recent-product style-01 rows-space-0 post-93 product type-product status-publish has-post-thumbnail product_cat-light product_cat-table product_cat-new-arrivals product_tag-table product_tag-sock first instock shipping-taxable purchasable product-type-simple  ">
                                <div class="product-inner tooltip-left">
                                    <div class="product-thumb">
                                        <a class="thumb-link"
                                            href="{{ route('productDetails.page', [$value->slug]) }}" tabindex="0">
                                            <img class="img-responsive"
                                                src="{{ asset('assets/uploads/products') }}/{{ $value->product_img }}"
                                                alt="Black Shirt" width="270" height="350">
                                        </a>
                                        <div class="flash">
                                            @if (filled($value->discount_per))
                                                <span class="onsale"><span
                                                        class="number">-{{ $value->discount_per }}%</span></span>
                                            @endif
                                            <span class="onnew"><span class="text">New</span></span>
                                        </div>
                                        {{-- <div class="group-button">
                                            <div class="yith-wcwl-add-to-wishlist">
                                                <div class="yith-wcwl-add-button show">
                                                    <a href="#" class="add_to_wishlist">Add to Wishlist</a>
                                                </div>
                                            </div>
                                            <div class="akasha product compare-button">
                                                <a href="#" class="compare button">Compare</a>
                                            </div>
                                            <a href="#" class="button yith-wcqv-button">Quick View</a>
                                            <div class="add-to-cart">
                                                <a href="#"
                                                    class="button product_type_simple add_to_cart_button">Add to
                                                    cart</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <div class="product-info equal-elem">
                                        <h3 class="product-name product_title">
                                            <a href="{{ route('productDetails.page', [$value->slug]) }}"
                                                tabindex="0">{{ $value->title }}</a>
                                        </h3>
                                        <div class="rating-wapper nostar">
                                            <div class="star-rating"><span style="width:0%">Rated <strong
                                                        class="rating">0</strong> out of 5</span></div>
                                            <span class="review">(0)</span>
                                        </div>

                                        <span class="price"><span class="akasha-Price-amount amount"><span
                                                    class="akasha-Price-currencySymbol">৳
                                                </span>{{ $value->price }}</span></span>

                                        @if (!is_null($value->delete_price))
                                            <p class="price"><del class="text-danger"><span
                                                        class="akasha-Price-amount amount text-danger ml-1">৳
                                                        {{ $value->delete_price }}</span></del> </p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
