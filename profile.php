<?php
include_once('./DB/hostedConnect.php');
if(!isset($_SESSION)){
    session_start();
}
                if($db){
                    
                    $email =  $_SESSION['EMAIL'];
                    $UserSession = "SELECT * FROM accounts WHERE email ='$email'"; 
                    if($result = mysqli_query($db, $UserSession)){
                        $userArray = array();
                        foreach($result as $row){
                            array_push($userArray,$row);

                            $regiDateSet = array_column($userArray,'registerDate');
                            $imageSet = array_column($userArray,'image');
                            $aboutSet = array_column($userArray,'about');
                            $infoSet = array_column($userArray,'info');
                            $todoSet = array_column($userArray,'todo');
                            if(array_key_exists('image', $row)){
                               
                                if($row['image']===NULL)
                                {
                        /*               echo 'row => image exists but is null '; */
                                        $_SESSION['IMAGE'] = '<img class="profile-pic" src="./public/empty.jpg"/>';
                                /*   echo 'setting session image variable to default profile image ';       */                          
                                }
                                elseif($row['image']!==NULL&&$row['image']=='')
                                {
                                    $_SESSION['IMAGE'] = '<img class="profile-pic" src="./public/empty.jpg"/>';
                                /*        echo 'row => image is not null but is an empty string: converting to default '; */
                                }
                                else
                                {
                                    /*     echo 'row => image exists and is not null '; */
                                        $_SESSION['IMAGE']= '<img class="profile-pic" src="data:image/jpeg;base64,'.base64_encode($row['image']).'"height:"100" width:"100" />';
                                }
                                if($row['registerDate']!==NULL){
                                    $_SESSION['REGIDATE'] = $row['registerDate'];
                                }
                                else{
                                    $TorontoDate = date_default_timezone_set('Canada/Eastern');
                                    $_SESSION['REGIDATE'] = date("d/m/Y");
                                }
                                if($row['info']!==NULL){
                                    $_SESSION['INFO'] = $row['info'];
                                }
                                else{
                                    $_SESSION['INFO'] = '';
                                }
                                if($row['about']!==NULL){
                                    $_SESSION['ABOUT'] = $row['about'];
                                }
                                else{
                                    $_SESSION['ABOUT'] = '';
                                }
                                
                            }


                        } 

                     /*    $TorontoDate = date_default_timezone_set('Canada/Eastern');
                            $_SESSION['REGIDATE'] = (isset($regiDateSet)?$regiDateSet[0]:date("d/m/Y"));
                           
                            $_SESSION['ABOUT'] = (isset($aboutSet)?$aboutSet[0]:'');
                            $_SESSION['INFO'] = (isset($infoSet)?$infoSet[0]:'');
                            $_SESSION['TODO'] = (isset($todoSet)?$todoSet[0]:''); */

                    }
                    
                }
?>
<DOCTYPE html>
<html>
<head>
<title>MVista - Profile</title>
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
        header('location:index.php');
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



<div class="parallaxE"></div>
<div class="containerz">
<div class="container">
    <div class="row">
    
        <div class="col-lg-12 order-lg-1"align="center">
             <form action="profile.php"method="POST" enctype="multipart/form-data" id="ImageChangeForm" onsubmit="reload()">
                
                  <div id="changeimage" >  <?php  echo($_SESSION['IMAGE']); ?></div>
                 <span id="changeImageSpan"><p>Change image</p></span>
                <div id="hiddenDiv"style="display: none;">
                    <div class="form-group col-lg-1">
                        <label for="file" class="btn btn-sm btn-outline-dark">Choose image</label>
                        <input type="file" name="file" class="form-control hidden" id="file" aria-describedby="inputImage" placeholder="Enter an image">
                        
                    

                        <input type="submit" class="form-control btn btn-sm btn-outline-dark" id="submit" value="submit"disabled="disabled">
                    </div>
                    
                </div>
                </form>
                <div class="col-lg-12">
               
                <?php 
if(isset($_SESSION['EMAIL']))
{
    
    $TorontoDate = date_default_timezone_set('Canada/Eastern');
    function greeting(){
        $hour = date('H');
        if($hour < 12){
            $greeting = '<h4> Good morning <br>'.$_SESSION['FirstName'] . ' ' . $_SESSION['LastName'].'</h4>';
           
        }
        if($hour>=12 && $hour<18){
            $greeting =  '<h4> Good afternoon <br>'.$_SESSION['FirstName'] . ' ' . $_SESSION['LastName'].'</h4>';
        }
        else{
            $greeting = '<h4> Good evening <br>'.$_SESSION['FirstName'] . ' ' . $_SESSION['LastName'].'</h4>';
        }
        return $greeting;
    }
  echo greeting();
}


?>
                </div>

                
               

                <h3 >
               
                <?php 
if($_SERVER['REQUEST_METHOD'] == "POST"){
    echo "<meta http-equiv='refresh'content='0;url='profile.php'>";
  
   var_dump($_FILES['file']['tmp_name']);
    if($_FILES!=null){
        echo 'dicks';
        $imageData = file_get_contents($_FILES['file']['tmp_name']);
        $imageDataForDb = mysqli_real_escape_string($db,$imageData);

        $email =  $_SESSION['EMAIL'];
        $stmt = $db->prepare("UPDATE accounts SET image = '$imageDataForDb' where email ='$email'");
        if($stmt->execute())
        {
            echo '
            <div class="container">
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <h4> great success</h4>' . $_SESSION['EMAIL'] . ' 
            </div>    
            </div>
            </div>';

        }

        
    
        }
    else {
        echo '
            <div class="container">
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <h4> great failure</h4>' . $_SESSION['EMAIL'] . ' 
            </div>    
            </div>
            </div>';

       }


}

