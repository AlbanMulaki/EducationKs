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
        {{ $gallery->name }} 
        <small>@lang('general.create_new_album')  <span class='fa fa-image '></span></small>
    </h1>
</section>
@stop

@section('create-album')

<div class="box box-primary">
    <div class='box-header'>
        <h1 class='box-title'>@lang('general.create_new_album')</h1>
    </div>
    <div class='box-body'>
        <form action='{{ action('AdminPanel\GalleryController@postAlbumCreate',['id'=>$gallery->id]) }}' class='form-horizontal' method='POST'>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />                 
            <div class="form-group">
                <label class="col-sm-3 control-label">@lang('general.album_name')</label>
                <div class="col-sm-8">
                    <input class="form-control" name='name' value='{{ old('album_name')}}' />
                </div>
                <div class="col-sm-offset-9 col-sm-2">
                    <button class="btn btn-primary btn-flat" style="margin-top:20px;" type="submit">@lang('general.save')</button>
                </div>
            </div>
        </form>
    </div>
</div>
@stop

@section('content')

@yield('notification')
@yield('create-album')

@stop

@section('scripts')
<script type="text/javascript">
</script>
@stop