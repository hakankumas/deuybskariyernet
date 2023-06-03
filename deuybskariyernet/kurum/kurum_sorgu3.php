<?php

$sorgu2 = $db->prepare('SELECT * FROM kurum_ilan_bilgisi WHERE kurum_id =?');
$sorgu2->execute([$kurum_id]);
$kurum_ilan_bilgisi_listesi = $sorgu2->fetchAll(PDO::FETCH_OBJ);

?>

