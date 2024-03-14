<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img">
                <a href="<?php echo e(route('home')); ?>" target="_blank">
                    
                    <h4>GameBaksho</h4>

                </a>
            </div>
            <!-- User profile text-->
            <div class="profile-text">
                <h5><?php echo e(auth()->user()->name); ?></h5> 
                
                <a href="<?php echo e(route('admin.logout')); ?>" class="" data-toggle="tooltip" title="Logout"><i
                        class="mdi mdi-power"></i></a>

            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <!---Viewer Dasboard  ---->
                <?php if(auth()->user()->Role->slug == 'viewer'): ?>
                    <!---Dashboard start----->
                    <li class="nav-small-cap">ANALYTICS</li>
                    <li> <a class="waves-effect waves-dark" href="<?php echo e(route('dashboard')); ?>" aria-expanded="false"><i
                                class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                    </li>
                    <!---Dashboard end----->

                    <!---SUBSCRIBERS ---->
                    <li class=""><a href="#"><i
                                class="mdi mdi-gamepad-variant"></i><span>SUBSCRIBERS</span>&nbsp;&nbsp;&nbsp;<i
                                class="mdi mdi-chevron-down"></i></a>
                        <ul>
                            <li> <a class="waves-effect waves-dark" href="<?php echo e(route('admin.subscriber')); ?>"
                                    aria-expanded="false"><i class="mdi mdi-book-multiple"></i>&nbsp;&nbsp;<span
                                        class="hide-menu">Subscribers </span></a>
                            </li>

                            <li> <a class="waves-effect waves-dark" href="<?php echo e(route('admin.users')); ?>"
                                    aria-expanded="false"><i class="mdi mdi-book-multiple"></i>&nbsp;&nbsp;<span
                                        class="hide-menu">Users
                                    </span></a>
                            </li>
                        </ul>
                    </li>
                    <!---SUBSCRIBERS---->
                <?php endif; ?>
                <!---Viewer Dasboard  end---->

                <!---Admin Dashboard Sidebar---->
                <?php if(auth()->user()->Role->slug == 'admin'): ?>
                    <!---Dashboard start----->
                    <li class="nav-small-cap">ANALYTICS</li>
                    <li> <a class="waves-effect waves-dark" href="<?php echo e(route('dashboard')); ?>" aria-expanded="false"><i
                                class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard </span></a>
                    </li>
                    <!---Dashboard end----->

                    <!---games start----->
                    <li class=""><a href="#"><i
                                class="mdi mdi-gamepad-variant"></i><span>GAMES</span>&nbsp;&nbsp;&nbsp;<i
                                class="mdi mdi-chevron-down"></i></a>
                        <ul>
                            <li> <a class="waves-effect waves-dark" href="<?php echo e(route('games.index')); ?>"
                                    aria-expanded="false"><i class="mdi mdi-gamepad-variant"></i>&nbsp;&nbsp;<span
                                        class="hide-menu">Games
                                    </span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="<?php echo e(route('games.create')); ?>"
                                    aria-expanded="false"><i class="mdi mdi-plus"></i>&nbsp;&nbsp;<span
                                        class="hide-menu">Add New Game
                                    </span></a>
                            </li>
                            <li> <a class="waves-effect waves-dark" href="<?php echo e(route('category.index')); ?>"
                                    aria-expanded="false"><i class="mdi mdi-widgets"></i>&nbsp;&nbsp;<span
                                        class="hide-menu">Add
                                        Category
                                    </span></a>
                            </li>
                        </ul>
                    </li>

                    <!---games start----->

                    <!---bloogs start----->
                    <li> <a class="waves-effect waves-dark" href="<?php echo e(route('admin.blogs')); ?>" aria-expanded="false"><i
                                class="mdi mdi-gauge"></i><span class="hide-menu">Blogs </span></a>
                    </li>
                    <!---blogs end----->

                    <!---SUBSCRIBERS ---->
                    <li class=""><a href="#"><i
                                class="mdi mdi-gamepad-variant"></i><span>SUBSCRIBERS</span>&nbsp;&nbsp;&nbsp;<i
                                class="mdi mdi-chevron-down"></i></a>
                        <ul>
                            <li> <a class="waves-effect waves-dark" href="<?php echo e(route('admin.subscriber')); ?>"
                                    aria-expanded="false"><i class="mdi mdi-book-multiple"></i>&nbsp;&nbsp;<span
                                        class="hide-menu">Subscribers </span></a>
                            </li>

                            <li> <a class="waves-effect waves-dark" href="<?php echo e(route('admin.users')); ?>"
                                    aria-expanded="false"><i class="mdi mdi-book-multiple"></i>&nbsp;&nbsp;<span
                                        class="hide-menu">Users
                                    </span></a>
                            </li>
                        </ul>
                    </li>
                    <!---SUBSCRIBERS---->

                    <!---administrator start----->
                    <li class=""><a href="#"><i
                                class="mdi mdi-account-alert"></i><span>Administrator</span>&nbsp;&nbsp;&nbsp;<i
                                class="mdi mdi-chevron-down"></i></a>
                        <ul>
                            <li> <a class="waves-effect waves-dark" href="<?php echo e(route('role.index')); ?>"
                                    aria-expanded="false"><i class="mdi mdi-clipboard-account"></i>&nbsp;&nbsp;<span
                                        class="hide-menu">Role</span></a>
                            </li>

                            <li> <a class="waves-effect waves-dark" href="<?php echo e(route('admin.register')); ?>"
                                    aria-expanded="false"><i class="mdi mdi-clipboard-account"></i>&nbsp;&nbsp;<span
                                        class="hide-menu">AdminUser</span></a>
                            </li>
                        </ul>
                    </li>

                    <!---administrator start----->

                    <!---SUPPORT CENTER start----->
                    <li class=""><a href="#"><i class="mdi mdi-account-alert"></i><span>SUPPORT
                                CENTER</span>&nbsp;&nbsp;&nbsp;<i class="mdi mdi-chevron-down"></i></a>
                        <ul>
                            <li> <a class="waves-effect waves-dark" href="<?php echo e(route('admin.support.index')); ?>"
                                    aria-expanded="false"><i class="mdi mdi-book-multiple"></i>&nbsp;&nbsp;<span
                                        class="hide-menu">Support</span></a>
                            </li>

                            <li> <a class="waves-effect waves-dark" href="<?php echo e(route('admin.support')); ?>"
                                    aria-expanded="false"><i class="mdi mdi-book-multiple"></i>&nbsp;&nbsp;<span
                                        class="hide-menu">Contact Us</span></a>
                            </li>
                            
                        </ul>
                    </li>
                    <!---SUPPORT CENTER end----->

                    <!---Traffic start ---->
                    <li class=""><a href="#"><i
                                class="mdi mdi-gamepad-variant"></i><span>Traffics</span>&nbsp;&nbsp;&nbsp;<i
                                class="mdi mdi-chevron-down"></i></a>
                        <ul>
                            <li> <a class="waves-effect waves-dark" href="<?php echo e(route('admin.traffic.index')); ?>"
                                    aria-expanded="false"><i class="mdi mdi-book-multiple"></i>&nbsp;&nbsp;<span
                                        class="hide-menu">Total Traffic </span></a>
                            </li>

                            <li> <a class="waves-effect waves-dark" href="<?php echo e(route('admin.traffic.other')); ?>"
                                    aria-expanded="false"><i class="mdi mdi-book-multiple"></i>&nbsp;&nbsp;<span
                                        class="hide-menu">Others Traffic
                                    </span></a>
                            </li>
                        </ul>
                    </li>
                    <!---Traffic End---->
                    
                <?php endif; ?>
                <!---Admin Dashboard Sidebar end---->

            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<?php /**PATH D:\laragon\www\gamebaksho\resources\views/backend/layouts/sidebar.blade.php ENDPATH**/ ?>