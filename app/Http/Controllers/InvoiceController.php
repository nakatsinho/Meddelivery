<?php

namespace Meddelivery\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Meddelivery\Models\Pagamento;
use Meddelivery\Models\Empresa;
use Meddelivery\Models\Pedido;
use Gloudemans\Shoppingcart\Facades\Cart;
use Meddelivery\Models\Endereco;
use Meddelivery\Models\Order;
use Redirect;
use Auth;
use Illuminate\Support\Facades\Mail;
use Meddelivery\Models\Invoice;

class InvoiceController extends Controller
{
    public function getInvoice($id)
    {
        $fpay = Pagamento::pluck('nome','id');
        $empresa = Empresa::all();
        $order = Pedido::find($id);
        $cartItems = Cart::content();
        $btnDown = $id;
        $client = Endereco::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->limit(1)->get();
        foreach($client as $val)
        {
            $val->id_pagamento;
            $val->detalhes;
            $val->notes;
            $val->pincode;
            $val->telefone;
        }
        $count=$order->count();

        $pdf = PDF::loadView('invoice', [
            'fpay'=>$fpay,
            'empresa'=>$empresa,
            'order'=>$order,
            'cartItems'=>$cartItems,
            'btnDown'=>$btnDown,
            'client'=>$client,
            'count'=>$count,
        ]);

        $path = 'admin/docs/invoices';
        $fileName = Auth::user()->surname.'_'."MD-Factura_{$order->count()}.pdf";
        $data = new Invoice();
        $data->title = Auth::user()->name . '_' . Auth::user()->surname;
        $data->description = $cartItems;
        $data->file = $fileName;
        $data->user_id = Auth::user()->id;
        $data->pedido_id = $order->id;
        $pdf->save($path . '/' . $fileName);
        $data->save();

        $fp = Pagamento::where('id',$val->id_pagamento)->pluck('nome');
        $to_email = Auth::user()->email;
        $name = Auth::user()->surname;

        Mail::send('carrinho.request', [
            'head' => 'Notificação de Requisição',
            'user' => Auth::user()->name,
            'surname' => Auth::user()->surname,
            'number' => $val->telefone,
            'email' => Auth::user()->email,
            'details' => $val->detalhes,
            'zip' => $val->pincode,
            'notes' => $val->notes,
            'f_pay' => $fp,
            'cartItems' => Cart::content(),
            'order' => $order,
        ], function ($body) use ($to_email, $name, $pdf, $fileName) {
            $body->from('rentfood@gmail.com', 'MED DELIVERY, LDA');
            $body->to($to_email, $name);
            $body->cc('nakatsinho@gmail.com', 'MEDDELIVERY ADMIN');
            $body->replyTo('nakatsinho@gmail.com');
            $body->subject('Confirmação de Encomenda');
            $body->attachData($pdf->output(), $fileName);
        });

        return view('invoice', compact('fpay', 'cartItems','empresa','order','btnDown','count','client'));
    }

    public function getPdf($id)
    {
        $fpay = Pagamento::pluck('nome','id');
        $empresa = Empresa::all();
        $order = Pedido::find($id);
        $cartItems = Cart::content();
        $client = Endereco::where('user_id', Auth::user()->id)->orderBy('created_at','desc')->limit(1)->get();
        $btnDown = $id;
        $count=$order->count();
        $pdf = PDF::loadView('invoice', [
            'fpay'=>$fpay,
            'empresa'=>$empresa,
            'order'=>$order,
            'cartItems'=>$cartItems,
            'btnDown'=>$btnDown,
            'client'=>$client,
            'count'=>$count,
        ]);
        return $pdf->download("Factura_MD{$count}.pdf");
    }
}
