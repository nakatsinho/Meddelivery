<div class="footer-area">

    <div class=" footer">
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                    <div class="single-footer">
                        <h4>{{__('messages.about')}}</h4>
                        <div class="footer-title-line"></div>

                        <img src="{{asset('assets/img/logo.png')}}" alt="footer" class="wow pulse" data-wow-delay="1s">
                        <p><span style="color:red">{{__('messages.slogan')}},</span> <span style="color:#006401">{{__('messages.slogan2')}}</span> <span style="color:#ffcc00">{{__('messages.slogan3')}}</span>.</p>
                        <ul class="footer-adress">
                            <li><i class="pe-7s-map-marker strong"> </i> Bairro Central "A" - Maputo</li>
                            <li> Av. Emilia Daússe </li>
                            <li><i class="pe-7s-mail strong"> </i> info@meddelivery.co.mz</li>
                            <li><i class="pe-7s-call strong"> </i> +258 84 513 2931</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                    <div class="single-footer">
                        <h4>{{__('messages.link')}}</h4>
                        <div class="footer-title-line"></div>
                        <ul class="footer-menu">
                            <li><a href="{{ route('partials.listallcats')}}">{{ __('messages.category') }}</a> </li>
                            <li><a href="{{ route('partials.listallproducts')}}">{{ __('messages.product') }}</a> </li>
                            <li><a href="{{ route('partials.listallmarcas')}}">Marcas </a> </li>
                            <li><a href="{{url('about')}}">{{ __('messages.about') }} </a></li>
                            <li><a href="{{url('contacto')}}">{{ __('messages.contact') }}</a></li>
                            <li><a href="{{url('chat')}}">Faq</a> </li>
                            <li><a href="{{url('termos')}}">Termos </a> </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                    <div class="single-footer">
                        <h4>{{__('messages.last')}}</h4>
                        <div class="footer-title-line"></div>
                        <ul class="footer-blog">
                            <?php  $pro_las = DB::table('produtos')->orderBy('created_at', 'desc')->limit(4)->get(); ?>
                            @foreach($pro_las as $value)
                            <li>
                                <div class="col-md-3 col-sm-4 col-xs-4 blg-thumb p0">
                                    <a href="{{url('detalhes', $value->id)}}">
                                        <img src="{{url('admin/images',$value->image)}}">
                                    </a>
                                    <span class="blg-date">{{ date('d/m/Y', strtotime ($value->created_at))}}</span>
                                </div>
                                <div class="col-md-8  col-sm-8 col-xs-8  blg-entry">
                                    <h6> <a href="{{url('detalhes', $value->id)}}">{{$value->nome_pro}} </a></h6>
                                    <p style="line-height: 17px; padding: 8px 2px;">Preço: {{$value->preco_pro}} <b>MZN</b> <br> {{ date('d/m/Y', strtotime ($value->created_at))}} </p>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 wow fadeInRight animated">
                    <div class="single-footer news-letter">
                        <h4>{{__('messages.stay')}}</h4>
                        <div class="footer-title-line"></div>
                        <p>{{__('messages.newsletter')}}</p>

                        <form>
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="E-mail ... ">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary subscribe" type="button"><i class="pe-7s-paper-plane pe-2x"></i></button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </form>

                        <div class="social text-centerx">
                            <ul>
                                <li><a class="wow fadeInUp animated" href="https://twitter.com/meddelivery"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="wow fadeInUp animated" href="https://www.facebook.com/meddelivery" data-wow-delay="0.2s"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="wow fadeInUp animated" href="https://instagram.com/meddelivery" data-wow-delay="0.4s"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-copy text-center">
        <div class="container">
            <div class="row">
                <div class="pull-left">
                    <span> (C) <a href="http://www.legocode.com">LEGOCODE</a> , {{ __('messages.footer') }} </span>
                </div>
                <div class="bottom-menu pull-right">
                    <ul>
                        <li><a class="wow fadeInUp animated" href="{{url('home')}}" data-wow-delay="0.2s">{{ __('messages.home') }}</a></li>
                        <li><a class="wow fadeInUp animated" href="{{ route('partials.listallcats')}}" data-wow-delay="0.3s">{{ __('messages.category') }}</a></li>
                        <li><a class="wow fadeInUp animated" href="{{url('chat')}}" data-wow-delay="0.4s">FAQ</a></li>
                        <li><a class="wow fadeInUp animated" href="{{url('contacto')}}" data-wow-delay="0.6s">{{ __('messages.contact') }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>