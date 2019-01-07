@extends('layout_admin.layout')
@section('header-admin')
    <title>dashboad</title>
@endsection
@section('content-admin')
        <div class="pannel">
            <div class="pannel-title">
                 <div class="current-page">@lang('component.resources_create_title')</div>
                    <li><a href="{{URL::to('admin/dashboard')}}" title="admin/dashboad">@lang('component.dashboard')</a></li>
                    <li><a href="{{URL::to('admin/resources/')}}" title="admin/catelogies">@lang('component.resources')</a></li>
            </div>
            <div class="right-action">
                <button type="button" class="btn btn-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-th-list"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#"><i class="fas fa-question-circle"></i>Help</a>
                    <a class="dropdown-item" href="#"><i class="fab fa-stack-overflow"></i> Activity</a>
                </div>
            </div>
        </div>
        <form class="form-basic" action="{{URL::to('admin/resources/create')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-wallet"></i>
                        <h2>@lang('component.resources_content')</h2>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="title">@lang('component.resources_title'):</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="form-group">
                                <label for="description">@lang('component.resources_description'):</label>
                                <input type="text" class="form-control" id="description" name="description">
                                <span>ex: detail for catelogries</span>
                            </div>
                            <div class="form-group">
                                <label for="keyword">@lang('component.resources_keyword'):</label>
                                <select name="type_resource" class="form-control">
                                    <option value="images">@lang('component.images')</option>
                                    <option value="videos">@lang('component.video')</option>
                                    <option value="banners">@lang('component.banner')</option>
                                </select>
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-info">@lang('button.resources_create')</button>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-images"></i>
                        <h2>@lang('component.resources_futured_images')</h2>
                    </div>
                    <div class="card-body">
                        <div class="image-dashboard row">
                            <div class="col-sm-12 col-md-9">
                                <input type="file" class="form-control input_upload" id="file" name="file">
                                <input type="hidden" class="form-control input_upload" id="x1" name="x1" value="50">
                                <input type="hidden" class="form-control input_upload" id="y1" name="y1" value="50">
                                <input type="hidden" class="form-control input_upload" id="w" name="w" value="450">
                                <input type="hidden" class="form-control input_upload" id="h" name="h" value="450">
                                <input type="range" name="zoom" id="zoom" value="100" min="10" max="100">
                                <div class="image-crop" id="image-crop">
                                    <img  id="target" />
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <p>Size: 600 x 600</p>
                                <p>Type: png</p>
                                <p>Thumb: 150 x 150</p>
                                <p>Date Update: {{now()}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end card form table striped -->
        </div>
        </form>
        <script>
            $('#file').change(function () {
                if ($('#target').data('Jcrop')) {
                    $("#target").removeAttr('style');
                    $('#zoom').val(100);
                    $('#target').data('Jcrop').destroy();
                }
                var filesToUpload = document.getElementById('file').files;
                var file = filesToUpload[0];
                var img = document.getElementById("target");
                var reader = new FileReader();
                // Set the image once loaded into file reader
                reader.onload = function(e) {
                    img.src = e.target.result;
                    var canvas = document.createElement("canvas");
                    //var canvas = $("<canvas>", {"id":"testing"})[0];
                    var ctx = canvas.getContext("2d");
                    ctx.drawImage(img, 0, 0);
                    var MAX_WIDTH = 500;
                    var MAX_HEIGHT = 500;
                    var width = img.width;
                    var height = img.height;
                    if (width > height) {
                        if (width > MAX_WIDTH) {
                            height *= MAX_WIDTH / width;
                            width = MAX_WIDTH;
                        }
                    } else {
                        if (height > MAX_HEIGHT) {
                            width *= MAX_HEIGHT / height;
                            height = MAX_HEIGHT;
                        }
                    }
                    canvas.width = width;
                    canvas.height = height;
                    var ctx = canvas.getContext("2d");
                    ctx.drawImage(img, 0, 0, width, height);
                }
                // Load files into file reader
                reader.readAsDataURL(file);
            })
            $(document).ready(
                function(){
                    $('#zoom').change(function () {
                        showCrop();
                    })
                }
            );
            function showCrop() {
                var jcrop_api;
                var width = $('#target').width();
                var height = $('#target').height();
                var scale = $('#zoom').val();
                var boxWidth = (width*scale/100);
                var boxHeight= (height*scale/100);
                if ($('#target').data('Jcrop'))
                {
                    $('#target').data('Jcrop').destroy();
                    var this_scale = 0;
                    if(boxHeight<=500)
                    {
                        boxHeight = 500;
                        this_scale = (500 * 100)/height;
                        scale = this_scale;
                        boxWidth = (width*this_scale/100);
                    }
                    if(boxWidth<=500)
                    {
                        boxWidth = 500;
                        this_scale = (500 * 100)/width;
                        scale = this_scale;
                        boxHeight = (height*this_scale/100);
                    }
                    var tag = 1/(scale/100);
                    $('#target').Jcrop({
                        aspectRatio: 1,
                        onChange: showCoords,
                        onSelect: showCoords,
                        setSelect: [ 50 * tag, 50 * tag, parseInt(50 * tag) + 400 * tag, parseInt(50 * tag) + 400 * tag],
                        bgOpacity: 0.4,
                        boxWidth: boxWidth,
                        boxHeight: boxHeight,
                    }, function () {
                        jcrop_api = this;
                    });
                    // document.getElementById('image-crop').onmousemove=moveDiv;
                }
                if ($('#target').data('Jcrop') == undefined) {
                    var tag = 1/(scale/100);
                    $('#target').Jcrop({
                        aspectRatio: 1,
                        onChange: showCoords,
                        onSelect: showCoords,
                        onRelease: clearCoords,
                        setSelect: [ 50 * tag, 50 * tag, parseInt(50 * tag) + 400 * tag, parseInt(50 * tag) + 400 * tag],
                        bgOpacity: 0.4,
                        boxWidth: boxWidth,
                        boxHeight: boxHeight,
                    }, function () {
                        jcrop_api = this;
                    });
                }
                $('#coords').on('change','input',function(e){
                    var x1 = $('#x1').val(),
                        x2 = $('#x2').val(),
                        y1 = $('#y1').val(),
                        y2 = $('#y2').val();
                    jcrop_api.setSelect([x1,y1,x2,y2]);
                });
            }
            function showCoords(c)
            {
                $('#x1').val( Math.floor(c.x));
                $('#y1').val( Math.floor(c.y));
                $('#w').val( Math.floor(c.w));
                $('#h').val( Math.floor(c.h));
            };
            function clearCoords()
            {
                $('#coords input').val('');
            };
        </script>
@endsection
