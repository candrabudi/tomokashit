@php
    $agent = new Jenssegers\Agent\Agent();
@endphp

@if ($agent->isMobile())
    @include('frontend.deposit.mobile.index')
@else
    @include('frontend.deposit.desktop.index')
@endif