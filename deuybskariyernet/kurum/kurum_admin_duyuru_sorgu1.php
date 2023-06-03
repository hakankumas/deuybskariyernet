<?php

$sorgu1 = $db->prepare('SELECT * FROM admintokurum_duyuru ORDER BY admintokurum_duyuru_id DESC');
$sorgu1->execute([]);
$admintokurum_duyuru_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>