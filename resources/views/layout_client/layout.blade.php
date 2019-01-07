<!doctype html>
<html lang="vi,en">
<head>
    @include('layout_client.partials.head')
</head>
<body>
<div id="image-hi"></div>
<!--Navbar-->
{{--<div class="topbar-nav">--}}
    {{--<nav class="navbar navbar-default navbar-custom" role="navigation">--}}
        {{--<div class="container">--}}
            {{--<div class="navbar-header page-scroll">--}}
                {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">--}}
                    {{--<i class="fa fa-bars"></i>--}}
                {{--</button>--}}
                {{--<a class="navbar-brand" href="#page-top">--}}
                    {{--<img src="{{URL::asset('public/images/logo.png')}}" alt="logo">--}}
                {{--</a>--}}
            {{--</div>--}}
            {{--<!-- Collect the nav links, forms, and other content for toggling -->--}}
            {{--<div class="collapse navbar-collapse navbar-right navbar-main-collapse">--}}
                {{--<ul class="nav navbar-nav">--}}
                    {{--<!-- Hidden li included to remove active class from Adam & Eve link when scrolled up past about section -->--}}
                    {{--<li class="hidden">--}}
                        {{--<a href="#page-top"></a>--}}
                    {{--</li>--}}
                    {{--<li class="page-scroll">--}}
                        {{--<a href="{{URL::to('/')}}">Trang chủ</a>--}}
                    {{--</li>--}}
                    {{--<li class="page-scroll">--}}
                        {{--<a href="{{URL::to('/qua-tang-socola')}}">Quà tặng socola</a>--}}
                    {{--</li>--}}
                    {{--<li class="page-scroll dropdown">--}}
                        {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#moments">Quà tặng valentine</a>--}}
                        {{--<ul class="dropdown-menu wow swing" role="menu">--}}
                            {{--<li><a href="#">Hoa</a></li>--}}
                            {{--<li><a href="#">Đồ lưu niệm</a></li>--}}
                            {{--<li><a href="#">Gấu bông</a></li>--}}
                            {{--<li><a href="#">Đồ trang sức</a></li>--}}
                            {{--<li><a href="#">Mỹ phẩm</a></li>--}}
                            {{--<li><a href="#">Khác</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="page-scroll dropdown">--}}
                        {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#blog">dịch vụ mùa valentine</a>--}}
                        {{--<ul class="dropdown-menu wow swing" role="menu">--}}
                            {{--<li><a href="#">Thuê người yêu</a></li>--}}
                            {{--<li><a href="#">Tổ chức cầu hôn</a></li>--}}
                            {{--<li><a href="#">Dịch vụ xxx</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="page-scroll">--}}
                        {{--<a href="#blog">Diễn đàn</a>--}}
                    {{--</li>--}}
                    {{--<li class="page-scroll">--}}
                        {{--<a href="#contactus">Liên hệ</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<!-- /.navbar-collapse -->--}}

        {{--</div>--}}
    {{--</nav>--}}
{{--</div>--}}
<div>
    @yield('content-client')
</div>
<!--Footer Section-->
{{--<section class="footer">--}}
    {{--<!--Footer Two-->--}}
    {{--<div class="container-fluid dark footer2">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-md-12">--}}
                    {{--<p>© Webyzona 2014 - All Rights Reserved. Made With Love For You Only</p>--}}
                    {{--<div class="social-icons">--}}
                        {{--<ul>--}}
                            {{--<li class="twitter">--}}
                                {{--<a href="http://www.twitter.com" target="_blank">Twitter</a>--}}
                            {{--</li>--}}

                            {{--<li class="facebook">--}}
                                {{--<a href="http://www.facebook.com" target="_blank">Facebook</a>--}}
                            {{--</li>--}}

                            {{--<li class="youtube">--}}
                                {{--<a href="http://www.youtube.com" target="_blank">YouTube</a>--}}
                            {{--</li>--}}

                            {{--<li class="googleplus">--}}
                                {{--<a href="http://www.plus.google.com" target="_blank">Google +r</a>--}}
                            {{--</li>--}}

                            {{--<li class="pinterest">--}}
                                {{--<a href="http://www.pinterest.com/" target="_blank">Pinterest</a>--}}
                            {{--</li>--}}

                            {{--<li class="linkedin">--}}
                                {{--<a href="http://www.linkedin.com" target="_blank">Linkedin</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
@include('layout_client.partials.footer')
@yield('script-footer')
</body>
</html>
