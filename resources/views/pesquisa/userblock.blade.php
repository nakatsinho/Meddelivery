<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Resultado para "{{ Request::input('queryPro') }}"</h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- property area -->
<div class="properties-area recent-property" style="background-color: #FFF;">
    <div class="container">
        <div class="row">


            <div class="col-md-12  pr0 padding-top-40 properties-page">
                <div class="col-md-12 clear">
                    <div class="col-xs-10 page-subheader sorting pl0">
                        <ul class="sort-by-list">
                            <li class="active">
                                <a href="javascript:void(0);" class="order_by_date" data-orderby="property_date" data-order="ASC">
                                    Data Produto <i class="fa fa-sort-amount-asc"></i>
                                </a>
                            </li>
                            <li class="">
                                <a href="javascript:void(0);" class="order_by_price" data-orderby="property_price" data-order="DESC">
                                    Preço Produto <i class="fa fa-sort-numeric-desc"></i>
                                </a>
                            </li>
                        </ul>
                        <!--/ .sort-by-list-->

                        <div class="items-per-page">
                            <label for="items_per_page"><b>Property per page :</b></label>
                            <div class="sel">
                                <select id="items_per_page" name="per_page">
                                    <option pro$produto="3">3</option>
                                    <option pro$produto="6">6</option>
                                    <option pro$produto="9">9</option>
                                    <option selected="selected" pro$produto="12">12</option>
                                    <option pro$produto="15">15</option>
                                    <option pro$produto="30">30</option>
                                    <option pro$produto="45">45</option>
                                    <option pro$produto="60">60</option>
                                </select>
                            </div>
                            <!--/ .sel-->
                        </div>
                        <!--/ .items-per-page-->
                    </div>

                    <div class="col-xs-2 layout-switcher">
                        <a class="layout-list" href="javascript:void(0);"> <i class="fa fa-th-list"></i> </a>
                        <a class="layout-grid active" href="javascript:void(0);"> <i class="fa fa-th"></i> </a>
                    </div>
                    <!--/ .layout-switcher-->
                </div>

                <div class="col-md-12 clear">
                    <div id="list-type" class="proerty-th">
                        @forelse($products as $produto)
                        <div class="col-sm-6 col-md-4 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="{{url('detalhes', $produto->id)}}"><img src="{{url('admin/images',$produto->image)}}"></a>
                                </div>

                                <div class="item-entry overflow">
                                    <h5><a href="{{url('detalhes')}}"> {{$produto->nome_pro}} </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Antes: </b><b>MZN </b>{{$produto->spl_price}}</span>
                                    <span class="proerty-price pull-right"> <b>MZN</b> {{$produto->preco_pro}}</span>
                                    <p style="display: none;">{{$produto->info_pro}}</p>
                                    <div class="property-icon">
                                        <img src="{{asset('assets/img/icon/morning.png')}}">(1) |
                                        <img src="{{asset('assets/img/icon/sun.png')}}">(1) |
                                        <img src="{{asset('assets/img/icon/moon.png')}}">(1)
                                        <a href="{{url('carrinho/addItem',$produto->id)}}" class="glyphicon glyphicon-shopping-cart pull-right"> Adicionar</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @foreach($marcas as $value)
                        <div class="col-sm-6 col-md-4 p0">
                            <div class="box-two proerty-item">
                                <div class="item-entry overflow">
                                    <?php $detailBrand = DB::table('produtos')->select('*')->where('marca_id', $value->id)->get(); ?>
                                    @foreach($detailBrand as $value2)
                                    <h5><a href="{{url('produto', $value2->id)}}"> {{$value->nome}} </a></h5>
                                    @endforeach
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"></span>
                                    <span class="proerty-price pull-right"> <b></b> {{$value->nome}}</span>
                                    <p style="display: none;"></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @empty
                        <h2>Marca / Produto inexistente no momento!</h2>
                        @endforelse
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="pull-right">
                        <div class="pagination">
                            <ul>
                                <li><a href="#">Prev</a></li>
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>