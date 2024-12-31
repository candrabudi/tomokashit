@php
    $agent = new Jenssegers\Agent\Agent();
@endphp

@if ($agent->isMobile())
    @include('frontend.layouts.mobile.custom_app')
@else
    @include('frontend.layouts.desktop.custom_app')
@endif
<script>
    function detectResize() {
        var isMobile = window.innerWidth <= 768;

        if (isMobile && {{ $agent->isDesktop() ? 'true' : 'false' }}) {
            window.location.reload();
        } else if (!isMobile && {{ $agent->isMobile() ? 'true' : 'false' }}) {
            window.location.reload();
        }
    }

    window.onresize = detectResize;
    detectResize();
</script>
