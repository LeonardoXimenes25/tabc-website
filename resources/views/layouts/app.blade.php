<!DOCTYPE html>
<html lang="en">
@include('partials/head')
<body class="full-height">
    @include('partials/navbar')

    <main class="mt-5 pt-4">
        @yield('content')
    </main>

    @include('partials/footer')

    

    {{-- icons --}}
    <script>
        feather.replace();
    </script>
    
    {{-- js bootstrap --}}
    <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    {{-- livewire --}}
    @livewireScripts

    @yield('scripts')

</body>
</html>