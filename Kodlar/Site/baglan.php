<?php
    $sunucu="localhost";
    $kullanici="-----";
    $sifre="-----";
    $veritabani="-----";
 
   if (@mysql_connect($sunucu,$kullanici,$sifre)==false){
      $mesaj="<b>Hata</b>: Baðlantý baþarýsýz!<br>";
      $mesaj.="<b>Hata açýklamasý</b>: ".mysql_error();
      die($mesaj);
   }
 
   if (@mysql_select_db($veritabani)==false){
      $mesaj="<b>Hata</b>: $veritabani veritabaný seçilemedi!<br>";
      $mesaj.="<b>Hata açýklamasý</b>: ".mysql_error();
      die($mesaj);
   }
     
    // kullanýlacak karakter seti bildiriliyor
    mysql_query("set names utf8"); 
     ?>