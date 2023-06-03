<?php

$sorgu1 = $db->prepare('SELECT * FROM kurum_etkinlikleri WHERE kurum_id =? ORDER BY etkinlik_id DESC');
$sorgu1->execute([$kurum_id]);
$kurumun_etkinlikleri_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>