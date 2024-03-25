
<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover">
	<meta name="theme-color" content="#2196f3">
	<meta name="author" content="DexignZone" /> 
    <meta name="keywords" content="" /> 
    <meta name="robots" content="" /> 
	<meta name="description" content="Foodia - Food Restaurant Mobile App Template ( Bootstrap 5 + PWA )"/>
	<meta property="og:title" content="Foodia - Food Restaurant Mobile App Template ( Bootstrap 5 + PWA )" />
	<meta property="og:description" content="Foodia - Food Restaurant Mobile App Template ( Bootstrap 5 + PWA )" />
	<meta property="og:image" content="https://makaanlelo.com/tf_products_007/foodia/xhtml/social-image.png"/>
	<meta name="format-detection" content="telephone=no">
    
    <!-- Favicons Icon -->
	<link rel="shortcut icon" type="image/x-icon" href="{{url('')}}/assets/assets/images/favicon.png" />
    
    <!-- Title -->
	<title>ACELOGS MARKET PLACE</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{url('')}}/assets/assets/vendor/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('')}}/assets/assets/css/style.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;300;400;700;900&family=Roboto+Slab:wght@100;300;500;600;800&display=swap" rel="stylesheet">

</head>   
<body class="bg-white">
<div class="page-wraper">

    <!-- Preloader -->
	<div id="preloader">
		<div class="spinner"></div>
	</div>
    <!-- Preloader end-->

    <!-- Page Content -->
    <div class="page-content">
        
        <!-- Banner -->
        <div class="banner-wrapper">
           
            <div class="container inner-wrapper">
                <img src="{{url('')}}/assets/assets/images/logo.svg" width="300" height="250">
                <p class="mb-0">Login</p>
            </div>


        </div>
        <!-- Banner End -->
        <div class="account-box">
            <div class="container">
                <div class="account-area">
                    <h3 class="title">Welcome back</h3>
                    <p>Login to start shopping</p>
					
                    <form method="POST" action="{{ route('user.login') }}" class="verify-gcaptcha">
                        @csrf


                        @if ($errors->any())
                        <div class="alert alert-danger">
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
                        <div class="alert alert-danger">
                            {{ session()->get('error') }}
                        </div>
                        @endif


						<div class="input-group input-mini mb-3">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
							<input type="text" name="username" value="{{ old('username') }}" required class="form-control" placeholder="Enter Email">
						</div>

						<div class="mb-3 input-group input-mini">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
							<input type="password" name="password" class="form-control dz-password" placeholder="Password">
							<span class="input-group-text show-pass"> 
								<i class="fa fa-eye-slash"></i>
								<i class="fa fa-eye"></i>
							</span>
						</div>
						<div class="input-group">
							<button type="submit" class="btn mt-2 btn-primary w-100 btn-rounded " style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%);">SIGN IN</button>
						</div>

						<div class="d-flex justify-content-between align-items-center">
							<div class="form-check">
								<input class="form-check-input"  type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} value="" id="flexCheckChecked" checked>
								<label class="form-check-label" for="flexCheckChecked">
									Keep Sign In
								</label>
							</div>
							<a href="{{ route('user.password.request') }}" class="btn-link">Forgot password?</a>
						</div>
					</form>  
                    <div class="text-center mb-auto p-tb20">
                        <a href="{{ route('user.register') }}" class="saprate">Don’t have an account?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Content End -->
    
    
   
</div>
<!--**********************************
    Scripts
***********************************-->
<script src="{{url('')}}/assets/assets/js/jquery.js"></script>
<script src="{{url('')}}/assets/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{url('')}}/assets/assets/js/settings.js"></script>
<script src="{{url('')}}/assets/assets/js/custom.js"></script>
</body>
</html>

