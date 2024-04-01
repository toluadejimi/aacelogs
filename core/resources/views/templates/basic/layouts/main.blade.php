<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="theme-color" content="#2196f3">
    <meta name="author" content="DexignZone"/>
    <meta name="keywords" content=""/>
    <meta name="robots" content=""/>
    <meta name="description" content="Acelogstore"/>
    <meta property="og:title" content="Acelogstore"/>
    <meta property="og:description" content="Acelogstore"/>
    <meta name="format-detection" content="telephone=no">

    @laravelPWA

    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('') }}/assets/assets/images/fav.svg"/>

    <!-- Title -->
    <title>ACELOGSTORE</title>

    <!-- PWA Version -->
    <link rel="manifest" href="manifest.json">

    <!-- Stylesheets -->
    <link rel="stylesheet"
          href="{{ url('') }}/assets/assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/assets/css/style.css">

    <!-- Material Icons -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>

    <!-- Bootstrap 5 CSS -->

{{--    <!-- Laravel PWA -->--}}
{{--    @laravelPWA--}}


    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Roboto+Slab:wght@100;300;500;600;800&display=swap"
        rel="stylesheet">



    <style>
        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:100px;
            left:40px;
            background-color: #020000;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
        }

        .my-float{
            margin-top:16px;
        }
    </style>

</head>

</head>

