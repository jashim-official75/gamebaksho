

<?php $__env->startSection('frontend_header'); ?>
    <meta property="og:title" content="FAQ | Enjoy a Wide Range of Online Games on play toony">
    <meta property="og:description" content="FAQ | Enjoy a Wide Range of Online Games on play toony">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta name="title" content="FAQ | Play Online Games on play toony - Your Ultimate Gaming Destination" />
    <meta name="description" content="Looking for a thrilling gaming experience? play toony offers a wide range of online games to play for free. Get ready for hours of fun and excitement on our gaming platform!" />
    <meta name="keywords" content="Online games, Play games online,Free online games,play toony	,Best online games,Play free online games,Multiplayer games,Play online games for free,Online shooting games,Online,puzzle games,Play free games online,Play online multiplayer games ,Online action games	,Best free online games,Online adventure games,Online strategy games, Play online action games" />
    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />
    <title>FAQ | Enjoy a Wide Range of Online Games on Play Toony</title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <!-- --------------------------bannar start ---------------------- -->
    <header class="bannar sm-hide">
        <div class="bannar__body bannar__body--bg">
            <div class="bannar__body__text slide_top">
                <h3 class="bannar__body__text__title slide-top">
                   <!-- <a href="" class="text-decoration-none">play toony</a> -->
                </h3>
            </div>
        </div>
        <div class="d-block d-sm-none row">
            <div class="sm__bannar col-12">
                <div class="sm__bannar__icon">
                    <img src="<?php echo e(asset('assets/frontend/img/game-control 1.png')); ?>" width="100%" alt="" />
                </div>
               <!-- <h3 class="sm__bannar__title">Xoss Game</h3> -->
            </div>
        </div>
    </header>
    <!-- --------------------------bannar end ------------------------ -->



       <section id="faq">

        <div class="container">
            <div class="mostPopular__title mb-5 mb-md-5 ms-5">
                <h2 class="about_us__title__text">
                    FAQs
                </h2>
            </div>
 

            <div class="accordion">
                <div class="accordion-item">
                  <button id="accordion-button-1" aria-expanded="false"><span class="accordion-title"> What is play toony?</span><span class="icon" aria-hidden="true"></span></button>
                  <div class="accordion-content">
                    <p>Play toony is a subscription based games platform. Where you can play over 50 games in one
                        platform.</p>
                  </div>
                </div>
                <div class="accordion-item">
                  <button id="accordion-button-2" aria-expanded="false"><span class="accordion-title">  Do I need to install the games to play?</span><span class="icon" aria-hidden="true"></span></button>
                  <div class="accordion-content">
                    <p>No, you do not need to install the games. You can play the games online.</p>
                  </div>
                </div>
                <div class="accordion-item">
                  <button id="accordion-button-3" aria-expanded="false"><span class="accordion-title">Do I need to subscribe to play the free games?</span><span class="icon" aria-hidden="true"></span></button>
                  <div class="accordion-content">
                    <p> No, you can play the free games through log in.</p>
                  </div>
                </div>
                <div class="accordion-item">
                  <button id="accordion-button-4" aria-expanded="false"><span class="accordion-title"> Can I change my subscription plan after purchase?</span><span class="icon" aria-hidden="true"></span></button>
                  <div class="accordion-content">
                    <p>Yes, you can. You can upgrade your subscription plan.</p>
                  </div>
                </div>
                <div class="accordion-item">
                  <button id="accordion-button-5" aria-expanded="false"><span class="accordion-title">How many games do you offer after subscribing?</span><span class="icon" aria-hidden="true"></span></button>
                  <div class="accordion-content">
                    <p> We are offering 50+ games after subscription, you can play all of them.</p>
                  </div>
                </div>
                <div class="accordion-item">
                  <button id="accordion-button-6" aria-expanded="false"><span class="accordion-title"> What are the devices that support this platform?</span><span class="icon" aria-hidden="true"></span></button>
                  <div class="accordion-content">
                    <p>   You can use this platform on any device that has a browser.</p>
                  </div>
                </div>
                <div class="accordion-item">
                  <button id="accordion-button-6" aria-expanded="false"><span class="accordion-title">   If I don’t like the platform, can I unsubscribe it ?</span><span class="icon" aria-hidden="true"></span></button>
                  <div class="accordion-content">
                    <p>Yes, you can unsubscribe it any time if you don’t like it.</p>
                  </div>
                </div>
              </div>
        </div>

        </div>

    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\gamebaksho\resources\views/frontend/pages/faq.blade.php ENDPATH**/ ?>