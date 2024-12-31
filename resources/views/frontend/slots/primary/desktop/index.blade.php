@extends('frontend.layouts.app')
@section('desktop_styles')
@endsection

@section('content')
    <div style="background: #2C3A47; width: 100%;">
        @include('frontend.home.desktop.components.leftmenu')
        <main id="default-layout-main"
            class="relative ml-[var(--menu-width)] mr-[var(--right-width)] min-h-[100dvh] flex-1 px-20"
            style="padding: 20px; margin-top: -30px;">
            <div class="h-[var(--header-height)] w-full"></div>
            <div class="pb-20">
                @include('frontend.slots.primary.desktop.components.topgame')
            </div>
        </main>
        @include('frontend.home.desktop.components.rightmenu')
    </div>
@endsection

@section('desktop_scripts')
@endsection
