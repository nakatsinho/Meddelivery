@extends('layouts.app')
 
 
@section ('content')
<div class="page-head"> 
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title">Conta Comprador - Vendedor</h1>               
            </div>
        </div>
    </div>
</div>
<!-- End page header -->

<!-- property area -->
<div class="content-area submit-property" style="background-color: #FCFCFC;">&nbsp;
    <div class="container">
        <div class="clearfix" > 
            <div class="wizard-container"> 
                <div class="wizard-card ct-wizard-orange" id="wizardProperty">
                    <form action="{{ route('farmacia.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf                     
                        <div class="wizard-header">
                            <h3 class="text-center">
                                <b>DADOS RECEBIDOS</b> PORFAVOR AGUARDE - PODE VOLTAR MAIS TARDE <br>
                                <small>Fique atento a sua caixa de recebimentos por email (obrigatório).</small>
                            </h3>
                        </div>

                        
                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type='button' class='btn btn-next btn-primary' name='next' value='Proximo' />
                                <input type='submit' class='btn btn-finish btn-primary ' name='finish' value='Terminar' />
                            </div>
                            <div class="pull-left">
                                <input type='button' class='btn btn-previous btn-default' name='previous' value='Anterior' />
                            </div>
                            <div class="clearfix"></div>                                            
                        </div>	
                        <!-- <input type="hidden" name="_token" value="{{ Session::token() }}"> -->
                    </form>
                </div>
                <!-- End submit form -->
            </div> 
        </div>
    </div>
</div>
@endsection