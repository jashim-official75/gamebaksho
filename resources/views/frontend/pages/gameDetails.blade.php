@extends('frontend.layouts.web')


@section('content')

  <!-- ---------------------------play btn section start------------------ -->
  <section class="plybtn pt-5">
    <div class="container">
      <div class="row">
        <div class="col-12 col-sm-12 col-xl-12">
          <div class="playbtn__bannar">
            <img src="{{ asset('assets/frontend/images/uploads/games_img/' . $game->game_banner) }}" width="100%" alt="" />
             <div class="playbtn__bannar__body">
            <h3 class="playbtn__bannar__body__title">{{ $game->game_name }}</h3>
            <ul class="playbtn__bannar__body__list">
              {{-- <li>Total level: <strong>10</strong></li> --}}
              <!-- <li>Genre: <strong>{{ $game->gameCategory->categoryName->category_name }}</strong></li> -->
              {{-- <li>Played by: <strong>2800k+</strong></li> --}}
            </ul>
            <div class="d-none d-md-block">
              <a class="play__btn play__btn--playnow btn__hover text-white" href="{{ route('game' , $game->game_file) }}">
                Play Now
              </a>
              {{-- <button class="play__btn play__btn--leaderBoard btn__hover">
                Leader Board
              </button> --}}
            </div>
            <div class="playbtn__bannar__body col-12 d-flex justify-content-center align-items-center d-block d-md-none">
          <a class="play__btn play__btn--playnow btn__hover" href="{{ route('game' , $game->game_file) }}">
            Play Now
          </a>
          {{-- <button class="play__btn play__btn--leaderBoard btn__hover">
            Leader Board
          </button> --}}
        </div>
          </div>
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
  <section class="mostPopular">
    <div class="container">
      <div class="mostPopular__title mb-3 mb-md-5">
        <h3 class="mostPopular__title__text mostPopular__title__text--font-size">
          Related Games
        </h3>
      </div>
      <div class="card__wrapper row">
        <!-- -------- card 4  -->

        @foreach($relatedGames as $relatedGame)
          @if ($relatedGame->gameName->is_free)
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-0">
              <a href="{{ route('gameDetails', $relatedGame->gameName) }}">
                <div class="card card__body">
                  <img src="{{ asset('assets/frontend/images/uploads/games_img/' . $relatedGame->gameName->game_thumbnail) }}" class="card-img-top card__img" width="100%" alt="..." />
                  <div class="card-body card__text__body">
                    <h5 class="card-title card__text">{{ Str::limit($relatedGame->gameName->game_name, 17, '...') }}</h5>
                  </div>
                </div>
              </a>
            </div>
          @else
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 p-0">
              <a
              @if($isMobile && !$subscribed)
                href="{{ route('user.packages') }}"
              @elseif(!$subscribed)
                data-toggle="modal" data-target="#subscription_pop"
              @else
                href="{{ route('gameDetails', $relatedGame->gameName) }}"
              @endif
              >
                <div class="card card__body">
                  <img src="{{ asset('assets/frontend/images/uploads/games_img/' . $relatedGame->gameName->game_thumbnail) }}" class="card-img-top card__img" width="100%" alt="..." />
                  <div class="card-body card__text__body">
                    <h5 class="card-title card__text">{{ Str::limit($relatedGame->gameName->game_name, 17, '...') }}</h5>
                  </div>
                </div>
              </a>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </section>
  <!-- --------------------------mostPopular end-------------------- -->


@endsection