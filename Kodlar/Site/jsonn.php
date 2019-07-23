<?php
include("baglan.php");
$sorgu1=mysql_query("SELECT en,boy FROM hastane");
while($sonuc1=mysql_fetch_array($sorgu1)){
$hen=$sonuc1['en'];
$hboy=$sonuc1['boy'];
echo $hen;
echo $hboy;
}
 $sorgu=mysql_query("SELECT * FROM konum");
 while ($sonuc = mysql_fetch_array($sorgu))
        {
            $k_mail = $sonuc['email'];
            $en = $sonuc['en'];
            $boy = $sonuc['boy'];     
		echo "</br>".$k_mail."-".$en."-".$boy."</br>";     
		
		$get_pickup_coords = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$en,$boy&destinations=$hen,$hboy";
		$pickup_data = file_get_contents($get_pickup_coords);
		$pickup_result = json_decode($pickup_data, true);   
		$sure= $pickup_result['rows'][0]['elements'][0]['duration']['text'];
		$km = $pickup_result['rows'][0]['elements'][0]['distance']['text'];
		echo $sure;
		echo "</br>km=".$km*1.609344;
 }
?>