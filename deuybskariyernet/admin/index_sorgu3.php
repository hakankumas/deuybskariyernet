<?php

$sorgu2 = $db->prepare('SELECT * FROM mezun_sayisi_bilgisi');
$sorgu2->execute();
$mezun_sayisi_bilgisi = $sorgu2->fetchAll(PDO::FETCH_OBJ);

?>