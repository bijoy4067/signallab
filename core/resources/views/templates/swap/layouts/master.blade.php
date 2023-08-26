@extends($activeTemplate.'layouts.app')
@section('panel')

@include($activeTemplate.'partials.auth_header')

<div class="main-wrapper">

    @include($activeTemplate.'partials.bread_crumb')

    @yield('content') 

</div><!-- main-wrapper end -->

@include($activeTemplate.'partials.footer')

@endsection
