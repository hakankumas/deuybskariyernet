<?php

$sorgu3 = $db->prepare('SELECT * FROM sehir ORDER BY sehir_ad ASC');
$sorgu3->execute([]);
$sehirler = $sorgu3->fetchAll(PDO::FETCH_OBJ);

?>