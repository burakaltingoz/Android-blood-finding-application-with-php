<?php
include("baglan.php");
$kullaniciadi=$_POST["kullaniciadi"];
$enlem=$_POST["enlem"];
$boylam=$_POST["boylam"];
$email=$_POST["email"];

   $query = mysql_query("SELECT * FROM konum WHERE email='$email' "); // tc numarasina sahip kullanici varmi diye bak.

    if (mysql_affected_rows()){ // eðer varsa güncelle

        $query = mysql_query("UPDATE konum SET en='$enlem',boy='$boylam' WHERE email='$email' ");

    }else{ // yoksa ekle
        $sorgu=mysql_query("INSERT into konum (email,en,boy) values ('$email','$enlem','$boylam')");
    if($sorgu)
    {
    $sonuc=array("olumlu"=>"kayýt baþarýyla tamamlandý");
    echo json_encode($sonuc);
    }
    else 
    {
     $sonuc=array("olumsuz"=>"kayýt olunurken bir hata oluþtu");
     echo json_encode($sonuc);
    }  
    }

?>