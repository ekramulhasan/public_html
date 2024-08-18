
<div class="slide-home-01">
    <div class="response-product product-list-owl owl-slick equal-container better-height"

    data-slick='{
        "arrows": false,
        "slidesMargin": 0,
        "dots": true,
        "infinite": true,
        "speed": 300,
        "autoplay": true,
        "autoplaySpeed": 3000,
        "slidesToShow": 1,
        "rows": 1
    }'
    data-responsive='[
        {"breakpoint": 480, "settings": {"slidesToShow": 1, "slidesMargin": 0}},
        {"breakpoint": 768, "settings": {"slidesToShow": 1, "slidesMargin": 0}},
        {"breakpoint": 992, "settings": {"slidesToShow": 1, "slidesMargin": 0}},
        {"breakpoint": 1200, "settings": {"slidesToShow": 1, "slidesMargin": 0}},
        {"breakpoint": 1500, "settings": {"slidesToShow": 1, "slidesMargin": 0}}
    ]'

    >
        <div class="slide-wrap">
            <img src="{{ asset('uploads/system_img') }}/{{ Setting('slide_one') }}" alt="image">
            <div class="slide-info">
                <div class="container">
                    {{-- <div class="slide-inner">
                        <h5>Limited Colletion</h5>
                        <h1>Dreamy</h1>
                        <h2>& Lovely</h2>
                        <a href="#">Shop now</a>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="slide-wrap">
            <img src="{{ asset('uploads/system_img') }}/{{ Setting('slide_two') }}" alt="image">
            <div class="slide-info">
                <div class="container">
                    {{-- <div class="slide-inner">
                        <h5>Best Selling</h5>
                        <h1><span>Glamorous</h1>
                        <h2>& Cute</h2>
                        <a href="#">Shop now</a>
                    </div> --}}
                </div>
            </div>
        </div>
        <!--<div class="slide-wrap">-->
        <!--    <img src="{{ asset('uploads/system_img') }}/{{ Setting('slide_tree') }}" alt="image">-->
        <!--    <div class="slide-info">-->
        <!--        <div class="container">-->
        <!--            {{-- <div class="slide-inner">-->
        <!--                <h5>This Week Only</h5>-->
        <!--                <h1>Mega Sale</h1>-->
        <!--                <h2>50% Off</h2>-->
        <!--                <a href="#">Shop now</a>-->
        <!--            </div> --}}-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
    </div>
</div>
