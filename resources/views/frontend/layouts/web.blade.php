<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <meta name="twitter:title" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
  <meta name="twitter:description" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta name="twitter:url" content="https://xoss.games/xoss_games-og-image.jpg">
    <meta name="twitter:card" content="Xoss Games | Enjoy a Wide Range of Online Games on Xoss Games">
    <meta name="p:domain_verify" content="abfbfd5fa799b08e3e52d00b02313651" />
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('icon.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <link rel="shortcut icon" href="{{ asset('assets/frontend/img/favicon.png') }}">
    <!-----head ------->
    @yield('frontend_header')
    
 <!-- Change the gtag functions to your global site tag

gtag('event', 'purchase', {
   'transaction_id': 't_12345',
   'currency': 'USD',
   'value': 1.23,
   user_data: {
      email_address: 'johnsmith@email.com',
      phone_number: '1234567890',
      address: {
         first_name: 'john',
         last_name: 'smith',
         city: 'menlopark',
         region: 'ca',
         postal_code: '94025',
         country: 'usa',
      },
   },
   items: [{
      item_name: 'foo',
      quantity: 5,
      price: 123.45,
      item_category: 'bar',
      item_brand : 'baz',
    }],
});

<!-- Change the gtag functions to your global site tag -->


   <!-- Meta Pixel Code Salma Biswas
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '301467322574982');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=301467322574982&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code Salma Biswas -->

<!-- Start Meta Pixel Code Zakria Xoss Games -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '328616566376123');
fbq('track', 'PageView');
</script>
<noscript><im

<!--End Meta Pixel Code -->

    <!-- Meta Pixel Code 
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1808381749577716');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1808381749577716&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->


    <!-- Google Tag Manager Head -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-TSDLM28');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google Analatics tag (gtag.js) --
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9N2NB2TZ0Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-9N2NB2TZ0Q');
    </script> -->
    
<script type='text/javascript'>//<![CDATA[
var lazyanalisis=!1;window.addEventListener("scroll",function(){(0!=document.documentElement.scrollTop&&!1===lazyanalisis||0!=document.body.scrollTop&&!1===lazyanalisis)&&(!function(){var e=document.createElement("script");e.type="text/javascript",e.async=!0,e.src="https://www.googletagmanager.com/gtag/js?id=G-9N2NB2TZ0Q";var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(e,a)}(),lazyanalisis=!0)},!0);
//]]></script>

    <!-- Google Analatics tag (gtag.js) -->
    <link rel="shortcut icon" href="{{ asset('assets/frontend/img/favicon.png') }}" type="image/x-icon">
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/Bootstrap/css/bootstrap.min.css') }}" async/>
    <!-- Slick Slider  --
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/plugins/slick-slider/css/slick.css') }}" /> 
     <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/frontend/plugins/slick-slider/css/slick-theme.css') }}" />

    <!-- Font Awesome 5 --
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <!-- Fonts --
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500&display=swap" as="font" rel="stylesheet" /> 
<link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet"> -->
 <!-- FANCYBOX CSS LINK -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
 <link rel="preload" href="{{ asset('assets/frontend/plugins/slick-slider/css/slick.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
   <noscript><link rel="stylesheet"  href="{{ asset('assets/frontend/plugins/slick-slider/css/slick.css') }}"></noscript> 
    <link rel="preload" href="{{ asset('assets/frontend/plugins/slick-slider/css/slick-theme.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
   <noscript><link rel="stylesheet"  href="{{ asset('assets/frontend/plugins/slick-slider/css/slick-theme.css') }}"></noscript> 
    @yield('pageCSS')
    @livewireStyles
    <!-- Default Styles -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}" /> 

 <!--  <link rel="preload" href="{{ asset('assets/frontend/css/minified.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'"> -->
   <noscript><link rel="stylesheet"  href="{{ asset('assets/frontend/css/minified.css') }}"></noscript> 
