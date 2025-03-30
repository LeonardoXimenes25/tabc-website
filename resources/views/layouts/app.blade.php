<!DOCTYPE html>
<html lang="en">
    @include('layouts.head')

<body>
    @include('partials.navbar')

   <main class="py-4">
    @yield('content')
   </main>

    {{-- bootstrap --}}
    <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>