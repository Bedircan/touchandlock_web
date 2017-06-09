<?php if( session()->has('info')): ?>
    <div class="alert alert-info" role-"alert">
        <?php echo e(session()->get('info')); ?>

    </div>
<?php endif; ?>

<?php if( session()->has('warning')): ?>
    <div class="alert alert-danger" role-"alert">
        <?php echo e(session()->get('warning')); ?>

    </div>
<?php endif; ?>

<?php if( session('status')): ?>
     <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>