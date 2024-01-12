@php
    $banner = getContent('banner.content', true);
    $bannerIcon = getContent('banner_icon.content', true);
@endphp
<section class="banner-section">
    <div class="banner-section-bg-img">
        <img src="{{ asset($activeTemplateTrue . 'images/banner-bg.png') }}" alt="">
    </div>
    <div class="banner-ac-imgs animated"> 
        <span class="ac-img animated"><img src="{{ getImage('assets/images/frontend/banner_icon/' . @$bannerIcon->data_values->one, '35x35') }}" alt=""></span>
        <span class="ac-img animated"><img src="{{ getImage('assets/images/frontend/banner_icon/' . @$bannerIcon->data_values->two, '35x35') }}" alt=""></span>
        <span class="ac-img animated"><img src="{{ getImage('assets/images/frontend/banner_icon/' . @$bannerIcon->data_values->three, '35x35') }}" alt=""></span>
        <span class="ac-img animated"><img src="{{ getImage('assets/images/frontend/banner_icon/' . @$bannerIcon->data_values->four, '35x35') }}"" alt=""></span>
        <span class="ac-img animated"><img src="{{ getImage('assets/images/frontend/banner_icon/' . @$bannerIcon->data_values->five, '35x35') }}" alt=""></span>
        <span class="ac-img animated"><img src="{{ getImage('assets/images/frontend/banner_icon/' . @$bannerIcon->data_values->six, '35x35') }}" alt=""></span>
        <span class="ac-img animated"><img src="{{ getImage('assets/images/frontend/banner_icon/' . @$bannerIcon->data_values->seven, '35x35') }}" alt=""></span>
        <span class="ac-img animated"><img src="{{ getImage('assets/images/frontend/banner_icon/' . @$bannerIcon->data_values->eight, '35x35') }}" alt=""></span>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8"> 
                <div class="banner-content text-center">
                    <h1 class="banner-content__title">{{ __(@$banner->data_values->heading) }}</h1>
                    <p class="banner-content__desc">{{ __(@$banner->data_values->description) }}</p>
                    <ul class="banner-category-list">
                        @foreach($categories->take(7) as $category)
                            <li class="item">
                                <a href="{{ route('category.products', ['slug'=>slug($category->name), 'id'=>$category->id]) }}" class="link">{{ __($category->name) }}</a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="banner-content__buttons flex-center">    
                        <a href="{{ @$banner->data_values->first_button_url }}" class="btn btn--base">
                            {{ __(@$banner->data_values->first_button_name) }}
                        </a>
                        <a href="{{ @$banner->data_values->second_button_url }}"  class="btn btn-outline--base">
                            {{ __(@$banner->data_values->second_button_name) }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
