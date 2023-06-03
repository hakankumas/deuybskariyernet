<?php

$sorgu1 = $db->prepare('SELECT * FROM kurum_ilan_bilgisi');
$sorgu1->execute([]);
$user_ilan_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>