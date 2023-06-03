<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_bilgisi_index_sayfasi WHERE ogrenci_no =?');
$sorgu1->execute([$ogrenci_no]);
$kullanici_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>