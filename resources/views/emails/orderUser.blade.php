<!DOCTYPE html>
<html>
<head>
    <title>Purchare Order Email</title>
</head>
<!--//"StAuth10065: I Andrew Panko, 000394436 certify that this material is my original work. No other person's work has been used without due acknowledgement. I have not made my work available to anyone else."-->
<body>
<h2>Here's your purchase order:</h2>
<br/>
<div>
  <div>
      <ul>
        @foreach($products as $product)
        <li>
          <span>Quantity: {{$product['qty']}}</span>
          <strong>Item: {{$product['item']['title']}}</strong>
          <span>Price: {{$product['price']}}</span>
        </li>
        @endforeach
      </ul>
  </div>
</div>
<div>
  <div >
      <strong>Total: {{$totalPrice}}</strong>
  </div>
</div>
<br/>

</body>

</html>
