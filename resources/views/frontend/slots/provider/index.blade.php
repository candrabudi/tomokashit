@php
    $agent = new Jenssegers\Agent\Agent();
@endphp

@if ($agent->isMobile())
    @include('frontend.slots.provider.mobile.index')
@else
    @include('frontend.slots.provider.desktop.index')
@endif