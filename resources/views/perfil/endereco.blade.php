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
            <div class="col-sm-8 col-sm-offset-1 profiel-container">
                <form action="{{url('actualizarEndereco')}}" method="POST" role="form">
                    @foreach($address as $value)
                    <div class="profiel-header">
                        <h3>
                            <b>CONSTRUA</b> SEU PERFIL <br>
                            <small>Esta informação nos informará mais sobre você.</small>
                        </h3>
                        <hr>
                    </div>

                    <div class="clear">
                        <div class="col-sm-5 col-sm-offset-1">
                            <div class="form-group{{$errors->has('nomecompleto')?' has-error': ''}}">
                            {{csrf_field()}}
                                <label>Nome Completo :</label>
                                <input name="nomecompleto" value="{{$value->nomecompleto}}" type="text" class="form-control" placeholder="Introduza o Nome">
                                <span class="text-danger">{{$errors->first('nomecompleto')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('telefone')?' has-error': ''}}">
                                <label>Telefone :</label>
                                <input name="telefone" value="{{$value->telefone}}" type="text" class="form-control" placeholder="+258">
                                <span class="text-danger">{{$errors->first('telefone')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('detalhes')?' has-error': ''}}">
                                <label>Endereço Detalhado<small> (Rua, Av. , Q. , ou Casa)</small> :</label>
                                <input name="detalhes" type="text" value="{{$value->detalhes}}" class="form-control" placeholder="Introduza Residência">
                                <span class="text-danger">{{$errors->first('detalhes')}}</span>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="form-group{{$errors->has('pais_id')?' has-error': ''}}">
                                <label>Pais :</label>
                                <select name="pais_id" class="form-control">
                                    <option value="{{ old('pais_id') }}" selected="selected">Selecione o País</option>
                                    @foreach($pais as $id=>$value)
                                    <option value="{{$id}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->first('pais_id')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('provincia_id')?' has-error': ''}}">
                                <label>Provincia :</label>
                                <select name="provincia_id" class="form-control">
                                    <option value="{{ old('provincia_id') }}" selected="selected">Selecione a Província</option>
                                    @foreach($provincia as $id=>$value)
                                    <option value="{{$id}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->first('provincia_id')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('bairro_id')?' has-error': ''}}">
                                <label>Endereço 1 :</label>
                                <select name="bairro_id" class="form-control">
                                    <option value="{{ old('bairro_id') }}" selected="selected">Selecione o Bairro</option>
                                    @foreach($bairro as $id=>$value)
                                    <option value="{{$id}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->first('bairro_id')}}</span>
                            </div>
                        </div>

                    </div>
                    @endforeach
                    <div class="col-sm-5 col-sm-offset-1">
                        <br>
                        <input type='submit' class='btn btn-finish btn-primary' value='Actualizar' />
                    </div>
                    <br>
                </form>
            </div>
    </section>
    <br>
     
    @endsection