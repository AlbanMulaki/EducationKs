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
        {{ Lang::get('general.gallery') }} 
        <small>@lang('general.gallery_details')  <span class='fa fa-image '></span></small>
    </h1>
</section>
@stop

@section('latest-upload')

<br>
{!! "";$i=0  !!}
@foreach($images as $image)
@if($i == 0)
<div class="row">
    @endif
    <div class='col-sm-3'>
        <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" data-toggle="modal" data-target="#editImage{{ $image->id }}"  style="cursor: pointer; background: url('{{ asset('/assets/'.$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_MEDIUM.'/'.$image->attachment->file_name) }}') center center;">

                <h5 class="widget-user-desc">
                    @if(strlen($image->name) >= 25)
                    {{ substr($image->name,0,24) }}...
                    @else
                    {{ $image->name }}
                    @endif
                </h5>
            </div>
            <div class="box-footer" style="padding-top: 0px;">
                <div class="row">
                    <div class="col-sm-8 border-right">
                        <div class="description-block">
                            <small style="word-wrap: break-word;">
                                @if($image->description)
                                @if(strlen($image->description) >= 25)                       
                                {{ substr($image->description,0,24) }}...
                                @else
                                {{ $image->description }}
                                @endif
                                @else
                                &nbsp;
                                @endif
                            </small>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-4">
                        <div class="description-block">
                            <span>
                                <a href="#" class="btn btn-danger btn-xs btn-flat" data-toggle="modal" data-dismiss="modal" data-target="#deleteImage{{ $image->id }}"><span class="fa fa-remove"></span></a>
                            </span>
                        </div>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        <!-- Edit Image info -->
        <form action='{{ action('AdminPanel\GalleryController@postEditImage',['id'=>$image->id]) }}' class='form-horizontal' method='POST'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="modal fade" id="editImage{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">@lang('errors.are_you_sure.edit_image')</h4>
                        </div>
                        <div class="modal-body">
                            <div class="thumbnail">
                                <img src='{{ asset('/assets/'.$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_LARGE.'/'.$image->attachment->file_name) }}' class='img-responsive' />
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">@lang('general.gallery')</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <select class="form-control gallerySelect" name="gallery_id">
                                            @foreach($galleries as $option)
                                            <option value="{{ $option->id }}" @if($image->album->gallery_id == $option->id)selected @endif>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" class="form-control" name="gallery_id"  disabled="" style="display:none;"/>
                                        <span class="input-group-btn">
                                            <a class='btn btn-default galleryAddNew'>
                                                <span class='fa fa-plus-circle'></span>
                                            </a>
                                        </span>
                                    </div>
                                    <span id="helpBlock" class="help-block">@lang('general.make_car_description')</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">@lang('general.album')</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <select class="form-control albumSelect" name="album_id">
                                            @foreach($album->filter(function($item) use( &$image) {
                                            return $item['gallery_id'] == $image->album['gallery_id'];
                                            })->all() as $option)
                                            <option value="{{ $option->id }}" @if($image->album->id == $option->id)selected @endif>{{ $option->name }}</option>
                                            @endforeach
                                        </select>
                                        <input type="text" class="form-control"  name="album_id"  disabled="" style="display:none;"/>
                                        <span class="input-group-btn">
                                            <a class='btn btn-default galleryAlbum'>
                                                <span class='fa fa-plus-circle'></span>
                                            </a>
                                        </span>
                                    </div>
                                    <span id="helpBlock" class="help-block">@lang('general.model_car_description')</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">@lang('general.title')</label>
                                <div class="col-sm-8">
                                    <input class="form-control" name='name' value='{{ $image->name }}' />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">@lang('general.description')</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name='description' rows="3" >{{ $image->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">@lang('general.cancel')</span></button>
                            <button type='submit' class="btn btn-success">
                                @lang('general.update')
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Delete Confirm -->
        <div class="modal fade" id="deleteImage{{ $image->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">@lang('errors.are_you_sure.delete_image')</h4>
                    </div>
                    <div class="modal-body">
                        <img src='{{ asset('/assets/'.$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_LARGE.'/'.$image->attachment->file_name) }}' class='img-responsive' />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">@lang('general.cancel')</span></button>
                        <a href="{{ action('AdminPanel\GalleryController@getDelete',['id'=>$image->id]) }}" class="btn btn-danger">
                            <span class="fa fa-remove fa-lg"></span> @lang('general.remove')
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {!! ""; $i++ !!}
    @if($i == 4)
    {!! ""; $i = 0 !!}
