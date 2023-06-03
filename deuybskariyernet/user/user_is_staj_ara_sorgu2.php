<?php

$sorgu2 = $db->prepare('SELECT * FROM kullanicinin_basvurdugu_is_ilanlari WHERE ogrenci_no =?');
$sorgu2->execute([$ogrenci_no]);
$kullanicinin_basvurdugu_is_ilanlari_listesi = $sorgu2->fetchAll(PDO::FETCH_OBJ);

?>