<!-- header-section start  -->
<header class="header">
    <div class="header__bottom">
        <div class="container">
            <nav class="navbar navbar-expand-xl p-0 align-items-center">
                <a class="site-logo site-title" href="{{ route('home') }}">
                    <img src="{{ getImage(getFilePath('logoIcon') . '/logo.png') }}" alt="logo">
                </a>
                <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="menu-toggle"></span>
                </button>
                <div class="collapse navbar-collapse mt-lg-0 mt-3" id="navbarSupportedContent">
                    <ul class="navbar-nav main-menu ms-auto">
                        <li><a href="{{ route('user.home') }}">@lang('Dashboard')</a></li>
                        <li class="menu_has_children">
                            <a href="#0">@lang('Deposit')</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('user.deposit.index') }}">@lang('Deposit Now')</a></li>
                                <li><a href="{{ route('user.deposit.history') }}">@lang('Deposit History')</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('packages') }}">@lang('Package')</a></li>
                        <li><a href="{{ route('user.signals') }}">@lang('Signals')</a></li>
                        <li><a href="{{ route('user.referrals') }}">@lang('Referrals')</a></li>
                        <li class="menu_has_children">
                            <a href="#0">@lang('Support')</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('ticket.open') }}">@lang('New Ticket')</a></li>
                                <li><a href="{{ route('ticket.index') }}">@lang('My Tickets')</a></li>
                            </ul>
                        </li>
                        <li class="menu_has_children">
                            <a href="#0">@lang('Account')</a>
                            <ul class="sub-menu">
                                <li><a href="{{ route('user.profile.setting') }}">@lang('Profile')</a></li>

                                @if (Auth::user()->phone_veriry_status == false)
                                    <li><a href="{{ route('user.verify_phone_number') }}">@lang('Verify Number')</a></li>
                                @endif
                                <li><a href="{{ route('user.twofactor') }}">@lang('Two Factor')</a></li>
                                <li><a href="{{ route('user.change.password') }}">@lang('Change Password')</a></li>
                                <li><a href="{{ route('user.transactions') }}">@lang('Transactions')</a></li>
                                <li><a href="{{ route('user.logout') }}">@lang('Logout')</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="nav-right justify-content-xl-end">
                        <a href="{{ route('user.logout') }}" class="btn btn-md btn--base d-flex align-items-center">
                            <i class="las la-sign-out-alt fs--18px me-2"></i>
                            @lang('Logout')
                            </i>
                        </a>
                        @include('partials.language')
                    </div>
                </div>
            </nav>
        </div>
    </div><!-- header__bottom end -->
</header>
<!-- header-section end  -->
