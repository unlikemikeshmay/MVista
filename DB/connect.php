<?php 
$Host = '127.0.0.1';
$UserName = 'root';
$Password = '';

$db = mysqli_connect('127.0.0.1','root','root', 'mvista');

/* uncomment for db testing
 if($db ===false){
    die('Error: could not connect to the database'. mysql_connect_error());
}
else{
    echo 'you have connected';
} */

?>