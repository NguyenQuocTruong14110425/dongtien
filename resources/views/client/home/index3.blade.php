@extends('layout_client.layout')
@section('header-client')
    <title>Socola quà tặng 14/02</title>
@endsection
@section('content-client')
    <section id="header">
        <div class="top-header row">
            <div class="logo col-sm-12 col-md-6">
                <img src="{{URL::asset('/public/images/logo-01.png')}}">
            </div>
            <ul class="menu-2 col-sm-12 col-md-6">
                <li>
                    <a href="{{URL::to('/')}}">Trang chủ</a>
                </li>
                <li>
                    <a href="{{URL::to('/qua-tang-socola')}}">Quà tặng socola</a>
                </li>
                <li>
                    <a href="{{URL::to('/blog')}}">Blog</a>
                </li>
                <li>
                    <a href="{{URL::to('/lienhe')}}">Liên hệ</a>
                </li>
            </ul>
        </div>
        <div class="container">
            <div class="image-avater">
                <img src="{{URL::asset('/public/images/background-top.png')}}">
            </div>
        </div>
    </section>
    <div class="container">
    <section id="body-bg">
        <div class="qc-tt">
            <h3>Liên hệ để đặt hàng ngay 037.2136.156</h3>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{URL::asset('/public/images/picture_01.jpg')}}" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{URL::asset('/public/images/picture_02.jpg')}}" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{URL::asset('/public/images/picture_03.jpg')}}" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="bar-04">
            <div class="content">
                <h3>Sản phẩm mới</h3>
            </div>
            <img src="{{URL::asset('/public/images/bar_04.jpg')}}"/>
        </div>
        <div class="video-viral row">
            <div class="left-video col-sm-12 col-md-6">
                <video controls autoplay muted>
                    <source src="{{URL::asset('/public/video/demo1.mp4')}}" type="video/mp4">
                    Your browser does not support HTML5 video.
                </video>
            </div>
            <div class="right-video col-sm-12 col-md-6">
                <h3>Giới thiệu</h3>
                <p>Cung cấp Quà tặng Valentine tại dịch vụ quà trực tuyến Iquatang.
                    com với mẫu mã đa dạng, độc đáo và ý nghĩa. Những món quà độc đáo tạo nên sự khách biệt giúp gắn kết tình cảm của các bạn lại gần nhau hơn.
                    Hãy tham khảo những món quà tặng 14/2 ý nghĩa tại <a href="http://quatang1402.com">quatang1402.com</a> nhé.</p>
            </div>
        </div>
        <div class="product row">
            <div class="content col-sm-12 col-md-6">
                <h3>Chocolate Sweetheart</h3>
                <p>Chocolate Destiny là sản phẩm độc đáo của Salty Love với sự kết hợp truyền thống của bộ đôi hoa hồng lung linh
                    và socola ngọt ngào đặt trong chiếc hộp hình tim xinh xắn, rực rỡ kèm theo những lời nhắn nhủ đầy tình cảm "
                    Just For You" sẽ khiến người ấy tan chảy trước sự ngọt ngào và lãng mạn của bạn.</p>
                <div class="button-group">
                    <a href="#" class="btn btn-price">250,000 vnđ</a>
                    <a href="#" class="btn btn-buy" data-toggle="modal" data-target="#exampleModal">Đặt hàng</a>
                </div>
            </div>
            <div class="image-product col-sm-12 col-md-6">
                <img src="{{URL::asset('/public/images/product/01.jpg')}}">
            </div>
        </div>
        <div class="product row">
            <div class="image-product col-sm-12 col-md-6">
                <img src="{{URL::asset('/public/images/product/02.jpg')}}">
            </div>
            <div class="content col-sm-12 col-md-6">
                <h3>Chocolate Sweetheart</h3>
                <p>Chocolate Destiny là sản phẩm độc đáo của Salty Love với sự kết hợp truyền thống của bộ đôi hoa hồng lung linh
                    và socola ngọt ngào đặt trong chiếc hộp hình tim xinh xắn, rực rỡ kèm theo những lời nhắn nhủ đầy tình cảm "
                    Just For You" sẽ khiến người ấy tan chảy trước sự ngọt ngào và lãng mạn của bạn.</p>
                <div class="button-group">
                    <a href="#" class="btn btn-price">1,235,000 vnđ</a>
                    <a href="#" class="btn btn-buy" data-toggle="modal" data-target="#exampleModal">Đặt hàng</a>
                </div>
            </div>
        </div>
        <div class="product row">
            <div class="content col-sm-12 col-md-6">
                <h3>Chocolate Sweetheart</h3>
                <p>Chocolate Destiny là sản phẩm độc đáo của Salty Love với sự kết hợp truyền thống của bộ đôi hoa hồng lung linh
                    và socola ngọt ngào đặt trong chiếc hộp hình tim xinh xắn, rực rỡ kèm theo những lời nhắn nhủ đầy tình cảm "
                    Just For You" sẽ khiến người ấy tan chảy trước sự ngọt ngào và lãng mạn của bạn.</p>
                <div class="button-group">
                    <a href="#" class="btn btn-price">299,000 vnđ</a>
                    <a href="#" class="btn btn-buy" data-toggle="modal" data-target="#exampleModal">Đặt hàng</a>
                </div>
            </div>
            <div class="image-product col-sm-12 col-md-6">
                <img src="{{URL::asset('/public/images/product/03.jpg')}}">
            </div>
        </div>
        <div class="product row">
            <div class="image-product col-sm-12 col-md-6">
                <img src="{{URL::asset('/public/images/product/04.jpg')}}">
            </div>
            <div class="content col-sm-12 col-md-6">
                <h3>Chocolate Sweetheart</h3>
                <p>Chocolate Destiny là sản phẩm độc đáo của Salty Love với sự kết hợp truyền thống của bộ đôi hoa hồng lung linh
                    và socola ngọt ngào đặt trong chiếc hộp hình tim xinh xắn, rực rỡ kèm theo những lời nhắn nhủ đầy tình cảm "
                    Just For You" sẽ khiến người ấy tan chảy trước sự ngọt ngào và lãng mạn của bạn.</p>
                <div class="button-group">
                    <a href="#" class="btn btn-price">500,000 vnđ</a>
                    <a href="#" class="btn btn-buy" data-toggle="modal" data-target="#exampleModal">Đặt hàng</a>
                </div>
            </div>
        </div>
        <div class="product row">
            <div class="content col-sm-12 col-md-6">
                <h3>Chocolate Sweetheart</h3>
                <p>Chocolate Destiny là sản phẩm độc đáo của Salty Love với sự kết hợp truyền thống của bộ đôi hoa hồng lung linh
                    và socola ngọt ngào đặt trong chiếc hộp hình tim xinh xắn, rực rỡ kèm theo những lời nhắn nhủ đầy tình cảm "
                    Just For You" sẽ khiến người ấy tan chảy trước sự ngọt ngào và lãng mạn của bạn.</p>
                <div class="button-group">
                    <a href="#" class="btn btn-price">170,000 vnđ</a>
                    <a href="#" class="btn btn-buy"  data-toggle="modal" data-target="#exampleModal">Đặt hàng</a>
                </div>
            </div>
            <div class="image-product col-sm-12 col-md-6">
                <img src="{{URL::asset('/public/images/product/05.jpg')}}">
            </div>
        </div>
        <div class="future-new">
            <div class="future-top">
                <h3>Các chức năng nổi bật</h3>
            </div>
            <div class="future-body row">
                <div class="col-sm-12 col-md-6">
                    <a href="#">
                        <img src="{{URL::asset('/public/images/icon_1.jpg')}}">
                        <h4>Đặt hàng theo yêu cầu</h4>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <a href="#">
                        <img src="{{URL::asset('/public/images/icon_5.jpg')}}">
                        <h4>Tạo câu chuyện tình yêu</h4>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <a href="#">
                        <img src="{{URL::asset('/public/images/icon_3.jpg')}}">
                        <h4>Vòng quay valetine</h4>
                    </a>
                </div>
                <div class="col-sm-12 col-md-6">
                    <a href="#">
                        <img src="{{URL::asset('/public/images/icon_2.jpg')}}">
                        <h4>Đặt thiệp</h4>
                    </a>
                </div>
            </div>
        </div>
        <div class="body-bottom">
            <p>Valentine có lẽ là một ngày tuyệt vời đối với các cặp đôi nhưng đối với dân FA thì đó
                có lẽ sẽ là một ngày vô cùng thảm họa. Vậy làm sao để Valentine không còn là ngày tồi tệ mà lại trở thành một ngày
                cực chất cho dân FA chúng ta! Hãy tham khảo ý những kiến của Salty Love nhé!</p>
        </div>
    </section>
    <section id="footer">
        <h3>Happy Valentine!</h3>
        <div class="footer-line"></div>
        <p>Copyright © Sweet Valentine Group. All Rights Reserved.</p>
    </section>
    <svg id="skype-svg" preserveAspectRatio="xMinYMin meet">
    <image  class="cloud" width="150"  xlink:href="{{URL::asset('/public/images/valentine/may.png')}}" />
    <image  class="cloud" width="350"  xlink:href="{{URL::asset('/public/images/valentine/may.png')}}" />
    <image  class="cloud" width="300"  xlink:href="{{URL::asset('/public/images/valentine/may.png')}}" />
    <image  class="cloud" width="230"  xlink:href="{{URL::asset('/public/images/valentine/may.png')}}" />
    </svg>
    <svg id="hotball-svg" preserveAspectRatio="xMinYMin meet">
        <image  class="hotball" width="250"  xlink:href="{{URL::asset('/public/images/valentine/khinhkhicau.png')}}" />
        <image  class="hotball" width="150"  xlink:href="{{URL::asset('/public/images/valentine/khinhkhicau.png')}}" />
    </svg>
    <div class="hotline">
        <img width="250"  src="{{URL::asset('/public/images/valentine/hotline.png')}}" />
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chocolate Sweetheart</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="product">
                    <div class="image-product">
                        <img src="{{URL::asset('/public/images/product/05.jpg')}}">
                    </div>
                    <div class="content">
                        <p>Chocolate Destiny là sản phẩm độc đáo của Salty Love với sự kết hợp truyền thống của bộ đôi hoa hồng lung linh
                            và socola ngọt ngào đặt trong chiếc hộp hình tim xinh xắn, rực rỡ kèm theo những lời nhắn nhủ đầy tình cảm "
                            Just For You" sẽ khiến người ấy tan chảy trước sự ngọt ngào và lãng mạn của bạn.</p>
                    </div>
                    <h4 class="price">170,000 vnđ</h4>
            </div>
            <div class="modal-footer">
                <div class="button-group">
                    <a href="#" class="btn btn-price" data-dismiss="modal">Tiếp tục mua hàng</a>
                    <a href="#" class="btn btn-buy">Đặt hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script-footer')
    <script async src="{{URL::asset('public/js/TweenMax.min.js')}}"></script>
    <script>
        (function($) {
        $.fn.visible = function(partial) {

            var $t            = $(this),
                $w            = $(window),
                viewTop       = $w.scrollTop(),
                viewBottom    = viewTop + $w.height(),
                _top          = $t.offset().top,
                _bottom       = _top + $t.height(),
                compareTop    = partial === true ? _bottom : _top,
                compareBottom = partial === true ? _top : _bottom;

            return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

        };
        })(jQuery);
    </script>
    <script>
        $(document).ready(function() {
            intBall();
            var allMods = $(".product .image-product");
            var allMods1 = $(".product .content");

            allMods.each(function(i, el) {
                var el = $(el);
                if (el.visible(true)) {
                    el.addClass("already-visible");
                }
            });

            allMods1.each(function(i, el) {
                var el = $(el);
                if (el.visible(true)) {
                    el.addClass("already-hevi");
                }
            });
            $(window).trigger('scroll');
            $(window).bind('scroll', function () {
                $(".product .image-product").each(function(i, el) {
                    var el = $(el);
                    if (el.visible(true)) {
                        el.addClass("come-in");
                    }
                });
                $(".product .content").each(function(i, el) {
                    var el = $(el);
                    if (el.visible(true)) {
                        el.addClass("come-left");
                    }
                });
                var pixels = 100; //number of pixels before modifying styles
                if ($(window).scrollTop() > pixels) {
                    $('#topup-icon').css('display','block');
                } else {
                    $('#topup-icon').css('display','none');
                }
            });
            $('#topup-icon').click(function(){
                $("html, body").animate({ scrollTop: 0 }, 600);
                return false;
            });

        });
    </script>
    <script>
        function intBall()
        {
            TweenLite.defaultEase = Linear.easeNone;
            TweenLite.lagSmoothing(33, 16);

            var vw = window.innerWidth;
            var vh = window.innerHeight;
            var firstRun = true;

            $(".cloud").each(function (i, cloud) {
                animateCloud(cloud);
            });

            $(".hotball").each(function (i, ball) {
                animateHotBall(ball);
            });

            firstRun = false;
            TweenLite.set("svg", { attr: { viewBox: [0, 0, vw, vh].join(" ") } });
            TweenLite.to("svg", 0.25, { autoAlpha: 1 });

            function animateCloud(cloud) {

                var time = random(50, 200);
                var delay = random(5);

                var width = cloud.getAttribute("width") * 0.1;
                var dist = vw + width;
                var speed = (dist * 1000 / time);
                var fade = width / speed;

                TweenLite.set(cloud, {
                    autoAlpha: 0,
                    scale: random(0.5, 1),
                    x: -width,
                    y: random(0, vh - 100) }
                );


                var tl = new TimelineLite({
                    onComplete: animateCloud,
                    onCompleteParams: [cloud] });


                tl.add("start", delay).
                to(cloud, time, { x: dist}, "start").
                to(cloud, fade, { autoAlpha: 1 }, "start+=" + fade / 2).
                to(cloud, fade, { autoAlpha: 0 }, "-=" + fade * 2);

                if (firstRun) tl.progress(random(0.9));
            }
            function animateHotBall(ball) {

                var time = random(5, 150);
                var delay = random(10);

                var height = ball.getAttribute("height") * 1;
                var dist = vh + height;
                var speed = (dist * 1000 / time);
                var fade = height / speed;

                TweenLite.set(ball, {
                    autoAlpha: 0,
                    scale: random(0.5, 1),
                    x: random(0, vw - 20) ,
                    y: random(0, vh - 20),
                });


                var tl = new TimelineLite({
                    onComplete: animateHotBall,
                    onCompleteParams: [ball] });


                tl.add("start", delay).
                to(ball, time, { y: dist }, "start").
                to(ball, fade, { autoAlpha: 1 }, "start+=" + fade / 2).
                to(ball, fade, { autoAlpha: 0 }, "-=" + fade * 2);

                if (firstRun) tl.progress(random(0.9));
            }


            function random(min, max) {
                if (max == null) {max = min;min = 0;}
                return Math.random() * (max - min) + min;
            }
        }
    </script>
