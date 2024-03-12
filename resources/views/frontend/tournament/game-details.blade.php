@extends('frontend.layouts.web')


@section('content')
    <section id="tournament_deatils">
        <div class="tournament_singlebanner">
            <a href="#"><img src="https://i.ibb.co/fkyvRy9/napzone-hero-bg-1.webp" alt="napzone-hero-bg-1"
                    class="game_details-banner"></a>
            <div class="game_content">
                <div class="gameImg">
                    <img src="{{ asset('uploads/Tournamant/GameImage/' . $game->image) }}" alt="">
                </div>
                <div class="game_name">
                    <a href="#">
                        <h3>{{ $game->game_name }}</h3>
                    </a>
                </div>
                <div class="game_info">
                    <div class="game_date">
                        <div class="start-date date"> <span><i class="fa-regular fa-clock"></i> Start Date :
                            </span><span>{{ $game->start_date }}</span> </div>
                    </div>
                    <div class="game_date">
                        <div class="start-date date"> <span><i class="fa-regular fa-clock"></i> End Date :
                            </span><span>{{ $game->end_date }}</span> </div>
                    </div>
                    <div class="entry_cost">
                        <a class="entry_label"><span>Entry Cost : {{ $game->game_fee }}</span> &#2547;
                        </a>
                    </div>
                    <div class="prizes mt-5">
                       
                        <a href="#" class="primary_btn leaderborad_btn"><i class="fa-solid fa-trophy"></i>
                            <span>Price</span></a>
                        <a href="#" class="primary_btn howtoplayBtn"><span>How to Play</span> <i
                                class="fa-solid fa-circle-info"></i></a>

                    </div>

                </div>
                <div class="gamePlaybtn">
                    @if ($subscriber == 1)
                        <a href="{{ route('tournament.game.play', $game->slug) }}" class="play_btn">Play Now <i
                                class="fa-regular fa-circle-play"></i> </a>
                    @else
                        <a href="{{ route('tournament.payment', $game->slug) }}" class="play_btn">Enter <i
                                class="fa-solid fa-cart-shopping"></i></a>
                    @endif

                </div>
            </div>
        </div>
    </section>

    @if ($subscriber == 1)
        <!-- --------------------------LEADERBOARD PART START ------------------------ -->
        <section id="tournament_leaderborad" class="section">
            <div class="container">
                <div class="tournamnet_title">
                    <h1 data-content="Leaderboard">Leaderboard</h1>
                </div>
                <div class="top_scorer">
                    @if ($second_score)
                        <div class="rank-02 rank-card">
                            <div class="rank_badge">
                                <span class="rank_number">02</span>
                            </div>
                            <div class="user_profile">
                                <a href="#">
                                    @if ($second_score->SubUser->profile_pic)
                                        <img src="{{ asset('storage/' . $second_score->SubUser->profile_pic) }}"
                                            alt="shohel" border="0">
                                    @else
                                        <img src="{{ asset('dummy.png') }}" alt="shohel" border="0">
                                    @endif
                                </a>
                                <div class="user_info">
                                    <a href="#">{{ $second_score->SubUser->name ?? 'Jon Doe' }}</a>
                                    <div class="points">{{ $second_score->score }} <span>PTs</span></div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if ($fist_score)
                        <div class="rank-01 rank-card">

                            <img src="https://i.ibb.co/pW8fFsT/icons8-crown-94.png" alt="icons8-crown-94" border="0">
                            <div class="user_profile">

                                <a href="#">
                                    @if ($fist_score->SubUser->profile_pic)
                                        <img src="{{ asset('storage/' . $fist_score->SubUser->profile_pic) }}"
                                            alt="shohel" border="0">
                                    @else
                                        <img src="{{ asset('dummy.png') }}" alt="shohel" border="0">
                                    @endif
                                </a>
                                <div class="crown_badge">
                                    <i class="fa-solid fa-crown"></i>
                                </div>
                                <div class="user_info">
                                    <a href="#">{{ $fist_score->SubUser->name ?? 'Jon Doe' }}</a>
                                    <div class="points">{{ $fist_score->score }} <span>PTs</span></div>
                                </div>
                            </div>

                        </div>
                    @endif

                    @if ($third_score)
                        <div class="rank-03 rank-card">
                            <div class="rank_badge">
                                <span class="rank_number">03</span>
                            </div>
                            <div class="user_profile">
                                <a href="#">
                                    @if ($third_score->SubUser->profile_pic)
                                        <img src="{{ asset('storage/' . $third_score->SubUser->profile_pic) }}"
                                            alt="shohel" border="0">
                                    @else
                                        <img src="{{ asset('dummy.png') }}" alt="shohel" border="0">
                                    @endif
                                </a>
                                <div class="user_info">
                                    <a href="#">{{ $third_score->SubUser->name ?? 'Jon Doe' }}</a>
                                    <div class="points">{{ $third_score->score }} <span>PTs</span></div>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
                @if ($my_score_details)
                    <div id="top_10">
                        <h2 class="rank_title">Your Rank</h2>
                        <div class="top_card">
                            <div class="rank_badge">
                                <span class="rank_number">{{ $myIndex }}</span>
                            </div>
                            <div class="column">
                                <div class="top_card-user">
                                    <div class="profile_img">
                                        @if ($my_score_details->SubUser->profile_pic)
                                            <img src="{{ asset('storage/' . $my_score_details->SubUser->profile_pic) }}"
                                                alt="shohel" border="0">
                                        @else
                                            <img src="{{ asset('dummy.png') }}" alt="shohel" border="0">
                                        @endif
                                        <div class="user_name">
                                            <a href="#">{{ $my_score_details->SubUser->name ?? 'Jon Doe' }}</a>
                                        </div>
                                    </div>
                                    <div class="user_highscore">
                                        <div class="points">{{ $myScore }} <span>PTs</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if ($gamescores)
                            <h2 class="rank_title">Other's Player Rank</h2>
                            <div class="top_users">

                                @foreach ($gamescores as $key => $gamescore)
                                    <div class="top_card">
                                        <div class="rank_badge">
                                            <span class="rank_number">{{ $key + 4 }}</span>
                                        </div>
                                        <div class="column">
                                            <div class="top_card-user">
                                                <div class="profile_img">
                                                    @if ($gamescore->SubUser->profile_pic)
                                                        <img src="{{ asset('storage/' . $gamescore->SubUser->profile_pic) }}"
                                                            alt="shohel" border="0">
                                                    @else
                                                        <img src="{{ asset('dummy.png') }}" alt="shohel"
                                                            border="0">
                                                    @endif
                                                    <div class="user_name">
                                                        <a href="#">{{ $gamescore->SubUser->name ?? 'Jon Doe' }}</a>
                                                    </div>
                                                </div>
                                                <div class="user_highscore">
                                                    <div class="points">{{ $gamescore->score }} <span>PTs</span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endif

                        {{-- <a href="#" class="glass_btn">View More</a> --}}
                    </div>
                @endif


            </div>

            </div>

        </section>
        <!-- --------------------------LEADERBOARD PART END ------------------------ -->
    @endif




    @include('frontend.tournament.modal.price')

    @include('frontend.tournament.modal.how-to-play')
@endsection
@section('pageJS')
    <script>
        var closeBtn = document.querySelector(".modalclose_btn");
        var closeBtnplay = document.querySelector(".howtoplayClosebtn");
        var leaderBoardModal = document.querySelector("#leaderBoardModel");
        var leaderboardBtn = document.querySelector(".leaderborad_btn");
        var howtoPlayModal = document.querySelector("#howtoplayModal");
        var howtoplayBtn = document.querySelector(".howtoplayBtn");
        // leaderboard
        leaderboardBtn.addEventListener('click', () => {
            leaderBoardModal.classList.add("active");
        });
        closeBtn.addEventListener('click', () => {
            leaderBoardModal.classList.remove("active");
        });
        // howtoplay
        howtoplayBtn.addEventListener('click', () => {
            howtoPlayModal.classList.add("active");
        });
        closeBtnplay.addEventListener('click', () => {
            howtoPlayModal.classList.remove("active");
        });
    </script>
@endsection
