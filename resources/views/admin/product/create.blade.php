@extends('layouts.app')
@section('content')
    @include('admin.header')
    @include('admin.sidebar')
    <div class="content-wrapper">
<section class="content-header">
            <h1>
                Adiciona Novo Produto
                <small>em actividade</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href=""><i class="fa fa-dashboard"></i> Painel</a></li>
                <li><a href="#">Inserir</a></li>
                <li class="active">Produto</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Tabela - Produto</h3>
                        </div>
                        <div class="box-body">
                        

                        <form action="{{route('produtos.store')}}" method="post" role="form" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group{{$errors->has('nome_pro')?' has-error':''}}">
                        <label for="nome_pro">Nome</label>
                        <input type="text" class="form-control" name="nome_pro" id="nome_pro" placeholder="Nome do Produto">
                        <span class="text-danger">{{$errors->first('nome_pro')}}</span>
                    </div>


                    <div class="form-group{{$errors->has('codigo_pro')?' has-error':''}}">
                        <label for="codigo_pro">Codigo</label>
                        <input type="text" class="form-control" name="codigo_pro" id="codigo_pro" placeholder="Codigo do Produto">
                        <span class="text-danger">{{$errors->first('codigo_pro')}}</span>
                    </div>

                    <div class="form-group{{$errors->has('preco_pro')?' has-error':''}}">
                        <label for="preco_pro">Preço</label>
                        <input type="text" class="form-control" name="preco_pro" id="preco_pro" placeholder="Preço">
                        <span class="text-danger">{{$errors->first('preco_pro')}}</span>
                    </div>

                    <div class="form-group{{$errors->has('stock')?' has-error':''}}">
                        <label for="stock">Stock</label>
                        <input type="text" class="form-control" name="stock" id="stock" placeholder="Stock">
                        <span class="text-danger">{{$errors->first('stock')}}</span>
                    </div>

                    <div class="form-group{{$errors->has('info_pro')?' has-error':''}}">
                        <label for="info_pro">Descriçao</label>
                        <textarea name="info_pro" id="info_pro" rows="5" class="form-control"></textarea>
                        <span class="text-danger">{{$errors->first('info_pro')}}</span>
                    </div>

                    <div class="form-group{{$errors->has('category_id')?' has-error':''}}">
                        <label for="category_id">Categoria</label>
                        <select name="category_id" id="category_id" class="form-control">
                            <option value=""> -- Selecione a Categoria -- </option>
                            @foreach($categorias as $id=>$value)
                                <option value="{{$id}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">{{$errors->first('category_id')}}</span>
                    </div>


                    <div class="form-group{{$errors->has('image')?' has-error':''}}">
                        <label for="image">Imagem</label>
                        <input type="file" name="image" class="form-control">
                        <span class="text-danger">{{$errors->first('image')}}</span>
                    </div>

                    <div class="form-group{{$errors->has('spl_price')?' has-error':''}}">
                        <label for="spl_price">Preço de Venda</label>
                        <input type="text" class="form-control" name="spl_price" id="spl_price" placeholder="Preço de Venda">
                        <span class="text-danger">{{$errors->first('spl_price')}}</span>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>


                        
                        </div>
                    </div>
                </div>
            </div>
        </section>  
</div>
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
        @include('admin.footer')
@endsection