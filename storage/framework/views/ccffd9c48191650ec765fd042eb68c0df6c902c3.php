<?php $__env->startSection('content'); ?>
    <div class="main-container">

        <?php echo $__env->make('layouts.partials.alerts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <div class="page-header">
            <h3>Sign In</h3>
        </div>

         <form role="form" method="POST" action="<?php echo e(route('auth.login')); ?>" class="form-horizontal" _lpchecked="1">
            <?php echo csrf_field(); ?>

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

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-8">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i> LOGIN</button>
                    <a href="<?php echo e(url('/password/reset')); ?>" class="btn btn-link">FORGOT YOUR PASSWORD?</a>
                </div>
            </div>
        </form>

        <hr/>

        <a href="<?php echo e(url('/auth/facebook')); ?>" class="btn btn-block btn-facebook btn-social"><i class="fa fa-facebook"></i>SIGN IN WITH FACEBOOK</a>
        <a href="<?php echo e(url('/auth/twitter')); ?>" class="btn btn-block btn-twitter btn-social"><i class="fa fa-twitter"></i>SIGN IN WITH TWITTER</a>
        <a href="<?php echo e(url('/auth/google')); ?>" class="btn btn-block btn-google btn-social"><i class="fa fa-google-plus"></i>SIGN IN WITH GOOGLE</a>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>