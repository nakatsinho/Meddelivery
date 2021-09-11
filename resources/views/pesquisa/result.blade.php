@extends ('layouts.app')
 
 
@section ('content')
<h3>Procurando por "<span style="color:red">{{ Request::input('queryPro') }}</span>"</h3>

@if (!$products->count())
<div class="form-group col-sm-12 text-center">
    <p>
        <h1 style="color:red">Nenhum resultado encontrado, desculpe!</h1>
    </p>
    @if(!Auth::guest())
    <div>
        <a href="{{ url('chat')}}" class="btn btn-success">Requisitar Medicamento</a>
    </div>
    @elseif(Auth::guest())
    <div>
        <h3>Faça o login para poder requisitar o medicamento que procura! Obrigado...</h3>
        <a href="{{ url('login')}}" class="btn btn-danger">Fazer Login</a>
    </div>
    @endif
</div>
@else
<div class="row">
    <div class="col-lg-12">
        @foreach ($products as $produto)
        @endforeach
        @include('pesquisa/userblock')
    </div>
</div>
@endif
@endsection