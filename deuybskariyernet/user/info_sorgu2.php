<?php

$sorgu2 = $db->prepare('SELECT * FROM ulke ORDER BY ulke_ad ASC');
$sorgu2->execute([]);
$ulkeler = $sorgu2->fetchAll(PDO::FETCH_OBJ);

?>