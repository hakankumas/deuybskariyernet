<?php

$sorgu4 = $db->prepare('SELECT * FROM kullanici_sertifika WHERE ogrenci_no =? ORDER BY tarih DESC');
$sorgu4->execute([$ogrenci_no]);
$sertifika_bilgisi_listesi = $sorgu4->fetchAll(PDO::FETCH_OBJ);

?>