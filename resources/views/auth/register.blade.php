@extends('layouts.auth')


@section('content')
<div class="container">
    <div class="col-sm-4 col-sm-offset-4">
        <div class="box-for overflow">
            <div class="col-md-12 col-xs-12 register-blocks">
                <h2 class="text-center">Nova Conta : </h2>
                <form role="form" method="POST" action="{{ route('auth.register') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{$errors->has('name')?' has-error':''}}">
                        <label for="name">Nome </label>
                        <input id="name" type="name" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="email" autofocus>
                        @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('surname')?' has-error':''}}">
                        <label for="surname">Apelido</label>
                        <input id="surname" type="surname" class="form-control" name="surname" value="{{ old('surname') }}" required autocomplete="email" autofocus>
                        @if ($errors->has('surname'))
                        <span class="help-block">
                            <strong>{{ $errors->first('surname') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('username')?' has-error':''}}">
                        <label for="username">Alcunha <small>(username)</small></label>
                        <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" required autocomplete="email" autofocus>
                        @if ($errors->has('username'))
                        <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('number')?' has-error':''}}">
                        <label for="number">Contacto</label>
                        <input id="number" type="number" class="form-control" name="number" value="{{ old('number') }}" autofocus>
                        @if ($errors->has('number'))
                        <span class="help-block">
                            <strong>{{ $errors->first('number') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('email')?' has-error':''}}">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('password')?' has-error':''}}">
                        <label for="password">Senha</label>
                        <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group{{$errors->has('password_confirmation')?' has-error':''}}">
                        <label for="password-conf">Confirmar Senha</label>
                        <input id="password-conf" type="password" class="form-control" name="password_confirmation" autofocus>
                        @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-default">Register</button>
                    </div>
                    <br>
                    <div class="text-center">
                    <a href="{{route('farmacia.index')}}" style="color:red; border: solid 1px; padding: 6px; border-radius: 6px;" role="button" aria-disabled="true">Pretende Vender? Clique aqui...</a>
                </div>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
            </div>
            <div class="left-logo">
                <img src="./assets/img/footer-logo.png" alt="" srcset="">
                <p><span style="color:red">{{__('messages.slogan')}},</span> <span style="color:#006401">{{__('messages.slogan2')}}</span> <span style="color:#ffcc00">{{__('messages.slogan3')}}</span>.</p>
            </div>
        </div>
    </div>
</div>

@endsection