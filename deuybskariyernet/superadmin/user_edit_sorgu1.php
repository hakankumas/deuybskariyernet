<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_bilgisi');
$sorgu1->execute([]);
$user_info_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>