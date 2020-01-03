@extends('admin.layouts.master_auth', ['url' => route('admin.password.update'), 'title' => 'Reset Password', 'subtitle' => ''])
@section('pages')
<input type="hidden" name="token" value="{{ $token }}">
<input type="hidden" class="form-control form-control-lg border-left-0" id="email" value="{{ $email ?? old('email') }}" placeholder="E-mail" name="email" readonly>
<div class="form-group">
    <label for="exampleInputPassword">New Password</label>
    <div class="input-group">
        <div class="input-group-prepend bg-transparent">
            <span class="input-group-text bg-transparent border-right-0">
                <i class="mdi mdi-lock-outline text-teal"></i>
            </span>
        </div>
        <input type="password" class="form-control form-control-lg border-left-0" id="password" placeholder="Password" name="password">
    </div>
    @error('password')
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="exampleInputPassword">Password Confirmation</label>
    <div class="input-group">
        <div class="input-group-prepend bg-transparent">
            <span class="input-group-text bg-transparent border-right-0">
                <i class="mdi mdi-lock-outline text-teal"></i>
            </span>
        </div>
        <input type="password" class="form-control form-control-lg border-left-0" id="password-confirmation" placeholder="Password" name="password_confirmation">
    </div>
    @error('password_confirmation')
        <span class="text-danger">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="my-3">
    <button class="btn btn-block btn-lg font-weight-medium auth-form-btn" type="submit">RESET PASSWORD</button>
</div>
@endsection