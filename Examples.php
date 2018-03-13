<DOCTYPE html>
<html>
<head>
<title>MVista - Examples</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css"rel="stylesheet">
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<link href="css/site.css"rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-toggleable-sm navbar-light bg-light nervbar">
    <div class="container">
        <button class="navbar-toggler"data-toggle="collapse" data-target="#mainNav">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"id="mainNav">
        <ul class="navbar-nav">        
    <li class="nav-item loginClass shakeyText"><a href="index.php"class="nav-link">Home</a></li>
    <li class="nav-item loginClass shakeyText"><a href="Contact.php" class="nav-link" >Contact</a></li>
    <?php 
    if(!isset($_SESSION)){
        session_start();
    }
    if(isset($_SESSION['EMAIL']))
    {
        echo '
        <li class="nav-item loginClass shakeyText"><a href="logout.php" class="nav-link">LogOut</a></li>
        <li class="nav-item loginClass shakeyText"><a href="profile.php" class="nav-link">Profile</a></li>
        <li class="navbar-brand loginClass shakeyText">'. $_SESSION['EMAIL'] . ' is logged in. 
        <li class="navbar-brand loginClass shakeyText"> <a href="https://linkedin.com/in/mike-jay-away"><img src="./public/In-Black-34px-R.png"/> </a></li>
        <li class="navbar-brand loginClass shakeyText"> <a href="https://github.com/unlikemikeshmay"><img src="./public/GitHub-Mark-32px.png"/> </a></li>
        </ul>
       
        ';
    }
    else{
        echo '
        <li class="nav-item loginClass shakeyText"><a href="login.php" class="nav-link" >LogIn</a></li>
        <li class="nav-item loginClass shakeyText"><a href="register.php" class="nav-link">Register</a></li>
        <li class="navbar-brand loginClass shakeyText"> <a href="https://linkedin.com/in/mike-jay-away"><img src="./public/In-Black-34px-R.png"/> </a></li>
    <li class="navbar-brand loginClass shakeyText"> <a href="https://github.com/unlikemikeshmay"><img src="./public/GitHub-Mark-32px.png"/> </a></li>
        </ul>';
    }
        ?>
        </div>
    </div>
    </nav>

<script src="js/bootstrap.min.js"type="text/javascript"></script>
<script src="js/jquery-3.1.1.min.js"type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
</body>
</html>

<!-- Id guid?  FirstName varchar(15) 
    Last name varchar(12) 