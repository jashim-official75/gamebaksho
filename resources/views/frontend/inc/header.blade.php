<!-- ------------------------- Header Start ---------------------- -->
<div id="header-wrap">
    <section id="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navber-fixed">
                {{-- <a class="navbar-brand" href="{{ route('home') }}" aria-label="xoss games logo"><img
                        src="{{ asset('assets/frontend/img/logo.png') }}" class="logo__img" width="180" height="45" alt="" /></a> --}}
                <a class="navbar-brand text_logo" href="{{ route('home') }}" aria-label="gamebaksho logo "> GameBaksho </a>
                <a id="sidebar__toggle--btn" class="sm-hide"><img
                        src="{{ asset('assets/frontend/img/sidebar_toggle.png') }}" alt=""></a>
                @if (!$isMobile)
                <div class="header__navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        @if (!$subscribed)
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-toggle="modal" data-target="#subscription_pop"><img
                                    src="{{ asset('assets/frontend/img/subscription-package.png') }}" width="35" height="auto" alt="" />
                                Subscription Plan</a>
                            {{-- <a class="nav-link" href="#"><img
                                    src="{{ asset('assets/frontend/img/subscription-package.png') }}" width="35" height="auto" alt="" />
                                Subscription Plan</a> --}}
                        </li>
                        @endif
                    </ul>
                    <form class="header__form form-inline header__search my-2 my-lg-0" method="GET"
                        action="{{ route('search') }}">
                        <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search for games"
                            value="{{ old('keyword') }}" id="search_box">
                        <button class="submit" type="submit" id="submit_btn">
                            <img
                            src="{{ asset('assets/frontend/img/search_icon.png') }}" alt="" />
                        </button>
                    </form>

        

                    @if (Auth::guard('subscriber')->check())
                    <div class="header__right">
                        <a href="#" data-toggle="modal" data-target="#profile_pop" class="sm-hide" aria-label="profie icon"><img
                                src="{{ asset('assets/frontend/img/login__icon.png') }}" alt=""></a>

                    </div>
                    @endif



                </div>
                @endif
                @if (!auth()->guard('subscriber')->check())


                <a class="nav-link text-white sm-hide" href="{{ route('user.login') }}" aria-label="user icon">
                    <img
                        src="{{ asset('assets/frontend/img/login__icon.png') }}" alt="" /></a>

                @endif
            </nav>

        </div>


        <div id="header__sidebar" class="header__sidebar">
            <div class="float-right">
                <a id="sidebar__close">
                    <i class="fas fa-times"></i>
                </a>
            </div>
            <div class="header__sidebar--listItems">
                <ul class="sidebar-nav mr-auto">
                    @if (!$subscribed)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.packages') }}" data-toggle="modal" data-target="#subscription_pop"><img
                                src="{{ asset('assets/frontend/img/2_s.png') }}" width="20" height="auto" alt="" />Subscribe
                            Package</a>
                    </li>
                    @endif

                    @if (Auth::guard('subscriber')->check())
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.profile') }}" ><img
                                src="{{ asset('assets/frontend/img/2_s.png') }}" width="20" height="auto" alt="" />Profile</a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('aboutUs') }}"><img
                                src="{{ asset('assets/frontend/img/4_about.png') }}" width="20" height="auto" alt="" />About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('terms.condition') }}"><img
                                src="{{ asset('assets/frontend/img/5_tandc.png') }}" width="20" height="auto" alt="" />Terms and
                            Conditions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('privacy') }}"><img
                                src="{{ asset('assets/frontend/img/6_Privacy Policy.png') }}" width="20" height="auto" alt="" />Privacy
                            Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faq') }}"><img
                                src="{{ asset('assets/frontend/img/7_faq.png') }}" width="20" height="auto" alt="" />FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}"><img
                                src="{{ asset('assets/frontend/img/8_contactus.png') }}" width="20" height="auto" alt="" />Contact
                            Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('support') }}"><img
                                src="{{ asset('assets/frontend/img/customer-support.png') }}" width="20" height="auto" alt="" />Support</a>
                    </li>
                    </li>
                </ul>
            </div>
            @if (Auth::guard('subscriber')->check())
            <div class="subscription__section text-center">
                <button class="user_control-btn user_btn">
                    <a href="{{ route('logout') }}" class="btn__hover text-center ">Logout</a>
                </button>
            </div>
            @endif
            @if ($subscribed && !$unsubs)
            <div class="subscription__section text-center mt-5">
                <button class="user_control-btn user_btn">
                    <a href="{{ route('unsubscribe') }}" class="btn__hover text-center">Unsubscribe</a>
                </button>
            </div>
            @endif
        </div>
    </section>
</div>


