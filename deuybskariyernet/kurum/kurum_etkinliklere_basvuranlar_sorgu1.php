<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanicinin_basvurdugu_etkinlikler WHERE etkinlik_id =?');
$sorgu1->execute([$etkinlik_id]);
$kurumun_etkinlik_basvuru_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>