@extends('layouts.adminpanel')


@section('notification')

@if(session("status-notification") == "error")
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong class='text-center'><span class='fa fa-lg fa-exclamation-circle'></span> Error !</strong> {{ session('status') }}

    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{ $error }}
        </li>
        @endforeach
    </ul>
</div>
@elseif(session("status-notification") == "success")
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong class='text-center'><span class='fa  fa-lg fa-check'></span> Success!</strong> {{ session('status') }}
</div>

@elseif(session("status-notification") == "warning")

<div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong class='text-center'><span class='fa fa-lg fa-exclamation-circle'></span> Warning !</strong> {{ session('status') }}

    <ul>
        @foreach($errors->getMessages() as $error)
        <li>
            {{ $error[0] }}
        </li>
        @endforeach
    </ul>
</div>
@endif

<script>
</script>
@stop


@section('header-title')
<section class="content-header">
    <h1>
        {{ Lang::get('general.category') }} 
        <small>@lang('general.list_category')  <span class='fa fa-dashboard '></span></small>
    </h1>
</section>
@stop

@section('edit-form')
<form role='form' action='{{ action('AdminPanel\CategoryController@postUpdate',array($categoryEdit->id)) }}' method='POST'  enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">@lang('general.add_category')</h3>
        </div>
        <div class="box-body">
            <div class='col-sm-4'>
                <div class="form-group">
                    @if(isset($categoryEdit->attachment[0]))
                    <img src='{{ asset("assets/".$categoryEdit->attachment[0]->file_dir.$categoryEdit->attachment[0]->file_name) }}' class='img-responsive' />
                    <a href="{{ action('AdminPanel\CategoryController@getDeleteAttachment',$categoryEdit->attachment[0]->id)}}" class='btn btn-sm btn-warning'>@lang('general.remove_image')</a>

                    @else
                    <img src='' class='img-responsive' />
                    @endif
                    <label>@lang('general.category_image')</label> <br> <br>
                    <input class="form-control" type='file' name='feature_image'/>
                </div>
            </div>
            <div class='col-sm-8'>
                <div class="form-group">
                    <label>@lang('general.category_name')</label>
                    <div class="input-group">
                        <input class="form-control" type='text' name='name_en' value='{{ $categoryEdit->name_en }}' />
                        <span class="input-group-btn">
                            <a href='#' class="btn btn-default"  data-toggle="modal" data-target="#nameCategory"><span class='fa fa-globe' ></span></a>
                        </span>
                    </div>
                </div>
                <div class="modal fade" id="nameCategory" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">@lang('general.category_name')</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>@lang('general.estonia')</label>
                                    <div class="input-group">
                                        <input class="form-control" type='text' name='name_ee'  value='{{ $categoryEdit->name_ee }}' />
                                        <div class="input-group-addon"><span class='flag-icon flag-icon-ee'></span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('general.latvia')</label>
                                    <div class="input-group">
                                        <input class="form-control" type='text' name='name_lv' value='{{ $categoryEdit->name_lv }}' />
                                        <div class="input-group-addon"><span class='flag-icon flag-icon-lv'></span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('general.lithuania')</label>
                                    <div class="input-group">
                                        <input class="form-control" type='text' name='name_lt' value='{{ $categoryEdit->name_lt }}' />
                                        <div class="input-group-addon"><span class='flag-icon flag-icon-lt'></span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('general.russia')</label>
                                    <div class="input-group">
                                        <input class="form-control" type='text' name='name_ru' value='{{ $categoryEdit->ru }}' />
                                        <div class="input-group-addon"><span class='flag-icon flag-icon-ru'></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary"  data-dismiss="modal">@lang('general.done')</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>@lang('general.description')</label>
                    <div class="input-group">
                        <input class="form-control" type='text' name='description_en' value='{{ $categoryEdit->description_en }}' />
                        <span class="input-group-btn">
                            <a href='#' class="btn btn-default"  data-toggle="modal" data-target="#description"><span class='fa fa-globe' ></span></a>
                        </span>
                    </div>
                </div>
                <!-- Language for description -->
                <div class="modal fade " id="description" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">@lang('general.description')</h4>
                            </div>
                            <div class="modal-body ">
                                <div class="form-group">
                                    <label>@lang('general.estonia')</label>
                                    <div class="input-group">
                                        <textarea class="form-control" type='text' name='description_ee' rows='5' > {{ $categoryEdit->description_ee }}</textarea>
                                        <div class="input-group-addon"><span class='flag-icon flag-icon-ee'></span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('general.latvia')</label>
                                    <div class="input-group">
                                        <textarea class="form-control" type='text' name='description_lv' rows='5'  >{{ $categoryEdit->description_lv }}</textarea>
                                        <div class="input-group-addon"><span class='flag-icon flag-icon-lv'></span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('general.lithuania')</label>
                                    <div class="input-group">
                                        <textarea class="form-control" type='text' name='description_lt' rows='5'  >{{ $categoryEdit->description_lt }}</textarea>
                                        <div class="input-group-addon"><span class='flag-icon flag-icon-lt'></span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('general.russia')</label>
                                    <div class="input-group">
                                        <textarea class="form-control" type='text' name='description_ru' rows='5'  >{{ $categoryEdit->description_ru }}</textarea>
                                        <div class="input-group-addon"><span class='flag-icon flag-icon-ru'></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary"  data-dismiss="modal">@lang('general.done')</button>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <label>@lang('general.slug')</label>
                    <div class="input-group">
                        <input class="form-control" type='text' name='slug_en'  value='{{ $categoryEdit->slug_en }}'/>
                        <span class="input-group-btn">
                            <a href='#' class="btn btn-default"  data-toggle="modal" data-target="#slugName"><span class='fa fa-globe' ></span></a>
                        </span>
                    </div>
                    <p class="help-block">@lang('general.slug_help')</p>
                </div>
                <!-- Language for description -->
                <div class="modal fade " id="slugName" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content ">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">@lang('general.slug')</h4>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>@lang('general.estonia')</label>
                                    <div class="input-group">
                                        <input class="form-control" type='text' name='slug_ee'  value='{{ $categoryEdit->slug_ee }}'/>
                                        <div class="input-group-addon"><span class='flag-icon flag-icon-ee'></span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('general.latvia')</label>
                                    <div class="input-group">
                                        <input class="form-control" type='text' name='slug_lv'  value='{{ $categoryEdit->slug_lv }}' />
                                        <div class="input-group-addon"><span class='flag-icon flag-icon-lv'></span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('general.lithuania')</label>
                                    <div class="input-group">
                                        <input class="form-control" type='text' name='slug_lt'  value='{{ $categoryEdit->slug_lt }}'/>
                                        <div class="input-group-addon"><span class='flag-icon flag-icon-lt'></span></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>@lang('general.russia')</label>
                                    <div class="input-group">
                                        <input class="form-control" type='text' name='slug_ru' value='{{ $categoryEdit->slug_ru }}' />
                                        <div class="input-group-addon"><span class='flag-icon flag-icon-ru'></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary"  data-dismiss="modal">@lang('general.done')</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>@lang('general.sub_category')</label>
                    <select name='category_id' class='form-control'>
                        <option value="0" >@lang('general.none')</option>
                        @foreach($category->reject(function($item) { return $item->category_id > 0;})->map(function ($item) {return $item;}) as $subCategory)
                        <option value='{{ $subCategory->id}}'@if($subCategory->id == $categoryEdit->category_id) selected @endif>{{ $subCategory->name_en }}</option>
                        @endforeach

                    </select>
                    <p class="help-block">If you want this category to be nested category of other category.</p>
                </div>

            </div>
        </div>
        <div class="box-footer text-center">
            <button type='submit' class='btn btn-primary btn-flat'>@lang('general.update_category')</button>
        </div>
    </div>
</form>

@stop

@section('content')
@yield('notification')
@yield('edit-form')

@stop

@section('scripts')
<script type="text/javascript">
    $('[data-toggle="tooltip"]').tooltip();
</script>
@stop