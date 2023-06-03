<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_yetenek WHERE ogrenci_no =? ORDER BY kullanici_yetenek_id DESC');
$sorgu1->execute([$ogrenci_no]);
$user_yetenek_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>