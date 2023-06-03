<?php

$sorgu4 = $db->prepare('SELECT * FROM kurum_sayisi_bilgisi');
$sorgu4->execute();
$kurum_sayisi_bilgisi = $sorgu4->fetchAll(PDO::FETCH_OBJ);

?>