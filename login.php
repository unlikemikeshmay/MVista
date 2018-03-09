
<DOCTYPE html>
<html>
<head>
<title>MVista - Login</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css"rel="stylesheet">
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<link href="css/site.css"rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark nervbar">
    
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
            </ul>
            <div class="pubIconsProfile">
        <ul >
        <li> <a href="https://linkedin.com/in/mike-jay-away"><img src="./public/In-Black-34px-R.png"/> </a></li>
        <li> <a href="https://github.com/unlikemikeshmay"><img src="./public/GitHub-Mark-32px.png"/> </a></li>
        </ul>
    </div>
            ';
        }
        else{
            echo '
            <li class="nav-item loginClass shakeyText"><a href="login.php" class="nav-link" >LogIn</a></li>
            <li class="nav-item loginClass shakeyText"><a href="register.php" class="nav-link">Register</a></li>
            </ul>
            <div class="pubIcons">
        <ul >
        <li> <a href="https://linkedin.com/in/mike-jay-away"><img src="./public/In-Black-34px-R.png"/> </a></li>
        <li> <a href="https://github.com/unlikemikeshmay"><img src="./public/GitHub-Mark-32px.png"/> </a></li>
        </ul>
    </div>
            ';
        }
            ?>
 
   
    
    </nav>

    <div class="container page"align="center">
        <div class="row justify-content-center">

				<form id="loginForm" method="post" action="login.php"class="col-sm-6 col-md-6 col-lg-4">

						<div class="col-sm-6 col-md-12 col-lg-12">    
							<h5>Log in to your account.</h5><br>
						</div>
						<div class="form-group">

							<input type="email"class="form-control" id="inputEmail" placeholder="Enter email"name="EMAIL"></br>
							
						</div>
						<div class="form-group">

							<input type="password"class="form-control" id="inputPassword" placeholder="Enter password"name="PASSWORD">
						</div>
						<div class="form-group">
							<button type="submit"class="btn btn-outline-dark my-2 my-sm-0">Submit</button>
						</div>
						<div class="container-fluid"align="center">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 " ><i class="arrow down"id="loginDownArrow"></i></div>
            </div>
        </div>
        </div>


			<div class="container">
				<span style="color:red">
	<?php 

	if(isset($_POST['EMAIL'])&& $_POST['EMAIL']!=''&&isset($_POST['PASSWORD'])&& $_POST['PASSWORD']!='')
	{
		$ok = true;
		$Email = $_POST['EMAIL'];
		$Password = $_POST['PASSWORD'];
/* 		echo '<p>post set</p>'; */
	}
	else
	{
		$ok = false;
		/* echo '<p>post not set</p>'; */
	}
	if($ok)
	{
		$con = mysqli_connect('127.0.0.1','root','root', 'mvista');
	/* 	if($con)
		{
			echo '<p>database connection for login complete</p>';
		} */
		
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
				if(!isset($_SESSION)){
					session_start();
				}
				$_SESSION['EMAIL'] = $Email;
				$_SESSION['FirstName'] = $FirstNameChecker[0];
				$_SESSION['LastName'] = $LastNameChecker[0];
				$SE = $_SESSION['EMAIL'];
				$SFN = $_SESSION['FirstName'];
				$SLN = $_SESSION['LastName'];
			/* 	echo '<p>passwords match for: '. $SFN . ' ' . $SLN . ' with the email (username) of: ' . $SE .' .</p>'; */
				
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
	</div>
	</div>

	<div class="parallax3"></div>

<div class="pageFooter">
    <nav class="navbar navbar-expand-sm bg-light navbar-light ">
    
    <ul class="navbar-nav">
    <li class="nav-item loginClass shakeyText"><a href="index.php"class="nav-link">Home</a></li>
        <li class="nav-item loginClass shakeyText"><a href="Contact.php" class="nav-link" >Contact</a></li>
    <!--     <li class="nav-item loginClass"><a href="Examples.php" class="nav-link" >Examples</a></li> -->
        <?php 
        if(!isset($_SESSION)){
            session_start();
        }

        if(isset($_SESSION['EMAIL']))
        {
            echo '
            <li class="nav-item loginClass shakeyText"><a href="logout.php" class="nav-link">LogOut</a></li>
			<li class="nav-item loginClass shakeyText"><a href="profile.php" class="nav-link">Profile</a></li>
			<li class="navbar-brand loginClass shakeyText">'. $_SESSION['EMAIL'] . ' is logged in. ';
        }
        else{
            echo '
            <li class="nav-item loginClass shakeyText"><a href="login.php" class="nav-link" >LogIn</a></li>
            <li class="nav-item loginClass shakeyText"><a href="register.php" class="nav-link">Register</a></li>';
        }
            ?>
    </ul>
    </nav>
    <div class="container-fluid"align="center">
                <div class="row" id="footerTargetLogin">
                    <div  class="col-lg-12 col-md-6 col-sm-4 col-xs-12"><i class="arrow up"id="upArrowLogin"></i></div>
                </div>
            </div>
   
<div class="container"align="center">
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-12 ">
            <span style="color:gray"><h3>Mike Jay</h3></span>
        </div>
    </div>
</div>
<div class="container"align="center">
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-12 ">
             <span style="color:gray"><h3>Developer</h3></span>
        </div>
    </div>
</div>
<div class="container"align="center">
    <div class="row">
         <div class="col-sm-4 col-md-4 col-lg-12 ">
            <span style="color:gray"><h3>admin@mvista.ca</h3></span>
        </div>
    </div>
</div>

</div>
<div class="pubIconsF">
        <ul >
        <li> <a href="https://linkedin.com/in/mike-jay-away"><img src="./public/In-Black-34px-R.png"/> </a></li>
        <li> <a href="https://github.com/unlikemikeshmay"><img src="./public/GitHub-Mark-32px.png"/> </a></li>
        </ul>
    </div>
    <script src="js/jquery-3.1.1.min.js"type="text/javascript"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
<script src="js/validate.js" type="text/javascript"></script>
</body>
</html>

<!-- Id guid?  FirstName varchar(15) 
	Last name varchar(12) 