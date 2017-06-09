    <div class="page-header">
        <h3>Change Password</h3>
    </div>

    <form role="form" method="POST" action="<?php echo e(route('account.password')); ?>" class="form-horizontal">
        <?php echo csrf_field(); ?>

        <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
            <label for="password" class="col-sm-3 control-label">New Password</label>
            <div class="col-sm-4">
                <input type="password" name="password" id="password" class="form-control">
                <?php if($errors->has('password')): ?>
                    <span class="help-block"><?php echo e($errors->first('password')); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('password_confirmation') ? ' has-error' : ''); ?>">
            <label for="password" class="col-sm-3 control-label">Confirm Password</label>
            <div class="col-sm-4">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                <?php if($errors->has('password_confirmation')): ?>
                    <span class="help-block"><?php echo e($errors->first('password_confirmation')); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-lock"></i> Change Password</button>
            </div>
        </div>
    </form>