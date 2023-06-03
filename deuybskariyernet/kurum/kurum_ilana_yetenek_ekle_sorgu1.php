<?php

$sorgu1 = $db->prepare('SELECT * FROM kurum_ilanlari_yetenek_bilgisi WHERE ilan_id =?');
$sorgu1->execute([$ilan_id]);
$kurum_ilanlari_yetenek_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>