{{-- mobile sidbar --}}
<div id="mobile_sidebar" class="mobile_sidebar">
    <div class="float-right">
        <a id="close_icon">
            <i class="fas fa-times"></i>
        </a>
    </div>
    <div class="header__sidebar--listItems">
        <ul class="sidebar-nav mr-auto">
            @if (!$subscribed)
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.packages') }}"><img
                        src="{{ asset('assets/frontend/img/2_s.png') }}" alt="" />Subscribe
                    Package</a>
            </li>
            @endif

            @if (Auth::guard('subscriber')->check())
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.profile') }}"><img
                        src="{{ asset('assets/frontend/img/2_s.png') }}" alt="" />Profile</a>
            </li>
            @endif

            <li class="nav-item">
                <a class="nav-link" href="{{ route('aboutUs') }}"><img
                        src="{{ asset('assets/frontend/img/4_about.png') }}" alt="" />About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('terms.condition') }}"><img
                        src="{{ asset('assets/frontend/img/5_tandc.png') }}" alt="" />Terms and
                    Conditions</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('privacy') }}"><img
                        src="{{ asset('assets/frontend/img/6_Privacy Policy.png') }}" alt="" />Privacy Policy</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('faq') }}"><img src="{{ asset('assets/frontend/img/7_faq.png') }}"
                        alt="" />FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('contact') }}"><img
                        src="{{ asset('assets/frontend/img/8_contactus.png') }}" alt="" />Contact
                    Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('support') }}"><img
                        src="{{ asset('assets/frontend/img/customer-support.png') }}" alt="" />Support</a>
            </li>
            </li>
        </ul>
    </div>
    @if (Auth::guard('subscriber')->check())
    <div class="subscription__section text-center">

        <a href="{{ route('logout') }}" class="btn__hover text-center common_btn">Logout</a>

    </div>
    @endif
    @if ($subscribed && !$unsubs)
    <div class="subscription__section text-center mt-5">

        <a href="{{ route('unsubscribe') }}" class="btn__hover text-center common_btn ml-3">Unsubscribe</a>

    </div>
    @endif
</div>
{{-- mobile sidbar --}}



{{-- mobile searchbar --}}
<div id="mobilesearchBar">
    <div class="float-right">
        <a id="close_search">
            <i class="fas fa-times"></i>
        </a>
    </div>
    <form class="form-inline header__search my-2 my-lg-0" method="GET" action="{{ route('search') }}">
        <input class="form-control search_data mr-sm-2" type="search" name="keyword" placeholder="Search for games"
            value="{{ old('keyword') }}" />
        <button class="submit_btn" type="submit">
            <i class="fa fa-search"></i>
        </button>
    </form>
</div>
{{-- mobile searchbar --}}




<!-- ------------------------- Header End ---------------------- -->

    <div id="mobile_menu">
    <ul id="navbar">
        <li class="list {{ request()->routeIs('home') ? 'active' : '' }}"><a href="{{ route('home') }}" class="list-link" aria-label="home icon">
                <span class="icon"><i class="fa-solid fa-house"></i></span>
            </a></li>

        <li class="list"><a href="#" id="browse_icon" class="list-link" aria-label="browse icon">
                <span class="icon"><i class="fa-solid fa-bars"></i></span>
            </a></li>

        <li class="list"><a href="#" id="search_icon" class="list-link" aria-label="search icon">
                <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
            </a></li>
        @if(auth()->guard('subscriber')->user() && $subscribed)
        <li class="list {{ request()->routeIs('support') ? 'active' : '' }}"><a href="{{ route('support') }}" class="list-link" aria-label="support icon">
                <span class="icon"><i class="fa-solid fa-headphones-simple"></i></span>
            </a></li>
        @else
        <li class="list {{ request()->routeIs('user.packages') ? 'active' : '' }}"><a href="{{ route('user.packages') }}" id="packages_icon" class="list-link" aria-label="packages icon">
                <span class="icon"><i class="fa-solid fa-cube"></i></span>
            </a></li>
        @endif

        @if(auth()->guard('subscriber')->user())
        <li class="list {{ request()->routeIs('user.profile') ? 'active' : '' }}"><a href="{{ route('user.profile') }}" class="list-link" aria-label="profile icon">
                <span class="icon"><i class="fa-solid fa-id-badge"></i></i></span>
            </a></li>

        @else
        <li class="list {{ request()->routeIs('user.login') ? 'active' : '' }}"><a href="{{ route('user.login') }}" class="list-link" aria-label="user icon">
                <span class="icon"><i class="fa-solid fa-user"></i></span>
            </a></li>
        @endif

    </ul>
</div>

<script>




    var searchBox = document.getElementById("search_box");
   var searchSign = document.getElementById("search_sign");
     var submitBtn = document.getElementById("submit_btn");

searchSign.addEventListener("click", function () {
  searchBox.classList.toggle("toggle_search");
  searchBox.focus();
//   searchSign.classList.toggle("toggle_search");
//   submitBtn.classList.toggle("toggle_search");
});

searchSign.addEventListener("click", function () {
  searchSign.style.display = "none";
});

searchSign.addEventListener("click", function () {
  submitBtn.classList.toggle("toggle_search");
});



    $(document).on("click", "ul li", function () {
        $(this).addClass("active").siblings().removeClass("active");
    });




</script>



  