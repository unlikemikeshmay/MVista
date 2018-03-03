<DOCTYPE html>
<html>
<head>
<title>Mike Vista - Register</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css"rel="stylesheet">
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<link href="css/site.css"rel="stylesheet">
</head>
<body>
<div class="divbar divbar-inverse bg-inverse">
    <ul>
    <li class="listClass"><a href="index.php" class="derpy-div">Home</a></li>
        <li class="listClass"><a href="Contact.php" class="derpy-div">Contact</a></li>
        <li class="listClass"><a href="Examples.php" class="derpy-div">Examples</a></li>
           <?php 
        session_start();
       
       
        if(isset($_SESSION['EMAIL']))
        {
            echo '
            <li class="loginClass">'. $_SESSION['EMAIL'] . ' is logged in. 
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
</div>
<h3 class="jumbotron">Mike Vista under construction</h3>
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<script src="js/jquery-3.1.1.min.js"type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
</body>
</html>

<!-- Id guid?  FirstName varchar(15) 
    Last name varchar(12) 