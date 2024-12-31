@php
    $agent = new Jenssegers\Agent\Agent();
@endphp

@if ($agent->isMobile())
    @include('frontend.slots.games.mobile.index')
@else
    @include('frontend.slots.games.desktop.index')
@endif