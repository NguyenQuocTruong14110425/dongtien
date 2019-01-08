@extends('layout_admin.layout')
@section('header-admin')
    <title>sản phẩm</title>
@endsection
@section('content-admin')
    <div class="pannel">
        <div class="pannel-title">
            <div class="current-page">@lang('component.product_update_title')</div>
            <li><a href="{{URL::to('admin/dashboard')}}" title="admin/dashboad">@lang('component.dashboard')</a></li>
            <li><a href="{{URL::to('admin/product/')}}" title="admin/product">@lang('component.product')</a></li>
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
    @if (Session::has('errors'))
        <div class="col-sm-12">
            @foreach ($errors as $error)
                @foreach ($error as $message)
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        <span class="badge badge-pill badge-danger">Lỗi</span> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endforeach
            @endforeach
        </div>
    @endif
    @if (Session::has('message'))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Thành công</span> {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <form class="form-basic" action="{{URL::to('admin/product/update/' .$product_destail->id)}}" enctype="multipart/form-data" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-wallet"></i>
                        <h2>@lang('component.product_content')</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">@lang('component.product_title') *:</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{$product_destail->product_title}}">
                        </div>
                        <div class="form-group">
                            <label for="description">@lang('component.product_description'):</label>
                            <textarea type="text" rows="6" class="form-control" id="product_contents" name="product_contents">{{$product_destail->product_content}}</textarea>
                            <span>ví du: mô tả về sản phẩm ( sử dụng cho sản phẩm hiện thị trên trang chủ)</span>
                        </div>
                        <div class="form-group">
                            <label for="description">@lang('component.product_price') *:</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{$product_destail->product_price}}">
                            <span>không nhập 3 số 0 cuối mỗi giá ( đơn vị vnđ)</span>
                        </div>
                        <div class="form-group">
                            <label for="description">@lang('component.product_price_sales'):</label>
                            <input type="text" class="form-control" id="price_sales" name="price_sales" value="{{$product_destail->product_price_sales}}">
                            <span>không nhập 3 số 0 cuối mỗi giá ( đơn vị vnđ)</span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">@lang('button.product_update')</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-images"></i>
                        <h2>@lang('component.product_avatar') *</h2>
                    </div>
                    <div class="card-body">
                        <div class="image-dashboard row">
                            <div class="col-sm-12 col-md-6">
                                <input type="file" class="form-control input_upload" id="avatar" name="avatar">
                                <img class="upload-product" id="avatar_preview" onclick="uploadifle()" src="{{URL::asset('public/upload/' . $product_destail->product_avatar)}}" width="200px" height="200px">
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <p>Size: <span id="size">850 x 550</span></p>
                                <p>Type: <span id="type">png, jpg</span></p>
                                <p>Date Upload: {{now()->format('d/m/y')}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-ad"></i>
                        <h2>Mở rộng</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="description">@lang('component.product_categories') *:</label>
                            <select class="form-control" id="product_categories" name="product_categories">
                                <option>Sản phẩm nguyên hộp</option>
                                <option>Kẹo viên in hình</option>
                                <option>Kẹo viên đen trắng</option>
                                <option>Hoa Socola + hoa giả</option>
                                <option>Khung ảnh socola</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="keyword">@lang('component.product_keyword'):</label>
                            <input type="text" class="form-control" id="keyword" name="keyword"  data-role="tagsinput"
                                   value="socola, quà tặng, 14/02, sản phẩm socola" placeholder="add item">
                        </div>
                    </div>
                </div>
            </div>

            <!-- end card form table striped -->
        </div>
    </form>
@endsection
@section('script-footer')
    <script src="{{URL::asset('public/js/pcsFormatNumber.jquery.js')}}"></script>
    <script>
        function uploadifle()
        {
            var avatar = document.getElementById('avatar');
            avatar.click();
        }
        $("#avatar").change(function() {
            readURL(this);
        });
        function readURL(input) {
            console.log(input)
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                console.log( input.files[0])
                $('#type').text( input.files[0].type);
                $('#size').text( input.files[0].size +  " KB");
                reader.onload = function(e) {
                    $('#avatar_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
        $('#price').pcsFormatNumber({
            decimal_separator: ",",
            to_fixed: 3,
            currency: null
        });
        $('#price_sales').pcsFormatNumber({
            decimal_separator: ",",
            to_fixed: 3,
            currency: null
        });
        $( "#price, #price_sales" ).focus(function() {
            $(this).val('');
        });
    </script>
@endsection
