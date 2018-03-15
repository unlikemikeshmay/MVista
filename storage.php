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
             $_SESSION['IMAGE'] = (isset($imageSet)?$imageSet[0]:'./public/linkd.jpg');
             $_SESSION['ABOUT'] = (isset($aboutSet)?$aboutSet[0]:'');
             $_SESSION['INFO'] = (isset($infoSet)?$infoSet[0]:'');
             $_SESSION['TODO'] = (isset($todoSet)?$todoSet[0]:'');
             header("content-type:image/jpeg");
    echo $_SESSION['IMAGE'];

           /*    var_dump($userArray); */
            
            

             
            
         } 
     }
     

 }

?>