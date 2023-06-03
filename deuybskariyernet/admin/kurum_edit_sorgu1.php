<?php

$sorgu = $db->prepare('SELECT * FROM kurum_bilgisi');
$sorgu->execute();
$kurumlistesi = $sorgu->fetchAll(PDO::FETCH_OBJ);

?>
