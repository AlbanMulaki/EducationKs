<footer class="main-footer " style='background: #2d3033;'>
    <div class="container" >
        <div class="col-md-12 text-center text-white">
            <strong>Copyright © 2015-<?php echo e(date('Y')); ?> <a href="<?php echo e(action('HomeController@getIndex')); ?>">Education KS</a>.</strong> All rights
            reserved.
        </div>
        <div class="col-md-12 text-center  text-white" >
            Zhvilluar nga ekipi Education KS
        </div>
    </div>
    <!-- /.container -->
</footer>

<script src="<?php echo e(asset('assets/js/jquery-2.2.1.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/js/foundation.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/js/plugins.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('assets/js/script.min.js')); ?>" type="text/javascript"></script>
<script>
$(document).foundation();
</script>