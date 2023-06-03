<?php

$sorgu4 = $db->prepare('SELECT * FROM sehir');
$sorgu4->execute([]);
$sehirler = $sorgu4->fetchAll(PDO::FETCH_OBJ);

?>