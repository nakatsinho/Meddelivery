@extends('layouts.app')
 
 
@section('content')
<div class="page-head">
    <div class="container">
        <div class="row">
            <div class="page-head-content">
                <h1 class="page-title"><i class="glyphicon glyphicon-book"></i> Termos & Compromissos Meddelivery </h1>
            </div>
        </div>
    </div>
</div>
<div class="row">  
<div class="col-sm-1"></div>
        <div class="col-sm-10">
            <div class="">
                <p>
                Ao <label><strong> clicar no Botão “Aceitar”</strong></label>
                    @include('auth.terms')
                </p> 
            </div> 
        </div>
    </div>
@endsection