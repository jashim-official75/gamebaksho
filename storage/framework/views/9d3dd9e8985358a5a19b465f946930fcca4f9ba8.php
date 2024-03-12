
<?php $__env->startSection('frontend_header'); ?>
    <meta property="og:title" content="<?php echo e($game->meta_title); ?>">
    <meta property="og:description" content="<?php echo e($game->meta_description); ?>">
    <meta property="og:image" content="<?php echo e(asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail)); ?>" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta name="title" content="<?php echo e($game->meta_title); ?>" />
    <meta name="description" content="<?php echo e($game->meta_description); ?>" />
    <meta name="keywords" content="<?php echo e($game->meta_keyword); ?>" />
    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />
    <title>Playtoony | Enjoy a Wide Range of Online Games on <?php echo e($game->game_name); ?></title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <!-- ---------------------------play btn section start------------------ -->
    <section class="plybtn pt-5" id="gamePlay">
        <div class="container">
            <div class="iframe__body">
                <iframe src="<?php echo e(asset('AllGames/' .$game->game_file)); ?>" width="100%" class="iframe__body__iframe"
                    id="myvideo" frameborder="0"></iframe>
                <div class="iframe__body__t">
                    <h3 class="iframe__body__t__title"><?php echo e($game->game_name); ?></h3>
                    <div class="iframe__body__t__description">
                        
                        <span onclick="openFullscreen()">Maximize &nbsp; <img
                                src="<?php echo e(asset('assets/frontend/img/maximize.png')); ?>" width=""
                                alt="" /></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ---------------------------play btn section end------------------ -->
    <!-- --------------------------Game Description section start ----------->
    <section id="game__description" class="mostPopular">
        <div class="container">
            <div class="game__description__body">
                <h3 class="game__description__body__title">Game Description</h3>
                <p class="game__description__body__text">
                    <?php echo e($game->game_description); ?>

                </p>
            </div>
        </div>
    </section>
    <!---------------------------- Game Description section end ------------->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/playtoony.com/public_html/resources/views/frontend/pages/gameplay/laptop.blade.php ENDPATH**/ ?>