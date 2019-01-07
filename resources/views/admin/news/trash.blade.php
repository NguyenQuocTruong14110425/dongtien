@extends('layout_admin.layout')
@section('header-admin')
    <title>dashboad</title>
@endsection
@section('content-admin')
    <div class="pannel">
        <div class="pannel-title">
            <div class="current-page">@lang('component.trash')</div>
            <li><a href="{{URL::to('admin/dashboard')}}" title="admin/dashboad">@lang('component.dashboard')</a></li>
            <li><a href="{{URL::to('admin/news/')}}" title="admin/news">@lang('component.news')</a></li>
        </div>
        <div class="right-action">
            <a type="buttons" href="{{URL::to('admin/news/create')}}" class="btn btn-dropdown">
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

                <div class="card-body">
                    <div class="table-basic">
                        <div class="tab-content">
                                <table id="listtable" class="table table-bordered table-striped">
                                    <thead>
                                    <th>@lang('component.news_title')</th>
                                    <th>Tags</th>
                                    <th>Slug</th>
                                    <th>@lang('component.news_publish')</th>
                                    <th>@lang('component.news_status')</th>
                                    <th>@lang('component.news_view')</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($news_trash as $value)
                                        <tr>
                                            <td>{{$value->news_title}}</td>
                                            <td>{{$value->news_tag}}</td>
                                            <td>{{$value->news_slug}}</td>
                                            <td>{{$value->news_publish}}</td>
                                            <td>{{$value->news_status}}</td>
                                            <td>{{$value->news_views}}</td>
                                            <td>
                                                <a type="buttons" tages="delete"  href="{{URL::to('admin/news/delete/' . $value->id)}}">delete</a>
                                                <a type="buttons" tages="recover"  href="{{URL::to('admin/news/recover/' . $value->id)}}">recover</a>
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
                    lang: '{{ App::getLocale()}}',
                    selectedId: false,
                    sortField :[
                        "@lang('component.news_title')",
                        "@lang('component.news_publish')",
                        "@lang('component.news_status')",
                        "@lang('component.news_view')"]
                }
            $('#listtable').DataTableCustom(method);
        });

    </script>
@endsection
