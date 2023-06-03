<?php

$sorgu8 = $db->prepare('SELECT * FROM kullanici_proje WHERE ogrenci_no =? ORDER BY tarih DESC');
$sorgu8->execute([$ogrenci_no]);
$proje_bilgisi_listesi = $sorgu8->fetchAll(PDO::FETCH_OBJ);

?>