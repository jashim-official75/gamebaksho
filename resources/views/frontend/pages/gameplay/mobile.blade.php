<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
     <meta name="twitter:title" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta name="twitter:description" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta name="twitter:url" content="https://xoss.games/xoss_games-og-image.jpg">
    <meta name="twitter:card" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta property="og:title" content="{{ $game->meta_title }}">
    <meta property="og:description" content="{{ $game->meta_description }}">
    <meta property="og:image" content="{{ asset('assets/frontend/images/uploads/games_img/' . $game->game_thumbnail) }}" />
    <meta property="og:url" content="{{ url()->current() }}">
    <meta name="title" content="{{ $game->meta_title }}" />
    <meta name="description" content="{{ $game->meta_description }}" />
    <meta name="keywords" content="{{ $game->meta_keyword }}" />
    <link rel="canonical" href="{{ url()->current() }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Playtoony | Enjoy a Wide Range of Online Games on {{ $game->game_name }}</title>
    <style>
        iframe{
            position: absolute;
            margin:0 !important;
            padding:0 !important;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
           <iframe src="{{ asset('AllGames/'. $game->game_file) }}" frameborder="0" height="100" width="100"></iframe>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
