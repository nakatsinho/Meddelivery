@extends('layouts.app')
 
 
@section('content')
<div class="content-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('status.post') }}" method="post" role="form">
                    <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                        <textarea class="form-control" placeholder="Qual e' seu estado hoje {{ Auth::user()->getNameOrUsername() }} ?" name="status" id="" cols="30" rows="10"></textarea>
                        @if ($errors->has('status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-success"><i class="fa fa-envelope bg-blue"></i> Publicar</button>
                    <!-- <span class="btn bg-orange fileinput-button"><input type="file" ></span> -->
                    <button class="btn btn-danger" disabled="disabled">Chat Privado</button>
                    <button class="btn btn-primary" disabled="disabled">Video Chamada</button>
                    <input type="hidden" name="_token" value="{{ Session::token() }}">
                </form>        
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-10">
                @if (!$statuses->count())
                    <p>Sem nada na sua linha de tempo ainda...</p>
                @else
                    @foreach ($statuses as $status)
                    <div class="post">
                  <div class="user-block">
                    <a href="{{ route('perfil.index', ['username'=>$status->user->username]) }}" class="pull-left">
                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="{{ $status->user->getNameOrUsername() }}">
                        <!-- <img class="media-object" alt="{{ $status->user->getNameOrUsername() }}" src="{{ $status->user->getAvatarUrl() }}"> -->
                    </a>
                    
                        <span class="username">
                          <a href="{{ route('perfil.index', ['username'=>$status->user->username]) }}">{{ $status->user->getNameOrUsername() }}</a>
                          
                        </span>
                    <span class="description">Partilhado a - {{ $status->created_at->diffForHumans() }} <i class="fa fa-clock-o"></i></span>
                  </div>
                  <p>{{ $status->body }}</p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Partilhar</a></li>
                    @if ($status->user->id !== Auth::user()->id)
                        <li><a href="{{ route('status.like', ['statusId' => $status->id]) }}">Gosto</a></li>
                    @endif
                    <li><b class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i></b>{{ $status->likes->count() }} {{ str_plural('Gosto', $status->likes->count()) }}</li>
                    </li>
                    <!-- <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-8"></i> Comentarios
                        (5)</a></li> -->
                  </ul>

                <!-- /.post -->
                    <div class="media" id="win">
                            
                            <div class="media-body">
                                @foreach ($status->replies as $reply)
                                <div class="user-block">
                                    <a href="{{ route('perfil.index', ['username'=>$reply->user->username]) }}" class="pull-left">
                                        <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="{{ $status->user->getNameOrUsername() }}">    
                                    <!-- <img src="{{ $reply->user->getAvatarUrl() }}" alt="{{ $reply->user->getNameOrUsername() }}" class="media-object"> -->
                                    </a>
                                    <span class="username">
                                            <a href="{{ route('perfil.index', ['username'=>$reply->user->username]) }}">{{ $reply->user->getNameOrUsername() }}</a>
                                            
                                        </span>
                                    <span class="description">Partilhado a - {{ $reply->created_at->diffForHumans() }} <i class="fa fa-clock-o"></i></span>
                                </div>
                                    <div class="media-body">
                                        
                                        <p>{{ $reply->body }}</p>
                                        <ul class="list-inline">
                                        
                                            @if ($reply->user->id !== Auth::user()->id)
                                                <li><a href="{{ route('status.like', ['statusId' => $reply->id]) }}">Gosto</a></li>
                                            @endif
                                            <li>{{ $reply->likes->count() }} {{ str_plural('Gosto', $reply->likes->count()) }}</li>
                                        </ul>
                                    </div> 
                                </div>
                                @endforeach

                            <form role="form" action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
                                <div class="form-group{{ $errors->has("reply-{$status->id}") ? ' has-error': '' }}">
                                    <input name="reply-{{ $status->id }}" class="form-control input-sm" id="" placeholder="Responda escrevendo aqui..." >
                                    @if ($errors->has("reply-{$status->id}"))
                                        <span class="help-block">
                                            <strong>{{ $errors->first("reply-{$status->id}") }}</strong>
                                        </span>
                                    @endif 
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm" value="Reply">Responder</button>
                                <input type="hidden" name="_token" value="{{ Session::token() }}">
                            </form>
                        </div> 
<br \>
                    @endforeach

                    {{ $statuses->render() }}
                @endif
            </div>
        </div>
    </div>
</div>

@endsection