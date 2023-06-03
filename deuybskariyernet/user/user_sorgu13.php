<?php

$sorgu13 = $db->prepare('SELECT kurum_id FROM kurum WHERE kurum_username =?');
$sorgu13->execute([$kurum_username]);
$session_x = $sorgu13->fetchAll(PDO::FETCH_OBJ);

foreach ($session_x as $session){
    $kurum_id = $session->kurum_id;
}

?>