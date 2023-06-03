<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_sikayet WHERE ogrenci_no =?');
$sorgu1->execute([$ogrenci_no]);
$user_sikayet_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>