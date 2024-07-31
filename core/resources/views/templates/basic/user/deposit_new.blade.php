@extends($activeTemplate.'layouts.main')
@section('content')
    <div class="container">

        <div class="row p-3">
            <div class="col-12">
                <form action="{{ route('user.deposit.insert') }}" method="POST">
                    @csrf

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

                    <p class="mt-3 p-3">Top up your wallet easily using Bank Transfer or Card</p>


                    <div class="card">

                        <div class="card-body">
                            <h6>Enter Amount (NGN)</h6>
                            <input type="number" name="amount" class="form-control" required>
                            <input type="text" hidden value="enkpay" name="payment">


                        </div>

                    </div>


                    <div class="card">

                        <div class="card-body">
                            <h6 class="mb-1">Select Payment Gateway</h6>
                            <div class="d-flex align-items-center mb-3">
                                <div class="col-12">
                                    <select class="form-control" name="gateway" required>
                                        @foreach ($gateway_currency as $data)
                                            <option value="{{ $data->code }}">{{ $data->name }} </option>
                                        @endforeach
                                    </select>

                                    {{--                                @foreach($gateway_currency as $data)--}}
                                    {{--                                    <div class="clearfix">--}}
                                    {{--                                        <input type="radio" value="{{$data->method_code}}" name="gateway" required--}}
                                    {{--                                               data-gateway="{{ $data }}" class="btn-check" id="{{$data->btn_id}}"--}}
                                    {{--                                               checked="btnradio1">--}}
                                    {{--                                        <label class="btn text-small tag-btn" for="{{$data->btn_id}}">--}}
                                    {{--                                            {{$data->name}}--}}
                                    {{--                                        </label>--}}
                                    {{--                                    </div>--}}
                                    {{--                                @endforeach--}}

                                </div>
                            </div>


                        </div>

                    </div>


                    <button type="submit"
                            style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%); color:#ffffff;"
                            class="btn  w-100 mt-3" id="btn-confirm">@lang('Contine')


                </form>


            </div>
            <div class="col-md-12">

                <h5 class="mt-4 mb-4">@lang('Latest Payments History')</h5>
                <div class="col d-flex justify-content-start">
                    {{ paginateLinks($deposits) }}
                </div>

                @forelse($deposits as $deposit)
                    <div class="item-box">

                        @if($deposit->method_code == 1000 || $deposit->method_code == 250 )
                            <div class="item-media mt-2">
                                <svg width="70" height="70" viewBox="0 0 24 24" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M3 9V15C3 17.828 3 19.243 3.879 20.121C4.757 21 6.172 21 9 21H15C17.828 21 19.243 21 20.121 20.121C21 19.243 21 17.828 21 15V9C21 6.172 21 4.757 20.121 3.879C19.243 3 17.828 3 15 3H9"
                                        stroke="#34A853" stroke-width="2" stroke-linecap="round"/>
                                    <path
                                        d="M15 15V16H16V15H15ZM7.70698 6.29301C7.51838 6.11085 7.26578 6.01006 7.00358 6.01234C6.74138 6.01461 6.49057 6.11978 6.30516 6.30519C6.11975 6.4906 6.01458 6.74141 6.01231 7.00361C6.01003 7.26581 6.11082 7.51841 6.29298 7.70701L7.70698 6.29301ZM14 8.00001V15H16V8.00001H14ZM15 14H7.99998V16H15V14ZM15.707 14.293L7.70698 6.29301L6.29298 7.70701L14.293 15.707L15.707 14.293Z"
                                        fill="#34A853"/>
                                </svg>
                            </div>
                        @else

                            <div class="item-media mt-2">
                                <svg width="60" height="60" viewBox="0 0 26 26" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M9.75975 21.9163L15.7576 22.0772C18.5846 22.153 19.9991 22.191 20.9003 21.3358C21.8025 20.4817 21.8405 19.0672 21.9163 16.2402L22.0772 10.2424C22.153 7.41539 22.1909 6.0009 21.3358 5.09965C20.4817 4.19743 19.0672 4.15949 16.2402 4.08367L10.2423 3.9228C7.41536 3.84698 6.00087 3.80904 5.09962 4.66418C4.19739 5.5183 4.15946 6.93279 4.08363 9.75978L3.92277 15.7576"
                                        stroke="#EA4335" stroke-width="2" stroke-linecap="round"/>
                                    <path
                                        d="M16.0793 10.0815L17.079 10.1083L17.1058 9.10867L16.1061 9.08186L16.0793 10.0815ZM7.17993 17.1384C6.99278 17.3221 6.88525 17.5719 6.8805 17.8341C6.87575 18.0962 6.97415 18.3498 7.15452 18.5401C7.33489 18.7304 7.5828 18.8422 7.84484 18.8516C8.10688 18.8609 8.36209 18.7669 8.55551 18.5898L7.17993 17.1384ZM9.05504 10.8935L16.0525 11.0811L16.1061 9.08186L9.10866 8.89418L9.05504 10.8935ZM15.0797 10.0547L14.892 17.0522L16.8913 17.1058L17.079 10.1083L15.0797 10.0547ZM15.3915 9.3558L7.17993 17.1384L8.55551 18.5898L16.7671 10.8072L15.3915 9.3558Z"
                                        fill="#EA4335"/>
                                </svg>
                            </div>
                        @endif

                        <div class="item-content">


                            @if($deposit->method_code == 1000)
                                <h6 class="mb-0 text-small">Manual Deposit</h6></a>
                                <div class="item-footer">
                                    <h6>{{number_format($deposit->amount, 2)}}</h6>

                                    <a href="javascript:void(0);" class="item- text-small d-flex justify-content-end">
                                        @if($deposit->status == 1)
                                            <a href="#" class="btn btn-success btn-sm">Completed</a>
                                        @elseif($deposit->status == 2)
                                            <a href="#"
                                               class="btn btn-warning btn-sm">Pending</a>
                                        @elseif($deposit->status == 3)
                                            <a href="#" class="btn btn-danger btn-sm">Rejected</a>
                                        @else
                                            <a href="#"
                                               class="btn btn-warning btn-sm">Pending</a>

                                        @endif

                                    </a>
                                </div>
                            @elseif($deposit->method_code == 250)
                                <h6 class="mb-0">Instant Funding</h6></a>
                                <div class="item-footer">
                                    <h6>{{number_format($deposit->amount, 2)}}</h6>
                                    <a href="javascript:void(0);" class="item-bookmark">
                                        @if($deposit->status == 1)
                                            <a href="#" class="btn btn-success btn-sm">Completed</a>
                                        @elseif($deposit->status == 2)
                                            <a href="/user/resolve-deposit?trx={{$deposit->trx}}"
                                               class="btn btn-dark btn-sm">Resolve</a>
                                        @elseif($deposit->status == 3)
                                            <a href="#" class="btn btn-danger btn-sm">Rejected</a>
                                        @else
                                            <a href="/user/resolve-deposit?trx={{$deposit->trx}}"
                                               class="btn btn-dark btn-sm">Resolve</a>
                                        @endif

                                    </a>
                                </div>
                            @else

                                <h6 class="mb-0">Item Purchase</h6></a>
                                <div class="item-footer">
                                    <h6>{{number_format($deposit->amount, 2)}}</h6>
                                    @if($deposit->status == 1)
                                        <span  class="text-small col-sm-12 badge bg-success mb-1">Successful</span>
                                    @elseif($deposit->status == 2)
                                        <span  class="text-small col-sm-12 badge bg-warning mb-1">Pending</span>
                                    @elseif($deposit->status == 3)
                                        <span  class="text-small col-sm-12 badge bg-danger mb-1">Canceled</span>
                                    @else
                                        <span  class="text-small col-sm-12 badge bg-warning mb-1">Pending</span>
                                    @endif

                                    <a href="javascript:void(0);" class="item-bookmark">
                                        <svg width="24" height="22" viewBox="0 0 24 22" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.7843 2.04749H16.785H16.8064C17.8714 2.05009 18.9118 2.36816 19.7963 2.96157C20.681 3.55518 21.37 4.39768 21.7762 5.38265C22.1823 6.36762 22.2875 7.45087 22.0783 8.49557C21.8692 9.54028 21.3551 10.4996 20.6011 11.2522L20.6004 11.2529L12.0015 19.8519L3.43855 11.2543L3.41711 11.2328L3.39439 11.2126C2.84628 10.7254 2.40336 10.1314 2.09273 9.46713C1.7821 8.80281 1.61031 8.0821 1.58785 7.3491C1.5654 6.61609 1.69276 5.88622 1.96215 5.20414C2.23153 4.52206 2.63727 3.90213 3.15453 3.38228C3.67179 2.86243 4.28969 2.45361 4.97042 2.18082C5.65115 1.90804 6.38038 1.77704 7.11349 1.79584C7.84659 1.81464 8.56815 1.98284 9.23401 2.29015C9.89986 2.59745 10.496 3.03741 10.9859 3.58308L11.0039 3.60309L11.0229 3.6221L11.2929 3.8921L11.9812 4.58036L12.6878 3.91095L12.9728 3.64095L12.9833 3.63096L12.9936 3.62067C13.4906 3.12161 14.0814 2.72571 14.7319 2.45573C15.3825 2.18575 16.08 2.04701 16.7843 2.04749Z"
                                                stroke="#BFC9DA" stroke-width="2"></path>
                                        </svg>
                                    </a>
                                </div>

                            @endif

                        </div>
                    </div>

                @empty

                    <div class="item-box">
                        <div class="item-media">
                            <img src="assets/images/food/food2.png" alt="food">
                        </div>
                        <div class="item-content">
                            <a href="product.html"><h6 class="mb-0">Nasi Goreng Kampung Buk Minah</h6></a>
                            <div class="item-footer">
                                <h6>$ 5.0</h6>
                                <a href="javascript:void(0);" class="item-bookmark">
                                    <svg width="24" height="22" viewBox="0 0 24 22" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M16.7843 2.04749H16.785H16.8064C17.8714 2.05009 18.9118 2.36816 19.7963 2.96157C20.681 3.55518 21.37 4.39768 21.7762 5.38265C22.1823 6.36762 22.2875 7.45087 22.0783 8.49557C21.8692 9.54028 21.3551 10.4996 20.6011 11.2522L20.6004 11.2529L12.0015 19.8519L3.43855 11.2543L3.41711 11.2328L3.39439 11.2126C2.84628 10.7254 2.40336 10.1314 2.09273 9.46713C1.7821 8.80281 1.61031 8.0821 1.58785 7.3491C1.5654 6.61609 1.69276 5.88622 1.96215 5.20414C2.23153 4.52206 2.63727 3.90213 3.15453 3.38228C3.67179 2.86243 4.28969 2.45361 4.97042 2.18082C5.65115 1.90804 6.38038 1.77704 7.11349 1.79584C7.84659 1.81464 8.56815 1.98284 9.23401 2.29015C9.89986 2.59745 10.496 3.03741 10.9859 3.58308L11.0039 3.60309L11.0229 3.6221L11.2929 3.8921L11.9812 4.58036L12.6878 3.91095L12.9728 3.64095L12.9833 3.63096L12.9936 3.62067C13.4906 3.12161 14.0814 2.72571 14.7319 2.45573C15.3825 2.18575 16.08 2.04701 16.7843 2.04749Z"
                                            stroke="#BFC9DA" stroke-width="2"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>

                @endforelse
            </div>
        </div>
    </div>

@endsection
