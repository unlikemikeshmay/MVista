
<DOCTYPE html>
<html>
<head>
<title>MVista - Register</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css"rel="stylesheet">
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<link href="css/site.css"rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark nervbar">
    
    <ul class="navbar-nav">
    <li class="nav-item loginClass"><a href="index.php"class="nav-link">Home</a></li>
        <li class="nav-item loginClass"><a href="Contact.php" class="nav-link" >Contact</a></li>
   <!--      <li class="nav-item loginClass"><a href="Examples.php" class="nav-link" >Examples</a></li> -->
        <?php 
        session_start();
       
       
        
        if(isset($_SESSION['EMAIL']))
        {
            echo '
            <li class="nav-item loginClass"><a href="logout.php" class="nav-link">LogOut</a></li>
			<li class="nav-item loginClass"><a href="profile.php" class="nav-link">Profile</a></li>
			<li class="navbar-brand loginClass">'. $_SESSION['EMAIL'] . ' is logged in. ';
        }
        else{
            echo '
            <li class="nav-item loginClass"><a href="login.php" class="nav-link" >LogIn</a></li>
            <li class="nav-item loginClass"><a href="register.php" class="nav-link">Register</a></li>';
        }
            ?>
    </ul>
    </nav>

<div class="container">
    <div class="row">
	<div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
				<form id="registerForm" method="post" action="register.php">
					<div class="jumbotron contactJ">
					<div class="p-3 mb-2 bg-light text-dark card card-block">    
							<h5>Register a new account.</h5><br>
						</div>
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
						<div class="form-group">
							<label for="inputPassword">Confirm Password</label>
							<input  type="password"class="form-control" id="confPassword" placeholder="Enter password"name="ConfPASSWORD">
						</div>
						<button type="submit"class="btn btn-outline-dark my-2 my-sm-0">Submit</button>
						<div class='container'><br><span style="color:red">
	<?php 
if(isset($_POST['FNAME'])&&$_POST['FNAME']!=''&& isset($_POST['LNAME'])&& $_POST['LNAME'] != '' && isset($_POST['EMAIL'])&& $_POST['EMAIL'] !='' && isset($_POST['PASSWORD'])&& $_POST['PASSWORD'] !='' ){
	$ok = true;
	$Fname = $_POST['FNAME'];
   $Lname = $_POST['LNAME'];
   $Email = $_POST['EMAIL'];
   $Pass = $_POST['PASSWORD'];
   $Hsh = password_hash($Pass, PASSWORD_DEFAULT);  
   /* echo 'post data is set'; */
}
else{
   $ok = false;
  /*  echo '<p>Please fill out every field to register</p>'; */
}
 if($ok)
 {
	$db = mysqli_connect('127.0.0.1','root','root', 'mvista');

	/* if($db)
	{
		echo '<p>database connection for registration insert complete</p>';
	} */
	$UserExist = "SELECT * FROM accounts WHERE email ='$Email'"; 
	
	$userArray = array();	
	$emailchecker = array();
	$Eplace;
		if($result = mysqli_query($db,$UserExist))
		{
			foreach($result as $row){
				array_push($userArray,$row);
				$emailchecker = array_column($userArray,'email');
				
				/* var_dump($emailchecker); */
			}
			if(isset($emailchecker[0])){
				$Eplace = $emailchecker[0];
				
			}
			else{$emailchecker = array('no email was found like that');$Eplace='no email like that exists in the db'; }
			if($Email===$Eplace)
			{
				if(isset($_SESSION['EMAIL'])){
					echo '<span style="color:green"><p>You are already logged in with: ' . $_SESSION['EMAIL'] . '. </p></span>';
				}
				else{
					if(!isset($_SESSION['EMAIL'])){
						echo 'Sorry! An account with the email address: '. $Email . ' already exists';
					}
				}
				
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
					/* echo 'insert statement successful: setting session variables'; */
					if(!isset($_SESSION)){
						session_start();
					}
					
					$_SESSION['EMAIL'] = $_POST['EMAIL'];
					$_SESSION['FirstName'] = $_POST['FNAME'];
					$_SESSION['LastName'] = $_POST['LNAME'];
					

					header("location:profile.php");
					
				}	
			}		
			mysqli_free_result($result);
		}
mysqli_close($db);
}
?>
	</span></div>
						</div>
				
	</form>
	</div>
	</div>
</div>
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<script src="js/jquery-3.1.1.min.js"type="text/javascript"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/validate.js" type="text/javascript"></script>
</body>
</html>

<!-- Id guid?  FirstName varchar(50) 
    Last name varchar(50) 
    password varchar(50)
    email varchar(50)
    