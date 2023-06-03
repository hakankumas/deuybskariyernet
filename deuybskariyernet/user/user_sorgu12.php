<?php

$sorgu12 = $db->prepare('SELECT * FROM kullanici_cocuk_bilgisi WHERE ogrenci_no =?');
$sorgu12->execute([$ogrenci_no]);
$cocuk_bilgisi_listesi = $sorgu12->fetchAll(PDO::FETCH_OBJ);

?>