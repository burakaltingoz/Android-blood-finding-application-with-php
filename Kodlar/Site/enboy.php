<?php
include("baglan.php");
$kullaniciadi=$_POST["kullaniciadi"];
$enlem=$_POST["enlem"];
$boylam=$_POST["boylam"];
$email=$_POST["email"];

   $query = mysql_query("SELECT * FROM konum WHERE email='$email' "); // tc numarasina sahip kullanici varmi diye bak.

    if (mysql_affected_rows()){ // e�er varsa g�ncelle

        $query = mysql_query("UPDATE konum SET en='$enlem',boy='$boylam' WHERE email='$email' ");

    }else{ // yoksa ekle
        $sorgu=mysql_query("INSERT into konum (email,en,boy) values ('$email','$enlem','$boylam')");
    if($sorgu)
    {
    $sonuc=array("olumlu"=>"kay�t ba�ar�yla tamamland�");
    echo json_encode($sonuc);
    }
    else 
    {
     $sonuc=array("olumsuz"=>"kay�t olunurken bir hata olu�tu");
     echo json_encode($sonuc);
    }  
    }

?>