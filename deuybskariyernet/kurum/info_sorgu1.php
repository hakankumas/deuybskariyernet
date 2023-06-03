<?php

$sorgu2 = $db->prepare('SELECT * FROM sehir ORDER BY sehir_ad ASC');
$sorgu2->execute();
$sehirler = $sorgu2->fetchAll(PDO::FETCH_OBJ);

?>