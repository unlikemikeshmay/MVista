<DOCTYPE html>
<html>
<head>
<title>Mike Vista - Profile</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css"rel="stylesheet">
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<link href="css/site.css"rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse bg-inverse ">
    <ul>
 
    <li class="listClass"><a href="index.php" class="derpy-nav">Home</a></li>
        <li class="listClass"><a href="Contact.php" class="derpy-nav">Contact</a></li>
        <li class="listClass"><a href="Examples.php" class="derpy-nav">Examples</a></li>
        <?php 
        session_start();
       
        $SEmail = 	$_SESSION['EMAIL'];
        $SFirstName = $_SESSION['FirstName'];
        $SLastName = $_SESSION['LastName'];
        if(isset($SEmail))
        {
            echo '
            <li class="loginClass">'. $SEmail . ' is logged in. 
            <li class="loginClass"><a href="logout.php" class="derpy-div">LogOut</a></li>
            <li class="loginClass"><a href="profile.php" class="derpy-div">Profile</a></li>';
        }
        else{
            echo '
            <li class="loginClass"><a href="login.php" class="derpy-div">LogIn</a></li>
            <li class="loginClass"><a href="register.php" class="derpy-div">Register</a></li>';
        }
            ?>
        
    </ul>
</nav>
<h3 class="jumbotron">Welcome to your profile <?php echo($SFirstName . ' ' . $SLastName)?></h3>
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<script src="js/jquery-3.1.1.min.js"type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
</body>
</html>
        
     
     

<!-- Id guid?  FirstName varchar(15) 
    Last name varchar(12) 
   