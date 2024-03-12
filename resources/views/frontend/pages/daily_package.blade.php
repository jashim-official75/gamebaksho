@extends('frontend.layouts.web')
@section('frontend_header')
    <meta property="og:title" content="Enjoy a Wide Range of Online Games on Xoss Games | Daily Packages">
    <meta property="og:description" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="Play Online Games on Xoss Games - Your Ultimate Gaming Destination" />
    <meta name="description"
        content="Looking for a thrilling gaming experience? Xoss Games offers a wide range of online games to play for free. Get ready for hours of fun and excitement on our gaming platform!" />
    <meta name="keywords"
        content="Online games, Play games online,Free online games,Xoss games	,Best online games,Play free online games,Multiplayer games,Play online games for free,Online shooting games,Online,puzzle games,Play free games online,Play online multiplayer games ,Online action games	,Best free online games,Online adventure games,Online strategy games, Play online action games" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>Enjoy a Wide Range of Online Games on Xoss Games | Daily package</title>
@endsection

@section('content')
    <section id="subscriptionMobile">
        <div>
            <div class="header_title">
                <div>Xoss Games</div>
                <span>Subspription Plan</span>
            </div>

             <!-- The popup message -->
            <div class="popup-container">
                <div id="popup" class="custom_popup">
                    <div class="popup_inner">
                        <div class="popup_info_icon">
                            <i class="fa-solid fa-info"></i>
                        </div>
                        <div class="popup_info_text">
                            <h1>Subscribe to Play</h1>
                            <p>Join now to access all of Xoss Games' exclusive games.</p>
                        </div>
                        <a href="#" onclick="hidePopup()" class="hide_icon">
                            <i class="fa-solid fa-circle-xmark"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="choose_plan">
                <div class="tab-content">
                    <div class="tab-pane active" id="tabs-1" role="tabpanel">
                        <div class="plan_card p-5">
                            <section>
                                <h5>Daily</h5>
                                <small>3tk/-</small>
                                <div class="package">
                                    <div>
                                        <label for=""></label>
                                        <span>1 day</span>
                                    </div>
                                    <div>
                                        <label for=""></label>
                                        <span>All Game Access</span>
                                    </div>
                                    <div>
                                        <label for=""></label>
                                        <span>Auto Renewal</span>
                                    </div>
                                </div>
                                <a href="{{ route('package.prepare', 'daily') }}"><button class="mt-4">Subscribe
                                        Now</button></a>
                            </section>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="mostPopular lock" id="allGame">
        <div class="container">
            <div class="mostPopular__title my-2 mb-md-5">
                <h3 class="mostPopular__title__text mostPopular__title__text--font-size mt-0">
                    Our Games
                </h3>
            </div>
            <div class="card__wrapper row justify-content-center">
                @foreach ($games as $game)
                    <div class=" col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0" onclick="showPopup()">
                        <a href="#subscriptionMobile">
                            <div class="card card__body">
                                <img src="{{ asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail) }}"
                                    class="card-img-top card__img" width="100%" alt="" />
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


@section('pageJS')
    <script>
        // JavaScript functions to show and hide the popup
        // JavaScript functions to show and hide the popup
        function showPopup() {
            var popup = document.querySelector(".popup_inner");
            popup.classList.add("active");
            var popupContainer = document.querySelector(".popup-container");
            popupContainer.classList.toggle("toggle");
        }

        function hidePopup() {
            var popup = document.querySelector(".popup_inner");
            popup.classList.remove("active");
            var popupContainer = document.querySelector(".popup-container");
            popupContainer.classList.toggle("toggle");
        }
    </script>
@endsection
