<?php 
include("baglan.php"); 
$id=$_GET["id"]; // veriyi normal þekilde aldýktan sonra  
$id = mysql_real_escape_string($id); // mysql_real_escape_string 'den geçirilerek SQL injection Saldýrýlarýný Önliyebilirsiniz. 

$sil = mysql_query("DELETE FROM kullanici WHERE id='$id'"); //burada mysql'dana veriyi sildik. Ancak verinin silinip silinmediðini öðrenmek için bir deðiþkene atadýk 
  
if($sil)
echo "Veri Baþarýyla Silindi";                                       //Veri silme iþlemi baþarýlýysa yapýlacak iþlem 
else 
echo "Veri Silinemedi. Böyle bir veri olmayabilir.";          //Veri silinemediyse yapýlacak iþlem 
 
?>