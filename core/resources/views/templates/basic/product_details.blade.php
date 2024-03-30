<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
    <meta name="theme-color" content="#2196f3">
    <meta name="author" content="DexignZone" />
    <meta name="keywords" content="" />
    <meta name="robots" content="" />
    <meta name="description" content="Acelogstore" />
    <meta property="og:title" content="Acelogstore" />
    <meta property="og:description" content="Acelogstore" />
    <meta name="format-detection" content="telephone=no">

    <!-- Favicons Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('') }}/assets/assets/images/fav.svg" />

    <!-- Title -->
    <title>ACELOGSTORE</title>

    <!-- PWA Version -->
    <link rel="manifest" href="manifest.json">

    <!-- Stylesheets -->
    <link rel="stylesheet"
        href="{{ url('') }}/assets/assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css">
    <link rel="stylesheet" href="{{ url('') }}/assets/assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/assets/css/style.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Roboto+Slab:wght@100;300;500;600;800&display=swap"
        rel="stylesheet">

</head>

<body class="bg-white">
    <div class="page-wraper">

        <!-- Preloader -->
        <div id="preloader">
            <div class="spinner"></div>
        </div>
        <!-- Preloader end-->

        <!-- Header -->
        <header class="header transparent">
            <div class="main-bar">
                <div class="container">
                    <div class="header-content">
                        <div class="left-content">
                            <a href="javascript:void(0);" class="back-btn">
                                <svg width="18" height="18" viewBox="0 0 10 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.03033 0.46967C9.2966 0.735936 9.3208 1.1526 9.10295 1.44621L9.03033 1.53033L2.561 8L9.03033 14.4697C9.2966 14.7359 9.3208 15.1526 9.10295 15.4462L9.03033 15.5303C8.76406 15.7966 8.3474 15.8208 8.05379 15.6029L7.96967 15.5303L0.96967 8.53033C0.703403 8.26406 0.679197 7.8474 0.897052 7.55379L0.96967 7.46967L7.96967 0.46967C8.26256 0.176777 8.73744 0.176777 9.03033 0.46967Z"
                                        fill="#fff" />
                                </svg>
                            </a>
                            <h5 class="mb-0 ms-2 text-nowrap">Product Detail</h5>
                        </div>
                        <div class="mid-content">
                        </div>

                        <div class="right-content d-flex align-items-center">
                            <a href="javascript:void(0);" class="item-bookmark icon-2 mt-2">
                             <img src="{{url('')}}/assets/assets/images/wallet.svg" alt="wallet-image" width="30" height="30">
                            <span class="text-white text-bold">{{number_format(Auth::user()->balance, 2)}}</span><br>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->


        <!-- Page Content -->
        <div class="page-content">
            <div class="content-body fb">
                <div class="swiper-btn-center-lr my-0">
                    <div class="swiper-container demo-swiper2">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="dz-banner-heading">
                                    <div class="overlay-black-light">
                                        <img
                                            src="{{ getImage(getFilePath('product') . '/' . $product->image, getFileSize('product')) }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="company-detail">
                        <div class="detail-content">
                            <div class="flex-1">
                                <h4>{{ __($product->name) }}</h4>
                                <p> @php echo $product->description; @endphp</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-13">
                                <h5 class="mt-2">NGN{{ number_format($product->price) }}/Pcs</h5>
                            </div>

                            <div class="col-7">
                                <button type="button"
                                    style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%); color:#ffffff;"
                                    class="btn btn-block"> {{ number_format($product->in_stock) }} Available in
                                    stock</button>
                                </span>
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-6">
                                <button style="background-color: #4d4d4d; color: white" class="btn"
                                    onclick="decrementQuantity()">-
                                </button>
                                <span class="p-2" id="quantity">1</span>
                                <button style="background-color: #110248; color: white" class="btn"
                                    onclick="incrementQuantity()">+
                                </button>
                            </div>

                            <div class="col-6">
                                <button type="button"
                                    style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%); color:#ffffff;"
                                    class="btn btn-block">NGN<span id="total">10.00</span></button>

                            </div>
                        </div>
                        <hr>

                        <form action="{{ route('user.deposit.insert') }}" method="POST">
                            @csrf
                            <h6 class="">Have a coupon?</h6>
                            <input class="form-control mb-3" name="coupon_code" type="text"
                                placeholder="Enter Coupon Code">

                            <input type="text" hidden id="quantityInput" name="qty" value="1">
                            <input type="text" hidden name="id" value="{{$product->id}}">
                            <input type="text" hidden type="text" name="payment" value="wallet">
                            <input type="text" hidden name="gateway" value="250">



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


                                    <button type="submit" style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%); color:#ffffff;"  class="btn btn-primary text-start w-100 btn-rounded">
                                        <svg class="cart me-4" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M18.1776 17.8443C16.6362 17.8428 15.3854 19.0912 15.3839 20.6326C15.3824 22.1739 16.6308 23.4247 18.1722 23.4262C19.7136 23.4277 20.9643 22.1794 20.9658 20.638C20.9658 20.6371 20.9658 20.6362 20.9658 20.6353C20.9644 19.0955 19.7173 17.8473 18.1776 17.8443Z"
                                                fill="white" />
                                            <path
                                                d="M23.1278 4.47973C23.061 4.4668 22.9932 4.46023 22.9251 4.46012H5.93181L5.66267 2.65958C5.49499 1.46381 4.47216 0.574129 3.26466 0.573761H1.07655C0.481978 0.573761 0 1.05574 0 1.65031C0 2.24489 0.481978 2.72686 1.07655 2.72686H3.26734C3.40423 2.72586 3.52008 2.82779 3.53648 2.96373L5.19436 14.3267C5.42166 15.7706 6.66363 16.8358 8.12528 16.8405H19.3241C20.7313 16.8423 21.9454 15.8533 22.2281 14.4747L23.9802 5.74121C24.0931 5.15746 23.7115 4.59269 23.1278 4.47973Z"
                                                fill="white" />
                                            <path
                                                d="M11.3404 20.5158C11.2749 19.0196 10.0401 17.8418 8.54244 17.847C7.0023 17.9092 5.80422 19.2082 5.86645 20.7484C5.92617 22.2262 7.1283 23.4008 8.60704 23.4262H8.67432C10.2142 23.3587 11.4079 22.0557 11.3404 20.5158Z"
                                                fill="white" />
                                        </svg>
                                        BUY NOW
                                    </a>
                                </div>
                            </div>


                        </form>

                    </div>


                </div>
            </div>
        </div>
        <!-- Page Content End -->


        <!-- Footer -->
        {{-- <div class="footer fixed">
            <div class="container">
                <a href="order.html" class="btn btn-primary text-start w-100 btn-rounded">
                    <svg class="cart me-4" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M18.1776 17.8443C16.6362 17.8428 15.3854 19.0912 15.3839 20.6326C15.3824 22.1739 16.6308 23.4247 18.1722 23.4262C19.7136 23.4277 20.9643 22.1794 20.9658 20.638C20.9658 20.6371 20.9658 20.6362 20.9658 20.6353C20.9644 19.0955 19.7173 17.8473 18.1776 17.8443Z"
                            fill="white" />
                        <path
                            d="M23.1278 4.47973C23.061 4.4668 22.9932 4.46023 22.9251 4.46012H5.93181L5.66267 2.65958C5.49499 1.46381 4.47216 0.574129 3.26466 0.573761H1.07655C0.481978 0.573761 0 1.05574 0 1.65031C0 2.24489 0.481978 2.72686 1.07655 2.72686H3.26734C3.40423 2.72586 3.52008 2.82779 3.53648 2.96373L5.19436 14.3267C5.42166 15.7706 6.66363 16.8358 8.12528 16.8405H19.3241C20.7313 16.8423 21.9454 15.8533 22.2281 14.4747L23.9802 5.74121C24.0931 5.15746 23.7115 4.59269 23.1278 4.47973Z"
                            fill="white" />
                        <path
                            d="M11.3404 20.5158C11.2749 19.0196 10.0401 17.8418 8.54244 17.847C7.0023 17.9092 5.80422 19.2082 5.86645 20.7484C5.92617 22.2262 7.1283 23.4008 8.60704 23.4262H8.67432C10.2142 23.3587 11.4079 22.0557 11.3404 20.5158Z"
                            fill="white" />
                    </svg>
                    PLACE ORDER
                </a>
            </div>
        </div> --}}
        <!-- Footer End -->

    </div>
    <!--**********************************
    Scripts
