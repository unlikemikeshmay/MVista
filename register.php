<?php 
$var = 'hey';
$vvar = 'yooooo';
$text = sprintf('%s',$var);
echo $text;
if(!isset($_POST['FNAME'])||$_POST['FNAME']===''|| !isset($_POST['LNAME'])|| $_POST['LNAME'] === '' ||!isset($_POST['EMAIL'])||$_POST['EMAIL'] ==='' || !isset($_POST['PASSWORD'])|| $_POST['PASSWORD'] ==='' ){
	$ok = false;
	echo '<p>Please fill out all fields in order to register</p>';
}


else{
   $ok = true;
   $Fname = $_POST['FNAME'];
   $Lname = $_POST['LNAME'];
   $Email = $_POST['EMAIL'];
   $Pass = $_POST['PASSWORD'];
   $Hsh = password_hash($Pass, PASSWORD_DEFAULT);
}
if($ok){
	$db = mysqli_connect('localhost','root','', 'mvista');
	if($db){
		echo '<p>database connection complete</p>';
	}
    $sql = sprintf("INSERT INTO `accounts` (first_name, last_name,email,hash) VALUES (
		'%s','%s','%s','%s'
	)",mysqli_real_escape_string($db,$Fname),
	mysqli_real_escape_string($db,$Lname),
	mysqli_real_escape_string($db,$Email),
	mysqli_real_escape_string($db,$Hsh));
$query = mysqli_query($db,$sql);
if(!$query){
	echo("error description: ". mysqli_error($db));
}

mysqli_close($db);

}
?>
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
        <li class="loginClass"><a href="login.php" class="derpy-div">LogIn</a></li>
        <li class="loginClass"><a href="register.php" class="derpy-div">Register</a></li>
    </ul>
</div>
<h3 class="jumbotron">Mike Vista under construction</h3>
<div class="jumbotron">

	<form method="post" action="register.php">
	 <div class="form-group">
		<label for="inputFirstName">First name</label>
		<input type="text"class="form-control" id="FirstName" placeholder="Enter first name"name="FNAME">
	</div>
	 <div class="form-group">
		<label for="inputEmail">Last name</label>
		<input type="text"class="form-control" id="LastName" placeholder="Enter last name"name="LNAME">
	</div>
	<div class="form-group">
		<label for="inputEmail">Email address</label>
		<input type="email"class="form-control" id="inputEmail" placeholder="Enter email"name="EMAIL">
	</div>
	<div class="form-group">
		<label for="inputPassword">Password</label>
		<input type="password"class="form-control" id="inputPassword" placeholder="Enter password"name="PASSWORD">
	</div>
	<button type="submit"class="btn btn-primary">Submit</button>
	<div class="form-check">
	<input type="checkbox"class="form-check-input" id="check1">
		<label class="form-check-label" for="inputEmail">Remember me</label>
	   
	</div>
</div>
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<script src="js/jquery-3.1.1.min.js"type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
</body>
</html>

<!-- Id guid?  FirstName varchar(50) 
    Last name varchar(50) 
    password varchar(50)
    email varchar(50)
    