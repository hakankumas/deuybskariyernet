<?php

$sorgu1 = $db->prepare('SELECT * FROM kurum_mesajlari WHERE ogrenci_no =?');
$sorgu1->execute([$ogrenci_no]);
$user_kurum_bildirim_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>