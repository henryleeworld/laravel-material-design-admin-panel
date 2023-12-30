@extends('layouts.app')
@section('content')
<div class="login-box">
    <div class="login-logo">
        <div class="login-logo">
            <a href="#">
                {{ trans('panel.site_title') }}
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">{{ trans('global.reset_password') }}</p>
            <form method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <div>
                    <input name="token" value="{{ $token }}" type="hidden">
                    <div class="mb-3 has-feedback">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ trans('global.login_email') }}" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                        @if($errors->has('email'))
                            <p class="help-block">
                                {{ $errors->first('email') }}
                            </p>
                        @endif
                    </div>
                    <div class="mb-3 has-feedback">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ trans('global.login_password') }}" required autocomplete="new-password">
                        @if($errors->has('password'))
                            <p class="help-block">
                                {{ $errors->first('password') }}
                            </p>
                        @endif
                    </div>
                    <div class="mb-3 has-feedback">
                        <input id="password-confirm" type="password" name="password_confirmation" class="form-control" placeholder="{{ trans('global.login_password_confirmation') }}" required autocomplete="new-password">
                        @if($errors->has('password_confirmation'))
                            <p class="help-block">
                                {{ $errors->first('password_confirmation') }}
                            </p>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-right">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ trans('global.reset_password') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
