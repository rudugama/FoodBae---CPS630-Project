//<![CDATA[
var map;
var markers = [];
var infoWindow;
var locationSelect;
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
    map = new google.maps.Map(
    document.getElementById('map'), {
        //default to initilize the location
        center: {lat: pos.lat, lng: pos.lng},
        zoom: 17
    }
    );
    searchLocationsNear(pos);
    infoWindow = new google.maps.InfoWindow({map: map});
    //Place marker
    infoWindow.setPosition(pos);
    infoWindow.setContent('Your location');
    map.setCenter(pos);


    console.log("Latitude: " + pos.lat +" Longitude:" +pos.lng);
    
    $('.list-group li').hover(function(){
       var markerNum = $(this).index();
       google.maps.event.trigger(markers[markerNum],'click');
       map.setCenter(new google.maps.LatLng($(this).attr('lat'),  $(this).attr('lng')));
    });
    // //Drop Menu
    // locationSelect = document.getElementById("locationSelect");
    // locationSelect.onchange = function() {
    // var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
    // if (markerNum != "none"){
    //     google.maps.event.trigger(markers[markerNum], 'click');
    // }
    // };  
};
//@center: lat, lng
function searchLocationsNear(center) {
//  clearLocations();

    // var radius = document.getElementById('radiusSelect').value;
    var searchUrl = 'phpsqlsearch_genxml.php?lat=' + center.lat + '&lng=' + center.lng + '&radius=' + 2; //radius
    downloadUrl(searchUrl, function(data) {
    var xml = parseXml(data);
    var markerNodes = xml.documentElement.getElementsByTagName("marker");
    var bounds = new google.maps.LatLngBounds();
    for (var i = 0; i < markerNodes.length; i++) {
        var name = markerNodes[i].getAttribute("name");
        var address = markerNodes[i].getAttribute("address");
        var distance = parseFloat(markerNodes[i].getAttribute("distance"));
        var latlng = new google.maps.LatLng(
            parseFloat(markerNodes[i].getAttribute("lat")),
            parseFloat(markerNodes[i].getAttribute("lng")));

        createOption(name, distance, i);
        createMarker(latlng, name, address);
        bounds.extend(latlng);
    }
    // map.fitBounds(bounds);
    // locationSelect.style.visibility = "visible";
    // locationSelect.onchange = function() {
    //     var markerNum = locationSelect.options[locationSelect.selectedIndex].value;
    //     google.maps.event.trigger(markers[markerNum], 'click');
    // };
    });
}

function createMarker(latlng, name, address) {
    var html = "<b>" + name + "</b> <br/>" + address;
    var marker = new google.maps.Marker({
    map: map,
    position: latlng
    });
    google.maps.event.addListener(marker, 'click', function() {
    infoWindow.setContent(html);
    infoWindow.open(map, marker);
    });
    markers.push(marker);
}

function createOption(name, distance, num) {
    var option = document.createElement("option");
    option.value = num;
    option.innerHTML = name + "(" + distance.toFixed(1) + ")";
    // locationSelect.appendChild(option);
}

// function searchLocations() {
//      var address = document.getElementById("addressInput").value;
//      var geocoder = new google.maps.Geocoder();
//      geocoder.geocode({address: address}, function(results, status) {
//        if (status == google.maps.GeocoderStatus.OK) {
//         searchLocationsNear(results[0].geometry.location);
//        } else {
//          alert(address + ' not found');
//        }
//      });
//    }

function downloadUrl(url, callback) {
    var request = window.ActiveXObject ?
        new ActiveXObject('Microsoft.XMLHTTP') :
        new XMLHttpRequest;

    request.onreadystatechange = function() {
    if (request.readyState == 4) {
        request.onreadystatechange = doNothing;
        callback(request.responseText, request.status);
    }
    };

    request.open('GET', url, true);
    request.send(null);
}

function parseXml(str) {
    if (window.ActiveXObject) {
    var doc = new ActiveXObject('Microsoft.XMLDOM');
    doc.loadXML(str);
    return doc;
    } else if (window.DOMParser) {
    return (new DOMParser).parseFromString(str, 'text/xml');
    }
}

function doNothing() {}
$(document).ready(function(){
    $('#popup').on('click',function(){
        // data-toggle=\"modal\" data-target=\"#popup\"
      $('#modal_header #desc').val($('.list-group li').attr('table_name')); 
      $('.list-group li a').data('data-toggle','modal');
      $('.list-group li a').data('data-target','popup');
    });
});