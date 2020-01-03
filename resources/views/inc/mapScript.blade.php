<script type="text/javascript">

      navigator.geolocation.getCurrentPosition (function(position){
			latitude1 = position.coords.latitude;
			longitude1 = position.coords.longitude;

      var map;
      map = new GMaps({

      div: '#map',
      zoom: 12,
      lat: latitude1,
      lng: longitude1
    });

      map.addMarker({ lat: latitude1, lng: longitude1, icon: "pictures/hereIcon.png"});
    });

</script>
