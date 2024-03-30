@extends($activeTemplate.'layouts.nofooter')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">

                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <p class="text-center mt-2">@lang('You have requested') <b
                                                class="text-success">{{ showAmount($data['amount'])  }} {{__($general->cur_text)}}</b>
                                            , @lang('Please pay')
                                            <b class="text-success">{{showAmount($data['final_amo']) .' '.$data['method_currency'] }} </b> @lang('for successful payment')
                                        </p>
                                        <h5 class="text-center mb-4">@lang('Please follow the instruction below')</h5>

                                        <p class="my-4 text-center">@php echo  $data->gateway->description @endphp</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">

                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('user.deposit.manual.update') }}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf


                                    <div class="row mb-3">

                                        <label class="my-3">Sender Name</label>
                                        <input class="form-control" name="user_name">

                                        <label class="my-3">Debit Screenshot</label>
                                        <input type="file" name="receipt" class="btn btn-default"
                                               style="background: #e9e9e9; color: rgb(58, 160, 255);">

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
                                                <button type="submit"
                                                        style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%); color:#ffffff;"
                                                        class="btn btn-primary text-start w-100 btn-rounded">
                                                    <svg class="cart me-4" width="16" height="16" viewBox="0 0 18 18"
                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M17.5158 2.01275C17.9478 0.81775 16.7898 -0.34025 15.5948 0.0927503L0.989804 5.37475C-0.209196 5.80875 -0.354196 7.44475 0.748804 8.08375L5.4108 10.7828L9.5738 6.61975C9.76241 6.43759 10.015 6.3368 10.2772 6.33908C10.5394 6.34135 10.7902 6.44652 10.9756 6.63193C11.161 6.81734 11.2662 7.06815 11.2685 7.33035C11.2708 7.59255 11.17 7.84515 10.9878 8.03375L6.8248 12.1968L9.5248 16.8587C10.1628 17.9617 11.7988 17.8158 12.2328 16.6178L17.5158 2.01275Z"
                                                            fill="white"/>
                                                    </svg>
                                                    PAY NOW
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
    </div>
@endsection
