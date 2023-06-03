<?php

$sorgu1 = $db->prepare('SELECT * FROM kullanici_mesajlari WHERE kurum_id =?');
$sorgu1->execute([$kurum_id]);
$kurum_user_bildirim_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>