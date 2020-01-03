@extends('layouts.app')
@section('title')
   <h1 class="text-center">Delivery Page</h1>
@endsection

@section('content')

<style>
#map{
    width:100vh;
    height:75vh;
    margin-top: 2%;
}
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div id="map" class="align-self-center"></div>
    </div>
</div>
<h1 class ="text-center">You can find us here!</h1><br>

<h4 class="text-center"><a href="https://www.google.ca/maps/place/87+Narrow+Valley+Crescent,+Brampton,+ON+L6R+2M4/@43.7622904,-79.7296887,17z/data=!3m1!4b1!4m5!3m4!1s0x882b3d68b8509e45:0xe24220ea04befeb4!8m2!3d43.7622865!4d-79.7275">Here's our location!</a></h4>

<script src="{{asset('js/bingmaps.js')}}"></script>
<script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?key=AreDIHR9IPtkZEDm5vPRr0mTv5LWRyDGy3eNEDVxJ0VekBbdsbl550Gr3fwFPRn6&callback=loadMapScenario'></script>

@endsection
