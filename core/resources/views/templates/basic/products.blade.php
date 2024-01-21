@extends($activeTemplate.'layouts.master')
@section('content')

<section class="catalog-section section-bg py-{{ @$categories->count() ? 120 : 60 }}">
    <div class="container">


        <div class="row">


         <ul class="nav col-12 col-md-auto mb-2 justify-content-center  text-center mb-md-0">

            <li class="" style="margin-right:3px;"> @auth
                <a href="{{ route('user.deposit.new') }}" class="accounts-buttons__link btn btn--base btn--lg my-3">
                    <i class="fas fa-wallet"></i> NGN {{ number_format(Auth::user()->balance, 2) ?? "Login" }}

                </a>
                @endauth
            </li>

            <li>

             <a href="policy/rules/42" style="margin-right: 3px;" class="accounts-buttons__link btn btn--danger btn--lg my-3">
                    <i class="fas fa-thumbs-up"></i> Rules
                </a>
            
            </li>


            <li>

          


           
        </ul>

        


        </div>




        <div class="card justify-content-center">
            <div class="card-body">
                <div class="row">









                    <div class="col-xl-2 col-md-6 col-sm-6">


                        @if ($categories->count())
                        <div class="category-nav my-3">
                            <button class="category-nav__button">
                                <span class="icon me-1"><img src="{{ asset($activeTemplateTrue . 'images/icons/grid.png') }}" alt="@lang('image')"></span><span class="search-text">@lang('
                                    Category')</span>
                                <span class="arrow"><i class="las la-angle-down"></i></span>
                            </button>
                            <ul class="dropdown--menu">
                                @foreach ($categories as $category)
                                <li class="dropdown--menu__item">
                                    <a href="{{ route('category.products', ['slug' => slug($category->name), 'id' => $category->id]) }}" class="dropdown--menu__link">
                                        {{ strLimit($category->name, 18) }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif



                    </div>


                    <div class="col-xl-6 col-md-6 col-sm-6">


                        <div class="search-box style-two w-100 my-3">
                            <form action="" class="search-form">
                                <input type="text" class="form--control pill" name="search" placeholder="@lang('Search...')" @if(request()->routeIs('products') ||
                                request()->routeIs('category.products')) value="{{
                                request()->search }}" @endif
                                >
                                <button type="submit" class="search-box__button">
                                    <span class="icon"><i class="las la-search"></i></span>
                                </button>
                            </form>
                        </div>

                    </div>







                </div>







            </div>





        </div>

        <div class="card justify-content-center mb-5">



        </div>





        <div class="row justify-content-center">

            <div class="col-xxl-10 col-xl-11">
                @forelse($categories as $category)
                @php
                $products = $category->products;
                @endphp
                <div class="catalog-item-wrapper">
                    <div class="catalog-item-wrapper__header d-flex align-items-center justify-content-between">
                        <h5 class="title mb-0">{{ __($category->name) }}</h5>
                        <a href="{{ route('category.products', ['search'=>request()->search, 'slug'=>slug($category->name), 'id'=>$category->id]) }}" class="btn btn--base btn-outline--base btn--sm">
                            @lang('View All')
                        </a>
                    </div>
                    @foreach($products->take(5) as $product)
                    @include($activeTemplate.'partials/products')
                    @endforeach
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


         <style>
        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            right: 40px;
            background-color: #dc3545;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .my-float {
            margin-top: 16px;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <a href="https://t.me/acelogs_01" class="float" target="_blank">
        <i class="fa fa-comment my-float"></i>
    </a>



    </div>
</section>



<x-purchase-modal />
@endsection
