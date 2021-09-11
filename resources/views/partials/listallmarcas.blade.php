@extends('layouts.app')
@section('title', 'Lista de Marcas')
 
 
@section('content')
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">{{__('messages.listof')}} Marcas</h1>
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
                                    Data Marca <i class="fa fa-sort-amount-asc"></i>
                                </a>
                            </li>
                        </ul>
                        <!--/ .sort-by-list-->

                        <div class="items-per-page">
                            <label for="items_per_page"><b>Brand per page :</b></label>
                            <div class="sel">
                                <select id="items_per_page" name="per_page">
                                    <option value="3">3</option>
                                    <option value="6">6</option>
                                    <option value="9">9</option>
                                    <option selected="selected" value="12">12</option>
                                    <option value="15">15</option>
                                    <option value="30">30</option>
                                    <option value="45">45</option>
                                    <option value="60">60</option>
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
                        @forelse($marcas as $value)
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
                        @empty
                        <h2>{{__('messages.pro1')}}</h2>
                        @endforelse

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
 
@endsection