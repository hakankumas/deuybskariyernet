<?php

$sorgu11 = $db->prepare('SELECT * FROM kullanici_es WHERE ogrenci_no =?');
$sorgu11->execute([$ogrenci_no]);
$evlilik_bilgisi_listesi = $sorgu11->fetchAll(PDO::FETCH_OBJ);

?>