<div class="card">
    <div class="card-body ">

        <table class="table table-sm table-responsive-sm">


            <thead style="border-radius: 100px; background: #10113D;color: #ffffff;">
                <tr class>
                    <th style="border-radius: 10px 0px 0px 10px;"></th>
                    <th>Product</th>
                    <th>Price</th>
                    <th></th>
                    <th style="border-radius: 0px 10px 10px 0px;">Stock</th>
                </tr>
            </thead>


            <tbody>


                <td class="">
                    <a href="#" data-help="Click to read detailed description">
                        <img src="{{ getImage(getFilePath('product') . '/' . $product->image, getFileSize('product')) }}"
                            alt="@lang('image')" height="50" width="50">
                    </a>
                </td>

                <td class="col-sm-12">
                    @php $text = $product->name.' | '.strLimit(strip_tags($product->description), 30); @endphp
                    <a class="text-small text-black" href="{{ route('product.details', $product->id) }}"
                        style="text-size-adjust: 8px;"
                        class="text-dark font-size                                                                             ">
                        @php echo $text; @endphp
                    </a>
                </td>

                <td class="">
                    <a class="text-small text-black"> {{ $general->cur_sym }}{{ showAmount($product->price) }} </a>
                </td>


                <td class="small col-sm-12">
                </td>

                <td class="text-small">
                    @if ($product->in_stock == 0)
                        <div>
                            <button type="button" class="form-control" type="button" data-id="12005">
                                <ion-icon class="text-dark" name="bag-add"></ion-icon>
                            </button>
                        </div>
                    @else
                        @auth
                            
                            <form  class="" action="/product/details/{{ $product->id }}" method="GET">
                                <span  class="text-small col-sm-12 badge bg-dark mb-1">{{ $product->in_stock }} pcs</span>

                                @csrf
                                <button style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%); color:#ffffff"
                                    class="btn btn-sm purchaseBtn btn-block">
                                    <ion-icon class="" style="border: 0px;" name="bag-add">buy</ion-icon>
                                </button>

                            </form>
                        @else
                            <form action="/user/login" method="GET">
                                @csrf
                                <div class="button-wrap" onclick="subscribeBuyItem(6);">
                                    <div data-help="Buy Now">
                                        <button
                                            style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%); color:#ffffff"
                                            class="btn btn-sm purchaseBtn">
                                            <ion-icon name="log-in-outline"></ion-icon>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        @endauth
                    @endif
                </td>


            </tbody>


        </table>


    </div>
</div>
