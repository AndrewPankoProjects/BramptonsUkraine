
const zoomLevel = 12;
var map = null;

// Success callback for getCurrentPosition
function successCallback(position){

    let pos = position.coords;

    let latitude = pos.latitude;
    let longitude = pos.longitude;

    //load map here
    map = new Microsoft.Maps.Map($("#map")[0],
    {
        center: new Microsoft.Maps.Location(latitude, longitude),
        mapTypeId : Microsoft.Maps.MapTypeId.roadmap,
        zoom: zoomLevel
    });
    let center = map.getCenter();

    //add the user's current location as the pushpin
    let defaultPushpin = new Microsoft.Maps.Pushpin(center,
    {
        color: "#94c5cc",
        title: "You"
    });

    defaultPushpin.metadata = {userLocation : true};

    //add an info box for the user location pushpin
    let defaultInfobox = new Microsoft.Maps.Infobox(center,
    {
        title: "Current Location",
        description: "lat: " + latitude  + "long: " + longitude,
        visible : false
    });

    defaultInfobox.metadata = {userLocation : true};

    defaultInfobox.setMap(map);
    Microsoft.Maps.Events.addHandler(defaultPushpin, 'click', function(){
        defaultInfobox.setOptions({visible : true});
    });
    map.entities.push(defaultPushpin);

}

// Failure callback for getCurrentPosition
function failureCallback(error){
    let errorMessage = "";
    switch(error.code){
        case error.PERMISSION_DENIED:
            errorMessage = "User denied the request for Geolocation";
            break;
        case error.POSITION_UNAVAILABLE:
            errorMessage = "Location information is unavailable";
            break;
        case error.TIMEOUT:
            errorMessage = "The request to get user location timed out";
            break;
        case error.UNKNOWN_ERROR:
            errorMessage = "An unknown error occured";
            break;
        default:
            break;
    }
    //home address
    const latitude = 43.762190;
    const longitude = -79.727430;
    //load map here
    console.log(errorMessage);
    map = new Microsoft.Maps.Map($("#map")[0],
    {
        center: new Microsoft.Maps.Location(latitude, longitude),
        mapTypeId : Microsoft.Maps.MapTypeId.aerial,
        zoom: zoomLevel
    });

}

// Callback provided to bing map api
function loadMapScenario(){
    //success or failure callback will set up map for the user
    navigator.geolocation.getCurrentPosition(successCallback, failureCallback);
}
