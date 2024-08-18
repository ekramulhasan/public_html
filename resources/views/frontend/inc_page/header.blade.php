<header id="header" class="header style-02 header-dark header-transparent header-sticky">

    <div class="header-wrap-stick">
        <div class="header-position">
            <div class="header-middle">
                <div class="akasha-menu-wapper"></div>
                <div class="header-middle-inner">
                    <div class="header-search-menu">
                        <div class="block-menu-bar">
                            <a class="menu-bar menu-toggle" href="#">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                        </div>
                    </div>
                    <div class="header-logo-nav">
                        <div class="header-logo">
                            <a href="{{ route('home') }}"><img alt="Akasha"
                                    src="{{ asset('uploads/system_img') }}/{{ Setting('logo_img') }}" class="logo"></a>
                        </div>
                        <div class="box-header-nav menu-nocenter">
                            <ul id="menu-primary-menu"
                                class="clone-main-menu akasha-clone-mobile-menu akasha-nav main-menu">
                                <li id="menu-item-230"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-230 parent parent-megamenu item-megamenu">
                                    <a class="akasha-menu-item-title" title="Home" href="/">Home</a>
                                </li>
                                <li id="menu-item-228"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-228 parent parent-megamenu item-megamenu menu-item-has-children">
                                    <a class="akasha-menu-item-title" title="categories" href="#">Categories</a>
                                    <span class="toggle-submenu"></span>
                                    <div class="submenu megamenu megamenu-shop">
                                        <div class="row">

                                            @foreach ($categoryWithSub as $value)
                                                <div class="col-md-4 mt-3">

                                                    <div class="akasha-listitem style-01">
                                                        <div class="listitem-inner">
                                                            <h4 class="title">{{ $value->title }}</h4>
                                                            <ul class="listitem-list">

                                                                @foreach ($value->subCategoryes as $subCategory)
                                                                    <li>
                                                                        <a href="{{ route('mensproduct.page', ['slug' => $subCategory->slug]) }}"
                                                                            target="_self">{{ $subCategory->title }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>
                                </li>
                                <li id="menu-item-229"
                                    class="menu-item menu-item-type-post_type menu-item-object-megamenu menu-item-229 parent parent-megamenu item-megamenu ">
                                    <a class="akasha-menu-item-title" title="all products"
                                        href="{{ route('allproduct.page') }}">All Products</a>

                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="header-control">
                        <div class="header-control-inner">
                            <div class="meta-dreaming">

                                <div class="header-search akasha-dropdown">
                                    <div class="header-search-inner" data-akasha="akasha-dropdown">
                                        <a href="#" class="link-dropdown block-link">
                                            <span class="flaticon-magnifying-glass-1"></span>
                                        </a>
                                    </div>
                                    <div class="block-search">
                                        <form role="search" action="{{ route('search') }}" method="GET"
                                            class="form-search block-search-form akasha-live-search-form">
                                            @csrf
                                            <div class="form-content search-box results-search">
                                                <div class="inner">
                                                    <input autocomplete="off" class="searchfield txt-livesearch input"
                                                        name="s" value="" placeholder="Search here..."
                                                        type="text">
                                                </div>
                                            </div>
                                            <input name="post_type" value="product" type="hidden">
                                            <input name="taxonomy" value="product_cat" type="hidden">
                                            <button type="submit" class="btn-submit">
                                                <span class="flaticon-magnifying-glass-1"></span>
                                            </button>
                                        </form><!-- block search -->
                                    </div>
                                </div>
                                <div class="akasha-dropdown-close">x</div>
                                <div class="menu-item block-user block-dreaming akasha-dropdown">
                                    <a class="block-link" href="/login">
                                        <span class="flaticon-profile"></span>
                                    </a>

                                    @auth
                                        <ul class="sub-menu">
                                            <li
                                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--dashboard is-active">
                                                <a href="{{ route('customer.profile') }}">Profile</a>
                                            </li>
                                            <li
                                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--orders">
                                                <a href="{{ route('cart.page') }}">ViewCart</a>
                                            </li>
                                            <li
                                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--downloads">
                                                <a href="{{ route('cutomer.checkout') }}">Checkout</a>
                                            </li>

                                            <li
                                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--edit-account">
                                                <a href="#">Account details</a>
                                            </li>
                                            <li
                                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--customer-logout">
                                                <a href="{{ route('customer.logout') }}">Logout</a>
                                            </li>
                                        </ul>
                                    @else
                                        <ul class="sub-menu">
                                            <li
                                                class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--dashboard is-active">
                                                <a href="/login">Login</a>
                                            </li>

                                        </ul>

                                    @endauth

                                </div>
                                <div class="block-minicart block-dreaming akasha-mini-cart akasha-dropdown">
                                    <div class="shopcart-dropdown block-cart-link" data-akasha="akasha-dropdown">
                                        <a class="block-link link-dropdown" href="cart.html">
                                            <span class="flaticon-bag"></span>
                                            <span class="count">
                                                @php
                                                    $item = \Cart::getContent();
                                                    echo $item->count();
                                                @endphp</span>
                                        </a>
                                    </div>
                                    <div class="widget akasha widget_shopping_cart">
                                        <div class="widget_shopping_cart_content">
                                            <h3 class="minicart-title">Your Cart<span class="minicart-number-items">
                                                    @php
                                                        $item = \Cart::getContent();
                                                        echo $item->count();
                                                    @endphp</span></h3>
                                            <ul class="akasha-mini-cart cart_list product_list_widget">

                                                @php
                                                    $items = \Cart::getContent();
                                                    $subTotal = \Cart::getSubTotal();
                                                @endphp

                                                @foreach ($items as $value)
                                                    <li class="akasha-mini-cart-item mini_cart_item">
                                                        <a href="{{ route('remove_item', [$value->id]) }}"
                                                            class="remove remove_from_cart_button">×</a>
                                                        <a href="#">
                                                            <img src="{{ asset('assets/uploads/products') }}/{{ $value->attributes->product_img }}"
                                                                class="attachment-akasha_thumbnail size-akasha_thumbnail"
                                                                alt="img" width="600"
                                                                height="778">{{ $value->name }}&nbsp;
                                                        </a>
                                                        <span class="quantity">{{ $value->quantity }} × <span
                                                                class="akasha-Price-amount amount"><span
                                                                    class="akasha-Price-currencySymbol">৳ </span>{{ $value->price * $value->quantity }}</span></span>
                                                        <br>
                                                        <span>Size: {{ $value->attributes->size }}</span>
                                                    </li>
                                                @endforeach


                                            </ul>
                                            <p class="akasha-mini-cart__total total"><strong>Subtotal:</strong>
                                                <span class="akasha-Price-amount amount"><span
                                                        class="akasha-Price-currencySymbol">৳ </span>{{ $subTotal }}</span>
                                            </p>
                                            <p class="akasha-mini-cart__buttons buttons">
                                                <a href="{{ route('cart.page') }}"
                                                    class="button akasha-forward">Viewcart</a>
                                                <a href="{{ route('cutomer.checkout') }}"
                                                    class="button checkout akasha-forward">Checkout</a>
                                            </p>
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
    <div class="header-mobile">
        <div class="header-mobile-left">
            <div class="block-menu-bar">
                <a class="menu-bar menu-toggle" href="#">
                    <span></span>
                    <span></span>
                    <span></span>
                </a>
            </div>
            <div class="header-search akasha-dropdown">
                <div class="header-search-inner" data-akasha="akasha-dropdown">
                    <a href="#" class="link-dropdown block-link">
                        <span class="flaticon-magnifying-glass-1"></span>
                    </a>
                </div>

                <div class="block-search">
                    <form role="search" action="{{ route('search') }}" method="GET"
                        class="form-search block-search-form akasha-live-search-form">
                        @csrf

                        <div class="form-content search-box results-search">
                            <div class="inner">
                                <input autocomplete="on" class="searchfield txt-livesearch input" name="search"
                                    value="" placeholder="Search here..." type="text">
                            </div>
                        </div>
                        <input name="post_type" value="product" type="hidden">
                        <input name="taxonomy" value="product_cat" type="hidden">

                        <button type="submit" class="btn-submit">
                            <span class="flaticon-magnifying-glass-1"></span>
                        </button>
                    </form><!-- block search -->
                </div>
            </div>
            {{-- <ul class="wpml-menu">
                <li class="menu-item akasha-dropdown block-language">
                    <a href="#" data-akasha="akasha-dropdown">
                        <img src="{{ asset('assets') }}/images/en.png" alt="en" width="18"
                            height="12">
                        English
                    </a>
                    <span class="toggle-submenu"></span>
                    <ul class="sub-menu">
                        <li class="menu-item">
                            <a href="#">
                                <img src="{{ asset('assets') }}/images/it.png" alt="it" width="18"
                                    height="12">
                                Italiano
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item">
                    <div class="wcml-dropdown product wcml_currency_switcher">
                        <ul>
                            <li class="wcml-cs-active-currency">
                                <a class="wcml-cs-item-toggle">USD</a>
                                <ul class="wcml-cs-submenu">
                                    <li>
                                        <a>EUR</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul> --}}
        </div>
        <div class="header-mobile-mid">
            <div class="header-logo">
                <a href="{{ route('home') }}"><img alt="Akasha" src="{{ asset('uploads/system_img') }}/{{ Setting('logo_img') }}"
                        class="logo"></a>
            </div>
        </div>
        <div class="header-mobile-right">
            <div class="header-control-inner">
                <div class="meta-dreaming">
                    <div class="menu-item block-user block-dreaming akasha-dropdown">
                        <a class="block-link" href="/login">
                            <span class="flaticon-profile"></span>
                        </a>
                        <ul class="sub-menu">

                            @auth
                                <li
                                    class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--dashboard is-active">
                                    <a href="{{ route('customer.profile') }}">Profile</a>
                                </li>
                                <li
                                    class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--orders">
                                    <a href="{{ route('cart.page') }}">ViewCart</a>
                                </li>
                                <li
                                    class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--downloads">
                                    <a href="{{ route('cutomer.checkout') }}">Checkout</a>
                                </li>

                                <li
                                    class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--edit-account">
                                    <a href="#">Account details</a>
                                </li>
                                <li
                                    class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--customer-logout">
                                    <a href="{{ route('customer.logout') }}">Logout</a>
                                </li>
                            @else
                                <li
                                    class="menu-item akasha-MyAccount-navigation-link akasha-MyAccount-navigation-link--customer-logout">
                                    <a href="/login">Login</a>
                                </li>
                            @endauth

                        </ul>
                    </div>
                    <div class="block-minicart block-dreaming akasha-mini-cart akasha-dropdown">
                        <div class="shopcart-dropdown block-cart-link" data-akasha="akasha-dropdown">
                            <a class="block-link link-dropdown" href="#">
                                <span class="flaticon-bag"></span>
                                <span class="count">
                                    @php
                                        $item = \Cart::getContent();
                                        echo $item->count();
                                    @endphp</span>
                            </a>
                        </div>
                        <div class="widget akasha widget_shopping_cart">
                            <div class="widget_shopping_cart_content">
                                <h3 class="minicart-title">Your Cart<span class="minicart-number-items">
                                        @php
                                            $item = \Cart::getContent();
                                            echo $item->count();
                                        @endphp</span></h3>
                                <ul class="akasha-mini-cart cart_list product_list_widget">

                                    @php
                                        $items = \Cart::getContent();
                                        $subTotal = \Cart::getSubTotal();
                                    @endphp

                                    @foreach ($items as $value)
                                        <li class="akasha-mini-cart-item mini_cart_item">
                                            <a href="{{ route('remove_item', [$value->id]) }}"
                                                class="remove remove_from_cart_button">×</a>
                                            <a href="#">
                                                <img src="{{ asset('assets/uploads/products') }}/{{ $value->attributes->product_img }}"
                                                    class="attachment-akasha_thumbnail size-akasha_thumbnail"
                                                    alt="img" width="600"
                                                    height="778">{{ $value->name }}&nbsp;
                                            </a>
                                            <span class="quantity">{{ $value->quantity }} × <span
                                                    class="akasha-Price-amount amount"><span
                                                        class="akasha-Price-currencySymbol">৳</span>{{ $value->price * $value->quantity }}</span></span>
                                        </li>
                                    @endforeach

                                </ul>
                                <p class="akasha-mini-cart__total total"><strong>Subtotal:</strong>
                                    <span class="akasha-Price-amount amount"><span
                                            class="akasha-Price-currencySymbol">৳</span>{{ $subTotal }}</span>
                                </p>
                                <p class="akasha-mini-cart__buttons buttons">
                                    <a href="{{ route('cart.page') }}" class="button akasha-forward">Viewcart</a>
                                    <a href="{{ route('cutomer.checkout') }}"
                                        class="button checkout akasha-forward">Checkout</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
