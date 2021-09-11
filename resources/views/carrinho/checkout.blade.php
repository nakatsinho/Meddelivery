@extends('layouts.app')
@section('title','Checkout Page')
 
 
@section('content')
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title"><i class="glyphicon glyphicon-shopping-cart"></i> Carrinho de compras </h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->
<section class="hero hero-page gray-bg padding-small">
    <div class="container">
        <div class="row d-flex">
            <div class="col-lg-9 order-2 order-lg-1">
                <br>
                <h2>Processamento...</h2>
                <p class="lead text-muted">De momento voçe possui {{Cart::count()}} item(s) na sua sacola.</p>
            </div>
        </div>
    </div>
</section>
<!-- Checout Forms-->
<div class="table-responsive cart_info col-lg-12 order-2 order-lg-1">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
                @if(session('error'))

                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
                @endif
            </tr>
            <tr class="cart_menu badge-info">
                <td class="image"><b>Imagem</b></td>
                <td class="description"><b>Produto</b></td>
                <td class="price"><b>Preço</b></td>
                <td class="quantity"><b>Quantidade</b></td>
                <td class="total"><b>Total</b></td>
                <td></td>
            </tr>
        </thead>
        <?php $count = 1; ?>
        @foreach($cartItems as $value)
        <tbody>
            <tr>
                <td class="cart_product">
                    <a href="{{url('/detalhes')}}/{{$value->id}}"><img src="{{url('admin/images',$value->image)}}" target="_blank" alt="" width="75px"></a>
                </td>
                <td class="cart_description">
                    <h4><a href="{{url('/detalhes')}}/{{$value->id}} " target="blank" style="color:green">{{$value->name}}</a></h4>
                    <!-- <p>Product ID: {{$value->id}}</p> -->
                    <p>Restam {{$value->options->stock}} apenas</p>
                </td>
                <td class="cart_price">
                    <p>MZN {{$value->price}}</p>
                </td>
                <td class="cart_quantity">
                    <form action="{{url('carrinho/update',$value->rowId)}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="_method" value="PUT">
                        <input type="hidden" name="proId" value="{{$value->id}}" />
                        <div class="cart_quantity_button">
                            <input type="hidden" id="rowId<?php echo $count; ?>" value="{{$value->rowId}}" />
                            <input type="hidden" id="proId<?php echo $count; ?>" value="{{$value->id}}" />
                            <input type="text" size="2" value="{{$value->qty}}" name="qty" id="upCart<?php echo $count; ?>" autocomplete="off" style="text-align:center; max-width:50px; " MIN="1" MAX="30">
                            <input type="submit" class="btn btn-default" value="Actualizar" styel="margin:5px">
                        </div>
                    </form>
                </td>
                <td class="cart_total">
                    <p class="cart_total_price">MZN {{$value->subtotal}}</p>
                </td>
                <td class="cart_delete">
                    <a class="btn btn-danger" href="{{url('/carrinho/remove')}}/{{$value->rowId}}"><i class="glyphicon glyphicon-trash"></i></a>
                </td>
            </tr>
            <?php $count++; ?>
        </tbody>
        @endforeach
    </table>
</div>

