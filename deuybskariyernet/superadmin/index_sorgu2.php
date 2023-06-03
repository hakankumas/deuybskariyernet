<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_sayisi_bilgisi');
$sorgu1->execute();
$kullanici_sayisi_bilgisi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>