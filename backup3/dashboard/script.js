
// prompted by your browser. If you see the error "The Geolocation service
// failed.", it means you probably did not give permission for the browser to
// locate you.

// modified from http://html5demos.com/file-api


function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
         center: {lat: 43.658757, lng: -79.3797355},
        zoom: 12,
        styles: [
            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
            {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
            {
                featureType: 'administrative.locality',
                elementType: 'labels.text.fill',
                stylers: [{color: '#d59563'}]
            },
            {
                featureType: 'poi',
                elementType: 'labels.text.fill',
                stylers: [{color: '#d59563'}]
            },
            {
                featureType: 'poi.park',
                elementType: 'geometry',
                stylers: [{color: '#263c3f'}]
            },
            {
                featureType: 'poi.park',
                elementType: 'labels.text.fill',
                stylers: [{color: '#6b9a76'}]
            },
            {
                featureType: 'road',
                elementType: 'geometry',
                stylers: [{color: '#38414e'}]
            },
            {
                featureType: 'road',
                elementType: 'geometry.stroke',
                stylers: [{color: '#212a37'}]
            },
            {
                featureType: 'road',
                elementType: 'labels.text.fill',
                stylers: [{color: '#9ca5b3'}]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry',
                stylers: [{color: '#746855'}]
            },
            {
                featureType: 'road.highway',
                elementType: 'geometry.stroke',
                stylers: [{color: '#1f2835'}]
            },
            {
                featureType: 'road.highway',
                elementType: 'labels.text.fill',
                stylers: [{color: '#f3d19c'}]
            },
            {
                featureType: 'transit',
                elementType: 'geometry',
                stylers: [{color: '#2f3948'}]
            },
            {
                featureType: 'transit.station',
                elementType: 'labels.text.fill',
                stylers: [{color: '#d59563'}]
            },
            {
                featureType: 'water',
                elementType: 'geometry',
                stylers: [{color: '#17263c'}]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.fill',
                stylers: [{color: '#515c6d'}]
            },
            {
                featureType: 'water',
                elementType: 'labels.text.stroke',
                stylers: [{color: '#17263c'}]
            }
        ]
    });
    var infoWindow = new google.maps.InfoWindow({map: map});

    var input = document.getElementById('address');
    var autocomplete = new google.maps.places.Autocomplete(input,{types: ['(cities)']});
    google.maps.event.addListener(address, 'place_changed', function(){
        var place = address.getPlace();
    })


    // Try HTML5 geolocation.
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
                lat: position.coords.latitude,
                lng: position.coords.longitude
            };

            infoWindow.setPosition(pos);
            infoWindow.setContent('Location found.');
            map.setCenter(pos);
            showCords(pos);
            runWorker(pos);

            var geocoder = new google.maps.Geocoder();
            document.getElementById('submit').addEventListener('click', function() {
                geocodeAddress(geocoder, map);


            });

            document.getElementById('resetLocation').addEventListener('click', function(){
                map.setCenter(pos);
                showCords(pos);
                runWorker(pos);
            });



        }, function() {
            handleLocationError(true, infoWindow, map.getCenter());
        });
    } else {
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
    }
}


function geocodeAddress(geocoder, resultsMap) {
    var address = document.getElementById('address').value;
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
            resultsMap.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: resultsMap,
                position: results[0].geometry.location
            });


            var splitCoord1 = marker.position.toString();
            splitCoord1 = splitCoord1.replace(/[()]/gi,"");
            splitCoord1 = splitCoord1.split(/,/, 2);

            //This will send the coordinates to the haversine Formula..

            var address_GC = {
                lat: Number(splitCoord1[0]),
                lng: Number(splitCoord1[1])
            };

            showCords(address_GC);
            runWorker(address_GC);

        } else {
            alert('Geocode was not successful for the following reason: ' + status);
        }
    });
}


/*function getUserInput(){
    var http = new XMLHttpRequest();
    http.open("POST", "test.json", true);
    http.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    var params = document.getElementById("new_Lat");
    http.send(params);
    http.onload = function() {
        alert(http.responseText);
    }

}*/

function newVals(){

    newLong = document.getElementById("newLong").value;
    newLat = document.getElementById("newLat").value;
    var NewPos = {
        lat: newLat,
        lng: newLong
    };

    map.setCenter(NewPos);
}






// WebWorker to do calculations of distances
function runWorker(pos){
    if (window.Worker) {


        //COMPARISON VARIABLES CHANGE THESE
        //Maybe make a function that returns to these vars..
        var laty2=43.653226; 
        var longy2=-79.38318429999998;         

        var distWorker = new Worker("worker.js");
        var message = { coordinates: {longitude:pos.lng, latitude:pos.lat, lng2:longy2, lat2:laty2} };

        distWorker.postMessage(message);

        distWorker.onmessage = function(e) {
            document.getElementById("calculation").innerHTML = e.data.result.toFixed(2)+" KM";

        };

    }


}

function showCords(pos){
    document.getElementById("userCoords").innerHTML = 'These are your Coordinates<br/>'
        +'Longitude: '+pos.lng+'<br/>'
        +'Latitude: '+pos.lat;

    //document.getElementById("userHReadable").innerHTML = 'Human Readable Format Here'; 
} 



function handleLocationError(browserHasGeolocation, infoWindow, pos) {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
                          'Error: The Geolocation service failed.' :
                          'Error: Your browser doesn\'t support geolocation.');


    /*setTimeout(function(){
        window.location.reload(1);
    }, 1000);
*/

}








