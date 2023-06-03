<?php

$sorgu1 = $db->prepare('SELECT * FROM sosyalmedya');
$sorgu1->execute();
$sosyalmedyalar = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>