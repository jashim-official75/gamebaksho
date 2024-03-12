<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo e(asset('assets/frontend/img/favicon.png')); ?>" type="image/x-icon">
    <title>Xoss Games | 404 Page Not Found</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5 pt-5">
        <div class="alert alert-danger text-center">
            <h2 class="display-3">404</h2>
            <p class="display-5">Oops! Something is wrong.</p>
            <p class="display-5"><a href="<?php echo e(route('home')); ?>">Return Home</a></p>
        </div>
    </div>
</body>
</html>
<?php /**PATH D:\laragon\www\gamebaksho\resources\views/errors/404.blade.php ENDPATH**/ ?>