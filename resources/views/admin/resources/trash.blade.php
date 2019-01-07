@extends('layout_admin.layout')
@section('header-admin')
    <title>dashboad</title>
@endsection
@section('content-admin')
        <div class="pannel">
            <div class="pannel-title">
                <div class="current-page">List category post</div>
                <li><a href="{{URL::to('admin/dashboard')}}" title="admin/dashboad">Dashboad</a></li>
                <li><a href="{{URL::to('admin/resources/')}}" title="admin/news">List category post</a></li>
            </div>
            <div class="right-action">
                <a type="buttons" href="{{URL::to('admin/resources/create')}}" class="btn btn-dropdown">
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
                        <h2>Trash</h2>
                    </div>
                    <div class="card-body">
                        <div class="table-basic">
                              <div class="tab-content">
                                    <table id="trashtable" class="table table-bordered table-striped">
                                        <thead>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th></th>
                                        </thead>
                                        <tbody>
                                        @foreach($resources_trash as $value_trash)
                                            <tr>
                                                <td>{{$value_trash->resources_title}}</td>
                                                <td>{{$value_trash->resources_description}}</td>
                                                <td width="10%">
                                                    <a type="buttons" tages="delete" href="{{URL::to('admin/resources/delete/' . $value_trash->id)}}"><i class="fas fa-trash"></i></a>
                                                    <a type="buttons" tages="recover" href="{{URL::to('admin/resources/recover/' . $value_trash->id)}}"><i class="fas fa-reply"></i></a>
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
                        sortField :['Title','Description','Keword','Lang code']
                    }
                $('#trashtable').DataTableCustom(method);
            });

        </script>
@endsection
