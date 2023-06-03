<?php

$sorgu2 = $db->prepare('SELECT * FROM kullanicinin_basvurdugu_etkinlikler WHERE ogrenci_no =? ORDER BY etkinlik_basvurusu_id DESC');
$sorgu2->execute([$ogrenci_no]);
$kullanicinin_basvurdugu_etkinlikler_listesi = $sorgu2->fetchAll(PDO::FETCH_OBJ);

?>