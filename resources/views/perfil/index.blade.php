@extends('layouts.app')
@section('title','Profile Page')
 
 
@section('content')
<style>
    table td {
        padding: 10px;
    }
</style>
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title"><i class="glyphicon glyphicon-user"></i> Meu Perfil de Compras </h1>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-12 order-2 order-lg-1">
    <section id="cart_items">
        <div class="row">
            <div class="col-md-3 p0 padding-top-40">
                <div class="blog-asside-right pr0">
                    <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title"><b>Menu</b></h3>
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
                <ol class="breadcrumb">
                    <li>
                        <h3>Olá <span style='color:green'>{{ucwords(Auth::user()->name)}}</span></h3>
                    </li>
                    <br>
                    <li>
                        <p><b>NOTA:</b> Esse Campo, em breve, receberá toda a sua biografia!</p>
                    </li>
                    <a href="{{url('/dados')}}" class="btn btn-primary btn-sm pull-right" >
                            <i class="glyphicon glyphicon-pencil"></i> Editar
                        </a>
                    <hr style="border-color:red">
                    <li><strong>
                            <h3 style='color:green'><b>Informação Pessoal:</b></h3>
                        </strong></li><br>
                    <li><b>Nome:</b> <span style='color:red'><u>{{ Auth::user()->name }} {{ Auth::user()->surname }}</u></span></li><br>
                    <li><b>Idade:</b> {{ Auth::user()->nascimento }} </li><br>
                    <li><b>Sexo:</b> {{ implode(',',Auth::user()->sexo()->pluck('nome')->toArray()) }}</li><br>
                    <li><b>Grupo Sanguineo:</b> {{ implode(',',Auth::user()->gsanguineo()->pluck('nome')->toArray()) }}</li><br>
                    <li><b>Altura:</b> {{ Auth::user()->altura }} m</li><br>
                    <li><b>Raça:</b> {{ Auth::user()->raca }}</li><br>
                    <li><b>Medicamentos de Toma Diárias:</b> </li><br>
                    <hr style="border-color:red">
                    <li><strong>
                            <h4 style='color:green'><b>Actividade Ritmica:</b></h4>
                        </strong></li><br>
                    <li><b>Tensão arterial sistólica</b> <small>(Alta):</small> <span style='color:red'>{{ Auth::user()->talta }}</span> bpm</li><br>
                    <li><b>Tensão arterial diastólica</b> <small>(Baixa):</small> <span style='color:blue'>{{ Auth::user()->tbaixa }}</span> bpm</li><br>
                    <li><b>Peso:</b> {{ Auth::user()->peso }} Kg</li><br>
                    <hr style="border-color:red">
                    <li><strong>
                            <h4 style='color:green'><b>Doenças:</b></h4>
                        </strong></li><br>
                        @foreach($doencas as $value)
                    <li><b>Comum</b> <small>(Ex: Malária):</small> <span style='color:green'>{{$value->comum}}</span></li><br>
                    <li><b>Hereditária</b> <small>(Ex: Diabetes):</small> <span style='color:green'>{{$value->hereditaria}}</span></li><br>
                    <li><b>Alergias</b> <small>(Ex: Urticária):</small> <span style='color:green'>{{$value->alergias}}</span></li><br>
                    <li><b>Contraindicações</b> <small>(Ex: O que não pode tomar):</small> <span style='color:green'>{{$value->contras}}</span></li><br>
                    <li><b>Internamentos</b> <small>(Ex: HCM - Queimaduras):</small> <span style='color:green'>{{$value->hospitalizacao}}</span></li><br>
                    <li><b>Vacinações</b> <small>(Ex: Gonoreia):</small> <span style='color:green'>{{$value->vacinas}}</span></li><br>
                    <li><b>Cirurgias</b> <small>(Ex: Apendicectomia):</small> <span style='color:green'>#</span></li><br>
                    @endforeach
                    <hr style="border-color:red">
                    <li><strong>
                            <h4 style='color:green'><b>Ocupação</b> <small>(Ex: Advogado)</small>:</h4>
                        </strong> {{ Auth::user()->profissao }}</li>
                    <hr style="border-color:red">
                </ol>
            </div>
        </div>
    </section>
</div>

<br>

 
@endsection