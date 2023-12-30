@extends('layouts.app')
@section('content')
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
    <div class="container justify-content-center">
        <div class="navbar-wrapper text-center">
            <a href="#" class="navbar-brand">
                {{ trans('panel.site_title') }}
            </a>
        </div>
    </div>
</nav>
<div class="wrapper wrapper-full-page">
    <div class="page-header login-page header-filter">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
                    <div class="card card-login mb-3">
                        <div class="card-header card-header-primary text-center">
                            <h4 class="card-title">
                                <strong>{{ __('Login') }}</strong>
                            </h4>
                        </div>
                        <div class="card-body login-card-body">
                            @if(\Session::has('message'))
                                <p class="alert alert-info">
                                    {{ \Session::get('message') }}
                                </p>
                            @endif

                            <form action="{{ route('login') }}" method="POST">
                                {{ csrf_field() }}

                                <div class="mb-3">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ trans('global.login_email') }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ trans('global.login_password') }}" name="password" required autocomplete="current-password">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>


                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="icheck-primary">
                                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label for="remember">{{ trans('global.remember_me') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer justify-content-center">
                                    <button type="submit" class="btn btn-primary btn-link btn-lg">{{ trans('global.login') }}</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.login-card-body -->
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <a class="" href="{{ route('password.request') }}">
                                <small>{{ trans('global.forgot_password') }}</small>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
