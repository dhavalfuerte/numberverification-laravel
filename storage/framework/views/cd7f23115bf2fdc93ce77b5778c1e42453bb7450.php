<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Please Verify Code')); ?></div>

                <div class="card-body">
                    <?php if(Session::has('message')): ?>
                    <div class="alert alert-danger">
                    <?php echo e(Session::get('message')); ?></div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('verify')); ?>">
                        <?php echo csrf_field(); ?>

                  
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Code')); ?></label>

                            <div class="col-md-6">
                                <input id="code" type="text" class="form-control <?php $__errorArgs = ['code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="code" required autocomplete="current-code">

                                <?php if($errors->has('code')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('code')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Verify')); ?><?php echo e(session()->get( 'phone' )); ?>

                                </button>

                            </div>
                        </div>
                        

                        

                    </form>
                </div>
                <div class="card-footer">
                    <a href="<?php echo e(route('reverify',$phone)); ?>">Resend Code</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Fuerte\NumberVerification\resources\views/verify.blade.php ENDPATH**/ ?>