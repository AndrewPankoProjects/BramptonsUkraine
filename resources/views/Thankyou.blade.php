@extends('layouts.app')
@section('title')
   <h1 class="text-center">Thank you!</h1>
@endsection

@section('content')
<div class="text-center thank-you-section">
     <h1>Thank you for <br> Your Order!</h1>
     <div>
         <a role ="button" class = "btn btn-success" href="{{ url('/') }}" type="button">Return to homepage</a>
     </div>
 </div>

@endsection
