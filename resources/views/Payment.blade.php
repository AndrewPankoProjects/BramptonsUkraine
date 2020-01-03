@extends('layouts.app')
@section('title')
   <h1 class="text-center">Payment Page</h1>
@endsection

@section('content')
<!--<script src="{{asset('js/stripe.js')}}"></script>
<script src="{{asset('js/stripestuff.js')}}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/stripe.css')}}" />
-->

@if(Session::has('cart'))
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-8">
            <div style="border: 2px solid gray; border-radius: 5px; padding: 30px; margin-top: 50px; margin-bottom: 100px;">
              <form action="{{ action('SalesController@order') }}" method = "POST">
                @csrf
              <div>
                  <ul class = "list-group" >
                    @foreach($products as $product)
                    <li class ="list-group-item">
                      <span class="badge">{{$product['qty']}}</span>
                      <input name ="{{$product['item']['id']}}" value ="{{$product['qty']}}" hidden>
                      <strong>{{$product['item']['title']}}</strong>
                      <span class="label label-success">${{$product['price']}}.00</span>
                    </li>
                    @endforeach
                  </ul>
              </div>

              <div style = "text-align: center;">
                <h4><strong>Total Cost: $ {{$total}}.00 CDN</strong></h4>
                <input name ="total" value ="{{$total}}" hidden>
                <br>
                 <button type = "submit" class='btn btn-primary btn-lg'>Pay Now!</button>
                <br>
                <h1 id="success"></h1>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      @else
      <div class="row">
        <div class="col-sm-8" style="margin: 195px;">
            <h2 class="justify-content-center text-center">No Items in Cart!</h2>
        </div>
      </div>
      @endif

      <script>
      // Create a Stripe client.
      var stripe = Stripe('pk_test_FI9Z9GN1rSeHzNZaiOGxFDjr007V4AcFMa');
      // Create an instance of Elements.
      var elements = stripe.elements();

      // Custom styling can be passed to options when creating an Element.
      var style = {
        base: {
          // Add your base input styles here. For example:
          fontSize: '16px',
          color: "#32325d",
        }
      };

      // Create an instance of the card Element.
      var card = elements.create('card', {style: style});

      // Add an instance of the card Element into the `card-element` <div>.
      card.mount('#card-element');

      </script>
@endsection
