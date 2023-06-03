<?php

$sorgu1 = $db->prepare('SELECT * FROM kurum_duyurulari WHERE kurum_id =?');
$sorgu1->execute([$kurum_id]);
$kurum_duyuru_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>