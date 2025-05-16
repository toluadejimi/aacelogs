@extends($activeTemplate.'layouts.nofooter')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card custom--card">
            <div class="card-header">
            </div>
            <div class="card-body p-5">
                <ul class="list-group list-group-flush text-center">
                    <li class="text-center px-0 my-3">
                        @lang('You have to pay')
                    </li>

                    @php if($deposit->final_amo > 11000){
                            $amount = $deposit->final_amo + 300;
                         } else{
                            $amount = $deposit->final_amo + 100;
                         }
                    @endphp

                    <li class="text-center px-0">
                        <h6>{{__($deposit->method_currency)}} {{showAmount($amount)}} </h6>
                        <span style="font-size: 10px">Bank charges apply</span>
                    </li>





                    <style>
                        /* Modal overlay */
                        .modal-overlay {
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background-color: rgba(0, 0, 0, 0.5);
                            display: flex;
                            justify-content: center;
                            align-items: center;
                            z-index: 1000;
                        }

                        /* Modal box */
                        .modal-box {
                            background-color: #fff;
                            padding: 30px;
                            border-radius: 10px;
                            max-width: 400px;
                            width: 90%;
                            text-align: center;
                            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
                            font-family: Arial, sans-serif;
                        }

                        .modal-box h2 {
                            margin-bottom: 10px;
                        }

                        .modal-box button {
                            margin-top: 15px;
                            padding: 10px 20px;
                            background-color: #007bff;
                            color: white;
                            border: none;
                            border-radius: 5px;
                            cursor: pointer;
                        }

                        .modal-box button:hover {
                            background-color: #0056b3;
                        }
                    </style>


                    <div id="paymentModal" class="modal-overlay">
                        <div class="modal-box">
                            <div style="font-size: 40px; color: #e74c3c; margin-bottom: 10px;">
                                ⚠️
                            </div>
                            <h2 style="color: #333; font-weight: bold; margin-bottom: 5px;">
                                Attention!!!
                            </h2>
                            <p style="color: #444; font-size: 25px; margin-bottom: 20px;">
                                <strong style="color: #e74c3c;"></strong>
                            </p>
                            <p style="color: #555; font-size: 15px; line-height: 1.6; margin: 0 0 20px;">
                                Please ensure you pay,  <strong>the exact amount shown</strong> including all applicable charges.
                                <br>
                                Paying less or more than the  <strong>specified amount may result in delays or a failed transaction.
                                </strong><br>
                                <strong>Thank you for your attention.</strong>
                            </p>
                            <button onclick="closeModal()" style="
        padding: 10px 25px;
        background-color: #0b1a69;
        border: none;
        color: white;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
    ">
                                I Understand
                            </button>
                        </div>
                    </div>

                    <script>
                        // Close modal function
                        function closeModal() {
                            document.getElementById("paymentModal").style.display = "none";
                        }

                        // Show modal on page load
                        window.onload = function() {
                            document.getElementById("paymentModal").style.display = "flex";
                        };
                    </script>


                </ul>

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
                        <a href="{{ $data->url }}" style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%); color:#ffffff;"  class="btn btn-primary text-start w-100 btn-rounded">
                            <svg class="cart me-4" width="16" height="16" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.5158 2.01275C17.9478 0.81775 16.7898 -0.34025 15.5948 0.0927503L0.989804 5.37475C-0.209196 5.80875 -0.354196 7.44475 0.748804 8.08375L5.4108 10.7828L9.5738 6.61975C9.76241 6.43759 10.015 6.3368 10.2772 6.33908C10.5394 6.34135 10.7902 6.44652 10.9756 6.63193C11.161 6.81734 11.2662 7.06815 11.2685 7.33035C11.2708 7.59255 11.17 7.84515 10.9878 8.03375L6.8248 12.1968L9.5248 16.8587C10.1628 17.9617 11.7988 17.8158 12.2328 16.6178L17.5158 2.01275Z" fill="white"/>
                            </svg>
                            PAY NOW
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

