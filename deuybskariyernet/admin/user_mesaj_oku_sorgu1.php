<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_sikayet_bilgisi');
$sorgu1->execute([]);
$user_sikayet_bilgisi_oku_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>