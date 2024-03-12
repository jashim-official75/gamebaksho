@extends('frontend.layouts.web')

@section('frontend_header')
    <meta property="og:title" content="Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:description" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="Play Online Games on Xoss Games - Your Ultimate Gaming Destination" />
    <meta name="description" content="Looking for a thrilling gaming experience? Xoss Games offers a wide range of online games to play for free. Get ready for hours of fun and excitement on our gaming platform!" />
    <meta name="keywords" content="Online games, Play games online,Free online games,Xoss games	,Best online games,Play free online games,Multiplayer games,Play online games for free,Online shooting games,Online,puzzle games,Play free games online,Play online multiplayer games ,Online action games	,Best free online games,Online adventure games,Online strategy games, Play online action games" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>Enjoy a Wide Range of Online Games on Xoss Games | Games</title>
@endsection


@section('content')
  
    <!-- --------------------------mostPopular start-------------------- -->
    <section class="search_games" >
        <div class="container">
            <div class="card__wrapper mt-5  row">
                @forelse ($games as $game)
                    <div class="col-6 col-sm-6 col-md-3 col-lg-3 p-0">
                        <a href="{{ route('game', $game->game_file) }}">
                         <div class="card card__body">
                                <img src="{{ asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail) }}"
                                    class="card-img-top card__img" width="100%" alt="{{ $game->game_thumbnail }}" />
                                <div class="card-body card__text__body">
                                    <h5 class="card-title card__text">{{ $game->game_name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                <div class="erro-img text-center">
                <img src="{{ asset('assets/frontend/img/404-game.gif') }}"
                        alt="" class="img-fluid">
                </div>
                <h1>Whoops!</h1>
               <h4 class="game_not_found">Game Not Found</h4>
                @endforelse
            </div>
        </div>
    </section>

    <!-- --------------------------mostPopular end-------------------- -->

@endsection
