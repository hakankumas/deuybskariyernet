<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_onyazi WHERE ogrenci_no =? ORDER BY kullanici_onyazi_id DESC');
$sorgu1->execute([$ogrenci_no]);
$user_onyazi_bilgisi_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>