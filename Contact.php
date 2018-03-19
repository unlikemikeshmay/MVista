
<DOCTYPE html>
<html>
<head>
<title>MVista - Contact</title>
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




    <div class="container"align="center">
        <div class="row justify-content-center">
        <form id="contactForm" method="post" action="contact.php"class="col-sm-6 col-md-6 col-lg-4">
                    <div class="col-sm-6 col-md-12 col-lg-12">    
                         <h5><?php if(isset($_POST['Submit']))
                         {
                            echo 'Mail Sent! I will get back to you as soon as possible.';
                         }
                         else{
                             echo 'Reach out! Send me an email!';
                         }
                         ?></h5>
                    </div>    

                    <div class="form-group">
                   
                        <input type="text"class="form-control col-xs-4"id="from"placeholder="From:"name="FROM">
                    </div>
                    <div class="form-group">
                        
                        <input type="text"class="form-control col-xs-4"id="subject"placeholder="Subject:"name="SUBJECT">
                    </div>
                    <div class="form-group">
           
                        <input  type="email"class="form-control" id="inputEmail" placeholder="Email address:"name="SENDEREMAIL">
                    </div>
                    <div class="form-group">
                 
                        <textarea rows="10" cols="30"class="form-control col-xs-4"id="message"placeholder="Message:"name="MESSAGE"></textarea>
                    </div>
                    <div class="form-group">
                    <input name="Submit" type="submit" class="btn btn-outline-dark my-2 my-sm-0"value="Send"></input>
                    </div>
        <div class="container-fluid"align="center">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-4 col-xs-12 " ><i class="arrow down"id="ContactdownArrow"></i>
                </div>
            </div>
        </div>
        </div>
                    <div class="col-lg-12">
                    
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once './vendor/autoload.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['FROM'])&& $_POST['FROM']!=''&&isset($_POST['MESSAGE'])&& $_POST['MESSAGE']!='')
    {
        try{
            $recipEm = 'admin@mvista.ca';
            $recipNa = 'Mike Jay';
        /*  echo "<p>email form details correctly filled out</p>"; */
            $mail = new PHPMailer();
        /*  $mail->SMTPDebug = 2; */            // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.office365.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'admin@mvista.ca';                 // SMTP username
            $mail->Password = 'L@mbofsilence1';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to
            /////////////////////////////////////////////
            
            $mail->setFrom($recipEm,$recipNa);
            $mail->addAddress($recipEm,$recipNa);
            $mail->isHTML(TRUE);
            $mail->Subject = $_POST['SUBJECT'];
            $mail->addCC(isset($_POST['SENDEREMAIL'])?$_POST['SENDEREMAIL']:'');
            $mail->Body = 'You have been contacted by '. $_POST['FROM'] . (isset($_POST['SENDEREMAIL'])?( ' with return email: '.$_POST['SENDEREMAIL']): ' with no return email')  . '<br><br> '. $_POST['MESSAGE'] . ' ' ;
            if($mail->send()){
                $flag=true;
                echo '<p>Message has been sent. </p>';
                $_POST = array();
                header('location:contact.php');
            }
            else{$flag = false;}
            echo 'mail didnt sent';
            
        }
    catch(exception $e)
    {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
        if($flag){
            
        echo '<p>Message sent!</p>';

        /*  header('Location: contact.php'); */
        }
        else{
            echo 'Guess it didnt send';
        }

    }
}
?></span>
                </div>
                </div>
               
            </form>
            
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
                <div class="row " id="footerTargetContact">
                    <div  class="col-lg-12 col-md-6 col-sm-4 col-xs-12"><i class="arrow up"id="upArrowContact"></i></div>
                </div>
            </div>
   
            <div class="container"align="center">
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-12 ">
            <span style="color:gray"><h4>Mike Jay</h4></span>
        </div>
    </div>
</div>
<div class="container"align="center">
    <div class="row">
        <div class="col-sm-4 col-md-4 col-lg-12 ">
             <span style="color:gray"><h4>admin@mvista.ca</h4></span>
        </div>
    </div>
</div>
<div class="container"align="center">
    <div class="row">
         <div class="col-sm-4 col-md-4 col-lg-12 ">
            <span style="color:gray"><h4 id="date"></h3></span>
        </div>
    </div>
</div>

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
   name="FROM">
     "name="SUBJECT">
    name="SENDEREMAIL">
     name="MESSAGE"></textarea>
 