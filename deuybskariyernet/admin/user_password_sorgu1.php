<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici ORDER BY ogrenci_no ASC');
$sorgu1->execute([]);
$user_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>