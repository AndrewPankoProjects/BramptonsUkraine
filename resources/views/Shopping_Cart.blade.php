@extends('layouts.app')

@section('title')
   <h1 class="text-center">Shopping Cart</h1>
@endsection
<!-- class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3" -->
@section('content')
  @if(Session::has('cart'))
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
            <div style="border: 2px solid gray; border-radius: 5px;padding: 30px;margin-top: 50px;margin-bottom: 100px;">
                <ul class = "list-group">
                  @foreach($products as $product)
                  <li class ="list-group-item">
                    <span class="badge">{{$product['qty']}}</span>
                    <strong>{{$product['item']['title']}}</strong>
                    <span class="label label-success">${{$product['price']}}.00</span>
                  </li>
                  @endforeach
                </ul>
            </div>
          <div class="row">
            <div>
                <strong>Total Cost: $ {{$totalPrice}}.00</strong>
            </div>
          </div>
          <hr>
          <div class ="text-center">
          <a href="{{route('checkout')}}" class="btn btn-success btn-lg" role="button">Checkout</a>
        </div>
        @else
        <div class="row">
          <div class="col-sm-8" style="margin: 195px;">
              <h2 class="justify-content-center text-center">No Items in Cart!</h2>
          </div>
        </div>
        @endif
      </div>
  </div>
</div>
@endsection
