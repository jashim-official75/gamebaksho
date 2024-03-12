<section id="subscriptionMobile">
    <div>
        <div class="header_title">
            <div>Xoss Games</div>
            <span>Subscription Plan</span>
        </div>

        <!-- The popup message -->
<div class="popup-container">
  <div id="popup" class="custom_popup">
    <div class="popup_inner">
      <div class="popup_info_icon">
        <i class="fa-solid fa-info"></i>
      </div>
      <div class="popup_info_text">
        <h1>Subscribe to Play</h1>
        <p>Join now to access all of Xoss Games' exclusive games.</p>
      </div>
      <a href="#" onclick="hidePopup()" class="hide_icon">
        <i class="fa-solid fa-circle-xmark"></i>
      </a>
    </div>
  </div>
</div>
        
        
    </div>
</section>

<section class="mostPopular lock" id="allGame">
    <div class="container">
        <div class="mostPopular__title my-2 mb-md-5">
            <h3 class="mostPopular__title__text mostPopular__title__text--font-size mt-0">
                Our Games
            </h3>
        </div>
        <div class="card__wrapper row justify-content-center shake_to_sub">
            <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class=" col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0 " >
                <a href="#subscriptionMobile" onclick="showPopup()">
                    <div class="card card__body">
                        <img src="<?php echo e(asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail)); ?>"
                            class="card-img-top card__img" width="100%" alt="" />
                        <div class="card-body card__text__body">
                            <h5 class="card-title card__text"><?php echo e(Str::limit($game->game_name, 17, '...')); ?></h5>
                        </div>
                        <?php if(!$subscribed): ?>
                            <span class="badge"> <span class="star"><i class="fa-solid fa-crown"></i></span>
                         <?php endif; ?>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>
</section>

<?php /**PATH /home/customer/www/playtoony.com/public_html/resources/views/livewire/frontend/mobile-packages.blade.php ENDPATH**/ ?>