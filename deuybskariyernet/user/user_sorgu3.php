<?php

$sorgu3 = $db->prepare('SELECT * FROM kullanici_is_gecmisi WHERE ogrenci_no =?');
$sorgu3->execute([$ogrenci_no]);
$is_bilgisi_listesi = $sorgu3->fetchAll(PDO::FETCH_OBJ);

?>