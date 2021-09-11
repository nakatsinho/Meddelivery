<div class="header-connect">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="header-half header-call">
                    <p>
                        <span><i class="fa fa-whatsapp"></i> <a href="https://wa.me/258845132931">+258 84 513 2931</a></span>
                        <span><i class="pe-7s-call"></i> <a href="tel:+258 845132931">+258 84 513 2931</a></span>
                        <span><i class="pe-7s-mail"></i> info@meddelivery.co.mz</span>
                    </p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="header-half header-social navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        @guest
                        <li>
                            <a class="nav-link" href="{{ route('auth.login') }}">{{ __('Entrar') }}</a>
                        </li>
                        <li>
                            <a class="nav-link" href="{{ route('auth.register') }}">{{ __('Registar') }}</a>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <!-- <img src="{{ asset('dist\img\language.png')}}">--> {{ __('messages.language') }} 
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('locale/pt') }}">PT <img src="{{ asset('dist\img\mozambique-flag.png')}}"></a>
                                    <a class="dropdown-item" href="{{ url('locale/en') }}">EN <img src="{{ asset('dist\img\usa.png')}}"></a>
                                </div>
                            </div>
                        </li>
                        @if (Route::has('register'))
                        Line
                        @endif
                        @else
                        <li class="dropdown user user-menu">
                            <a href="{{ url('perfil_foto')}}" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="admin/images/{{ Auth::user()->image }}" class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="admin/images/{{ Auth::user()->image }}" class="img-circle" alt="User Image">
                                    <p>
                                        <a href="{{ url('perfil_foto')}}">{{ Auth::user()->name }} - {{ Auth::user()->number }}</a>
                                        <small>Membro desde {{ date('d/m/Y', strtotime (Auth::user()->created_at))}} / {{Auth::user()->created_at->diffForHumans()}}</small>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                        <div class="col-xs-4 text-center">
                                            <a href="{{url('carrinho')}}" class="">{{__('messages.cart')}} ({{Cart::total()}}) MZN</a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                            <a href="{{url('desejos')}}">{{__('messages.wish')}} <span>({{Meddelivery\Models\Desejo::count()}})</span></a>
                                        </div>
                                        <div class="col-xs-4 text-center">
                                        @if(Auth::user()->user_group_id==2 || Auth::user()->user_group_id==1)
                                            <a href="http://meddelivery.co.mz/admin">Meus Produtos</a>
                                        @endif
                                        </div>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{url('perfil')}}" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-default btn-flat" href="{{ route('auth.logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            {{ __('Sair') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                     {{ __('messages.language') }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ url('locale/pt') }}">PT <img src="{{ asset('dist\img\mozambique-flag.png')}}"></a>
                                    <a class="dropdown-item" href="{{ url('locale/en') }}">EN <img src="{{ asset('dist\img\usa.png')}}"></a>
                                </div>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>