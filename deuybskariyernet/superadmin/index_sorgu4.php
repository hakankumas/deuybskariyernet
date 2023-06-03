<?php

$sorgu3 = $db->prepare('SELECT * FROM ogrenci_sayisi_bilgisi');
$sorgu3->execute();
$ogrenci_sayisi_bilgisi = $sorgu3->fetchAll(PDO::FETCH_OBJ);

?>