<?php

$sorgu1 = $db->prepare("SELECT * FROM admintokurum WHERE kurum_id =? ORDER BY admintokurum_id DESC");
$sorgu1->execute([$kurum_id]);
$kurum_bildirim_listesi = $sorgu1->fetchAll(PDO::FETCH_OBJ);

?>