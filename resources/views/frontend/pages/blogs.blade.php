@extends('frontend.layouts.web')
@section('frontend_header')
    <meta property="og:title" content="Blogs | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:description" content="Blogs | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="Blogs | Play Online Games on Xoss Games - Your Ultimate Gaming Destination" />
    <meta name="description"
        content="Looking for a thrilling gaming experience? Xoss Games offers a wide range of online games to play for free. Get ready for hours of fun and excitement on our gaming platform!" />
    <meta name="keywords"
        content="Online games, Play games online,Free online games,Xoss games	,Best online games,Play free online games,Multiplayer games,Play online games for free,Online shooting games,Online,puzzle games,Play free games online,Play online multiplayer games ,Online action games	,Best free online games,Online adventure games,Online strategy games, Play online action games" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>Blogs | Enjoy a Wide Range of Online Games on Xoss Games</title>
@endsection
@section('content')
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
                    @foreach ($blogs as $blog)
                        <div class="col-xxl-4 col-xl-4 col-md-6">
                            <a href="{{ route('single_blogs', $blog->slug) }}">
                                <div class="blog_card">
                                    <div class="blog_img">
                                        <img src="{{ asset('uploads/Blogs/thumbnail/'.$blog->thumbnail) }}"
                                            alt="" class="img-fluid">
                                    </div>
                                    <div class="blog_body">
                                        <h2> {{ strip_tags(Str::limit($blog->title , 50)) }}</h2>
                                        <p>{{ strip_tags(Str::limit($blog->sub_title , 65)) }}</p>
                                        <div class="blog_date">
                                            <span><i class="fa-regular fa-calendar-days"></i> <span>
                                                @php
                                                    $stringDate = $blog->created_at->format('Y-m-d'); // Your string date
                                                    $date = \Carbon\Carbon::parse($stringDate);
                                                    echo $formattedDate = $date->format('j F, Y');
                                                @endphp
                                            </span>
                                        </div>
                                        <button class="readmore">
                                            <a href="{{ route('single_blogs', $blog->slug) }}"><span><i class="fa-solid fa-arrow-right-long"></i></span> </a>
                                        </button>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- --------------------------BLOGS end-------------------- -->
@endsection
