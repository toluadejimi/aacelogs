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
</div>
@endsection