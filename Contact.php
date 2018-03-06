
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
<nav class="navbar navbar-expand-sm bg-dark navbar-dark nervbar">
    
    <ul class="navbar-nav">
    <li class="nav-item"><a href="index.php"class="nav-link">Home</a></li>
        <li class="nav-item"><a href="Contact.php" class="nav-link" >Contact</a></li>
        <li class="nav-item"><a href="Examples.php" class="nav-link" >Examples</a></li>
        <?php 
        session_start();
       
       
        
        if(isset($_SESSION['EMAIL']))
        {
            echo '
            <li class="nav-item"><a href="logout.php" class="nav-link">LogOut</a></li>
			<li class="nav-item"><a href="profile.php" class="nav-link">Profile</a></li>
			<li class="navbar-brand">'. $_SESSION['EMAIL'] . ' is logged in. ';
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
        <div class="col-lg-12">
            <form method="post" action="contact.php">
                
                <div class="jumbotron contactJ">
                    <div class="p-3 mb-2 bg-light text-dark card card-block">    
                         <h5>Reach out! Send me an email!</h5><br>
                    </div>    
                <div class="form-group">
                        <label for="">From:</label>
                        <input type="text"class="form-control col-xs-4"id="from"placeholder="Who is sending the message?"name="FROM">
                    </div>
                    <div class="form-group">
                        <label for="">Subject:</label>
                        <input type="text"class="form-control col-xs-4"id="subject"placeholder="What would you like the subject to be?"name="SUBJECT">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email address</label>
                        <input  type="email"class="form-control" id="inputEmail" placeholder="Your return email address"name="SENDEREMAIL">
                    </div>
                    <div class="form-group">
                        <label for="">Message:</label>
                        <textarea rows="10" cols="30"class="form-control col-xs-4"id="message"placeholder="What is on your mind?"name="MESSAGE"></textarea>
                    </div>
                    <div class="form-group">
                    <input type="submit" class="btn btn-outline-dark my-2 my-sm-0"value="Send"></input>
                    </div>
                    <div class="col-lg-12">
                    
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once './vendor/autoload.php';
if(isset($_POST['FROM'])&& $_POST['FROM']!=''&&isset($_POST['MESSAGE'])&& $_POST['MESSAGE']!='')
{
    try{
         $recipEm = 'admin@mvista.ca';
        $recipNa = 'Mike Jay';
       /*  echo "<p>email form details correctly filled out</p>"; */
        $mail = new PHPMailer();
        $mail->SMTPDebug = 2;            // Enable verbose debug output
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
        $mail->Body = 'You have been contacted by '. $_POST['FROM'] . (isset($_POST['SENDEREMAIL'])?( ' @ return email '.$_POST['SENDEREMAIL']): ' with no return email')  . '<br><br> '. $_POST['MESSAGE'] . ' ' ;
        if($mail->send()){
            $flag=true;
            echo '<p>Message has been sent. </p>';
        }
        else{$flag = false;}
       
        
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
?></span>
                </div>
                </div>
               
            </form>
        </div>
    </div>
</div>
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<script src="js/jquery-3.1.1.min.js"type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
<script>

</script>
</body>
</html>

<!-- Id guid?  FirstName varchar(15) 
    Last name varchar(12) 