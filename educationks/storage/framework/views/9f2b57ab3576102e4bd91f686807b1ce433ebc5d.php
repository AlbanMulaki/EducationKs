

<?php $__env->startSection('notification'); ?>

<?php if(session("status-notification") == "error"): ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong class='text-center'><span class='fa fa-lg fa-exclamation-circle'></span> Error !</strong> <?php echo e(session('status')); ?>


    <ul>
        <?php foreach($errors->getMessages() as $error): ?>
        <li>
            <?php echo e($error[0]); ?>

        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php elseif(session("status-notification") == "success"): ?>
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong class='text-center'><span class='fa  fa-lg fa-check'></span> Success!</strong> <?php echo e(session('status')); ?>

</div>
<?php endif; ?>


<script>
</script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('header-title'); ?>
<section class="content-header">
    <h1>
        <?php echo e(Lang::get('general.dashboard')); ?> 
        <small><?php echo app('translator')->get('general.overall_statistics'); ?>  <span class='fa fa-dashboard '></span></small>
    </h1>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->yieldContent('notification'); ?>
<div class="col-sm-4">
    <div class="box box-warning">
        <div class="box-header with-border">
            <h1 class='box-title'><i class="fa fa-bar-chart-o fa-fw"></i> <?php echo app('translator')->get('general.post_per_category'); ?></h1>
        </div>
        <div class="box-body no-padding">
            <div id='categoryPosts'>
            </div>
        </div>
        <div class='box-footer text-center'>
            <a href="#"><?php echo app('translator')->get('general.category_statistics'); ?></a>
        </div>
        <!-- /.panel-body -->
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    new Morris.Donut({
    // ID of the element in which to draw the chart.
    element: 'categoryPosts',
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data:<?php echo $categoryJsonPostNum; ?>,
            // The name of the data record attribute that contains x-values.
            xkey: 'year',
            // A list of names of data record attributes that contain y-values.
            ykeys: ['value'],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: ['Value'],
            colors: ['#FE763A', '#FF8956', '#FEA077', '#FFB99B', '#FFD4C1'],
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>