<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_egitim_gecmisi WHERE ogrenci_no =?');
$sorgu1->execute([$ogrenci_no]);
$user_egitim_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>