@extends('frontend.layouts.web')


@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parallax/3.1.0/parallax.min.js"
        integrity="sha512-/6TZODGjYL7M8qb7P6SflJB/nTGE79ed1RfJk3dfm/Ib6JwCT4+tOfrrseEHhxkIhwG8jCl+io6eaiWLS/UX1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <!-- --------------------------TOURNAMENT HEADER  START ------------------------ -->
    <header id="tournament_header">
       <div class="container-fluid">
        <div class="row align-items-center">
            <div class="header_left col-md-12">
                <div class="header_content text-center">
                    <h1>Xoss Games Tournament</h1>
                    <h2>Play & Win Prizes</h2>
                    <div class="my-5">
                        <a href="#tournament_card" class="primary_btn m-auto">Join Now</a>
                    </div>
                </div>
            </div>
            <div class="header_right col-md-4">
                <div class="parallax">
                    <div class="object object-one" data-depth="1"> <img src="https://i.ibb.co/XjvdG3n/money-illustration.png" alt="money-illustration" border="0" class="img-fluid"></div>
                    <div class="object object-two" data-depth="2"> <img src="https://i.ibb.co/TYY087W/prize-trophy.png" alt="prize-trophy" border="0" class="img-fluid"></div>
                </div>
                {{-- <a href="https://imgbb.com/"><img src="https://i.ibb.co/TYY087W/prize-trophy.png" alt="prize-trophy" border="0"></a>
<a href="https://imgbb.com/"><img src="https://i.ibb.co/XjvdG3n/money-illustration.png" alt="money-illustration" border="0"></a> --}}
            </div>
        </div>
       </div>
        <svg class="waves-header" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#fff" fill-opacity="1"
                d="M0,288L30,272C60,256,120,224,180,224C240,224,300,256,360,256C420,256,480,224,540,208C600,192,660,192,720,208C780,224,840,256,900,256C960,256,1020,224,1080,218.7C1140,213,1200,235,1260,240C1320,245,1380,235,1410,229.3L1440,224L1440,320L1410,320C1380,320,1320,320,1260,320C1200,320,1140,320,1080,320C1020,320,960,320,900,320C840,320,780,320,720,320C660,320,600,320,540,320C480,320,420,320,360,320C300,320,240,320,180,320C120,320,60,320,30,320L0,320Z">
            </path>
        </svg>
    </header>
    <!-- --------------------------TOURNAMENT HEADER  END ------------------------ -->

   
    <!-- --------------------------TOURNAMENT CARD START ------------------------ -->
    <section id="tournament_card" class="section-bottom">

        <div class="container">
            <div class="title pb-5">
                <h1 class=" mostPopular__title__text">Tournament Games</h1>
                <p class="subheading_common">Clash of Champions Battle for Supremacy in the Ultimate Tournament of Feature
                    Games!</p>
            </div>
            <div class="row">
                @foreach ($games as $game)
                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 mb-3 ">
                        <div class="tournament_card">
                            <div class="card_img">
                                <div class="cover_img">
                                    <img src="{{ asset('uploads/Tournamant/GameImage/' . $game->image) }}" alt="">
                                    <svg class="waves" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                                        <path fill="#0099ff" fill-opacity="1"
                                            d="M0,320L48,282.7C96,245,192,171,288,160C384,149,480,203,576,186.7C672,171,768,85,864,80C960,75,1056,149,1152,160C1248,171,1344,117,1392,90.7L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                                        </path>
                                    </svg>
                                </div>
                                <div class="card_profile">
                                    <img src="{{ asset('uploads/Tournamant/GameImage/' . $game->image) }}" alt="">
                                </div>

                            </div>
                            @if (Auth::guard('subscriber')->user())
                                <div class="card_body">
                                    <div class="game_title">
                                        <a
                                            href="{{ route('tournament.game.details', $game->slug) }}">{{ $game->game_name }}</a>
                                    </div>
                                    <div class="play_now-btn">
                                        <a href="{{ route('tournament.game.details', $game->slug) }}"
                                            class="primary_btn">Join
                                            Now</a>
                                    </div>

                                </div>
                            @else
                                <div class="card_body">
                                    <div class="game_title">
                                        <a href="{{ route('user.login') }}">{{ $game->game_name }}</a>
                                    </div>
                                    <div class="play_now-btn">
                                        <a href="{{ route('user.login') }}" class="primary_btn">Join
                                            Now</a>
                                    </div>

                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- --------------------------TOURNAMENT CARD END ------------------------ -->



    <!-- --------------------------FAQ PART START ------------------------ -
    <section id="faq">
        <div class="container">
            <main id="questions" role="main">
                <h1 class="mostPopular__title__text">Frequently Asked Questions</h1>
                <div class="topic">

                    <div class="open">

                        <h2 class="question">1. How can I enter the tournament?</h2>
                        <span class="faq-t"></span>
                    </div>
                    <p class="answer">Give me content for answer.</p>
                </div>
                <div class="topic">
                    <div class="open">
                        <h2 class="question">2. Does every tournament have prize?
                        </h2><span class="faq-t"></span>
                    </div>
                    <p class="answer">Give me content for answer.</p>
                </div>
                <div class="topic">
                    <div class="open">
                        <h2 class="question">3. What brackets are the tournaments in?
                        </h2><span class="faq-t"></span>
                    </div>
                    <p class="answer">The brackets cosist of 1v1 and 2v2.</p>
                </div>
                <div class="topic">
                    <div class="open">
                        <h2 class="question">4. Do you have your own Pro Team?
                        </h2><span class="faq-t"></span>
                    </div>
                    <p class="answer">Give me content for answer.</p>
                </div>
                <div class="topic">
                    <div class="open">
                        <h2 class="question">5. Can I be a caster at SCRIMcom?
                        </h2><span class="faq-t"></span>
                    </div>
                    <p class="answer">Give me content for answer.</p>
                </div>
                <div class="topic">
                    <div class="open">
                        <h2 class="question">6. Are there any job positions opened?
                        </h2><span class="faq-t"></span>
                    </div>
                    <p class="answer">We currently Hiring!</p>
                </div>
                <div class="topic">
                    <div class="open">
                        <h2 class="question">7. I have been banned, help!
                        </h2><span class="faq-t"></span>
                    </div>
                    <p class="answer">Stop Aimhax.exe</p>
                </div>
                <div class="topic">
                    <div class="open">
                        <h2 class="question">8. Hello?
                        </h2><span class="faq-t"></span>
                    </div>
                    <p class="answer">HI!</p>
                </div>
                <div class="topic">
                    <div class="open">
                        <h2 class="question">9. Just another FAQ that I cba to type
                        </h2><span class="faq-t"></span>
                    </div>
                    <p class="answer">The more the better...</p>
                </div>
            </main>
        </div>
    </section>
    <!-- --------------------------FAQ PART END ------------------------ -->


    <script>
        const parallaxContainer = document.querySelector(".parallax");
        const parallaxInstance = new Parallax(parallaxContainer);
    </script>
@endsection
