<?php
// Olmayan bir yer i�in bir cURL tan�t�c�s� olu�tural�m
include("baglan.php");
 $sorgu=mysql_query("SELECT * FROM konum");
 while ($sonuc = mysql_fetch_array($sorgu))
        {
            $k_mail = $sonuc['email'];
            $en = $sonuc['en'];
            $boy = $sonuc['boy'];     
		echo "</br>".$k_mail."-".$en."-".$boy."</br>";     
$ct = curl_init("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=$en,$boy&destinations=41.2367657,32.6738438");
curl_setopt($ct, CURLOPT_RETURNTRANSFER, true);

if(curl_exec($ct) === false)
{
    echo 'Curl hatas�: ' . curl_error($ct);
}
else
{
    echo '��lem hatas�z tamamland�';
}

// Tan�t�c�y� kapatal�m
curl_close($ct);
?>