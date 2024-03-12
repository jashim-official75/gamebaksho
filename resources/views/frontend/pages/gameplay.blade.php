@extends('frontend.layouts.web')

@section('frontend_header')
    <meta property="og:title" content="{{ $game->meta_title }}">
    <meta property="og:description" content="{{ $game->meta_description }}">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="{{ $game->meta_title }}" />
    <meta name="description" content="{{ $game->meta_description }}" />
    <meta name="keywords" content="{{ $game->meta_keyword }}" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>{{ $game->meta_title }}</title>
@endsection

@section('content')
    <!-- ---------------------------play btn section start------------------ -->
    <section class="plybtn pt-5" id="gamePlay">
        <div class="container">
            <div class="iframe__body">
                <iframe src="{{ route('deskGame', $game->game_file) }}" width="100%" class="iframe__body__iframe"
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

    <!-- --------------------------Related Games start-------------------- -->
    {{-- <section class="mostPopular">
        <div class="container">
            <div class="mostPopular__title mb-3 mb-md-5">
                <h3 class="mostPopular__title__text mostPopular__title__text--font-size">
                    Related Games
                </h3>
            </div>
            <div class="card__wrapper row">


                @foreach ($relatedGames->take(4) as $relatedGame)
                    @if ($relatedGame->gameName->is_free)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-0">
                            <a href="{{ route('free.game', $relatedGame->gameName->game_file) }}">
                                <div class="card card__body">
                                    <img src="{{ asset('assets/frontend/images/uploads/games_img/' . $relatedGame->gameName->game_thumbnail) }}"
                                        class="card-img-top card__img" width="100%"
                                        alt="{{ $relatedGame->gameName->game_name }}" />
                                    <div class="card-body card__text__body">
                                        <h5 class="card-title card__text">
                                            {{ Str::limit($relatedGame->gameName->game_name, 17, '...') }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-0">
                            <a
                                @if ($isMobile && !$subscribed) href="{{ route('user.packages') }}"
                        @elseif(!$subscribed)
                          data-toggle="modal" data-target="#subscription_pop"
                        @else
                          href="{{ route('game', $relatedGame->gameName->game_file) }}" @endif>
                                <div class="card card__body">
                                    <img src="{{ asset('assets/frontend/images/uploads/games_img/' . $relatedGame->gameName->game_thumbnail) }}"
                                        class="card-img-top card__img" width="100%"
                                        alt="{{ $relatedGame->gameName->game_name }}" />
                                    <div class="card-body card__text__body">
                                        <h5 class="card-title card__text">
                                            {{ Str::limit($relatedGame->gameName->game_name, 17, '...') }}</h5>
                                    </div>
                                    @if (!$subscribed)
                                        <span class="badge"> <span class="star"><i class="fa-solid fa-crown"></i></span>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </section> --}}
    <!-- --------------------------mostPopular end-------------------- -->
@endsection
