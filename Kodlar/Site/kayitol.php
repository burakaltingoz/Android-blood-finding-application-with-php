<?php
include("baglan.php");
$kullaniciadi=$_POST["kullaniciadi"];
$sifre=$_POST["sifre"];
$email=$_POST["email"];
$kan=$_POST["kan"];
$tel=$_POST["tel"];

    $sorgu=mysql_query("insert into kullanici (adsoy,email,sifre,kan,tel) values ('$kullaniciadi','$email','$sifre','$kan','$tel')");
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

?>