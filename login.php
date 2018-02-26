<?php 
if (isset($_REQUEST['attempt'])){
    $user = $_POST['user'];
    $password = $_POST['password'];
    
}


?>
<DOCTYPE html>
<html>
<head>
<title>Mike Vista - Contact</title>
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
        <li class="loginClass"><a href="login.php" class="derpy-div">LogIn</a></li>
        <li class="loginClass"><a href="register.php" class="derpy-div">Register</a></li>
    </ul>
</div>
<h3 class="jumbotron">Mike Vista under construction</h3></br>
<div class="jumbotron">

    <form method="post" action="login.php?attempt">
    <div class="form-group">
        <label for="inputEmail">Email address</lable>
        <input type="email"class="form-control" id="inputEmail"aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</lable>
        <input type="password"class="form-control" id="inputEmail"aria-describedby="emailHelp" placeholder="Enter password">
    </div>
    <button type="submit"class="btn btn-primary">Submit</button>
    <div class="form-check">
    <input type="checkbox"class="form-check-input" id="check1"aria-describedby="emailHelp" placeholder="Enter email">
        <label class="form-check-label" for="inputEmail">Remember me</label>
       
    </div>
</div>
    </form>
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<script src="js/jquery-3.1.1.min.js"type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
</body>
</html>

<!-- Id guid?  FirstName varchar(15) 
    Last name varchar(12) 