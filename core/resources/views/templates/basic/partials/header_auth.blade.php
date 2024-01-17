<header class="header" id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand logo" href="{{ route('home') }}">
                <img src="{{ getImage(getFilePath('logoIcon') . '/dark_logo.png') }}" alt="@lang('image')">
            </a>
            <button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span id="hiddenNav"><i class="las la-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-menu ms-auto align-items-lg-center">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="{{ route('user.home') }}">@lang('Dashboard')</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="products">@lang('Buy Logs')</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.deposit.history') }}">@lang('Payments')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.orders') }}">@lang('Orders')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.profile.setting') }}">@lang('Profile')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.change.password') }}">@lang('Change Password')</a>
                    </li>


                    <li class="nav-item d-block">
                        <div class="accounts-buttons d-flex align-items-center">
                            <a href="{{ route('user.logout') }}" class="accounts-buttons__link btn btn--base btn--sm">
                                <i class="fas fa-sign-in-alt"></i> @lang('Logout')
                            </a>
                        </div>
                    </li>

                    @else

                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="products">@lang('Home')</a>
                    </li>

                    <li class="nav-item d-block">
                        <div class="accounts-buttons d-flex align-items-center">
                            <a href="{{ route('user.logout') }}" class="accounts-buttons__link btn btn--base btn--sm">
                                <i class="fas fa-sign-in-alt"></i> @lang('Login')
                            </a>
                        </div>
                    </li>

                    <li class="nav-item d-block">
                        <div class="accounts-buttons d-flex align-items-center">
                            <a href="{{ route('user.register') }}" class="accounts-buttons__link btn btn--danger btn--sm">
                                <i class="fas fa-user"></i> @lang('Register')
                            </a>
                        </div>
                    </li>


                    @endauth




                </ul>
            </div>
        </nav>
    </div>
</header>

@push('style')
<style>
    .nav-menu .nav-item:nth-last-child(2){
        padding-right: 30px;
    }
    @media screen and (max-width: 991px) {
        .nav-menu .nav-item:nth-last-child(2){
            padding-right: 0px;
        }
    }
</style>
@endpush
