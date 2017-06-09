<?php $__env->startSection('content'); ?>
    <div class="main-container">

        <?php echo $__env->make('layouts.partials.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="page-header">
            <h3>Reset Password</h3>
        </div>

         <form role="form" method="POST" action="<?php echo e(url('/password/email')); ?>" class="form-horizontal" _lpchecked="1">
            <?php echo csrf_field(); ?>

            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>">
                    <?php if($errors->has('email')): ?>
                        <span class="help-block"><?php echo e($errors->first('email')); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-btn fa-envelope"></i> Send Password Reset Link</button>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>