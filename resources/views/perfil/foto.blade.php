@extends('layouts.app')
 
@section('content')
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title"><a href="{{url('home')}}">Home</a> | <span class="orange strong">{{ Auth::user()->name }}</span></h1>
            </div>
        </div>
    </div>
</div>
<div class="content-area user-profiel" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 profiel-container">

                <form action="{{url('perfil_foto')}}" method="POST" role="form">
                    <div class="profiel-header">
                        <h3>
                            <b>CONSTRUA</b> SEU PERFIL <br>
                            <small>Esta informação nos informará mais sobre você.</small>
                        </h3>
                        <hr>
                    </div>
                    @foreach($users as $value)
                    <div class="clear">
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="picture-container">
                                <div class="picture">
                                    <img src="admin/images/{{ Auth::user()->image }}" class="picture-src" id="wizardPicturePreview" title="" />
                                    <input type="file" id="wizard-picture">
                                </div>
                                <h6>Escolha Imagem</h6>
                            </div>
                        </div>

                        <div class="col-sm-3 padding-top-25">

                            <div class="form-group{{$errors->has('name')?' has-error': ''}}">
                                {{csrf_field()}}
                                <label>Primeiro Nome: <small>(Requerido)</small></label>
                                <input name="name" type="text" value="{{$value->name}}" class="form-control" placeholder="Nome...">
                                <span class="text-danger">{{$errors->first('name')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('number')?' has-error': ''}}">
                                <label>number :</label>
                                <input name="number" value="{{$value->number}}" type="text" class="form-control" placeholder="+258">
                                <span class="text-danger">{{$errors->first('number')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('email')?' has-error': ''}}">
                                <label>Email: <small>(Requerido)</small></label>
                                <input name="email" type="email" value="{{$value->email}}" class="form-control" placeholder="Seu Email...">
                                <span class="text-danger">{{$errors->first('email')}}</span>
                            </div>
                        </div>
                        <div class="col-sm-3 padding-top-25">
                            <div class="form-group{{$errors->has('password')?' has-error': ''}}">
                                <label>Senha: <small>(Requerido)</small></label>
                                <input name="password" type="password" class="form-control">
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            </div>
                            <div class="form-group{{$errors->has('password')?' has-error': ''}}">
                                <label>Confirmar Senha: <small>(Requerido)</small></label>
                                <input type="password" class="form-control">
                                <span class="text-danger">{{$errors->first('password')}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="clear">
                        <hr>
                    </div>

                    <div class="col-sm-5 col-sm-offset-1">
                        <br>
                        <input type='submit' class='btn btn-finish btn-primary' name='submit' value='Actualizar' />
                    </div>
                    <br>
                </form>

            </div>
        </div><!-- end row -->

    </div>
    @endsection