<?php 
$Host = '127.0.0.1';
$UserName = 'root';
$Password = '';

$con = mysql_connect($Host,$UserName,$Password);
if($con ===false){
    die('Error: could not connect to the database'. mysql_connect_error());
}

?>