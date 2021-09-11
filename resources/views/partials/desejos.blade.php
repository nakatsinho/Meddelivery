@extends('layouts.app')
@section('title','Wishlist Page')
 
 
@section('content')
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title"><i class="glyphicon glyphicon-shopping-cart"></i> Lista de Desejos </h1>
            </div>
        </div>
    </div>
</div>
<div class="container"><br>
    <div class="col-md-12 col-sm-12">
        @if(session('msg'))
        <div class="alert alert-success">
            {{session('msg')}}
        </div>
        @endif
        <div class="row">
            <?php if ($produtos->isEmpty()) { ?>
                <h3 style="text-align: center;  text-decoration: underline; color:red;">Nenhum Produto foi encontrado!</h3>
            <?php } else { ?>
                @foreach($produtos as $value)
                <div class="col-md-3 col-sm-3" style="padding-bottom: 20px;">

                    <div class="text-center">
                        <a href="{{url('/detalhes',$value->id)}}">
                            <img src="{{url('admin/images',$value->image)}}" alt="" width="200">
                        </a>
                        <h2>MZN {{$value->preco_pro}}</h2>
                        <p>
                            <a href="{{url('/detalhes',$value->id)}}">
                                {{$value->nome_pro}}
                            </a>
                        </p>
                        <a href="{{url('carrinho/addItem')}}/<?php echo $value->id; ?>" class="btn btn-default add-to-cart">
                            <i class="fa fa-shopping-cart"></i> Adicionar Carrinho</a>

                        <a href="{{url('/')}}/removerDesejo/{{$value->id}}" style="color:red" class="btn btn-default btn-block">
                            <i class="fa fa-minus-square"></i>Remover dos Desejos
                        </a>
                    </div>
                </div>
                @endforeach
            <?php } ?>
        </div>
    </div>
</div>

@endsection