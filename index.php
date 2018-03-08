<DOCTYPE html>
<html>
<head>
<title>MVista - Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.min.css"rel="stylesheet">
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<link href="css/site.css"rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
<link rel="shortcut icon" type="image/x-icon" href="./favicon.ico"/>
<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>

</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark nervbar">
    
    <ul class="navbar-nav">
    <li class="nav-item loginClass shakeyText"><a href="index.php"class="nav-link">Home</a></li>
        <li class="nav-item loginClass shakeyText"><a href="Contact.php" class="nav-link" >Contact</a></li>
    <!--     <li class="nav-item loginClass"><a href="Examples.php" class="nav-link" >Examples</a></li> -->
        <?php 
        session_start();
       
       
        
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
          <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 carText" ><h1 class="shakeyText"><b>Hi, I'm Mike.</b></h1><br><h1 class="shakeyText"><b>I am an application developer.</b></h1></div>
          </div>
      </div>
      <div class="container-fluid"align="center">
          <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 carText" ><a class="scroll"target="#firstCarousel"><i id="downArrow" style="font-size:4em" class="fas fa-angle-down"></i></a></div>
          </div>
      </div>
      
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner">
  <div class="carousel-inner">
    <div class="carousel-item active c" id="firstCarousel">
    <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 carText"align="center" ><h1>Are you looking for a full stack application developer</h1><br>
              <h1>to build your application or website from design to deployment?</h1>

            </div>
          </div>
      </div>
    </div>
    <div class="carousel-item c">
    <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 carText"align="center"><h1>Are you looking for a full stack application developer</h1><br>
              <h1>to build your application or website from design to deployment?</h1>

            </div>
          </div>
      </div>
    </div>
    <div class="carousel-item c">
    <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 carText"align="center"><h1>Are you looking for a full stack application developer</h1><br>
              <h1>to build your application or website from design to deployment?</h1>

            </div>
          </div>
      </div>
    </div>
    <div class="carousel-item c">
    <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 carText"align="center"><h1>Are you looking for a full stack application developer</h1><br>
              <h1>to build your application or website from design to deployment?</h1>

            </div>
          </div>
      </div>
    </div>
  </div>
   
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="container-fluid"align="center">
          <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 carText" ><h2>This </h2></div>
          </div>
      </div>

<script src="js/jquery-3.1.1.min.js"type="text/javascript"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<script src="js/util.js"type="text/javascript"></script><!-- need this for bootstraps carousel also -->
<script src="js/carousel.js"type="text/javascript"></script><!-- need for carousel -->
<script src="js/global.js" type="text/javascript"></script>

</body>
</html>

<!--  <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 carText"align="center"><h1>Are you looking for a full stack application developer</h1><br>
              <h1>to build your application or website from design to deployment?</h1>

            </div>
          </div>
      </div> -->