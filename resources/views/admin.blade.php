@extends('layouts.app')
@section('title', 'MeDelivery Admin')
@section('content')
@include('admin.header')
@include('admin.sidebar')
<div class="content-wrapper">

    <section class="content-header">
        <h1>
            <small>Version 1.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Painel de Controle</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">TSI - Vocacional</h3>
                    </div>
                    <div class="box-body">

                        @include('admin.painel')
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@include('admin.footer')
@endsection