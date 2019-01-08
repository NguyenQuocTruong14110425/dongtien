<!doctype html>
<html lang="vi,en">
<head>
    @include('layout_admin.partials.head')
    @yield('header-admin')
</head>
<body>
<section id="header">
    <div class="menu">
        <ul class="topnav">
            <li>
                <a href="#home">
                    <img src="{{URL::asset('public/images/logo-01.png')}}">
                </a>
            </li>
            <li>
                <a  href="{{URL::to('admin/dashboard')}}">
                    <i class="fas fa-home"></i>
                    <p>Trang chủ</p>
                </a>
            </li>
            <li>
                <a href="{{URL::to('admin/user/')}}" >
                    <i class="fas fa-users"></i>
                    <p>Người dùng</p>
                </a>
            </li>
            <li>
                <a href="{{URL::to('admin/order/')}}">
                    <i class="fas fa-file-export"></i>
                    <p>Đơn hàng</p>
                </a>
            </li>
            <li>
                <a href="{{URL::to('admin/product/')}}" >
                    <i class="fas fa-boxes"></i>
                    <p>Sản phẩm</p>
                </a>
            </li>
            <li>
                <a href="{{URL::to('admin/news/')}}" >
                    <i class="fas fa-file-signature"></i>
                    <p>Tin tức</p>
                </a>
            </li>
            <li class="right-item">
                <a href="{{URL::to('admin/user/')}}">
                    <i class="far fa-user"></i>
                    <p>Admin</p>
                </a>
            </li>
            <li class="right-item">
                <a href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog"></i>
                    <p>Cài đặt</p>
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{URL::to('admin/setting/')}}">Action</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">Đăng xuất</a>
                </div>
            </li>
            <li class="icon">
                <a href="#" onclick="toggleMenu()">&#9776;</a>
            </li>
        </ul>
    </div>
</section>
<section id="bg-body row">
    <div class="right-body col-sm-12">
    @yield('content-admin')
    </div>
</section>
@include('layout_admin.partials.footer')
@yield('script-footer')
</body>
</html>
