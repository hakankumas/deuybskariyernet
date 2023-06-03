<?php

$sorgu1 = $db->prepare('SELECT * FROM admintouser_duyuru ORDER BY admintouser_duyuru_id DESC');
$sorgu1->execute([]);
$admin_duyuru_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>