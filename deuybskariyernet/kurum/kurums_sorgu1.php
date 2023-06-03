<?php

$sorgu1 = $db->prepare("SELECT * FROM kurum_bilgisi 
WHERE kurum_id NOT IN (?)
AND kurum_ad IS NOT NULL 
ORDER BY kurum_ad ASC");
$sorgu1->execute([$kurum_id]);
$kurum_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>