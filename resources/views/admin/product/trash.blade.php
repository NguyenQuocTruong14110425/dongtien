@extends('layout_admin.layout')
@section('header-admin')
    <title>dashboad</title>
@endsection
@section('content-admin')
        <div class="pannel">
            <div class="pannel-title">
                <div class="current-page">List category post</div>
                <li><a href="{{URL::to('admin/dashboard')}}" title="admin/dashboad">trang chủ</a></li>
                <li><a href="{{URL::to('admin/product/')}}" title="admin/news">Danh sách sản phẩm</a></li>
            </div>
            <div class="right-action">
                <a type="buttons" href="{{URL::to('admin/product/create')}}" class="btn btn-dropdown">
                    <i class="fas fa-plus"></i>
                </a>
                <button type="button" class="btn btn-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-th-list"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#"><i class="fas fa-question-circle"></i>Help</a>
                    <a class="dropdown-item" href="#"><i class="fab fa-stack-overflow"></i> Activity</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-title">
                        <h2>Thùng rác</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-basic">
                              <div class="tab-content">
                                    <table id="trashtable" class="table table-bordered table-striped">
                                        <thead>
                                        <th>@lang('component.product_title')</th>
                                        <th>@lang('component.product_description')</th>
                                        <th>@lang('component.product_price')</th>
                                        <th>@lang('component.product_price_sales')</th>
                                        <th>@lang('component.product_categories')</th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        @foreach($product_trash as $value_trash)
                                            <tr>
                                                <td>{{$value_trash->product_title}}</td>
                                                <td>{{$value_trash->product_content}}</td>
                                                <td>{{$value_trash->product_price}}</td>
                                                <td>{{$value_trash->product_price_sales}}</td>
                                                <td>{{$value_trash->product_categories}}</td>
                                                <td width="10%">
                                                    <a type="buttons" tages="delete" href="{{URL::to('admin/product/delete/' . $value_trash->id)}}"><i class="fas fa-trash"></i></a>
                                                    <a type="buttons" tages="recover" href="{{URL::to('admin/product/recover/' . $value_trash->id)}}"><i class="fas fa-reply"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card form table striped -->
        </div>
        <script type="text/javascript">
            $( document ).ready(function() {
                var method =
                    {
                        search: true,
                        sort: true,
                        pagin: true,
                        countRow: true,
                        show: [10,25,50,100],
                        lang: 'en',
                        selectedId: false,
                        sortField :[
                            "@lang('component.product_title')",
                            "@lang('component.product_description')",
                            "@lang('component.product_price')",
                            "@lang('component.product_price_sales')",
                            "@lang('component.product_categories')"
                        ]
                    }
                $('#trashtable').DataTableCustom(method);
            });

        </script>
@endsection
