@extends($activeTemplate . 'layouts.app')
@section('app')
    @include($activeTemplate . 'partials.header_top')


    @yield('content')

    <x-subscribe-modal />
   @include($activeTemplate . 'partials.footer')
@endsection
