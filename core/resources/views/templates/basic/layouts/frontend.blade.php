@extends($activeTemplate . 'layouts.app')
@section('app')
    @include($activeTemplate . 'partials.header_top')
    @include($activeTemplate . 'partials.header_bottom')


    @yield('content')

    <x-subscribe-modal />
   @include($activeTemplate . 'partials.footer')
@endsection
