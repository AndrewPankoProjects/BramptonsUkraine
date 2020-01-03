@extends('layouts.app')

@section('title')
  <!--<span class="sr-only">(current)</span> -->
   <h1 class="text-center">On the Menu</h1>
@endsection

@section('content')
@foreach($products->chunk(3) as $productChunk)
<div class="row">
  @foreach($productChunk as $product)
  <div class="col-sm-6 col-md-4">
      <div class="thumbnail">
          <img src="{{$product->imagePath}}" alt="..." class="img-thumbnail">
          <div class="caption">
              <h3>{{$product->title}}</h3>
              <p class="description">{{$product->description}}</p>
              <div class="clearfix">
                  <div class="pull-left price">${{$product->price}}</div>
                  @if (!Auth::guest())
                  <a href="{{route('addToCart', ['id'=>$product->id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a>
                  @endif


              </div>
          </div>
      </div>
    </div>
  @endforeach
    </div>
@endforeach
  <div class="container" style="margin-top:50px;">
    <div class="row">
      <div class="col text-center" style = "margin-bottom: 20px;">
        @if (!Auth::guest())
        <a class = "btn btn-danger" role="button" href="{{route('Shopping_Cart')}}">Checkout</a>
        @endif
        <br>
        @if (!Auth::guest() && Auth::user()->status == "premium")
            <h4 class="text-center"><a class = "text-center" href="beetsouprecipe.txt" download>Borscht Recipe Here!</a><h4><br>
            <h4 class="text-center"><a class = "text-center" href="cabbagerollrecipe.txt" download>Cabbage Roll Recipe Here!</a><h4><br>
            <h4 class="text-center"><a href="perogiesrecipe.txt" download>Perogies Recipe Here!</a></h4>
        @endif

        @if (!Auth::guest() && Auth::user()->status == "admin")
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                  <div style="border: 2px solid gray; border-radius: 5px; padding: 30px; margin-top: 50px; margin-bottom: 100px;">
                    <form action="{{ action('AdminController@changeProduct') }}" method = "POST">
                      @csrf
                      <div class="form-group">
                        <label for="title">Select Picture to change: </label>
                        <select name = "title" class="form-control" id="selecttitle">
                          <option>Cabbage Rolls</option>
                          <option>Perogies</option>
                          <option>Borscht (Beet Soup)</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="url">Place Url: </label>
                        <input type="text" name = "url" class="form-control" id="url" placeholder="Ex. https://d2gtpjxvvd720b.cloudfront.net/system/newsletter_item/social_image/1195/default_Floosh_s-Stuffed-Cabbage-FS-20190506-1455-9567-9424.jpg">
                      </div>
                      <div class="form-group">
                        <label for="desc">Update Description: </label>
                        <input type="textarea" name = "desc" class="form-control" id="desc">
                      </div>
                      <div class="form-group">
                        <label for="price">Update Price: </label>
                        <input type="text" name = "price" class="form-control" id="price">
                      </div>
                      <div style = "text-align: center;">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        @endif
      </div>
    </div>
  </div>
@endsection
