@php
    $agent = new Jenssegers\Agent\Agent();
@endphp

@if ($agent->isMobile())
    @include('frontend.withdraw.mobile.index')
@else
    @include('frontend.withdraw.desktop.index')
@endif