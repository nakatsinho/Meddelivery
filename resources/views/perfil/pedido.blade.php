@extends('layouts.app')
@section('title','Order Page')
 
@section('content')
    <style>
        table td { padding:10px;}
    </style>
    <div class="page-head"> 
            <div class="container">
                <div class="row">
                    <div class="page-head-content">
                        <h1 class="page-title"><i class="glyphicon glyphicon-user"></i> Seus pedidos,<span style="color: black;"> {{ucwords(Auth::user()->name)}}</span></h1>               
                    </div>
                </div>
            </div>
        </div>
    <div class="">
        <section id="cart_items">
            <div class="row">
                
        <div class="col-md-3 p0 padding-top-40">
                    <div class="blog-asside-right pr0">
                        <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                            <div class="panel-heading">
                                <h3 class="panel-title">Menu</h3>
                            </div>
                            <div class="panel-body search-widget">
                                @include('perfil.menu')
                            </div>
                        </div>
</div>
</div>
<br>
<br>
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Data</th>
                                <th>Nome Produto</th>
                                <th>Codigo Produto</th>
                                <th>Total Pedido</th>
                                <th>Estado Pedido</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($pedido as $value)
                            <tr>
                                <td>{{$value->created_at}}</td>
                                <td>{{ucwords($value->nome_pro)}}</td>
                                <td>{{$value->codigo_pro}}</td>
                                <td>{{$value->total}}</td>
                                <td>{{$value->status}}</td>
                                @empty
                            <h2 style="color:red;">Sem pedidos no momento!</h2>
                            </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection