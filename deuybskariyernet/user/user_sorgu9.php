<?php

$sorgu9 = $db->prepare('SELECT * FROM kullanici_referans WHERE ogrenci_no =? ORDER BY kullanici_referans_id DESC');
$sorgu9->execute([$ogrenci_no]);
$referans_bilgisi_listesi = $sorgu9->fetchAll(PDO::FETCH_OBJ);

?>