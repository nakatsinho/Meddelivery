<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Factura Meddelivery</title>

    <style>
        .invoice-box {
            max-width: 700px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 112%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

        .page-break {
            page-break-after: always;
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="1">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{asset('assets/img/logo.png')}}" style="width:100%; max-width:300px;">
                            </td>

                            <td class="heading">
                                <b>Factura nr. #: 123</b><br>
                                Data de Emissão: January 1, 2015<br>
                                Vencimento: February 1, 2015
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="1">
                    <table>
                        <tr>
                            <td>
                                <b>Meddelivery, Lda</b> <br>
                                Email: pagamentos@meddelivery.co.mz<br>
                                Tel.: +258 845132931<br>
                                Tel.: +258 845248888<br>
                                Endereço: Av. Emilia Daússe <br> Bairro Central "A" | Maputo
                            </td>

                            <td>
                                <?php
                                $client = DB::table('endereco')->where('id', Auth::user()->id)->get(); ?>
                                @foreach($client as $value)
                                <b>Facturado a:</b><br>
                                Entidade Individual<br>
                                {{ $value->nomecompleto }}<br>
                                {{ $value->email }} <br>
                                {{ $value->detalhes }} <br>
                                <?php
                                $location = DB::table('provincia')->where('id', $value->id)->get(); ?>
                                @foreach($location as $value2)
                                {{ $value2->nome }} | 
                                @endforeach
                                <?php
                                $county = DB::table('pais')->where('id', $value->id)->get(); ?>
                                @foreach($county as $value3)
                                {{ $value3->nome }}
                                @endforeach
                                @endforeach
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Método de Pagamento
                </td>
                
                <td>
                    Entidade
                </td>
            </tr>

            <tr class="details">
                @foreach($fpay as $value)
                <td>

                </td>

                <td>

                </td>
                <td></td>
                @endforeach
            </tr>

            <tr class="heading">
                <td>Descrição</td>
                <td colspan="1">Qnt.</td>
                <td>
                    Subtotal
                </td>
            </tr>
            @foreach($cartItems as $cartItem)
            <tr class="item">
                <td>
                    {{$cartItem->name}}
                </td>
                <td class="text-center">
                    {{$cartItem->qty}}
                </td>
                <td>
                    {{$cartItem->price}}
                </td>
            </tr>
            @endforeach
            <tr class="total">
                <td></td>
                <td>Total: </td>
                <td>
                    {{Cart::total()}}
                </td>
            </tr>
        </table>
        <hr>
        <a class="btn btn-success pull-right" href="{{ url('factura-pdf') }}">Download</a>
        <br>
    </div>
    <!-- <h1>Page 1</h1>
    <div class="page-break"></div>
    <h1>Page 2</h1> -->
</body>

</html>