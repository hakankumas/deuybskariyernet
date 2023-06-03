<?php

$sorgu = $db->prepare("SELECT * FROM kurum_bilgisi WHERE kurum_id = ?");
$sorgu->execute([$kurum_id]);
$kurum_bilgisi_listesi = $sorgu->fetchAll(PDO::FETCH_OBJ);

?>
