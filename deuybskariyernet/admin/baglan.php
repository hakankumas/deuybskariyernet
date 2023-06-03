<?php
try{
    $db= new PDO("mysql:host=localhost; dbname=deuybskariyernet; charset=utf8", 'root','');
}
catch(Exception $e)
{
    echo $e->message;
}

$hostname = "localhost";
$username = "root";
$password = "";
$database = "deuybskariyernet";

$baglan = new mysqli ($hostname,$username,$password,$database);
$baglan->set_charset("utf8");

$con = mysqli_connect("localhost","root","","deuybskariyernet");
$con->set_charset("utf8");

$conn = mysqli_connect("localhost","root","","deuybskariyernet");
$conn->set_charset("utf8");



?>