@php
    $categories = App\Models\category::where('isActive', 1)
        ->with('product')
        ->latest('id')
        ->select(['id', 'title', 'slug'])
        ->get();
    $categoryWithSub = App\Models\category::where('isActive', 1)
        ->with(['subCategoryes.subsubcategories'])
        ->latest('id')
        ->select(['id', 'title', 'slug'])
        ->get();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ Setting('meta_des') }}">
    <meta name="keywords" content="{{ Setting('meta_key') }}">
    <meta name="author" content="{{ Setting('meta_auth') }}">
    <meta name="robots" content="index, follow">

    <!-- Open Graph Meta Tags for social media sharing -->
    <meta property="og:title" content="{{ Setting('meta_page_title') }}">
    <meta property="og:description" content="{{ Setting('meta_page_des') }}">
    <meta property="og:image" content="{{ Setting('meta_img_url') }}">
    <meta property="og:url" content="{{ Setting('meta_page_url') }}">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ Setting('meta_twi_page_title') }}">
    <meta name="twitter:description" content="{{ Setting('meta_twi_page_des') }}">
    <meta name="twitter:image" content="{{ Setting('meta_twi_img_url') }}">

    <!-- Facebook Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '{{ Setting('meta_fb_id') }}');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id={{ Setting('meta_fb_id') }}&ev=PageView&noscript=1" />
    </noscript>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', '{{ Setting('meta_gtm_id') }}');
    </script>

    @include('frontend.css.css')
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    @include('frontend.inc_page.header')

    <div class="fullwidth-template">

        @yield('main_body')

    </div>
    @include('frontend.inc_page.footer')

    <div class="footer-device-mobile">
        <div class="wapper">
            <div class="footer-device-mobile-item device-home">
                <a href="{{ route('home') }}">
                    <span class="icon">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </span>
                    Home
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-wishlist">
                <a href="{{ route('cart.page') }}">
                    <span class="icon">
                        <i class="fa fa-heart" aria-hidden="true"></i>
                    </span>
                    Wishlist
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-cart">
                <a href="{{ route('cart.page') }}">
                    <span class="icon">
                        <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                        <span class="count-icon">
                            0
                        </span>
                    </span>
                    <span class="text">Cart</span>
                </a>
            </div>
            <div class="footer-device-mobile-item device-home device-user">

                @auth
                    <a href="{{ route('customer.profile') }}">
                        <span class="icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        Account
                    </a>
                @else
                    <a href="/login">
                        <span class="icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                        Login
                    </a>
                @endauth

            </div>
        </div>
    </div>
    <a href="#" class="backtotop active">
        <i class="fa fa-angle-up"></i>
    </a>
    @include('frontend.js.js')
</body>

</html>
