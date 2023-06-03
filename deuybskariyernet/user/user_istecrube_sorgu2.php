<?php

$sorgu2 = $db->prepare('SELECT * FROM sektor ORDER BY sektor_ad');
$sorgu2->execute([]);
$sektorler = $sorgu2->fetchAll(PDO::FETCH_OBJ);

?>