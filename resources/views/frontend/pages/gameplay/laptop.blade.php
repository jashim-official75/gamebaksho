@extends('frontend.layouts.web')
@section('frontend_header')
    <meta property="og:title" content="{{ $game->meta_title }}">
    <meta property="og:description" content="{{ $game->meta_description }}">
    <meta property="og:image" content="{{ asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail) }}" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="{{ $game->meta_title }}" />
    <meta name="description" content="{{ $game->meta_description }}" />
    <meta name="keywords" content="{{ $game->meta_keyword }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>Playtoony | Enjoy a Wide Range of Online Games on {{ $game->game_name }}</title>
@endsection


@section('content')
    <!-- ---------------------------play btn section start------------------ -->
    <section class="plybtn pt-5" id="gamePlay">
        <div class="container">
            <div class="iframe__body">
                <iframe src="{{ asset('AllGames/' .$game->game_file) }}" width="100%" class="iframe__body__iframe"
                    id="myvideo" frameborder="0"></iframe>
                <div class="iframe__body__t">
                    <h3 class="iframe__body__t__title">{{ $game->game_name }}</h3>
                    <div class="iframe__body__t__description">
                        {{-- <p>
                            <a href=""> shoot </a><img src="{{ asset('assets/frontend/img/ifrem-left-arrow.png') }}"
                                alt="" /><a href="">
                                Win </a><img src="{{ asset('assets/frontend/img/ifrem-left-arrow.png') }}" alt="" />
                            <a href=""> Crash </a><img src="{{ asset('assets/frontend/img/ifrem-left-arrow.png') }}"
                                alt="" />
                        </p> --}}
                        <span onclick="openFullscreen()">Maximize &nbsp; <img
                                src="{{ asset('assets/frontend/img/maximize.png') }}" width=""
                                alt="" /></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ---------------------------play btn section end------------------ -->
    <!-- --------------------------Game Description section start ----------->
    <section id="game__description" class="mostPopular">
        <div class="container">
            <div class="game__description__body">
                <h3 class="game__description__body__title">Game Description</h3>
                <p class="game__description__body__text">
                    {{ $game->game_description }}
                </p>
            </div>
        </div>
    </section>
    <!---------------------------- Game Description section end ------------->
@endsection
