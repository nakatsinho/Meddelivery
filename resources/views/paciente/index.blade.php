@extends('layouts.app')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-6">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-green">
              <div class="widget-user-image">
                <img class="img-circle" src="../dist/img/user7-128x128.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username">Seus Amigos</h3>
              <h5 class="widget-user-desc">
                    @if (!$friends->count())
                        <p>Voçe nao tem amigos.</p>
                    @else
               </h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                    @foreach ($friends as $user)
                        <li><a href="#">@include('pesquisa.userblock') </a></li>
                    @endforeach
              </ul>
            </div>
            @endif
          </div>
          <!-- /.widget-user -->
        </div>
        <div class="row">
                <div class="col-lg-6">
                    <h4 style="color:black">Pedidos de Amizade de colegas</h4>

                    @if(!$requests->count())
                        <p>Sem pedidos de amizade de colegas no momento.</p>
                    @else
                        @foreach ($requests as $user)
                            @include('pesquisa.userblock')
                        @endforeach
                    @endif
                </div>
            </div>
    </div>
</div>
@stop
