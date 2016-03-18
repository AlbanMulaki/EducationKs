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


@section('add-category')
<form role='form' action='{{ action('AdminPanel\CategoryController@postCreate') }}' method='POST'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">@lang('general.add_category')</h3>
        </div>
        <div class="box-body">
            <div class="form-group">
                <label>@lang('general.category_name')</label>
                <div class="input-group">
                    <input class="form-control" type='text' name='name_en' value='{{ old('name_en') }}' />
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
                                    <input class="form-control" type='text' name='name_ee'  value='{{ old('name_ee') }}' />
                                    <div class="input-group-addon"><span class='flag-icon flag-icon-ee'></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('general.latvia')</label>
                                <div class="input-group">
                                    <input class="form-control" type='text' name='name_lv' value='{{ old('name_lv') }}' />
                                    <div class="input-group-addon"><span class='flag-icon flag-icon-lv'></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('general.lithuania')</label>
                                <div class="input-group">
                                    <input class="form-control" type='text' name='name_lt' value='{{ old('name_lt') }}' />
                                    <div class="input-group-addon"><span class='flag-icon flag-icon-lt'></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('general.russia')</label>
                                <div class="input-group">
                                    <input class="form-control" type='text' name='name_ru' value='{{ old('name_ru') }}' />
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
                    <input class="form-control" type='text' name='description_en' value='{{ old('description_en') }}' />
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
                                    <textarea class="form-control" type='text' name='description_ee' rows='5' > {{ old('description_ee') }}</textarea>
                                    <div class="input-group-addon"><span class='flag-icon flag-icon-ee'></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('general.latvia')</label>
                                <div class="input-group">
                                    <textarea class="form-control" type='text' name='description_lv' rows='5'  >{{ old('description_lv') }}</textarea>
                                    <div class="input-group-addon"><span class='flag-icon flag-icon-lv'></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('general.lithuania')</label>
                                <div class="input-group">
                                    <textarea class="form-control" type='text' name='description_lt' rows='5'  >{{ old('description_lt') }}</textarea>
                                    <div class="input-group-addon"><span class='flag-icon flag-icon-lt'></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('general.russia')</label>
                                <div class="input-group">
                                    <textarea class="form-control" type='text' name='description_ru' rows='5'  >{{ old('description_ru') }}</textarea>
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
                    <input class="form-control" type='text' name='slug_en'  value='{{ old('slug_en') }}'/>
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
                                    <input class="form-control" type='text' name='slug_ee'  value='{{ old('slug_ee') }}'/>
                                    <div class="input-group-addon"><span class='flag-icon flag-icon-ee'></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('general.latvia')</label>
                                <div class="input-group">
                                    <input class="form-control" type='text' name='slug_lv'  value='{{ old('slug_lv') }}' />
                                    <div class="input-group-addon"><span class='flag-icon flag-icon-lv'></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('general.lithuania')</label>
                                <div class="input-group">
                                    <input class="form-control" type='text' name='slug_lt'  value='{{ old('slug_lt') }}'/>
                                    <div class="input-group-addon"><span class='flag-icon flag-icon-lt'></span></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>@lang('general.russia')</label>
                                <div class="input-group">
                                    <input class="form-control" type='text' name='slug_ru' value='{{ old('slug_ru') }}' />
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
                <label>@lang('general.sub_category') @lang('general.optional')</label>
                <select name='category_id' class='form-control'>
                    <option value="0" >@lang('general.none')</option>
                    @foreach($category->reject(function($item) { return $item->category_id > 0;})->map(function ($item) {return $item;}) as $subCategory)
                    <option value='{{ $subCategory->id}}'>{{ $subCategory->name_en }}</option>
                    @endforeach
                </select>
                <p class="help-block">If you want this category to be nested category of other category.</p>
            </div>
        </div>
        <div class="box-footer text-center">
            <button type='submit' class='btn btn-primary btn-flat'>@lang('general.add_category')</button>
        </div>
    </div>
</form>
@stop

@section('list-category')

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">@lang('general.category')</h3>
        <div class='box-tools'>
        {!! str_replace("pagination","pagination pagination-sm no-margin pull-right",$categoryPaginate->render()) !!}
        </div>
    </div>
    <div class="box-body no-padding">
        <table class='table table-hover'>
            <tr class='bg-gray-light'>
                <th>#</th>
                <th>@lang('general.category_name')</th>
                <th>@lang('general.slug')</th>
                <th>@lang('general.sub_category')</th>
                <th colspan="2"></th>
            </tr>
            @foreach($categoryPaginate as $id => $value)
            <tr>
                <td>{{ $categoryPaginate->perPage()*$categoryPaginate->currentPage()+$id-$categoryPaginate->perPage()+1 }}</td>
                <td>{{ $value->name_en }}</td>
                <td>{{ $value->slug_en }}</td>
                <td>{{ $value->getSubCategory($value->category_id)['name_en'] }} </td>
                <td>
                    <a href='{{ action('AdminPanel\CategoryController@getEdit',array('id'=>$value->id)) }}' class="btn btn-default btn-xs  btn-flat">
                        <span class='fa fa-edit fa-lg'></span>
                    </a>
                </td>
                <td>
                    <a href="#" class='btn btn-danger btn-xs btn-flat' data-toggle="modal" data-target="#deleteCategory{{ $value->id }}">
                        <span class="fa fa-remove"></span>
                    </a>


                    <div class="modal fade " id="deleteCategory{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">@lang('errors.are_you_sure.delete_category') 
                                        <br><span class='badge'>{{ $value->name_en }}</span></h4>
                                    <p>@lang('errors.are_you_sure.delete_category_description')</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">@lang('general.cancel')</span></button>

                                    <a href="{{ action('AdminPanel\CategoryController@getDelete',$value->id)}}" class='btn btn-danger'>
                                        <span class="fa fa-remove fa-lg"></span> @lang('general.remove')
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>


                </td>
            </tr>
            @endforeach
        </table>


    </div>
</div>
@stop


@section('content')
@yield('notification')
<div class='col-sm-5'>
    @yield('add-category')
</div>
<div class='col-sm-7'>
    @yield('list-category')
</div>

@stop

@section('scripts')
<script type="text/javascript">
    $('[data-toggle="tooltip"]').tooltip();
</script>
@stop