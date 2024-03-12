<?php $__env->startSection('frontend_header'); ?>
    <meta property="og:title" content="Contact Us | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:description" content="Contact Us | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta name="title" content="Contact Us | Play Online Games on Xoss Games - Your Ultimate Gaming Destination" />
    <meta name="description" content="Looking for a thrilling gaming experience? Xoss Games offers a wide range of online games to play for free. Get ready for hours of fun and excitement on our gaming platform!" />
    <meta name="keywords" content="Online games, Play games online,Free online games,Xoss games	,Best online games,Play free online games,Multiplayer games,Play online games for free,Online shooting games,Online,puzzle games,Play free games online,Play online multiplayer games ,Online action games	,Best free online games,Online adventure games,Online strategy games, Play online action games" />
    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />
    <title>Contact Us | Enjoy a Wide Range of Online Games on Xoss Games</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageCSS'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageJS'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- --------------------------bannar start ---------------------- -->
    <section class="bannar sm-hide">
       <div class="bannar__body bannar__body--bg">
                <div class="bannar__body__text">
                    <h3 class="bannar__body__text__title">
                      <!--  <a href="" class="text-decoration-none">Xoss Games</a> -->
                    </h3>
                </div>
            </div>
            <div class="d-block d-sm-none row">
                <div class="sm__bannar col-12">
                    <div class="sm__bannar__icon">
                        <img src="<?php echo e(asset('assets/frontend/img/game-control 1.png')); ?>" width="100%" alt="" />
                    </div>
                  <!--  <h3 class="sm__bannar__title">Xoss Games</h3> -->
                </div>
            </div>
    </section>
    <!-- --------------------------bannar end ------------------------ -->
    <!---------------------- about us content section start ------------->
    <section class="about_us mostPopular">
        <div class="container">
            <div class="contact_us__position">
                <div class="mostPopular__title mb-3 mb-md-5 ms-5 ">
                    <h2 class="about_us__title__text">
                        Contact Us
                        <span><img src="<?php echo e(asset('assets/frontend/img/arrow.png')); ?>" alt="" /></span>
                    </h2>
                </div>
                <div class="contact_us__inpute__body">
                    <div class="contact_us__title">
                        <div class="contact_us__title__item m ">
                            <!-- <div class=" contact_us__title__item__icon ">

                                <img src="<?php echo e(asset('assets/frontend/img/call-icon.png')); ?>" width="100%" />
                            </div>
                           <div class="contact_us__title__item__text ">
                                <h5>Call Us</h5>
                                <h5>+880174******92</h5> -->
                            </div>
                        </div>
                        <div class="contact_us__title__item ">
                            <div class=" contact_us__title__item__icon ">
                                <img src="<?php echo e(asset('assets/frontend/img/email-icon.png')); ?>" width="100%" alt=""> 
                            </div>
                            <div class="contact_us__title__item__text">
                                <h5>Email Us</h5>
                            </div>
                        </div>
                        <form class="contact_us__inpute__body__form" method="POST" action="<?php echo e(route('contact.store')); ?>">
                            <?php echo csrf_field(); ?>
                            <div class="contact_us__inpute__body__form__item">
                                <input type="text" name="name" placeholder="Your Name">
                            </div>
                            <div class="contact_us__inpute__body__form__item">
                                <input class="placeholder--color" type="email" name="email"
                                    placeholder="Your Email Address">
                            </div>
                            <div class="form-group contact_us__inpute__body__form__item">
                                <textarea class="form-control" placeholder="Write Somthing" name="comment" id="exampleFormControlTextarea1" rows="4"></textarea>
                            </div>
                            <button class="contact_us__inpute__body__form__btn btn__hover">Send</button>
                        </form>
                    </div>
                </div>
            </div>
    </section>
    <!------------------------ about us content section end --------------->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/playtoony.com/public_html/resources/views/frontend/pages/contact.blade.php ENDPATH**/ ?>