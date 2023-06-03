<?php

try{
    $db= new PDO("mysql:host=localhost; dbname=deuybskariyernet; charset=utf8", 'root','');
}
catch(Exception $e)
{
    echo $e->message;
}

$hostname = "localhost";
$username1 = "root";
$password1 = "";
$database = "deuybskariyernet";

$baglan = new mysqli ($hostname,$username1,$password1,$database);
$baglan->set_charset("utf8");


$host = 'localhost';
$username11 = 'root';
$password11 = '';
$database = "deuybskariyernet";
$message = "";

try{
    $connect = new PDO("mysql:host=$host; dbname=$database", $username11, $password11);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connect->exec("SET NAMES 'utf8'; SET CHARSET 'utf8'");
}catch(PDOException $error){
    $message = $error->getMessage();
}

$baglanti = mysqli_connect("127.0.0.1","root","");
mysqli_select_db($baglanti,"deuybskariyernet");

?>
