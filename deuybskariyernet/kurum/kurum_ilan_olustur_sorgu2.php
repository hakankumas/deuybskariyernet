<?php

$sorgu2 = $db->prepare('SELECT * FROM ilanturu');
$sorgu2->execute();
$ilanturleri = $sorgu2->fetchAll(PDO::FETCH_OBJ);

?>