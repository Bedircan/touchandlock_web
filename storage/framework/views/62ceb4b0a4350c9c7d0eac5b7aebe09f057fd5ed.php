<?php $__env->startSection('content'); ?>
    <div class="main-container">

        <?php echo $__env->make('layouts.partials.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="page-header">
            <h3>Sign Up</h3>
        </div>

         <form role="form" method="POST" action="<?php echo e(route('auth.register')); ?>" class="form-horizontal" _lpchecked="1">
            <?php echo csrf_field(); ?>

            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-8">
                    <input type="text" name="name" id="name" autofocus="" class="form-control">
                    <?php if($errors->has('name')): ?>
                        <span class="help-block"><?php echo e($errors->first('name')); ?></span>
                    <?php endif; ?>
                </div>

            </div>
            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" name="email" id="email" class="form-control">
                    <?php if($errors->has('email')): ?>
                        <span class="help-block"><?php echo e($errors->first('email')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                <label for="password" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" name="password" id="password" class="form-control">
                    <?php if($errors->has('password')): ?>
                        <span class="help-block"><?php echo e($errors->first('password')); ?></span>
                    <?php endif; ?>
                </div>
            </div>
            <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
                <label for="conf_password" class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" name="password_confirmation">
                    <?php if($errors->has('password_confirmation')): ?>
                        <span class="help-block"><?php echo e($errors->first('password_confirmation')); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user-plus"></i> Signup</button>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>