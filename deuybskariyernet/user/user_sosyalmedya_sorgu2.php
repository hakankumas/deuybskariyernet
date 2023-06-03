<?php

$sorgu2 = $db->prepare('SELECT * FROM sosyalmedya ORDER BY sosyalmedya_platform ASC');
$sorgu2->execute([]);
$sosyalmedyalar = $sorgu2->fetchAll(PDO::FETCH_OBJ);

?>