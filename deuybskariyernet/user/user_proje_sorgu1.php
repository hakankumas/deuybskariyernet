<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_proje WHERE ogrenci_no =? ORDER BY tarih DESC');
$sorgu1->execute([$ogrenci_no]);
$user_proje_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>