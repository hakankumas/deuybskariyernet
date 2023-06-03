<?php

$sorgu1 = $db->prepare('SELECT * FROM pozisyon');
$sorgu1->execute();
$pozisyonlar = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>