<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Admin Panel</title>

    <!-- Meta -->
    @include('admin.layouts.header')
</head>

<body>
    <!-- Pre-loader start -->
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            @include('admin.layouts.navbar')
            @include('admin.layouts.sidebar')

            @yield('content')

            {{-- @include('admin.layouts.settings-sidebar') --}}
        </div>
    </div>

    @include('admin.layouts.script')
    {{-- @vite('resources/js/app.js') --}}
    <script src="{{ mix('js/app.js') }}" defer></script>

</body>

</html>
