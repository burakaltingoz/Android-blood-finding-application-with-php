<?php
include("baglan.php");
 $sorgu=mysql_query("SELECT * FROM konum");
 while ($sonuc = mysql_fetch_array($sorgu))
        {
            $k_mail = $sonuc['email'];
            $en = $sonuc['en'];
            $boy = $sonuc['boy'];     
		echo "</br>".$k_mail."-".$en."-".$boy."</br>";     
		$url ="https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$en,$boy&destinations=41.2367657,32.6738438";

		$ch = curl_init();
		// Disable SSL verification
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// Will return the response, if false it print the response
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Set the url
		curl_setopt($ch, CURLOPT_URL,$url);
		// Execute
		curl_exec($ch);
		// Closing
		curl_close($ch);

		$result_array=json_decode($result);

		//print_r();
		echo "<pre>";
		print_r($result_array->rows[0]->elements[0]->duration->text);
		print_r($result_array->rows[0]->elements[0]->distance->text);
		$km=$result_array->rows[0]->elements[0]->distance->text;
		echo "</br>km=".$km*1.609344;
 }
?>