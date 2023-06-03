<?php

$sorgu5 = $db->prepare('SELECT * FROM kullanici_ilgi_alani WHERE ogrenci_no =? ORDER BY kullanici_ilgi_alani_id DESC');
$sorgu5->execute([$ogrenci_no]);
$ilgi_alani_bilgisi_listesi = $sorgu5->fetchAll(PDO::FETCH_OBJ);

?>