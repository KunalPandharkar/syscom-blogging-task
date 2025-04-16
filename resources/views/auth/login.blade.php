@extends('layouts.main')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <h4 class="mb-4 text-center fw-bold">Login</h4>
                        <form action="{{route('user.login')}}" method="POST" id="loginForm">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}"
                                    placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Create a password" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary" id="loginBtn">
                                    Login
                                </button>

                            </div>
                            <div class="text-center mt-3">
                                <small class="text-muted">Dont have an account? <a href="{{ route('register') }}"
                                        class="text-decoration-none">Register</a></small>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
