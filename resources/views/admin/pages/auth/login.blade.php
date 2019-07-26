@extends('admin.layouts.master_auth', ['url' => route('admin.login')])
@section('pages')
<div class="form-group">
    <label for="exampleInputEmail">E-mail</label>
    <div class="input-group">
        <div class="input-group-prepend bg-transparent">
            <span class="input-group-text bg-transparent border-right-0">
                <i class="mdi mdi-at text-teal"></i>
            </span>
        </div>
        <input type="text" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="E-mail" name="email">
    </div>
    @error('email')
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleInputPassword">Password</label>
    <div class="input-group">
        <div class="input-group-prepend bg-transparent">
            <span class="input-group-text bg-transparent border-right-0">
                <i class="mdi mdi-lock-outline text-teal"></i>
            </span>
        </div>
        <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" name="password">
    </div>
    @error('password')
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="my-2 d-flex justify-content-between align-items-center">
    <a href="#" class="auth-link text-black">Forgot password?</a>
</div>
<div class="my-3">
    <button class="btn btn-block btn-lg font-weight-medium auth-form-btn" type="submit">LOGIN</button>
</div>
@endsection