@extends('layout_admin.layout')
@section('header-admin')
    <title>dashboad</title>
@endsection
@section('content-admin')
    <div class="pannel">
        <div class="pannel-title">
            <div class="current-page">@lang('component.users_list_title')</div>
            <li><a href="{{URL::to('admin/dashboard')}}" title="admin/dashboad">@lang('component.dashboard')</a></li>
            <li><a href="{{URL::to('admin/user/')}}" title="admin/news">@lang('component.users')</a></li>
        </div>
        <div class="right-action">
            <a type="buttons" href="javascript:void(0)" class="btn btn-dropdown" title="@lang('button.user_create_role')"
               data-toggle="modal" data-target="#createRole">
                <i class="far fa-calendar-plus"></i>
            </a>
            <a type="buttons" href="{{URL::to('admin/user/create')}}"  title="@lang('button.create')" class="btn btn-dropdown">
                <i class="fas fa-plus"></i>
            </a>
            <a type="buttons" href="{{URL::to('admin/user/all-trash')}}"  title="@lang('button.trash')" class="btn btn-dropdown">
                <i class="fas fa-trash"></i>
            </a>
            <button type="button" class="btn btn-dropdown" title="@lang('button.info_more')" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
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
                    <ul class="nav nav-tabs">
                        <li>
                            <a class="active show" data-toggle="tab" href="#list">
                                <i class="fas fa-clipboard-list"></i>@lang('component.users_list_title')</a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#trash">
                                <i class="fab fa-firstdraft"></i>@lang('component.draft')</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="table-basic">
                        <div class="tab-content">
                            <div id="list" class="tab-pane fade in active show">
                                <table id="listtable" class="table table-bordered table-striped">
                                    <thead>
                                    <th>@lang('component.users_full_name')</th>
                                    <th>Email</th>
                                    <th>@lang('component.users_phone')</th>
                                    <th>@lang('component.users_address')</th>
                                    <th>@lang('component.users_auth')</th>
                                    <th>@lang('component.users_username')</th>
                                    <th>@lang('component.users_status')</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $value)
                                        <tr>
                                            <td>{{$value->full_name}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->phone}}</td>
                                            <td>{{$value->address}}</td>
                                            <td>{{$value->auth}}</td>
                                            <td>{{$value->username}}</td>
                                            <td>{{$value->status}}</td>
                                            <td>
                                                <a type="buttons" tages="edit"  href="{{URL::to('admin/user/update/' . $value->id)}}">update</a>
                                                <a type="buttons" tages="delete"  href="{{URL::to('admin/user/trash/' . $value->id)}}">trash</a>
                                                <a type="buttons" tages="info"  href="{{URL::to('admin/user/detail/' . $value->id)}}">detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="trash" class="tab-pane fade">
                                <table id="trashtable" class="table table-bordered table-striped">
                                    <thead>
                                    <th>@lang('component.users_full_name')</th>
                                    <th>Email</th>
                                    <th>@lang('component.users_phone')</th>
                                    <th>@lang('component.users_address')</th>
                                    <th>@lang('component.users_auth')</th>
                                    <th>@lang('component.users_username')</th>
                                    <th>@lang('component.users_status')</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card form table striped -->
    </div>
    <!-- create language -->
    <div id="createRole" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">@lang('component.role_create_tile')</h4>
                </div>
                <form class="form-basic" action="{{URL::to('admin/roles/create')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="description">@lang('component.role_name'):</label>
                            <input type="text" class="form-control" id="name" name="name"/>
                        </div>
                        <div class="form-group">
                            <label for="description">@lang('component.role_description'):</label>
                            <input type="text" class="form-control" id="description" name="description"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">@lang('button.role_create')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- end card form table striped -->
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
                        "@lang('component.users_full_name')",
                        "@lang('component.users_address')",
                        "@lang('component.users_status')",
                        "@lang('component.users_auth')",
                        "@lang('component.users_username')"]
                }
            $('#listtable').DataTableCustom(method);
        });

    </script>
@endsection