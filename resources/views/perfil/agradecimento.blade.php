@extends('layouts.app')

@section('content')
<style>
    table td {
        padding: 10px
    }
</style>
<br>
<br>

<section id="cart_items">
    <div class="container">
        <div class="text-center">
            <h3>Obrigado pela requisição :
                <span style='color:green'>{{ucwords(Auth::user()->name)}}</span></h3>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="text-center">
                <p>Clique no botão abaixo para gerar a factura dos medicamentos requisitados!
                    <br>
                    <span style='color:red'>NB:</span> Tenha a atenção de baixar/guardar a mesma factura, até a altura do pagamento (compravativo)!
                </p>

                <a href="{{url('factura',$order)}}" class="btn btn-primary">Facturar</a>

            </div>
        </div>
    </div>
</section>
<br>
@endsection