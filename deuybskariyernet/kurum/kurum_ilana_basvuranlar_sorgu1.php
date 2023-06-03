<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanicinin_basvurdugu_is_ilanlari WHERE ilan_id =?');
$sorgu1->execute([$ilan_id]);
$kurumun_ilan_basvuru_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>