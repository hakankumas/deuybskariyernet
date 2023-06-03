<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_sosyalmedya_bilgisi WHERE ogrenci_no =?');
$sorgu1->execute([$ogrenci_no]);
$user_sosyalmedya_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>