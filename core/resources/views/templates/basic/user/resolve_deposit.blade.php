@extends($activeTemplate.'layouts.master')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card custom--card">
            <div class="card-header">
                <h5 class="card-title text-center">@lang('Resolve Deposit')</h5>
            </div>
            <div class="card-body p-5">
                <ul class="list-group list-group-flush text-center">
                    <li class="list-group-item d-flex flex-wrap justify-content-center px-0">
                        <div class="row mt-12 text-center">

                                            
                                <p>Resolve pending transactions by using your bank session ID / Refrence
                                    No on your transaction
                                    recepit</p>
                            
                                <form action="resolve-now" method="POST">
                                    @csrf
                            
                                    <label class="my-3">Enter Session ID</label>
                                    <div>
                                        <input type="text" name="session_id" required
                                            class="form-control" placeholder="Enter session ID">
                                        <input hidden type="text" name="trx_ref"
                                            value="{{ $trx }}" required class="form-control">
                            
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


