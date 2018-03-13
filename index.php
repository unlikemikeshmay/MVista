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


</head>
<body>
<nav class="navbar bg-dark navbar-dark nervbar">
   
    <div class="collapse navbar-toggleable-xs" id="collapseNavbar">
    <button class="navbar-toggler hidden-sm-up"type="button"data-toggle="collapse"data-target="#collapseNavbar">
    &#9776;
    </button>
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
 
   
    </div>
    </nav>
    <div class="page">
        <div class="container-fluid"align="center">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 " >
                        <div class="circleBase mePic">
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid"align="center">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 " ><h1>Hi, I'm Mike Jay.</h1><br>
                    <h4>I am an application developer from Toronto Ontario.</h4><br>

                    </div>
                </div>
            </div>
            <div class="container ">
                <div class="row">
                    <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                        <h4>Writing code is my passion, and I enjoy utilizing my <span id="skills" style="color:green">skills</span> for working in the full web stack to bring ideas to reality.</h4>
                    </div>
                    <div class="col-sm-6 col-lg-6 col-md-6 col-xs-12">
                        <h4>Are you looking to build your own application or website? Or are you looking to hire a developer?</h4>
                    </div>
                </div>
            </div>
        

        <div class="container-fluid"align="center">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12" ><button type="button"class="btn btn-lg btn-outline-dark my-2 my-lg-6"id="contactbutton">Contact</button>
                </div>
            </div>
        </div>

            <div class="container-fluid"align="center">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 " ><i class="arrow down"id="downArrow"></i></div>
            </div>
        </div>
        </div>
    </div>
<div class="parallax"></div>
<div class="page">
    <div id="carouselExampleIndicators" class="carousel slide page" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="container-fluid"align="center"id="page2Target">
                <div class="row" id="page2Target">
                    <div  class="col-lg-12 col-md-6 col-sm-4 col-xs-12 margintop"><i class="arrow up"id="upArrow"></i></div>
                </div>
            </div>
  <div class="carousel-inner">
  <div class="carousel-inner">
 
    <div class="carousel-item active " id="firstCarousel">
    <div class="container-fluid">
        
          <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 carText"align="center" ><h1>Are you looking for a full stack application developer</h1><br>
              <h1>to build your application or website from design to deployment?</h1>

            </div>
          </div>
      </div>
    </div>
    <div class="carousel-item ">
    <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 carText"align="center"><h1>I am a team player and my skills are always growing</h1><br>
              <h1>Active user of Git source control for feature develoment and staying connected with Slack</h1>
            </div>
          </div>
      </div>
    </div>
    <div class="carousel-item ">
    <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 carText"align="center"><h1>I enjoy building database driven apps with</h1><br>
              <h1>MSSQL and MYSQL relational databases on the back-end.</h1>

            </div>
          </div>
      </div>
    </div>
    <div class="carousel-item ">
    <div class="container-fluid">
          <div class="row">
              <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 carText"align="center"><h1>Register on this site for a sample</h1><br>
              <h1>database driven profile application</h1>

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
    <div class="container-fluid" align="center">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 " ><i class="arrow down"id="downArrow2"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="container carText"></div> -->
   
    
  
    
    <div class="parallax2"></div>
    <div class="container-fluid"align="center"id="page3Target">
                <div class="row" id="page2Target">
                    <div  class="col-lg-12 col-md-6 col-sm-4 col-xs-12 margintop"><i class="arrow up"id="upArrow2"></i></div>
                </div>
            </div>
    <div class="container">
        <div class="row "id="page3Target">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                <span style="color:gray"><h2>Skills &amp; Strengths</h2></span>
            </div>
        </div>
    </div>
    <div class="container-fluid" align="center">
        <div class="row">
            <div class="col-sm-2">
                
                 <h3></h3>
            </div>
            <div class="col-sm-2 margin">
            <span style="color:gray"> <h2>Front-end</h2></span>
                 <h5>I think every one will agree when I say the finished product needs to look nice.<br>And through communication and 
                 experimentation we can come up with the look your site or application needs.<br> I utilize an array of front-end web technologies and frame works such as:<br>
               <span style="color:green"> <ul>
                    <li>Html 5,</li>
                    <li>CSS 3,</li>
                    <li>Bootstrap 4,</li>
                    <li>Font-awesome,</li>
                    <li>Flex-box,</li>
                    <li>Javascript,</li>
                    <li>Jquery,</li>
                    <li>Razor and</li>
                    <li>AngularJs</li><br>
                </ul></span>
                to tie it all together.<br><br> Front end coding can be imperative for posting data to the back-end and binding data from the back-end into the view as well as implementing client side validation and logic.
                </h5>
            </div>
            <div class="col-sm-2 margin">
            <span style="color:gray"> <h2>Back-end</h2></span>
                  <h5>If the front-end is the face, the back-end is definitely the brain.<br>Whether it is database calls or api 
                  communication the back-end handles your business logic, and for that reason I find it the most fun to work with.<br>
                I am most comfortable with back-end technologies<br> such as:<span style="color:green"> <ul>
                    <li>ASP.NET MVC,</li>
                    <li>ASP.NET CORE,</li>
                    <li>C#,</li>
                    <li>PHP,</li>
                    <li>NodeJs,</li>
                    <li>MSSQL and</li>
                    <li>MYSQL</li>
                </ul> and a notable mention goes to git version control for making remote and safe non-breaking changes to features of your application.<br>
                </span>

               I see myself specializing in back-end coding one day, as I see it as the more challenging of the two development paths. <br>
                Writing and connecting to api's or passing data or calculations to the front-end. I should add that unit testing is a vital part
                of back-end programming and making sure functions are passable for production is a key to success.
                
            </h5>
            </div>
            <div class="col-sm-2 margin">
            <span style="color:gray"> <h2>Eagerness to learn</h2></span>
                  <h5>
                      I am far from perfect, but am always reading and practicing new and better  <br>ways to do things. <br>
                      A major strength of mine is my unwillingness to give up until I reach my goal, and I bring that attitude with me 
                      to every job I do.
                      If you employ my services you can see this first hand.
                </h5>
            </div>
        </div>
        <div class="container-fluid" align="center">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 " ><i class="arrow down"id="downArrow3"></i>
                </div>
            </div>
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
                <div class="row" id="footerTarget">
                    <div  class="col-lg-12 col-md-6 col-sm-4 col-xs-12"><i class="arrow up"id="upArrow3"></i></div>
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
<script src="js/util.js"type="text/javascript"></script><!-- need this for bootstraps carousel also -->
<script src="js/carousel.js"type="text/javascript"></script><!-- need for carousel -->
<script src="js/global.js" type="text/javascript"></script>

</body>
</html>
<!--todo: cdn all script sources with logic to switch to stored versions if cdn fails
        fill out all media tags
        double check validation for php
