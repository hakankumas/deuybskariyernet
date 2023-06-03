<?php

$sorgu4 = $db->prepare('SELECT * FROM kullanicicalismadurumu ORDER BY kullanicicalismadurumu_ad ASC');
$sorgu4->execute([]);
$kullanicicalismadurumlari = $sorgu4->fetchAll(PDO::FETCH_OBJ);

?>