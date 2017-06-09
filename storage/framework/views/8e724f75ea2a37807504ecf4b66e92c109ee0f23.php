

<?php $__env->startSection('content'); ?>
    <div class="container">

        <br><br><br><br><br><br>
        <h1>No result found for "<span style="color: #990000"><?php echo e($keywords); ?>"</span>, please try any other keyword(s)</h1>
        <hr>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>