<?php $__env->startSection('frontend_header'); ?>
    <meta property="og:title" content="Support | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:description" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta name="title" content="Support | Play Online Games on Xoss Games - Your Ultimate Gaming Destination" />
    <meta name="description" content="Looking for a thrilling gaming experience? Xoss Games offers a wide range of online games to play for free. Get ready for hours of fun and excitement on our gaming platform!" />
    <meta name="keywords" content="Online games, Play games online,Free online games,Xoss games	,Best online games,Play free online games,Multiplayer games,Play online games for free,Online shooting games,Online,puzzle games,Play free games online,Play online multiplayer games ,Online action games	,Best free online games,Online adventure games,Online strategy games, Play online action games" />
    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />
    <title>Support | Enjoy a Wide Range of Online Games on Xoss Games</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- SUPPORT HEADER PART START -->
    <header id="support_header">
        <div class="support_text">
            <h1>We are here for you</h1>
            <p>We provides you technical support in 24/7</p>
            <a href="#support_contact" class="support_btn">Contact Us</a>
        </div>
    </header>
    <!-- SUPPORT HEADER PART END -->

    <!-- SUPPORT FORM PART START -->
    <section id="support_contact">
        <div class="container">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-md-6">
                    <div class="support_form">
                        <h2>Need Support?</h2>
                        <h3>Get Answers to Common Questions & Issues</h3>
                        <form action="<?php echo e(route('support.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="inputBx">
                                <label for="fullname">Full Name</label>
                                <input type="text" placeholder="Full Name" name="fullname" id="fullname">
                                <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="inputBx">
                                <label for="phonenumber">Phone Number</label>
                                <input type="text" placeholder="Phone Number" name="phonenumber" id="phonenumber">
                            </div>

                            <div class="inputBx">
                                <label for="phonenumber">Email</label>
                                <input type="text" placeholder="Email" name="email" id="email">
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <label for="reason">Choose Reason</label>
                            <div class="select">
                                <select id="reason" name="reason">
                                    <option value="Option 0" disabled selected>Choose Reason</option>
                                    <option value="1" id="reg_num">Login Problem</option>
                                    <option value="2" id="subsc_num">Subscription Problem</option>
                                    <option value="3">Other's</option>
                                </select>
                                <span class="focus"></span>
                                <?php $__errorArgs = ['reason'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="inputBx" id="subscribed_number">
                                <label for="phonenumber">Subscribed Number</label>
                                <input type="text" placeholder="Subscribed Number" name="sub_number" id="phonenumber">
                            </div>

                            <div class="inputBx" id="registration_number">
                                <label for="phonenumber">Subscription Number</label>
                                <input type="text" placeholder="Subscription Number" name="regis_number" id="phonenumber">
                            </div>

                            <label for="Your Message">Your Message</label>
                            <textarea name="message" id="message" placeholder="Your Message"></textarea>

                            <input type="submit" value="Send" class="support_btn" id="send_btn">

                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="support_info">
                        <h1 class="text-center mt-5">Emergency Contact</h1>
                        <img src="<?php echo e(asset('assets/frontend/img/supoort-illustration.webp')); ?>" alt="">
                        <div class="support_contact">

                            <ul>
                                <li><a href="tel:+8801715855974">
                                        <div class="icon"><i class="fa-solid fa-headphones"></i></div>+880 1715-855974
                                    </a></li>
                                <li><a href="mailto:support@playtoony.com">
                                        <div class="icon"><i class="fa-regular fa-envelope-open"></i></div>
                                        support@playtoony.com
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- SUPPORT FORM PART END -->

    <div id="fb-root"></div>

    <!-- Your Chat plugin code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "101498069190218");
        chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v16.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('pageJS'); ?>
    <script>
        $('#subscribed_number').hide();
        $('#registration_number').hide();

        $('document').ready(function() {
            $("#reason").change(function() {
                var reg_num = $(this).val();
                if (reg_num == 1) {
                    $('#registration_number').show();
                } else {
                    $('#registration_number').hide();
                }
            });

            $("#reason").change(function() {
                var subsc_num = $(this).val();
                if (subsc_num == 2) {
                    $('#subscribed_number').show();
                } else {
                    $('#subscribed_number').hide();
                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/customer/www/playtoony.com/public_html/resources/views/frontend/pages/support.blade.php ENDPATH**/ ?>