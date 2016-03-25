<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="no-js"  lang="sq" xml:lang="sq">

    <?php echo $__env->make('includes.head', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <body class="layout-top-nav skin-blue">
        <div class="wrapper">
            <?php echo $__env->make('includes.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Full Width Column -->
            <div style="min-height: 480px;" class="content-wrapper">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <?php echo $__env->make('includes.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </body>
</html>