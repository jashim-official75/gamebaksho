<?php $__env->startSection('frontend_header'); ?>
    <meta property="og:title" content="Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:description" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta name="title" content="Play Online Games on Xoss Games - Your Ultimate Gaming Destination" />
    <meta name="description" content="Looking for a thrilling gaming experience? Xoss Games offers a wide range of online games to play for free. Get ready for hours of fun and excitement on our gaming platform!" />
    <meta name="keywords" content="Online games, Play games online,Free online games,Xoss games	,Best online games,Play free online games,Multiplayer games,Play online games for free,Online shooting games,Online,puzzle games,Play free games online,Play online multiplayer games ,Online action games	,Best free online games,Online adventure games,Online strategy games, Play online action games" />
    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />
    <title>Enjoy a Wide Range of Online Games on Xoss Games | Games</title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
  
    <!-- --------------------------mostPopular start-------------------- -->
    <section class="search_games" >
        <div class="container">
            <div class="card__wrapper mt-5  row">
                <?php $__empty_1 = true; $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-0">
                        <a href="<?php echo e(route('game', $game->game_file)); ?>">
                         <div class="card card__body">
                                <img src="<?php echo e(asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail)); ?>"
                                    class="card-img-top card__img" width="100%" alt="<?php echo e($game->game_thumbnail); ?>" />
                                <div class="card-body card__text__body">
                                    <h5 class="card-title card__text"><?php echo e($game->game_name); ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="erro-img text-center">
                <img src="<?php echo e(asset('assets/frontend/img/404-game.gif')); ?>"
                        alt="" class="img-fluid">
                </div>
                <h1>Whoops!</h1>
               <h4 class="game_not_found">Game Not Found</h4>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- --------------------------mostPopular end-------------------- -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\gamebaksho\resources\views/frontend/pages/searchGames.blade.php ENDPATH**/ ?>