?>
                
                 </h3>
            </div>
           
        </div>
           
    </div>
    
</div>
          
          

</div>
<div class="container">
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Profile</a>
                </li>
              <script>
              $(document).ready(function(){
                var image = document.createElement('img');
    
    image.src="data:image/gif;base64,R0lGODlhDwAPAKECAAAAzMzM/////wAAACwAAAAADwAPAAACIISPeQHsrZ5ModrLlN48CXF8m2iQ3YmmKqVlRtW4MLwWACH+H09wdGltaXplZCBieSBVbGVhZCBTbWFydFNhdmVyIQAAOw==";
        
    image.width=100;
    image.height=100;
    image.alt="here should be some image";
        
    document.body.appendChild(image);
              })
              </script>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3">Welcome to your profile <?php echo($_SESSION['FirstName'] . ' ' . $_SESSION['LastName'])?></h5>
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                           <div>
                                 <a class="btn btn-lg btn-outline-dark my-2 my-lg-6" href="#collapseAbout1"data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">About </a>
                            </div>
                               <div class="collapse" id="collapseAbout1">
                                    <div class="card card-body">
                                    <?php   if (!empty($_SESSION['ABOUT'])){
                                        
                                        echo('
                                        <form action="profile.php"method="POST" enctype="multipart/form-data" id="AboutChangeForm" onsubmit="reload()">
                                        <div class="form-group"> 
                                        <label class="col-lg-4 ">'.$_SESSION['ABOUT'].'</label>                                      
                                        <input type="text" class="form-control" name="about" id="about" placeholder="Write a little about you.">
                                        <div>
                                        <input type="submit" name="submitAbout" class="form-control btn btn-sm btn-outline-dark" id="submitAbout" value="submit">
                                        </div>
                                        </div></form>');
                                        }
                                        else
                                        {echo('
                                            <form action="profile.php"method="POST" enctype="multipart/form-data" id="AboutChangeForm" onsubmit="reload()">
                                            <div class="form-group">
                                            <label class="col-sm-2 col-form-label">Information about you will go here!</label>    
                                            <input type="text" class="form-control" name="about" id="about" placeholder="Write a little about you.">
                                            <div>
                                            <input type="submit" name="submitAbout" class="form-control btn btn-sm btn-outline-dark" id="submitAbout" value="submit">
                                            </div>
                                            </div></form>');
                                        } 
                                        ?>
                                        <!--   Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. -->
                                    </div>
                                </div>
                            </div>
                            <div>
                                <a class="btn btn-lg btn-outline-dark my-2 my-lg-6" href="#collapseAbout2"data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Info</a>
                            </div>  
                               <div class="collapse" id="collapseAbout2">
                                    <div class="card card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                    </div>
                                </div>
                            </div>
                               
                        
                        <div class="col-md-6">
                            <h6>Recent badges</h6>
                            <a href="#" class="badge badge-dark badge-pill">html5</a>
                  
                            <a href="#" class="badge badge-dark badge-pill">angularjs</a>
                            <a href="#" class="badge badge-dark badge-pill">css3</a>
                            <a href="#" class="badge badge-dark badge-pill">jquery</a>
                            <a href="#" class="badge badge-dark badge-pill">bootstrap</a>
                            <a href="#" class="badge badge-dark badge-pill">responsive-design</a>
                            <hr>
                            <span class="badge badge-primary"><i class="fa fa-user"></i> 0 Followers</span>
                            <span class="badge badge-success"><i class="fa fa-cog"></i> 0 Forks</span>
                            <span class="badge badge-danger"><i class="fa fa-eye"></i>0 Views</span>
                        </div>
                        <div class="col-md-12">
                            <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                            <table class="table table-sm table-hover table-striped">
                                <tbody>                                    
                                    <tr>
                                        <td>
                                            <strong><?php echo($_SESSION['FirstName'])?></strong> joined Mvista: <?php echo( $_SESSION['REGIDATE']) ?></strong>
                                        </td>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
               
               <!--  <div class="tab-pane" id="edit">
                    <form role="form">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">First name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="Jane">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="Bishop">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Email</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="email" value="email@gmail.com">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Company</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Website</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="url" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Address</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="" placeholder="Street">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-6">
                                <input class="form-control" type="text" value="" placeholder="City">
                            </div>
                            <div class="col-lg-3">
                                <input class="form-control" type="text" value="" placeholder="State">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Time Zone</label>
                            <div class="col-lg-9">
                                <select id="user_time_zone" class="form-control" size="0">
                                    <option value="Hawaii">(GMT-10:00) Hawaii</option>
                                    <option value="Alaska">(GMT-09:00) Alaska</option>
                                    <option value="Pacific Time (US &amp; Canada)">(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                    <option value="Arizona">(GMT-07:00) Arizona</option>
                                    <option value="Mountain Time (US &amp; Canada)">(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                    <option value="Central Time (US &amp; Canada)" selected="selected">(GMT-06:00) Central Time (US &amp; Canada)</option>
                                    <option value="Eastern Time (US &amp; Canada)">(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                    <option value="Indiana (East)">(GMT-05:00) Indiana (East)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Username</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="text" value="janeuser">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value="11111122333">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label">Confirm password</label>
                            <div class="col-lg-9">
                                <input class="form-control" type="password" value="11111122333">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancel">
                                <input type="button" class="btn btn-primary" value="Save Changes">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
</div> -->
    <script src="js/jquery-3.1.1.min.js"type="text/javascript"></script>
<script src="js/jquery.validate.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"type="text/javascript"></script>
<script src="js/global.js" type="text/javascript"></script>
<script src="js/validate.js" type="text/javascript"></script>
</body>
</html>
        
     
     

<!-- Id guid?  FirstName varchar(15) 
    Last name varchar(12) 
   