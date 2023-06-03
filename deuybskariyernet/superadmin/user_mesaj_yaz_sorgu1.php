<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_bilgisi WHERE kullanici_ad IS NOT NULL AND kullanici_soyad IS NOT NULL');
$sorgu1->execute([]);
$user_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>