@extends($activeTemplate.'layouts.master')

@section('content')

    <div class="container">

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
    <div class="col-lg-12">
          <div class="table-responsive">
            <table class="table">

                <thead>
                    <tr>
                        <th>@lang('Trx')</th>
                        <th>@lang('Time')</th>
                        <th>@lang('Amount')</th>
                        <th>@lang('Status')</th>
                        <th>@lang('Action')</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($deposits as $deposit)
                    <tr>
                        <td>
                            <span class="info"> {{ $deposit->trx }} </span>
                        </td>

                        <td>
                            <span class="">{{ diffForHumans($deposit->created_at) }}</span>
                        </td>
                        <td>

                            {{ __($general->cur_sym) }}{{ showAmount($deposit->amount) }}
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
                                <a href="/user/resolve-deposit?trx={{ $deposit->trx }}" class="btn btn-sm btn-danger" type="button">Resolve</button>
                                 @endif

                        </td>



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
</div>

{{-- APPROVE MODAL --}}
<div id="detailModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title">@lang('Details')</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush userData">
                </ul>
                <div class="feedback"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark btn--sm" data-bs-dismiss="modal">@lang('Close')</button>
            </div>
        </div>
    </div>
</div>
    </div>

@endsection

@push('script')
    <script>
        (function ($) {
            "use strict";

            $('.detailBtn').on('click', function () {
                var modal = $('#detailModal');

                var userData = $(this).data('info');
                var html = '';
                if(userData){
                    userData.forEach(element => {
                        if(element.type != 'file'){
                            html += `
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <span>${element.name}</span>
                                <span">${element.value}</span>
                            </li>`;
                        }
                    });
                }

                if($(this).data('admin_feedback') != undefined){
                    var adminFeedback = `
                        <div class="my-3 ms-2">
                            <strong>@lang('Admin Feedback')</strong>
                            <p>${$(this).data('admin_feedback')}</p>
                        </div>
                    `;
                }else{
                    var adminFeedback = '';
                }

                if(!html && !adminFeedback){
                    html = `<span class='d-block text-center mt-2 mb-2'>{{ __($emptyMessage) }}</span>`;
                }

                modal.find('.userData').html(html);
                modal.find('.feedback').html(adminFeedback);
                modal.modal('show');
            });
        })(jQuery);

    </script>
@endpush

