@extends('layouts.app')
@section('title', 'Detalhes do Produto')
 
 
@section('content')
@foreach($produtos as $value)
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">{{$value->nome_pro}} </h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- property area -->
<div class="content-area single-property" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">

        <div class="clearfix padding-top-40">

            <div class="col-md-8 single-property-content prp-style-2">
                <div class="">
                    <div class="row">
                        <div class="light-slide-item">
                            <div class="clearfix">
                                <div class="favorite-and-print">
                                    <a class="add-to-fav" href="#login-modal" data-toggle="modal">
                                        <i class="fa fa-star-o"></i>
                                    </a>
                                    <a class="printer-icon " href="javascript:window.print()">
                                        <i class="fa fa-print"></i>
                                    </a>
                                </div>

                                <ul id="image-gallery" class="gallery list-unstyled cS-hidden">
                                    <li data-thumb="{{url('admin/images',$value->image)}}">
                                        <img src="{{url('admin/images',$value->image)}}" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="single-property-wrapper">

                        <div class="section">
                            <h4 class="s-property-title">Descrição</h4>
                            <div class="s-property-content">
                                <p>{{$value->info_pro}}</p>
                            </div>
                        </div>
                        <!-- End description area  -->

                        <div class="section additional-details">

                            <h4 class="s-property-title">Detalhes Adicionais</h4>

                            <ul class="additional-details-list clearfix">
                                <?php $pro_details = DB::table('detalhes')->select('*')->where('produto_id', $value->id)->get(); ?>
                                @forelse($pro_details as $detail)
                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Validade</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{$detail->validade}}</span>
                                </li>

                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Quantidade</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{$detail->qty}}</span>
                                </li>
                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Fabricante</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{$detail->fabricante}}</span>
                                </li>

                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Recomendação</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{$detail->recomendacao}}</span>
                                </li>

                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Riscos</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry"> {{$detail->riscos}}</span>
                                </li>

                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Sintomas após ingestão</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry">{{$detail->sintomas}}</span>
                                </li>
                                @empty
                                <li>
                                    <span class="col-xs-6 col-sm-4 col-md-4 add-d-title">Opps!</span>
                                    <span class="col-xs-6 col-sm-8 col-md-8 add-d-entry" style="color:red">Sem Detalhes Adicionais</span>
                                </li>
                                @endforelse
                            </ul>
                        </div>
                        <!-- End additional-details area  -->

                        <!-- <div class="section property-features">

                            <h4 class="s-property-title">Características</h4>
                            <ul>
                                <li><a href="properties.html">Swimming Pool</a></li>
                                <li><a href="properties.html">3 Stories</a></li>
                                <li><a href="properties.html">Central Cooling</a></li>
                                <li><a href="properties.html">Jog Path 2</a></li>
                                <li><a href="properties.html">2 Lawn</a></li>
                                <li><a href="properties.html">Bike Path</a></li>
                            </ul>

                        </div> -->
                        <!-- End features area  -->
                    </div>
                </div>

                <div class="similar-post-section padding-top-40">
                    <h4 class="s-property-title">Produtos Relacionados</h4>
                    <div id="prop-smlr-slide_0">
                        <?php $pro_related = DB::table('produtos')->select('*')->where('category_id', $value->category_id)->orderBy('created_at', 'desc')->limit(12)->get(); ?>
                        @foreach($pro_related as $related)
                        <div class="box-two proerty-item">
                            <div class="item-thumb">
                                <a href="{{url('detalhes', $related->id)}}"><img src="{{url('admin/images',$related->image)}}"></a>
                            </div>
                            <div class="item-entry overflow">
                                <h5><a href="{{url('detalhes', $related->id)}}"> {{$related->nome_pro}} </a></h5>
                                <div class="dot-hr"></div>
                                <span class="pull-left text-muted"><b style="color:006401;">Antes: </b><b>MZN </b>{{$related->spl_price}} </span>
                                <span style="color:006401;" class="proerty-price pull-right"><b>MZN</b> {{$related->preco_pro}}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-4 p0">
                <aside class="sidebar sidebar-property blog-asside-right property-style2">
                    <div class="dealer-widget">
                        <div class="dealer-content">
                            <div class="inner-wrapper">
                                <div class="single-property-header">
                                    <h1 class="property-title">{{$value->nome_pro}}</h1>
                                    <span class="property-price">{{$value->preco_pro}} MZN</span>
                                </div>

                                <div class="property-meta entry-meta clearfix ">
                                    <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                        <span class="property-info icon-area">
                                            <img src="{{asset('assets/img/icon/morning.png')}}">
                                        </span>
                                        <span class="property-info-entry">
                                            <span class="property-info-value">Manhãs</span>
                                        </span>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                        <span class="property-info-icon icon-tag">
                                            <img src="{{asset('assets/img/icon/sun.png')}}">
                                        </span>
                                        <span class="property-info-entry">
                                            <span class="property-info-value">Tardes</span>
                                        </span>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-4 p-b-15">
                                        <span class="property-info-icon icon-bed">
                                            <img src="{{asset('assets/img/icon/moon.png')}}">
                                        </span>
                                        <span class="property-info-entry">
                                            <span class="property-info-value">Noites</span>
                                        </span>
                                    </div>

                                </div>
                                @endforeach

                                <?php $farm_data = DB::table('farmacias')->select('*')->where('id', $value->farmacia_id)->get(); ?>
                                <div class="dealer-section-space">
                                    <span>Dados do Vendedor</span>
                                </div>
                                @forelse($farm_data as $value2)
                                <div class="clear">
                                    <div class="col-xs-4 col-sm-4 dealer-face">
                                        <a href="">
                                            <img src="{{url('admin/images',$value2->image_empresa)}}" class="img-circle">
                                        </a>
                                    </div>
                                    <div class="col-xs-8 col-sm-8 ">
                                        <h3 class="dealer-name">
                                            <a href="">{{$value2->nome}}</a><br>
                                            <span>{{$value2->titular}}</span>
                                        </h3>
                                        <!-- <div class="dealer-social-media">
                                            <a class="twitter" target="_blank" href="">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a class="facebook" target="_blank" href="">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                            <a class="linkedin" target="_blank" href="">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                            <a class="instagram" target="_blank" href="">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </div> -->
                                    </div>
                                </div>

                                <div class="clear">
                                    <ul class="dealer-contacts">
                                        <li><i class="pe-7s-map-marker strong"> </i> {{$value2->location}}</li>
                                        <li><i class="pe-7s-mail strong"> </i> pagamentos@meddelivery.co.mz</li>
                                        <li><i class="pe-7s-call strong"> </i> +258 84 513 2931</li>
                                    </ul>
                                    <p>
                                        <b>Nuit: </b>{{$value2->nuit}}<br>
                                        <b>Licença: </b>
                                        <div class="col-xs-4 col-sm-4 dealer-face">
                                            <a href="">
                                                <img src="{{url('admin/images',$value2->image)}}" class="img-circle">
                                            </a>
                                        </div>
                                        @empty
                                        <h2 style="color:red">Sem Dados</h2>
                                    </p>
                                    @endforelse
                                </div>

                            </div>
                        </div>
                    </div>


                    <div class="panel panel-default sidebar-menu wow fadeInRight animated">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sobre a Venda</h3>
                        </div>
                        <div class="text-center">
                            <br>
                            <?php
                            $desejoData = DB::table('desejos')->rightJoin('produtos', 'desejos.pro_id', '=', 'produtos.id')
                                ->where('desejos.pro_id', '=', $idP)->get();
                            $count = Meddelivery\Models\Desejo::where(['pro_id' => $idP])->count();

                            if ($count == "0") {

                                ?>
                                <form action="{{route('addDesejo')}}" method="post" role="form">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" value="{{$idP}}" name="pro_id">
                                    <button type="submit" class="btn btn-danger"><i class="glyphicon glyphicon-heart"></i> {{__('messages.wish')}}</button>
                                </form>
                                <br>
                                <form action="" method="post" role="form">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" value="{{$idP}}" name="pro_id">
                                </form>
                                <a class="btn btn-warning" href="{{url('carrinho/addItem')}}/<?php echo $idP; ?>"><i class="glyphicon glyphicon-shopping-cart"></i>Add {{__('messages.cart')}}</a>
                            <?php } else { ?>
                                <h4 style="color:green">Esse ja foi adicionado aos <a href="{{url('/Desejo')}}">Desejos</a></h4>
                            <?php } ?>

                        </div>
                        <br>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
@endsection