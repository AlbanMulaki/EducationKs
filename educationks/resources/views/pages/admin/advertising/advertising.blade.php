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
        {{ Lang::get('general.advertising') }} 
        <small>@lang('general.advertising')  <span class='fa fa-bullhorn '></span></small>
    </h1>
</section>
@stop

@section('content')
@yield('notification')

<div class="box box-info">
    <div class='box-header with-border'>
        <h1 class='box-title'>{{ Lang::get('general.advertising') }}</h1>
    </div>
    <div class="box-body">
        <p>{{ Lang::get('general.advertising_full_description') }}</p>
        <div class="panel-group" id="advertising-parent" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <ul class="nav nav-pills">
                    @foreach($ads as $advertise)
                    <li role="presentation" role="tab">
                        <a role="button" data-toggle="collapse"  href="#advertising{{$advertise->id}}" aria-expanded="true" aria-controls="advertising1" data-parent="#advertising-parent">{{ $advertise->name }}</a>
                    </li>
                    @endforeach
                </ul>
                @foreach($ads as $advertise)
                <div class="collapse @if($firstElement == true) in {{$firstElement=false}}@endif" id="advertising{{$advertise->id}}">
                    <form role='form' action='{{ action('AdminPanel\AdvertisingController@postSave',array('id'=>$advertise->id)) }}' method='POST'>
                        <!--<input type="hidden" name="idads" value="{{ $advertise->id }}">-->
                        <div class="panel-body">
                            <h3>
                                {{ Lang::get('general.advertising')." ".$advertise->name }}
                            </h3>
                            <div  class="col-lg-10">
                                <p>{{ Lang::get('general.advertising_full_description') }}</p>
                            </div>
                            <div class="col-lg-2">
                                <label>{{ Lang::get('general.active') }}</label>
                                <div class="form-group">
                                    <div class="btn-group btn-toggle">
                                        <button class="btn @if($advertise->active == $ON) btn-success  active @else  btn-default @endif" type='text' id='active{{ $ON }}' name='active' value='{{ $ON }}' @if($advertise->active == $ON) checked="" @endif>ON</button>
                                        <button class="btn @if($advertise->active == $OFF) btn-success  active @else  btn-default @endif" type='text' id='active{{ $OFF }}' name='active' value='{{ $OFF }}'@if($advertise->active == $OFF) checked="" @endif>OFF</button>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-group" id="advertising-parent" role="tablist" aria-multiselectable="true">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class='col-sm-6'>
                                    <div class="form-group">
                                        <label>{{ Lang::get('general.name') }}</label>
                                        <input class="form-control" name='name' type='text' value="{{ $advertise->name }}">
                                        <p class="help-block">Content of ads</p>
                                    </div>

                                </div>
                                <div class='col-sm-6'>
                                    <div class="form-group ">
                                        <label>{{ Lang::get('general.expiry_date') }}</label>
                                        <div class='input-group  ' id='datepicker-expirydate-ads{{ $advertise->id }}'>
                                            <input type='text' class="form-control " name='expiry_date' value='' />
                                            <span class="input-group-addon ">
                                                <span class="fa fa-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name='ads_content' rows="7" placeholder='{{ Lang::get('placeholder.ads_content') }}'>{{ $advertise->ads_content }}</textarea>
                                    </div>
                                </div>
                                <button class='btn btn-primary btn-flat center-block' type='submit' name='submit' >{{ Lang::get('general.update') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
<script type="text/javascript">

    $(document).ready(function () {

        @foreach($ads as $advertise)
                $('#datepicker-expirydate-ads{{ $advertise->id }}').datetimepicker({
        defaultDate: "{{ date('Y-m-d H:i:s O', strtotime($advertise->expiry_date)) }}",
                format: 'YYYY-MM-DD HH:mm:ss ZZ',
        });
                @endforeach
                $('.btn-toggle').click(function () {
            $(this).find('.btn').toggleClass('active');
            if ($(this).find('.btn-success').size() > 0) {
                $(this).find('.btn').toggleClass('btn-success');
            }
            $(this).find('.btn').toggleClass('btn-default');
            $(this).find('.btn').removeAttr('checked');
            $(this).find('.active').attr('checked', '');
            $('button[name="submit"]').attr('disabled', '');
        });
    });
</script>
@stop