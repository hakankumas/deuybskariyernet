<?php

$sorgu = $db->prepare('SELECT kurum_id FROM kurum WHERE kurum_username =?');
$sorgu->execute([$kurum_username]);
$session_x = $sorgu->fetchAll(PDO::FETCH_OBJ);

foreach ($session_x as $session){
    $kurum_id = $session->kurum_id;
}

?>