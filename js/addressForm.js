function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 43.6578767, lng: -79.3804561},
          streetViewControl: false, 
          zoom: 17
        });

        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var geocoder = new google.maps.Geocoder();
        var infowindow = new google.maps.InfoWindow();
        
        
        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
        
        autocomplete.addListener('place_changed', function() {
          
          var place = autocomplete.getPlace();


          if (!place.geometry) {
            return;
          }

          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }

          // Set the position of the marker using the place ID and location.
          marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location
            
          });
          marker.setVisible(true);

          console.log(place.geometry.location.lat());
          console.log(place.geometry.location.lng());
          // infowindowContent.children['place-name'].textContent = place.name;
          // infowindowContent.children['place-id'].textContent = place.place_id;
          document.getElementById("place-id").placeholder = place.place_id;
          

          // infowindowContent.children['place-address'].textContent = place.formatted_address;
          // infowindow.open(map, marker);
          // geocodePlaceId(geocoder, map, infowindow, place.place_id);
          infowindow.close();

        });
  }


function stopRKey(evt) { 
  var evt = (evt) ? evt : ((event) ? event : null); 
  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
} 

document.onkeypress = stopRKey; 