@extends('frontend.layouts.promotion.app')
@section('frontend_promotion_header')
    <meta property="og:title" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:description" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="https://xoss.games/">
    <meta name="title" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games" />
    <meta name="description" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games" />
    <meta name="keywords" content="xoss games, games, online game, action game" />
    <link rel="canonical" href="https://xoss.games" />
    <title>Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games</title>
@endsection
@section('promotion_content')
    <!-- --------------------------bannar start ---------------------- -->
    <header class="bannar" id="square_animation">
        <div class="bannar__body">
            <div class="bannar__body__text container  ">
                <h1 id="bounceText">
                    <span>X</span>
                    <span class="eyes">O</span>
                    <span>S</span>
                    <span>S</span>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                    <span>G</span>
                    <span>A</span>
                    <span>M</span>
                    <span>E</span>
                    <span>S</span>
                </h1>
                <p class="bannar__body__text__description slide-top">
                    Play all exciting games in one subscription
                </p>
                <p class="bannar__body__text__description slide-top">Weekly Package</p>
                <div class="bannar__body__btn shake" id="interact_btn">
                    <a href="{{ route('clickadilla.weekly') }}"> <button class="btn__hover pulse">Subscribe
                            Now</button></a>
                </div>
            </div>
        </div>
    </header>
    <!-- --------------------------bannar end ------------------------ -->
    <!-- --------------------------subscribe for all game/mostPopular start ----->
    <section class="mostPopular lock" id="allGame">
        <div class="container">
            <div class="mostPopular__title mb-3 mb-md-5">
                <h3
                    class="mostPopular__title__text mostPopular__title__text--font-width mostPopular__title__text--font-size">
                    Subscribe <span>to Play</span>
                </h3>
                <h3 class="mostPopular__title__text mostPopular__title__text--font-size mt-5">
                    All Games
                </h3>
                <p class="subheading_common">From puzzles to action, adventure to sports, we offer a vast collection of
                    online games for all ages</p>
            </div>
            <div class="card__wrapper row justify-content-center">
                @foreach ($notFreeGames as $game)
                    <div class=" col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0">
                        <a href="{{ route('clickadilla.weekly') }}">
                            <div class="card card__body">
                                <!-- <div class="premium_badge">Premium <span class="premium_icon"><i class="fa-solid fa-crown"></i></span> </div>-->
                                <img src="{{ asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail) }}"class="card-img-top card__img"
                                    width="100%" alt="{{ $game->game_thumbnail }}" />
                                <div class="card-body card__text__body">
                                    <h5 class="card-title card__text">{{ Str::limit($game->game_name, 17, '...') }}</h5>
                                </div>
                                @if (!$subscribed)
                                    <span class="badge"> <span class="star"><i class="fa-solid fa-crown"></i></span>
                                @endif
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
