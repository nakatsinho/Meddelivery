<div class="content-area home-area-1 recent-property" style="background-color: #FCFCFC; padding-bottom: 55px;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 text-center page-title">
                <!-- /.feature title -->
                <h2 style="color:006401;"><b>{{__('messages.intro')}}</b></h2>
                <!-- <p>Nulla quis dapibus nisl. Suspendisse ultricies commodo arcu nec pretium. Nullam sed arcu ultricies . </p> -->
            </div>
        </div>

        <div class="row">
            <div class="proerty-th">
                @forelse($produtos as $value)
                <div class="col-sm-6 col-md-3 p0">
                    <div class="box-two proerty-item">
                        <div class="item-thumb">
                            <a href="{{url('detalhes', $value->id)}}"><img src="{{url('admin/images',$value->image)}}"></a>
                        </div>
                        <div class="item-entry overflow">
                            <h5><a href="{{url('detalhes', $value->id)}}">{{$value->nome_pro}} </a></h5>
                            <div class="dot-hr"></div>
                            <span class="pull-left text-muted"><b style="color:006401;">Antes: </b><b>MZN </b>{{$value->spl_price}} </span>
                            <span style="color:006401;" class="proerty-price pull-right"><b>MZN</b> {{$value->preco_pro}}</span>
                            <a style="padding:3px;" class="pull-left" href="{{url('carrinho/addItem',$value->id)}}">{{__('messages.add')}} <i class="glyphicon glyphicon-shopping-cart"></i> </a>
                            <a style="padding:3px;" class="pull-right" href="{{url('carrinho/addItem',$value->id)}}">{{__('messages.wish')}} <i class="glyphicon glyphicon-heart"></i> </a>
                        </div>
                        <div>
                            
                        </div>
                    </div>
                </div>
                @empty
                <h2>{{__('messages.pro1')}}</h2>
                @endforelse
                <div class="col-sm-6 col-md-3 p0">
                    <div class="box-tree more-proerty text-center">
                        <div class="item-tree-icon">
                            <i class="fa fa-th"></i>
                        </div>
                        <div class="more-entry overflow">
                            <h5><a href="{{url('products')}}">{{__('messages.pro2')}} </a></h5>
                            <h5 class="tree-sub-ttl">{{__('messages.pro3')}}</h5>
                            <button class="btn border-btn more-black" value="All properties"><a href="{{url('products')}}">{{__('messages.pro4')}}</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
