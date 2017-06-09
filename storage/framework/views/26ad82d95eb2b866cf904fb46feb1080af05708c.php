<?php $__env->startSection('content'); ?>
    <div class="main-container">

        <?php echo $__env->make('layouts.partials.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('account.profileInfo', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('account.avatar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <?php echo $__env->make('account.changePassword', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>