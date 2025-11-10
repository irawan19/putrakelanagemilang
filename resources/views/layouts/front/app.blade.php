@php
    $aplikasi = cache()->remember('aplikasi_data', 3600, function() { return \App\Models\Aplikasi::first(); });
    $kontak = cache()->remember('kontak_data', 3600, function() { return \App\Models\Kontak::first(); });
    $sosial_medias = cache()->remember('sosial_medias_data', 3600, function() { return \App\Models\Sosial_media::get(); });
    $galeris = cache()->remember('galeris_data', 1800, function() { return \App\Models\Galeri::get(); });
    
    // Set default values dengan fallback yang aman
    $app_name = ($aplikasi && isset($aplikasi->nama_aplikasis) && !empty($aplikasi->nama_aplikasis)) ? $aplikasi->nama_aplikasis : 'PT. Putra Kelana Gemilang';
    $app_desc = ($aplikasi && isset($aplikasi->deskripsi_aplikasis) && !empty($aplikasi->deskripsi_aplikasis)) ? $aplikasi->deskripsi_aplikasis : '';
    $app_keywords = ($aplikasi && isset($aplikasi->keyword_aplikasis) && !empty($aplikasi->keyword_aplikasis)) ? $aplikasi->keyword_aplikasis : 'alat kesehatan, medical equipment';
    
    // Set SEO variables dengan fallback
    $default_title = $app_name . ' - ' . ($app_desc ? \Illuminate\Support\Str::limit(strip_tags($app_desc), 60) : 'Alat Kesehatan Terpercaya');
    $default_description = $app_desc ? \Illuminate\Support\Str::limit(strip_tags($app_desc), 160) : 'Penyedia alat kesehatan terpercaya dengan kualitas terbaik untuk kebutuhan medis Anda.';
    $default_og_description = $app_desc ? \Illuminate\Support\Str::limit(strip_tags($app_desc), 200) : 'Penyedia alat kesehatan terpercaya dengan kualitas terbaik untuk kebutuhan medis Anda.';
    
    // Pastikan semua variabel terdefinisi
    if (!isset($default_title)) $default_title = 'PT. Putra Kelana Gemilang - Alat Kesehatan Terpercaya';
    if (!isset($default_description)) $default_description = 'Penyedia alat kesehatan terpercaya dengan kualitas terbaik untuk kebutuhan medis Anda.';
    if (!isset($default_og_description)) $default_og_description = 'Penyedia alat kesehatan terpercaya dengan kualitas terbaik untuk kebutuhan medis Anda.';
    if (!isset($app_name)) $app_name = 'PT. Putra Kelana Gemilang';
    if (!isset($app_keywords)) $app_keywords = 'alat kesehatan, medical equipment';
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <base href="./">
        <meta charset="utf-8">
        <title>@yield('title', isset($default_title) ? $default_title : 'PT. Putra Kelana Gemilang - Alat Kesehatan Terpercaya')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="@yield('description', isset($default_description) ? $default_description : 'Penyedia alat kesehatan terpercaya dengan kualitas terbaik untuk kebutuhan medis Anda.')">
        <meta name="keywords" content="@yield('keywords', isset($app_keywords) ? $app_keywords : 'alat kesehatan, medical equipment')">
        <meta name="author" content="{{isset($app_name) ? $app_name : 'PT. Putra Kelana Gemilang'}}">
        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
        <meta name="googlebot" content="index, follow">
        <meta name="language" content="Indonesian">
        <meta name="revisit-after" content="7 days">
        <meta name="rating" content="general">
        
        <!-- Canonical URL -->
        <link rel="canonical" href="@yield('canonical', url()->current())">
        
        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="@yield('og_type', 'website')">
        <meta property="og:url" content="@yield('og_url', url()->current())">
        <meta property="og:title" content="@yield('og_title', isset($app_name) ? $app_name : 'PT. Putra Kelana Gemilang')">
        <meta property="og:description" content="@yield('og_description', isset($default_og_description) ? $default_og_description : 'Penyedia alat kesehatan terpercaya dengan kualitas terbaik untuk kebutuhan medis Anda.')">
        <meta property="og:image" content="@yield('og_image', URL::asset('storage/'.(($aplikasi && isset($aplikasi->logo_aplikasis)) ? $aplikasi->logo_aplikasis : 'template/front/img/logo.png')))">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:image:alt" content="{{isset($app_name) ? $app_name : 'PT. Putra Kelana Gemilang'}}">
        <meta property="og:site_name" content="{{isset($app_name) ? $app_name : 'PT. Putra Kelana Gemilang'}}">
        <meta property="og:locale" content="id_ID">
        
        <!-- Twitter Card -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:url" content="@yield('twitter_url', url()->current())">
        <meta name="twitter:title" content="@yield('twitter_title', isset($app_name) ? $app_name : 'PT. Putra Kelana Gemilang')">
        <meta name="twitter:description" content="@yield('twitter_description', isset($default_og_description) ? $default_og_description : 'Penyedia alat kesehatan terpercaya dengan kualitas terbaik untuk kebutuhan medis Anda.')">
        <meta name="twitter:image" content="@yield('twitter_image', URL::asset('storage/'.(($aplikasi && isset($aplikasi->logo_aplikasis)) ? $aplikasi->logo_aplikasis : 'template/front/img/logo.png')))">
        <meta name="twitter:image:alt" content="{{isset($app_name) ? $app_name : 'PT. Putra Kelana Gemilang'}}">
        
        <!-- Additional SEO Meta Tags -->
        <meta name="geo.region" content="ID-JT">
        <meta name="geo.placename" content="Magelang">
        @if($kontak)
        <meta name="geo.position" content="{{$kontak->latitude_kontaks ?? ''}};{{$kontak->longitude_kontaks ?? ''}}">
        <meta name="ICBM" content="{{$kontak->latitude_kontaks ?? ''}}, {{$kontak->longitude_kontaks ?? ''}}">
        @endif
        <meta name="theme-color" content="#0066cc">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <meta name="apple-mobile-web-app-title" content="{{isset($app_name) ? $app_name : 'PT. Putra Kelana Gemilang'}}">
        
        <!-- Sitemap -->
        <link rel="sitemap" type="application/xml" href="{{url('/sitemap.xml')}}">
        
        <!-- DNS Prefetch untuk External Resources -->
        <link rel="dns-prefetch" href="https://fonts.googleapis.com">
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link rel="dns-prefetch" href="https://use.fontawesome.com">
        <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">
        <link rel="dns-prefetch" href="https://www.googletagmanager.com">
        <link rel="dns-prefetch" href="https://ajax.googleapis.com">
        
        <!-- Preload Critical Resources -->
        <link rel="preload" href="{{ URL::asset('template/front/css/bootstrap.min.css') }}" as="style">
        <link rel="preload" href="{{ URL::asset('template/front/css/style.css') }}" as="style">
        
        <!-- Favicons - Simplified -->
        <link rel="icon" type="image/png" sizes="32x32" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{URL::asset('storage/'.$aplikasi->icon_aplikasis)}}">
        
        <!-- Preconnect untuk Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        
        <!-- Critical CSS - Load First -->
        <link rel="stylesheet" href="{{ URL::asset('template/front/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('template/front/css/style.css') }}">
        
        <!-- Non-Critical CSS - Load Asynchronously -->
        <link rel="preload" href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Inter:slnt,wght@-10..0,100..900&display=swap" rel="stylesheet"></noscript>
        
        <link rel="preload" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"></noscript>
        
        <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript><link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet"></noscript>
        
        <!-- Defer Non-Critical CSS -->
        <link rel="stylesheet" href="{{ URL::asset('template/front/lib/animate/animate.min.css') }}" media="print" onload="this.media='all'">
        <noscript><link rel="stylesheet" href="{{ URL::asset('template/front/lib/animate/animate.min.css') }}"></noscript>
        
        <link href="{{ URL::asset('template/front/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
        <noscript><link href="{{ URL::asset('template/front/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet"></noscript>
        
        <link href="{{ URL::asset('template/front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" media="print" onload="this.media='all'">
        <noscript><link href="{{ URL::asset('template/front/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet"></noscript>
        
        <link rel="stylesheet" href="{{URL::asset('template/back/vendors/fancybox/jquery.fancybox.min.css')}}" media="print" onload="this.media='all'">
        <noscript><link rel="stylesheet" href="{{URL::asset('template/back/vendors/fancybox/jquery.fancybox.min.css')}}"></noscript>
        
        <meta name="_token" content="{{ csrf_token() }}">
        
        <!-- Google Analytics - Async -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-QQE7Q13S85"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-QQE7Q13S85');
        </script>
        <style>
            /* Medical Store Theme - Elegant & Professional */
            :root {
                --medical-primary: #0066cc;
                --medical-secondary: #00a8e8;
                --medical-accent: #00d4aa;
                --medical-dark: #1a365d;
                --medical-light: #f0f9ff;
                --medical-gradient: linear-gradient(135deg, #0066cc 0%, #00a8e8 100%);
                --medical-gradient-dark: linear-gradient(135deg, #004d99 0%, #0077b6 100%);
            }
            
            body {
                font-family: 'Inter', 'DM Sans', sans-serif;
                overflow-x: hidden;
            }
            
            /* Smooth Scroll */
            html {
                scroll-behavior: smooth;
            }
            
            /* Navbar Elegant */
            .nav-bar {
                background: rgba(255, 255, 255, 0.98) !important;
                backdrop-filter: blur(20px);
                box-shadow: 0 2px 20px rgba(0, 102, 204, 0.08);
                transition: all 0.3s ease;
                position: sticky;
                top: 0;
                z-index: 1000;
                width: 100%;
            }
            
            .nav-bar .navbar {
                background: transparent;
            }
            
            .nav-bar.sticky-scrolled {
                box-shadow: 0 4px 30px rgba(0, 102, 204, 0.15);
            }
            
            .navbar-nav .nav-link {
                font-weight: 500;
                color: var(--medical-dark) !important;
                padding: 0.5rem 1.2rem !important;
                position: relative;
                transition: all 0.3s ease;
            }
            
            .navbar-nav .nav-link::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 50%;
                transform: translateX(-50%);
                width: 0;
                height: 3px;
                background: var(--medical-gradient);
                transition: width 0.3s ease;
                border-radius: 2px;
            }
            
            .navbar-nav .nav-link:hover::after,
            .navbar-nav .nav-link.active::after {
                width: 70%;
            }
            
            .navbar-nav .nav-link:hover,
            .navbar-nav .nav-link.active {
                color: var(--medical-primary) !important;
            }
            
            /* Hero Section - Elegant with Beautiful Blue Gradient */
            .header-carousel-item {
                position: relative;
                min-height: 90vh;
                display: flex;
                align-items: center;
                background: linear-gradient(135deg, #1e3c72 0%, #2a5298 25%, #4a90e2 50%, #5dade2 75%, #85c1e9 100%);
                background-size: 400% 400%;
                animation: gradientShift 15s ease infinite;
                overflow: hidden;
            }
            
            @keyframes gradientShift {
                0% { background-position: 0% 50%; }
                50% { background-position: 100% 50%; }
                100% { background-position: 0% 50%; }
            }
            
            .header-carousel-item::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: url('{{ URL::asset("storage/".$aplikasi->header_aplikasis) }}') center/cover;
                opacity: 0.2;
                z-index: 1;
            }
            
            .header-carousel-item::after {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: linear-gradient(135deg, rgba(30, 60, 114, 0.85) 0%, rgba(42, 82, 152, 0.85) 25%, rgba(74, 144, 226, 0.85) 50%, rgba(93, 173, 226, 0.85) 75%, rgba(133, 193, 233, 0.85) 100%);
                background-size: 400% 400%;
                animation: gradientShift 15s ease infinite;
                z-index: 2;
            }
            
            .carousel-caption {
                position: relative;
                z-index: 3;
            }
            
            .hero-content {
                animation: fadeInUp 1s ease-out;
            }
            
            .hero-badge {
                display: inline-block;
                padding: 8px 20px;
                background: rgba(255, 255, 255, 0.2);
                backdrop-filter: blur(10px);
                border-radius: 50px;
                color: white;
                font-size: 14px;
                font-weight: 600;
                margin-bottom: 20px;
                animation: fadeInDown 0.8s ease-out;
            }
            
            .hero-title {
                font-size: 3.5rem;
                font-weight: 800;
                line-height: 1.2;
                margin-bottom: 1.5rem;
                text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
                animation: fadeInUp 1s ease-out 0.2s both;
            }
            
            .hero-subtitle {
                font-size: 1.3rem;
                line-height: 1.8;
                opacity: 0.95;
                animation: fadeInUp 1s ease-out 0.4s both;
            }
            
            .hero-buttons {
                animation: fadeInUp 1s ease-out 0.6s both;
                width: 100%;
            }
            
            @media (max-width: 991px) {
                .hero-content {
                    text-align: center !important;
                }
                
                .hero-buttons {
                    justify-content: center !important;
                }
            }
            
            @media (min-width: 992px) {
                .hero-content.text-center.text-lg-start {
                    text-align: left !important;
                }
                
                .hero-buttons.justify-content-center.justify-content-lg-start {
                    justify-content: flex-start !important;
                }
            }
            
            .btn-medical {
                background: var(--medical-gradient);
                border: none;
                color: white;
                padding: 14px 35px;
                font-weight: 600;
                border-radius: 50px;
                transition: all 0.3s ease;
                box-shadow: 0 4px 15px rgba(0, 102, 204, 0.3);
                position: relative;
                overflow: hidden;
            }
            
            .btn-medical::before {
                content: '';
                position: absolute;
                top: 50%;
                left: 50%;
                width: 0;
                height: 0;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: translate(-50%, -50%);
                transition: width 0.6s, height 0.6s;
            }
            
            .btn-medical:hover::before {
                width: 300px;
                height: 300px;
            }
            
            .btn-medical:hover {
                transform: translateY(-3px);
                box-shadow: 0 6px 25px rgba(0, 102, 204, 0.4);
            }
            
            .btn-medical-outline {
                background: transparent;
                border: 2px solid white;
                color: white;
                padding: 14px 35px;
                font-weight: 600;
                border-radius: 50px;
                transition: all 0.3s ease;
            }
            
            .btn-medical-outline:hover {
                background: white;
                color: var(--medical-primary);
                transform: translateY(-3px);
                box-shadow: 0 6px 25px rgba(255, 255, 255, 0.3);
            }
            
            .btn-medical-outline.medical-primary {
                border-color: var(--medical-primary);
                color: var(--medical-primary);
            }
            
            .btn-medical-outline.medical-primary:hover {
                background: var(--medical-primary);
                color: white;
            }
            
            /* Dropdown Button Medical Style */
            .btn-medical.dropdown-toggle-split {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }
            
            .dropdown-menu {
                border: none;
                box-shadow: 0 10px 30px rgba(0, 102, 204, 0.15);
                border-radius: 10px;
                padding: 0.5rem;
                margin-top: 0.5rem;
            }
            
            .dropdown-item {
                border-radius: 8px;
                padding: 0.75rem 1rem;
                transition: all 0.3s ease;
            }
            
            .dropdown-item:hover {
                background: var(--medical-light);
                color: var(--medical-primary);
            }
            
            .dropdown-item i {
                width: 20px;
            }
            
            /* Footer Gradient & Wave - Override CSS lama dengan spesifisitas tinggi */
            div.footer-wrapper {
                position: relative !important;
                background: linear-gradient(135deg, #1a365d 0%, #0066cc 50%, #00a8e8 100%) !important;
                overflow: hidden !important;
                width: 100% !important;
                min-height: 100px !important;
            }
            
            /* Override CSS lama dari style.css */
            .footer-wrapper .footer,
            div.footer-wrapper div.footer,
            div.footer-wrapper .container-fluid.footer {
                background: transparent !important;
                background-color: transparent !important;
            }
            
            div.footer-wrapper::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: 
                    radial-gradient(circle at 20% 50%, rgba(0, 168, 232, 0.3) 0%, transparent 50%),
                    radial-gradient(circle at 80% 80%, rgba(0, 102, 204, 0.3) 0%, transparent 50%),
                    radial-gradient(circle at 40% 20%, rgba(0, 212, 170, 0.2) 0%, transparent 50%);
                animation: footerGradient 15s ease infinite;
                z-index: 0;
                pointer-events: none;
            }
            
            div.footer-wrapper svg.footer-wave {
                position: absolute !important;
                top: 0 !important;
                left: 0 !important;
                width: 100% !important;
                height: 120px !important;
                z-index: 1 !important;
                transform: translateY(-1px);
                pointer-events: none;
            }
            
            div.footer-wrapper svg.footer-wave .wave-path-1 {
                animation: elegantWave1 20s ease-in-out infinite;
                transform-origin: center;
            }
            
            div.footer-wrapper svg.footer-wave .wave-path-2 {
                animation: elegantWave2 25s ease-in-out infinite;
                animation-delay: 0.8s;
                transform-origin: center;
            }
            
            @keyframes elegantWave1 {
                0%, 100% {
                    d: path("M0,80 Q360,50 720,60 T1440,50 L1440,0 L0,0 Z");
                    opacity: 1;
                }
                50% {
                    d: path("M0,75 Q360,48 720,58 T1440,48 L1440,0 L0,0 Z");
                    opacity: 0.95;
                }
            }
            
            @keyframes elegantWave2 {
                0%, 100% {
                    d: path("M0,95 Q400,75 800,80 T1440,75 L1440,0 L0,0 Z");
                    opacity: 1;
                }
                50% {
                    d: path("M0,92 Q400,73 800,78 T1440,73 L1440,0 L0,0 Z");
                    opacity: 0.9;
                }
            }
            
            div.footer-wrapper div.footer.container-fluid {
                position: relative !important;
                z-index: 2 !important;
                background: transparent !important;
                background-color: transparent !important;
            }
            
            @keyframes footerGradient {
                0%, 100% {
                    opacity: 1;
                    transform: scale(1);
                }
                50% {
                    opacity: 0.8;
                    transform: scale(1.1);
                }
            }
            
            /* Footer Items - Override CSS lama dengan spesifisitas tinggi */
            div.footer-wrapper .footer-item a {
                color: rgba(255, 255, 255, 0.8) !important;
                text-decoration: none !important;
                transition: all 0.3s ease;
                display: block;
                padding: 0.5rem 0;
            }
            
            div.footer-wrapper .footer-item a:hover {
                color: white !important;
                padding-left: 0.5rem;
            }
            
            div.footer-wrapper .footer-btn .btn,
            div.footer-wrapper .footer-item .footer-btn a {
                background: rgba(255, 255, 255, 0.1) !important;
                border: 1px solid rgba(255, 255, 255, 0.2) !important;
                color: white !important;
                transition: all 0.3s ease;
            }
            
            div.footer-wrapper .footer-btn .btn:hover,
            div.footer-wrapper .footer-item .footer-btn a:hover {
                background: rgba(255, 255, 255, 0.2) !important;
                transform: translateY(-3px);
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            }
            
            div.footer-wrapper .footer-item .footer-btn a:hover i {
                color: white !important;
            }
            
            div.footer-wrapper .footer-instagram {
                position: relative;
                overflow: hidden;
                transition: all 0.3s ease;
            }
            
            div.footer-wrapper .footer-instagram:hover {
                transform: scale(1.05);
            }
            
            div.footer-wrapper .footer-search-icon {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0, 102, 204, 0.8) !important;
                display: flex;
                align-items: center;
                justify-content: center;
                opacity: 0;
                transition: opacity 0.3s ease;
            }
            
            div.footer-wrapper .footer-instagram:hover .footer-search-icon {
                opacity: 1;
            }
            
            div.footer-wrapper h3,
            div.footer-wrapper h4,
            div.footer-wrapper p,
            div.footer-wrapper span {
                color: white !important;
            }
            
            div.footer-wrapper .text-white {
                color: white !important;
            }
            
            /* Override semua CSS footer lama */
            div.footer-wrapper .footer-item .footer-btn a {
                background: rgba(255, 255, 255, 0.1) !important;
                color: white !important;
            }
            
            div.footer-wrapper .footer-item .footer-btn a:hover {
                background: rgba(255, 255, 255, 0.2) !important;
                color: white !important;
            }
            
            div.footer-wrapper .footer-item .footer-btn a:hover i {
                color: white !important;
            }
            
            div.footer-wrapper .footer-item a:hover {
                color: white !important;
            }
            
            /* Footer Contact Section - Fully Centered */
            div.footer-wrapper .footer-contact-section {
                width: 100%;
                padding: 2.5rem 0;
                border-top: 1px solid rgba(255, 255, 255, 0.08);
                text-align: center;
            }
            
            div.footer-wrapper .footer-contact-section .container {
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1rem;
            }
            
            /* Footer Contact Items - Compact & Elegant - Fully Centered */
            div.footer-wrapper .footer-contact-container {
                display: flex !important;
                flex-direction: row !important;
                flex-wrap: nowrap !important;
                justify-content: center !important;
                align-items: center !important;
                width: 100% !important;
                margin: 0 auto !important;
                gap: 2rem;
            }
            
            div.footer-wrapper .footer-contact-item-wrapper {
                flex: 0 0 auto;
                flex-shrink: 0;
                flex-grow: 0;
                width: auto;
                min-width: 250px;
                max-width: 350px;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            
            div.footer-wrapper .footer-contact-item {
                text-align: center !important;
                display: flex;
                flex-direction: column;
                align-items: center !important;
                justify-content: center !important;
                width: 100%;
                max-width: 100%;
            }
            
            div.footer-wrapper .footer-contact-icon {
                width: 45px;
                height: 45px;
                min-width: 45px;
                background: rgba(255, 255, 255, 0.15);
                border-radius: 12px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin-bottom: 1rem;
                flex-shrink: 0;
                margin-left: auto !important;
                margin-right: auto !important;
            }
            
            div.footer-wrapper .footer-contact-icon i {
                font-size: 1.1rem;
                color: white;
            }
            
            div.footer-wrapper .footer-contact-title {
                font-size: 1rem;
                font-weight: 600;
                color: white !important;
                margin-bottom: 0.5rem;
                line-height: 1.3;
                text-align: center !important;
                width: 100%;
                margin-left: auto;
                margin-right: auto;
            }
            
            div.footer-wrapper .footer-contact-text {
                font-size: 0.9rem;
                color: rgba(255, 255, 255, 0.85) !important;
                margin-bottom: 0;
                line-height: 1.6;
                text-align: center !important;
                width: 100%;
                margin-left: auto;
                margin-right: auto;
                word-wrap: break-word;
                overflow-wrap: break-word;
            }
            
            div.footer-wrapper .footer-contact-text * {
                text-align: center !important;
                display: block;
                margin-left: auto;
                margin-right: auto;
            }
            
            @media (max-width: 991px) {
                div.footer-wrapper .footer-contact-section {
                    padding: 2rem 0;
                }
                
                div.footer-wrapper .footer-contact-container {
                    flex-wrap: wrap !important;
                    gap: 1.5rem;
                }
                
                div.footer-wrapper .footer-contact-item-wrapper {
                    min-width: 100%;
                    max-width: 100%;
                    margin-bottom: 0;
                }
            }
            
            @media (max-width: 768px) {
                div.footer-wrapper .footer-contact-section {
                    padding: 1.5rem 0;
                }
                
                div.footer-wrapper .footer-contact-section .container {
                    padding: 0 0.5rem;
                }
                
                div.footer-wrapper .footer-contact-container {
                    gap: 1rem;
                }
                
                div.footer-wrapper .footer-contact-icon {
                    width: 40px;
                    height: 40px;
                    min-width: 40px;
                }
                
                div.footer-wrapper .footer-contact-icon i {
                    font-size: 1rem;
                }
                
                div.footer-wrapper .footer-contact-title {
                    font-size: 0.95rem;
                }
                
                div.footer-wrapper .footer-contact-text {
                    font-size: 0.85rem;
                }
            }
            
            /* Feature Cards - Modern */
            .feature-card {
                background: white;
                border-radius: 20px;
                padding: 2.5rem;
                height: 100%;
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                border: 1px solid rgba(0, 102, 204, 0.1);
                position: relative;
                overflow: hidden;
            }
            
            .feature-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: var(--medical-gradient);
                opacity: 0.05;
                transition: left 0.5s ease;
            }
            
            .feature-card:hover::before {
                left: 0;
            }
            
            .feature-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 40px rgba(0, 102, 204, 0.15);
                border-color: var(--medical-primary);
            }
            
            .feature-icon-wrapper {
                width: 90px;
                height: 90px;
                background: var(--medical-gradient);
                border-radius: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                margin: 0 auto 1.5rem;
                transition: all 0.4s ease;
                box-shadow: 0 10px 25px rgba(0, 102, 204, 0.2);
            }
            
            .feature-card:hover .feature-icon-wrapper {
                transform: rotateY(360deg) scale(1.1);
                box-shadow: 0 15px 35px rgba(0, 102, 204, 0.3);
            }
            
            .feature-icon-wrapper i {
                font-size: 2.5rem;
                color: white;
            }
            
            /* Product Cards - Elegant */
            .product-card-medical {
                background: white;
                border-radius: 20px;
                overflow: hidden;
                transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                border: 1px solid rgba(0, 102, 204, 0.1);
                height: 100%;
            }
            
            .product-card-medical:hover {
                transform: translateY(-12px) scale(1.02);
                box-shadow: 0 25px 50px rgba(0, 102, 204, 0.2);
            }
            
            .product-image-wrapper {
                position: relative;
                overflow: hidden;
                aspect-ratio: 1 / 1;
                background: #f8f9fa;
            }
            
            .product-image-wrapper img {
                transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            }
            
            .product-card-medical:hover .product-image-wrapper img {
                transform: scale(1.15) rotate(2deg);
            }
            
            .product-overlay-medical {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: var(--medical-gradient);
                opacity: 0;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: opacity 0.4s ease;
            }
            
            .product-card-medical:hover .product-overlay-medical {
                opacity: 0.9;
            }
            
            .product-overlay-medical i {
                font-size: 3rem;
                color: white;
                animation: pulse 2s infinite;
            }
            
            /* Service Cards */
            .service-card-medical {
                background: white;
                border-radius: 20px;
                overflow: hidden;
                transition: all 0.4s ease;
                box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
                height: 100%;
            }
            
            .service-card-medical:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 40px rgba(0, 102, 204, 0.15);
            }
            
            .service-image-medical {
                position: relative;
                overflow: hidden;
                aspect-ratio: 16/9;
            }
            
            .service-icon-medical {
                position: absolute;
                bottom: -30px;
                left: 50%;
                transform: translateX(-50%);
                width: 80px;
                height: 80px;
                background: var(--medical-gradient);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 10px 25px rgba(0, 102, 204, 0.3);
                transition: all 0.4s ease;
                z-index: 2;
            }
            
            .service-card-medical:hover .service-icon-medical {
                bottom: -20px;
                transform: translateX(-50%) scale(1.1) rotate(360deg);
            }
            
            .service-icon-medical i {
                font-size: 2rem;
                color: white;
            }
            
            /* Testimonial Cards */
            .testimonial-card-medical {
                background: white;
                border-radius: 20px;
                overflow: hidden;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                transition: all 0.4s ease;
            }
            
            .testimonial-card-medical:hover {
                transform: translateY(-8px);
                box-shadow: 0 20px 40px rgba(0, 102, 204, 0.15);
            }
            
            .testimonial-rating {
                color: #ffc107;
                font-size: 0.75rem;
                margin-bottom: 0.5rem;
                display: flex;
                gap: 2px;
                flex-wrap: wrap;
            }
            
            .testimonial-rating i {
                font-size: 0.75rem;
                line-height: 1;
            }
            
            @media (max-width: 768px) {
                .testimonial-rating {
                    font-size: 0.65rem;
                }
                
                .testimonial-rating i {
                    font-size: 0.65rem;
                }
            }
            
            /* Accordion Medical Style */
            .accordion-medical .accordion-button {
                background: white;
                border: none;
                border-bottom: 2px solid #f0f0f0;
                font-weight: 600;
                color: var(--medical-dark);
                padding: 1.25rem;
                transition: all 0.3s ease;
            }
            
            .accordion-medical .accordion-button:not(.collapsed) {
                background: var(--medical-light);
                color: var(--medical-primary);
                border-bottom-color: var(--medical-primary);
            }
            
            .accordion-medical .accordion-button::after {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%230066cc'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
            }
            
            /* Section Headers */
            .section-header {
                position: relative;
                margin-bottom: 4rem;
            }
            
            .section-badge {
                display: block;
                padding: 8px 20px;
                background: var(--medical-gradient);
                color: white;
                border-radius: 50px;
                font-size: 14px;
                font-weight: 600;
                margin-bottom: 1.5rem;
                animation: fadeInDown 0.8s ease-out;
                width: fit-content;
                margin-left: auto;
                margin-right: auto;
            }
            
            .section-title {
                font-size: 2.5rem;
                font-weight: 800;
                color: var(--medical-dark);
                margin-bottom: 1rem;
                position: relative;
                display: block;
                width: 100%;
            }
            
            .section-title::after {
                content: '';
                position: absolute;
                bottom: -10px;
                left: 50%;
                transform: translateX(-50%);
                width: 80px;
                height: 4px;
                background: var(--medical-gradient);
                border-radius: 2px;
            }
            
            /* Animations */
            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            @keyframes fadeInDown {
                from {
                    opacity: 0;
                    transform: translateY(-30px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }
            
            @keyframes pulse {
                0%, 100% {
                    transform: scale(1);
                }
                50% {
                    transform: scale(1.1);
                }
            }
            
            @keyframes float {
                0%, 100% {
                    transform: translateY(0px);
                }
                50% {
                    transform: translateY(-20px);
                }
            }
            
            .float-animation {
                animation: float 3s ease-in-out infinite;
            }
            
            /* Breadcrumb */
            .bg-breadcrumb {
                position: relative;
                overflow: hidden;
                background: var(--medical-gradient-dark);
                background-image: url('{{ URL::asset("storage/".$aplikasi->header_aplikasis) }}');
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;
                padding: 100px 0 80px 0;
                transition: 0.5s;
            }
            
            .bg-breadcrumb::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: var(--medical-gradient-dark);
                opacity: 0.9;
            }
            
            /* Back to Top Button */
            .back-to-top {
                background: var(--medical-gradient) !important;
                width: 50px;
                height: 50px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 4px 15px rgba(0, 102, 204, 0.3);
                transition: all 0.3s ease;
            }
            
            .back-to-top:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 25px rgba(0, 102, 204, 0.4);
            }
            
            /* Primary Color Override */
            .text-primary {
                color: var(--medical-primary) !important;
            }
            
            .btn-primary {
                background: var(--medical-gradient) !important;
                border: none !important;
            }
            
            .btn-primary:hover {
                background: var(--medical-gradient-dark) !important;
                transform: translateY(-2px);
                box-shadow: 0 6px 20px rgba(0, 102, 204, 0.3);
            }
            
            /* Smooth Transitions */
            * {
                transition: color 0.3s ease, background-color 0.3s ease, border-color 0.3s ease;
            }
            
            /* Min Height Helper */
            .min-vh-90 {
                min-height: 90vh;
            }
            
            /* Hero Image Wrapper */
            .hero-image-wrapper {
                position: relative;
                z-index: 3;
            }
            
            /* Responsive Adjustments */
            @media (max-width: 768px) {
                .hero-title {
                    font-size: 2.5rem;
                }
                
                .section-title {
                    font-size: 2rem;
                }
                
                .feature-card,
                .product-card-medical,
                .service-card-medical {
                    margin-bottom: 1.5rem;
                }
            }
        </style>
        <meta name="google-site-verification" content="rYhfM6tdss674E0yspPsQ6UG44iuwqB0vkMTx3XUxQo" />
    </head>

    <body>
        @include('layouts.front.loader')
        @include('layouts.front.topbar')
        @include('layouts.front.navbar')
        @yield('content')
        @include('layouts.front.footer')
        @include('layouts.front.copyright')

        <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        <!-- Critical JS - Load Synchronously (jQuery needed for other scripts) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        
        <!-- Non-Critical JS - Load with Defer -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" defer></script>
        <script src="{{ URL::asset('template/front/lib/wow/wow.min.js') }}" defer></script>
        <script src="{{ URL::asset('template/front/lib/easing/easing.min.js') }}" defer></script>
        <script src="{{ URL::asset('template/front/lib/waypoints/waypoints.min.js') }}" defer></script>
        <script src="{{ URL::asset('template/front/lib/counterup/counterup.min.js') }}" defer></script>
        <script src="{{ URL::asset('template/front/lib/lightbox/js/lightbox.min.js') }}" defer></script>
        <script src="{{ URL::asset('template/front/lib/owlcarousel/owl.carousel.min.js') }}" defer></script>
        <script src="{{ URL::asset('template/front/js/main.js') }}" defer></script>
        <script src="{{URL::asset('template/back/vendors/fancybox/jquery.fancybox.min.js')}}" defer></script>
        
        <!-- Structured Data (JSON-LD) -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "MedicalBusiness",
            "name": "{{$app_name}}",
            "description": "{{strip_tags($app_desc)}}",
            "url": "{{url('/')}}",
            "logo": "{{URL::asset('storage/'.($aplikasi->logo_aplikasis ?? 'template/front/img/logo.png'))}}",
            "image": "{{URL::asset('storage/'.($aplikasi->logo_aplikasis ?? 'template/front/img/logo.png'))}}",
            @if($kontak)
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "{{$kontak->alamat_kontaks ?? ''}}",
                "addressLocality": "Magelang",
                "addressRegion": "Jawa Tengah",
                "postalCode": "56192",
                "addressCountry": "ID"
            },
            "telephone": "{{$kontak->telepon_kontaks ?? ''}}",
            "email": "{{$kontak->email_kontaks ?? ''}}",
            @if($kontak->latitude_kontaks && $kontak->longitude_kontaks)
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": "{{$kontak->latitude_kontaks}}",
                "longitude": "{{$kontak->longitude_kontaks}}"
            },
            @endif
            @endif
            "priceRange": "$$",
            "openingHoursSpecification": [
                {
                    "@type": "OpeningHoursSpecification",
                    "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                    "opens": "08:00",
                    "closes": "17:00"
                }
            ],
            "sameAs": [
                @if($sosial_medias && count($sosial_medias) > 0)
                @foreach($sosial_medias as $index => $sosial_media)
                "{{$sosial_media->url_sosial_media}}"@if($index < count($sosial_medias) - 1),@endif
                @endforeach
                @endif
            ],
            "areaServed": {
                "@type": "Country",
                "name": "Indonesia"
            },
            "hasOfferCatalog": {
                "@type": "OfferCatalog",
                "name": "Katalog Produk Alat Kesehatan",
                "itemListElement": {
                    "@type": "ItemList",
                    "url": "{{url('/katalog')}}"
                }
            }
        }
        </script>
        
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "{{$app_name}}",
            "url": "{{url('/')}}",
            "logo": "{{URL::asset('storage/'.($aplikasi->logo_aplikasis ?? 'template/front/img/logo.png'))}}",
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "{{$kontak->telepon_kontaks ?? ''}}",
                "contactType": "customer service",
                "areaServed": "ID",
                "availableLanguage": ["Indonesian"]
            },
            "sameAs": [
                @if($sosial_medias && count($sosial_medias) > 0)
                @foreach($sosial_medias as $index => $sosial_media)
                "{{$sosial_media->url_sosial_media}}"@if($index < count($sosial_medias) - 1),@endif
                @endforeach
                @endif
            ]
        }
        </script>
        
        @yield('structured_data')
        
        <!-- Inline script untuk load CSS async -->
        <script>
        /*! loadCSS fallback untuk browser yang tidak support */
        (function(w){"use strict";if(!w.loadCSS){w.loadCSS=function(){}}
        var loadCSS=function(href,media,rel){var doc=w.document;var ss=doc.createElement("link");var ref;if(rel){ref=rel}else{ref=ss.previousElementSibling}
        var sheets=doc.styleSheets;ss.rel="stylesheet";ss.href=href;ss.media="only x";
        function ready(cb){if(doc.body){return cb()}
        setTimeout(function(){ready(cb)},1)}
        ready(function(){ref.parentNode.insertBefore(ss,ref.nextSibling)});var onloadcssdefined=function(cb){var resolvedHref=ss.href;var i=sheets.length;while(i--){if(sheets[i].href===resolvedHref){return cb()}}
        setTimeout(function(){onloadcssdefined(cb)})}
        ss.addEventListener("load",function(){ss.media=media||"all"})
        ss.onloadcssdefined=onloadcssdefined;onloadcssdefined(function(){ss.media!==media&&(ss.media=media||"all")});return ss}
        w.loadCSS=loadCSS})(typeof global!=="undefined"?global:this);
        </script>
    </body>

</html>