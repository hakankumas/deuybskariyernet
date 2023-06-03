<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_sertifika WHERE ogrenci_no =? ORDER BY tarih DESC');
$sorgu1->execute([$ogrenci_no]);
$user_sertifika_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>