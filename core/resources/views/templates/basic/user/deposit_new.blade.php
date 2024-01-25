@extends($activeTemplate.'layouts.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card custom--card">
            <div class="card-header">
                <h5 class="card-title text-center">@lang('Fund Wallet')</h5>
            </div>
            <div class="card-body p-5">
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item d-flex flex-wrap justify-content-center px-0">
                        <div class="row mt-12 text-center">

                            <form action="{{ route('user.deposit.insert') }}" method="POST">
                                @csrf

                                <div class="form-group col-md-12">
                                    <label class="form--label">@lang('Enter Amount')</label>
                                    <input type="number" name="amount" class="form--control" required>
                                    <input type="text" hidden value="enkpay" name="payment">

                                </div>


                                <div class="form-group col-md-12">
                                    <label class="form--label">@lang('Select Gateway')</label>
                                    <select class="form--control form-select" name="gateway" required>
                                        <option value="">@lang('Select One')</option>
                                        @foreach($gateway_currency as $data)
                                        <option value="{{$data->method_code}}" data-gateway="{{ $data }}">
                                            {{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <button type="submit" class="btn btn--base w-100 mt-3" id="btn-confirm">@lang('Contine')


                            </form>

                        </div>
                        <strong> </strong>
                    </li>
                </ul>


            </div>
        </div>
    </div>


    <div class="col-md-6">

        <h5 class="mt-4 mb-4">@lang('Latest Payments History')</h5>
        <div class="table-responsive">
            <table class="table table--responsive--xl custom--table">
                <thead>
                    <tr>
                        <th>@lang('Gateway | Trx')</th>
                        <th>@lang('Initiated')</th>
                        <th>@lang('Amount')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($deposits as $deposit)
                    <tr>
                        <td>
                            <div class="td-wrapper">
                                <span class="title d-block">{{ __($deposit->gateway?->name) }}</span>
                                <span class="info"> {{ $deposit->trx }} </span>
                            </div>
                        </td>

                        <td>
                            <div class="td-wrapper">
                                <span class="d-block">{{ showDateTime($deposit->created_at) }}</span>
                                <span class="">{{ diffForHumans($deposit->created_at) }}</span>
                            </div>

                        </td>
                        <td>
                            <div class="td-wrapper">
                                <span class="">
                                    {{ __($general->cur_sym) }}{{ showAmount($deposit->amount) }} + <span class="text--base" title="@lang('charge')">{{
                                                showAmount($deposit->charge) }}
                                    </span>
                                </span>
                                <strong class="d-block" title="@lang('Amount with charge')">
                                    {{ showAmount($deposit->amount + $deposit->charge) }}
                                    {{ __($general->cur_text) }}
                                </strong>
                            </div>
                        </td>

                        <td>
                            @php echo $deposit->statusBadge @endphp
                        </td>
                        @php
                        $details = $deposit->detail != null ? json_encode($deposit->detail) : null;
                        @endphp
                        <td>
                            <div class="action-buttons">
                                @if ($deposit->status == 0)
                                <a href="/user/resolve-deposit?trx={{ $deposit->trx }}" class="btn btn-sm btn-danger my-1" type="button">Resolve</button>

                        </td>
                        @endif


                    </tr>
                    @empty
                    <tr>
                        <td colspan="100%" class="text-center">{{ __($emptyMessage) }}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
    {{ paginateLinks($deposits) }}







   
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
@endsection