<body class="bg-white">
<div class="page-wraper">




    <!-- Header -->


    @if(Route::current()->getName() === 'products')
    <header class="header transparent">
        <div class="main-bar">
            <div class="container">
                <div class="header-content">
                    <div class="left-content">
                        <a href="javascript:void(0);" class="menu-toggler">
                            <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 0 24 24"
                                 width="30px" fill="#000000">
                                <path
                                    d="M13 14v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1h-6c-.55 0-1 .45-1 1zm-9 7h6c.55 0 1-.45 1-1v-6c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v6c0 .55.45 1 1 1zM3 4v6c0 .55.45 1 1 1h6c.55 0 1-.45 1-1V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1zm12.95-1.6L11.7 6.64c-.39.39-.39 1.02 0 1.41l4.25 4.25c.39.39 1.02.39 1.41 0l4.25-4.25c.39-.39.39-1.02 0-1.41L17.37 2.4c-.39-.39-1.03-.39-1.42 0z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="mid-content">
                    </div>
                    <div class="right-content">
                        <a href="javascript:void(0);" class="theme-color" data-bs-toggle="offcanvas"
                           data-bs-target="#offcanvasBottom" aria-controls="offcanvasBottom">

                            <img src="{{ url('') }}/assets/assets/images/fav.svg">

                        </a>
                        <a href="javascript:void(0);" class="theme-btn">
                            <svg class="dark" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                 height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <g></g>
                                <g>
                                    <g>
                                        <g>
                                            <path
                                                d="M11.57,2.3c2.38-0.59,4.68-0.27,6.63,0.64c0.35,0.16,0.41,0.64,0.1,0.86C15.7,5.6,14,8.6,14,12s1.7,6.4,4.3,8.2 c0.32,0.22,0.26,0.7-0.09,0.86C16.93,21.66,15.5,22,14,22c-6.05,0-10.85-5.38-9.87-11.6C4.74,6.48,7.72,3.24,11.57,2.3z"/>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <svg class="light" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                 height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <rect fill="none" height="24" width="24"/>
                                <path
                                    d="M12,7c-2.76,0-5,2.24-5,5s2.24,5,5,5s5-2.24,5-5S14.76,7,12,7L12,7z M2,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0 c-0.55,0-1,0.45-1,1S1.45,13,2,13z M20,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0c-0.55,0-1,0.45-1,1S19.45,13,20,13z M11,2v2 c0,0.55,0.45,1,1,1s1-0.45,1-1V2c0-0.55-0.45-1-1-1S11,1.45,11,2z M11,20v2c0,0.55,0.45,1,1,1s1-0.45,1-1v-2c0-0.55-0.45-1-1-1 C11.45,19,11,19.45,11,20z M5.99,4.58c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41l1.06,1.06 c0.39,0.39,1.03,0.39,1.41,0s0.39-1.03,0-1.41L5.99,4.58z M18.36,16.95c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41 l1.06,1.06c0.39,0.39,1.03,0.39,1.41,0c0.39-0.39,0.39-1.03,0-1.41L18.36,16.95z M19.42,5.99c0.39-0.39,0.39-1.03,0-1.41 c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L19.42,5.99z M7.05,18.36 c0.39-0.39,0.39-1.03,0-1.41c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L7.05,18.36z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    @else
        <header class="header">
            <div class="main-bar">
                <div class="container">
                    <div class="header-content">
                        <div class="left-content">
                            <a href="javascript:void(0);" class="back-btn">
                                <svg width="20" height="20" viewBox="0 0 36 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.12781 14.0645H34.3778C34.7922 14.0645 35.1896 14.2291 35.4827 14.5221C35.7757 14.8151 35.9403 15.2126 35.9403 15.627C35.9403 16.0414 35.7757 16.4388 35.4827 16.7318C35.1896 17.0248 34.7922 17.1895 34.3778 17.1895H3.12781C2.71341 17.1895 2.31598 17.0248 2.02295 16.7318C1.72993 16.4388 1.56531 16.0414 1.56531 15.627C1.56531 15.2126 1.72993 14.8151 2.02295 14.5221C2.31598 14.2291 2.71341 14.0645 3.12781 14.0645Z" fill="#5E5E5E"/>
                                    <path d="M3.77467 15.627L16.734 28.5832C17.0274 28.8766 17.1923 29.2745 17.1923 29.6895C17.1923 30.1044 17.0274 30.5023 16.734 30.7957C16.4406 31.0891 16.0427 31.2539 15.6278 31.2539C15.2129 31.2539 14.8149 31.0891 14.5215 30.7957L0.459043 16.7332C0.313533 16.5881 0.198087 16.4157 0.119317 16.2258C0.0405464 16.036 0 15.8325 0 15.627C0 15.4215 0.0405464 15.2179 0.119317 15.0281C0.198087 14.8383 0.313533 14.6659 0.459043 14.5207L14.5215 0.458223C14.8149 0.164828 15.2129 0 15.6278 0C16.0427 0 16.4406 0.164828 16.734 0.458223C17.0274 0.751619 17.1923 1.14955 17.1923 1.56447C17.1923 1.9794 17.0274 2.37733 16.734 2.67072L3.77467 15.627Z" fill="#5E5E5E"/>
                                </svg>

                            </a>
                            @if(Route::current()->getName() ===  'user.deposit.new')
                            <h5 class="mb-0 ms-2 text-nowrap">Fund Wallet</h5>
                            @endif
                        </div>
                        <div class="mid-content">
                        </div>

                        <div class="right-content d-flex align-items-center">
                            <a href="javascript:void(0);" class="item-bookmark icon-2 mt-2">
                                <img src="{{url('')}}/assets/assets/images/wallet.svg" alt="wallet-image" width="30" height="30">
                                <span class="text-muted text-bold">{{number_format(Auth::user()->balance, 2)}}</span><br>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </header>
    @endif




    <!-- Header End -->

    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader end-->

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="author-box">
            <div class="dz-media">
                <img src="{{ url('') }}/assets/assets/images/emoji/emoji-1.png" alt="author-image">
            </div>
            <div class="dz-info">
                <span>Hi</span>
                @auth
                <h5 class="name">{{Auth::user()->username}}</h5>
                @endauth
            </div>
        </div>


        <ul class="nav navbar-nav">
            <li class="nav-label">Main Menu</li>

            <li><a class="nav-link" href="/">
                        <span class="dz-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                 width="24px" fill="#000000">
                                <path
                                    d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/>
                            </svg>
                        </span>
                    <span>Home</span>
                </a></li>
            <li><a class="nav-link" href="/user/orders">
                        <span class="dz-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                 width="24px" fill="#000000">
                                <path
                                    d="M12.6 18.06c-.36.28-.87.28-1.23 0l-6.15-4.78c-.36-.28-.86-.28-1.22 0-.51.4-.51 1.17 0 1.57l6.76 5.26c.72.56 1.73.56 2.46 0l6.76-5.26c.51-.4.51-1.17 0-1.57l-.01-.01c-.36-.28-.86-.28-1.22 0l-6.15 4.79zm.63-3.02l6.76-5.26c.51-.4.51-1.18 0-1.58l-6.76-5.26c-.72-.56-1.73-.56-2.46 0L4.01 8.21c-.51.4-.51 1.18 0 1.58l6.76 5.26c.72.56 1.74.56 2.46-.01z"/>
                            </svg>
                        </span>
                    <span>Orders</span>
                </a></li>



            <li><a class="nav-link" href="/user/deposit/new">
                        <span class="dz-icon">
                             <svg width="24" height="24" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M2.11538 2.74541C1.55435 2.74541 1.01629 2.99027 0.619582 3.42613C0.22287 3.862 0 4.45315 0 5.06955V12.6759C0 13.2923 0.22287 13.8834 0.619582 14.3193C1.01629 14.7551 1.55435 15 2.11538 15H12.8846C13.4457 15 13.9837 14.7551 14.3804 14.3193C14.7771 13.8834 15 13.2923 15 12.6759V5.06955C15 4.45315 14.7771 3.862 14.3804 3.42613C13.9837 2.99027 13.4457 2.74541 12.8846 2.74541H2.11538ZM10.9615 7.81627C10.7065 7.81627 10.462 7.92758 10.2816 8.1257C10.1013 8.32382 10 8.59252 10 8.87271C10 9.15289 10.1013 9.4216 10.2816 9.61972C10.462 9.81783 10.7065 9.92914 10.9615 9.92914C11.2166 9.92914 11.4611 9.81783 11.6414 9.61972C11.8218 9.4216 11.9231 9.15289 11.9231 8.87271C11.9231 8.59252 11.8218 8.32382 11.6414 8.1257C11.4611 7.92758 11.2166 7.81627 10.9615 7.81627Z"
                              fill="#C1C9D9"/>
                        <path
                            d="M10.95 0.0569996C11.1778 -0.00968363 11.4164 -0.0179794 11.6475 0.0327525C11.8787 0.0834844 12.0961 0.191887 12.2831 0.349595C12.47 0.507302 12.6215 0.710096 12.7258 0.942326C12.8301 1.17456 12.8844 1.43001 12.8846 1.68897H5.19231L10.95 0.0569996Z"
                            fill="#C1C9D9"/>
                    </svg>
                        </span>
                    <span>Wallet</span>
                </a></li>





            <li><a class="nav-link" href="profile.html">
                        <span class="dz-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                 width="24px" fill="#000000">
                                <path
                                    d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v1c0 .55.45 1 1 1h14c.55 0 1-.45 1-1v-1c0-2.66-5.33-4-8-4z"/>
                            </svg>
                        </span>
                    <span>Profile</span>
                </a></li>



            <li><a class="nav-link" href="/contact">
                        <span class="dz-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                 width="24px" fill="#000000">
                                <path
                                    d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM7 9h10c.55 0 1 .45 1 1s-.45 1-1 1H7c-.55 0-1-.45-1-1s.45-1 1-1zm6 5H7c-.55 0-1-.45-1-1s.45-1 1-1h6c.55 0 1 .45 1 1s-.45 1-1 1zm4-6H7c-.55 0-1-.45-1-1s.45-1 1-1h10c.55 0 1 .45 1 1s-.45 1-1 1z"/>
                            </svg>
                        </span>
                    <span>Support</span>
                    <span class="badge badge-circle badge-info">5</span>
                </a></li>



            @auth
            <li><a class="nav-link" href="/user/logout">
                        <span class="dz-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                                 viewBox="0 0 24 24" width="24px" fill="#000000">
                                <g></g>
                                <g>
                                    <g>
                                        <path
                                            d="M5,5h6c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h6c0.55,0,1-0.45,1-1v0 c0-0.55-0.45-1-1-1H5V5z"/>
                                        <path
                                            d="M20.65,11.65l-2.79-2.79C17.54,8.54,17,8.76,17,9.21V11h-7c-0.55,0-1,0.45-1,1v0c0,0.55,0.45,1,1,1h7v1.79 c0,0.45,0.54,0.67,0.85,0.35l2.79-2.79C20.84,12.16,20.84,11.84,20.65,11.65z"/>
                                    </g>
                                </g>
                            </svg>
                        </span>
                    <span>Logout</span>
                </a></li>
            @else

                <li><a class="nav-link" href="/login">
                        <span class="dz-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px"
                                 viewBox="0 0 24 24" width="24px" fill="#000000">
                                <g></g>
                                <g>
                                    <g>
                                        <path
                                            d="M5,5h6c0.55,0,1-0.45,1-1v0c0-0.55-0.45-1-1-1H5C3.9,3,3,3.9,3,5v14c0,1.1,0.9,2,2,2h6c0.55,0,1-0.45,1-1v0 c0-0.55-0.45-1-1-1H5V5z"/>
                                        <path
                                            d="M20.65,11.65l-2.79-2.79C17.54,8.54,17,8.76,17,9.21V11h-7c-0.55,0-1,0.45-1,1v0c0,0.55,0.45,1,1,1h7v1.79 c0,0.45,0.54,0.67,0.85,0.35l2.79-2.79C20.84,12.16,20.84,11.84,20.65,11.65z"/>
                                    </g>
                                </g>
                            </svg>
                        </span>
                        <span>Login</span>
                    </a></li>


            @endauth




            <li class="nav-label">Settings</li>

            <li>
                <div class="mode">
                        <span class="dz-icon">
                            <svg class="dark" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                 height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                <g></g>
                                <g>
                                    <g>
                                        <g>
                                            <path
                                                d="M11.57,2.3c2.38-0.59,4.68-0.27,6.63,0.64c0.35,0.16,0.41,0.64,0.1,0.86C15.7,5.6,14,8.6,14,12s1.7,6.4,4.3,8.2 c0.32,0.22,0.26,0.7-0.09,0.86C16.93,21.66,15.5,22,14,22c-6.05,0-10.85-5.38-9.87-11.6C4.74,6.48,7.72,3.24,11.57,2.3z"/>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </span>
                    <span class="text-dark">Dark Mode</span>
                    <div class="custom-switch">
                        <input type="checkbox" class="switch-input theme-btn" id="toggle-dark-menu">
                        <label class="custom-switch-label" for="toggle-dark-menu"></label>
                    </div>
                </div>
            </li>
        </ul>
        <div class="sidebar-bottom">
            <h6 class="name">♠️ ACELOGSTORE</h6>
            <p>App Version 1.0</p>
        </div>
    </div>
    <!-- Sidebar End -->

    @yield('content')






    <!-- Menubar -->
    <div class="menubar-area" style="font-size: 10px">
        <div class="toolbar-inner menubar-nav" style="font-size: 10px">

            @if(Route::current()->getName() === 'user.deposit.new')
                <a href="/user/deposit/new" class="nav-link active">
                    <svg width="20" height="20" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M2.11538 2.74541C1.55435 2.74541 1.01629 2.99027 0.619582 3.42613C0.22287 3.862 0 4.45315 0 5.06955V12.6759C0 13.2923 0.22287 13.8834 0.619582 14.3193C1.01629 14.7551 1.55435 15 2.11538 15H12.8846C13.4457 15 13.9837 14.7551 14.3804 14.3193C14.7771 13.8834 15 13.2923 15 12.6759V5.06955C15 4.45315 14.7771 3.862 14.3804 3.42613C13.9837 2.99027 13.4457 2.74541 12.8846 2.74541H2.11538ZM10.9615 7.81627C10.7065 7.81627 10.462 7.92758 10.2816 8.1257C10.1013 8.32382 10 8.59252 10 8.87271C10 9.15289 10.1013 9.4216 10.2816 9.61972C10.462 9.81783 10.7065 9.92914 10.9615 9.92914C11.2166 9.92914 11.4611 9.81783 11.6414 9.61972C11.8218 9.4216 11.9231 9.15289 11.9231 8.87271C11.9231 8.59252 11.8218 8.32382 11.6414 8.1257C11.4611 7.92758 11.2166 7.81627 10.9615 7.81627Z"
                              fill="url(#paint0_linear_50_447)"/>
                        <path
                            d="M10.95 0.0569996C11.1778 -0.00968363 11.4164 -0.0179794 11.6475 0.0327525C11.8787 0.0834844 12.0961 0.191887 12.2831 0.349595C12.47 0.507302 12.6215 0.710096 12.7258 0.942326V0.942326C12.8998 1.32968 12.5402 1.68897 12.1156 1.68897H11.1768C10.2113 1.68897 10.0211 0.320298 10.95 0.0569996V0.0569996Z"
                            fill="url(#paint1_linear_50_447)"/>
                        <defs>
                            <linearGradient id="paint0_linear_50_447" x1="0" y1="8.87271" x2="15" y2="8.87271"
                                            gradientUnits="userSpaceOnUse">
                                <stop stop-color="#0F0673"/>
                                <stop offset="1" stop-color="#B00BD9"/>
                            </linearGradient>
                            <linearGradient id="paint1_linear_50_447" x1="5.19231" y1="0.844487" x2="12.8846"
                                            y2="0.844487" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#0F0673"/>
                                <stop offset="1" stop-color="#B00BD9"/>
                            </linearGradient>
                        </defs>
                    </svg>

                    <p class="text-small my-2">Wallet</p>

                </a>



            @else

                <a href="/user/deposit/new" class="nav-link">


                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M2.11538 2.74541C1.55435 2.74541 1.01629 2.99027 0.619582 3.42613C0.22287 3.862 0 4.45315 0 5.06955V12.6759C0 13.2923 0.22287 13.8834 0.619582 14.3193C1.01629 14.7551 1.55435 15 2.11538 15H12.8846C13.4457 15 13.9837 14.7551 14.3804 14.3193C14.7771 13.8834 15 13.2923 15 12.6759V5.06955C15 4.45315 14.7771 3.862 14.3804 3.42613C13.9837 2.99027 13.4457 2.74541 12.8846 2.74541H2.11538ZM10.9615 7.81627C10.7065 7.81627 10.462 7.92758 10.2816 8.1257C10.1013 8.32382 10 8.59252 10 8.87271C10 9.15289 10.1013 9.4216 10.2816 9.61972C10.462 9.81783 10.7065 9.92914 10.9615 9.92914C11.2166 9.92914 11.4611 9.81783 11.6414 9.61972C11.8218 9.4216 11.9231 9.15289 11.9231 8.87271C11.9231 8.59252 11.8218 8.32382 11.6414 8.1257C11.4611 7.92758 11.2166 7.81627 10.9615 7.81627Z"
                              fill="#C1C9D9"/>
                        <path
                            d="M10.95 0.0569996C11.1778 -0.00968363 11.4164 -0.0179794 11.6475 0.0327525C11.8787 0.0834844 12.0961 0.191887 12.2831 0.349595C12.47 0.507302 12.6215 0.710096 12.7258 0.942326C12.8301 1.17456 12.8844 1.43001 12.8846 1.68897H5.19231L10.95 0.0569996Z"
                            fill="#C1C9D9"/>
                    </svg>

                    <p class="text-small my-2">Wallet</p>

                </a>

            @endif




            <a href="/user/orders" class="nav-link">
                <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M1.27866 13.3041V4.06117L0.0732802 1.22047C-0.0174476 1.00848 -0.0239282 0.792812 0.0538385 0.573471C0.131605 0.354129 0.267697 0.195276 0.462114 0.0969109C0.65653 -0.002019 0.854317 -0.0124773 1.05547 0.0655361C1.25663 0.143549 1.40231 0.28827 1.49252 0.499697L2.98953 4.01878H12.0105L13.5075 0.499697C13.5982 0.287704 13.7441 0.13931 13.9453 0.0545124C14.1465 -0.0302847 14.344 -0.0161519 14.5379 0.0969109C14.7323 0.195841 14.8684 0.354977 14.9462 0.574319C15.0239 0.79366 15.0174 1.00905 14.9267 1.22047L13.7213 4.06117V13.3041C13.7213 13.7704 13.5692 14.1698 13.2648 14.5022C12.9605 14.8346 12.5942 15.0006 12.166 15H2.834C2.40628 15 2.04026 14.8341 1.73593 14.5022C1.43161 14.1704 1.27918 13.771 1.27866 13.3041ZM5.94467 9.0642H9.05533C9.27567 9.0642 9.4605 8.9828 9.60981 8.81999C9.75912 8.65718 9.83352 8.45592 9.833 8.21623C9.833 7.97597 9.75835 7.77472 9.60903 7.61248C9.45972 7.45023 9.27516 7.36883 9.05533 7.36826H5.94467C5.72433 7.36826 5.53976 7.44967 5.39097 7.61248C5.24217 7.77529 5.16752 7.97654 5.167 8.21623C5.167 8.45649 5.24166 8.65802 5.39097 8.82084C5.54028 8.98365 5.72485 9.06477 5.94467 9.0642Z"
                        fill="#C1C9D9"/>
                </svg>
                <p class="text-small my-2">Orders</p>


            </a>



               @if(Route::current()->getName() === 'products')
                    <a href="/" class="nav-link active" >
                        <svg width="20" height="20" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M15 14.0476V5.95238C15 5.80453 14.9661 5.65871 14.901 5.52646C14.8359 5.39422 14.7414 5.27919 14.625 5.19048L8.0625 0.190476C7.90022 0.0668359 7.70285 0 7.5 0C7.29715 0 7.09978 0.0668359 6.9375 0.190476L0.375 5.19048C0.258566 5.27919 0.164063 5.39422 0.0989744 5.52646C0.0338859 5.65871 0 5.80453 0 5.95238V14.0476C0 14.3002 0.0987722 14.5424 0.274588 14.7211C0.450403 14.8997 0.68886 15 0.9375 15H4.6875C4.93614 15 5.1746 14.8997 5.35041 14.7211C5.52623 14.5424 5.625 14.3002 5.625 14.0476V11.1905C5.625 10.9379 5.72377 10.6956 5.89959 10.517C6.0754 10.3384 6.31386 10.2381 6.5625 10.2381H8.4375C8.68614 10.2381 8.9246 10.3384 9.10041 10.517C9.27623 10.6956 9.375 10.9379 9.375 11.1905V14.0476C9.375 14.3002 9.47377 14.5424 9.64959 14.7211C9.8254 14.8997 10.0639 15 10.3125 15H14.0625C14.3111 15 14.5496 14.8997 14.7254 14.7211C14.9012 14.5424 15 14.3002 15 14.0476Z"
                                fill="url(#paint0_linear_50_458)"/>
                            <defs>
                                <linearGradient id="paint0_linear_50_458" x1="0" y1="7.5" x2="15" y2="7.5"
                                                gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#0F0673"/>
                                    <stop offset="1" stop-color="#B00BD9"/>
                                </linearGradient>
                            </defs>
                        </svg>

                        <p class="text-small my-2">Home</p>
                    </a>
                @else

                    <a href="/" class="nav-link" >
                        <svg width="15" height="15" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 14.0476V5.95238C15 5.80453 14.9661 5.65871 14.901 5.52646C14.8359 5.39422 14.7414 5.27919 14.625 5.19048L8.0625 0.190476C7.90022 0.0668359 7.70285 0 7.5 0C7.29715 0 7.09978 0.0668359 6.9375 0.190476L0.375 5.19048C0.258566 5.27919 0.164063 5.39422 0.0989744 5.52646C0.0338859 5.65871 0 5.80453 0 5.95238V14.0476C0 14.3002 0.0987722 14.5424 0.274588 14.7211C0.450403 14.8997 0.68886 15 0.9375 15H4.6875C4.93614 15 5.1746 14.8997 5.35041 14.7211C5.52623 14.5424 5.625 14.3002 5.625 14.0476V11.1905C5.625 10.9379 5.72377 10.6956 5.89959 10.517C6.0754 10.3384 6.31386 10.2381 6.5625 10.2381H8.4375C8.68614 10.2381 8.9246 10.3384 9.10041 10.517C9.27623 10.6956 9.375 10.9379 9.375 11.1905V14.0476C9.375 14.3002 9.47377 14.5424 9.64959 14.7211C9.8254 14.8997 10.0639 15 10.3125 15H14.0625C14.3111 15 14.5496 14.8997 14.7254 14.7211C14.9012 14.5424 15 14.3002 15 14.0476Z" fill="#C1C9D9"/>
                        </svg>

                        <p class="text-small my-2">Home</p>
                    </a>








               @endif


                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
                <a href="https://t.me/acelogstoreteam" class="float" target="_blank">
                    <i class="fa fa-comment my-float"></i>
                </a>











                <a href="/contact" class="nav-link">
                <svg width="20" height="20" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M6.34688 9.23312L6.34125 9.21999C6.25675 9.19689 6.17296 9.17126 6.09 9.14312L6.08375 9.14062C5.22015 8.84554 4.47051 8.28764 3.93992 7.5451C3.40933 6.80257 3.12438 5.91262 3.125 4.99999C3.12472 3.88006 3.55394 2.80267 4.32425 1.98972C5.09455 1.17678 6.14728 0.690192 7.26561 0.63019C8.38393 0.570188 9.48268 0.941339 10.3355 1.6672C11.1884 2.39305 11.7304 3.41834 11.85 4.53187C11.8775 4.78937 11.665 4.99999 11.4063 4.99999C11.1475 4.99999 10.9406 4.78874 10.9063 4.53249C10.8231 3.92766 10.5804 3.35588 10.2031 2.8759C9.82584 2.39592 9.32754 2.02507 8.75945 1.80145C8.19136 1.57783 7.57397 1.50952 6.97073 1.60353C6.3675 1.69754 5.80017 1.95048 5.32707 2.33636C4.85396 2.72224 4.49214 3.22714 4.27879 3.79917C4.06544 4.37119 4.00826 4.98971 4.11312 5.59116C4.21797 6.1926 4.48109 6.75528 4.87543 7.22136C5.26977 7.68744 5.7811 8.0401 6.35688 8.24312C6.47286 7.98095 6.67545 7.76661 6.93066 7.63604C7.18588 7.50546 7.47823 7.46658 7.75871 7.52592C8.03918 7.58525 8.29074 7.73919 8.47122 7.96193C8.65169 8.18468 8.75012 8.46269 8.75 8.74937C8.75029 9.03829 8.65049 9.31838 8.46757 9.54202C8.28466 9.76566 8.02992 9.91903 7.74668 9.97604C7.46344 10.0331 7.1692 9.9902 6.914 9.85475C6.6588 9.71931 6.4584 9.49964 6.34688 9.23312ZM5.70625 10.0019C4.96939 9.73709 4.30011 9.31282 3.74625 8.75937C3.40384 8.7992 3.08799 8.96342 2.85869 9.22083C2.6294 9.47824 2.50264 9.8109 2.5025 10.1556V10.7306C2.5025 11.0881 2.61375 11.4369 2.82125 11.7281C3.785 13.0806 5.3625 13.75 7.5 13.75C9.6375 13.75 11.2156 13.08 12.1813 11.7281C12.3897 11.4366 12.5018 11.0872 12.5019 10.7287V10.155C12.502 9.9704 12.4657 9.78761 12.3951 9.61704C12.3246 9.44647 12.2211 9.29147 12.0906 9.16088C11.9602 9.0303 11.8052 8.92669 11.6347 8.85598C11.4642 8.78526 11.2815 8.74883 11.0969 8.74874H9.6875C9.6876 9.21428 9.53918 9.6677 9.26382 10.0431C8.98847 10.4184 8.60054 10.6962 8.15647 10.8359C7.71239 10.9756 7.23533 10.97 6.79466 10.8199C6.35399 10.6698 5.97271 10.3836 5.70625 10.0019ZM10 4.99999C10.0004 4.63457 9.92048 4.27353 9.76593 3.9424C9.61138 3.61127 9.38597 3.31814 9.10563 3.08374C8.84567 2.86629 8.54421 2.70396 8.21958 2.60662C7.89494 2.50928 7.5539 2.47897 7.21718 2.51752C6.88047 2.55608 6.5551 2.66269 6.26087 2.83089C5.96663 2.99909 5.70967 3.22536 5.5056 3.49594C5.30152 3.76653 5.15459 4.07579 5.07375 4.40492C4.9929 4.73405 4.97982 5.07619 5.03529 5.41053C5.09077 5.74488 5.21365 6.06445 5.39647 6.34983C5.57929 6.63521 5.81822 6.88044 6.09875 7.07062C6.49154 6.74172 6.9877 6.56181 7.5 6.56249C8.03313 6.56249 8.52188 6.75312 8.90188 7.07062C9.24035 6.84165 9.51746 6.53314 9.70892 6.17212C9.90038 5.81111 10.0003 5.40863 10 4.99999Z"
                        fill="#C1C9D9"/>
                </svg>

                <p class="text-small my-2">Support</p>

            </a>


            <a href="/user/profile" class="nav-link">
                <svg width="20" height="20" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M2.8125 2.8125C2.8125 4.36312 4.07438 5.625 5.625 5.625C7.17562 5.625 8.4375 4.36312 8.4375 2.8125C8.4375 1.26188 7.17562 0 5.625 0C4.07438 0 2.8125 1.26188 2.8125 2.8125ZM10.625 11.875H11.25V11.25C11.25 8.83813 9.28687 6.875 6.875 6.875H4.375C1.9625 6.875 0 8.83813 0 11.25V11.875H10.625Z"
                        fill="#C1C9D9"/>
                </svg>

                <p class="text-small my-2">Account</p>

            </a>
        </div>
    </div>
    <!-- Menubar -->


    {{--
            <!-- PWA Offcanvas -->
            <div class="offcanvas offcanvas-bottom pwa-offcanvas">
            <div class="container">
                <div class="offcanvas-body small">
                    <img class="logo" src="{{url('')}}/assets/assets/images/icon.png" alt="">
                    <h5 class="title">Welcome to AceLogStore</h5>
                    <p class="pwa-text">Install Acelog store just like any other app</p>
                    <a href="javascrpit:void(0);" class="btn btn-sm btn-primary pwa-btn">Add to Home Screen</a>
                    <a href="javascrpit:void(0);" class="btn btn-sm pwa-close light btn-secondary ms-2">Maybe later</a>
                </div>
            </div>
        </div>
        <div class="offcanvas-backdrop pwa-backdrop"></div> --}}
    <!-- PWA Offcanvas End -->



</div>
<!--**********************************
Scripts
***********************************-->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


<script src="{{ url('') }}/assets/assets/js/jquery.js"></script>
<script src="{{ url('') }}/assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('') }}/assets/assets/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
<script src="{{ url('') }}/assets/assets/js/dz.carousel.js"></script><!-- Swiper -->
<script src="{{ url('') }}/assets/assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js">
</script><!-- Swiper -->
<script src="{{ url('') }}/assets/assets/js/settings.js"></script>
<script src="{{ url('') }}/assets/assets/js/custom.js"></script>
<script src="index.js" defer></script>
<script>
    $(".stepper").TouchSpin();
</script>
</body>

</html>
