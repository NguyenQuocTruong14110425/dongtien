@extends('layout_client.layout')
@section('header-client')
    <title>City Coin</title>
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
                            <canvas id="canvas" class="canvas-dashboard" width="780" height="600"></canvas>
                        </div>
                    </div>
                    <div class="socola col-sm-12 col-md-4">
                        <h3>Socola hình</h3>
                        <div class="list-item-socola">
                            {{--<button onclick="createShape('socola')" class="btn btn-info">create element</button>--}}
                            <button onclick="addSocola('scream')" class="btn-socola">
                                <img id="scream" width="70" height="70" src="{{URL::asset('/public/images/socola/1.png')}}">
                            </button>
                            <button onclick="addSocola('scream2')" class="btn-socola">
                                <img id="scream2" width="70" height="70" src="{{URL::asset('/public/images/socola/2.png')}}">
                            </button>
                            <button onclick="addSocola('scream3')" class="btn-socola">
                                <img id="scream3" width="70" height="70" src="{{URL::asset('/public/images/socola/3.png')}}">
                            </button>
                            <button onclick="addSocola('scream4')" class="btn-socola">
                                <img id="scream4" width="70" height="70"  src="{{URL::asset('/public/images/socola/4.png')}}">
                            </button>
                            <button onclick="addSocola('scream5')" class="btn-socola">
                                <img id="scream5" width="70" height="70" src="{{URL::asset('/public/images/socola/5.png')}}">
                            </button>
                            <button onclick="addSocola('scream6')" class="btn-socola">
                                <img id="scream6" width="70" height="70" src="{{URL::asset('/public/images/socola/6.png')}}">
                            </button>
                            <button onclick="addSocola('scream7')" class="btn-socola">
                                <img id="scream7" width="70" height="70" src="{{URL::asset('/public/images/socola/7.png')}}">
                            </button>
                        </div>
                    </div>
                </div>
    <img class="may-2" src="{{URL::asset('/public/images/valentine/may2.png')}}"/>
@endsection
@section('script-footer')
    <script src="{{URL::asset('public/js/dongtien.js')}}"></script>
    <script>
        $(document).ready(function(){
          init();
        })
    </script>
@endsection
