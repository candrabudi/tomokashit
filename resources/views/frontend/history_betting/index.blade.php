@php
    $agent = new Jenssegers\Agent\Agent();
@endphp

@if ($agent->isMobile())
    @include('frontend.history_betting.mobile.index')
@else
    @include('frontend.history_betting.desktop.index')
@endif