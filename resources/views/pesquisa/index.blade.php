@extends ('layouts.app')
 
@section ('content')
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h3><b>Meu Perfil</b></h3>
            @include('pesquisa.userblock')
            <hr>

        </div>
        <div class="col-lg-5 col-lg-offset-3">
            <!-- <h3><b>Lista de pedidos e contacto de utentes :</b></h3>
            @if (Auth::user()->hasFriendRequestsPending($user))
            <p>A espera de {{ $user->getNameOrUsername() }} aceitar seu pedido!</p>
            @elseif(Auth::user()->hasFriendRequestsReceived($user))
            <a href="{{ route('paciente.accept', ['username' => $user->username]) }}" class="btn btn-success">Aceitar Pedido</a>
            @elseif(Auth::user()->isFriendsWith($user))
            <p>Voçe e {{ $user->getNameOrUsername() }} sao amigos agora!</p>
            @else
            <a href="{{ route('paciente.add', ['username' => $user->username]) }}" class="btn btn-success">Adicionar Colega</a>
            @endif

            <h4><u>Colegas de {{ $user->getFirstNameOrUsername() }}</u></h4>

            @if (!$user->friends()->count())
            <p>{{ $user->getFirstNameOrUsername() }} nao tem colegas como amigos.</p>
            @else
            @foreach ($user->friends() as $user)
            @include('pesquisa.userblock')
            @endforeach
            @endif -->


        </div>
    </div>
</div>
@endsection