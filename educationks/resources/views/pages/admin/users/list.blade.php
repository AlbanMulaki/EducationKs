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
        {{ Lang::get('general.users') }} 
        <small>@lang('general.users_group')  <span class='fa fa-users '></span></small>
    </h1>
</section>
@stop

@section('add-user')
<form action='{{action('AdminPanel\UsersController@getSearch')}}' method="GET" class='form-inline'>
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="form-group">
        <a href="#" class='' data-toggle='modal' data-target='#createUserModal'  ><span class='fa fa-user-plus'></span> @lang('general.add_user')</a>
    </div>
    <div class="form-group">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="@lang('placeholder.search_user')") name="username" />
            <span class="input-group-btn">
                <button type="submit" class='btn btn-default'><span class='fa fa-search fa-lg'></span></button>
            </span>
        </div>
    </div>
</form>
<form class="form-horizontal" action="{{ action('AdminPanel\UsersController@postCreate') }}" method="POST" >
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><span class='fa fa-user-plus'></span> @lang('general.add_user') </h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">{{ Lang::get('general.username') }}</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  placeholder="{{ Lang::get('placeholder.username') }}" name='username' value='{{ old('username') }}' />
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">{{ Lang::get('general.first_name') }}</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  placeholder="{{ Lang::get('placeholder.first_name') }}" name='first_name' value='{{ old('first_name') }}' />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ Lang::get('general.last_name') }}</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="{{ Lang::get('placeholder.last_name') }}" name='last_name' value='{{ old('last_name') }}' />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ Lang::get('general.email') }}</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control"  placeholder="{{ Lang::get('placeholder.email') }}" name='email'  value='{{ old('email') }}' />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">{{ Lang::get('general.password') }}</label>
                        <div class="col-sm-8">
                            <div class="input-group " >
                                <div class="input-group-addon"><span class='fa fa-lock fa-lg' ></span></div>
                                <input type="password" class="form-control"  placeholder="{{ Lang::get('placeholder.password') }}" name='password'  value='{{ old('password') }}'/>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">{{ Lang::get('general.confirm_password') }}</label>
                        <div class="col-sm-8">
                            <div class="input-group " >
                                <div class="input-group-addon"><span class='fa fa-lock fa-lg' ></span></div>
                                <input type="password" class="form-control"  placeholder="{{ Lang::get('placeholder.confirm_password') }}" name='confirm_password'  value='{{ old('confirm_password') }}'/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ Lang::get('general.role') }}</label>
                        <div class="col-sm-8">
                            <select class="form-control" name='role_group'>
                                @foreach($role as $val)
                                <option value='{{$val->id}}' >{{ $val->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <div class='col-sm-12'>
                        <div class='text-right'>
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ Lang::get('general.close') }}</button>
                            <button type="submit" class="btn btn-primary"><span class='fa fa-user-plus fa-lg'></span> {{ Lang::get('general.add_user') }}</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</form>

@stop




