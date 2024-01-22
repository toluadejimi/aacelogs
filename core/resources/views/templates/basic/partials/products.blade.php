<div class="catalog-item">



    <div class="row">
        <div class="col-4">
            <span class="catalog-item__thumb">
                <img src="{{ getImage(getFilePath('product').'/'.$product->image,getFileSize('product')) }}" alt="@lang('image')">
            </span>
        </div>
        
        <h6 class="catalog-item__title">
            @php $text = $product->name.' | '.strLimit(strip_tags($product->description), 270); @endphp
            <a href="{{ route('product.details', $product->id) }}" class="catalog-item__link">
                @php echo $text; @endphp
            </a>

        </h6>
        <div class="col-4">
            <div class="catalog-item__info d-flex align-items-center">
                <p class="catalog-item__price">
                    @lang('Price'): <span class="amount">{{ $general->cur_sym }}{{ showAmount($product->price) }}</span>
                </p>
               
            </div>
        </div>


        <div class="col-4">
            <div class="catalog-item__info d-flex align-items-center">
               
                               <p class="catalog-item__instock">@lang('In Stock'): <span class="pcs">{{ getAmount($product->in_stock) }} @lang('qty').</span></p>

            </div>
        </div>


         <div class="col-4">
            <div class="catalog-item__info d-flex align-items-center">
               
                @if($product->in_stock)
                <button class="btn btn--base btn--sm purchaseBtn" data-text="{{ $text }}" data-price="{{ showAmount($product->price).' '.$general->cur_text }}" data-qty="{{ getAmount($product->in_stock).' qty' }}" data-id="{{ $product->id }}" data-amount="{{ getAmount($product->price) }}">
                    <i class="las la-shopping-cart"></i> @lang('Buy Now')
                </button>
                @else
                <button class="btn btn--base btn--sm no-drop" disabled>
                    <i class="las la-shopping-cart"></i> @lang('Buy Now')
                </button>
                @endif
            </div>
        </div>


    </div>

</div>
