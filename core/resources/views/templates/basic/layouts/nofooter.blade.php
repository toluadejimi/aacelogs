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

    <!-- Laravel PWA -->
    @laravelPWA

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Roboto+Slab:wght@100;300;500;600;800&display=swap"
        rel="stylesheet">


    <style>
        /* Styles for the spinner */
        .spinner {
            border: 4px solid rgba(0, 0, 0, 0.1);
            border-left-color: white;
            border-radius: 50%;
            width: 20px;
            color:  v;
            height: 20px;
            animation: spin 1s linear infinite;
            margin-right: 5px;
            display: none; /* Initially hidden */
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>


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
                            @if (Route::current()->getName() ===  null)
                                <h5 class="mb-0 ms-2 text-nowrap">Error</h5>
                            @elseif(Route::current()->getName() ===  'user.deposit.new')
                                <h5 class="mb-0 ms-2 text-nowrap">Fund Wallet</h5>
                            @elseif(Route::current()->getName() ===  'user.resolve.deposit')
                                <h5 class="mb-0 ms-2 text-nowrap">Resolve Deposit</h5>
                            @elseif(Route::current()->getName() ===  'user.deposit.confirm')
                                <h5 class="mb-0 ms-2 text-nowrap">Confirm Payment</h5>
                            @elseif(Route::current()->getName() === 'user.deposit.manual.confirm')
                                <h5 class="mb-0 ms-2 text-nowrap">Confirm Manual Payment</h5>
                            @elseif(Route::current()->getName() === 'user.orders')
                                <h5 class="mb-0 ms-2 text-nowrap">Orders</h5>
                            @elseif(Route::current()->getName() === 'user.order.details')
                                <h5 class="mb-0 ms-2 text-nowrap">Order Details</h5>
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
                <img src="{{ url('') }}/assets/assets/images/message/pic5.jpg" alt="author-image">
            </div>
            <div class="dz-info">
                <span>Good Morning</span>
                <h5 class="name">Henry Decosta</h5>
            </div>
        </div>
        <ul class="nav navbar-nav">
            <li class="nav-label">Main Menu</li>
            <li><a class="nav-link" href="welcome.html">
                        <span class="dz-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px"
                                 fill="#000000">
                                <path
                                    d="M13.35 20.13c-.76.69-1.93.69-2.69-.01l-.11-.1C5.3 15.27 1.87 12.16 2 8.28c.06-1.7.93-3.33 2.34-4.29 2.64-1.8 5.9-.96 7.66 1.1 1.76-2.06 5.02-2.91 7.66-1.1 1.41.96 2.28 2.59 2.34 4.29.14 3.88-3.3 6.99-8.55 11.76l-.1.09z"/>
                            </svg>
                        </span>
                    <span>Welcome</span>
                </a></li>
            <li><a class="nav-link" href="index.html">
                        <span class="dz-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                 width="24px" fill="#000000">
                                <path
                                    d="M10 19v-5h4v5c0 .55.45 1 1 1h3c.55 0 1-.45 1-1v-7h1.7c.46 0 .68-.57.33-.87L12.67 3.6c-.38-.34-.96-.34-1.34 0l-8.36 7.53c-.34.3-.13.87.33.87H5v7c0 .55.45 1 1 1h3c.55 0 1-.45 1-1z"/>
                            </svg>
                        </span>
                    <span>Home</span>
                </a></li>
            <li><a class="nav-link" href="pages.html">
                        <span class="dz-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                 width="24px" fill="#000000">
                                <path
                                    d="M12.6 18.06c-.36.28-.87.28-1.23 0l-6.15-4.78c-.36-.28-.86-.28-1.22 0-.51.4-.51 1.17 0 1.57l6.76 5.26c.72.56 1.73.56 2.46 0l6.76-5.26c.51-.4.51-1.17 0-1.57l-.01-.01c-.36-.28-.86-.28-1.22 0l-6.15 4.79zm.63-3.02l6.76-5.26c.51-.4.51-1.18 0-1.58l-6.76-5.26c-.72-.56-1.73-.56-2.46 0L4.01 8.21c-.51.4-.51 1.18 0 1.58l6.76 5.26c.72.56 1.74.56 2.46-.01z"/>
                            </svg>
                        </span>
                    <span>Pages</span>
                </a></li>
            <li><a class="nav-link" href="ui-components.html">
                        <span class="dz-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                 width="24px" fill="#000000">
                                <path
                                    d="M4 8h4V4H4v4zm6 12h4v-4h-4v4zm-6 0h4v-4H4v4zm0-6h4v-4H4v4zm6 0h4v-4h-4v4zm6-10v4h4V4h-4zm-6 4h4V4h-4v4zm6 6h4v-4h-4v4zm0 6h4v-4h-4v4z"/>
                            </svg>
                        </span>
                    <span>Components</span>
                </a></li>
            <li><a class="nav-link" href="notification.html">
                        <span class="dz-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                 width="24px" fill="#000000">
                                <path
                                    d="M18 16v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.68-1.5-1.51-1.5S10.5 3.17 10.5 4v.68C7.63 5.36 6 7.92 6 11v5l-1.3 1.29c-.63.63-.19 1.71.7 1.71h13.17c.89 0 1.34-1.08.71-1.71L18 16zm-6.01 6c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zM6.77 4.73c.42-.38.43-1.03.03-1.43-.38-.38-1-.39-1.39-.02C3.7 4.84 2.52 6.96 2.14 9.34c-.09.61.38 1.16 1 1.16.48 0 .9-.35.98-.83.3-1.94 1.26-3.67 2.65-4.94zM18.6 3.28c-.4-.37-1.02-.36-1.4.02-.4.4-.38 1.04.03 1.42 1.38 1.27 2.35 3 2.65 4.94.07.48.49.83.98.83.61 0 1.09-.55.99-1.16-.38-2.37-1.55-4.48-3.25-6.05z"/>
                            </svg>
                        </span>
                    <span>Notification</span>
                    <span class="badge badge-circle badge-danger">1</span>
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
            <li><a class="nav-link" href="messages.html">
                        <span class="dz-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                 width="24px" fill="#000000">
                                <path
                                    d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM7 9h10c.55 0 1 .45 1 1s-.45 1-1 1H7c-.55 0-1-.45-1-1s.45-1 1-1zm6 5H7c-.55 0-1-.45-1-1s.45-1 1-1h6c.55 0 1 .45 1 1s-.45 1-1 1zm4-6H7c-.55 0-1-.45-1-1s.45-1 1-1h10c.55 0 1 .45 1 1s-.45 1-1 1z"/>
                            </svg>
                        </span>
                    <span>Chat</span>
                    <span class="badge badge-circle badge-info">5</span>
                </a></li>
            <li><a class="nav-link" href="onboading.html">
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
            <li class="nav-label">Settings</li>
            <li class="nav-color" data-bs-toggle="offcanvas" data-bs-target="#offcanvasBottom"
                aria-controls="offcanvasBottom">
                <a href="javascript:void(0);" class="nav-link">
                        <span class="dz-icon">
                            <svg class="color-plate" xmlns="http://www.w3.org/2000/svg" height="30px"
                                 viewBox="0 0 24 24" width="30px" fill="#000000">
                                <path
                                    d="M12 3c-4.97 0-9 4.03-9 9s4.03 9 9 9c.83 0 1.5-.67 1.5-1.5 0-.39-.15-.74-.39-1.01-.23-.26-.38-.61-.38-.99 0-.83.67-1.5 1.5-1.5H16c2.76 0 5-2.24 5-5 0-4.42-4.03-8-9-8zm-5.5 9c-.83 0-1.5-.67-1.5-1.5S5.67 9 6.5 9 8 9.67 8 10.5 7.33 12 6.5 12zm3-4C8.67 8 8 7.33 8 6.5S8.67 5 9.5 5s1.5.67 1.5 1.5S10.33 8 9.5 8zm5 0c-.83 0-1.5-.67-1.5-1.5S13.67 5 14.5 5s1.5.67 1.5 1.5S15.33 8 14.5 8zm3 4c-.83 0-1.5-.67-1.5-1.5S16.67 9 17.5 9s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z"/>
                            </svg>
                        </span>
                    <span>Highlights</span>
                </a>
            </li>
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
            <h6 class="name">Foodia - Food Restaurant</h6>
            <p>App Version 1.0</p>
        </div>
    </div>
    <!-- Sidebar End -->

    @yield('content')



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
