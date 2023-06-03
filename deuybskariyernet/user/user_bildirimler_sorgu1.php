<?php

$sorgu1 = $db->prepare('SELECT * FROM admin_mesaj WHERE ogrenci_no1 =? OR ogrenci_no2 =? OR ogrenci_no3 =? OR ogrenci_no4 =?');
$sorgu1->execute([$ogrenci_no,$ogrenci_no,$ogrenci_no,$ogrenci_no]);
$user_bildirim_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>