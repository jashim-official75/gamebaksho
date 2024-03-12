
<?php $__env->startSection('frontend_header'); ?>
    <meta property="og:title" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:description" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="https://xoss.games/">
    <meta name="title" content="Play Online Games on Xoss Games - Your Ultimate Gaming Destination" />
    <meta name="description"
        content="Looking for a thrilling gaming experience? Xoss Games offers a wide range of online games to play for free. Get ready for hours of fun and excitement on our gaming platform!" />
    <meta name="keywords"
        content="Online games, Play games online,Free online games,Xoss games	,Best online games,Play free online games,Multiplayer games,Play online games for free,Online shooting games,Online,puzzle games,Play free games online,Play online multiplayer games ,Online action games	,Best free online games,Online adventure games,Online strategy games Play online action games" />
    <link rel="canonical" href="https://xoss.games" />
    <title>PlayToony | Play online Games on Playtoony</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- --------------------------bannar start ---------------------- -->
    <header class="bannar" id="square_animation">
        <div class="bannar__body">
            <div class="bannar__body__text container  ">
                <h1 id="heading">Playtoony</h1>
                <p class="bannar__body__text__description animate-pop-in">
                    Play all exciting games
                    <br>
                    in one subscription
                </p>
                <?php if(!$subscribed): ?>
                    <div class="bannar__body__btn shake" id="interact_btn">
                        <?php if(!$isMobile): ?>
                            
                            <button class="btn__hover pulse">Subscribe
                                Now</button>
                        <?php else: ?>
                            
                            <a href="#"> <button class="btn__hover pulse">Subscribe
                                    Now</button></a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>
    <!-- --------------------------bannar end ------------------------ -->




    

    <!-- --------------------------PRELOADER START ------------------------ -->
    <div id="preloader_container">
        <div class="preloader">
            <h1 id="heading">Playtoony</h1>
            <div class="preload_box"></div>
        </div>
    </div>
    <!-- --------------------------PRELOADER END ------------------------ -->
    <!-- --------------------------subscribe for all game/mostPopular start ----->
    <section class="mostPopular lock" id="allGame">
        <div class="container">

            <div class="mostPopular__title mb-3 mb-md-5">
                <?php if(!$subscribed): ?>
                    <h2
                        class="mostPopular__title__text mostPopular__title__text--font-width mostPopular__title__text--font-size">
                        
                    </h2>
                <?php endif; ?>
                <?php if($subscribed): ?>
                <h2 class="mostPopular__title__text mostPopular__title__text--font-size mt-5">
                  <img
                        src="<?php echo e(asset('assets/frontend/img/coding.png')); ?>" alt="">  All Games
                </h2>
                <?php else: ?>
                <h2 class="mostPopular__title__text mostPopular__title__text--font-size mt-5">
                    <img
                        src="<?php echo e(asset('assets/frontend/img/premium.png')); ?>" height="40px" width="40px" alt=""> Exclusive Games
                </h2>
                <?php endif; ?>
                <p class="subheading_common">From puzzles to action, adventure to sports, we offer a vast collection of
                    online games for all ages</p>
            </div>
            <div class="card__wrapper row justify-content-center">
                <?php $__currentLoopData = $notFreeGames; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class=" col-6 col-sm-6 col-md-4 col-lg-4 col-xl-3 p-0">
                        <a href="<?php echo e(route('game', $game->game_file)); ?>">
                          
                            <div class="card card__body">
                                <!-- <div class="premium_badge">Premium <span class="premium_icon"><i class="fa-solid fa-crown"></i></span> </div>-->
                                <img src="<?php echo e(asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail)); ?>"
                                    width="220" height="210" class="card-img-top card__img"
                                    alt="<?php echo e($game->game_thumbnail); ?>" />
                                <div class="card-body card__text__body">
                                    <h3 class="card-title card__text"><?php echo e(Str::limit($game->game_name, 17, '...')); ?></h3>
                                </div>
                                <?php if(!$subscribed): ?>
                                
                                <div class="premium_badge">
                                    <img src="<?php echo e(asset('assets/frontend/img/premium_badge.png')); ?>" alt="">
                                </div>
                                    
                                <?php endif; ?>
                            </div>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        </div>
    </section>
    <!-- --------------------------subscribe for all game/mostPopular end-------------------- -->
    <!-- ------------------------- Exclusive Games Trailers Start ---------------------->
    <section class="slider" id="youTube">
        <div class="container">
            <div class="row section__header">
                <div class="mostPopular__title col-12 mb-3 mb-md-5">
                    <h3 class="mostPopular__title__text mostPopular__title__text--font-size">
                     <img
                        src="<?php echo e(asset('assets/frontend/img/treasers.png')); ?>" height="40px" width="40px" alt="">   Latest Game Teasers
                    </h3>
                    <p class="subheading_common"> An opportunity to stay informed about the latest and upcoming games
                        through teasers and trailers</p>
                </div>
            </div>
            <div class="row slider__items">
                <div class="col-xl-3 col-lg-4 col-md-6  col-sm-12">
                    <div class="card__height">
                        <a data-fancybox="gallery" class="slider__item hover1 popup-youtube"
                            href="https://youtu.be/VIK-6oNij3U?list=PLniueHXS3q--oX21mZaRXSHL2PWnH-cmV" target="blank">
                            <img class="slider__item--banner"
                                src="<?php echo e(asset('assets/frontend/img/animal-match-master.webp')); ?>" alt="" />

                            <div class="play_icon"> <i class="fa-solid fa-play"></i></div>

                            <div class="slider__card__title slidr__card__title--position col-12">
                                <h4 class="slider__card__title__text">Animal Match Master</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6  col-sm-12">
                    <div class="card__height">
                        <a data-fancybox="gallery" class="slider__item hover2"
                            href="https://youtu.be/hxR5FN244Yg?list=PLniueHXS3q--oX21mZaRXSHL2PWnH-cmV">
                            <img class="slider__item--banner"
                                src="<?php echo e(asset('assets/frontend/img/football-color-matcher-320x240.webp')); ?>"
                                alt="" />
                            <div class="play_icon"> <i class="fa-solid fa-play"></i></div>
                            <div class="slider__card__title col-12">
                                <h4 class="slider__card__title__text">Football Color Matcher</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6  col-sm-12">
                    <div class="card__height">
                        <a data-fancybox="gallery" class="slider__item hover3"
                            href="https://youtu.be/jDHbzOENFK0?list=PLniueHXS3q--oX21mZaRXSHL2PWnH-cmV">
                            <img class="slider__item--banner"
                                src="<?php echo e(asset('assets/frontend/img/space-challenge-320x240.webp')); ?>" alt="" />
                            <div class="play_icon"> <i class="fa-solid fa-play"></i></div>
                            <div class="slider__card__title slidr__card__title--position col-12">
                                <h4 class="slider__card__title__text">Space Challenge</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6  col-sm-12">
                    <div class="card__height">
                        <a data-fancybox="gallery" class="slider__item hover4"
                            href="https://youtu.be/dhy4mf-Ik5E?list=PLniueHXS3q--oX21mZaRXSHL2PWnH-cmV">
                            <img class="slider__item--banner"
                                src="<?php echo e(asset('assets/frontend/img/fluffy-rush-320x240.webp')); ?>" alt="" />
                            <div class="play_icon"> <i class="fa-solid fa-play"></i></div>
                            <div class="slider__card__title slidr__card__title--position col-12">
                                <h4 class="slider__card__title__text">Fluffy Rush</h4>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6  col-sm-12">
                    <div class="card__height">
                        <a data-fancybox="gallery" class="slider__item hover5"
                            href="https://youtu.be/xRWuWWx0bGc?list=PLniueHXS3q--oX21mZaRXSHL2PWnH-cmV">
                            <img class="slider__item--banner"
                                src="<?php echo e(asset('assets/frontend/img/burger-elf-video-thambnail.webp')); ?>"
                                alt="" />
                            <div class="play_icon"> <i class="fa-solid fa-play"></i></div>
                            <div class="slider__card__title slidr__card__title--position col-12">
                                <h4 class="slider__card__title__text">BURGER ELF</h4>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ------------------------- Exclusive Games Trailers End ---------------------->

        <!-- --------------------------small card start ------------------------ -->
        <section id="small_card">
            <div class="from_left">
                
            </div>
        </section>
        <section id="small_card">
            <div class="from_right">
    
            </div>
        </section>
        <!-- --------------------------small card end ------------------------ -->

    <!---custom subscriber tracking popup---->
  
    <?php if(session('subs_success')): ?>
        <div class="subscriber_tracking_success_popup">
            <div id="success_popup" class="success_popup">
                <div class="subscriber_tracking_success_popup_inner active">
                    <div class="popup_info_icon succes_icon">
                        <i class="fa-solid fa-check"></i>
                    </div>
                    <div class="popup_info_text">
                        <h1>Success !</h1>
                        <p>Subscription Successfull! Enjoy our games!</p>
                        <button class="tracking_ok_button" id="<?php echo e(session('subs_success')); ?>" onclick="hidePopup()">OK</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('pageJS'); ?>
    <script>
        //----custom subscriber success tracking popup----//
        function hidePopup() {
            var popupContainer = document.querySelector(".subscriber_tracking_success_popup");
            popupContainer.classList.add("active");
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/playtoony.com/public_html/resources/views/frontend/pages/home.blade.php ENDPATH**/ ?>