</div>
@endif
@endforeach

@if($i < 4 && $i >= 1)
{!! ""; $i = 0 !!}
</div>
@endif
@stop
@section('gallery')

<br>
{!! "";$i=0;$add = false  !!}


@if(count($galleries) > 0)
@foreach($galleries as $gallery)
@if($i == 0)
<div class="row">
    @endif
    @if($add === false)
    {!!"";$add=true !!}
    <div class='col-sm-3' >
        <div class=" btn-sm btn-default  text-center" style="min-height: 200px; cursor: pointer; "  data-toggle="modal" data-target="#addGallery" >
            <br><br><br><br>
            <span class=' text-info  center-block  fa fa-plus fa-5x' ></span>

        </div>
    </div>
    <!-- Edit Image info -->
    <form action='{{ action('AdminPanel\GalleryController@postCreateGallery') }}' class='form-horizontal' method='POST'>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="modal fade" id="addGallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">@lang('general.create_new_gallery')</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">@lang('general.gallery')</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="name" value='{{ old('name') }}'/>
                                <span id="helpBlock" class="help-block">@lang('general.make_car_description')</span>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">@lang('general.cancel')</span></button>
                        <button type='submit' class="btn btn-success">
                            @lang('general.add') <span class="fa fa-plus"></span> 
                        </button>

                    </div>
                </div>
            </div>
        </div>
    </form>
    {!! ""; $i++ !!}
    @endif
    <div class='col-sm-3' >
        @if(isset($gallery->album[0]) && isset($gallery->album[0]->galleryImage))                          
        <div class="thumbnail" style="  cursor:pointer;  " >
            <img  src='{{ asset('/assets/'.$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_MEDIUM.'/'.$gallery->album[0]->galleryImage[0]->attachment->file_name ) }}' data-toggle="modal" data-target="#editGallery{{ $gallery->id }}"  class='cover' style="min-height: 120px; cursor: pointer; " />
            <div class="caption">
                <h4 style="word-wrap: break-word;">{{ $gallery->name }}</h4>
                <span>
                    <br>
                </span>
            </div>
        </div>
        @else

        <div class="box box-widget widget-user" style="cursor: pointer;"  data-toggle="modal" data-target="#editGallery{{ $gallery->id }}" >
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header text-center">
                <span class="fa fa-image fa-5x" style="color:#B9B9B9;"></span>
            </div>
            <div class="box-footer" style="padding-top: 0px;">
                <div class="row">
                    <div class="col-sm-12 border-right">
                        <div class="description-block">
                            <small style="word-wrap: break-word;">
                                <h4 style="word-wrap: break-word;">{{ $gallery->name }}</h4>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Edit Image info -->
        <form action='{{ action('AdminPanel\GalleryController@postUpdateGallery',['id'=>$gallery->id]) }}' class='form-horizontal' method='POST'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="modal fade" id="editGallery{{ $gallery->id  }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">@lang('errors.are_you_sure.edit_gallery')</h4>
                        </div>
                        <div class="modal-body">
                            <div class='row'>
                                <div class='col-sm-3'>
                                    <div class="thumbnail text-center" style="cursor:pointer; height: 120px;">
                                        <br><br>
                                        <a href="{{ action('AdminPanel\GalleryController@getAlbumCreate',['id'=>$gallery->id]) }}">
                                            <span class="fa fa-3x fa-plus"></span>
                                        </a>
                                        <br>
                                    </div>
                                </div>

                                @foreach($gallery->album as $album)
                                @if(isset($album->galleryImage) == true)
                                <div class='col-sm-3' >
                                    <div class="thumbnail text-center" style="cursor:pointer;">
                                        <img  src='{{ asset('/assets/'.$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_THUMBNAIL.'/'.$album->galleryImage[0]->attachment->file_name ) }}' class='cover' style=" max-height: 120px;cursor: pointer; " />

                                        <div class="caption">
                                            <h4 style="word-wrap: break-word;">{{ $album->name }}</h4>

                                            <span>
                                                <a href="{{ action('AdminPanel\GalleryController@getAlbum',['id'=>$album->id]) }}" class="text-center btn btn-default btn-xs" ><span class="fa fa-arrow-right"></span> @lang('general.view_albums')</a>

                                                <br>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @else 
                                <div class='col-sm-3' >
                                    <div class="thumbnail text-center" style="cursor:pointer;">
                                        <span class='fa fa-image fa-5x' style='color:#B9B9B9;'></span>
                                        <div class="caption">
                                            <h4 style="word-wrap: break-word;">{{ $album->name }}</h4>

                                            <span>
                                                <a href="{{ action('AdminPanel\GalleryController@getAlbum',['id'=>$album->id]) }}" class="text-center btn btn-default btn-xs" ><span class="fa fa-arrow-right"></span> @lang('general.view_albums')</a>

                                                <br>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                @endif
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">@lang('general.gallery')</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="name" value='{{ $gallery->name }}'/>

                                    <span id="helpBlock" class="help-block">@lang('general.make_car_description')</span>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type='button' class="btn btn-danger deleteGalleryBtn" style="float:left" data-toggle="modal" data-target="#deleteGallery{{ $gallery->id }}" data-galleryid="{{ $gallery->id }}">
                                @lang('general.delete') <i class="fa fa-trash-o"></i>
                            </button>
                            <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">@lang('general.cancel')</span></button>
                            <button type='submit' class="btn btn-success">
                                @lang('general.update')
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Delete Confirm -->
        <div class="modal fade" id="deleteImage{{ $gallery->id  }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">@lang('errors.are_you_sure.delete_image')</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">@lang('general.cancel')</span></button>
                        <a href="{{ action('AdminPanel\GalleryController@getDelete',['id'=>$gallery->id]) }}" class="btn btn-danger">
                            <span class="fa fa-remove fa-lg"></span> @lang('general.remove')
                        </a>

                    </div>
                </div>
            </div>
        </div>
        <!-- Delete Gallery confirm -->
        <form action='{{ action('AdminPanel\GalleryController@postDeleteGallery',['id'=>$gallery->id]) }}' class='form-horizontal' method='POST'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="modal fade" id="deleteGallery{{ $gallery->id }}" tabindex="-1" role="dialog" aria-labelledby="editAlbumModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close closeDeleteGalleryBtn" data-galleryid="{{ $gallery->id }}" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">@lang('errors.are_you_sure.delete_gallery')</h4>
                        </div>
                        <div class="modal-body">
                            <h2>{{ $gallery->name }}</h2>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default closeDeleteGalleryBtn" data-galleryid="{{ $gallery->id }}" data-dismiss="modal">@lang('general.cancel')</button>
                            <button type="submit" class="btn btn-danger">@lang('general.remove')</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    {!! ""; $i++ !!}
    @if($i == 4)
    {!! ""; $i = 0 !!}
