@extends($activeTemplate.'layouts.master')

@section('content')
<div class="row justify-content-end mb-4">
    <div class="col-xl-4 col-md-6">
        <form action="">
            <div class="input-group">
                <input type="text" name="search" class="form-control form--control" value="{{ request()->search }}" placeholder="@lang('Search by Trx')">
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
                        <th>@lang('ID')</th>
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
                               
                                        {{showAmount($order->total_amount)}} {{ __($general->cur_text) }}
                            </td>
                            <td>
                                <span>{{ @$order->orderItems->count() }}</span>
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a class="action-btn btn btn--base btn--sm" href="{{ route('user.order.details', $order->id) }}">
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
@endsection