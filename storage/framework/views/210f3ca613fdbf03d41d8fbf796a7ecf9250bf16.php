

<?php $__env->startSection('frontend_header'); ?>
    <meta property="og:title" content="Packages | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:description" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta name="title" content="Packages | Play Online Games on Xoss Games - Your Ultimate Gaming Destination" />
    <meta name="description" content="Looking for a thrilling gaming experience? Xoss Games offers a wide range of online games to play for free. Get ready for hours of fun and excitement on our gaming platform!" />
    <meta name="keywords" content="Online games, Play games online,Free online games,Xoss games	,Best online games,Play free online games,Multiplayer games,Play online games for free,Online shooting games,Online,puzzle games,Play free games online,Play online multiplayer games ,Online action games	,Best free online games,Online adventure games,Online strategy games, Play online action games" />
    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />
    <title>Packages | Enjoy a Wide Range of Online Games on Xoss Games</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('frontend.mobile-packages')->html();
} elseif ($_instance->childHasBeenRendered('pkPSGMS')) {
    $componentId = $_instance->getRenderedChildComponentId('pkPSGMS');
    $componentTag = $_instance->getRenderedChildComponentTagName('pkPSGMS');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('pkPSGMS');
} else {
    $response = \Livewire\Livewire::mount('frontend.mobile-packages');
    $html = $response->html();
    $_instance->logRenderedChild('pkPSGMS', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageJS'); ?>
<script>

// JavaScript functions to show and hide the popup
// JavaScript functions to show and hide the popup
function showPopup() {
  var popup = document.querySelector(".popup_inner");
  popup.classList.add("active");
  var popupContainer = document.querySelector(".popup-container");
  popupContainer.classList.toggle("toggle");
}

function hidePopup() {
  var popup = document.querySelector(".popup_inner");
  popup.classList.remove("active");
  var popupContainer = document.querySelector(".popup-container");
  popupContainer.classList.toggle("toggle");
}



</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/playtoony.com/public_html/resources/views/frontend/pages/mobilePackages.blade.php ENDPATH**/ ?>