@endsection
    @section('script-footer')
        <script async src="{{URL::asset('public/js/TweenMax.min.js')}}"></script>
        <script>
            (function($) {
                $.fn.visible = function(partial) {

                    var $t            = $(this),
                        $w            = $(window),
                        viewTop       = $w.scrollTop(),
                        viewBottom    = viewTop + $w.height(),
                        _top          = $t.offset().top,
                        _bottom       = _top + $t.height(),
                        compareTop    = partial === true ? _bottom : _top,
                        compareBottom = partial === true ? _top : _bottom;

                    return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

                };
            })(jQuery);
        </script>
        <script>
            $(document).ready(function() {
                intBall();
                var allMods = $(".product .image-product");
                var allMods1 = $(".product .content");

                allMods.each(function(i, el) {
                    var el = $(el);
                    if (el.visible(true)) {
                        el.addClass("already-visible");
                    }
                });

                allMods1.each(function(i, el) {
                    var el = $(el);
                    if (el.visible(true)) {
                        el.addClass("already-hevi");
                    }
                });
                $(window).trigger('scroll');
                $(window).bind('scroll', function () {
                    $(".product .image-product").each(function(i, el) {
                        var el = $(el);
                        if (el.visible(true)) {
                            el.addClass("come-in");
                        }
                    });
                    $(".product .content").each(function(i, el) {
                        var el = $(el);
                        if (el.visible(true)) {
                            el.addClass("come-left");
                        }
                    });
                });
            });
        </script>
        <script>
            function intBall()
            {
                TweenLite.defaultEase = Linear.easeNone;
                TweenLite.lagSmoothing(33, 16);

                var vw = window.innerWidth;
                var vh = window.innerHeight;
                var firstRun = true;

                $(".cloud").each(function (i, cloud) {
                    animateCloud(cloud);
                });

                $(".hotball").each(function (i, ball) {
                    animateHotBall(ball);
                });

                firstRun = false;
                TweenLite.set("svg", { attr: { viewBox: [0, 0, vw, vh].join(" ") } });
                TweenLite.to("svg", 0.25, { autoAlpha: 1 });

                function animateCloud(cloud) {

                    var time = random(50, 200);
                    var delay = random(5);

                    var width = cloud.getAttribute("width") * 0.1;
                    var dist = vw + width;
                    var speed = (dist * 1000 / time);
                    var fade = width / speed;

                    TweenLite.set(cloud, {
                        autoAlpha: 0,
                        scale: random(0.5, 1),
                        x: -width,
                        y: random(0, vh - 100) }
                    );


                    var tl = new TimelineLite({
                        onComplete: animateCloud,
                        onCompleteParams: [cloud] });


                    tl.add("start", delay).
                    to(cloud, time, { x: dist}, "start").
                    to(cloud, fade, { autoAlpha: 1 }, "start+=" + fade / 2).
                    to(cloud, fade, { autoAlpha: 0 }, "-=" + fade * 2);

                    if (firstRun) tl.progress(random(0.9));
                }
                function animateHotBall(ball) {

                    var time = random(5, 150);
                    var delay = random(10);

                    var height = ball.getAttribute("height") * 1;
                    var dist = vh + height;
                    var speed = (dist * 1000 / time);
                    var fade = height / speed;

                    TweenLite.set(ball, {
                        autoAlpha: 0,
                        scale: random(0.5, 1),
                        x: random(0, vw - 20) ,
                        y: random(0, vh - 20),
                    });


                    var tl = new TimelineLite({
                        onComplete: animateHotBall,
                        onCompleteParams: [ball] });


                    tl.add("start", delay).
                    to(ball, time, { y: dist }, "start").
                    to(ball, fade, { autoAlpha: 1 }, "start+=" + fade / 2).
                    to(ball, fade, { autoAlpha: 0 }, "-=" + fade * 2);

                    if (firstRun) tl.progress(random(0.9));
                }


                function random(min, max) {
                    if (max == null) {max = min;min = 0;}
                    return Math.random() * (max - min) + min;
                }
            }
        </script>
@endsection