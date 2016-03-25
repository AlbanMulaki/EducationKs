<?php $__env->startSection('main-header'); ?>
<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="<?php echo e(action('AdminPanel\AuthController@getIndex')); ?>" class="logo"><b>Autopub</b> Administration</a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="<?php echo e(asset("assets/admin/img/avatar5.png")); ?>" class="user-image" alt="User Image"/>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"><?php echo e(ucfirst($users->first_name)." ".ucfirst($users->last_name)); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="<?php echo e(asset("assets/admin/img/avatar5.png")); ?>" class="img-circle" alt="User Image" />
                            <p>
                                <?php echo e(ucfirst($users->first_name)." ".ucfirst($users->last_name)); ?> - <?php echo e($users->usersRole[0]->name); ?> 
                                <small><?php echo e(date_format($users->created_at, "M. Y")); ?></small>
                            </p>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="#" data-toggle='modal' data-target='#userProfile' class="btn btn-default btn-flat"><?php echo app('translator')->get('general.profile'); ?></a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo e(action('AdminPanel\AuthController@getLogout')); ?>" class="btn btn-default btn-flat"><?php echo app('translator')->get('general.logout'); ?></a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<?php $__env->stopSection(); ?>



<?php $__env->startSection('side-menu'); ?>

<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="<?php echo e(asset("assets/admin/img/avatar5.png")); ?>" class="img-circle" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p><?php echo e(ucfirst($users->first_name)." ".ucfirst($users->last_name)); ?> </p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> <?php echo app('translator')->get('general.online'); ?></a>
        </div>
    </div>

    <!-- search form (Optional) -->
    <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
            <input type="text" name="q" class="form-control" placeholder="Search..."/>
            <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </form>
    <!-- /.search form -->

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
        <li class="header">Autopub</li>
        <!-- Optionally, you can add icons to the links -->
        <li class=" treeview <?php if(request()->is('*/dashboard*')): ?>active <?php endif; ?> ">
            <a href="<?php echo e(action('AdminPanel\DashboardController@getIndex')); ?>"><i class="fa fa-dashboard fa-fw"></i> <span><?php echo app('translator')->get('general.dashboard'); ?></span></a>
        </li>

        <?php if($users->usersRole[0]['id'] == $Enum::SUPER_ADMINISTRATOR || $users->usersRole[0]['id'] == $Enum::ADMINISTRATOR || $users->usersRole[0]['id'] == $Enum::MODERATOR ): ?>

        <li <?php if(request()->is('*/category*')): ?>class="active" <?php endif; ?>>
             <a href="<?php echo e(action('AdminPanel\CategoryController@getIndex')); ?>"><i class="fa fa-briefcase fa-fw"></i> <span><?php echo app('translator')->get('general.category'); ?></span></a>
        </li>
        <?php endif; ?>

        <li <?php if(request()->is('*/posts*')): ?>class="active" <?php endif; ?>>
             <a href="<?php echo e(action('AdminPanel\PostsController@getIndex')); ?>"><i class="fa fa-edit fa-fw"></i> <span><?php echo app('translator')->get('general.posts'); ?></span></a>
        </li>
        <?php if($users->usersRole[0]['id'] == $Enum::SUPER_ADMINISTRATOR || $users->usersRole[0]['id'] == $Enum::ADMINISTRATOR ): ?>

        <li <?php if(request()->is('*/options*')): ?>class="active" <?php endif; ?>>
             <a href="<?php echo e(action('AdminPanel\OptionsController@getIndex')); ?>"><i class="fa fa-wrench fa-fw"></i> <span><?php echo app('translator')->get('general.options'); ?></span></a>
        </li>
        <?php endif; ?>

        <?php if($users->usersRole[0]['id'] == $Enum::SUPER_ADMINISTRATOR || $users->usersRole[0]['id'] == $Enum::ADMINISTRATOR ): ?>

        <li <?php if(request()->is('*/advertising*')): ?>class="active" <?php endif; ?>>
             <a href="<?php echo e(action('AdminPanel\AdvertisingController@getIndex')); ?>"><i class="fa fa-bullhorn fa-fw"></i> <span><?php echo app('translator')->get('general.advertising'); ?></span></a>
        </li>
        <?php endif; ?>

        <?php if($users->usersRole[0]['id'] == $Enum::SUPER_ADMINISTRATOR || $users->usersRole[0]['id'] == $Enum::ADMINISTRATOR ): ?>

        <li <?php if(request()->is('*/users*')): ?>class="active" <?php endif; ?>>
             <a href="<?php echo e(action('AdminPanel\UsersController@getIndex')); ?>"><i class="fa fa-group fa-fw"></i> <span><?php echo app('translator')->get('general.users'); ?></span></a>
        </li>
        <?php endif; ?>

        <li <?php if(request()->is('*/gallery*')): ?>class="active" <?php endif; ?>>
             <a href="<?php echo e(action('AdminPanel\GalleryController@getIndex')); ?>"><i class="fa fa-image fa-fw"></i> <span><?php echo app('translator')->get('general.gallery'); ?></span></a>
        </li>
    </ul><!-- /.sidebar-menu -->
