<main class="site-main main-container no-sidebar">
    <div class="container">
        <div class="row mt-5">
            <div class="main-content col-md-12">
                <div class="page-main-content">
                    <div class="akasha">
                        <div class="akasha-notices-wrapper"></div>
                        <div class="akasha-cart-form">
                            <table class="shop_table shop_table_responsive cart akasha-cart-form__contents"
                                cellspacing="0">
                                <thead>
                                    <tr>
                                        <th class="product-remove">&nbsp;</th>
                                        <th class="product-thumbnail">&nbsp;</th>
                                        <th class="product-name">Product</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Quantity</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $items = \Cart::getContent();
                                        $subTotal = \Cart::getSubTotal();
                                    @endphp

                                    @foreach ($items as $value)
                                        <tr class="akasha-cart-form__cart-item cart_item">
                                            <td class="product-remove">
                                                <a href="{{ route('remove_item', [$value->id]) }}" class="remove"
                                                    aria-label="Remove this item" data-product_id="27"
                                                    data-product_sku="885B712">×</a>
                                            </td>
                                            <td class="product-thumbnail">
                                                <a href="#"><img
                                                        src="{{ asset('assets/uploads/products') }}/{{ $value->attributes->product_img }}"
                                                        class="attachment-akasha_thumbnail size-akasha_thumbnail"
                                                        alt="img" width="600" height="778"></a>
                                            </td>
                                            <td class="product-name" data-title="Product">
                                                <a href="#">{{ $value->name }}</a>
                                            </td>
                                            <td class="product-price" data-title="Price">
                                                <span class="akasha-Price-amount amount"><span
                                                        class="akasha-Price-currencySymbol">৳
                                                    </span>{{ $value->price }}</span>
                                            </td>
                                            <td class="product-quantity" data-title="Quantity">
                                                <div class="quantity">
                                                    <span class="qty-label">Quantiy:</span>
                                                    <div class="control ">

                                                        <input type="text" value="{{ $value->quantity }}"
                                                            title="Qty" class="input-qty input-text qty text"
                                                            min="0" readonly>

                                                    </div>
                                                </div>
                                            </td>
                                            <td class="product-subtotal" data-title="Total">
                                                <span class="akasha-Price-amount amount"><span
                                                        class="akasha-Price-currencySymbol">৳
                                                    </span>{{ $value->price * $value->quantity }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6" class="actions">
                                            <form action="{{ route('coupon.apply') }}" method="post">
                                                @csrf

                                                <div class="coupon mr-5">
                                                    <label for="coupon_code">Coupon:</label> <input type="text"
                                                        name="coupon_code" class="input-text" id="coupon_code"
                                                        value="" placeholder="Coupon code" required>
                                                    <button type="submit" class="button" name="apply_coupon"
                                                        value="Apply coupon">Apply coupon</button>
                                                </div>

                                            </form>

                                            <div class="my-3 mr-3">

                                                @if (Session::has('coupon'))
                                                    <a href="{{ route('coupon.remove', ['coupon_name']) }}"
                                                        class="remove h4" aria-label="Remove this item">× <b
                                                            class="text-danger">{{ Session::get('coupon')['coupon_name'] }}</b>
                                                        is Applied</a>
                                                @endif
                                            </div>

                                        </td>


                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="cart-collaterals">
                            <div class="cart_totals ">
                                <h2>Cart totals</h2>
                                <table class="shop_table shop_table_responsive" cellspacing="0">
                                    <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td data-title="Subtotal"><span class="akasha-Price-amount amount"><span
                                                        class="akasha-Price-currencySymbol">৳</span>
                                                    @if (Session::has('coupon'))
                                                        {{ Session::get('coupon')['balance'] }}
                                                    @else
                                                        {{ $subTotal }}
                                                    @endif
                                                </span>
                                            </td>



                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td data-title="Total"><strong><span
                                                        class="akasha-Price-amount amount"><span
                                                            class="akasha-Price-currencySymbol">৳</span>
                                                        @if (Session::has('coupon'))
                                                            {{ Session::get('coupon')['balance'] }}
                                                        @else
                                                            {{ $subTotal }}
                                                        @endif
                                                    </span></strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>

                                {{-- <div class="akasha-proceed-to-checkout my-3">
                                    <a href="{{ route('cutomer.checkout') }}"
                                       class="checkout-button button alt akasha-forward">
                                       Order now</a>
                                </div> --}}

                                <div class="akasha-proceed-to-checkout my-3">
                                    <a href="{{ route('cutomer.checkout') }}"
                                        class="checkout-button button alt akasha-forward">
                                        Proceed to checkout</a>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-md-12 col-sm-12 dreaming_crosssell-product">
                            <div class="block-title">
                                <h2 class="product-grid-title">
                                    <span>Cross Sell Products</span>
                                </h2>
                            </div>
                            <div class="owl-slick owl-products equal-container better-height"
                                 data-slick="{&quot;arrows&quot;:false,&quot;slidesMargin&quot;:30,&quot;dots&quot;:true,&quot;infinite&quot;:false,&quot;slidesToShow&quot;:4}"
                                 data-responsive="[{&quot;breakpoint&quot;:480,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:768,&quot;settings&quot;:{&quot;slidesToShow&quot;:2,&quot;slidesMargin&quot;:&quot;10&quot;}},{&quot;breakpoint&quot;:992,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1200,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;20&quot;}},{&quot;breakpoint&quot;:1500,&quot;settings&quot;:{&quot;slidesToShow&quot;:3,&quot;slidesMargin&quot;:&quot;30&quot;}}]">
                                <div class="product-item style-01 post-278 page type-page status-publish hentry">
                                    <div class="product-inner tooltip-left">
                                        <div class="product-thumb">
                                            <a class="thumb-link"
                                               href="#"
                                               tabindex="0">
                                                <img class="img-responsive"
                                                     src="assets/images/apro51012-1-600x778.jpg"
                                                     alt="Print In White" width="600" height="778">
                                            </a>
                                            <div class="flash">
                                                <span class="onsale"><span class="number">-21%</span></span>
                                                <span class="onnew"><span class="text">New</span></span></div>
                                            <div class="group-button">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <div class="yith-wcwl-add-button show">
                                                        <a href="#" class="add_to_wishlist">
                                                            Add to Wishlist</a>
                                                    </div>
                                                </div>
                                                <div class="akasha product compare-button"><a href="#"
                                                                                                   class="compare button">Compare</a>
                                                </div>
                                                <a href="#" class="button yith-wcqv-button">Quick View</a>
                                                <div class="add-to-cart">
                                                    <a href="#"
                                                       class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add
                                                        to cart
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info equal-elem">
                                            <h3 class="product-name product_title">
                                                <a href="#"
                                                   tabindex="0">Print In White</a>
                                            </h3>
                                            <div class="rating-wapper nostar">
                                                <div class="star-rating"><span style="width:0%">Rated <strong
                                                        class="rating">0</strong> out of 5</span></div>
                                                <span class="review">(0)</span></div>
                                            <span class="price"><del><span
                                                    class="akasha-Price-amount amount"><span
                                                    class="akasha-Price-currencySymbol">$</span>125.00</span></del> <ins><span
                                                    class="akasha-Price-amount amount"><span
                                                    class="akasha-Price-currencySymbol">$</span>99.00</span></ins></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item style-01 post-36 product type-product status-publish has-post-thumbnail product_cat-table product_cat-bed product_tag-light product_tag-table product_tag-sock first instock sale shipping-taxable purchasable product-type-simple">
                                    <div class="product-inner tooltip-left">
                                        <div class="product-thumb">
                                            <a class="thumb-link"
                                               href="#"
                                               tabindex="0">
                                                <img class="img-responsive"
                                                     src="assets/images/apro71-1-600x778.jpg"
                                                     alt="Women Bags" width="600" height="778">
                                            </a>
                                            <div class="flash">
                                                <span class="onsale"><span class="number">-18%</span></span>
                                                <span class="onnew"><span class="text">New</span></span></div>
                                            <div class="group-button">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <div class="yith-wcwl-add-button show">
                                                        <a href="#" class="add_to_wishlist">
                                                            Add to Wishlist</a>
                                                    </div>
                                                </div>
                                                <div class="akasha product compare-button"><a href="#"
                                                                                                   class="compare button">Compare</a>
                                                </div>
                                                <a href="#" class="button yith-wcqv-button">Quick View</a>
                                                <div class="add-to-cart">
                                                    <a href="#"
                                                       class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add
                                                        to cart
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info equal-elem">
                                            <h3 class="product-name product_title">
                                                <a href="#"
                                                   tabindex="0">Women Bags</a>
                                            </h3>
                                            <div class="rating-wapper nostar">
                                                <div class="star-rating"><span style="width:0%">Rated <strong
                                                        class="rating">0</strong> out of 5</span></div>
                                                <span class="review">(0)</span></div>
                                            <span class="price"><del><span
                                                    class="akasha-Price-amount amount"><span
                                                    class="akasha-Price-currencySymbol">$</span>109.00</span></del> <ins><span
                                                    class="akasha-Price-amount amount"><span
                                                    class="akasha-Price-currencySymbol">$</span>89.00</span></ins></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-item style-01 post-32 product type-product status-publish has-post-thumbnail product_cat-light product_cat-chair product_cat-sofas product_tag-hat product_tag-sock  instock sale featured shipping-taxable purchasable product-type-simple">
                                    <div class="product-inner tooltip-left">
                                        <div class="product-thumb">
                                            <a class="thumb-link"
                                               href="#"
                                               tabindex="0">
                                                <img class="img-responsive"
                                                     src="assets/images/apro91-1-600x778.jpg"
                                                     alt="Swing Dress" width="600" height="778">
                                            </a>
                                            <div class="flash">
                                                <span class="onnew"><span class="text">New</span></span></div>
                                            <div class="group-button">
                                                <div class="yith-wcwl-add-to-wishlist">
                                                    <div class="yith-wcwl-add-button show">
                                                        <a href="#" class="add_to_wishlist">
                                                            Add to Wishlist</a>
                                                    </div>
                                                </div>
                                                <div class="akasha product compare-button"><a href="#"
                                                                                                   class="compare button">Compare</a>
                                                </div>
                                                <a href="#" class="button yith-wcqv-button">Quick View</a>
                                                <div class="add-to-cart">
                                                    <a href="#"
                                                       class="button product_type_simple add_to_cart_button ajax_add_to_cart">Add
                                                        to cart
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-info equal-elem">
                                            <h3 class="product-name product_title">
                                                <a href="#"
                                                   tabindex="0">Swing Dress</a>
                                            </h3>
                                            <div class="rating-wapper nostar">
                                                <div class="star-rating"><span style="width:0%">Rated <strong
                                                        class="rating">0</strong> out of 5</span></div>
                                                <span class="review">(0)</span></div>
                                            <span class="price"><span
                                                    class="akasha-Price-amount amount"><span
                                                    class="akasha-Price-currencySymbol">$</span>89.00</span> – <span
                                                    class="akasha-Price-amount amount"><span
                                                    class="akasha-Price-currencySymbol">$</span>139.00</span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
