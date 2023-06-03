<?php

$sorgu3 = $db->prepare('SELECT * FROM kurum_etkinlikleri WHERE kurum_id =?');
$sorgu3->execute([$kurum_id]);
$kurum_etkinlik_bilgisi_listesi = $sorgu3->fetchAll(PDO::FETCH_OBJ);

?>
