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
                                    <input type="text" hidden value="enkpay"  name="payment">

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
    <a href="https://t.me/acelogs_01" class="float" target="_blank">
        <i class="fa fa-comment my-float"></i>
    </a>


</div>
@endsection