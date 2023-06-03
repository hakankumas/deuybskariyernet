<?php

$sorgu1 = $db->prepare('SELECT * FROM kurum_duyurulari ORDER BY kurumtokullanici_duyuru_id DESC');
$sorgu1->execute([]);
$kurum_duyuru_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>