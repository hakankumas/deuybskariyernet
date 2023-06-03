<?php

$sorgu1 = $db->prepare('SELECT * FROM kurum_etkinlik_bilgisi');
$sorgu1->execute([]);
$user_etkinlik_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>