</div>
@endif
@endforeach

@else
<div class="row">
    <div class='col-sm-3' >
        <div class=" btn-sm btn-default  text-center" data-toggle="modal" data-target="#addGallery" style="min-height: 220px; cursor: pointer; " >
            <br><br><br><br>
            <span class=' text-info  center-block  fa fa-plus fa-5x' ></span>

        </div>
    </div>
</div>
<!-- Edit Image info -->
<form action='{{ action('AdminPanel\GalleryController@postCreateGallery') }}' class='form-horizontal' method='POST'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal fade" id="addGallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">@lang('general.create_new_gallery')</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('general.gallery')</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" value='{{ old('name') }}'/>
                            <span id="helpBlock" class="help-block">@lang('general.make_car_description')</span>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">@lang('general.cancel')</span></button>
                    <button type='submit' class="btn btn-success">
                        @lang('general.add') <span class="fa fa-plus"></span> 
                    </button>

                </div>
            </div>
        </div>
    </div>
</form>
@endif
@if($i < 4 && $i >= 1)
{!! ""; $i = 0 !!}
</div>
@endif
@stop

@section('upload-photo')
<form>
    <div class="form-group">
        <label class="col-sm-3 control-label">@lang('general.gallery')</label>
        <div class="col-sm-8">
            <div class="input-group">
                <select class="form-control gallerySelect" id="galleryUpload" name="gallery_id">
                    <option selected disabled>@lang('general.select_gallery')</option>
                    @foreach($galleries as $option)
                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                    @endforeach
                </select>
                <input type="text" class="form-control" name="gallery_id"  disabled="" style="display:none;"/>
                <span class="input-group-btn">
                    <a class='btn btn-default galleryAddNew'>
                        <span class='fa fa-plus-circle'></span>
                    </a>
                </span>
            </div>
            <span id="helpBlock" class="help-block">@lang('general.make_car_description')</span>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">@lang('general.album')</label>
        <div class="col-sm-8">
            <div class="input-group">
                <select class="form-control albumSelect" id="albumUpload" name="album_id">
                    <option disabled>@lang('general.select_gallery')</option>
                </select>
                <input type="text" class="form-control"  name="album_id"  disabled="" style="display:none;"/>
                <span class="input-group-btn">
                    <a class='btn btn-default galleryAlbum'>
                        <span class='fa fa-plus-circle'></span>
                    </a>
                </span>
            </div>
            <span id="helpBlock" class="help-block">@lang('general.model_car_description')</span>
        </div>
    </div>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default col-sm-12">
            <div id="uploadImage">
                <div class="panel-body">
                    <div id="uploadImageFile">Upload</div>
                </div>
            </div>
        </div>

    </div>
