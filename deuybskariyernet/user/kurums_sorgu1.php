<?php

$sorgu1 = $db->prepare('SELECT * FROM kurum_bilgisi WHERE kurum_ad IS NOT NULL ORDER BY kurum_ad');
$sorgu1->execute([]);
$kurum_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>