@section('edit-user')
@foreach($list_users as $id => $user)
<form class="form-horizontal" action="{{ action('AdminPanel\UsersController@postUpdate') }}" method="POST" >

    <div class="modal fade" id="{{preg_replace("/[^A-Za-z0-9 ]/", '', $user->username.$user->id)}}" tabindex="-1" role="dialog" aria-labelledby="{{preg_replace("/[^A-Za-z0-9 ]/", '', $user->username.$user->id)}}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">@lang('general.edit_user') <code> {{ $user->first_name." ".$user->last_name }}</code> </h4>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="userid" value="{{ $user->id }}">
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">{{ Lang::get('general.username') }}</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  placeholder="{{ Lang::get('placeholder.username') }}" name='username' value='{{ $user->username  }}' />
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">{{ Lang::get('general.first_name') }}</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control"  placeholder="{{ Lang::get('placeholder.first_name') }}" name='first_name' value='{{ $user->first_name or old('first_name')  }}' />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ Lang::get('general.last_name') }}</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" placeholder="{{ Lang::get('placeholder.last_name') }}" name='last_name'  value='{{$user->last_name or  old('last_name')  }}'/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ Lang::get('general.email') }}</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control"  placeholder="{{ Lang::get('placeholder.email') }}" name='email'  value='{{ $user->email or old('email') }}'/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">{{ Lang::get('general.password') }}</label>
                        <div class="col-sm-8">
                            <button class="btn btn-warning passwordFieldProfile" type="button"  data-toggle="collapse" data-target=".passwordFieldProfileInput" aria-expanded="false" aria-controls="collapseExample">
                                <span class='fa fa-key fa-lg '></span> {{ Lang::get('general.change_password') }}
                            </button>
                        </div>
                    </div>
                    <div class="form-group  has-warning collapse passwordFieldProfileInput" >
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ Lang::get('general.password') }}</label>
                            <div class="col-sm-8">
                                <div class="input-group " >
                                    <div class="input-group-addon"><span class='fa fa-lock fa-lg' ></span></div>
                                    <input type="password" class="form-control"  placeholder="{{ Lang::get('placeholder.new_password') }}" name='password'/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">{{ Lang::get('general.confirm_password') }}</label>
                            <div class="col-sm-8">
                                <div class="input-group " >
                                    <div class="input-group-addon"><span class='fa fa-lock fa-lg' ></span></div>
                                    <input type="password" class="form-control"  placeholder="{{ Lang::get('placeholder.confirm_password') }}" name='confirm_password' />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">{{ Lang::get('general.role') }}</label>
                        <div class="col-sm-8">
                            <select class="form-control" name='role_group'>
                                @foreach($role as $val)
                                <option value='{{$val->id}}' @if($val->id == old('confirm_password') || $val->id == $user->role_group)) selected @endif>{{ $val->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <div class='col-sm-12'>
                        <div class='col-sm-6'>
                            <a  href="{{ action('AdminPanel\UsersController@getDelete',['delete'=>$user->id]) }}" class="btn btn-danger deleteUser"><span class='fa fa-trash'> </span> {{ Lang::get('general.remove_user') }}</a>
                        </div>
                        <div class='col-sm-6'>
                            <button type="button" class="btn btn-default" data-dismiss="modal">{{ Lang::get('general.close') }}</button>
                            <button type="submit" class="btn btn-success">{{ Lang::get('general.update') }}</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</form>
@endforeach

@stop


@section('content')
@yield('notification')
<div class='box box-primary'>
    <div class="box-header with-border">
        @yield('add-user')
        <div class='box-tools'>

            {!! str_replace("pagination","pagination pagination-sm no-margin pull-right",$list_users->render()) !!}
        </div>
    </div>
    <div class='box-body table-responsive no-padding'>
        <table class='table table-hover'>
            <tr class='active'>
                <th>#</th>
                <th>@lang('general.username')</th>
                <th>@lang('general.first_name')</th>
                <th>@lang('general.last_name')</th>
                <th>@lang('general.email')</th>
                <th>@lang('general.role')</th>
                <th>&nbsp;</th>
            </tr>

            @foreach($list_users as $id => $user)
            <tr  @if($user->usersRole[0]->id == $Enum::SUPER_ADMINISTRATOR  && $users->role_group != $Enum::SUPER_ADMINISTRATOR) data-toggle="tooltip" data-placement="top" title="@lang('errors.locked'):@lang('errors.you_cant_edit_super_admin')" @endif >
                  <td>{{ $list_users->perPage()*$list_users->currentPage()+$id-$list_users->perPage()+1 }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->last_name }}</td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->usersRole[0]->name }}</td>
                <td class='text-center'>
                    @if($user->usersRole[0]->id == $Enum::SUPER_ADMINISTRATOR  && $users->role_group != $Enum::SUPER_ADMINISTRATOR) 
                    <span class='fa fa-lock fa-lg'></span>
                    @else
                    <button class="btn btn-xs btn-default" type="button" data-toggle="modal" data-target="#{{preg_replace("/[^A-Za-z0-9 ]/", '', $user->username.$user->id)}}" >
                        <span class='fa fa-edit fa-lg '></span> @lang('general.edit')
                    </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@yield('edit-user')
@stop

@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $("input[name='confirm_password']").keyup(function () {
            var password = $("input[name='password']");
            if (password.val() != $(this).val()) {
                password.parent().removeClass('has-success').addClass('has-error');
                $(this).parent().removeClass('has-success').addClass('has-error');
            } else {
                password.parent().removeClass('has-error').addClass('has-success');
                $(this).parent().removeClass('has-error').addClass('has-success');
            }
        });
    });
    $('[data-toggle="tooltip"]').tooltip();
</script>
@stop