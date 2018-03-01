<?php 
session_start();
$_POST = array();
                unset($_SESSION['EMAIL']);
				unset($_SESSION['FirstName']); 
				unset($_SESSION['LastName']);
    
    session_destroy();
    
    header('location:index.php');
?>