<?php

$sorgu1 = $db->prepare('SELECT * FROM kurum_sosyalmedya_bilgisi WHERE kurum_id =?');
$sorgu1->execute([$kurum_id]);
$kurum_sosyalmedya_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>