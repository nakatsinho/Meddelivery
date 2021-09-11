  <input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="pagamentos@meddelivery.co.mz">
<?php $count = 0; ?>
@foreach($cartItems as $cartItem)
<?php $count++; ?>
<input type="hidden" name="item_name_{{$count}}" value="{{$cartItem->name}}">
<input type="hidden" name="item_number_{{$count}}" value="{{$cartItem->id}}">
<input type="hidden" name="quantity_{{$count}}" value="{{$cartItem->qty}}">
<input type="hidden" name="amount_{{$count}}" value="{{$cartItem->price}}">
<input type="hidden" name="shipping_{{$count}}" value="0">
<input type="hidden" name="tax_{{$count}}" value="0.12">
<br>
@endforeach
<button class="btn btn-primary" disabled name="submit" id="paypalbtn" value="PayPal" formaction="https://www.paypal.com/cgi-bin/webscr"> <i class="fa fa-paypal" ></i>  PayPal Checkout</button>
