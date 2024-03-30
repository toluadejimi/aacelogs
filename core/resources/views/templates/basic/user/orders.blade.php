@extends($activeTemplate.'layouts.nofooter')

@section('content')

    <div class="container">

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
        <div class="row">
            <div class="col-lg-12 p-3">
                <div class="table-responsive">
                    <table class="table table">
                        <thead>
                        <tr>
                            <th class="mb-3">@lang('ID')</th>
                            <th>@lang('Ordered At')</th>
                            <th>@lang('Amount')</th>
                            <th>@lang('Qty')</th>
                            <th>@lang('Details')</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($orders as $order)
                            @php
                                $qty = @$order->orderItems->count();
                                $perUnitPrice = @$order->orderItems->first()->price;
                            @endphp
                            <tr>
                                <td>
                                    <div class="td-wrapper">
                                        {{ $order->id }}
                                    </div>
                                </td>
                                <td>
                                    {{ diffForHumans($order->created_at) }}
                                </td>
                                <td>

                                    {{ __($general->cur_text) }} {{showAmount($order->total_amount)}}
                                </td>
                                <td>
                                    <span>{{ @$order->orderItems->count() }}</span>
                                </td>
                                <td>
                                    <div class="action-buttons">
                                        <a class="btn btn-dark btn-sm"
                                           href="{{ route('user.order.details', $order->id) }}">
                                            <i class="fa fa-desktop"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-muted text-center" colspan="100%">{{ __($emptyMessage) }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                {{ paginateLinks($orders) }}
            </div>
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


                <a href="/" style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%); color:#ffffff;"  class="btn btn-primary text-start w-100 btn-rounded">

                    <svg width="16" height="16" viewBox="0 0 15 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 14.0476V5.95238C15 5.80453 14.9661 5.65871 14.901 5.52646C14.8359 5.39422 14.7414 5.27919 14.625 5.19048L8.0625 0.190476C7.90022 0.0668359 7.70285 0 7.5 0C7.29715 0 7.09978 0.0668359 6.9375 0.190476L0.375 5.19048C0.258566 5.27919 0.164063 5.39422 0.0989744 5.52646C0.0338859 5.65871 0 5.80453 0 5.95238V14.0476C0 14.3002 0.0987722 14.5424 0.274588 14.7211C0.450403 14.8997 0.68886 15 0.9375 15H4.6875C4.93614 15 5.1746 14.8997 5.35041 14.7211C5.52623 14.5424 5.625 14.3002 5.625 14.0476V11.1905C5.625 10.9379 5.72377 10.6956 5.89959 10.517C6.0754 10.3384 6.31386 10.2381 6.5625 10.2381H8.4375C8.68614 10.2381 8.9246 10.3384 9.10041 10.517C9.27623 10.6956 9.375 10.9379 9.375 11.1905V14.0476C9.375 14.3002 9.47377 14.5424 9.64959 14.7211C9.8254 14.8997 10.0639 15 10.3125 15H14.0625C14.3111 15 14.5496 14.8997 14.7254 14.7211C14.9012 14.5424 15 14.3002 15 14.0476Z" fill="white"/>
                    </svg>

                </a>
            </div>
        </div>





    </div>
@endsection
