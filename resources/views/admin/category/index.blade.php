@extends('layouts.app')
@section('content')
    @include('admin.header')
    @include('admin.sidebar')
    <div class="content-wrapper">
<section class="content-header">
            <h1>
                Lista de Categorias
                <small>em actividade</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Painel</a></li>
                <li><a href="#">Menu</a></li>
                <li class="active">Categorias</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                        <form action="{{route('categorias.store')}}" method="post" role="form" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group{{$errors->has('nome')?' has-error':''}}">
                        <label for="nome">Adiciona Categoria</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome da Categoria">
                        <span class="text-danger">{{$errors->first('nome')}}</span>
                    </div>
                    <button type="submit" class="btn btn-primary">Gravar Categoria</button>
                    </form>
                        </div>
                        <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                        <tr>
                                            <th>NID</th>
                                            <th>Categoria</th>
                                            <th class="text-center">
                                                
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @if(!empty($categorias))
                                        @forelse ($categorias as $key => $value)
                                            <tr>
                                                <td>{{$value->id}}</td>
                                                <td>{{$value->nome}}</td>
                                            
                                                <td class="text-center">
                                                <form action="{{route('categorias.destroy', $value->id)}}" method="post">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                                    <a href="" class="btn btn-primary btn-sm" data-target="#modal-default2" data-toggle="modal" data_id="" data-name="" data-user="" data-description="" data-dep="" data-contact="">
                                                        <i class="glyphicon glyphicon-pencil"></i>
                                                    </a>
                                                    <a href="{{ url('admin/categorias/{categoria}') }}" class="btn btn-danger btn-sm" data_id="" data-name="" data-user="" data-description="" data-dep="" data-contact="">
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                    </a>
                                                </form>
                                                </td>
                                            </tr>
                                            @empty
                                                <h2>Nao existem categorias</h2>
                                            @endforelse
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>NID</th>
                                            <th>Utilizador</th>
                                        </tr>
                                    </tfoot>
                                </table>

                                <!-- MODALS FOR CRUD -->

<div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Adicionando Professores</h4>
                            </div>
            <div class="modal-body">
               <form class="form-horizontal" role="form" method="POST" action="#">
               {{ csrf_field() }}
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">NID</label>

                    <div class="col-sm-8">
                      <input type="name" class="form-control" id="inputName" name="name" value="{{ old('name') }}" placeholder="NID">
                      @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
                    <label for="user" class="col-sm-2 control-label">Utilizador</label>

                    <div class="col-sm-8">
                      <input type="user" class="form-control" id="inputEmail" name="user" value="{{ old('user') }}" placeholder="Email">
                      @if ($errors->has('user'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-sm-2 control-label">Docente</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputName" placeholder="Cadeira de docencia" name="description" value="{{ old('description') }}">
                      @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('dep') ? ' has-error' : '' }}">
                    <label for="dep" class="col-sm-2 control-label">Lecciona</label>

                    <div class="col-sm-8">
                      <input class="form-control" id="inputExperience" placeholder="Lugar onde lecciona" name="dep" value="{{ old('dep') }}">
                      @if ($errors->has('dep'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dep') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                    <label for="contact" class="col-sm-2 control-label">Contacto</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Insira o Contacto telefonico" name="contact" value="{{ old('contact') }}">
                      @if ($errors->has('contact'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group">
                  <div class="modal-footer">
                            <div class=" col-sm-12">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary" id="add">Gravar</button>
                            </div>
                            </div>
                  </div>
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
                            </div>
                            
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->

                <!-- EDIT -->
                <div class="modal fade" id="modal-default2">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Actualizando Professor</h4>
                            </div>
            <div class="modal-body">
               <form class="form-horizontal" role="form" method="POST" action="#">
               {{ csrf_field() }}
               <input type="hidden" name="userId" value="">
                  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-sm-2 control-label">NID</label>

                    <div class="col-sm-8">
                      <input type="name" class="form-control" id="inputName" name="name" value="" placeholder="NID">
                      @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('user') ? ' has-error' : '' }}">
                    <label for="user" class="col-sm-2 control-label">Utilizador</label>

                    <div class="col-sm-8">
                      <input type="user" class="form-control" id="inputEmail" name="user" value="" placeholder="Email">
                      @if ($errors->has('user'))
                        <span class="help-block">
                            <strong>{{ $errors->first('user') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                    <label for="description" class="col-sm-2 control-label">Docente</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputName" placeholder="Cadeira de docencia" name="description" value="">
                      @if ($errors->has('description'))
                        <span class="help-block">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('dep') ? ' has-error' : '' }}">
                    <label for="dep" class="col-sm-2 control-label">Lecciona</label>

                    <div class="col-sm-8">
                      <input class="form-control" id="inputExperience" placeholder="Lugar onde lecciona" name="dep" value="">
                      @if ($errors->has('dep'))
                        <span class="help-block">
                            <strong>{{ $errors->first('dep') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group{{ $errors->has('contact') ? ' has-error' : '' }}">
                    <label for="contact" class="col-sm-2 control-label">Contacto</label>

                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="inputSkills" placeholder="Insira o Contacto telefonico" name="contact" value="">
                      @if ($errors->has('contact'))
                        <span class="help-block">
                            <strong>{{ $errors->first('contact') }}</strong>
                        </span>
                    @endif
                    </div>
                  </div>
                  <div class="form-group">
                  <div class="modal-footer">
                            <div class=" col-sm-12">
                                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-primary" id="add">Gravar</button>
                            </div>
                            </div>
                  </div>
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>
                            </div>
                            
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- END EDIT -->
                        
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
        @include('admin.footer')
@endsection