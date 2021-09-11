<?php

namespace Meddelivery\Http\Controllers;

use Illuminate\Http\Request;
use Redirect,Response,Stripe;

class PaymentController extends Controller
{
    public function index()
    {
        return view('stripe');
    }
    
    public function store(Request $request)
    {
        $stripe = Stripe::charges()->create([
            'source' => $request->get('tokenId'),
            'currency' => 'MZN',
            'amount' => $request->get('amount') * 100
        ]);
  
        return $stripe;
    }
}
