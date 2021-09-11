@extends('layouts.auth')

@if (Auth::guest())
@elseif (!Auth::guest())

@endif
@section('content')
<br><br>
<div class="container">
    <div class="col-sm-5 col-sm-offset-4">
        <div class="box-for overflow">
            <div class="col-md-12 col-xs-12 login-blocks">
                <h2><b>{{__('messages.login')}}</b> ou <a href="{{ url('register') }}">REGISTAR-SE</a> </h2> (clique aqui)
                <form method="POST" action="{{ route('auth.login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{__('messages.remember')}}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-default">
                                {{__('messages.login')}}
                            </button>

                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{__('messages.forget')}}
                            </a>
                            @endif
                        </div>
                    </div>
                </form>

                <h2>Social login : </h2>

                <p>
                    <a class="login-social facebook" href="{{ url('login/facebook') }}"><i class="fa fa-facebook"></i>&nbsp;Facebook</a>
                    <a class="login-social" href="{{ url('login/google') }}"><i class="fa fa-google"></i>&nbsp;Google</a>
                    <!-- <a class="login-social" href="{{ url('login/github') }}"><i class="fa fa-github"></i>&nbsp;GitHub</a> -->
                </p>
            </div>
            <div class="left-logo">
                <img src="./assets/img/footer-logo.png" alt="" srcset="">
                <p><span style="color:red">{{__('messages.slogan')}},</span> <span style="color:#006401">{{__('messages.slogan2')}}</span> <span style="color:#ffcc00">{{__('messages.slogan3')}}</span>.</p>
            </div>
        </div>
    </div>
</div>
@endsection