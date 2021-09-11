<nav class="navbar navbar-default ">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('home')}}"><img src="{{asset('assets/img/logo.png')}}" alt="" width="105px"></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse yamm" id="navigation">
            <form class="form-inline" role="search" action="{{ route('pesquisa.result') }}" method="get">
                <div class="form-group col-sm-8 text-center">
                    <i class="fa fa-search ics"></i> <input type="text" id="queryPro" name="queryPro" class="form-up" placeholder="Busque o medicamento ou produto pela inicial aqui...">
                </div>
            </form>
            <div class="button navbar-right">
                <a class="navbar-btn nav-button wow bounceInRight login" href="{{url('carrinho')}}" onclick="routeToCart" data-wow-delay="0.45s"><span class="glyphicon glyphicon-shopping-cart"></span> {{__('messages.cart')}} ({{Cart::count()}})</a>
                <a class="navbar-btn nav-button wow fadeInRight" href="{{url('desejos')}}" data-wow-delay="0.48s"><span class="glyphicon glyphicon-heart"></span> {{__('messages.wish')}} ({{Meddelivery\Models\Desejo::count()}})</a>
            </div>
            <ul class="main-nav nav navbar-nav navbar-right">
                <li class="dropdown yamm-fw active" data-wow-delay="0.1s">
                    <a class="" href="{{ route('partials.listallcats')}}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Todas Categorias </a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>Todas Principais</h5>
                                        <ul>
                                            <?php
                                            $menus = DB::table('menus')->orderBy('id', 'asc')->limit(18)->get(); ?>
                                            @foreach($menus as $value)
                                            <li>
                                                <a href="#">{{ucwords($value->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Testes / Aparelhos / Acessórios</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('categorias')->where('id', '>=', 73)->orWhere('categorias.id',102)->limit(11)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('categorymenu',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>SAÚDE E BEM ESTAR</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('categorias')->where('id', '>=', 68)->limit(5)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('categorymenu',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>InfantÍl</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('categorias')->where('id','>=', '93')->limit(8)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('categorymenu',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Medicina Alternativa / Medicina Natural</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('categorias')->where('id','>=' ,'85')->limit(8)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('categorymenu',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Bem Estar Sexual</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '84')->limit(7)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('categorymenu',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw" data-wow-delay="0.1s">
                    <a class="" href="{{ route('partials.listallproducts')}}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Genéricos</a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>Alergias</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '1')->limit(10)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                        <h5>Dor e Febre</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '10')->limit(10)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                        <h5>Vermes e Parasitas</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '24')->limit(10)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                        <h5>Saúde Feminina</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '16')->limit(10)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                        <h5>Tratamento Capilar</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '22')->limit(10)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Aparelho Digestivo</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '2')->limit(10)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                        <h5>Para os Ossos</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '13')->limit(10)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                        <h5>Saúde Masculina</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '17')->limit(10)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                        <h5>Redutor de Peso</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '23')->limit(10)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Gripes e Resfriados</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '11')->limit(5)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                        <h5>Olhos</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '12')->limit(8)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                        <h5>Sistema Nervoso</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '20')->limit(8)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '8')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '9')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '18')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '21')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '64')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '63')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Pele e Mucosa</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '14')->limit(8)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                        <h5>Hormonas e Enzimas</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '15')->limit(8)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                        <h5>Sistema Circulatório</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('category_id', '19')->limit(10)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '3')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '4')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '5')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '6')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw" data-wow-delay="0.1s">
                    <a class="" href="{{url('/category/1')}}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Mães & Bebés</a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>Alimentação</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '25')->limit(8)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Fraldas</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '69')->limit(8)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Acessórios Bebê</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '33')->limit(8)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Troca de Fraldas</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '38')->limit(8)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Cuidados com o bebê</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '34')->limit(8)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Hora do Banho</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '36')->limit(8)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Cuidados com a Mãe</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '35')->limit(8)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Kits & Presentes</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '39')->limit(8)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw" data-wow-delay="0.1s">
                    <a class="" href="{{url('/category/2')}}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Cardíacos & Hipertensos</a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <?php
                                    $subHIV = DB::table('subcategorias')->where('category_id', '60')->limit(5)->get(); ?>
                                    <div class="col-sm-3">
                                        <h5>Cardíacos & Hipertensos</h5>
                                        <ul>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw" data-wow-delay="0.1s">
                    <a class="" href="{{url('/category/3')}}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Diabetes</a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <?php
                                    $subHIV = DB::table('subcategorias')->where('category_id', '62')->limit(14)->get(); ?>
                                    <div class="col-sm-3">
                                        <h5>Diabetes</h5>
                                        <ul>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw" data-wow-delay="0.1s">
                    <a class="" href="{{url('/category/4')}}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">HIV</a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>HIV</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '61')->limit(5)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw" data-wow-delay="0.1s">
                    <a class="" href="{{url('/category/5')}}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">PetShop</a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>PetShop</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '66')->limit(10)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>(2/2)</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('id', '>=', 230)->limit(5)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw" data-wow-delay="0.1s">
                    <a class="" href="{{url('/category/6')}}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Fitness</a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>Fitness</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '67')->limit(8)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>(2/3)</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('id', '>=', 243)->limit(8)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('subcategory',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>(3/3)</h5>
                                        <ul>
                                            <?php
                                            $subcategorias = DB::table('subcategorias')->where('id', '>=', 252)->limit(1)->get(); ?>
                                            @foreach($subcategorias as $value)
                                            <li><a href="{{url('category',$value->id)}}">{{ucwords($value->nome)}}</a> </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
                <li class="dropdown yamm-fw" data-wow-delay="0.1s">
                    <a class="" href="{{url('/category/7')}}" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Beleza & Higiene</a>
                    <ul class="dropdown-menu">
                        <li>
                            <div class="yamm-content">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h5>Dermocosmeticos</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '40')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Perfumes</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '44')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Higiene Feminina</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '51')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Higiene Masculina</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '52')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Higiene Oral</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '54')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Rosto</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '41')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Colôlinas</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '45')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Desodorizante Creme e Roll on</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '45')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Higiene Corporal</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '53')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Higiene Pessoal</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '55')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Cabelo</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '99')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Terceira Idade</h5>
                                        <ul>
                                        <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '50')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Produtos Íntimos</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '59')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Unhas</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '56')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        
                                    </div>
                                    <div class="col-sm-3">
                                        <h5>Mãos</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '42')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <h5>Pés</h5>
                                        <ul>
                                            <?php
                                            $subHIV = DB::table('subcategorias')->where('category_id', '43')->limit(14)->get(); ?>
                                            @foreach($subHIV as $hiv)
                                            <li>
                                                <a href="{{url('subcategory',$hiv->id)}}">{{ucwords($hiv->nome)}}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '48')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '49')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '57')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                        <?php
                                        $subHIV = DB::table('categorias')->where('id', '58')->limit(1)->get(); ?>
                                        @foreach($subHIV as $hiv)
                                        <h5><a href="{{url('category',$hiv->id)}}">{{ucwords($hiv->nome)}}</a></h5>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- /.yamm-content -->
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- @if (!Auth::guest()) -->
<!-- @endif -->