@extends('layouts.main')

@section('content')

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="mb-4 text-center fw-bold">Create an Account</h4>
                    <form id="registerForm" action="{{ route('user.register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your full name" value="{{old('name')}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="{{old('email')}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Create a password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" id="registerBtn">
                                Register
                            </button>

                        </div>
                        <div class="text-center mt-3">
                            <small class="text-muted">Already have an account? <a href="{{route('login')}}" class="text-decoration-none">Login</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
