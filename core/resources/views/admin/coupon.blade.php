@extends('admin.layouts.app')
@section('panel')

    <div class="row mb-none-30">


        <div class="col-lg-9 col-md-9 mb-30">
            <div class="card">
                <div class="card-body">

                    <div class="row card-title">
                        <div class="col"> <h5 class="border-bottom pb-2 d-flex justify-content-start">@lang('Set Coupon')</h5></div>
                        @if($coupons->status == 0)
                        <div class="col-3"> <span class="mb-4 badge badge--danger d-flex justify-content-end">@lang('Inactive')</span></div>
                        @else
                            <div class="col-3"> <span class="mb-4 badge badge--success d-flex justify-content-end">@lang('Active')</span></div>
                        @endif

                    </div>

                    <form action="{{ route('admin.update.coupon') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>@lang('Coupon Code')</label>
                            <input class="form-control" type="text" value="{{ $coupons->coupon_code ?? "Set Name" }}"
                                   name="coupon_code" required>
                        </div>

                        <div class="form-group">
                            <label>@lang('Percentage %')</label>
                            <input class="form-control" value="{{ $coupons->amount ?? "Set Percentage" }}" type="number"
                                   name="amount" required>
                        </div>

                        <input class="form-control" value="{{ $coupons->id ?? "Null" }}" type="text" name="id" hidden>


                        <div class="form-group">
                            <label>@lang('Status')</label>
                            <select class="form-control" name="status" required>
                                <option value="">Select</option>
                                <option value="1">Activate</option>
                                <option value="0">Deactivate</option>
                            </select>
                        </div>
                </div>

                <button type="submit" class="btn btn--primary w-100 btn-lg h-45">@lang('Continue')</button>
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection

{{--@push('breadcrumb-plugins')--}}
{{--    <a href="{{route('admin.profile')}}" class="btn btn-sm btn-outline--primary"><i--}}
{{--            class="las la-user"></i>@lang('Profile Setting')</a>--}}
{{--@endpush--}}
