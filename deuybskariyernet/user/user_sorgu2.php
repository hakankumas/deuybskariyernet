<?php

$sorgu2 = $db->prepare('SELECT * FROM kullanici_egitim_gecmisi WHERE ogrenci_no =?');
$sorgu2->execute([$ogrenci_no]);
$egitim_bilgisi_listesi = $sorgu2->fetchAll(PDO::FETCH_OBJ);

?>