</form>
@stop

@section('content')
@yield('notification')

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#latestGallery" aria-controls="home" role="tab" data-toggle="tab">@lang('general.latest_gallery')</a></li>
    <li role="presentation"><a href="#gallery" aria-controls="profile" role="tab" data-toggle="tab">@lang('general.gallery')</a></li>
    <li role="presentation"><a href="#upload-photo" aria-controls="profile" role="tab" data-toggle="tab">@lang('general.upload_new_images')</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="latestGallery">@yield('latest-upload')</div>
    <div role="tabpanel" class="tab-pane" id="gallery">@yield('gallery')</div>
    <div role="tabpanel" class="tab-pane" id="upload-photo">@yield('upload-photo')</div>
</div>


@stop

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        albumForm = null;
        $('.gallerySelect').change(function () {
            var galleryId = $(this).val(),
                    gallerySelect = $(this);
            $.ajax({
                url: "{{ action('AdminPanel\GalleryController@getAlbumByGalleryId') }}/" + galleryId,
            }).done(function (data) {
                var optionData;
                $.each(data, function (key, value) {
                    optionData += '<option value=' + value['id'] + '>' + value['name'] + '</option>';
                });
                gallerySelect.closest('form').find("select[name='album_id']").empty().append(optionData);
                albumForm = $("#albumUpload option:selected").val();
                console.log(albumForm);
                if ($.isNumeric(albumForm) && albumForm > 0) {
                    $('#uploadImageFile').uploadFile({
                        url: "{{ action('AdminPanel\AttachmentController@postUploadGallery') }}",
                        fileName: "file_upload",
                        formData: {"_token": "{{ csrf_token() }}", "album_id": albumForm},
                        acceptFiles: "image/*",
                        showFileCounter: true,
                        onSuccess: function (files, data, xhr, pd)
                        {

                            var columnData =
                                    "&nbsp; <a href='#'  class='btn btn-xs btn-danger deleteAttachmentFeature '>" +
                                    "<span class='fa fa-remove'></span></a>" +
                                    "<img src='" + '{{ asset("assets/".$Enum::EDUCATIONKS_STORAGE) }}' + "/" + data.file_name + "' class='thumbnail cover'   style=\"width: 95%; padding-left: 10px;\"/>" +
                                    "<input type=\"hidden\" name=\"feature_image\" value=\"" + data.id + "\" />";

                            $('#fileUploadFeatures').empty().append(columnData);
                            //files: list of files
                            //data: response from server
                            //xhr : jquer xhr object
                        },
                        afterUploadAll: function (obj)
                        {
                            //window.location.reload();
                        }
                    });
                }
            });

        });
        $('.galleryAddNew').click(function () {

            var galleryAdd = $(this).closest('div'),
                    gallerySelect = galleryAdd.find('select'),
                    galleryInput = galleryAdd.find('input'),
                    album = $(this).closest('form').find('.galleryAlbum').closest('div'),
                    albumSelect = album.find('select'),
                    albumInput = album.find('input');
            if (typeof gallerySelect.attr("disabled") !== typeof undefined && gallerySelect.attr("disabled") !== false) {//disable input
                gallerySelect.removeAttr('disabled');
                galleryInput.attr('disabled', '');
                galleryInput.hide(function () {
                    $(this).fadeOut('slow');
                });
                gallerySelect.show(function () {
                    $(this).fadeIn('slow');
                });
                albumInput.attr('disabled', '');
                albumInput.hide(function () {
                    $(this).fadeOut('slow');
                });

                album
                Select.removeAttr('disabled');
                albumSelect.show(function () {
                    $(this).fadeIn('slow');
                });

            } else {//disable select
                galleryInput.removeAttr('disabled');

                galleryInput.show(function () {
                    $(this).fadeIn('slow');
                });

                gallerySelect.attr('disabled', '');
                gallerySelect.hide(function () {
                    $(this).fadeOut('slow');
                });

                albumSelect.attr('disabled', '');
                albumSelect.hide(function () {
                    $(this).fadeOut('slow');
                });

                albumInput.removeAttr('disabled');
                albumInput.show(function () {
                    $(this).fadeIn('slow');
                });
            }
        });
        $('.galleryAlbum').click(function () {

            var galleryAdd = $(this).closest('div'),
                    gallerySelect = galleryAdd.find('select'),
                    galleryInput = galleryAdd.find('input');
//            var galleryHtml = galleryAdd.closest('select');
            console.log($(this).closest('div').find('select').data('id'));
            if (typeof gallerySelect.attr("disabled") !== typeof undefined && gallerySelect.attr("disabled") !== false) {
                gallerySelect.removeAttr('disabled');
                galleryInput.attr('disabled', '');
                galleryInput.hide(function () {
                    $(this).fadeOut('slow');
                });
                gallerySelect.show(function () {
                    $(this).fadeIn('slow');
                });
            } else {
                galleryInput.removeAttr('disabled');
                gallerySelect.attr('disabled', '');
                gallerySelect.hide(function () {
                    $(this).fadeOut('slow');
                });
                galleryInput.show(function () {
                    $(this).fadeIn('slow');
                });
            }
        });
        $('.deleteGalleryBtn').click(function () {
            var id = $(this).data("galleryid");
            $('#editGallery' + id).modal('hide');
        });
        $('.closeDeleteGalleryBtn').click(function () {
            var id = $(this).data("galleryid");
            $('#editGallery' + id).modal('show');
        });

        $('#albumUpload').change(function () {
            albumForm = $("#albumUpload option:selected").val();
            console.log(albumForm);
            $('#uploadImageFile').uploadFile({
                url: "{{ action('AdminPanel\AttachmentController@postUploadGallery') }}",
                fileName: "file_upload",
                formData: {"_token": "{{ csrf_token() }}", "album_id": albumForm},
                acceptFiles: "image/*",
                showFileCounter: true,
                onSuccess: function (files, data, xhr, pd)
                {

                    var columnData =
                            "&nbsp; <a href='#'  class='btn btn-xs btn-danger deleteAttachmentFeature '>" +
                            "<span class='fa fa-remove'></span></a>" +
                            "<img src='" + '{{ asset("assets/".$Enum::EDUCATIONKS_STORAGE) }}' + "/" + data.file_name + "' class='thumbnail cover'   style=\"width: 95%; padding-left: 10px;\"/>" +
                            "<input type=\"hidden\" name=\"feature_image\" value=\"" + data.id + "\" />";

                    $('#fileUploadFeatures').empty().append(columnData);
                    //files: list of files
                    //data: response from server
                    //xhr : jquer xhr object
                },
                afterUploadAll: function (obj)
                {
                    //window.location.reload();
                }
            });

        });

    });
</script>
@stop