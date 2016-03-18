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
        @lang('general.posts')
        <small>@lang('general.add_post') <span class='fa fa-edit '></span></small>
    </h1>
</section>
@stop


@section('attachment-gallery-post-image')
<div class="form-group">
    <a href='#' class='btn btn-info' data-toggle='modal' data-target='#attachmentGallery'>@lang('general.select_image')</a>
</div>
<!-- Modal -->
<div class="modal fade" id="attachmentGallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">@lang('general.post_image')</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-sm-4'>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    @lang('general.gallery')
                                </span>
                                <select class='form-control' id='gellerySelect'>
                                    <option selected></option>
                                    @foreach($galleries as $gallery)
                                    <option value='{{ $gallery->id }}'>{{ $gallery->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-4'>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    @lang('general.album')
                                </span>
                                <select class='form-control' id='galleryAlbumSelect' disabled="">

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class='row' id='galleryContent'>
            </div>
            <div class='row' id='galleryContentPagination'>
            </div>
        </div>
    </div>
</div>
<br>
<div id='galleryAttachmentSelected'>
</div>
@stop


@section('feature-image')
<div class="form-group">
    <a href='#' class='btn btn-info' data-toggle='modal' data-target='#attachmentGalleryFeature'>@lang('general.select_image')</a>

</div>
<!-- Modal -->
<div class="modal fade" id="attachmentGalleryFeature" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">@lang('general.feature_image')</h4>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-sm-4'>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    @lang('general.gallery')
                                </span>
                                <select class='form-control' id='gellerySelectFeature'>
                                    <option selected></option>
                                    @foreach($galleries as $gallery)
                                    <option value='{{ $gallery->id }}'>{{ $gallery->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class='col-sm-4'>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">
                                    @lang('general.album')
                                </span>
                                <select class='form-control' id='galleryAlbumSelectFeature' disabled="">

                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class='row' id='galleryContentFeature'>
            </div>
            <div class='row' id='galleryContentPaginationFeature'>
            </div>

        </div>
    </div>
</div>
<br>
<div id='galleryAttachmentSelectedFeature'>
</div>

@stop

@section('add-post')
<form role='form' action='{{ action('AdminPanel\PostsController@postCreate') }}' method='POST'  enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class='row'>
        <div class='col-sm-8'>
            <br>
            <br>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('general.add_post')</h3>
                </div>
                <div class="box-body">

                    <div class="form-group">
                        <label>@lang('general.title')</label>

                        @if($Enum::isEditor($users->role_group))
                        <input class="form-control" type='text' name='title_{{ app()->getLocale() }}' value='{{ old('title_'.app()->getLocale()) }}' />
                        @else
                        <div class="input-group">
                            <input class="form-control" type='text' name='title_en' value='{{ old('title_en') }}' />
                            <span class="input-group-btn">
                                <a href='#' class="btn btn-default"  data-toggle="modal" data-target="#titlePost"><span class='fa fa-globe' ></span></a>
                            </span>
                        </div>
                        @endif
                    </div>

                    @if($Enum::isEditor($users->role_group) == false)
                    <!-- Language for title post -->
                    <div class="modal fade" id="titlePost" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                        <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">@lang('general.post_title')</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>@lang('general.estonia')</label>
                                        <div class="input-group">
                                            <input class="form-control" type='text' name='title_ee'   value='{{ old('title_ee') }}'' />
                                            <div class="input-group-addon"><span class='flag-icon flag-icon-ee'></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('general.latvia')</label>
                                        <div class="input-group">
                                            <input class="form-control" type='text' name='title_lv' value='{{ old('title_lv') }}' />
                                            <div class="input-group-addon"><span class='flag-icon flag-icon-lv'></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('general.lithuania')</label>
                                        <div class="input-group">
                                            <input class="form-control" type='text' name='title_lt'  value='{{ old('title_lt') }}' />
                                            <div class="input-group-addon"><span class='flag-icon flag-icon-lt'></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('general.russia')</label>
                                        <div class="input-group">
                                            <input class="form-control" type='text' name='title_ru'  value='{{ old('title_ru') }}' />
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
                    @endif
                    <div class="form-group">
                        <label>@lang('general.description')</label>
                        @if($Enum::isEditor($users->role_group))
                        <textarea class="form-control" type='text' name='description_{{ app()->getLocale() }}' id='textarea'  rows="10" >{{ old('description_'.app()->getLocale()) }}</textarea>
                        @else
                        <div class="input-group">
                            <textarea class="form-control" type='text' name='description_en' id='textarea'  rows="10" >{{ old('description_en') }}</textarea>
                            <span class="input-group-btn">
                                <a href='#' class="btn btn-default"  data-toggle="modal" data-target="#postDescription"><span class='fa fa-globe' ></span></a>
                            </span>
                        </div>
                        @endif
                    </div>

                    @if($Enum::isEditor($users->role_group) == false)
                    <!-- Language for description -->
                    <div class="modal fade " id="postDescription" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                            <textarea class="form-control" type='text'  id='textarea1' name='description_ee' rows='5' > {{ old('description_ee') }}</textarea>
                                            <div class="input-group-addon"><span class='flag-icon flag-icon-ee'></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('general.latvia')</label>
                                        <div class="input-group">
                                            <textarea class="form-control" type='text'  id='textarea2' name='description_lv' rows='5'  >{{ old('description_lv') }}</textarea>
                                            <div class="input-group-addon"><span class='flag-icon flag-icon-lv'></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('general.lithuania')</label>
                                        <div class="input-group">
                                            <textarea class="form-control" type='text'  id='textarea3' name='description_lt' rows='5'  >{{ old('description_lt') }}</textarea>
                                            <div class="input-group-addon"><span class='flag-icon flag-icon-lt'></span></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>@lang('general.russia')</label>
                                        <div class="input-group">
                                            <textarea class="form-control" type='text'  id='textarea4' name='description_ru' rows='5'  >{{ old('description_ru') }}</textarea>
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
                    @endif
                    @yield('attachment-gallery-post-image')

                </div>
            </div>

        </div>
        <div class='col-sm-4'>
            <br>
            <br>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('general.select_category')</h3>
                </div>
                <div class="box-body">
                    <div class='form-group'>
                        <select class="form-control" name="category_id">
                            @foreach($category as $cat)
                            <option value="{{ $cat->id }}" >{{ $cat->name_en }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('general.details_post')</h3>
                </div>
                <div class="box-body">
                    <div class="form-group text-center">
                        <br>
                        <button type='submit' class='btn btn-success '>@lang('general.add_post')</button>
                    </div>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">@lang('general.feature_image')</h3>
                </div>
                <div class="box-body">
                    @yield('feature-image')
                </div>
            </div>
        </div>


</form>
@stop

@section('content')
@yield('notification')
@yield('add-post')
@stop

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {

        /**
         * 
         * Gallery insert images for post
         * 
         */
        //Select gallery
        $('#gellerySelect').change(function () {
            var gallery = $(this).val();
            $('#galleryAlbumSelect').empty().attr('disabled', '');
            $.ajax({
                url: "{{action('AdminPanel\GalleryController@getAlbumByGalleryId')}}" + "/" + gallery
            }).done(function (albums) {
                $('#galleryAlbumSelect').empty().removeAttr('disabled');
                $('#galleryAlbumSelect').append("<option selected> @lang('general.select_album')</option>");
                $.each(albums, function (key, value) {
                    $('#galleryAlbumSelect').append("<option value='" + value.id + "' >" + value.name + "</option>");
                });
            });
        });
        //Select album and fetch all images
        $('#galleryAlbumSelect').change(function () {
            var album = $(this).val();
            $('#postEditForm').append("<input type='hidden' name='albumId' value='" + album + "' />");
            $.ajax({
                url: "{{action('AdminPanel\GalleryController@getAlbum')}}" + "/" + album,
                context: document.body
            }).done(function (data) {
                $('#galleryContent').empty();
                $.each((data.images), function (key, value) {
                    if (value.attachment.file_name) {
                        var imageUrl = "<img src='{{ asset('assets/'.$Enum::EDUCATIONKS_STORAGE.'/'.$Enum::IMAGE_THUMBNAIL) }}/" + value.attachment.file_name + "' class='cover' style='min-height: 100px; max-height:100px; cursor: pointer; ' data-source='autopub' data-id='" + value.id + "' >";
                    } else {
                        var imageUrl = "<img src='{{ $Enum::AUTONET_URL }}" + (value.attachment.url).substring(1) + "' class='cover' style='min-height: 100px; max-height:100px; cursor: pointer; ' data-source='autonet' data-title='" + value.name + "'  data-id='" + value.id + "'  >";
                    }
                    $('#galleryContent').append("<div class='col-sm-2'><div class='thumbnail'>" + imageUrl + "</div></div>");
                });
                var pages = "";
                for (i = 0; i < data.pageNum; i++) {
                    pages += "<li><a class='pageGallery' href='#' data-album=" + album + " data-page='" + (i + 1) + "'>" + (i + 1) + "</a></li>";
                }
                $('#galleryContentPagination').empty();
                $('#galleryContentPagination').append("<div class='text-center'><ul class='pagination' id='paginationGallery'>" + pages + "</ul></div>");
            });
        });
        // Click pagination request
        $(document).on('click', '.pageGallery', function (e) {
            var album = $(this).data("album"),
                    page = $(this).data("page");
            $.ajax({
                url: "{{action('AdminPanel\GalleryController@getAlbum')}}" + "/" + album + "?page=" + page,
                context: document.body
            }).done(function (data) {
                $('#galleryContent').empty();
                $.each((data.images), function (key, value) {
                    if (value.attachment.file_name) {
                        var imageUrl = "<img src='{{ asset('assets/'.$Enum::EDUCATIONKS_STORAGE.'/'.$Enum::IMAGE_THUMBNAIL) }}/" + value.attachment.file_name + "' class='cover' style='min-height: 100px; max-height:100px; cursor: pointer; ' data-source='autopub' data-id='" + value.id + "' >";
                    } else {
                        var imageUrl = "<img src='{{ $Enum::AUTONET_URL }}" + (value.attachment.url).substring(1) + "' class='cover' style='min-height: 100px; max-height:100px; cursor: pointer; ' data-source='autonet' data-album='" + album + "'  data-title='" + value.name + "'  data-id='" + value.id + "' >";
                    }
                    $('#galleryContent').append("<div class='col-sm-2'><div class='thumbnail'>" + imageUrl + "</div></div>");
                });

            });
        });
        //Images selected insert to post
        $(document).on('click', '#galleryContent div div img', function (e) {
            var src = $(this).attr('src'),
                    source = $(this).data('source'),
                    id = $(this).data('id');
            $(this).closest('div').css('background-color', '#F0AD4E');
            var albumId = $('#galleryAlbumSelect').val();
            if (source == 'autopub') {
                var imageUrl = "<img src='" + src + "' class='cover' style='min-height: 100px; max-height:100px; cursor: pointer; ' data-source='autopub' data-id='" + id + "'  >";
                ;
                $('#galleryAttachmentSelected').append("<input type='hidden' name='galleryAttachmentImageAutopub[]' value='" + id + "' />");
            } else if (source == "autonet") {
                var imageUrl = "<img src='" + src + "' class='cover' style='min-height: 100px; max-height:100px; cursor: pointer; ' data-source='autonet' >";
                $('#galleryAttachmentSelected').append("<input type='hidden' name='galleryAttachmentImageAutonet[]' value='" + src + "' />")
                $('#galleryAttachmentSelected').append("<input type='hidden' name='galleryattachmentImageAutonetTitle[]' value='" + $(this).data('title') + "' />");
                $('#galleryAttachmentSelected').append("<input type='hidden' name='galleryattachmentImageAutonetId[]' value='" + $(this).data('id') + "' />");
            }
            $('#galleryAttachmentSelected').append("<div class='col-sm-4'><div class='thumbnail' >" + imageUrl + "</div></div>");

        });


        /**
         * 
         * Gallery insert images for feature post
         * 
         */
        //Select gallery
        $('#gellerySelectFeature').change(function () {
            var gallery = $(this).val();
            $('#galleryAlbumSelectFeature').empty().attr('disabled', '');
            $.ajax({
                url: "{{action('AdminPanel\GalleryController@getAlbumByGalleryId')}}" + "/" + gallery
            }).done(function (albums) {
                $('#galleryAlbumSelectFeature').empty().removeAttr('disabled');
                $('#galleryAlbumSelectFeature').append("<option selected> @lang('general.select_album')</option>");
                $.each(albums, function (key, value) {
                    $('#galleryAlbumSelectFeature').append("<option value='" + value.id + "' >" + value.name + "</option>");
                });
            });
        });
        //Select album and fetch all images
        //albumIdFeature
        $('#galleryAlbumSelectFeature').change(function () {
            var album = $(this).val();
            $('#postEditForm').append("<input type='hidden' name='albumIdFeature' value='" + album + "' />");
            $.ajax({
                url: "{{action('AdminPanel\GalleryController@getAlbum')}}" + "/" + album,
                context: document.body
            }).done(function (data) {
                $('#galleryContentFeature').empty();
                $.each((data.images), function (key, value) {
                    if (value.attachment.file_name) {
                        var imageUrl = "<img src='{{ asset('assets/'.$Enum::EDUCATIONKS_STORAGE.'/'.$Enum::IMAGE_THUMBNAIL) }}/" + value.attachment.file_name + "' class='cover' style='min-height: 100px; max-height:100px; cursor: pointer; ' data-source='autopub' data-id='" + value.id + "' >";
                    } else {
                        var imageUrl = "<img src='{{ $Enum::AUTONET_URL }}" + (value.attachment.url).substring(1) + "' class='cover' style='min-height: 100px; max-height:100px; cursor: pointer; ' data-source='autonet' data-title='" + value.name + "'  data-id='" + value.id + "'  >";
                    }
                    $('#galleryContentFeature').append("<div class='col-sm-2'><div class='thumbnail'>" + imageUrl + "</div></div>");
                });
                var pages = "";
                for (i = 0; i < data.pageNum; i++) {
                    pages += "<li><a class='pageGalleryFeature' href='#' data-album=" + album + " data-page='" + (i + 1) + "'>" + (i + 1) + "</a></li>";
                }
                $('#galleryContentPaginationFeature').empty();
                $('#galleryContentPaginationFeature').append("<div class='text-center'><ul class='pagination' id='paginationGalleryFeature'>" + pages + "</ul></div>");
            });
        });
        // Click pagination request
        $(document).on('click', '.pageGalleryFeature', function (e) {
            var album = $(this).data("album"),
                    page = $(this).data("page");
            $.ajax({
                url: "{{action('AdminPanel\GalleryController@getAlbum')}}" + "/" + album + "?page=" + page,
                context: document.body
            }).done(function (data) {
                $('#galleryContentFeature').empty();
                $.each((data.images), function (key, value) {
                    if (value.attachment.file_name) {
                        var imageUrl = "<img src='{{ asset('assets/'.$Enum::EDUCATIONKS_STORAGE.'/'.$Enum::IMAGE_THUMBNAIL) }}/" + value.attachment.file_name + "' class='cover' style='min-height: 100px; max-height:100px; cursor: pointer; ' data-source='autopub' data-id='" + value.id + "' >";
                    } else {
                        var imageUrl = "<img src='{{ $Enum::AUTONET_URL }}" + (value.attachment.url).substring(1) + "' class='cover' style='min-height: 100px; max-height:100px; cursor: pointer; ' data-source='autonet' data-album='" + album + "'  data-title='" + value.name + "'  data-id='" + value.id + "' >";
                    }
                    $('#galleryContentFeature').append("<div class='col-sm-2'><div class='thumbnail'>" + imageUrl + "</div></div>");
                });

            });
        });
        //Images selected insert to post
        $(document).on('click', '#galleryContentFeature div div img', function (e) {
            var src = $(this).attr('src'),
                    source = $(this).data('source'),
                    id = $(this).data('id');
            $('#galleryContentFeature div div img').closest('div').css('background-color', '');
            $(this).closest('div').css('background-color', '#F0AD4E');
            var albumId = $('#galleryAlbumSelectFeature').val();
            $('#galleryAttachmentSelectedFeature').empty();
            if (source == 'autopub') {
                var imageUrl = "<img src='" + src + "' class='cover' style='min-height: 100px; max-height:100px; cursor: pointer; ' data-source='autopub' data-id='" + id + "'  >";
                ;
                $('#galleryAttachmentSelectedFeature').append("<input type='hidden' name='galleryAttachmentImageAutopubFeature' value='" + id + "' />");
            } else if (source == "autonet") {
                var imageUrl = "<img src='" + src + "' class='cover' style='min-height: 100px; max-height:100px; cursor: pointer; ' data-source='autonet' >";
                $('#galleryAttachmentSelectedFeature').append("<input type='hidden' name='galleryAttachmentImageAutonetFeature' value='" + src + "' />")
                $('#galleryAttachmentSelectedFeature').append("<input type='hidden' name='galleryattachmentImageAutonetTitleFeature' value='" + $(this).data('title') + "' />");
                $('#galleryAttachmentSelectedFeature').append("<input type='hidden' name='galleryattachmentImageAutonetIdFeature' value='" + $(this).data('id') + "' />");
            }
            $('#galleryAttachmentSelectedFeature').append("<div class='thumbnail cover'  style='width: 95%; padding-left: 10px;' >" + imageUrl + "</div>");

        });

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
    });
</script>

@stop