<?php

try{
    $db= new PDO("mysql:host=localhost; dbname=deuybskariyernet; charset=utf8", 'root','');
}
catch(Exception $e)
{
    echo $e->message;
}

?>