<?php  // form start here 
?>
<section class="checkout">
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="tab-content">
                    <div id="address" class="active tab-block">
                        <form action="{{route('admin.validar')}}" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <h1>Endereço de Entrega</h1>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label for="nomecompleto" class="form-label">Nome Pessoal Completo <small>(Sobrenome & Apelido)</small></label>
                                    <input id="nomecompleto" type="text" name="nomecompleto" placeholder="Introduza seu nome..." value="{{ old('nomecompleto') }}" class="form-control">
                                    <span style="color:red">{{ $errors->first('nomecompleto') }}</span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="email" class="form-label">Seu Email <small>(Obrigatório)</small></label>
                                    <input id="email" type="text" name="email" placeholder="Seu Email de contacto" value="{{ old('email') }}" class="form-control">
                                    <span style="color:red">{{ $errors->first('email') }}</span>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="notes" class="form-label">Notas Adicionais <small>(Opcional)</small></label>
                                    <input id="notes" type="text" name="notes" placeholder="Informe qualquer coisa que considere pertinente a este pedido!" value="{{ old('notes') }}" class="form-control">
                                    <span style="color:red">{{ $errors->first('notes') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pincode" class="form-label">Código Postal</label>
                                    <input id="pincode" type="text" name="pincode" placeholder="Padrão (1100)" value="{{ old('pincode') }}" class="form-control">
                                    <span style="color:red">{{ $errors->first('pincode') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telefone" class="form-label">Telefone</label>
                                    <input id="telefone" type="text" name="telefone" placeholder="+258 " value="{{ old('telefone') }}" class="form-control">
                                    <span style="color:red">{{ $errors->first('telefone') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="pais_id" class="form-label">Nome do País</label>
                                    <select name="pais_id" class="form-control">
                                        <option value="{{ old('pais_id') }}" selected="selected">Selecione o País</option>
                                        @foreach($pais as $id=>$value)
                                        <option value="{{$id}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">{{ $errors->first('pais_id') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="provincia_id" class="form-label">Nome da Província</label>
                                    <select name="provincia_id" class="form-control">
                                        <option value="{{ old('provincia_id') }}" selected="selected">Selecione a Província</option>
                                        @foreach($provincia as $id=>$value)
                                        <option value="{{$id}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">{{ $errors->first('provincia_id') }}</span>
                                </div>
                                <hr>
                                <div class="form-group col-md-6">
                                    <label for="bairro_id" class="form-label">Endereço 1</label>
                                    <select name="bairro_id" class="form-control">
                                        <option value="{{ old('bairro_id') }}" selected="selected">Selecione o Bairro</option>
                                        @foreach($bairro as $id=>$value)
                                        <option value="{{$id}}">{{$value}}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red">{{ $errors->first('bairro_id') }}</span>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="detalhes" class="form-label">Endereço Detalhado<small> (Rua, Av. , Q. , ou Casa)</small></label>
                                    <input id="detalhes" type="text" name="detalhes" placeholder="Introduza a sua escolha" value="{{ old('detalhes') }}" class="form-control">
                                    <span style="color:red">{{ $errors->first('detalhes') }}</span>
                                </div>
                                <div class="form-group{{$errors->has('image')?' has-error':''}} col-md-12">
                                    <label for="image">Adicione a receita abaixo!</label>
                                    <input type="file" name="image" class="form-control">
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                </div>
                                <br>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="block-body order-summary">
                    <br>
                    <h2 class="text-uppercase form-label"><b>Resumo</b></h2>
                    <p>Os custos de envio e custos adicionais são calculados com base nos valores por si inseridos</p>
                    <ul class="order-menu list-unstyled">
                        <li class="d-flex justify-content-between" style="font-size:20px"><span>Ordem Subtotal:</span><strong> MZN {{Cart::subtotal()}}</strong></li>
                        <li class="d-flex justify-content-between" style="font-size:20px"><span>Envio e Entrega:</span><strong> MZN {{Cart::tax()}}</strong></li>
                        <!-- <li class="d-flex justify-content-between" style="font-size:20px"><span>Taxa:</span><strong> </strong></li> -->
                        <li class="d-flex justify-content-between" style="font-size:20px"><span>Total:</span><strong class="text-success price-total"> MZN {{Cart::total()}}</strong></li>
                    </ul>
                    <!-- <script type="text/javascript">
                        function dropdownTip(value) {
                            console.log(value);
                            document.getElementById("result").innerHTML = value;
                        }
                    </script> -->

                    <p style="color:blue">Pode solicitar um dos seguintes métodos pagamentos:
                        <br>
                        <select name="id_pagamento" class="form-control" onChange="dropdownTip(this.value)" data-live-search="true" data-live-search-style="begins" title="Selecione o Método de Pagamento" style="margin-right:10px; margin-top:2px;">
                            <option value="{{ old('id_pagamento') }}" selected="selected">Selecione a Forma de Pagamento</option>
                            @foreach($fpay as $id=>$value)
                            <option value="{{$id}}">{{$value}}</option>
                            @endforeach
                        </select>
                        <span style="color:red">{{ $errors->first('id_pagamento') }}</span>

                        <h5 id="result" style="color:green"></h5>
                        <h4 style="color:red">NOTA:</h4> O Pagamento por <u>M-Pesa</u> & <u>Presencial</u> está no momento disponível para clientes de <span style="color:red">Maputo</span> e <span style="color:red">Matola</span>.
                    </p>
                </div>
                <hr>
                <div class="form-group col-md-12 text-center">
                    @include('partials.paypal')
                    <br><br>
                    <button name="submit" class="btn btn-primary"><i class="fa fa-money"></i> Continue Normal</button>
                </div>
            </div>
        </div>
</section>
<?php  // form start here 
?>
<br>

 
@endsection