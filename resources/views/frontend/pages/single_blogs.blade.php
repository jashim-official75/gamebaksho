@extends('frontend.layouts.web')
@section('frontend_header')
    <meta property="og:title" content="{{ $blog->meta_title }}">
    <meta property="og:description" content="{{ $blog->meta_description }}">
    <meta property="og:image" content="{{ asset('uploads/Blogs/thumbnail/' . $blog->thumbnail) }}" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="{{ $blog->meta_title }}" />
    <meta name="description" content="{{ $blog->meta_description }}" />
    <meta name="keywords" content="{{ $blog->meta_keyword }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>{{ $blog->title }}</title>
@endsection
@section('content')
    <!-- --------------------------SINGLE BLOGS START-------------------- -->
    <section id="single_blog_post">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xxl-8 col-xl-8 col-lg-12">
                    <div class="single_blog-post">
                        <main>
                            <article>
                                <div class="single-blog_header">
                                    <img src="{{ asset('uploads/Blogs/banner/' . $blog->banner) }}" alt="">
                                </div>
                                <div class="post_description">
                                    {!! $blog->description !!}
                                </div>
                            </article>
                        </main>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-12">
                    <div class="related_blogs">
                        <h1 class="title">Related Blogs</h1>
                        <div class="row">
                            @foreach ($related_blogs as $related_blog)
                                <div class="col-xxl-12 col-xl-12 col-lg-6 col-md-6">
                                    <a href="#">
                                        <div class="related_card">
                                            <div class="imgBx">
                                                <img src="{{ asset('uploads/Blogs/thumbnail/'.$related_blog->thumbnail) }}" alt="">
                                            </div>
                                            <div class="content">
                                                <h2>{{ strip_tags(Str::limit($related_blog->title , 40)) }}</h2>
                                                <p>{{ strip_tags(Str::limit($related_blog->sub_title , 50)) }}</p>
                                                <span> Date : @php
                                                  $stringDate = $related_blog->created_at->format('Y-m-d'); // Your string date
                                                  $date = \Carbon\Carbon::parse($stringDate);
                                                  echo $formattedDate = $date->format('j F, Y');
                                              @endphp </span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- --------------------------SINGLE BLOGS END-------------------- -->
@endsection
