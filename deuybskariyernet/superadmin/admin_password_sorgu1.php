<?php

$sorgu1 = $db->prepare('SELECT * FROM admin WHERE admin_id NOT IN (1) ORDER BY admin_username ASC');
$sorgu1->execute();
$admin_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>