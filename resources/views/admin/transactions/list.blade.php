@extends('layout_admin.layout')
@section('header-admin')
    <title>dashboad</title>
@endsection
@section('content-admin')
        <div class="pannel">
            <div class="pannel-title">
                <div class="current-page">@lang('component.transactions_list_title')</div>
                <li><a href="{{URL::to('admin/dashboard')}}" title="admin/dashboad">@lang('component.dashboard')</a></li>
                <li><a href="{{URL::to('admin/transactions/')}}" title="admin/news">@lang('component.transactions_list')</a></li>
            </div>
            <div class="right-action">
                <a type="buttons" href="{{URL::to('admin/transactions/create')}}" class="btn btn-dropdown">
                    <i class="fas fa-plus"></i>
                </a>
                <a type="buttons" href="{{URL::to('admin/transactions/all-trash')}}" class="btn btn-dropdown">
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
                    <div class="sell-buy row">
                        <div class="left-content col-sm-12 col-md-8">
                            <div class="top-header">
                                <ul class="nav nav-tabs">
                                    <li>
                                        <a class="active show" data-toggle="tab" href="#list">
                                            <p>news order 25466</p>
                                            <button type="button" class="btn btn-close"><i class="fas fa-times"></i></button>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#trash">
                                            <p>phieu 1</p>
                                            <button type="button" class="btn btn-close"><i class="fas fa-times"></i></button>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#trash">
                                            <p>news order 2698 154545 4545</p>
                                            <button type="button" class="btn btn-close"><i class="fas fa-times"></i></button>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#trash">
                                            <p>news order 25466</p>
                                            <button type="button" class="btn btn-close"><i class="fas fa-times"></i></button>
                                        </a>
                                    </li>
                                    <li class="btn-add">
                                            <button type="button" class="btn"><i class="fas fa-plus"></i></button>
                                    </li>
                                </ul>
                            </div>
                            <div class="body-content">
                                <div class="tab-content">
                                    <div id="list" class="tab-pane fade in active show">
                                        a
                                    </div>
                                    <div id="trash" class="tab-pane fade">
                                        b
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right-content col-sm-12 col-md-4">
                            <div class="top-hed">

                            </div>
                            <div class="body-hed">

                            </div>
                            <div class="bottom-hed">
                                <button type="button" class="btn btn-calculate">
                                    <i class="fas fa-calculator"></i>
                                    <p>Tính (Enter)</p>
                                </button>
                                <button type="button" class="btn btn-print">
                                    <i class="fas fa-print"></i>
                                    <p>In (Crtl + p)</p>
                                </button>
                                <button type="button" class="btn btn-save">
                                    <i class="fas fa-save"></i>
                                    <p>Lưu (Crtl + s)</p>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end card form table striped -->
        </div>
@endsection