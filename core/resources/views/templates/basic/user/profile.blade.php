@extends($activeTemplate . 'layouts.nofooter')
@section('content')
    <!-- Page Content -->
    <div class="page-content bottom-content ">
        <div class="container profile-area">
            <div class="profile">
                <div class="media media-100">
                    <img src="{{ url('') }}/assets/assets/images/fav.svg" alt="author-image" height="100px" width="100px">

                </div>
                <div class="mb-2">
                    <h4>{{$user->username}}</h4>
                    <h6 class="detail">ACTIVE MEMBER</h6>
                </div>
            </div>
            <div class="contact-section">

                <ul>

                    <li>
                        <a href="#">
                            <div class="icon-box">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="ms-3">
                                <div class="light-text">Email Address</div>
                                <p class="mb-0">{{$user->email}}</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="/user/change-password">
                            <div class="icon-box">
                                <svg width="25" height="25" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_55_1131)">
                                        <path d="M11 11H10V10H11V11ZM8 11H9V10H8V11ZM13 11H12V10H13V11Z" fill="#2F416B"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3 6V3.5C3 3.04037 3.09053 2.58525 3.26642 2.16061C3.44231 1.73597 3.70012 1.35013 4.02513 1.02513C4.35013 0.700121 4.73597 0.442313 5.16061 0.266422C5.58525 0.0905301 6.04037 0 6.5 0C6.95963 0 7.41475 0.0905301 7.83939 0.266422C8.26403 0.442313 8.64987 0.700121 8.97487 1.02513C9.29988 1.35013 9.55769 1.73597 9.73358 2.16061C9.90947 2.58525 10 3.04037 10 3.5V6H11.5C11.8978 6 12.2794 6.15804 12.5607 6.43934C12.842 6.72064 13 7.10218 13 7.5V8.05C13.5651 8.16476 14.0732 8.47136 14.4382 8.91787C14.8031 9.36438 15.0025 9.92332 15.0025 10.5C15.0025 11.0767 14.8031 11.6356 14.4382 12.0821C14.0732 12.5286 13.5651 12.8352 13 12.95V13.5C13 13.8978 12.842 14.2794 12.5607 14.5607C12.2794 14.842 11.8978 15 11.5 15H1.5C1.10218 15 0.720644 14.842 0.43934 14.5607C0.158035 14.2794 0 13.8978 0 13.5L0 7.5C0 7.10218 0.158035 6.72064 0.43934 6.43934C0.720644 6.15804 1.10218 6 1.5 6H3ZM4 3.5C4 2.83696 4.26339 2.20107 4.73223 1.73223C5.20107 1.26339 5.83696 1 6.5 1C7.16304 1 7.79893 1.26339 8.26777 1.73223C8.73661 2.20107 9 2.83696 9 3.5V6H4V3.5ZM8.5 9C8.10218 9 7.72064 9.15804 7.43934 9.43934C7.15804 9.72064 7 10.1022 7 10.5C7 10.8978 7.15804 11.2794 7.43934 11.5607C7.72064 11.842 8.10218 12 8.5 12H12.5C12.8978 12 13.2794 11.842 13.5607 11.5607C13.842 11.2794 14 10.8978 14 10.5C14 10.1022 13.842 9.72064 13.5607 9.43934C13.2794 9.15804 12.8978 9 12.5 9H8.5Z" fill="#2F416B"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_55_1131">
                                            <rect width="15" height="15" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <div class="ms-3">
                                <div class="light-text">Password</div>
                                <p class="mb-0">Update Password</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <div class="d-flex justify-content-between align-item-center">
                    <h5 class="title">My Activities 🏆</h5>
{{--                    <a href="javascript:void(0);" class="btn-link">History</a>--}}
                </div>
                <div class="swiper-btn-center-lr">
                    <div class="swiper-container mt-4 offer-swiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="offer-bx">
                                    <div class="offer-content">
                                        <h6>Total Orders</h6>
                                    </div>
                                    <div class="point">
                                        <h5 class="title">{{$orders}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" >
                                <div class="offer-bx" >
                                    <div class="offer-content">
                                        <h6>Total Spent(NGN)</h6>
                                    </div>
                                        <h5 style="color: white" class="title">{{number_format($spent)}}</h5>

                                </div>
                            </div>
{{--                            <div class="swiper-slide">--}}
{{--                                <div class="offer-bx">--}}
{{--                                    <div class="offer-content">--}}
{{--                                        <h6>Order 10 packs French Fries Deluxe</h6>--}}
{{--                                        <small>4 days ago</small>--}}
{{--                                    </div>--}}
{{--                                    <div class="point">--}}
{{--                                        <h5 class="title">150</h5>--}}
{{--                                        <small class="d-block">Pts</small>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End-->

    <div class="footer fixed">

        @if ($errors->any())
            <div class="alert alert-danger my-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger mt-2">
                {{ session()->get('error') }}
            </div>
        @endif


        <div class="container">


            <a href="/" style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%); color:#ffffff;"
               class="btn btn-primary text-start w-100 btn-rounded">

                <svg width="16" height="16" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15 14.0476V5.95238C15 5.80453 14.9661 5.65871 14.901 5.52646C14.8359 5.39422 14.7414 5.27919 14.625 5.19048L8.0625 0.190476C7.90022 0.0668359 7.70285 0 7.5 0C7.29715 0 7.09978 0.0668359 6.9375 0.190476L0.375 5.19048C0.258566 5.27919 0.164063 5.39422 0.0989744 5.52646C0.0338859 5.65871 0 5.80453 0 5.95238V14.0476C0 14.3002 0.0987722 14.5424 0.274588 14.7211C0.450403 14.8997 0.68886 15 0.9375 15H4.6875C4.93614 15 5.1746 14.8997 5.35041 14.7211C5.52623 14.5424 5.625 14.3002 5.625 14.0476V11.1905C5.625 10.9379 5.72377 10.6956 5.89959 10.517C6.0754 10.3384 6.31386 10.2381 6.5625 10.2381H8.4375C8.68614 10.2381 8.9246 10.3384 9.10041 10.517C9.27623 10.6956 9.375 10.9379 9.375 11.1905V14.0476C9.375 14.3002 9.47377 14.5424 9.64959 14.7211C9.8254 14.8997 10.0639 15 10.3125 15H14.0625C14.3111 15 14.5496 14.8997 14.7254 14.7211C14.9012 14.5424 15 14.3002 15 14.0476Z"
                        fill="white"/>
                </svg>

            </a>
        </div>
    </div>

@endsection
