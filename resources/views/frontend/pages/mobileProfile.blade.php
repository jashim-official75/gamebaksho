@extends('frontend.layouts.web')

@section('frontend_header')
    <meta property="og:title" content="Profile | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:description" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:image" content="https://xoss.games/xoss_games-og-image.jpg" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="Profile | Play Online Games on Xoss Games - Your Ultimate Gaming Destination" />
    <meta name="description" content="Looking for a thrilling gaming experience? Xoss Games offers a wide range of online games to play for free. Get ready for hours of fun and excitement on our gaming platform!" />
    <meta name="keywords" content="Online games, Play games online,Free online games,Xoss games	,Best online games,Play free online games,Multiplayer games,Play online games for free,Online shooting games,Online,puzzle games,Play free games online,Play online multiplayer games ,Online action games	,Best free online games,Online adventure games,Online strategy games, Play online action games" />
    <link rel="canonical" href="{{ url()->current() }}" />
    <title>Profile | Enjoy a Wide Range of Online Games on Xoss Games</title>
@endsection

@section('content')
    @livewire('frontend.mobile-profile')
@endsection