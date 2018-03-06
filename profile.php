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
<nav class="navbar navbar-expand-sm bg-dark navbar-dark nervbar">
    
    <ul class="navbar-nav">
    <li class="nav-item"><a href="index.php"class="nav-link">Home</a></li>
        <li class="nav-item"><a href="Contact.php" class="nav-link" >Contact</a></li>
        <li class="nav-item"><a href="Examples.php" class="nav-link" >Examples</a></li>
        <?php 
        session_start();
       
       
        
        if(isset($_SESSION['EMAIL']))
        {
            echo '
            <li class="nav-item"><a href="logout.php" class="nav-link">LogOut</a></li>
			<li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
			<li class="navbar-brand">'. $_SESSION['EMAIL'] . ' is logged in. ';
        }
        else{
            echo '
            <li class="nav-item loginClass"><a href="login.php" class="nav-link" >LogIn</a></li>
            <li class="nav-item loginClass"><a href="register.php" class="nav-link">Register</a></li>';
        }
            ?>
    </ul>
    </nav>
<div class="jumbotron">
<h3 >Welcome to your profile <?php echo($SFirstName . ' ' . $SLastName)?></h3>
</div>
<div class="container">
    <div class="row">
        <div></div>
    </div>

</div>
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<script src="js/jquery-3.1.1.min.js"type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
</body>
</html>
        
     
     

<!-- Id guid?  FirstName varchar(15) 
    Last name varchar(12) 
   