<script>
//<![CDATA[
/*code by anutrickz */
let t,e;const n=new Set,o=document.createElement("link"),i=o.relList&&o.relList.supports&&o.relList.supports("prefetch")&&window.IntersectionObserver&&"isIntersecting"in IntersectionObserverEntry.prototype,s="instantAllowQueryString"in document.body.dataset,a="instantAllowExternalLinks"in document.body.dataset,r="instantWhitelist"in document.body.dataset,c="instantMousedownShortcut"in document.body.dataset,d=1111;let l=65,u=!1,f=!1,m=!1;if("instantIntensity"in document.body.dataset){const t=document.body.dataset.instantIntensity;if("mousedown"==t.substr(0,"mousedown".length))u=!0,"mousedown-only"==t&&(f=!0);else if("viewport"==t.substr(0,"viewport".length))navigator.connection&&(navigator.connection.saveData||navigator.connection.effectiveType&&navigator.connection.effectiveType.includes("2g"))||("viewport"==t?document.documentElement.clientWidth*document.documentElement.clientHeight<45e4&&(m=!0):"viewport-all"==t&&(m=!0));else{const e=parseInt(t);isNaN(e)||(l=e)}}if(i){const n={capture:!0,passive:!0};if(f||document.addEventListener("touchstart",function(t){e=performance.now();const n=t.target.closest("a");if(!h(n))return;v(n.href)},n),u?c||document.addEventListener("mousedown",function(t){const e=t.target.closest("a");if(!h(e))return;v(e.href)},n):document.addEventListener("mouseover",function(n){if(performance.now()-e<d)return;const o=n.target.closest("a");if(!h(o))return;o.addEventListener("mouseout",p,{passive:!0}),t=setTimeout(()=>{v(o.href),t=void 0},l)},n),c&&document.addEventListener("mousedown",function(t){if(performance.now()-e<d)return;const n=t.target.closest("a");if(t.which>1||t.metaKey||t.ctrlKey)return;if(!n)return;n.addEventListener("click",function(t){1337!=t.detail&&t.preventDefault()},{capture:!0,passive:!1,once:!0});const o=new MouseEvent("click",{view:window,bubbles:!0,cancelable:!1,detail:1337});n.dispatchEvent(o)},n),m){let t;(t=window.requestIdleCallback?t=>{requestIdleCallback(t,{timeout:1500})}:t=>{t()})(()=>{const t=new IntersectionObserver(e=>{e.forEach(e=>{if(e.isIntersecting){const n=e.target;t.unobserve(n),v(n.href)}})});document.querySelectorAll("a").forEach(e=>{h(e)&&t.observe(e)})})}}function p(e){e.relatedTarget&&e.target.closest("a")==e.relatedTarget.closest("a")||t&&(clearTimeout(t),t=void 0)}function h(t){if(t&&t.href&&(!r||"instant"in t.dataset)&&(a||t.origin==location.origin||"instant"in t.dataset)&&["http:","https:"].includes(t.protocol)&&("http:"!=t.protocol||"https:"!=location.protocol)&&(s||!t.search||"instant"in t.dataset)&&!(t.hash&&t.pathname+t.search==location.pathname+location.search||"noInstant"in t.dataset))return!0}function v(t){if(n.has(t))return;const e=document.createElement("link");e.rel="prefetch",e.href=t,document.head.appendChild(e),n.add(t)}
//]]>
</script> 
</head>
<link rel="preload" 
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
      as="font"
      onload="this.onload=null; this.rel='stylesheet'; document.body.classList.add('fontLoaded')">

<body>

    <!-- Google Tag Manager (noscript) body -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TSDLM28" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) →--->


    @if (!$isMobile)
        @livewire('frontend.subscription-package')
        {{-- @livewire('frontend.login')
        @livewire('frontend.registration') --}}
        @if (Auth::guard('subscriber')->check())
            @livewire('frontend.profile')
        @endif
    @endif



    @include('frontend.inc.header')

    @yield('content')

    @include('frontend.inc.footer')
      <!-- Bootstrap 4 Scripts-->
   <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <!-- Slick JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!-- Js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Fancybox Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="{{ asset('assets/frontend/js/minified.js') }}"></script>
  
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
          /* Get the element you want displayed in fullscreen */
        var iframe = document.getElementById("myvideo");

        /* Function to open fullscreen mode */
        function openFullscreen() {
            if (iframe.requestFullscreen) {
                iframe.requestFullscreen();
            } else if (iframe.webkitRequestFullscreen) {
                iframe.webkitRequestFullscreen();
            } else if (iframe.msRequestFullscreen) {
                iframe.msRequestFullscreen();
            }
        }
    </script>


    @livewireScripts

    @if (Session::has('success'))
        <script>
            Swal.fire(
                'success!',
                '{{ Session::get('success') }}',
                'success'
            )
        </script>
        {{ session()->forget('success') }}
    @endif

    @if (session('error'))
        <script>
            Swal.fire(
                'Error!',
                '{{ session('error') }}',
                'error'
            )
        </script>
        {{ session()->forget('error') }}
    @endif
    
<script>

    setTimeout(function() {
  // Add the Font Awesome stylesheet dynamically
  var link = document.createElement('link');
  link.rel = 'stylesheet';
   link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css';
  document.head.appendChild(link);
}, 3000); // Delay of 3 seconds

</script>





    @yield('pageJS')
</body>

</html>