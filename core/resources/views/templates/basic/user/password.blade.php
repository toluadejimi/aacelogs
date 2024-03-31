@extends($activeTemplate.'layouts.nofooter')

@section('content')

    <div class="container">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="my-3">@lang('Current Password')</label>
                            <input type="password" class="form-control" name="current_password" required
                                   autocomplete="current-password">
                        </div>
                        <div class="form-group">
                            <label class="my-3">@lang('Password')</label>
                            <div class="input-group">
                                <input type="password"
                                       class="form-control @if($general->secure_password) secure-password @endif"
                                       name="password" required autocomplete="current-password">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="my-3">@lang('Confirm Password')</label>
                            <input type="password" class="form-control" name="password_confirmation" required
                                   autocomplete="current-password">
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


                                <button type="submit" style="background: linear-gradient(90deg, #0F0673 0%, #B00BD9 100%); color:#ffffff;"
                                   class="btn btn-primary text-start w-100 btn-rounded">

                                    Reset Password
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
        @endsection

        @if($general->secure_password)
            @push('script-lib')
                <script src="{{ asset('assets/global/js/secure_password.js') }}"></script>
    @endpush
    @endif
