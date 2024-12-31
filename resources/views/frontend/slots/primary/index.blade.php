@php
    $agent = new Jenssegers\Agent\Agent();
@endphp

@if ($agent->isMobile())
    @include('frontend.slots.primary.mobile.index')
@else
    @include('frontend.slots.primary.desktop.index')
@endif