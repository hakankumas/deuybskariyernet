<?php

$sorgu6 = $db->prepare('SELECT * FROM staj_ilani_sayisi_bilgisi');
$sorgu6->execute();
$staj_ilani_sayisi_bilgisi = $sorgu6->fetchAll(PDO::FETCH_OBJ);

?>