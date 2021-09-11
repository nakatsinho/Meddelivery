<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <title>Factura Meddelivery</title>
</head>

<body>


    <style>
        *[contenteditable] {
            border-radius: 0.25em;
            min-width: 1em;
            outline: 0;
        }

        *[contenteditable] {
            cursor: pointer;
        }

        *[contenteditable]:hover,
        *[contenteditable]:focus,
        td:hover *[contenteditable],
        td:focus *[contenteditable],
        img.hover {
            background: #DEF;
            box-shadow: 0 0 1em 0.5em #DEF;
        }

        span[contenteditable] {
            display: inline-block;
        }

        /* heading */

        h1 {
            font: bold 100% sans-serif;
            letter-spacing: 0.5em;
            text-align: center;
            text-transform: uppercase;
        }

        /* table */

        table {
            font-size: 75%;
            table-layout: fixed;
            width: 100%;
        }

        table {
            border-collapse: separate;
            border-spacing: 2px;
        }

        th,
        td {
            border-width: 1px;
            padding: 0.5em;
            position: relative;
            text-align: left;
        }

        th,
        td {
            border-radius: 0.25em;
            border-style: solid;
        }

        th {
            background: #EEE;
            border-color: #BBB;
        }

        td {
            border-color: #DDD;
        }

        /* header */

        header {
            margin: 0 0 3em;
        }

        header:after {
            clear: both;
            content: "";
            display: table;
        }

        header h1 {
            background: #000;
            border-radius: 0.25em;
            color: #FFF;
            margin: 0 0 1em;
            padding: 0.5em 0;
        }

        header address {
            float: left;
            font-size: 75%;
            font-style: normal;
            line-height: 1.25;
            margin: 0 1em 1em 0;
        }

        header address p {
            margin: 0 0 0.25em;
        }

        header span,
        header img {
            display: block;
            float: right;
        }

        header span {
            margin: 0 0 1em 1em;
            max-height: 25%;
            max-width: 60%;
            position: relative;
        }

        header img {
            max-height: 100%;
            max-width: 100%;
        }

        header input {
            cursor: pointer;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
            height: 100%;
            left: 0;
            opacity: 0;
            position: absolute;
            top: 0;
            width: 100%;
        }

        /* article */

        article,
        article address,
        table.meta,
        table.inventory {
            margin: 0 0 3em;
        }

        article:after {
            clear: both;
            content: "";
            display: table;
        }

        article h1 {
            clip: rect(0 0 0 0);
            position: absolute;
        }

        article address {
            float: left;
            font-size: 125%;
            font-weight: bold;
        }

        /* table meta & balance */

        table.meta,
        table.balance {
            float: right;
            width: 36%;
        }

        table.meta:after,
        table.balance:after {
            clear: both;
            content: "";
            display: table;
        }

        /* table meta */

        table.meta th {
            width: 40%;
        }

        table.meta td {
            width: 60%;
        }

        /* table items */

        table.inventory {
            clear: both;
            width: 100%;
        }

        table.inventory th {
            font-weight: bold;
            text-align: center;
        }

        table.inventory td:nth-child(1) {
            width: 26%;
        }

        table.inventory td:nth-child(2) {
            width: 38%;
        }

        table.inventory td:nth-child(3) {
            text-align: right;
            width: 12%;
        }

        table.inventory td:nth-child(4) {
            text-align: right;
            width: 12%;
        }

        table.inventory td:nth-child(5) {
            text-align: right;
            width: 12%;
        }

        /* table balance */

        table.balance th,
        table.balance td {
            width: 50%;
        }

        table.balance td {
            text-align: right;
        }

        /* aside */

        aside h1 {
            border: none;
            border-width: 0 0 1px;
            margin: 0 0 1em;
        }

        aside h1 {
            border-color: #999;
            border-bottom-style: solid;
        }

        /* javascript */

        .add,
        .cut {
            border-width: 1px;
            display: block;
            font-size: .8rem;
            padding: 0.25em 0.5em;
            float: left;
            text-align: center;
            width: 0.6em;
        }

        .add,
        .cut {
            background: #9AF;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
            background-image: -moz-linear-gradient(#00ADEE 5%, #0078A5 100%);
            background-image: -webkit-linear-gradient(#00ADEE 5%, #0078A5 100%);
            border-radius: 0.5em;
            border-color: #0076A3;
            color: #FFF;
            cursor: pointer;
            font-weight: bold;
            text-shadow: 0 -1px 2px rgba(0, 0, 0, 0.333);
        }

        .add {
            margin: -2.5em 0 0;
        }

        .add:hover {
            background: #00ADEE;
        }

        .cut {
            opacity: 0;
            position: absolute;
            top: 0;
            left: -1.5em;
        }

        .cut {
            -webkit-transition: opacity 100ms ease-in;
        }

        tr:hover .cut {
            opacity: 1;
        }

        .invoice-box .panel-body {
            max-width: 700px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 18px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .panel-body {
            /* max-width: 700px; */
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 18px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
        </div>
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="invoice-box">
                        <table cellpadding="0" cellspacing="0">
                            <tr class="top">
                                <td colspan="1">
                                    <table>
                                        <tr>
                                            <td class="title">
                                                <img src="../assets/img/logo.png" style="width:100%; max-width:300px;">
                                            </td>

                                            <td class="heading">
                                                <b>Factura nr. #: {{ $order->count() }}</b><br>
                                                Data de Emissão: {{ $order->created_at }}<br>
                                                Vencimento: {{ $order->created_at->addDays(2) }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                            <tr class="information">
                                <td colspan="1">
                                    <table>
                                        <tr>
                                            <td>@foreach($empresa as $value)
                                                <b>{{$value->nome}}</b> <br>
                                                Email: {{$value->email}}<br>
                                                Tel.: {{$value->contacto1}}<br>
                                                Tel.: {{$value->contacto2}}<br>
                                                Endereço: {{$value->endereco}} <br> {{$value->endereco1}} | {{$value->endereco2}}
                                                @endforeach
                                            </td>

                                            <td>
                                                @foreach($client as $value)
                                                <b>Facturado a:</b><br>
                                                Entidade Individual<br>
                                                {{ $value->nomecompleto }}<br>
                                                {{ $value->email }} <br>
                                                <?php
                                                $bairro = DB::table('bairro')->where('id', $value->bairro_id)->get(); ?>
                                                @foreach($bairro as $value4)
                                                {{ $value4->nome }} |
                                                @endforeach
                                                {{ $value->detalhes }} <br>
                                                <?php
                                                $location = DB::table('provincia')->where('id', $value->provincia_id)->get(); ?>
                                                @foreach($location as $value2)
                                                {{ $value2->nome }} |
                                                @endforeach
                                                <?php
                                                $county = DB::table('pais')->where('id', $value->pais_id)->get(); ?>
                                                @foreach($county as $value3)
                                                {{ $value3->nome }}
                                                @endforeach
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <header>

                    </header>
                    <article>
                        <table class="meta">
                            <tr>
                                <th><span>Factura #</span></th>
                                <td><span>0000{{ $order->count() }}</span></td>
                            </tr>
                            <tr>
                                <th><span>Data</span></th>
                                <td><span>{{ $order->created_at }}</span></td>
                            </tr>
                            <tr>
                                <th><span contenteditable>Estado da Factura</span></th>
                                <td><span id="prefix" contenteditable></span><span>{{ $order->status }}</span></td>
                            </tr>
                        </table>
                        <table class="inventory">
                            <thead>
                                <tr class="heading">
                                    <th>
                                        Método de Pagamento
                                    </th>
                                    <th>
                                        Entidade
                                    </th>
                                    <th>
                                        NIB
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="details">
                                    <?php
                                    $fpay = DB::table('f_pagamento')->where('id', $value->id_pagamento)->get(); ?>
                                    @foreach($fpay as $value4)
                                    <td>
                                        {{$value4->nome}}
                                    </td>
                                    <td>
                                    {{$value4->number}}
                                    </td>
                                    <td>
                                    {{$value4->nib}}
                                    </td>
                                    @endforeach
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                        <table class="inventory">
                            <thead>
                                <tr>
                                    <th><span>Item</span></th>
                                    <th><span>Descrição</span></th>
                                    <th><span>Quantidade</span></th>
                                    <th><span>Taxa</span></th>
                                    <th><span>Preço</span></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($sum=0)
                                @foreach($cartItems as $cartItem)
                                <tr>
                                    <td><span class="text-center">{{ $cartItem->id }}</span></td>
                                    <td><span>{{ $cartItem->name }}</span></td>
                                    <td><span>{{ $cartItem->qty }}</span></td>
                                    <td><span data-prefix>MZN </span><span>{{ $taxa= $cartItem->tax*0.10 }}</span></td>
                                    <td><span data-prefix>MZN </span><span>{{ $total = $cartItem->price*$cartItem->qty }}</span></td>
                                </tr>
                                @php($sum = $sum + $total+$taxa)
                                @endforeach
                            </tbody>
                        </table>
                        <table class="balance">
                            <tr>
                                <th><span>Total</span></th>
                                <td><span data-prefix>MZN </span><span>{{ $sum }}</span></td>
                            </tr>
                        </table>
                    </article>
                    <aside>
                        <hr>
                        <span><a class="btn btn-success pull-right" href="{{ url('home') }}">Voltar a loja </a> </span>
                        <span><a class="btn btn-success pull-right" href="{{ url('factura-pdf',$btnDown) }}">Download</a></span>
                        <br>
                        <!-- <h1><span>Additional Notes</span></h1>
                        <div>
                            <p>A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
                        </div> -->
                    </aside>
                </div>
            </div>
        </div>
    </div>
</body>

</html>