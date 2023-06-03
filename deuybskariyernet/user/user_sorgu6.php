<?php

$sorgu6 = $db->prepare('SELECT * FROM kullanici_yetenek WHERE ogrenci_no =? ORDER BY kullanici_yetenek_id DESC');
$sorgu6->execute([$ogrenci_no]);
$yetenek_bilgisi_listesi = $sorgu6->fetchAll(PDO::FETCH_OBJ);

?>