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
        @foreach($products as $product)
        <div class="product row">
            <div class="content col-sm-12 col-md-6">
                <h3>{{$product->product_title}}</h3>
                <p>{{$product->product_content}}</p>
                <div class="button-group">
                    <div class="btn btn-price">{{$product->product_price}} vnđ</div>
                    <a onclick="openProduct({{$product->id}})" class="btn btn-buy" data-toggle="modal" data-target="#productModal">Đặt hàng</a>
                </div>
            </div>
            <div class="image-product col-sm-12 col-md-6">
                <img src="{{URL::asset('/public/upload/'. $product->product_avatar)}}">
            </div>
        </div>
        @endforeach
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
        <a onclick="getListCart()" data-toggle="modal" data-target="#cartModal">
            <h3 class="phone">037.2.***.156</h3>
            <img width="250"  src="{{URL::asset('/public/images/valentine/hotline.png')}}" />
            <div class="cart-nu"><span id="number-cart">0</span></div>
        </a>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-product">
                    <div class="modal-header">
                        <h5 class="modal-title" id="title_product"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="id_product" type="hidden" value=""/>
                        <div class="product">
                            <div class="image-product">
                                <img id="image_product" src="">
                            </div>
                            <div class="content">
                                <p id="description_product"></p>
                            </div>
                            <h4 class="price" id="price_product"></h4>
                    </div>
                    <div class="modal-footer">
                        <div class="button-group">
                            <a href="#" class="btn btn-price" data-dismiss="modal">Tiếp tục mua hàng</a>
                            <a type="buttons" onclick="addToCart()" class="btn btn-buy">Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </form>
    </div>
</div>
</div>
    <!-- Modal cart-->
    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-cart" role="document">
            <div class="modal-content">
                <form id="form-product">
                    <div class="modal-header">
                        <h5 class="modal-title">Giỏ hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="cart-body">

                    </div>
                    <div class="modal-footer">
                        <div class="button-group">
                            <a href="#" class="btn btn-price" data-dismiss="modal">Tiếp tục mua hàng</a>
                            <a type="buttons" onclick="payment()" class="btn btn-buy">Thanh toán</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="success-alert" class="alert-cart alert alert-success alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-success">thành công</span><span id="message-cart"></span>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <script>
            var $scrope;
            function openProduct(id) {
                var url = '{{URL::to('api/product/detail')}}/' + id;
                $.ajax({
                    type: 'GET',
                    url: url,
                    complete: function(res){
                        var response = res.responseText;
                        var product = JSON.parse(response);
                        $scrope = product;
                        var url_image = "{{URL::asset('/public/upload/')}}/" + product.product_avatar;
                        document.getElementById('title_product').innerHTML = product.product_title;
                        document.getElementById('image_product').src = url_image;
                        document.getElementById('description_product').innerHTML = product.product_content;
                        document.getElementById('price_product').innerHTML = product.product_price + " vnđ";
                        $('#id_product').val(product.id);
                    }
                });
            }
            function addToCart() {
                console.log($scrope.id);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })

                var url = '{{URL::to('api/giohang/add-cart')}}/' + $scrope.id;
                var data = {
                  "product_title": $scrope.product_title,
                  "product_price":  $scrope.product_price,
                  "product_avatar": $scrope.product_avatar ,
                  "product_content": $scrope.product_content,
                };
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    complete: function(res){
                        var response = res.responseText;
                        var cart = JSON.parse(response);
                        console.log(cart)
                        $('#success-alert').show();
                        document.getElementById('message-cart').innerHTML = cart.mesage;
                        if(cart.data)
                        {
                            $('.cart-nu').show();
                            var totalQty = cart.totalQty;
                            document.getElementById('number-cart').innerHTML = totalQty;
                        }
                        $('#productModal').modal('hide');
                        window.setTimeout(function () {
                            $("#success-alert").hide(); }, 3000);
                    }
                });
            }
            function getListCart() {
                $('.hotline').hide();
                var url = '{{URL::to('api/giohang/list')}}/';
                $.ajax({
                    type: 'GET',
                    url: url,
                    complete: function(res){
                        var response = res.responseText;
                        var cart = JSON.parse(response);
                        console.log(cart)
                        if(cart.data)
                        {
                            var totalQty = cart.totalQty;
                            $('.cart-nu').show();
                            document.getElementById('number-cart').innerHTML = totalQty;
                            var result ='';
                            cart.data.forEach(function(ev) {
                                var image =  "{{URL::asset('/public/upload/')}}/" + ev.product_avatar;
                                result += '\n' + HTMLProduct(ev.id,image,
                                    ev.product_title, ev.product_content, ev.product_price,ev.quantity);
                            });
                            document.getElementById('cart-body').innerHTML = result;
                        }
                    }
                });
            }
            $(document).on('hide.bs.modal','#cartModal', function () {
                $('.hotline').show();

            });
            function HTMLProduct(id, images, titles, contents, prices, qty) {
                var image = '<img src="'+ images +'">';
                var title = '<h3>'+ titles +'</h3>';
                var content = '<p>' + contents + '</p>';
                var price = '<h4>' +  prices + ' vnđ x</h4>\n' +
                    '<input type="number" class="form-control input-qty" value="'+ qty + '">'
                var result = '<div class="product-cart row">\n' +
                    '<div class="image-product col-sm-12 col-md-2">\n' + image + '</div>\n' +
                    '<div class="content col-sm-12 col-md-10">\n' +
                    '<div class="row">\n' +
                    '<div class="col-sm-12 col-md-8">\n' + title + content + '\n' +
                    '</div>\n' +
                    '<div class="col-sm-12 col-md-4">\n' +
                    '<div class="price">\n' + price +
                    '</div>\n' +
                    '<div class="button-cart">\n' +
                    '<button class="btn btn-delete" onclick="deleteItemCart('+ id + ')"><i class="fas fa-trash-alt"></i> Xóa</button>\n' +
                    '</div>\n' +
                    '</div>\n' +
                    ' </div>\n' +
                    '</div>\n' +
                    '</div>'
                return result;
            }
        </script>
@endsection

