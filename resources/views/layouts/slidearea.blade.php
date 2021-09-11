<div class="slider-area">
    <div class="slider">
        <div id="bg-slider" class="owl-carousel owl-theme">

            <div class="item"><img src="{{asset('assets/img/slide1/slider-image-1.jpg')}}" alt="Background 1"></div>
            <div class="item"><img src="{{asset('assets/img/slide1/slider-image-2.jpg')}}" alt="Background 2"></div>
            <div class="item"><img src="{{asset('assets/img/slide1/slider-image-1.jpg')}}" alt="Background 3"></div>

        </div>
    </div>
    <div class="slider-content">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-1 col-sm-6">
                <h2>{{__('messages.slogan')}}, <span style="color:#006401">{{__('messages.slogan2')}}</span> <span style="color:#ffcc00">{{__('messages.slogan3')}}</span></h2>
                <!--                         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi deserunt deleniti, ullam commodi sit ipsam laboriosam velit adipisci quibusdam aliquam teneturo!</p>
 -->
                <div class="search-form wow pulse" data-wow-delay="0.8s">
                    <form class="form-inline" role="search" action="{{ route('pesquisa.result') }}" method="get">
                        <button class="btn  toggle-btn" type="button"><i class="fa fa-bars"></i></button>
                        <!-- <div class="form-group">
                            <input type="text" style="color:black;" data-live-search="true" name="queryPro" data-live-search-style="begs" placeholder="Procurar medicamento...    ">
                        </div> -->
                        <div class="form-group">
                            <select id="lunchBegins" class="selectpicker" name="queryPro" data-live-search="true" data-live-search-style="begs" title="{{__('messages.search_p')}}">
                                @foreach($produtos as $value)
                                <option value="{{$value->nome_pro}}">{{$value->nome_pro}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button class="btn search-btn" name="search" type="submit"><i class="fa fa-search"></i></button>
                        <div style="display: none;" class="search-toggle">
                            <h2><a href="{{ route('partials.listallcats')}}">{{__('messages.cat')}}</a></h2>
                            <br>
                            <div class="search-row">
                                <?php
                                $categorias = DB::table('categorias')->paginate(15); ?>
                                @foreach($categorias as $value)
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <a href="{{url('category',$value->id)}}"><img src="{{url('admin/images',$value->image)}}" width="50px" class="user-image" alt="User Image"></a>
                                            <a href="{{url('category',$value->id)}}">{{ucwords($value->nome)}}</a>
                                        </label>
                                    </div>
                                </div>
                                @endforeach
                                <!-- End of  -->
                                <br><br>
                                <div class="dot-hr"></div>
                                {!! $categorias->links() !!}
                            </div>
                        </div>

                    </form>
                </div>

                {{ csrf_field() }}
            </div>
        </div>
    </div>
</div>