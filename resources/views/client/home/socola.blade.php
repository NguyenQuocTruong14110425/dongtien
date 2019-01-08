@extends('layout_client.layout')
@section('header-client')
    <title>Socola quà tặng 14/02</title>
@endsection
@section('content-client')
        <section id="header">
            <ul class="menu-2">
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
        </section>
    <div class="body-main row">
                    <div class="col-sm-12 col-md-8">
                        <div class="screen-dashboard">
                            <div class="group-info">
                                <div class="price-socola">
                                    <h3>Tổng tiền: <span  id="toltal-price">200</span>,000 vnđ</h3>
                                </div>
                                <a href="#" class="btn btn-addcart"><i class="fas fa-cart-plus"></i> Đặt hàng</a>
                            </div>
                            <div class="button-canvas">
                                <a href="#" onclick="ScreenShoot()" class="btn btn-screen"><i class="fas fa-camera"></i></a>
                            </div>
                            <canvas id="canvas" class="canvas-dashboard" width="780" height="600"></canvas>
                        </div>
                    </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control txt-search" placeholder="Nhập tên socola">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                            <div class="socola">
                                <h3>Kẹo viên in hình</h3>
                                <div class="list-item-socola">
                                    @foreach($products_01 as $product01)
                                    <button onclick="addSocola('scream_{{$product01->id}}')" class="btn-socola">
                                        <img id="scream_{{$product01->id}}" width="70" height="70"
                                             src="{{URL::asset('/public/upload/' . $product01->product_avatar)}}">
                                    </button>
                                    @endforeach
                                </div>
                                <h3>Kẹo viên đen trắng</h3>
                                <div class="list-item-socola">
                                    @foreach($products_02 as $product02)
                                        <button onclick="addSocola('scream_{{$product02->id}}')" class="btn-socola">
                                            <img id="scream_{{$product02->id}}" width="70" height="70"
                                                 src="{{URL::asset('/public/upload/' . $product02->product_avatar)}}">
                                        </button>
                                    @endforeach
                                </div>
                                <h3>Hoa Socola + hoa giả</h3>
                                <div class="list-item-socola">
                                    @foreach($products_03 as $product03)
                                        <button onclick="addSocola('scream_{{$product03->id}}')" class="btn-socola">
                                            <img id="scream_{{$product03->id}}" width="70" height="70"
                                                 src="{{URL::asset('/public/upload/' . $product03->product_avatar)}}">
                                        </button>
                                    @endforeach
                                </div>
                                <h3>Khung ảnh socola</h3>
                                <div class="list-item-socola">
                                    @foreach($products_04 as $product04)
                                        <button onclick="addSocola('scream_{{$product04->id}}')" class="btn-socola">
                                            <img id="scream_{{$product04->id}}" width="70" height="70"
                                                 src="{{URL::asset('/public/upload/' . $product04->product_avatar)}}">
                                        </button>
                                    @endforeach
                                </div>
                            </div>
                    </div>
                </div>
        <div class="list-hop">
            <img id="hop1"  class="hide-hop" src="{{URL::asset('/public/images/hop/hop01.jpg')}}" width="780" height="600">
            <img onclick="changeBox('box01')" id="box01"  src="{{URL::asset('/public/images/hop/hop01.jpg')}}" >
            <img onclick="changeBox('box02')" id="box02"src="{{URL::asset('/public/images/hop/hop02.jpg')}}" >
            <img onclick="changeBox('box03')" id="box03" src="{{URL::asset('/public/images/hop/hop03.jpg')}}" >
            <a href="#" id="download" class="download-screen" download>tải về</a>
        </div>
    <img class="may-2" src="{{URL::asset('/public/images/valentine/may2.png')}}"/>
@endsection
@section('script-footer')
    <script src="{{URL::asset('public/js/dongtien.js')}}"></script>
    <script>
        function initItem() {
            var item1 = {
                "id"  : 1,
                "x": 354,
                "y": 146,
                "isTrue" : false,
                "price" : 8
            };
            var item2 = {
                "id"  : 2,
                "x": 431,
                "y": 146,
                "isTrue" : false,
                "price" : 8
            };
            var item3 = {
                "id"  : 3,
                "x": 513,
                "y": 148,
                "isTrue" : false,
                "price" : 8
            };
            var item4 = {
                "id"  : 4,
                "x": 592,
                "y": 148,
                "isTrue" : false,
                "price" : 8
            };
            var item5 = {
                "id"  : 5,
                "x": 671,
                "y": 151,
                "isTrue" : false,
                "price" : 8
            };
            var item6 = {
                "id"  : 6,
                "x": 354,
                "y": 224,
                "isTrue" : false,
                "price" : 8
            };
            var item7 = {
                "id"  : 7,
                "x": 431,
                "y": 224,
                "isTrue" : false,
                "price" : 8
            };
            var item8 = {
                "id"  : 8,
                "x": 511,
                "y": 228,
                "isTrue" : false,
                "price" : 8
            };
            var item9 = {
                "id"  : 9,
                "x": 590,
                "y": 228,
                "isTrue" : false,
                "price" : 8
            };
            var item10 = {
                "id"  : 10,
                "x": 670,
                "y": 228,
                "isTrue" : false,
                "price" : 8
            };
            var item11 = {
                "id"  : 11,
                "x": 352,
                "y": 304,
                "isTrue" : false,
                "price" : 8
            };
            var item12 = {
                "id"  : 12,
                "x": 430,
                "y": 306,
                "isTrue" : false,
                "price" : 8
            };
            var item13 = {
                "id"  : 13,
                "x": 513,
                "y": 306,
                "isTrue" : false,
                "price" : 8
            };
            var item14 = {
                "id"  : 14,
                "x": 592,
                "y": 306,
                "isTrue" : false,
                "price" : 8
            };
            var item15 = {
                "id"  : 15,
                "x": 669,
                "y": 306,
                "isTrue" : false,
                "price" : 8
            };
            var item16 = {
                "id"  : 16,
                "x": 352,
                "y": 382,
                "isTrue" : false,
                "price" : 8
            };
            var item17 = {
                "id"  : 17,
                "x": 430,
                "y": 385,
                "isTrue" : false,
                "price" : 8
            };
            var item18 = {
                "id"  : 18,
                "x": 510,
                "y": 385,
                "isTrue" : false,
                "price" : 8
            };
            var item19 = {
                "id"  : 19,
                "x": 591,
                "y": 385,
                "isTrue" : false,
                "price" : 8
            };
            var item20 = {
                "id"  : 20,
                "x": 670,
                "y": 385,
                "isTrue" : false,
                "price" : 8
            };
            var lstItem = [item1,item2,item3,item4,item5,item6,item7,item8,item9,item10,
                item11,item12,item13,item14,item15,item16,item17,item18,item19,item20]
            return lstItem;
        }
        var lstItem = initItem();
        $(document).ready(function(){
            var lstBox = window.location.href.toString().split("#");
            if(lstBox[1])
            {
                document.getElementById("hop1").src =  document.getElementById(lstBox[1]).src ;
                initSocola(lstItem,"hop1");
            }
           else
            {
                initSocola(lstItem,"hop1");
            }
        })

        function changeBox(idbox)
        {
            var url = "{{URL::to('/qua-tang-socola#')}}" + idbox;
            console.log(url);
            window.location.href = url;
            window.location.reload(false);
        }
    </script>
@endsection
