<!DOCTYPE html>
<html lang="en">
@include('partials/head')
<body>
    @include('partials/navbar')

    <main class="mt-5 pt-3">
        @yield('content')
    </main>

    @include('partials/footer')
    
    {{-- js bootstrap --}}
    <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>