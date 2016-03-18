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


<script>
</script>
@stop


@section('header-title')

<section class="content-header">
    <h1>
        {{ Lang::get('general.options') }} 
        <small>@lang('general.options')  <span class='fa fa-wrench '></span></small>
    </h1>
</section>
@stop

@section('content')

@yield('notification')
<form action="{{ action('AdminPanel\OptionsController@postSave') }}" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="box box-primary">
        <div class="box-header with-border">
            <h1 class='box-title'> {{ Lang::get('general.options_form') }}</h1>
        </div>
        <div class="box-body">
            <div class="col-lg-4">
                <div class="form-group @if(isset($errors->getMessages()['name'][0])) has-error @endif">
                    <label>{{ Lang::get('general.name_fill') }}</label>
                    <input autocomplete="off" type="text" class="form-control " placeholder="{{ Lang::get('placeholder.name_site') }}" name='name' value='{{ $options->name }}' />
                </div>
                <div class="form-group @if(isset($errors->getMessages()['email'][0])) has-error @endif">
                    <label>{{ Lang::get('general.email_fill') }}</label>
                    <div class="input-group">
                        <span class="input-group-addon" id="sizing-addon2"><span class='fa fa-envelope-o fa-lg'></span></span>
                        <input  autocomplete="off" type="text" class="form-control " placeholder="{{ Lang::get('placeholder.email_site') }}" name='email' value='{{ $options->email }}' />
                    </div>
                </div>
                <div class="input-group @if(isset($errors->getMessages()['website'][0])) has-error @endif">
                    <span class="input-group-addon" id="sizing-addon2">http://www.</span>
                    <input  autocomplete="off" type="text" class="form-control" placeholder="domain.ltd" aria-describedby="sizing-addon2" name='website' value='{{ $options->website }}' />
                </div>
            </div>
            <div class='col-md-6'>
                    
                <div class="form-group @if(isset($errors->getMessages()['logo'][0])) has-error @endif">
                    <label>{{ Lang::get('general.logo') }}:</label>
                    <img src="{{ asset('assets/'.$options->logo) }}" alt="Logo" class="well img-responsive img-rounded" style="background:#FF763A;">
                    <input type="file" name="logo" accept="image/*">
                </div>

            </div>

            <div class='col-md-12'>
                <div class="form-group @if(isset($errors->getMessages()['description'][0])) has-error @endif">
                    <label>{{ Lang::get('general.description_fill') }}</label>
                    <textarea type="text" class="form-control" placeholder="{{ Lang::get('placeholder.description_site') }}" rows="3" name='description'>{{ $options->description }}</textarea>
                </div>
                <div class="form-group @if(isset($errors->getMessages()['footer'][0])) has-error @endif">
                    <label>{{ Lang::get('general.footer_fill') }}</label>
                    <textarea type="text" class="form-control" placeholder="{{ Lang::get('placeholder.footer_site') }}" rows="3" name='footer'>{{ $options->footer }}</textarea>
                </div>
            </div>
        </div>
        <!-- /.panel-body -->
        <div class='box-footer'>
            <div class='col-md-12'>
                <button type='submit' class="btn btn-primary  btn-flat center-block" >{{ Lang::get('general.save') }}</button>
            </div>
        </div>
    </div>

</form>

@endsection