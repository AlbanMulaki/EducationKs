@extends('layouts.adminpanel')

@section('notification')

@if(session("status-notification") == "error")
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong class='text-center'><span class='fa fa-lg fa-exclamation-circle'></span> Error !</strong> {{ session('status') }}

    <ul>
        @foreach($errors->getMessages() as $error)
        <li>
            {{ $error[0] }}
        </li>
        @endforeach
    </ul>
</div>
@elseif(session("status-notification") == "success")
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong class='text-center'><span class='fa  fa-lg fa-check'></span> Success!</strong> {{ session('status') }}
</div>
@endif
@stop


@section('header-title')
<section class="content-header">
    <h1>
        {{ Lang::get('general.posts') }} 
        <small>@lang('general.post_list')  <span class='fa fa-edit '></span></small>
    </h1>
</section>
@stop


@section('list-post')
<div class='box box-success'>
    <div class='box-header with-border'>
        <a href='{{ action('AdminPanel\PostsController@getCreate') }}' class='btn btn-success'><span class='fa fa-plus-square fa-lg'> &nbsp;</span>@lang('general.add_new_post')</a>
        <div class='box-tools'>
            {!! str_replace("pagination","pagination pagination-sm no-margin pull-right",$posts->render()) !!}
        </div>
    </div>
    <div class='box-body'>
        <table class='table table-hover '>
            <tr class='bg-gray-light'>
                <th>#</th>
                <th>
                    @if(request()->get('title') == $Enum::ASC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?title=".$Enum::DESC }}" class="text-black">@lang('general.title') 
                        <span class="text-muted fa fa-sort-amount-asc  text-bold"></span>
                    </a>
                    @elseif(request()->get('title') == $Enum::DESC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?title=".$Enum::ASC }}" class="text-black">@lang('general.title') 
                        <span class="text-muted fa fa-sort-amount-desc text-bold"></span>
                    </a>
                    @else
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?title=".$Enum::ASC }}" class="text-black">@lang('general.title') 
                        <span class="text-muted fa fa-long-arrow-down "><span class="text-muted fa fa-long-arrow-up"></span></span>
                    </a>
                    @endif
                </th>
                <th>

                    @if(request()->get('author') == $Enum::ASC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?author=".$Enum::DESC }}" class="text-black">@lang('general.author') 
                        <span class="text-muted fa fa-sort-amount-asc  text-bold"></span>
                    </a>
                    @elseif(request()->get('author') == $Enum::DESC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?author=".$Enum::ASC }}" class="text-black">@lang('general.author') 
                        <span class="text-muted fa fa-sort-amount-desc text-bold"></span>
                    </a>
                    @else
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?author=".$Enum::ASC }}" class="text-black">@lang('general.author') 
                        <span class="text-muted fa fa-long-arrow-down "><span class="text-muted fa fa-long-arrow-up"></span></span>
                    </a>
                    @endif
                </th>
                <th>


                    @if(request()->get('category') == $Enum::ASC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?category=".$Enum::DESC }}" class="text-black">@lang('general.categories') 
                        <span class="text-muted fa fa-sort-amount-asc  text-bold"></span>
                    </a>
                    @elseif(request()->get('category') == $Enum::DESC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?category=".$Enum::ASC }}" class="text-black">@lang('general.categories') 
                        <span class="text-muted fa fa-sort-amount-desc text-bold"></span>
                    </a>
                    @else
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?category=".$Enum::ASC }}" class="text-black">@lang('general.categories') 
                        <span class="text-muted fa fa-long-arrow-down "><span class="text-muted fa fa-long-arrow-up"></span></span>
                    </a>
                    @endif
                </th>
                <th>

                    @if(request()->get('date') == $Enum::ASC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?date=".$Enum::DESC }}" class="text-black">@lang('general.published_date') 
                        <span class="text-muted fa fa-sort-amount-asc  text-bold"></span>
                    </a>
                    @elseif(request()->get('date') == $Enum::DESC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?date=".$Enum::ASC }}" class="text-black">@lang('general.published_date') 
                        <span class="text-muted fa fa-sort-amount-desc text-bold"></span>
                    </a>
                    @else
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?date=".$Enum::ASC }}" class="text-black">@lang('general.published_date') 
                        <span class="text-muted fa fa-long-arrow-down "><span class="text-muted fa fa-long-arrow-up"></span></span>
                    </a>
                    @endif
                </th>
                <th></th>
                <th></th>
            </tr>
            @foreach($posts as $id=> $post)
            <tr>
                <td>{{  $posts->perPage()*$posts->currentPage()+$id-$posts->perPage()+1 }}</td>
                <td>
                    @if(strlen($post['title_'.app()->getLocale()]) > 1)
                    {{ $post['title_'.app()->getLocale()] }}
                    @else
                    @lang('general.not_your_language')
                    @endif
                </td>
                <td>{{ $post->user->first_name." ".$post->user->last_name }}</td>
                <td>{{ $post->category['name_'.app()->getLocale()] or "" }}</td>
                <td>{{ $post->updated_at }}</td>
                <td>
                    @if(strlen($post->title_en) > 1 && strlen($post->description_en))
                    <span class='flag-icon flag-icon-us'></span>
                    @endif

                    @if(strlen($post->title_ee) > 1 && strlen($post->description_ee))
                    <span class='flag-icon flag-icon-ee'></span>
                    @endif

                    @if(strlen($post->title_lv) > 1 && strlen($post->description_lv))
                    <span class='flag-icon flag-icon-lv'></span>
                    @endif


                    @if(strlen($post->title_lt) > 1 && strlen($post->description_lt))
                    <span class='flag-icon flag-icon-lt'></span>
                    @endif


                    @if(strlen($post->title_ru) > 1 && strlen($post->description_ru))
                    <span class='flag-icon flag-icon-ru'></span>
                    @endif
                </td>
                <td>
                    <a href='{{ action('AdminPanel\PostsController@getEdit',['id'=>$post->id]) }}' class='btn btn-xs btn-default  btn-flat'>
                        <span class='fa fa-edit fa-lg'></span>
                    </a>
                    <a href='#' class='btn btn-xs btn-warning  btn-flat'  data-toggle="modal" data-target="#deletePost{{ $post->id }}">
                        <span class='fa fa-trash-o fa-lg'></span>
                    </a>

                    <div class="modal fade " id="deletePost{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">@lang('errors.are_you_sure.delete_post_permanently') 
                                        <br><span class='badge'>{{ $post->name_en }}</span></h4>
                                    <p>@lang('errors.are_you_sure.delete_post_description_permanently')</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">@lang('general.cancel')</span></button>

                                    <a href="{{ action('AdminPanel\PostsController@getDelete',$post->id)}}" class='btn btn-danger  btn-flat'>
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

@section('list-trash-post')
<div class='box box-danger'>
    <div class='box-header with-border'>
        <div class='box-tools'>
            {!! str_replace("pagination","pagination pagination-sm no-margin pull-right",$postTrashed->render()) !!}
        </div>
    </div>
    <div class='box-body'>
        <table class='table table-hover '>
            <tr class='bg-gray-light'>
                <th>#</th>
                <th>
                    @if(request()->get('title') == $Enum::ASC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?title=".$Enum::DESC }}" class="text-black">@lang('general.title') 
                        <span class="text-muted fa fa-sort-amount-asc  text-bold"></span>
                    </a>
                    @elseif(request()->get('title') == $Enum::DESC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?title=".$Enum::ASC }}" class="text-black">@lang('general.title') 
                        <span class="text-muted fa fa-sort-amount-desc text-bold"></span>
                    </a>
                    @else
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?title=".$Enum::ASC }}" class="text-black">@lang('general.title') 
                        <span class="text-muted fa fa-long-arrow-down "><span class="text-muted fa fa-long-arrow-up"></span></span>
                    </a>
                    @endif
                </th>
                <th>

                    @if(request()->get('author') == $Enum::ASC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?author=".$Enum::DESC }}" class="text-black">@lang('general.author') 
                        <span class="text-muted fa fa-sort-amount-asc  text-bold"></span>
                    </a>
                    @elseif(request()->get('author') == $Enum::DESC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?author=".$Enum::ASC }}" class="text-black">@lang('general.author') 
                        <span class="text-muted fa fa-sort-amount-desc text-bold"></span>
                    </a>
                    @else
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?author=".$Enum::ASC }}" class="text-black">@lang('general.author') 
                        <span class="text-muted fa fa-long-arrow-down "><span class="text-muted fa fa-long-arrow-up"></span></span>
                    </a>
                    @endif
                </th>
                <th>


                    @if(request()->get('category') == $Enum::ASC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?category=".$Enum::DESC }}" class="text-black">@lang('general.categories') 
                        <span class="text-muted fa fa-sort-amount-asc  text-bold"></span>
                    </a>
                    @elseif(request()->get('category') == $Enum::DESC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?category=".$Enum::ASC }}" class="text-black">@lang('general.categories') 
                        <span class="text-muted fa fa-sort-amount-desc text-bold"></span>
                    </a>
                    @else
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?category=".$Enum::ASC }}" class="text-black">@lang('general.categories') 
                        <span class="text-muted fa fa-long-arrow-down "><span class="text-muted fa fa-long-arrow-up"></span></span>
                    </a>
                    @endif
                </th>
                <th>

                    @if(request()->get('date') == $Enum::ASC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?date=".$Enum::DESC }}" class="text-black">@lang('general.published_date') 
                        <span class="text-muted fa fa-sort-amount-asc  text-bold"></span>
                    </a>
                    @elseif(request()->get('date') == $Enum::DESC)
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?date=".$Enum::ASC }}" class="text-black">@lang('general.published_date') 
                        <span class="text-muted fa fa-sort-amount-desc text-bold"></span>
                    </a>
                    @else
                    <a href="{{ action('AdminPanel\PostsController@getIndex')."?date=".$Enum::ASC }}" class="text-black">@lang('general.published_date') 
                        <span class="text-muted fa fa-long-arrow-down "><span class="text-muted fa fa-long-arrow-up"></span></span>
                    </a>
                    @endif
                </th>
                <th></th>
                <th></th>
            </tr>
            @foreach($postTrashed as $id=> $post)
            <tr>
                <td>{{  $posts->perPage()*$posts->currentPage()+$id-$posts->perPage()+1 }}</td>
                <td>
                    @if(strlen($post['title_'.app()->getLocale()]) > 1)
                    {{ $post['title_'.app()->getLocale()] }}
                    @else
                    @lang('general.not_your_language')
                    @endif
                </td>
                <td>{{ $post->user->first_name." ".$post->user->last_name }}</td>
                <td>{{ $post->category['name_'.app()->getLocale()] or "" }}</td>
                <td>{{ $post->updated_at }}</td>
                <td>
                    @if(strlen($post->title_en) > 1 && strlen($post->description_en))
                    <span class='flag-icon flag-icon-us'></span>
                    @endif

                    @if(strlen($post->title_ee) > 1 && strlen($post->description_ee))
                    <span class='flag-icon flag-icon-ee'></span>
                    @endif

                    @if(strlen($post->title_lv) > 1 && strlen($post->description_lv))
                    <span class='flag-icon flag-icon-lv'></span>
                    @endif


                    @if(strlen($post->title_lt) > 1 && strlen($post->description_lt))
                    <span class='flag-icon flag-icon-lt'></span>
                    @endif


                    @if(strlen($post->title_ru) > 1 && strlen($post->description_ru))
                    <span class='flag-icon flag-icon-ru'></span>
                    @endif
                </td>
                <td>
                    <a href='{{ action('AdminPanel\PostsController@getRestorePost',['id'=>$post->id]) }}' class='btn btn-xs btn-default  btn-flat'>
                        <span class='fa fa-recycle fa-lg'></span>
                    </a>
                    <a href='#' class='btn btn-xs btn-danger  btn-flat'  data-toggle="modal" data-target="#deletePostPermanently{{ $post->id }}">
                        <span class='fa fa-remove fa-lg'></span>
                    </a>

                    <div class="modal fade " id="deletePostPermanently{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content ">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">@lang('errors.are_you_sure.delete_post') 
                                        <br><span class='badge'>{{ $post->name_en }}</span></h4>
                                    <p>@lang('errors.are_you_sure.delete_post_description')</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">@lang('general.cancel')</span></button>

                                    <a href="{{ action('AdminPanel\PostsController@getDeletePermanently',$post->id)}}" class='btn btn-danger  btn-flat'>
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


<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a aria-expanded="true" href="#listPosts" data-toggle="tab">Posts</a></li>
        <li class=" "><a aria-expanded="false" href="#trashPosts" data-toggle="tab"><span class=" fa fa-trash fa-lg"></span> Trash</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="listPosts">
            @yield('list-post')
        </div>
        <div class="tab-pane" id="trashPosts">
            @yield('list-trash-post')
        </div>
    </div>
</div>


@stop

@section('scripts')
<script type="text/javascript">

    $(".deleteAttachment").click(function () {
        console.log($(this).data("id"));
        var id = $(this).data("id");
        var clicked = $(this);
        $.ajax({
            url: "{{ action('AdminPanel\PostsController@getDeleteAttachment') }}/" + id,
            context: document.body
        }).done(function () {
            console.log("Success");
            clicked.closest("div").remove();
        });
    });
    $(".deleteAttachmentFeature").click(function () {
        console.log($(this).data("id"));
        var id = $(this).data("id");
        var clicked = $(this);
        $.ajax({
            url: "{{ action('AdminPanel\PostsController@getDeleteAttachment') }}/" + id,
            context: document.body
        }).done(function () {
            console.log("Success");
            clicked.closest("div").empty().append("<input type='hidden' name='feature_image' value='{{ $Enum::NO_FEATURE_IMAGE }}' />");
        });
    });
    $('#fileUpload').uploadFile({
        url: "{{ action('AdminPanel\AttachmentController@postUpload') }}",
        fileName: "file_upload",
        formData: {"_token": "{{ csrf_token() }}"},
        acceptFiles: "image/*",
        onSuccess: function (files, data, xhr, pd)
        {
            console.log(files);
            console.log(data);
            console.log(xhr);
            console.log(pd);

            var columnData = "<div class='col-sm-4 '>" +
                    "<a href='#'  class='btn btn-xs btn-danger deleteAttachment '>" +
                    "<span class='fa fa-remove'></span></a>" +
                    "<input type=\"hidden\" name=\"post_image[]\"  value=\"" + data.id + "\" />" +
                    "<img src='" + '{{ asset("assets/".$Enum::EDUCATIONKS_STORAGE) }}' + "/" + data.file_name + "' class='thumbnail cover'  style=\"height:204px; width:100%;\" />" +
                    "</div>";

            $('#uploadList').append(columnData);
            //files: list of files
            //data: response from server
            //xhr : jquer xhr object
        }
    });
    $('#fileUploadFeature').uploadFile({
        url: "{{ action('AdminPanel\AttachmentController@postUpload') }}",
        fileName: "file_upload",
        formData: {"_token": "{{ csrf_token() }}"},
        acceptFiles: "image/*",
        onSuccess: function (files, data, xhr, pd)
        {
            console.log(files);
            console.log(data);
            console.log(xhr);
            console.log(pd);

            var columnData =
                    "&nbsp; <a href='#'  class='btn btn-xs btn-danger deleteAttachmentFeature '>" +
                    "<span class='fa fa-remove'></span></a>" +
                    "<img src='" + '{{ asset("assets/".$Enum::EDUCATIONKS_STORAGE) }}' + "/" + data.file_name + "' class='thumbnail cover'   style=\"width: 95%; padding-left: 10px;\"/>" +
                    "<input type=\"hidden\" name=\"feature_image\" value=\"" + data.id + "\" />";

            $('#fileUploadFeatures').empty().append(columnData);
            //files: list of files
            //data: response from server
            //xhr : jquer xhr object
        }
    });
//        $(".deleteAttachmentNotUploaded").click(function () {
//            $(this).closest('div').remove();
//        });
//
//        $(".prepareToUpload").click(function () {
//
//            var toBeAppended = $(this).closest('.col-sm-4').html();
//            $(this).closest('.form-group').append("<div class='col-sm-4' >" + toBeAppended + "</div>");
//        });

    CKEDITOR.replace('textarea', {
        customConfig: "{{ asset('assets/admin/ckeditor/config.js') }}"
    });
    CKEDITOR.replace('textarea1', {
        customConfig: "{{ asset('assets/admin/ckeditor/config.js') }}"
    });
    CKEDITOR.replace('textarea2', {
        customConfig: "{{ asset('assets/admin/ckeditor/config.js') }}"
    });
    CKEDITOR.replace('textarea3', {
        customConfig: "{{ asset('assets/admin/ckeditor/config.js') }}"
    });
    CKEDITOR.replace('textarea4', {
        customConfig: "{{ asset('assets/admin/ckeditor/config.js') }}"
    });
    CKEDITOR.replace('textarea5', {
        customConfig: "{{ asset('assets/admin/ckeditor/config.js') }}"
    });
</script>
@stop