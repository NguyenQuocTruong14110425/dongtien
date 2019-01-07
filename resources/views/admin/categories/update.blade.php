@extends('layout_admin.layout')
@section('header-admin')
    <title>dashboad</title>
@endsection
@section('content-admin')
        <div class="pannel">
            <div class="pannel-title">
                <div class="current-page">@lang('component.categories_news_update_title')</div>
                <li><a href="{{URL::to('admin/dashboard')}}" title="admin/dashboad">@lang('component.dashboard')</a></li>
                <li><a href="{{URL::to('admin/categories/')}}" title="admin/catelogies">@lang('component.categories_news')</a></li>
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
        <form class="form-basic" action="{{URL::to('admin/categories/update/'. $news_catagories_destail->id)}}" method="POST">
            @method('PUT')
            @csrf
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-wallet"></i>
                        <h2>@lang('component.categories_news_content')</h2>
                    </div>
                    <div class="card-body">
                            <div class="form-group">
                                <label for="title">@lang('component.categories_news_title'):</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$news_catagories_destail->news_categories_title}}">
                            </div>
                            <div class="form-group">
                                <label for="description">@lang('component.categories_news_description'):</label>
                                <input type="text" class="form-control" id="description" name="description"
                                       value="{{$news_catagories_destail->news_categories_description}}">
                                <span>ex: detail for catelogries</span>
                            </div>
                            <div class="form-group">
                                <label for="keyword">@lang('component.categories_news_keyword'):</label>
                                <input type="text" class="form-control" id="keyword" name="keyword"  data-role="tagsinput"
                                       value="{{$news_catagories_destail->news_categories_keyword}}" placeholder="add item">
                            </div>
                            <div class="form-group">
                                    <button type="submit" class="btn btn-info">@lang('button.categories_news_update')</button>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-images"></i>
                        <h2>@lang('component.categories_news_futured_images')</h2>
                    </div>
                    <div class="card-body">
                        <div class="image-dashboard row">
                            <div class="col-sm-12 col-md-6">
                                <img src="{{URL::asset('public/images/img1.png')}}" width="200px" height="200px">
                            </div>
                            <div class="col-sm-12 col-md-6">
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
@endsection
