@extends('components/home/layout')

@section('container')
<div class="row justify-content-center align-items-center text-center min-vh-100">
    <div class="col-lg-5">
        <i class="bi bi-keyboard-fill mb-3" style="font-size: 60px;"></i>
        <h1 class="mb-4 fw-normal">Registration Form</h1>
        <form action="/register" method="post" class="form-signin has-validation needs-validation">
            @csrf
            <div class="form-floating">
                <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="floatingInput" name="name" placeholder="Your Name" required value="{{ old('name') }}">
                <label for="floatingInput" class="text-muted">Your Name</label>
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="floatingInput" name="username" placeholder="Your Username" required value="{{ old('username') }}">
                <label for="floatingInput" class="text-muted">Your Username</label>
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" name="email" placeholder="Your Email" required value="{{ old('email') }}">
                <label for="floatingInput" class="text-muted">Your Email</label>
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="floatingPassword" name="password" placeholder="Your Password" required>
                <label for="floatingPassword" class="text-muted">Your Password</label>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary bg-gradient" type="submit" name="submit">Register</button>
        </form>
        <hr class="dropdown-divider my-4">
        <small class="d-block">
            <span>Already have an account?</span>
            <a href="/login" class="text-white mb-4">Log In</a>
        </small>
        <p class="mt-4 mb-3 text-muted">&copy; 2021</p>
    </div>
</div>

@endsection
