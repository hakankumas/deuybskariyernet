<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_ilgi_alani WHERE ogrenci_no =?');
$sorgu1->execute([$ogrenci_no]);
$user_ilgi_alani_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>