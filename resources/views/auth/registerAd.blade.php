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
                                <b>REGISTRE</b> SUA CONTA COMPRADOR - VENDEDOR <br>
                                <small>Preencha correctamente os campos abaixo (obrigatório).</small>
                            </h3>
                        </div>
                        <ul>
                            <li><a href="#step1" data-toggle="tab">Passo 1 </a></li>
                            <li><a href="#step2" data-toggle="tab">Passo 2 </a></li>
                            <li><a href="#step3" data-toggle="tab">Passo 3 </a></li>
                            <li><a href="#step4" data-toggle="tab">Passo 4 </a></li>
                            <li><a href="#step5" data-toggle="tab">Terminar </a></li>
                        </ul>

                        <div class="tab-content">
                            @include('auth.steps.step1')
                            <!--  End step 1 -->

                            @include('auth.steps.step2')
                            <!-- End step 2 -->
                            
                            @include('auth.steps.step3')
                            <!--  End step 3 -->

                            @include('auth.steps.step4')
                            <!--  End step 4 -->

                            @include('auth.steps.step5')
                            <!--  End step 5 -->                          
                        </div>

                        <div class="wizard-footer">
                            <div class="pull-right">
                                <input type="button" class="btn btn-next btn-primary" name="next" value="Proximo" />
                                <input type="submit" class="btn btn-finish btn-primary" name="finish" value="Terminar" />
                            </div>
                            <div class="pull-left">
                                <input type="button" class="btn btn-previous btn-default" name="previous" value="Anterior" />
                            </div>
                            <div class="clearfix"></div>                                            
                        </div>	
                       
                    </form>
                </div>
                <!-- End submit form -->
            </div> 
        </div>
    </div>
</div>
@endsection