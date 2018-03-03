
<DOCTYPE html>
<html>
<head>
<title>Mike Vista - Login</title>
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

	<form method="post" action="login.php">
	 
	<div class="form-group">
		<label for="inputEmail">Email address</label>
		<input type="email"class="form-control" id="inputEmail" placeholder="Enter email"name="EMAIL"></br>
		
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
	<div class="container">
	<span style="color:red">
	<?php 

	if(isset($_POST['EMAIL'])&& $_POST['EMAIL']!=''&&isset($_POST['PASSWORD'])&& $_POST['PASSWORD']!='')
	{
		$ok = true;
		$Email = $_POST['EMAIL'];
		$Password = $_POST['PASSWORD'];
		echo '<p>post set</p>';
	}
	else
	{
		$ok = false;
		echo '<p>post not set</p>';
	}
	if($ok)
	{
		$con = mysqli_connect('127.0.0.1','root','root', 'mvista');
		if($con)
		{
			echo '<p>database connection for login complete</p>';
		}
		
		$UserExist = "SELECT * FROM accounts WHERE email ='$Email'"; 
		$ProfA = array();
		if($ProfileQ = mysqli_query($con,$UserExist)){
			foreach($ProfileQ as $row)
			{
				array_push($ProfA,$row);
				
				$PassChecker = array_column($ProfA,'hash');
				$FirstNameChecker = array_column($ProfA,'first_name');
				$LastNameChecker = array_column($ProfA,'last_name');
				/* var_dump($PassChecker); */
			}
			if(password_verify($Password,$PassChecker[0])){
				/* if(isset($_SESSION['EMAIL'])&&$_SESSION['EMAIL']!=''&&isset($_SESSION['FirstName'])&&$_SESSION['FirstName']!=''&&isset($_SESSION['LastName'])&&$_SESSION['LastName']!=''){
					unset($_SESSION['EMAIL']);
					unset($_SESSION['FirstName']); 
					unset($_SESSION['LastName']);
				} */
				session_start();
				$_SESSION['EMAIL'] = $Email;
				$_SESSION['FirstName'] = $FirstNameChecker[0];
				$_SESSION['LastName'] = $LastNameChecker[0];
				$SE = $_SESSION['EMAIL'];
				$SFN = $_SESSION['FirstName'];
				$SLN = $_SESSION['LastName'];
				echo '<p>passwords match for: '. $SFN . ' ' . $SLN . ' with the email (username) of: ' . $SE .' .</p>';
				
					header("location:profile.php");
					
			}
			else
			{
				echo "<p>Sorry that username and/or password doesn't match our records. Please try again.</p>";
            }
            mysqli_close($con);
		}
	}
	
?>
	</span>
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