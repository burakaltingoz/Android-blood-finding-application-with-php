<?php 
include("baglan.php"); 
$id=$_GET["id"]; // veriyi normal �ekilde ald�ktan sonra  
$id = mysql_real_escape_string($id); // mysql_real_escape_string 'den ge�irilerek SQL injection Sald�r�lar�n� �nliyebilirsiniz. 

$sil = mysql_query("DELETE FROM kullanici WHERE id='$id'"); //burada mysql'dana veriyi sildik. Ancak verinin silinip silinmedi�ini ��renmek i�in bir de�i�kene atad�k 
  
if($sil)
echo "Veri Ba�ar�yla Silindi";                                       //Veri silme i�lemi ba�ar�l�ysa yap�lacak i�lem 
else 
echo "Veri Silinemedi. B�yle bir veri olmayabilir.";          //Veri silinemediyse yap�lacak i�lem 
 
?>