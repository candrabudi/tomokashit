@php
    $agent = new Jenssegers\Agent\Agent();
@endphp

@if ($agent->isMobile())
    @include('frontend.history_balance.mobile.index')
@else
    @include('frontend.history_balance.desktop.index')
@endif