<!DOCTYPE html>
<html lang="en">

@include('partials._head')

<body>
    @include('partials._header')
    <!-- /header -->

        {{ $slot }}


    @include('partials._footer')
    <!--/footer-->
    <!-- page -->

    <div id="toTop"></div>
    <!-- Back to top button -->

    @include('partials._scripts')

</body>

</html>
