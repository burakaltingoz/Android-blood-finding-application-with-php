<?php
    $sunucu="localhost";
    $kullanici="-----";
    $sifre="-----";
    $veritabani="-----";
 
   if (@mysql_connect($sunucu,$kullanici,$sifre)==false){
      $mesaj="<b>Hata</b>: Ba�lant� ba�ar�s�z!<br>";
      $mesaj.="<b>Hata a��klamas�</b>: ".mysql_error();
      die($mesaj);
   }
 
   if (@mysql_select_db($veritabani)==false){
      $mesaj="<b>Hata</b>: $veritabani veritaban� se�ilemedi!<br>";
      $mesaj.="<b>Hata a��klamas�</b>: ".mysql_error();
      die($mesaj);
   }
     
    // kullan�lacak karakter seti bildiriliyor
    mysql_query("set names utf8"); 
     ?>