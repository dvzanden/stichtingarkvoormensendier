<!doctype html>
<html @php(language_attributes())>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

</head>

<body @php(body_class())>
    @php(wp_body_open())
    <div id="app" x-data='isMobile()' x-init="checkIsMobile" @resize.window="checkIsMobile()">
        <a class="sr-only focus:not-sr-only" href="#main">
            {{ __('Skip to content') }}
        </a>

        @include('sections.header')

        <main id="main" class="main">
            @yield('content')
        </main>

        @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())



    <script>
        function isMobile() {
            return {
                isMobile: false,
                checkIsMobile() {
                    this.isMobile = window.innerWidth <= 1024;
                    console.log(this.isMobile)
                }
            }
        }
    </script>
</body>

</html>
