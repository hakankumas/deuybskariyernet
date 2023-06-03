<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_is_gecmisi WHERE ogrenci_no =?');
$sorgu1->execute([$ogrenci_no]);
$user_istecrubesi_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>