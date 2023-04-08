{{-- pass variable as props to check if header needed or not --}}
@props(['header' => $header, 'footer' => $footer])



<!DOCTYPE html>
<html lang="en"  data-theme="cupcake">

@include('partials._head')

<body>
    {{-- if header value is not set --}}
    @if ($header == true)
        @include('partials._header')
    @endif
    <!-- /header -->

        {{ $slot }}


    <!--footer-->
    @if ($footer == true)
        @include('partials._footer')
    @endif
    <!--/footer-->
    <!-- page -->

    <div id="toTop"></div>
    <!-- Back to top button -->

    @include('partials._scripts')

</body>

</html>
