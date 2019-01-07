@extends('layout_admin.layout')
@section('header-admin')
    <title>dashboad</title>
@endsection
@section('content-admin')
        <div class="pannel">
            <div class="pannel-title">
                <div class="current-page">@lang('component.news_update_title')</div>
                <li><a href="{{URL::to('admin/dashboard')}}" title="admin/dashboad">@lang('component.dashboard')</a></li>
                <li><a href="{{URL::to('admin/news/')}}" title="admin/news">@lang('component.news')</a></li>
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
        <form class="form-basic" action="{{URL::to('admin/news/update/'. $news_detail->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-wallet"></i>
                        <h2>@lang('component.news_content_header')</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                                <label for="title">@lang('component.news_title'):</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{$news_detail->news_title}}">
                            </div>
                            <div class="form-group">
                                <label for="description">@lang('component.news_description'):</label>
                                <textarea class="form-control" rows="3" id="description" name="description"
                                          placeholder="enter description" >{{$news_detail->news_description}}</textarea>
                                <span>ex: thu duc district, hcm city</span>
                            </div>
                            <div class="form-group">
                                <label for="keyword">@lang('component.news_keyword'):</label>
                                <input type="text" class="form-control" id="keyword" name="keyword"  data-role="tagsinput"
                                       value="{{$news_detail->news_keyword}}" placeholder="add item">
                            </div>
                            <div class="form-group">
                                <label for="contents">@lang('component.news_content'):</label>
                                <textarea class="form-control" placeholder="enter content" id="contents" name="contents">{!! $news_detail->news_content!!}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-info">@lang('button.news_update')</button>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-info"></i>
                        <h2>@lang('component.news_info_post')</h2>
                    </div>
                    <div class="card-body">
                        <div class="tab-menu">
                            <div class="menu-right">
                                <ul>
                                    <li>
                                        <a toggle-tab="tag" href="javascript:void(0)">
                                            <i class="fab fa-wpforms"></i>
                                            <p>Tags</p>

                                        </a>
                                        <ul child-tab="tag">
                                            <div class="form-tab">
                                                <div class="list-tag">
                                                    <a href="javascript:void(0)" tag="lst-tag">news <span>20</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">post<span>1</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">tech <span>0</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">word <span>50</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">new future <span>100</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">new post <span>75</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">curun<span>10</span></a>
                                                    <a href="javascript:void(0)" tag="lst-tag">hot news<span>7</span></a>
                                                </div>
                                                <div class="right-action">
                                                    <button type="button" class="btn btn-view">view all tag</button>
                                                </div>
                                                <div class="form-group">
                                                    <label for="title">Tags:</label>
                                                    <input type="text" class="form-control" id="tags" name="tags" data-role="tagsinput"
                                                           value="{{$news_detail->news_tag}}" placeholder="add item">
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a toggle-tab="basic" href="javascript:void(0)">
                                            <i class="fab fa-wpforms"></i>
                                            <p>@lang('component.news_link_advertise')</p>
                                        </a>
                                        <ul child-tab="basic">
                                            <div class="form-tab">
                                                <div class="form-group">
                                                    <label for="link1">Link 1:</label>
                                                    <input type="text" class="form-control unline" id="link1" name="link1" value="{{$news_detail->news_link1}}">
                                                    <span>link image size 1200px x 300px</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="link2">Link 2:</label>
                                                    <input type="text" class="form-control unline" id="link2" name="link2" value="{{$news_detail->news_link2}}">
                                                    <span>link image size 80px x 900px</span>
                                                </div>
                                                <div class="form-group">
                                                    <label for="link3">Link 3:</label>
                                                    <input type="text" class="form-control unline" id="link3" name="link3" value="{{$news_detail->news_link3}}">
                                                    <span>link image size 600px x 600px</span>
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                    <li>
                                        <a toggle-tab="advanced" href="javascript:void(0)">
                                            <i class="fab fa-wpforms"></i>
                                            <p>@lang('component.news_advenced_setting')</p>
                                        </a>
                                        <ul child-tab="advanced">
                                            <div class="form-tab">
                                                <div class="form-group">
                                                    <label for="link1">@lang('component.news_publish')</label>
                                                    <input type="text" class="form-control unline" id="publish" name="publish" value="{{$news_detail->news_publish}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="link2">@lang('component.news_status')</label>
                                                    <input type="text" class="form-control unline" id="status" name="status" value="{{$news_detail->news_status}}">
                                                </div>
                                            </div>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-table"></i>
                        <h2>@lang('component.news_categories')</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            @foreach($categories as $value)
                                @if($news_detail->news_categories_id == $value->id)
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="categories{{$value->id}}" name="categories" class="custom-control-input" value="{{$value->id}}" checked>
                                    <label class="custom-control-label" for="categories{{$value->id}}">{{$value->news_categories_title}}</label>
                                </div>
                                @else
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="categories{{$value->id}}" name="categories" class="custom-control-input" value="{{$value->id}}">
                                    <label class="custom-control-label" for="categories{{$value->id}}">{{$value->news_categories_title}}</label>
                                </div>
                                @endif
                            @endforeach
                            <div class="form-group group-search">
                                <div class="input-group-prepend">
                                    <input type="text" class="form-control" placeholder="search category">
                                    <button class="btn btn-search" type="button"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-images"></i>
                        <h2>@lang('component.news_futured_image')</h2>
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
                <div class="card">
                    <div class="card-title">
                        <i class="fas fa-puzzle-piece"></i>
                        <h2>@lang('component.news_post_infomation')</h2>
                    </div>
                    <div class="card-body">
                        <div class="info row">
                            <div class="col-sm-12 col-md-4">
                                <p>Date create:</p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <p><a href="javascript:void(0)">{{now()}}</a></p>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <p>Publish status:</p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <p><a href="javascript:void(0)">publish</a></p>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <p>Authod:</p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <p><a href="javascript:void(0)">Truong.nguyen</a></p>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <p>Hot news:</p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <p><a href="javascript:void(0)">false</a></p>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <p>Url:</p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <p><a href="javascript:void(0)">{{URL::to('/news/blog/tieu-de-name')}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end card form table striped -->
        </div>
        </form>
@endsection
