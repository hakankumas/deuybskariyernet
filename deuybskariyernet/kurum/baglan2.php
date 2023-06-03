<?php
$hostname="localhost";
$username_ki="root";
$password_ki="";
$database="deuybskariyernet";
$connect= mysqli_connect($hostname,$username_ki,$password_ki,$database);
$connect->set_charset("utf8");

try{
    $db= new PDO("mysql:host=localhost; dbname=deuybskariyernet; charset=utf8", 'root','');
}
catch(Exception $e)
{
    echo $e->message;
}
?>
