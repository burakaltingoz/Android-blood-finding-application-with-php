<?php
$get_pickup_coords = "https://maps.googleapis.com/maps/api/geocode/json?&address=cv57bt&sensor=false";
$pickup_data = file_get_contents($get_pickup_coords);
$pickup_result = json_decode($pickup_data, true);   
$lat = $pickup_result['results'][0]['geometry']['location']['lat'];
$long = $pickup_result['results'][0]['geometry']['location']['lng'];
echo $lat;
?>