<?php

$sorgu1 = $db->prepare("SELECT * FROM kullanici_bilgisi 
WHERE ogrenci_no NOT IN ('$ogrenci_no') 
AND kullanici_ad IS NOT NULL 
AND kullanici_soyad IS NOT NULL");
$sorgu1->execute([]);
$kullanici_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>