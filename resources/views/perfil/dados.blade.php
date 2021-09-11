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
            <div class="col-lg-3 p0 padding-top-40">
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
            <div class="col-lg-9  profiel-container">
                <form action="{{url('actualizarDados')}}" method="POST" role="form">
                    {{csrf_field()}}
                    @foreach($user as $value)
                    <div class="profiel-header">
                        <h3>
                            <b>CONSTRUA</b> SEU PERFIL <br>
                            <small>Esta informação nos informará mais sobre você.</small>
                        </h3>
                        <hr>
                    </div>

                    <div class="clear">
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="picture-container">
                                <div class="picture">
                                    <img src="{{url('admin/images',$value->image)}}" class="picture-src" id="wizardPicturePreview" title="" />
                                    <input type="file" id="wizard-picture">
                                </div>
                                <h6>Escolha Foto</h6>
                            </div>
                        </div>

                        <div class="col-sm-3 padding-top-25">
                            <div class="form-group{{$errors->has('name')?' has-error': ''}}">
                                <label>Primeiro Nome: <small>(Requerido)</small></label>
                                <input name="name" type="text" value="{{$value->name}}" class="form-control" placeholder="Nome...">
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('surname')?' has-error': ''}}">
                                <label>Sobrenome/Apelido: <small>(Requerido)</small></label>
                                <input name="surname" type="text" value="{{$value->surname}}" class="form-control" placeholder="Sobrenome / Apelido...">
                                <span class="text-danger">{{$errors->first('surname')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('username')?' has-error': ''}}">
                                <label>Alcunha: <small>(Opcional)</small></label>
                                <input name="username" type="text" value="{{$value->username}}" class="form-control" placeholder="Alcunha...">
                                <span class="text-danger">{{$errors->first('username')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('number')?' has-error': ''}}">
                                <label>Nr. Contacto: <small>(Opcional)</small></label>
                                <input name="number" type="text" value="{{$value->number}}" class="form-control" placeholder="Nr de Contacto...">
                                <span class="text-danger">{{$errors->first('number')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('email')?' has-error': ''}}">
                                <label>Email: <small>(Requerido)</small></label>
                                <input name="email" type="email" value="{{$value->email}}" class="form-control" placeholder="Seu Email...">
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('nascimento')?' has-error': ''}}">
                                <label>Idade: <small>(Requerido)</small></label>
                                <input name="nascimento" type="text" value="{{$value->nascimento}}" class="form-control" placeholder="Idade...">
                                <span class="text-danger">{{$errors->first('nascimento')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('talta')?' has-error': ''}}">
                                <label>Tensão Alta: <small>(Requerido)</small></label>
                                <input name="talta" type="text" value="{{$value->talta}}" class="form-control">
                                <span class="text-danger">{{$errors->first('talta')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('tbaixa')?' has-error': ''}}">
                                <label>Tensão Baixa: <small>(Requerido)</small></label>
                                <input type="text" name="tbaixa" value="{{$value->tbaixa}}" class="form-control">
                                <span class="text-danger">{{$errors->first('tbaixa')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('profissao')?' has-error': ''}}">
                                <label>Profissão: <small>(Requerido)</small></label>
                                <input name="profissao" type="text" value="{{$value->profissao}}" class="form-control">
                                <span class="text-danger">{{$errors->first('profissao')}}</span>
                            </div>

                            <div class="form-group{{$errors->has('altura')?' has-error': ''}}">
                                <label>Altura: <small>(Requerido)</small></label>
                                <input name="altura" type="text" value="{{$value->altura}}" class="form-control" placeholder="Altura...">
                                <span class="text-danger">{{$errors->first('altura')}}</span>
                            </div>
                            @foreach($doencas as $value)

                        </div>
                        <div class="col-sm-3 padding-top-25">
                            <div class="form-group{{$errors->has('comum')?' has-error': ''}}">
                                <label>Doença Comum: <small>(Opcional)</small></label>
                                <input name="comum" type="text" value="{{$value->comum}}" class="form-control" placeholder=">Doença Comum...">
                                <span class="text-danger">{{$errors->first('comum')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('hereditaria')?' has-error': ''}}">
                                <label>Doença Hereditária: <small>(Opcional)</small></label>
                                <input name="hereditaria" type="text" value="{{$value->hereditaria}}" class="form-control" placeholder="Doença Hereditária...">
                                <span class="text-danger">{{$errors->first('hereditaria')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('alergias')?' has-error': ''}}">
                                <label>Alergias: <small>(Opcional)</small></label>
                                <input name="alergias" type="text" value="{{$value->alergias}}" class="form-control" placeholder="Alergias...">
                                <span class="text-danger">{{$errors->first('alergias')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('contras')?' has-error': ''}}">
                                <label>Contraindicações: <small>(Opcional)</small></label>
                                <input name="contras" type="text" value="{{$value->contras}}" class="form-control" placeholder="Contraindicações...">
                                <span class="text-danger">{{$errors->first('contras')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('hospitalizacao')?' has-error': ''}}">
                                <label>Hospitalizações: <small>(Opcional)</small></label>
                                <input name="hospitalizacao" type="text" value="{{$value->hospitalizacao}}" class="form-control" placeholder="Hospitalizações...">
                                <span class="text-danger">{{$errors->first('hospitalizacao')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('vacinas')?' has-error': ''}}">
                                <label>Vacinações: <small>(Opcional)</small></label>
                                <input name="vacinas" type="text" value="{{$value->vacinas}}" class="form-control" placeholder="Vacinas...">
                                <span class="text-danger">{{$errors->first('vacinas')}}</span>
                            </div>
                            @endforeach
                            <div class="form-group{{$errors->has('sexo_id')?' has-error': ''}}">
                                <label>Sexo: <small>(Requerido)</small></label>
                                <select name="sexo_id" class="form-control">
                                    <option value="{{ old('sexo_id') }}" selected="selected">Selecione o Sexo</option>
                                    @foreach($sexo as $id=>$value)
                                    <option value="{{$id}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->first('sexo')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('gsanguineo_id')?' has-error': ''}}">
                                <label>Grupo Sanguineo: <small>(Requerido)</small></label>
                                <select name="gsanguineo_id" class="form-control">
                                    <option value="{{ old('gsanguineo_id') }}" selected="selected">Grupo Sanguineo</option>
                                    @foreach($gs as $id=>$value)
                                    <option value="{{$id}}">{{$value}}</option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{$errors->first('gsanguineo_id')}}</span>
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