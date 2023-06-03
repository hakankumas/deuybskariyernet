<?php

$sorgu = $db->prepare('SELECT * FROM kurum_bilgisi WHERE kurum_username =?');
$sorgu->execute([$kurum_username]);
$kurum_bilgisi_listesi = $sorgu->fetchAll(PDO::FETCH_OBJ);

?>