<?php 
$Host = '107.180.54.174';
$UserName = 'unlikemikejay';
$Password = 'L@mbofsilence1';
$DataB ='mvista';
$db = mysqli_connect($Host,$UserName,$Password,$DataB );

/* uncomment for db testing
 if($db ===false){
    die('Error: could not connect to the database'. mysql_connect_error());
}
else{
    echo 'you have connected';
} */

?>