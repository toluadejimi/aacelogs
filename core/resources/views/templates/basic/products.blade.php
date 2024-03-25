@extends($activeTemplate . 'layouts.main')
@section('content')


    <!-- Banner -->

   

    @auth
    
	<div class="author-notification">
       
        <div class="p-2">

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




        </div>
       
    
		<div class="container inner-wrapper">

            
			<div class="dz-info">
				<span class="text-dark">Good Morning</span>
				<h3 class="name mb-0">{{Auth::user()->username}} 👋</h3>
			</div>

            <div class="dz-info">
                <img src="{{url('')}}/assets/assets/images/wallet.svg" alt="wallet-image" width="30" height="30">
                <span class="text-dark">NGN1,000</span><br>
                <a href="/user/deposit/new" class="position-relative me-2 btn btn-sm btn-dark">
                    Fund Wallet
                </a>
               
            </div>


            <div class="offcanvas offcanvas-bottom rounded-0" tabindex="-1" id="offcanvasBottom2">
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                    <i class="fa-solid fa-xmark"></i>
                </button>
                <div class="offcanvas-body container fixed">

                    <div class="text-center mt-5">

                        <img src="{{url('')}}/assets/assets/images/wall.svg" alt="wallet-image" width="70" height="70">

                  

                    <div class="my-3">
                    <h6>Fund Wallet</h6>
                    <p>Top up your funds in your wallet</p>
                    </div>

                </div>

                    <form class="mt-3" action="/user/deposit/insert" method="POST">
                        @csrf

                        <div class="form-group col-md-12">

                            <div class="mb-3 input-group">
                                <span class="input-group-text"><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" placeholder="Enter Amount to fund">
                            </div>
                            
                        </div>


                        <div class="form-group col-md-12">
                            <label class="form--label">@lang('Select Gateway')</label>
                            <select class="form-control form-select" name="gateway" required>
                                <option value="">@lang('Select One')</option>
                                @foreach($gateway_currency as $data)
                                <option value="{{$data->method_code}}" data-gateway="{{ $data }}">
                                    {{$data->name}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="view-title">
                            <div class="container">
                                <button type="submit"  class="btn btn-primary btn-rounded btn-block flex-1 ms-2">CONFIRM</button>
                            </div>
                        </div>

                    </form>


                    
                </div>
            </div>


          
		</div>
	</div>
    @else


    <div class="my-5">


    </div>


    @endauth


    <!-- Banner End -->
    
    <!-- Page Content -->
    <div class="page-content">
        
        <div class="content-inner pt-0">
			<div class="container fb">
                <!-- Search -->
                <form action="do-search" class="search-form">
					<div class="mb-3 input-group input-radius">
						<span class="input-group-text">
							<svg width="24" height="24" viewBox="0 0 24 24" fill="none">
								<path d="M20.5605 18.4395L16.7528 14.6318C17.5395 13.446 18 12.0262 18 10.5C18 6.3645 14.6355 3 10.5 3C6.3645 3 3 6.3645 3 10.5C3 14.6355 6.3645 18 10.5 18C12.0262 18 13.446 17.5395 14.6318 16.7528L18.4395 20.5605C19.0245 21.1462 19.9755 21.1462 20.5605 20.5605C21.1462 19.9748 21.1462 19.0252 20.5605 18.4395ZM5.25 10.5C5.25 7.605 7.605 5.25 10.5 5.25C13.395 5.25 15.75 7.605 15.75 10.5C15.75 13.395 13.395 15.75 10.5 15.75C7.605 15.75 5.25 13.395 5.25 10.5Z" fill="#B9B9B9"/>
							</svg>
						</span>
                        <input type="text" placeholder="Search product" class="form-control main-in ps-0 bs-0" @if(request()->routeIs('products') ||
                        request()->routeIs('category.products')) value="{{
                                request()->search }}" @endif>
					</div>
                </form>

                <!-- Dashboard Area -->
                <div class="dashboard-area">

					<!-- Categorie -->
                    <div class="swiper-btn-center-lr">
                        <div class="swiper-container mt-4 categorie-swiper">
                            <div class="swiper-wrapper">
                                @foreach($categories as $data)
                                <div class="swiper-slide">
                                    <a href="product.html" class="categore-box style-1">
                                        <div class="icon-bx" style="background-color: #ededed">
                                            <img src="{{url('')}}/assets/assets/images/{{$data->image}}" alt="wallet-image" width="30" height="30">
                                        </div>
                                        <span class="title text-dark text-small">{{Str::upper($data->name)}}</span>
                                    </a>
                                </div>
                                @endforeach
                                
                            </div>
                        </div>
                    </div>
					<!-- Categorie End -->
					
					<!-- Recent -->
					<div class="m-b1">
                        <div class="swiper-btn-center-lr">
                            <div class="swiper-container tag-group mt-4 recomand-swiper">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="card add-banner bg-secondary">
                                            <div class="circle-1"></div>
                                            <div class="circle-2"></div>
                                            <div class="card-body">
                                                <div class="card-info">
                                                    <span>Happy Weekend</span>
                                                    <h2 data-text="60% OFF" class="title m-t10">60% OFF</h2>
                                                    <small>*for All Menus</small>
                                                </div>
                                            </div>
                                        </div>       
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card add-banner bg-primary">
                                            <div class="circle-1"></div>
                                            <div class="circle-2"></div>
                                            <div class="card-body">
                                                <div class="card-info">
                                                    <span>Happy Weekend</span>
                                                    <h2 data-text="60% OFF" class="title m-t10">60% OFF</h2>
                                                    <small>*for All Menus</small>
                                                </div>
                                            </div>
                                        </div>       
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="card add-banner bg-success">
                                            <div class="circle-1"></div>
                                            <div class="circle-2"></div>
                                            <div class="card-body">
                                                <div class="card-info">
                                                    <span>Happy Weekend</span>
                                                    <h2 data-text="60% OFF" class="title m-t10">60% OFF</h2>
                                                    <small>*for All Menus</small>
                                                </div>
                                            </div>
                                        </div>       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- Recent -->
					
					<!-- Recomended Start -->
                    <div class="title-bar">
                        <h5 class="title">Explore Product 👌</h5>
                        <a class="btn-link" href="#">View more</a>
                    </div>
               
                    <div class="row mt-2">
            
                        <div class="col-xxl-10 col-xl-11">
                            @forelse($categories as $category)
                            @php
                            $products = $category->products;
                            @endphp


                            <div class="catalog-item-wrapper mb-2">
                                
                                <div class="d-grid gap-2 mb-2">
                                    <strong><p style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%); border-radius:10px" class="text-white p-2">{{ __($category->name) }}</p></strong>
                                </div>




                                @foreach($products->take(5) as $product)
                                @include($activeTemplate.'partials/products')
                                @endforeach
            
            
                                <div class="d-grid gap-2 mb-5">
                                    <a href="{{ route('category.products', ['search'=>request()->search, 'slug'=>slug($category->name), 'id'=>$category->id]) }}" class="btn btn--base btn-block --base btn--sm">
                                        @lang('View All')
                                    </a> 
                                </div>
            
            
                            </div>


                            @empty

                            <div class="empty-data text-center">
                                <div class="thumb">
                                    <img src="{{ asset($activeTemplateTrue . 'images/not-found.png') }}">
                                </div>
            
                                <h4 class="title">@lang('No result found for "'.request()->search.'"')</h4>
                            </div>


                            @endforelse
                            {{ paginateLinks($categories) }}
                        </div>
                    </div>
               






                    
					<!-- Item box Start -->
                    <div class="title-bar">
                        <h5 class="title">Trending this week &#128293;</h5>
                    </div>
                    <div class="item-box">
                        <div class="item-media">
                            <img src="{{url('')}}/assets/assets/images/food/food2.png" alt="food">
                        </div>
                        <div class="item-content">
                            <a href="product.html"><h6 class="mb-0">Nasi Goreng Kampung Buk Minah</h6></a>
                            <div class="item-footer">
                                <h6>$ 5.0</h6> 
                                <a href="javascript:void(0);" class="item-bookmark">
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.7843 2.04749H16.785H16.8064C17.8714 2.05009 18.9118 2.36816 19.7963 2.96157C20.681 3.55518 21.37 4.39768 21.7762 5.38265C22.1823 6.36762 22.2875 7.45087 22.0783 8.49557C21.8692 9.54028 21.3551 10.4996 20.6011 11.2522L20.6004 11.2529L12.0015 19.8519L3.43855 11.2543L3.41711 11.2328L3.39439 11.2126C2.84628 10.7254 2.40336 10.1314 2.09273 9.46713C1.7821 8.80281 1.61031 8.0821 1.58785 7.3491C1.5654 6.61609 1.69276 5.88622 1.96215 5.20414C2.23153 4.52206 2.63727 3.90213 3.15453 3.38228C3.67179 2.86243 4.28969 2.45361 4.97042 2.18082C5.65115 1.90804 6.38038 1.77704 7.11349 1.79584C7.84659 1.81464 8.56815 1.98284 9.23401 2.29015C9.89986 2.59745 10.496 3.03741 10.9859 3.58308L11.0039 3.60309L11.0229 3.6221L11.2929 3.8921L11.9812 4.58036L12.6878 3.91095L12.9728 3.64095L12.9833 3.63096L12.9936 3.62067C13.4906 3.12161 14.0814 2.72571 14.7319 2.45573C15.3825 2.18575 16.08 2.04701 16.7843 2.04749Z" stroke="#BFC9DA" stroke-width="2"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="item-box">
                        <div class="item-media">
                            <img src="{{url('')}}/assets/assets/images/food/food3.png" alt="food">
                        </div>
                        <div class="item-content">
                            <a href="product.html"><h6 class="mb-0">Mie Kuah Becek Spesial Telur + Sosis</h6></a>
                            <div class="item-footer">
                                <div class="d-flex align-items-center">
                                    <h6 class="me-3">$ 5.0</h6>
                                    <del><h6>$ 8.9</h6></del>
                                </div>    
                                <a href="javascript:void(0);" class="item-bookmark">
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.7843 2.04749H16.785H16.8064C17.8714 2.05009 18.9118 2.36816 19.7963 2.96157C20.681 3.55518 21.37 4.39768 21.7762 5.38265C22.1823 6.36762 22.2875 7.45087 22.0783 8.49557C21.8692 9.54028 21.3551 10.4996 20.6011 11.2522L20.6004 11.2529L12.0015 19.8519L3.43855 11.2543L3.41711 11.2328L3.39439 11.2126C2.84628 10.7254 2.40336 10.1314 2.09273 9.46713C1.7821 8.80281 1.61031 8.0821 1.58785 7.3491C1.5654 6.61609 1.69276 5.88622 1.96215 5.20414C2.23153 4.52206 2.63727 3.90213 3.15453 3.38228C3.67179 2.86243 4.28969 2.45361 4.97042 2.18082C5.65115 1.90804 6.38038 1.77704 7.11349 1.79584C7.84659 1.81464 8.56815 1.98284 9.23401 2.29015C9.89986 2.59745 10.496 3.03741 10.9859 3.58308L11.0039 3.60309L11.0229 3.6221L11.2929 3.8921L11.9812 4.58036L12.6878 3.91095L12.9728 3.64095L12.9833 3.63096L12.9936 3.62067C13.4906 3.12161 14.0814 2.72571 14.7319 2.45573C15.3825 2.18575 16.08 2.04701 16.7843 2.04749Z" stroke="#BFC9DA" stroke-width="2"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
					<!-- Item box Start -->
                    <a href="product.html" class="btn btn-outline-primary btn-rounded btn-block">VIEW MORE</a>
				</div>
			</div>    
		</div>
        
    </div>    
    <!-- Page Content End-->

    @endsection
    
   