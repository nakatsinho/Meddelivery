@extends('layouts.app')
@section('title', 'Lista de Categorias')
 
 
@section('content')
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">{{__('messages.category')}}</h1>
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
                        @foreach($categoria_all as $value)
                        <div class="col-sm-6 col-md-4 p0">
                            <div class="box-two proerty-item">
                                <div class="item-thumb">
                                    <a href="{{url('category',$value->id)}}"><img src="{{url('admin/images',$value->image)}}"></a>
                                </div>

                                <div class="item-entry overflow">
                                    <h5><a href="{{url('category',$value->id)}}"> {{$value->nome}} </a></h5>
                                    <div class="dot-hr"></div>
                                    <span class="pull-left"><b>Revisado: </b>{{$value->info_slug}}</span>
                                    <span class="proerty-price pull-right"> <b>Produtos:</b> {{$value->qty}}</span>
                                    <p style="display: none;">{{$value->info_cat}}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="pull-right">
                        <div class="pagination">
                            <ul>
                                <li>{!! $categoria_all->links() !!}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection