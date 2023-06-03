<?php

$sorgu3 = $db->prepare('SELECT * FROM sektor ORDER BY sektor_ad ASC');
$sorgu3->execute();
$sektorler = $sorgu3->fetchAll(PDO::FETCH_OBJ);

?>