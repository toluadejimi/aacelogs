@extends($activeTemplate.'layouts.nofooter')

@section('content')


    <div class="container">

        <div class="row">
            <div class="col-6">
                <div class="card p-3">
                    <h6 class="text-center">Total Orders</h6>
                    <strong class="text-center">{{$count_order}}</strong>
                </div>
            </div>
            <div class="col-6">
                <div class="card p-3">
                    <h6 class="text-center">Total Spent</h6>
                    <strong class="text-center">{{number_format($order_sum)}}</strong>
                </div>
            </div>


        </div>

        <div class="row justify-content-end mb-4">
            <div class="col-xl-4 col-md-6">
                <form action="">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control form--control"
                               value="{{ request()->search }}" placeholder="@lang('Search by Trx')">
                        <button class="input-group-text bg--base border-0 text--white">
                            <i class="las la-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="col d-flex justify-content-start my-3">
            {{ paginateLinks($orders) }}
        </div>

        <div style="border-radius: 100px; background: #10113D;color: #ffffff; font-size: 11px">
            <div class="row">
                <div class="col">ID</div>
                <div class="col">Date</div>
                <div class="col">Amount(NGN)</div>
                <div class="col">Qty</div>
                <div class="col">View</div>
            </div>
        </div>
        @forelse($orders as $order)
            @php
                $qty = @$order->orderItems->count();
                $perUnitPrice = @$order->orderItems->first()->price;
            @endphp
            <div class="card">
                <div class="card-body " style="font-size: 11px;">
                    <div class="row">

                        <div class="col">
                            {{ $order->id }}
                        </div>

                        <div class="col">
                            {{ diffForHumans($order->created_at) }}
                        </div>
                        <div class="col">
                            {{showAmount($order->total_amount)}}
                        </div>
                        <div class="col">
                            <span>{{ @$order->orderItems->count() }}</span>
                        </div>
                        <div class="col">
                            <div class="action-buttons">
                                <a class="btn btn-dark btn-sm"
                                   href="{{ route('user.order.details', $order->id) }}">
                                    <i class="fa fa-desktop"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @empty
            <div class="card">
                <div class="card-body text-center p-4">

                    <svg width="40" height="40" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.699126 22.1299L11.4851 0.936473C11.6065 0.697285 11.7856 0.49768 12.0036 0.358621C12.2215 0.219562 12.4703 0.146179 12.7237 0.146179C12.9772 0.146179 13.2259 0.219562 13.4439 0.358621C13.6618 0.49768 13.841 0.697285 13.9624 0.936473L24.7483 22.1299C24.8658 22.3607 24.9253 22.6205 24.9209 22.8835C24.9165 23.1466 24.8484 23.4039 24.7234 23.6301C24.5983 23.8562 24.4206 24.0434 24.2078 24.1732C23.995 24.303 23.7543 24.3708 23.5097 24.3701H1.93781C1.69314 24.3708 1.45252 24.303 1.23968 24.1732C1.02684 24.0434 0.849131 23.8562 0.724084 23.6301C0.599037 23.4039 0.530969 23.1466 0.526592 22.8835C0.522216 22.6205 0.581682 22.3607 0.699126 22.1299ZM14.2252 14.2749L14.9815 9.39487C15.0039 9.25037 14.9967 9.10237 14.9605 8.96116C14.9243 8.81995 14.8599 8.6889 14.7719 8.57713C14.6838 8.46536 14.5742 8.37554 14.4506 8.31391C14.327 8.25228 14.1925 8.22033 14.0563 8.22026H11.3912C11.255 8.22033 11.1204 8.25228 10.9969 8.31391C10.8733 8.37554 10.7637 8.46536 10.6756 8.57713C10.5876 8.6889 10.5232 8.81995 10.487 8.96116C10.4508 9.10237 10.4436 9.25037 10.466 9.39487L11.2223 14.2749H14.2252ZM14.7882 18.1096C14.7882 17.5208 14.5707 16.9561 14.1835 16.5398C13.7964 16.1234 13.2713 15.8895 12.7237 15.8895C12.1762 15.8895 11.6511 16.1234 11.2639 16.5398C10.8768 16.9561 10.6593 17.5208 10.6593 18.1096C10.6593 18.6984 10.8768 19.2631 11.2639 19.6794C11.6511 20.0957 12.1762 20.3296 12.7237 20.3296C13.2713 20.3296 13.7964 20.0957 14.1835 19.6794C14.5707 19.2631 14.7882 18.6984 14.7882 18.1096Z" fill="#EA4335"/>
                    </svg>
                    <br><br>

                    <h6>No data found</h6>



                </div>
            </div>
        @endforelse
    </div>



    <div class="footer fixed">

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


        <div class="container">


            <a href="/" style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%); color:#ffffff;"
               class="btn btn-primary text-start w-100 btn-rounded">

                <svg width="16" height="16" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M15 14.0476V5.95238C15 5.80453 14.9661 5.65871 14.901 5.52646C14.8359 5.39422 14.7414 5.27919 14.625 5.19048L8.0625 0.190476C7.90022 0.0668359 7.70285 0 7.5 0C7.29715 0 7.09978 0.0668359 6.9375 0.190476L0.375 5.19048C0.258566 5.27919 0.164063 5.39422 0.0989744 5.52646C0.0338859 5.65871 0 5.80453 0 5.95238V14.0476C0 14.3002 0.0987722 14.5424 0.274588 14.7211C0.450403 14.8997 0.68886 15 0.9375 15H4.6875C4.93614 15 5.1746 14.8997 5.35041 14.7211C5.52623 14.5424 5.625 14.3002 5.625 14.0476V11.1905C5.625 10.9379 5.72377 10.6956 5.89959 10.517C6.0754 10.3384 6.31386 10.2381 6.5625 10.2381H8.4375C8.68614 10.2381 8.9246 10.3384 9.10041 10.517C9.27623 10.6956 9.375 10.9379 9.375 11.1905V14.0476C9.375 14.3002 9.47377 14.5424 9.64959 14.7211C9.8254 14.8997 10.0639 15 10.3125 15H14.0625C14.3111 15 14.5496 14.8997 14.7254 14.7211C14.9012 14.5424 15 14.3002 15 14.0476Z"
                        fill="white"/>
                </svg>

            </a>
        </div>
    </div>


    </div>
@endsection
