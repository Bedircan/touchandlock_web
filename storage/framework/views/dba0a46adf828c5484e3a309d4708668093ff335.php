

<?php $__env->startSection('content'); ?>
    <div class="container">

        <br><br><br><br><br><br>
        <h1 style="color: #990000">Your reservation, is closed successfully! (Reservation ID:<?php echo e($reservationId); ?> )</h1>
        <hr>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>