</section>

<?php $__env->stopSection(); ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="et" xml:lang="et">

    <?php echo $__env->make('includes.admin.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <body class='skin-yellow  sidebar-mini'>
        <div id="wrapper">
            <?php echo $__env->yieldContent('main-header'); ?>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar" style='position: fixed;'>
                <?php echo $__env->yieldContent('side-menu'); ?>
                <!-- /.sidebar -->
            </aside>

            <div class="content-wrapper">
                <!-- Content Header (Page header) -->

                <?php echo $__env->yieldContent('header-title'); ?>
                <!-- Main content -->
                <section class="content">
                    <!-- Your Page Content Here -->
                    <?php echo $__env->yieldContent('content'); ?>
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <?php echo $__env->make('includes.admin.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </footer>

        </div>

        <!-- Modal -->
        <form class="form-horizontal" action="<?php echo e(action('AdminPanel\UsersController@postUpdate')); ?>" method="POST" >

            <div class="modal fade" id="userProfile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><?php echo e(Lang::get('general.profile_edit')); ?></h4>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                            <div class="form-group">
                                <label  class="col-sm-3 control-label"><?php echo e(Lang::get('general.first_name')); ?></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control"  placeholder="<?php echo e(Lang::get('placeholder.first_name')); ?>" name='first_name' value='<?php echo e($users->first_name); ?>' />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo e(Lang::get('general.last_name')); ?></label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" placeholder="<?php echo e(Lang::get('placeholder.last_name')); ?>" name='last_name'  value='<?php echo e($users->last_name); ?>'/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo e(Lang::get('general.email')); ?></label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control"  placeholder="<?php echo e(Lang::get('placeholder.email')); ?>" name='email'  value='<?php echo e($users->email); ?>'/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-3 control-label"><?php echo e(Lang::get('general.password')); ?></label>
                                <div class="col-sm-8">
                                    <button class="btn btn-warning" type="button" id='passwordFieldProfile' data-toggle="collapse" data-target="#passwordChange" aria-expanded="false" aria-controls="collapseExample">
                                        <span class='fa fa-key fa-lg '></span> <?php echo e(Lang::get('general.change_password')); ?>

                                    </button>
                                </div>
                            </div>
                            <div class="form-group  has-warning">
                                <div class="col-md-offset-3 col-sm-8 collapse" id="passwordChange" >
                                    <div class="input-group " >
                                        <div class="input-group-addon"><span class='fa fa-lock fa-lg' ></span></div>
                                        <input type="password" class="form-control" id='passwordFieldProfileInput' name='password' disabled=''/>
                                    </div>
                                    <div class='help-block '>New Password</div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(Lang::get('general.close')); ?></button>
                            <button type="submit" class="btn btn-primary"><?php echo e(Lang::get('general.update')); ?></button>
                        </div>

                    </div>
                </div>
            </div>

        </form>
        <?php echo $__env->yieldContent('scripts'); ?>
    </body>
</html>