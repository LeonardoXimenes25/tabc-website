@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="row w-100">
        <div class="col-md-4 mx-auto">
            <!-- Card Login dengan desain lebih minimalis -->
            <div class="card border-0 shadow-sm">
                <!-- Header dengan background putih -->
                <div class="card-header text-center py-3" style="background-color: white;">
                    <h5 class="mb-0" style="color: #007bff;">Login</h5>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="">
                        @csrf
                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Your email address">
                        </div>

                        <!-- Password Input -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
                        </div>

                        <!-- Remember Me Checkbox -->
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        <!-- Submit Button -->
                        <button name="submit" type="submit" class="btn btn-primary w-100 py-2">Login</button>
                    </form>

                    <!-- Forgot Password Link -->
                    <div class="mt-3 text-center">
                        <a href="#" class="text-decoration-none" style="color: #007bff;">Forgot Password?</a>
                    </div>

                    <!-- Register Link -->
                    <div class="mt-3 text-center">
                        <p class="mb-0">Don't have an account? <a href="#" class="text-decoration-none" style="color: #007bff;">Register here</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
