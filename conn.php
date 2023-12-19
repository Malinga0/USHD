<?php
session_start();
$db_username = 'id20120247_ushduser';
$db_password = '$Vi]<[~z#)~Q8mDS';
$conn = new PDO( 'mysql:host=localhost;dbname=id20120247_ushddb', $db_username , $db_password);
if(!$conn){
die("Fatal Error: Connection Failed!");
}

?>