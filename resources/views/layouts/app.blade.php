<!DOCTYPE html>
<html lang="en">
@include('partials/head')
<body>
    @include('partials/navbar')

    <main class="container py-4">
        @yield('content')
    </main>

    @include('partials/footer')
    
    {{-- js bootstrap --}}
    <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>