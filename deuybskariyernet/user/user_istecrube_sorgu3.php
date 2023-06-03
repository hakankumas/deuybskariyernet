<?php

$sorgu3 = $db->prepare('SELECT * FROM pozisyon');
$sorgu3->execute([]);
$pozisyonlar = $sorgu3->fetchAll(PDO::FETCH_OBJ);

?>