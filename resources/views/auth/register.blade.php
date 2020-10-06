@extends('layouts.login_master')

@section('content')
<section class="body-sign">
    <div class="center-sign">
        <a href="/" class="logo pull-left">
            <img src="{{ asset('contents/images/logo.png') }}" height="54" alt="Porto Admin" />
        </a>

        <div class="panel panel-sign">
            <div class="panel-title-sign mt-xl text-right">
                <h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i>Register</h2>
            </div>
            <div class="panel-body">
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group mb-lg">
                        <label for="name">Name</label>
                        <div class="input-group input-group-icon">
                            <input type="text" id="name" class="form-control input-lg {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Name" name="name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="cil-user"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group mb-lg">
                        <label for="username">Username</label>
                        <div class="input-group input-group-icon">
                            <input type="text" id="username" class="form-control input-lg {{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Username" name="username" value="{{ old('username') }}" required autofocus>

                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="cil-at"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group mb-lg">
                        <label for="email">Email</label>
                        <div class="input-group input-group-icon">

                            <input id="email" type="email" class="form-control input-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="cil-envelope-closed"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group mb-lg">
                        <div class="clearfix">
                            <label class="pull-left" for="password">Password</label>
                        </div>
                        <div class="input-group input-group-icon">

                            <input id="password" type="password" class="form-control input-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="cil-https"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-lg">
                        <div class="clearfix">
                            <label class="pull-left" for="password-confirm">Confirm Password</label>
                        </div>
                        <div class="input-group input-group-icon">

                            <input id="password-confirm" type="password" class="form-control input-lg" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">

                            <span class="input-group-addon">
                                <span class="icon icon-lg">
                                    <i class="cil-sync"></i>
                                </span>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-9 text-left">
                            <p class="text-muted">Already have an account? <a href="{{ url('/') }}">Login now!</a></p>
                        </div>
                        <div class="col-sm-3 text-right">
                            <button type="submit" class="btn btn-success hidden-xs">{{ __('Register') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
