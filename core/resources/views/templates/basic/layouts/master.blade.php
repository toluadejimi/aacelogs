@extends($activeTemplate . 'layouts.app')

@section('app')
    @include($activeTemplate . 'partials.header_auth')
            @yield('content')

    @include($activeTemplate . 'partials.footer')
@endsection

@push('script-lib')
    <script src="{{ asset($activeTemplateTrue.'js/jquery.validate.js') }}"></script> 
@endpush

@push('script')
<script>
    (function($) {
        "use strict"; 

        $('form').on('submit', function () {
            if(!$(this).hasClass('exclude')){
                if ($(this).valid()) {
                    $(':submit', this).attr('disabled', 'disabled');
                }
            }
        });

    })(jQuery);
</script>
@endpush