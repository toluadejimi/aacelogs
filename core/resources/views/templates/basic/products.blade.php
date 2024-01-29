@extends($activeTemplate.'layouts.master')
@section('content')


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Simulate a 5-second delay
        setTimeout(function() {
            // Remove the loader after 5 seconds
            $('#modal').modal('show');

        }, 1000);

    });

</script>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body border-0">

                <div class="card border-0">

                    <div class="card-body border-0">

                        <h4 class="my-3 text-center"> Welcome to Acelogstore</h4>
                        <p class="text-center"> The best shop for social media accounts and services.
                        </p>

                        <hr>


                        <p class="text-center"> If you have products to sell on our website inform us or report complaints:
                        </p>


                        <p class="text-center"><a href="https://t.me/acelogs_01">Contact us on Telegram
                            </a>
                        </p>

                        </p>





                        <hr>


                        <p class="text-center"> DO NOT MISS AN UPDATE </p>
                        <p class="text-center"> Join our announcement group: </p>


                        <p class="text-center"> WhatsApp Group:<a href="https://chat.whatsapp.com/CQtiNorfsys3irydIog6ON">Join Whatsapp Group</a>
                        </p>

                        <p class="text-center"> Telegram Group:<a href="https://t.me/ACELOGSTORE01">Join Telegram
                                Group</a>
                        </p>









                    </div>









                    <button type="button" class="test-white btn btn--base btn-sm my-1" data-bs-dismiss="modal">I
                        Understand</button>


                </div>




            </div>


        </div>




    </div>

</div>

<div class="container">

    <div class="flex">

        @auth
        <div class="row mt-5 mb-4">

            <div class="col-4 mb-4">
                @auth
                <a href="{{ route('user.deposit.new') }}" class="btn btn--base btn-sm active text-small" role="button" aria-pressed="true"> NGN {{ number_format(Auth::user()->balance, 2) ?? "Login" }}</a>
                @endauth
            </div>
            <div class="col-4 mb-4">
                @auth

                <a href="{{ route('user.deposit.new') }}" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Fund Wallet</a>

                @endauth
            </div>

            <div class="col-4 mb-4">
                @auth
                <a href="{{ route('user.orders') }}" class="btn btn-dark btn-sm active" role="button" aria-pressed="true">My Orders</a>
                @endauth
            </div>


            <div class="mb-4">
                @auth
                <strong class="text-darkblue">Hi {{Auth::user()->username}}, </strong>
                <p class="text-disabled">What will you like to buy today</p>
                @endauth

            </div>
        </div>

        @endauth



        <div class="row  mt-5">
            <div class="col-5">
                @if ($categories->count())

                <div class="category-nav">
                    <button class="category-nav__button">
                        <span class="icon me-1"><img src="{{ asset($activeTemplateTrue . 'images/icons/grid.png') }}" alt="@lang('image')"></span><span class="search-text">@lang('
                            Category')</span>
                        {{-- <span class="arrow"><i class="las la-angle-down"></i></span> --}}
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
            <div class="col-7 d-lg-none d-md-none">
                <div class="search-box style-two w-100">
                    <form action="do-search" class="search-form">
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

        <div class="row mt-5">

            <div class="col-xxl-10 col-xl-11">
                @forelse($categories as $category)
                @php
                $products = $category->products;
                @endphp
                <div class="catalog-item-wrapper mb-2">
                    <div class="d-grid gap-2 mb-2">
                        <span class="heading">{{ __($category->name) }}</span>
                    </div>
                    @foreach($products->take(5) as $product)
                    @include($activeTemplate.'partials/products')
                    @endforeach


                    <div class="d-grid gap-2 mb-5">
                        <a href="{{ route('category.products', ['search'=>request()->search, 'slug'=>slug($category->name), 'id'=>$category->id]) }}" class="btn btn--base btn-block --base btn--sm">
                            @lang('View All')
                        </a> </div>


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
<a href="https://t.me/ACELOGSTORE01" class="float" target="_blank">
    <i class="fa fa-comment my-float"></i>
</a>



<style>
    .float2 {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 40px;
        left: 40px;
        background-color: #1ea42a;
        color: #FFF;
        border-radius: 50px;
        text-align: center;
        font-size: 30px;
        box-shadow: 2px 2px 3px #999;
        z-index: 100;
    }

    .my-float2 {
        margin-top: 16px;
    }

</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<a href="https://chat.whatsapp.com/CQtiNorfsys3irydIog6ON" class="float2" target="_blank">
    <i class="fa fa-whatsapp my-float"></i>
</a>



</div>



<x-purchase-modal />
@endsection
