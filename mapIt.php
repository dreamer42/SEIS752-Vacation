<?php
require("config.php");
ini_set('display_errors', 'on'); error_reporting(-1);

    $startingLocation = $_GET['startingLocation'];
    $endingLocation = $_GET['endingLocation'];
    echo '$startingLocation' ; echo '$endingLocation'; echo '</br>';
?>
<!--  Mike's Example -->
<!-- Basic for code from https://developers.google.com -->

<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIUrVy_InedXDCqKn3QsvuqGDwYdziiGI">
</script>

<script>

var directionsDisplay;
var directionsService = new google.maps.DirectionsService();
var map;

function initialize() {
        if(directionsDisplay){
            directionsDisplay.setMap(null);
        }
  directionsDisplay = new google.maps.DirectionsRenderer();
  var mapOptions = {
  }
  map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
  document.getElementById("directionsPanel").innerHTML="";
  directionsDisplay.setMap(map);
  directionsDisplay.setPanel(document.getElementById("directionsPanel"));
}

function calcRoute() {

  //var start = document.getElementById("origin").value;
  //var end = document.getElementById("destination").value;
  var start = <?php$ $startingLocation? >;
  var end = <?php$ $endingLocationingLocation? >;
  var request = {
    origin:start,
    destination:end,
    travelMode: google.maps.TravelMode.DRIVING
  };
  var directionsService = new google.maps.DirectionsService();
  directionsService.route(request, function(response, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      directionsDisplay.setDirections(response);
    }
  });
}

function loadTravelResults()
{
	initialize();
	calcRoute();
	calculateDistances();
}

function calculateDistances() {
  var service = new google.maps.DistanceMatrixService();
  service.getDistanceMatrix(
    {
      origins: [origin.value],
      destinations: [destination.value],
      travelMode: google.maps.TravelMode.DRIVING,
      unitSystem: google.maps.UnitSystem.IMPERIAL
    }, callback);
}

function callback(response, status) {
  if (status != google.maps.DistanceMatrixStatus.OK) {
    alert('Error was: ' + status);
  } else {
    var origins = response.originAddresses;
    var destinations = response.destinationAddresses;
    var distanceResult = document.getElementById('distanceResult');
    distanceResult.innerHTML = '';

    for (var i = 0; i < origins.length; i++) {
      var results = response.rows[i].elements;
      if(results[0].status == 'OK'){
		  for (var j = 0; j < results.length; j++) {
			distanceResult.innerHTML += 'Traveling from ' +origins[i] + ' to ' + destinations[j] + '<br>'
				+ 'Distance covered:' + results[j].distance.text + '<br>'
				+ 'Travel time:     ' + results[j].duration.text + '<br>';
		  }
      } else {
      	distanceResult.innerHTML += 'unable to calculate, be sure to have a valid origin and destination';
      }
    }
  }
}

</script>

<!DOCTYPE html>
<html>
<head>
<title>Travel with Google APIs</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
</head>

<body>
  <div class="container_12">
    <h2>Goal: Get Info for Traveling between Two Places</h2>
	<form id="mainForm" name="mainForm">
	      <label>Origin:
	        <input type="text" name="origin" id="origin" required="required" placeholder="starting place" value="" />
	      </label>
	      <label>Destination:
	        <input type="text" name="destination" id="destination" required="required" placeholder="ending place"  value="" />
	      </label>
	      <label>
	        <button type="button" onclick="loadTravelResults()">Calculate</button>
	      </label>
    </form>

    <br>

  </div>
    <div id="distanceResult" ></div>
    <br>
    <div id="map-canvas" style="float:left;width:70%; height:80%"></div>
	<div id="directionsPanel" style="float:right;width:30%;height:80%"></div>
</body>
</html>