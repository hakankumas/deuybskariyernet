<?php

$sorgu2 = $db->prepare('SELECT * FROM kurum_sosyalmedya_bilgisi WHERE kurum_id =?');
$sorgu2->execute([$kurum_id]);
$kurumun_sosyalmedya_bilgisi_listesi = $sorgu2->fetchAll(PDO::FETCH_OBJ);

?>