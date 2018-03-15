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
<div class="container">
    <div class="row">
      
        <div class="col-lg-4 order-lg-1">
             <form action="profile.php"method="POST" enctype="multipart/form-data"id="ImageChangeForm">
                <div class="containerz">
                    <?php echo $_SESSION['IMAGE']; ?>
                    <div class="overlay">
                         <div class="text">Hello World</div>
                    </div>
                </div>

                <div class="col-lg-4 order-lg-1 e hidden">
    
        <div class="form-group">
        <label class="control-label btn btn-sm btn-outline-dark" for="file">Image</label>
        <div class="input-group in ">
            <input  type="file" name="file" id="file"  />
        </div>
      </div>
        <input type="submit" name="submit" class="btn btn-sm btn-outline-dark"value="update">
                </div>
                </form>

                <h3 >
                
                <?php 
                include_once('./DB/connect.php');
                if($db!==false){
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
                           
                            $_SESSION['REGIDATE'] = (isset($regiDateSet)?$regiDateSet[0]:'');
                            $_SESSION['IMAGE'] = '<img id="changeimage" class="profile-pic" src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" />';
                            $_SESSION['ABOUT'] = (isset($aboutSet)?$aboutSet[0]:'');
                            $_SESSION['INFO'] = (isset($infoSet)?$infoSet[0]:'');
                            $_SESSION['TODO'] = (isset($todoSet)?$todoSet[0]:'');
                          /* echo $_SESSION['IMAGE'];  */            
                           
                        } 
                    }
                }
if(isset($_POST['submit'])){
    echo '
    <div class="container">
    <div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <h4> post is set</h4>
    </div>    
    </div>
    </div>';
if(isset($_FILES)){

     $imageData = file_get_contents($_FILES['file']['tmp_name']);
     $imageDataForDb = mysqli_real_escape_string($db,$imageData);

     $email =  $_SESSION['EMAIL'];
     $stmt = $db->prepare("update accounts set image = '$imageDataForDb' where email ='$email'");
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
            <h4> great failure</h4>
        </div>    
        </div>
        </div>';

    }


}

?>
                
                 <?php 
if(isset($_SESSION['EMAIL']))
{
    
    $TorontoDate = date_default_timezone_set('Canada/Eastern');
    function greeting(){
        $hour = date('H');
        if($hour < 12){
            $greeting = '
            <div class="container">
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <h4> Good morning <br>'.$_SESSION['FirstName'] . ' ' . $_SESSION['LastName'].'</h4>
            </div>    
            </div>
            </div>';
           
        }
        if($hour>=12 && $hour<18){
            $greeting =  '
            <div class="container">
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <h4> Good afternoon <br>'.$_SESSION['FirstName'] . ' ' . $_SESSION['LastName'].'</h4>
            </div>    
            </div>
            </div>';
        }
        else{
            $greeting = '
            <div class="container">
            <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <h4> Good evening <br>'.$_SESSION['FirstName'] . ' ' . $_SESSION['LastName'].'</h4>
                </div>    
            </div>
            </div>';
        }
        return $greeting;
    }
  echo greeting();
}


?></h3>
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
                        <div class="col-md-6">
                            <ul class="list-inline">
                                <li list-inline-item> <a class="btn btn-lg btn-outline-dark my-2 my-lg-6" href="#collapseAbout1"data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">About </a>
                               <div class="collapse" id="collapseAbout1">
                                    <div class="card card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                    </div>
                                </div>
                            </div></li>
                                <li list-inline-item> <a class="btn btn-lg btn-outline-dark my-2 my-lg-6" href="#collapseAbout2"data-toggle="collapse" role="button" aria-expanded="false" aria-controls="collapseExample">Info</a>
                               <div class="collapse" id="collapseAbout2">
                                    <div class="card card-body">
                                          Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                    </div>
                                </div>
                            </div>
                                <li></li>
                            </ul>
                        
                       <!--  <div class="col-md-6">
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
                        </div> -->
                        <div class="col-md-12">
                            <h5 class="mt-2"><span class="fa fa-clock-o ion-clock float-right"></span> Recent Activity</h5>
                            <table class="table table-sm table-hover table-striped">
                                <tbody>                                    
                                    <tr>
                                        <td>
                                            <strong><?php echo($_SESSION['FirstName'])?></strong> joined Mvista</strong>
                                        </td>
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="messages">
                    <div class="alert alert-info alert-dismissable">
                        <a class="panel-close close" data-dismiss="alert">×</a> This is an <strong>.alert</strong>. Use this to show important messages to the user.
                    </div>
                    <table class="table table-hover table-striped">
                        <tbody>                                    
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">3 hrs ago</span> Here is your a link to the latest summary report from the..
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">Yesterday</span> There has been a request on your account since that was..
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/10</span> Porttitor vitae ultrices quis, dapibus id dolor. Morbi venenatis lacinia rhoncus. 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/4</span> Vestibulum tincidunt ullamcorper eros eget luctus. 
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">9/4</span> Maxamillion ais the fix for tibulum tincidunt ullamcorper eros. 
                                </td>
                            </tr>
                        </tbody> 
                    </table>
                </div>
                <div class="tab-pane" id="edit">
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
   