@php
    $agent = new Jenssegers\Agent\Agent();
@endphp

@if ($agent->isMobile())
    @include('frontend.profile.mobile.index')
@else
    @include('frontend.profile.desktop.index')
@endif