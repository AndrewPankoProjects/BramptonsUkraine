@extends('layouts.app')

@section('title')
   <h1 class="text-center">Order History</h1>
   <div style="text-align: center;">
   <a role="button" href="{{url('/account')}}" class="btn btn-outline-primary btn-lg">Back to Account Details</a>
   </div>
@endsection
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>

<script src="{{asset('js/orderHistory.js')}}"></script>

  <table id ="userorder" class="table">
    <thead>
      <tr>
        <th scope="col">Date:</th>
        <th scope="col">Order Number:</th>
        <th scope="col">Total:</th>
        <th scope="col">Perogies Order:</th>
        <th scope="col">Borstch Order:</th>
        <th scope="col">Cabbage Rolls Order:</th>
        <th scope="col">Order Status:</th>
      </tr>
    </thead>
    <tbody id="requestHistory"></tbody>
  </table>

@endsection
