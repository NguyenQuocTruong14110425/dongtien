@extends('layout_client.layout')
@section('header-client')
    <title>City Coin</title>
@endsection
@section('content-client')
    <div class="body-bg row">
        <div class="col-md-2">
            <div class="left-sidebar ">
                    <img class="big-size-kkc" src="{{URL::asset('/public/images/valentine/khinhkhicau.png')}}"/>
                    <img class="small-size-kkc" src="{{URL::asset('/public/images/valentine/khinhkhicau.png')}}"/>
                    <img class="may-01" src="{{URL::asset('/public/images/valentine/may.png')}}"/>
                    <img class="may-02" src="{{URL::asset('/public/images/valentine/may.png')}}"/>
                    <img class="hoa-01" src="{{URL::asset('/public/images/valentine/hoa1.png')}}"/>
                    <img class="hoa-02" src="{{URL::asset('/public/images/valentine/hoa1.png')}}"/>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
                <div class="body-main row">
                    <div class="col-sm-12 col-md-8">
                        <div class="screen-dashboard">
                            <canvas id="canvas" class="canvas-dashboard" width="600" height="460"></canvas>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="list-item-socola">
                            <button onclick="createShape('socola')" class="btn btn-info">create element</button>
                            <button onclick="addSocola()">
                                <img id="scream" src="{{URL::asset('/public/images/valentine/socola.png')}}">
                            </button>
                        </div>
                    </div>
                </div>
        </div>
        <div class="col-md-2">
            <div class="right-sidebar ">
                <img class="big-size-kkc" src="{{URL::asset('/public/images/valentine/khinhkhicau.png')}}"/>
                <img class="small-size-kkc" src="{{URL::asset('/public/images/valentine/khinhkhicau.png')}}"/>
                <img class="may-01" src="{{URL::asset('/public/images/valentine/may.png')}}"/>
                <img class="may-02" src="{{URL::asset('/public/images/valentine/may.png')}}"/>
                <img class="hoa-01" src="{{URL::asset('/public/images/valentine/hoa1.png')}}"/>
                <img class="hoa-02" src="{{URL::asset('/public/images/valentine/hoa1.png')}}"/>
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
