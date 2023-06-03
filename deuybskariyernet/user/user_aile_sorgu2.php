<?php

$sorgu2 = $db->prepare('SELECT * FROM kullanici_cocuk_bilgisi WHERE ogrenci_no =?');
$sorgu2->execute([$ogrenci_no]);
$user_cocuk_bilgisi_listesi = $sorgu2->fetchAll(PDO::FETCH_OBJ);

?>