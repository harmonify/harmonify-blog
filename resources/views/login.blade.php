@extends('components/home/layout')

@section('container')

@if (session()->has('alert'))
<x-alert class="col-lg-5 mx-auto" />
@endif

<div class="row justify-content-center align-items-center text-center min-vh-100">
    <div class="col-lg-5">
        <i class="bi bi-keyboard-fill mb-3" style="font-size: 60px;"></i>
        <h1 class="mb-4 fw-normal">Please Log In</h1>
        <form action="/login" method="post" class="form-signin">
            @csrf
            <div class="form-floating">
                <input type="text" class="form-control rounded-top" id="usernameInput" name="username" placeholder="Username" value="{{ old('username') }}" required autofocus autocomplete="off">
                <label for="usernameInput" class="text-muted">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-bottom" id="passwordInput" name="password" placeholder="Password" required>
                <label for="passwordInput" class="text-muted">Password</label>
            </div>
            <div class="form-check mb-3 d-flex justify-content-start">
                <input class="form-check-input" type="checkbox" id="rememberMeCheckbox" name="remember_me">
                <label class="form-check-label ms-2" for="rememberMeCheckbox">
                  Remember Me
                </label>
              </div>
            <button class="w-100 btn btn-lg btn-primary bg-gradient" type="submit" name="submit">Login</button>
        </form>
        <hr class="dropdown-divider my-4">
        <small class="d-block">
            <span>Not registered?</span>
            <a href="/register" class="text-white mb-4">Create New Account</a>
        </small>
        <p class="mt-4 mb-3 text-muted">&copy; 2021</p>
    </div>
</div>
@endsection
