@php
    $agent = new Jenssegers\Agent\Agent();
@endphp

@if ($agent->isMobile())
    @include('frontend.home.mobile.index')
@else
    @include('frontend.home.desktop.index')
@endif