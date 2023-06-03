<?php

$sorgu1 = $db->prepare('SELECT * FROM admin_bilgisi WHERE admin_username =?');
$sorgu1->execute([$admin_username]);
$admin_bilgisi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>