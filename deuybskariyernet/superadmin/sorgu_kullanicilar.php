<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_bilgisi_index_sayfasi');
$sorgu1->execute([]);
$user_info_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>