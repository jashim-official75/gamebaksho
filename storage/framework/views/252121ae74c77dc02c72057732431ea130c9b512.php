<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Google Tag Manager Head -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TSDLM28');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google Analatics tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9N2NB2TZ0Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-9N2NB2TZ0Q');
    </script>
    <!-- Google Analatics tag (gtag.js) -->


    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('assets/frontend/img/favicon.png')); ?>">
    <title>GameBaksho | Play Exclusive Games</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(asset('/assets/backend/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Toaster -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <!-- morris CSS -->
    <link href="<?php echo e(asset('/assets/backend/plugins/morrisjs/morris.css')); ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo e(asset('/assets/backend/css/style.css')); ?>" rel="stylesheet">
    <!-- colors from-->
    <link href="<?php echo e(asset('/assets/backend/css/colors/blue.css')); ?>" id="theme" rel="stylesheet">
    <?php echo $__env->yieldContent('styles'); ?>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>

<body class="fix-header fix-sidebar card-no-border">

    <!-- Google Tag Manager (noscript) body -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TSDLM28" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) →--->

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2"
                stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <?php echo $__env->make('backend.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <?php echo $__env->make('backend.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-themecolor"><?php echo $__env->yieldContent('pageName'); ?></h3>
                </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><?php echo $__env->yieldContent('pageName'); ?></li>
                    </ol>
                </div>

            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <?php echo $__env->yieldContent('content'); ?>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php echo $__env->make('backend.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo e(asset('/assets/backend/plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo e(asset('/assets/backend/plugins/popper/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/backend/plugins/bootstrap/js/bootstrap.min.js')); ?>"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo e(asset('/assets/backend/js/jquery.slimscroll.js')); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo e(asset('/assets/backend/js/waves.js')); ?>"></script>
    <!--Menu sidebar -->
    <script src="<?php echo e(asset('/assets/backend/js/sidebarmenu.js')); ?>"></script>
    <!--stickey kit -->
    <script src="<?php echo e(asset('/assets/backend/plugins/sticky-kit-master/dist/sticky-kit.min.js')); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo e(asset('/assets/backend/js/custom.min.js')); ?>"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--sparkline JavaScript -->
    <script src="<?php echo e(asset('/assets/backend/plugins/sparkline/jquery.sparkline.min.js')); ?>"></script>
    <!--morris JavaScript -->
    <script src="<?php echo e(asset('/assets/backend/plugins/raphael/raphael-min.js')); ?>"></script>
    <script src="<?php echo e(asset('/assets/backend/plugins/morrisjs/morris.min.js')); ?>"></script>
    <!-- Chart JS -->
    <script src="<?php echo e(asset('/assets/backend/js/dashboard1.js')); ?>"></script>
    <!-- Toaster JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!--sweetalert 2 js---->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!--- editor--->
    <script src="<?php echo e(asset('assets/backend/tinymce/tinymce.min.js')); ?>"></script>

    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="<?php echo e(asset('/assets/backend/plugins/styleswitcher/jQuery.style.switcher.js')); ?>"></script>
    <?php if(@session('success')): ?>
        <script>
            toastr.success("<?php echo @session('success'); ?>");
        </script>
    <?php endif; ?>
    <?php if(@session('error')): ?>
        <script>
            toastr.error("<?php echo @session('error'); ?>");
        </script>
    <?php endif; ?>

    <?php echo $__env->yieldContent('scripts'); ?>
    <?php echo \Livewire\Livewire::scripts(); ?>

</body>

</html>
<?php /**PATH D:\laragon\www\gamebaksho\resources\views/backend/layouts/app.blade.php ENDPATH**/ ?>