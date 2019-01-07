@extends('layout_admin.layout')
@section('header-admin')
    <title>dashboad</title>
@endsection
@section('content-admin')
    <div class="pannel">
        <div class="pannel-title">
            <div class="current-page">@lang('component.languages_list_title')</div>
            <li><a href="{{URL::to('admin/dashboard')}}" title="admin/dashboad">@lang('component.dashboard')</a></li>
            <li><a href="{{URL::to('admin/languages/')}}" title="admin/news">@lang('component.languages')</a></li>
        </div>
        <div class="right-action">
            <a type="buttons" href="javascript:void(0)" class="btn btn-dropdown"  data-toggle="modal" data-target="#createLanguages">
                <i class="fas fa-plus"></i>
            </a>
            <a type="buttons" href="{{URL::to('admin/languages/all-trash')}}" class="btn btn-dropdown">
                <i class="fas fa-trash"></i>
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
                    <ul class="nav nav-tabs">
                        <li>
                            <a class="active show" data-toggle="tab" href="#list">
                                <i class="fas fa-clipboard-list"></i>@lang('component.languages_list_title')</a>
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
                                    <th>@lang('component.languages_description')</th>
                                    <th>@lang('component.languages_code')</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                    @foreach($languages as $value)
                                        <tr>
                                            <td>{{$value->lang_description}}</td>
                                            <td>{{$value->lang_code}}</td>
                                            <td>
                                                <a type="buttons" tages="edit"  href="{{URL::to('admin/languages/update/' . $value->id)}}">update</a>
                                                <a type="buttons" tages="delete"  href="{{URL::to('admin/languages/trash/' . $value->id)}}">trash</a>
                                                <a type="buttons" tages="info"  href="{{URL::to('admin/languages/detail/' . $value->id)}}">detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="trash" class="tab-pane fade">
                                <table id="trashtable" class="table table-bordered table-striped">
                                    <thead>
                                    <th>@lang('component.languages_description')</th>
                                    <th>@lang('component.languages_code')</th>
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
        <!-- create language -->
        <div id="createLanguages" class="modal fade" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">@lang('component.languages_create_title')</h4>
                    </div>
                    <form class="form-basic" action="{{URL::to('admin/languages/create')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="description">@lang('component.languages_description'):</label>
                                <input type="text" class="form-control" id="description" name="description"/>
                            </div>
                            <div class="form-group">
                                <label for="lang_code">@lang('component.languages_code'):</label>
                                <input type="text" class="form-control" id="lang_code" name="lang_code"/>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-info">@lang('button.languages_create')</button>
                        </div>
                    </form>
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
                        "@lang('component.languages_description')",
                        "@lang('component.languages_code')"
                        ]
                }
            $('#listtable').DataTableCustom(method);
        });

    </script>
@endsection