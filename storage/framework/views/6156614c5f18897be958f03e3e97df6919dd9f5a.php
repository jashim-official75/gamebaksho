

<?php $__env->startSection('frontend_header'); ?>
    <meta property="og:title" content="Login | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:description" content="Login | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta name="title" content="Login | Play Online Games on Xoss Games - Your Ultimate Gaming Destination" />
    <meta name="description" content="Looking for a thrilling gaming experience? Xoss Games offers a wide range of online games to play for free. Get ready for hours of fun and excitement on our gaming platform!" />
    <meta name="keywords" content="Online games, Play games online,Free online games,Xoss games	,Best online games,Play free online games,Multiplayer games,Play online games for free,Online shooting games,Online,puzzle games,Play free games online,Play online multiplayer games ,Online action games	,Best free online games,Online adventure games,Online strategy games, Play online action games" />
    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />
    <title>Login | Enjoy a Wide Range of Online Games on Xoss Games</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.mobile-login')->html();
} elseif ($_instance->childHasBeenRendered('0ioGu11')) {
    $componentId = $_instance->getRenderedChildComponentId('0ioGu11');
    $componentTag = $_instance->getRenderedChildComponentTagName('0ioGu11');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('0ioGu11');
} else {
    $response = \Livewire\Livewire::mount('frontend.mobile-login');
    $html = $response->html();
    $_instance->logRenderedChild('0ioGu11', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\gamebaksho\resources\views/frontend/pages/mobileLogin.blade.php ENDPATH**/ ?>