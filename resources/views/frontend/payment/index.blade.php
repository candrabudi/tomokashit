@php
    $agent = new Jenssegers\Agent\Agent();
@endphp

@if ($agent->isMobile())
    @include('frontend.payment.mobile.index')
@else
    @include('frontend.payment.desktop.index')
@endif