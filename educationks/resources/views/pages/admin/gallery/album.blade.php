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
        {{ $selectedAlbum->gallery->name }} 
        <small>{{ $selectedAlbum->name }}  <span class='fa fa-dashboard '></span></small>
        <div>
            <button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#editAlbumModal">@lang('general.edit')</button> 
            <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deleteAlbumModal">@lang('general.delete')</button>
        </div>
    </h1>
</section>

<!-- Edit Album Modal -->
<form action='{{ action('AdminPanel\GalleryController@getAlbumUpdate',['id'=>$selectedAlbum->id]) }}' class='form-horizontal' method='GET'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
    <div class="modal fade" id="editAlbumModal" tabindex="-1" role="dialog" aria-labelledby="editAlbumModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">@lang('general.edit_album')</h4>
                </div>
                <div class="modal-body">                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label">@lang('general.name')</label>
                        <div class="col-sm-8">
                            <input class="form-control" name='name' value='{{ $selectedAlbum->name }}' />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">@lang('general.cancel')</button>
                    <button type="submit" class="btn btn-primary">@lang('general.save')</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Delete Album Modal -->
<div class="modal fade" id="deleteAlbumModal" tabindex="-1" role="dialog" aria-labelledby="deleteAlbumModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">@lang('errors.are_you_sure.delete_album')</h4>
            </div>
            <div class="modal-body">
                @if(isset($selectedAlbum->name))
                <h2>{{ $selectedAlbum->name }}</h2>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('general.cancel')</button>
                <a href="{{ action('AdminPanel\GalleryController@getAlbumDelete',['id'=>$selectedAlbum->id]) }}" class="btn btn-danger">
                    <span class="fa fa-remove fa-lg"></span> @lang('general.remove')
                </a>
            </div>
        </div>
    </div>
</div>
@stop

@section('album-image')

<br>
{!! "";$i=0  !!}
@foreach($gallerySynced as $image)
@if($i == 0)
<div class="row">
    @endif

    @if(isset($image['attachment']['file_name']))
    <div class='col-sm-3'>
        <div class="thumbnail">

            <img src='{{ asset('/assets/'.$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_MEDIUM.'/'.$image['attachment']['file_name']) }}' class='cover' data-toggle="modal" data-target="#editImage{{ $image['id'] }}"   style="cursor: pointer; min-height: 150px; max-height:150px;" />

            <div class="caption">
                <h4 style="word-wrap: break-word;"> 
                    @if(strlen($image['name']) >= 19)
                    {{ substr($image['name'],0,18) }}...
                    @else
                    {{ $image['name'] }}
                    @endif
                </h4>                    
                <small style="word-wrap: break-word;">
                    @if(isset($image['description']))
                    @if(strlen($image['description']) >= 25)                       
                    {{ substr($image['description'],0,24) }}...
                    @else
                    {{ $image['description'] }}
                    @endif
                    @else
                    &nbsp;
                    @endif
                </small>
                <p>
                    <span>
                        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-dismiss="modal" data-target="#deleteImage{{ $image['id'] }}"><span class="fa fa-remove"></span></a>
                    </span>
                </p>
            </div>
        </div>
        <!-- Edit Image info -->
        <form action='{{ action('AdminPanel\GalleryController@postEditImage',['id'=>$image['id']]) }}' class='form-horizontal' method='POST'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <div class="modal fade" id="editImage{{ $image['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">@lang('errors.are_you_sure.edit_image')</h4>
                        </div>
                        <div class="modal-body">
                            <div class="thumbnail">
                                <img src='{{ asset('/assets/'.$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_LARGE.'/'.$image['attachment']['file_name'] ) }}' class='img-responsive' />
                            </div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">@lang('general.gallery')</label>
                                <div class="col-sm-8">
                                    <div class="input-group">
                                        <select class="form-control gallerySelect" name="gallery_id">
                                            @foreach($gallery as $option)
                                            <option value="{{ $option->id }}" @if($image['album']['gallery_id'] == $option->id)selected @endif>{{ $option->name }}</option>
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
                                            return $item['gallery_id'] == $image['album']['gallery_id'];
                                            })->all() as $option)
                                            <option value="{{ $option->id }}" @if($image['album']['id'] == $option->id)selected @endif>{{ $option->name }}</option>
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
                                    <input class="form-control" name='name' value='{{ $image['name'] }}' />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">@lang('general.description')</label>
                                <div class="col-sm-8">
                                    <textarea class="form-control" name='description' rows="3" >{{ $image['description'] }}</textarea>
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
        <div class="modal fade" id="deleteImage{{ $image['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">@lang('errors.are_you_sure.delete_image')</h4>
                    </div>
                    <div class="modal-body">
                        <img src='{{ asset('/assets/'.$Enum::EDUCATIONKS_STORAGE.$Enum::IMAGE_LARGE.'/'.$image['attachment']['file_name']) }}' class='img-responsive' />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">@lang('general.cancel')</span></button>
                        <a href="{{ action('AdminPanel\GalleryController@getDelete',['id'=>$image['id']]) }}" class="btn btn-danger">
                            <span class="fa fa-remove fa-lg"></span> @lang('general.remove')
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @else

    <div class='col-sm-3'>
        <div class="thumbnail" data-toggle="modal" data-target="#ImageAutonet{{ $image['id'] }}"  style="cursor: pointer; ">
            <img src='{{ $autonet_url.$image['attachment']['url'] }}' class='cover' style="min-height: 150px; max-height:150px;" />
            <div class="caption">
                <h4 style="word-wrap: break-word;"> 
                    @if(strlen($image['name']) >= 19)
                    {{ substr($image['name'],0,18) }}...
                    @else
                    {{ $image['name'] }}
                    @endif
                </h4>        
            </div>
        </div>
        <!-- Image info Autonet -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="modal fade" id="ImageAutonet{{ $image['id'] }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content ">
                    <div class="modal-body">
                        <div class="thumbnail">
                            <img src='{{ $autonet_url.str_replace('/pics/n','/pics/m',$image['attachment']['url']) }}' class='img-responsive' />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">@lang('general.cancel')</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    {!! ""; $i++ !!}
    @if($i == 4)
    {!! ""; $i = 0 !!}
</div>
@endif
@endforeach

<ul class="pagination">
    @for($i=0;$i<$pageNum;$i++)
    <li  @if(Input::get('page') == $i+1) class='active' @endif><a href="?page={{ $i+1 }}">{{ $i+1 }}</a></li>
    @endfor
</ul>
@stop

@section('content')

@yield('notification')
<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="box box-info">
        <div class="box-header with-border" role="tab" id="headingOne">
            <h4 class="box-title">
                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#uploadImage" aria-expanded="true" aria-controls="collapseOne">
                    @lang('general.upload_new_images')
                </a>
            </h4>
        </div>
        <div id="uploadImage" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
            <div class="panel-body">
                <div id="uploadImageFile">Upload</div>
            </div>
        </div>
    </div>

</div>
@yield('album-image')

@stop

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#uploadImageFile').uploadFile({
            url: "{{ action('AdminPanel\AttachmentController@postUploadGallery') }}",
            fileName: "file_upload",
            formData: {"_token": "{{ csrf_token() }}", "album_id": "{{ $selectedAlbum->id }}"},
            acceptFiles: "image/*",
            showFileCounter: true,
            onSubmit: function (files, data, xhr, pd)
            {
                console.log("Asdf");
                //files: list of files
                //data: response from server
                //xhr : jquer xhr object
            },
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
                        window.location.reload();
                    }
        });
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
                albumSelect.removeAttr('disabled');
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
    });
</script>
@stop