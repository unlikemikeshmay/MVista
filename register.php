
<DOCTYPE html>
<html>
<head>
<title>Mike Vista - Register</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css"rel="stylesheet">
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<link href="css/site.css"rel="stylesheet">
</head>
<body>
<div class="customNav">
    <ul>
    <li class="listClass"><a href="index.php" class="derpy-div">Home</a></li>
        <li class="listClass"><a href="Contact.php" class="derpy-div">Contact</a></li>
        <li class="listClass"><a href="Examples.php" class="derpy-div">Examples</a></li>
        <li class="loginClass"><a href="login.php" class="derpy-div">LogIn</a></li>
        <li class="loginClass"><a href="register.php" class="derpy-div">Register</a></li>
    </ul>
</div>
<h3 class="jumbotron">Mike Vista under construction</h3>
<nav class="navbar navbar-inverse bg-inverse">
	<form method="post" action="register.php">
	 <div class="form-group">
		<label for="inputFirstName">First name</label>
		<input  type="text"class="form-control" id="FirstName" placeholder="Enter first name"name="FNAME">
	</div>
	 <div class="form-group">
		<label for="inputEmail">Last name</label>
		<input  type="text"class="form-control" id="LastName" placeholder="Enter last name"name="LNAME">
	</div>
	<div class="form-group">
		<label for="inputEmail">Email address</label>
		<input  type="email"class="form-control" id="inputEmail" placeholder="Enter email"name="EMAIL">
	</div>
	<div class="form-group">
		<label for="inputPassword">Password</label>
		<input  type="password"class="form-control" id="inputPassword" placeholder="Enter password"name="PASSWORD">
	</div>
	<button type="submit"class="btn btn-primary">Submit</button>
	<div class="form-check">
	<input  type="checkbox"class="form-check-input" id="check1">
		<label class="form-check-label" for="inputEmail">Remember me</label>
	   
	</div>
	<div class='container'><span style="color:red">
	<?php 
if(isset($_POST['FNAME'])&&$_POST['FNAME']!=''&& isset($_POST['LNAME'])&& $_POST['LNAME'] != '' && isset($_POST['EMAIL'])&& $_POST['EMAIL'] !='' && isset($_POST['PASSWORD'])&& $_POST['PASSWORD'] !='' ){
	$ok = true;
	$Fname = $_POST['FNAME'];
   $Lname = $_POST['LNAME'];
   $Email = $_POST['EMAIL'];
   $Pass = $_POST['PASSWORD'];
   $Hsh = password_hash($Pass, PASSWORD_DEFAULT);  
   echo 'post data is set';
}
else{
   $ok = false;
   echo '<p>Please fill out every field to register</p>';
}
 if($ok)
 {
	$db = mysqli_connect('127.0.0.1','root','root', 'mvista');

	if($db)
	{
		echo '<p>database connection for registration insert complete</p>';
	}
	$UserExist = "SELECT * FROM accounts WHERE email ='$Email'"; 
	
	$userArray = array();	
		if($result = mysqli_query($db,$UserExist))
		{
			foreach($result as $row){
				array_push($userArray,$row);
				$emailchecker = array_column($userArray,'email');
				var_dump($emailchecker);
			}
			if($Email===$emailchecker[0]){
					echo 'Sorry! An account with the email address: '. $Email . ' already exists';
			}
			else
			{
				$sql = sprintf("INSERT INTO `accounts` (first_name, last_name,email,hash) VALUES (
					'%s','%s','%s','%s'
				)",mysqli_real_escape_string($db,$Fname),
				mysqli_real_escape_string($db,$Lname),
				mysqli_real_escape_string($db,$Email),
				mysqli_real_escape_string($db,$Hsh));
				$query = mysqli_query($db,$sql);
				if(!$query){
					echo("error description: ". mysqli_error($db));
					mysqli_close($db);
				}
				else{
					echo 'insert statement successful: setting session variables';
					session_start();
					$_SESSION['EMAIL'] = $_POST['EMAIL'];
					$_SESSION['FirstName'] = $_POST['FNAME'];
					$_SESSION['LastName'] = $_POST['LNAME'];
					
					header("location:profile.php");
					exit;
				}	
			}		
			mysqli_free_result($result);
		}
mysqli_close($db);
}
?>
	</span></div>
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
    