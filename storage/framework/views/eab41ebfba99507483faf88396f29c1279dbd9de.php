<!-- ------------------------- Footer Section start ---------------------- -->
<section class="footer d-none d-sm-block mt-5 py-5">
    <div class="container footer_wrapper">
        <div class="row">
            <div class="col-md-2 col-0"></div>
            <div class="col-3 footer__information col-md-3 col-lg-2">
                <h4 class="footer__information__title">Game Baksho</h4>
                <ul class="list-unstyled">

                    <?php if(Auth::guard('subscriber')->check() && $subscribed): ?>
                        <li class="list-item">
                        <a href="#" data-toggle="modal" data-target="#profile_pop"><span class="footer_icon"><i class="fa-solid fa-angles-right"></i></span> Profile</a>
                        </li>
                        <?php endif; ?>
                    <?php if(!$subscribed): ?>
                        <li class="list-item">
                            
                            <a href="#"><span class="footer_icon"><i class="fa-solid fa-angles-right"></i></span> Subscribe Package</a>
                        </li>
                    <?php endif; ?>

                    <li class="list-item"><a href="<?php echo e(route('aboutUs')); ?>"><span class="footer_icon"><i class="fa-solid fa-angles-right"></i></span> About Us</a></li>
                    <li class="list-item"><a href="<?php echo e(route('blogs')); ?>"><span class="footer_icon"><i class="fa-solid fa-angles-right"></i></span> Blogs</a></li>
                    <li class="list-item"><a href="<?php echo e(route('support')); ?>"><span class="footer_icon"><i class="fa-solid fa-angles-right"></i></span> Support</a></li>
                    <li class="list-itme"> <a href="https://play.google.com/store/apps/details?id=com.naptechlabs.xoss.games" target="_blank"> <img src="<?php echo e(asset('assets/frontend/img/get_app.png')); ?>" alt="xosss games app"></a></li>
                </ul>
            </div>
            <div class="col-md-1 col-0"></div>
            <div class="col-5 col-md-3 footer__information">
                <h4 class="footer__information__title">Informations</h4>
                <ul class="list-unstyled">
                    <li class="list-item"><a href="<?php echo e(route('terms.condition')); ?>"><span class="footer_icon"><i class="fa-solid fa-angles-right"></i></span> Terms and Conditions</a></li>
                    <li class="list-item"><a href="<?php echo e(route('privacy')); ?>"><span class="footer_icon"><i class="fa-solid fa-angles-right"></i></span> Privacy Policy</a></li>
                    <li class="list-item"><a href="<?php echo e(route('faq')); ?>"><span class="footer_icon"><i class="fa-solid fa-angles-right"></i></span> FAQ</a></li>
                    <li class="list-item"><a href="<?php echo e(route('contact')); ?>"><span class="footer_icon"><i class="fa-solid fa-angles-right"></i></span> Contact Us</a></li>
                </ul>
            </div>

            <div class="col-5 col-md-3 footer__information">
                <h4 class="footer__information__title">Follow Us</h4>
                <ul class="list-unstyled">
                    <li class="list-item"><a href="#" target="_blank"> <span class="footer_icon"><i class="fa-brands fa-facebook"></i></span> Facebook</a></li>
                    <li class="list-item"><a href="#" target="_blank"> <span class="footer_icon"><i class="fa-brands fa-square-youtube"></i></span> Youtube</a></li>
                    <li class="list-item"><a href="#" target="_blank"> <span class="footer_icon"><i class="fa-brands fa-linkedin"></i></span> Linkedin</a></li>
                    <li class="list-item"><a href="#" target="_blank"> <span class="footer_icon"><i class="fa-brands fa-square-instagram"></i></span> Instagram</a></li>
                    <li class="list-item"><a href="#" target="_blank"> <span class="footer_icon"><i class="fa-brands fa-square-twitter"></i></span> Twitter</a></li>
                </ul>
            </div>
            
            <div class="col-md-2 col-0"></div>
        </div>
        <div class="row footer__border">
            <div class="col-4 col-md-2"></div>
            <div class="col-md-8 col-12 d-flex justify-content-center align-items-center mb-0 footer__end__body ">
                <p class="copyRight">Copyright &copy; 2023 , <a href="https://naptechlabs.com/" target="_blank">NapTech
                        Labs</a>. All Rights Reserved. </p>
                <!--  <form action="" class="footer__form">
            <div class="lng__icon">
              <img src="<?php echo e(asset('assets/frontend/img/Group 1049.png')); ?>" alt="" />
            </div>
            <select name="langueg" class="lng__selection">
              <option value="English">English</option>
              <option value="Bangla">Bangla</option>
            </select>
          </form> -->
            </div>
            <div class="col-1"></div>
        </div>
    </div>
</section>
<div class="mobile_footer">
    <p class="copyRight">&copy; 2023 , <a href="https://naptechlabs.com/" target="_blank">NapTech Labs</a>. All Rights
        Reserved. </p>
</div>
<!-- ------------------------- footer Section End ---------------------- -->
<?php /**PATH D:\laragon\www\gamebaksho\resources\views/frontend/inc/footer.blade.php ENDPATH**/ ?>