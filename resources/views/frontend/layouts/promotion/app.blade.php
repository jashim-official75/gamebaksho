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
    <!-----head ------->
    @yield('frontend_promotion_header')
    <!-- Meta Pixel Code -->
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
    <!-- Google Analatics tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-9N2NB2TZ0Q"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-9N2NB2TZ0Q');
    </script>
    <!-- Google Analatics tag (gtag.js) -->
    {{-- <link rel="shortcut icon" href="{{ asset('assets/frontend/img/favicon.png') }}" type="image/x-icon"> --}}
    
    <link rel="shortcut icon" href="https://playtoony.com/favicon.png">

    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/plugins/Bootstrap/css/bootstrap.min.css') }}" />
    <!-- Slick Slider-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/plugins/slick-slider/css/slick.css') }}" />
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/frontend/plugins/slick-slider/css/slick-theme.css') }}" />
    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
    @yield('pageCSS')
    <!-- Default Styles -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/main.css') }}" />
    <meta name="p:domain_verify" content="abfbfd5fa799b08e3e52d00b02313651" />
    <!-- PWA  -->
    <meta name="theme-color" content="#6777ef" />
    <link rel="apple-touch-icon" href="{{ asset('icon.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
 
</head>

<body>
    <!-- Google Tag Manager (noscript) body -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TSDLM28" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) →--->
    <!-- ------------------------- Header Start ---------------------- -->
    <div id="header-wrap" class="pb-80px">
        <section id="header">
            <div class="container">
                <nav class="navbar navbar-expand-lg navber-fixed">
                    <a class="navbar-brand"><img src="{{ asset('assets/frontend/img/logo.png') }}" class="logo__img"
                            alt="" /></a>
                </nav>
            </div>
        </section>
    </div>
    <!-- ------------------------- Header End ---------------------- -->
    @yield('promotion_content')
    <!-- ------------------------- Footer Section start ---------------------- -->
    <section class="footer py-4">
        <div class="row footer__border">
            <div class="col-4 col-md-2"></div>
            <div class="col-md-8 col-12 d-flex justify-content-center align-items-center mb-0 footer__end__body ">
                <p class="copyRight">Copyright &copy; 2023 , <a>NapTech
                        Labs</a>. All Rights Reserved. </p>
            </div>
    </section>
    <!-- ------------------------- footer Section End ---------------------- -->

    <!-- Bootstrap 4 Scripts-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <!-- jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <!-- Slick Slider -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.js"></script>
    <!-- Slick JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!-- Js -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Fancybox Js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script src="{{ asset('assets/frontend/js/app.js') }}"></script>
    <!------pwa ---->
    <script src="{{ asset('/sw.js') }}"></script>
    <script>
        if (!navigator.serviceWorker.controller) {
            navigator.serviceWorker.register("/sw.js").then(function(reg) {
                console.log("Service worker has been registered for scope: " + reg.scope);
            });
        }
    </script>
    @yield('pageJS')
</body>

</html>
