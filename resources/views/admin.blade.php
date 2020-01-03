@extends('layouts.app')

@section('title')
   <h1 class="text-center">Admin Page</h1>
@endsection

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>


<script src="{{asset('js/adminScript.js')}}"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="row">
              <div class="col-sm">
                  <div class="card">
                    <div class="card-header">User List</div>
                    <div class="card-body">
                    <table id ="data" class="display">
                    <thead>
                      <tr>
                        <th scope="col">Remove Admin</th>
                        <th scope="col">Give Admin</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Id</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Account Status</th>
                      </tr>
                    </thead>
                    <tbody id ="requestData"></tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-sm">
                <div class="card">
                  <div class="card-header">Contact Us Issue List</div>
                  <div class="card-body">
                  <table id = "issues" class="display">
                  <thead>
                    <tr>
                      <th scope="col">Delete</th>
                      <th scope="col">Issue Id</th>
                      <th scope="col">Issue Subject</th>
                      <th scope="col">Issue Message</th>
                      <th scope="col">Created At</th>
                      <th scope="col">Issue Email</th>
                    </tr>
                  </thead>
                  <tbody id ="requestIssues"></tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-sm">
              <div class="card">
                <div class="card-header">Survey List</div>
                <div class="card-body">
                <table  id = "surveys" class="display">
                <thead>
                  <tr>
                    <th scope="col">Delete</th>
                    <th scope="col">Survey Id</th>
                    <th scope="col">Answer 1</th>
                    <th scope="col">Answer 2</th>
                    <th scope="col">Feedback</th>
                    <th scope="col">Username</th>
                  </tr>
                </thead>
                <tbody id ="requestSurvey"></tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-sm">
            <div class="card">
              <div class="card-header">Outstanding Orders List</div>
              <div class="card-body">
              <table  id = "orders" class="display">
              <thead>
                <tr>
                  <th scope="col">Complete</th>
                  <th scope="col">Date</th>
                  <th scope="col">Order Number</th>
                  <th scope="col">Username</th>
                  <th scope="col">Perogies Qty</th>
                  <th scope="col">Beet Soup Qty</th>
                  <th scope="col">Cabbage Rolls Qty</th>
                  <th scope="col">Total</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody id ="requestOrders"></tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="col-sm">
          <div class="card">
            <div class="card-header">Tracked Orders List</div>
            <div class="card-body">
            <table  id = "tracked" class="display">
            <thead>
              <tr>
                <th scope="col">Order Id</th>
                <th scope="col">Tracking Id</th>
                <th scope="col">Rice bag(s)</th>
                <th scope="col">Cabbage(s)</th>
                <th scope="col">Beet(s)</th>
                <th scope="col">Potato(s)</th>
                <th scope="col">Flour Bag(s)</th>
                <th scope="col">Ground Beef (lbs)</th>
                <th scope="col">Tomato Juice (Bottles)</th>
                <th scope="col">Water(L)</th>
                <th scope="col">Blocks of Cheese</th>
              </tr>
            </thead>
            <tbody id ="requestTracker"></tbody>
          </table>
        </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>
@endsection
