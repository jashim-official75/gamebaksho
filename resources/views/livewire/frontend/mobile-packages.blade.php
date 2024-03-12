<section id="subscriptionMobile">
    <div>
        <div class="header_title">
            <div>Xoss Games</div>
            <span>Subscription Plan</span>
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
        
        {{-- <div class="choose_plan">
            <ul class="nav nav-tabs mb-4" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Daily</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Weekly</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Monthly</a>
                </li>
            </ul><!-- Tab panes -->
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
                            <button wire:click="daily" class="mt-4">Subscribe Now</button>
                        </section>
                    </div>
                </div>
                <div class="tab-pane" id="tabs-2" role="tabpanel">
                    <div class="plan_card p-5">
                        <section>
                            <h5>Weekly</h5>
                            <small>9.99tk/-</small>
                            <div class="package">
                                <div>
                                    <label for=""></label>
                                    <span>7 days</span>
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
                            <button wire:click="weekly" class="mt-4">Subscribe Now</button>
                        </section>
                    </div>
                </div>
                <div class="tab-pane" id="tabs-3" role="tabpanel">
                    <div class="plan_card p-5" id="lastCard">
                        <section>
                            <h5>Monthly</h5>
                            <small>39.99tk/-</small>
                            <div class="package">
                                <div>
                                    <label for=""></label>
                                    <span>30 days</span>
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
                            <button wire:click="monthly" class="mt-4">Subscribe Now</button>
                        </section>
                    </div>
                </div>
            </div>

        </div> --}}
    </div>
</section>

<section class="mostPopular lock" id="allGame">
    <div class="container">
        <div class="mostPopular__title my-2 mb-md-5">
            <h3 class="mostPopular__title__text mostPopular__title__text--font-size mt-0">
                Our Games
            </h3>
        </div>
        <div class="card__wrapper row justify-content-center shake_to_sub">
            @foreach($games as $game)
            <div class=" col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 p-0 " >
                <a href="#subscriptionMobile" onclick="showPopup()">
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

