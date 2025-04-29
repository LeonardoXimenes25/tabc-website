@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center py-5">
    <div class="col-md-4">
        <div class="card shadow border-0">
            <div class="card-body px-4 py-4">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/cop-tabc.png') }}" alt="Logo Gereja" style="max-width: 80px;">
                    <h5 class="mt-2 fw-bold text-primary">The Alliance Bible Church</h5>
                </div>

                <div class="text-center mb-3">
                    <h4 class="fw-bold">{{ __('Register') }}</h4>
                </div>

                <form method="POST" action="{{ route('register.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                               name="name" value="{{ old('name') }}" required autofocus>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">{{ __('Username') }}</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                               name="username" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                               name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                               name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control"
                               name="password_confirmation" required>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                    </div>

                    <div class="mt-3 text-center">
                        <p>{{ __('Already have an account?') }} <a href="{{ route('login') }}">{{ __('Login') }}</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
