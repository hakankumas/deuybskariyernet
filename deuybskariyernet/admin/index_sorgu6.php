<?php

$sorgu5 = $db->prepare('SELECT * FROM is_ilani_sayisi_bilgisi');
$sorgu5->execute();
$is_ilani_sayisi_bilgisi = $sorgu5->fetchAll(PDO::FETCH_OBJ);

?>