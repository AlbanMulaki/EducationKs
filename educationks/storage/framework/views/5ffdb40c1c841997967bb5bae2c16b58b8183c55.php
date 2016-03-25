<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="et" xml:lang="et">

    <?php echo $__env->make('includes.admin.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="<?php echo e(action('AdminPanel\AuthController@getIndex')); ?>"><b>Autopub</b>Login</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <div class="notification">
                    <!-- Status of login -->
                    <?php if(session('status')): ?>
                    <div class='alert alert-danger'>
                        <span class='fa fa-exclamation-circle fa-lg' > </span> <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(session('login')): ?>

                    <div class='alert alert-danger'>
                        <span class='fa fa-exclamation-circle fa-lg' > </span> <?php echo e(session('login')); ?>

                    </div>
                    <?php endif; ?>

                    <!-- Errors Validation -->
                    <?php if(count($errors) > 0): ?>
                    <div class='alert alert-danger '>
                        <div class='row'>
                            <div class='col-sm-1'>
                                <span class='fa fa-exclamation-circle fa-lg fa-2x' > </span>
                            </div>
                            <div class='col-sm-10'>
                                <ul>
                                    <?php if($errors->first('username')): ?>
                                    <li><?php echo e($errors->first('username')); ?></li>
                                    <?php endif; ?>
                                    <?php if($errors->first('password')): ?>
                                    <li><?php echo e($errors->first('password')); ?></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <form action="<?php echo e(action('AdminPanel\AuthController@postLogin')); ?>" method="post">
                    <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

                        <div class="form-group has-feedback">
                            <input class="form-control"  type='text' name="username" value="<?php echo e(old('username')); ?>" autofocus=""/>
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
                                <input class="btn btn-primary btn-block btn-flat" type="submit" value="<?php echo e(Lang::get('general.login')); ?>"/>
                            </div>
                            <!-- /.col -->
                        </div>
                        <a href="#">I forgot my password</a><br>
                            </form>
                            </div>
                            </body>
                            </html>