    <div class="page-header">
        <h3>Profile Information</h3>
    </div>

    <form role="form" method="POST" action="<?php echo e(route('account.profile')); ?>" class="form-horizontal">
        <?php echo csrf_field(); ?>

        <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
            <label for="name" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-4">
                <input type="text" name="email" id="email" value="<?php echo e($account->email ?: old('email')); ?>" autofocus="" class="form-control">
                <?php if($errors->has('email')): ?>
                    <span class="help-block"><?php echo e($errors->first('email')); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
            <label for="fullname" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-4">
                <input type="text" name="fullname" id="name" value="<?php echo e($account->fullname ?: old('fullname')); ?>" class="form-control">
                <?php if($errors->has('fullname')): ?>
                    <span class="help-block"><?php echo e($errors->first('fullname')); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group<?php echo e($errors->has('gender') ? ' has-error' : ''); ?>">
            <label for="name" class="col-sm-2 control-label">Gender</label>
            <div class="col-sm-4">
                <label class="radio col-sm-4">
                    <input type="radio"
                        <?php if($account->gender == "M"): ?>
                            <?php echo e('checked="checked"'); ?>

                        <?php endif; ?>

                    name="gender" value="M" data-toggle="radio"><span>Male</span>
                </label>
                <label class="radio col-sm-4">
                    <input type="radio"
                        <?php if($account->gender == "F"): ?>
                            <?php echo e('checked="checked"'); ?>

                        <?php endif; ?>
                     name="gender" value="F" data-toggle="radio"><span>Female</span>
                </label>
                <?php if($errors->has('gender')): ?>
                    <span class="help-block"><?php echo e($errors->first('gender')); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <div class="form-group">
            <label for="location" class="col-sm-2 control-label">Location</label>
            <div class="col-sm-4">
                <input type="text" name="location" id="location" value="<?php echo e($account->location ?: old('location')); ?>" class="form-control" placeholder="Lagos, Nigeria">
            </div>
        </div>
        <div class="form-group">
            <label for="website" class="col-sm-2 control-label">Website</label>
            <div class="col-sm-4">
                <input type="text" name="website" id="website" value="<?php echo e($account->website ?: old('website')); ?>" class="form-control" placeholder="http://goodheads.io">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-8">
                <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Update Profile</button>
            </div>
        </div>
    </form>



