function initMap() {
    //initilize the map to Ryerson coordinates
    var pos = {
        lat: 43.6578767,
        lng: -79.3804561
    };
    //Draw out the location
    setMap(pos);
    
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        };
        setMap(pos);
        
        }, function() {
        handleLocationError();
        });
    } 
    else {
    // Browser doesn't support Geolocation
    handleLocationError();
    }
};
function handleLocationError() {
    // document.getElementById('locationFeed').innerHTML="<p>Location is not enabled </p>"
};

function setMap(pos){
    var map = new google.maps.Map(
    document.getElementById('map'), {
        //default to initilize the location
        center: {lat: pos.lat, lng: pos.lng},
        zoom: 17
    }
    );
    var infoWindow = new google.maps.InfoWindow({map: map});
    //Place marker
    infoWindow.setPosition(pos);
    infoWindow.setContent('Location found');
    map.setCenter(pos);


    console.log("Latitude: " + pos.lat +" Longitude:" +pos.lng);
  
};

