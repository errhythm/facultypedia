<!DOCTYPE html>
<html lang="en">

@include('partials._head')

<body>
    <div id="preloader" class="Fixed">
        <div data-loader="circle-side"></div>
    </div>
    <!-- /Preload-->

    <div id="page">
        @include('partials._header')
        <!-- /header -->

        <main>
            {{ $slot }}
        </main>


        @include('partials._footer')
        <!--/footer-->
    </div>
    <!-- page -->

    <div id="toTop"></div>
    <!-- Back to top button -->

    @include('partials._scripts')

</body>

</html>
