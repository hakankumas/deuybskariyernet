<?php

$sorgu3 = $db->prepare('SELECT * FROM kurum_ilan_bilgisi WHERE kurum_id =?');
$sorgu3->execute([$kurum_id]);
$kurumun_ilanlari_bilgisi_listesi = $sorgu3->fetchAll(PDO::FETCH_OBJ);

?>