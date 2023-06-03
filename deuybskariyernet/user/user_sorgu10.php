<?php

$sorgu10 = $db->prepare("SELECT kullanici_onyazi_id, ogrenci_no, kullanici_onyazi_metin
FROM kullanici_onyazi
HAVING kullanici_onyazi_id =(SELECT MAX(kullanici_onyazi_id)
FROM kullanici_onyazi
WHERE ogrenci_no ='$ogrenci_no')");
$sorgu10->execute();
$onyazi_bilgisi_listesi = $sorgu10->fetchAll(PDO::FETCH_OBJ);


?>