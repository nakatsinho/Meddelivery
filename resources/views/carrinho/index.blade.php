@extends('layouts.app')
@section('title','Carrinho de Compras')
 
 
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
<script>
    $(document).ready(function() {
        <?php for ($i = 1; $i < 20; $i++) { ?>
            $('#upCart<?php echo $i; ?>').on('change keyup', function() {
                var newqty = $('#upCart<?php echo $i; ?>').val();
                var rowId = $('#rowId<?php echo $i; ?>').val();
                var proId = $('#proId<?php echo $i; ?>').val();
                if (newqty <= 0) {
                    alert('enter only valid qty')
                } else {
                    $.ajax({
                        type: 'get',
                        dataType: 'html',
                        url: '<?php echo url('/cart/update'); ?>/' + proId,
                        data: "qty=" + newqty + "& rowId=" + rowId + "& proId=" + proId,
                        success: function(response) {
                            console.log(response);
                            $('#updateDiv').html(response);
                        }
                    });
                }
            });
        <?php } ?>
    });
</script>
<?php if ($carrinhoItems->isEmpty()) { ?>
    <br>
    <br>
    <br>
    <section id="cart_items">
        <div class="container">
            <h2 class="text-center">Carrinho Vazio! Tens de adicionar qualquer produto...</h2>
            <!-- <div align="center">  <img src="{{asset('dist/img/empty-cart.png')}}"/></div> -->
        </div>
    </section>
    <br>
    <div>
        <img src="{{ asset('assets/img/footer-logo.png') }}" alt="Sem Produtos!" style="position:relative; left:43%">
    </div>
    <br>
    <br>
    <!--/#cart_items-->
<?php } else { ?>
    <br>
    <br>
    <section id="cart_items">
        <div class="container">
            <div id="updateDiv">

                <div class="table-responsive cart_info">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <td class="image">Imagem</td>
                                <td class="description">Produto</td>
                                <td class="quantity">Quantidade</td>
                                <td class="price">Preço</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
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
                        </thead>

                        <?php $count = 1; ?>
                        @foreach($carrinhoItems as $value)
                        <tbody>
                            <tr>
                                <td class="cart_product">
                                    <p><img src="{{url('admin/images/property-13.jpg')}}{{$value->image}}" class="img-responsive" width="100"></p>
                                </td>
                                <td class="cart_description">
                                    <!--<a href="{{url('/detalheProduto')}}/{{$value->id}}">heang</a>
                                            <br>-->
                                    <!--</div>-->
                                    <h4><a href="{{url('detalhes')}}/{{$value->id}}" style="color:green">{{$value->name}}</a></h4>
                                    <!-- <p>Product ID: {{$value->id}}</p> -->
                                    <p>Restam {{$value->stock}} apenas</p>
                                </td>
                                <td class="cart_quantity">
                                    <form action="{{url('carrinho/update',$value->rowId)}}" method="post" role="form">

                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="proId" value="{{$value->id}}" />
                                        <input type="text" size="2" value="{{$value->qty}}" name="qty" id="upCart<?php echo $count; ?>" autocomplete="off" style="text-align:center; max-width:50px; " MIN="1" MAX="1000">
                                        <input type="submit" class="btn btn-default" value="Actualizar" styel="margin:5px">
                                    </form>

                                    <!--</div>-->
                                </td>
                                <td class="cart_price">
                                    <p>MZN {{$value->price}}</p>
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
            </div>
        </div>
    </section>
    <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <!-- <h3>O que você gostaria de fazer depois?</h3> -->
                <!-- <p>Escolha se você tem um código de desconto ou pontos de recompensa que deseja usar ou gostaria de estimar seu custo de entrega.</p> -->
            </div>

            <div class="row">
                <script type="text/javascript">
                    function dropdownTip(value) {
                        console.log(value);
                        document.getElementById("result").innerHTML = value;
                    }
                </script>

                <p style="color:blue">
                    <h4 style="color:red">NOTA:</h4> O Pagamento por <u>M-Pesa</u> & <u>Presencial</u> está no momento disponível para clientes de <span style="color:red">Maputo</span> e <span style="color:red">Matola</span>.
                </p>
                <div class="col-sm-10">
                    <div class="total_area">
                        <ul>
                            <li>Carrinho Sub-Total: <b><span>MZN {{Cart::subtotal()}}</span></b></li>
                            <!-- <li>Taxa <b> <span></span></b></li> -->
                            <li>Custo de Envio <b><span>MZN {{Cart::tax()}}</span></b></li>
                            <li>Total <b><span>MZN {{Cart::total()}}</span></b></li>
                        </ul>
                        <a class="btn btn-warning check_out" href="{{url('/')}}/checkout">Verificar Saída</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <br>
    <!--/#do_action-->
<?php } ?>
 
@endsection