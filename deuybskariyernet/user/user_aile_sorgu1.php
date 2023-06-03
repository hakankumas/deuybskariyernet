<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_es WHERE ogrenci_no =?');
$sorgu1->execute([$ogrenci_no]);
$user_es_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>