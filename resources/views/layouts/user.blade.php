<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="SO_mhs">
    <meta name="author" content="Reapz">
    <meta name="keyword" content="aplikasi sales order">

    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('assets/icons/logo-base@2x.png') }}">

    {{-- Includes Styles --}}
    @include('layouts.etc.style')

    <body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show" style="background: #E9ECF5">

    {{-- Header --}}
    @include('layouts.modules.header')

    <div class="app-body" id="dw">
        <div class="sidebar">

            {{-- Sidebar --}}
            @include('layouts.modules.sidebar_user')

            <button class="sidebar-minimizer brand-minimizer" type="button"></button>
        </div>

        {{-- Main Content --}}
        @yield('content')

    </div>

    <footer class="app-footer">
        <div class="ml-auto">
            <span>Powered by</span>
            <a href="https://coreui.io">CoreUI</a>
        </div>
    </footer>

    {{-- Includes Scripts --}}
    @include('layouts.etc.script')
</body>

</html>