***********************************-->

    <script>
        // Variables to track quantity and price
        let quantity = 1;
        const price = {{ $product->price }};

        // Functions to increment and decrement quantity
        function incrementQuantity() {
            quantity++;
            updateView();
        }

        function decrementQuantity() {
            if (quantity > 1) {
                quantity--;
                updateView();
            }
        }

        // Function to update the view with new quantity and total
        function updateView() {
            const quantityElement = document.getElementById("quantity");
            const totalElement = document.getElementById("total");
            const quantityInput = document.getElementById("quantityInput");

            const total = (quantity * price).toFixed(2);

            quantityElement.textContent = quantity;
            totalElement.textContent = total;
            quantityInput.value = quantity;
        }

        // Function to submit quantity to the server
        function submitQuantity() {
            const quantityInput = document.getElementById("quantityInput");
            alert("Quantity submitted: " + quantityInput.value);
            // You can send the quantityInput.value to the server here
        }

        // Initialize the view
        updateView();
    </script>

    <script src="{{ url('') }}/assets/assets/js/jquery.js"></script>
    <script src="{{ url('') }}/assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ url('') }}/assets/assets/js/dz.carousel.js"></script><!-- Swiper -->
    <script src="{{ url('') }}/assets/assets/vendor/swiper/swiper-bundle.min.js"></script><!-- Swiper -->
    <script src="{{ url('') }}/assets/assets/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js">
    </script><!-- Swiper -->
    <script src="{{ url('') }}/assets/assets/js/settings.js"></script>
    <script src="{{ url('') }}/assets/assets/js/custom.js"></script>
    <script>
        $(".stepper").TouchSpin();
    </script>
</body>

</html>
