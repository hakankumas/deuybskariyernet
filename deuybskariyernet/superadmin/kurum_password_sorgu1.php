<?php

$sorgu1 = $db->prepare('SELECT * FROM kurum ORDER BY kurum_username ASC');
$sorgu1->execute([]);
$kurum_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>