@extends('layouts.app')

@section('title')
   <h1 class="text-center">Welcome to all your Ukrainian Cooking Needs!</h1>
@endsection

@section('content')
  <div class="jumbotron" style="position: absolute;
    width: 100%;
    background: rgba(255, 255, 255, 0.5);">
    <div class="container">
      <h1 class="display-4">How it all Started...</h1>
      <p class="lead text-left">Ukrainian cooking is more than just food, its all about the love, passion, and culture that's infused in the food
      that makes it taste so good!</p>

      <p class="lead text-left">
        The story behind it all from my family is that generations upon generations have been cooking classic traditional
        Ukrainian food, that is finally being released to the public! My Mother Luba, Panko has always enjoyed cooking for
        the family and seeing the smiles of others from the food delivered to the table. No one can beat the traditional Ukrainian
        food Mama makes!
      </p>
      <p class="lead text-left">
        The most famous and sacred recipe that my Mother has  recieved from her Mother and so on has been her bursting with flavour
        Cabbage Rolls. Whenever its around Christmas time, everyone asks for these Cabbage Rolls, and in fact family has also asked to buy them (For real!)
        and my personal opinion these Cabbage Rolls aren't only filled with ground beef but with generations of love, warmth, and most of all memories.
      </p>

    </div>
  </div>

  <img src="{{asset('pictures/Ukraine_Background.jpg')}}" style = "background-size: 100% 100%;" alt ="Picture of Ukraine">

@endsection
