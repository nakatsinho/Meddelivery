@extends('layouts.app')

@section('content')
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Pagina de Contacto</h1>
            </div>
        </div>
    </div>
</div>
<!-- End page header -->
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    if(auth()->user()->is_admin == 1)
                    <a href="{{url('admin/routes')}}">Admin</a>
                    else
                    <div class=”panel-heading”>Normal User</div>
                    endif
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- property area -->
<div class="content-area recent-property padding-top-40" style="background-color: #FFF;">
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="" id="contact1">
                    <div class="row">
                        <div class="col-sm-4">
                            <h3><i class="fa fa-map-marker"></i> Endereço</h3>
                            <p>Bairro Central "A"
                                <br>Av. Emilia Daússe
                                <br>Maputo
                                <br>
                                <strong>Moçambique</strong>
                            </p>
                        </div>
                        <!-- /.col-sm-4 -->
                        <div class="col-sm-4">
                            <h3><i class="fa fa-phone"></i> Atendimento</h3>
                            <p class="text-muted">Este número não é gratuito se ligar de Moçambique, por isso, recomendamos que você use a forma eletrônica de comunicação.</p>
                            <p><strong><a href="tel:+258 845132931">+258 84 513 2931</a></strong></p>
                        </div>
                        <!-- /.col-sm-4 -->
                        <div class="col-sm-4">
                            <h3><i class="fa fa-envelope"></i> Suporte Electronico</h3>
                            <p class="text-muted">Por favor, sinta-se à vontade para nos escrever um email ou para usar nosso sistema.</p>
                            <ul>
                                <li><strong><a href="mailto:info@meddelivery.co.mz">info@meddelivery.co.mz</a></strong> </li>
                                <li><strong><a href="mailto:comercial@meddelivery.co.mz">comercial@meddelivery.co.mz</a></strong> </li>
                            </ul>
                        </div>
                        <!-- /.col-sm-4 -->
                    </div>
                    <!-- /.row -->
                    <hr>
                    <!-- <div id="map"></div> -->
                    <hr>
                    <h2>Formulário de Contato</h2>
                    <form>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="firstname">Primeiro nome</label>
                                    <input type="text" class="form-control" id="firstname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="lastname">Último nome</label>
                                    <input type="text" class="form-control" id="lastname">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="subject">Assunto</label>
                                    <input type="text" class="form-control" id="subject">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="message">Mensagem</label>
                                    <textarea id="message" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12 text-center">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Enviar Mensagem</button>
                            </div>
                        </div>
                        <!-- /.row -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection