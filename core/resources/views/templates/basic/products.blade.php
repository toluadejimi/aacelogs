@extends($activeTemplate.'layouts.master')
@section('content')

<section class="catalog-section section-bg py-{{ @$categories->count() ? 120 : 60 }}">
    <div class="container">
        <div class="card justify-content-center">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-4 col-md-12 col-sm-12">

                        @auth
                        <a href="{{ route('user.deposit.new') }}" class="accounts-buttons__link btn btn--base btn--lg my-3">
                                <i class="fas fa-wallet"></i> NGN {{ number_format(Auth::user()->balance, 2) ?? "Login" }}

                        </a>
                        @else
                        <a href="login" class="accounts-buttons__link btn btn--base btn--lg my-3">
                            <i class="fas fa-wallet"></i> Login to view wallet
                        </a>

                        @endauth



                    </div>


                    <div class="col-xl-6 col-md-12 col-sm-12">


                        <div class="search-box style-two w-100 my-3">
                            <form action="" class="search-form">
                                <input type="text" class="form--control pill" name="search"
                                    placeholder="@lang('Search...')" @if(request()->routeIs('products') ||
                                request()->routeIs('category.products')) value="{{
                                request()->search }}" @endif
                                >
                                <button type="submit" class="search-box__button">
                                    <span class="icon"><i class="las la-search"></i></span>
                                </button>
                            </form>
                        </div>

                    </div>


                    <div class="col-xl-2 col-md-12 col-sm-12">


                        @if ($categories->count())
                        <div class="category-nav my-3">
                            <button class="category-nav__button">
                                <span class="icon me-1"><img
                                        src="{{ asset($activeTemplateTrue . 'images/icons/grid.png') }}"
                                        alt="@lang('image')"></span><span class="search-text">@lang('
                                    Category')</span>
                                <span class="arrow"><i class="las la-angle-down"></i></span>
                            </button>
                            <ul class="dropdown--menu">
                                @foreach ($categories as $category)
                                <li class="dropdown--menu__item">
                                    <a href="{{ route('category.products', ['slug' => slug($category->name), 'id' => $category->id]) }}"
                                        class="dropdown--menu__link">
                                        {{ strLimit($category->name, 18) }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif



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
                        <a href="{{ route('category.products', ['search'=>request()->search, 'slug'=>slug($category->name), 'id'=>$category->id]) }}"
                            class="btn btn--base btn-outline--base btn--sm">
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


    </div>
</section>



<x-purchase-modal />
@endsection
