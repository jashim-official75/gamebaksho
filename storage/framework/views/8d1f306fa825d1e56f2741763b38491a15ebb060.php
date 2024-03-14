
<?php $__env->startSection('frontend_header'); ?>
    <meta property="og:title" content="Blogs | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:description" content="Blogs | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="<?php echo e(url()->current()); ?>">
    <meta name="title" content="Blogs | Play Online Games on Xoss Games - Your Ultimate Gaming Destination" />
    <meta name="description"
        content="Looking for a thrilling gaming experience? Xoss Games offers a wide range of online games to play for free. Get ready for hours of fun and excitement on our gaming platform!" />
    <meta name="keywords"
        content="Online games, Play games online,Free online games,Xoss games	,Best online games,Play free online games,Multiplayer games,Play online games for free,Online shooting games,Online,puzzle games,Play free games online,Play online multiplayer games ,Online action games	,Best free online games,Online adventure games,Online strategy games, Play online action games" />
    <link rel="canonical" href="<?php echo e(url()->current()); ?>" />
    <title>Blogs | Enjoy a Wide Range of Online Games on Xoss Games</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- --------------------------BLOGS start-------------------- -->
    <header>
    </header>
    <section id="blog_page">
        <div class="d-flex blog_inner">
            <div class="col-md-12 heading_content">
                <h1>There has new update of Xoss Games</h1>
                <h2>Explore us to know about more</h2>
            </div>
            <div class="container">
                <div class="row">
                    <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-xxl-4 col-xl-4 col-md-6">
                            <a href="<?php echo e(route('single_blogs', $blog->slug)); ?>">
                                <div class="blog_card">
                                    <div class="blog_img">
                                        <img src="<?php echo e(asset('uploads/Blogs/thumbnail/'.$blog->thumbnail)); ?>"
                                            alt="" class="img-fluid">
                                    </div>
                                    <div class="blog_body">
                                        <h2> <?php echo e(strip_tags(Str::limit($blog->title , 50))); ?></h2>
                                        <p><?php echo e(strip_tags(Str::limit($blog->sub_title , 65))); ?></p>
                                        <div class="blog_date">
                                            <span><i class="fa-regular fa-calendar-days"></i> <span>
                                                <?php
                                                    $stringDate = $blog->created_at->format('Y-m-d'); // Your string date
                                                    $date = \Carbon\Carbon::parse($stringDate);
                                                    echo $formattedDate = $date->format('j F, Y');
                                                ?>
                                            </span>
                                        </div>
                                        <button class="readmore">
                                            <a href="<?php echo e(route('single_blogs', $blog->slug)); ?>"><span><i class="fa-solid fa-arrow-right-long"></i></span> </a>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>
    <!-- --------------------------BLOGS end-------------------- -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.web', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\gamebaksho\resources\views/frontend/pages/blogs.blade.php ENDPATH**/ ?>