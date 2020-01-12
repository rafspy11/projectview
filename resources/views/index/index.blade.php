<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('head.head')

<body>

    @include('header.header')

    <main id="main-content" class="main-content">
        @yield('breadcrumbs')
        @include('title.title')
        @yield('content')
    </main>

    @include('footer.footer')

</body>

</html>