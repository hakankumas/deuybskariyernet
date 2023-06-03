<?php

$sorgu7 = $db->prepare('SELECT * FROM kullanici_sosyalmedya_bilgisi WHERE ogrenci_no =? ORDER BY sosyalmedya_platform ASC');
$sorgu7->execute([$ogrenci_no]);
$sosyalmedya_bilgisi_listesi = $sorgu7->fetchAll(PDO::FETCH_OBJ);

?>