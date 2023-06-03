<?php

$sorgu1 = $db->prepare('SELECT * FROM kurum_sikayet_bilgisi');
$sorgu1->execute([]);
$kurum_sikayet_bilgisi_oku_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>