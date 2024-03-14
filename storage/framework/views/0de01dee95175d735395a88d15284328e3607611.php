<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Xoss Games</title>
    <link href="<?php echo e(asset('/assets/backend/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <style>
        .bg {
            background-color: #111114
        }

    </style>
</head>

<body class="bg">
    <div class="conatainer">
        <div class="d-flex justify-content-center align-items-center" style="height: 80vh;">
            <div class="col-md-4">
            <?php if(session('error')): ?>
              <div class="alert alert-success"><?php echo e(session('error')); ?> </div>
            <?php endif; ?>
                <h1 class="text-center mt-4 text-white">Login</h1>
                <form action="<?php echo e(route('admin.login.process')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label text-white">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" value="<?php echo e(old('email')); ?>">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span style="color: red;"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label text-white">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span style="color: red;"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<?php /**PATH D:\laragon\www\gamebaksho\resources\views/backend/auth/login.blade.php ENDPATH**/ ?>