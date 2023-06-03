<?php

$sorgu1 = $db->prepare('SELECT * FROM kurum_sikayet WHERE kurum_id =? ORDER BY sikayet_id DESC');
$sorgu1->execute([$kurum_id]);
$kurumun_sikayet_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>