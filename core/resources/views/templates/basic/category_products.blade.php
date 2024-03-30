@extends($activeTemplate . 'layouts.nofooter')

@section('content')

    <div class="container">
        <section class="catalog-section section-bg py-{{ @$products->count() ? 120 : 60 }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xxl-10 col-xl-11">
                        <div class="catalog-item-wrapper">

                            <div style="border-radius: 100px; background: #10113D;color: #ffffff;">
                                <div class="row">
                                    <div class="col-2"></div>
                                    <div class="col-3">Product</div>
                                    <div class="col-5">Price</div>
                                    <div class="col-2">Stock</div>
                                </div>
                            </div>


                            @forelse($products as $product)
                                @include($activeTemplate.'partials/products')
                            @empty
                                <div class="empty-data text-center">
                                    <div class="thumb">
                                        <img src="{{ asset($activeTemplateTrue . 'images/not-found.png') }}">
                                    </div>
                                    <h4 class="title">@lang('No result found for "'.$category->name.'"')</h4>
                                </div>
                            @endforelse
                            {{ paginateLinks($products) }}
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection



