<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="et" xml:lang="et">

    @include('includes.admin.head')

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="{{ action('AdminPanel\AuthController@getIndex') }}"><b>Autopub</b>Login</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <div class="notification">
                    <!-- Status of login -->
                    @if(session('status'))
                    <div class='alert alert-danger'>
                        <span class='fa fa-exclamation-circle fa-lg' > </span> {{ session('status') }}
                    </div>
                    @endif
                    @if(session('login'))

                    <div class='alert alert-danger'>
                        <span class='fa fa-exclamation-circle fa-lg' > </span> {{ session('login') }}
                    </div>
                    @endif

                    <!-- Errors Validation -->
                    @if(count($errors) > 0)
                    <div class='alert alert-danger '>
                        <div class='row'>
                            <div class='col-sm-1'>
                                <span class='fa fa-exclamation-circle fa-lg fa-2x' > </span>
                            </div>
                            <div class='col-sm-10'>
                                <ul>
                                    @if($errors->first('username'))
                                    <li>{{ $errors->first('username') }}</li>
                                    @endif
                                    @if($errors->first('password'))
                                    <li>{{ $errors->first('password') }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <form action="{{ action('AdminPanel\AuthController@postLogin') }}" method="post">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group has-feedback">
                            <input class="form-control"  type='text' name="username" value="{{ old('username') }}" autofocus=""/>
                            <span class="fa fa-envelope form-control-feedback"></span>
                        </div>
                        <div class="form-group has-feedback">
                            <input class="form-control"  type="password" name="password" valeu="" />
                            <span class="fa fa-lock form-control-feedback"></span>
                        </div>
                        <div class="row">
                            <div class="col-xs-8">
                            </div>
                            <!-- /.col -->
                            <div class="col-xs-4">
                                <input class="btn btn-primary btn-block btn-flat" type="submit" value="{{ Lang::get('general.login') }}"/>
                            </div>
                            <!-- /.col -->
                        </div>
                        <a href="#">I forgot my password</a><br>
                            </form>
                            </div>
                            </body>
                            </html>