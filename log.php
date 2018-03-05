<?php session_start(); ?>
<?php
$user = $pass = "";
if(isset($_SESSION['use'])) {
    header("Location:home.php"); 
 }
if($_SERVER['REQUEST_METHOD'] == "POST") {
     $_SESSION['use']=$user;
     $user = $_POST['user'];
     $pass = $_POST['pass'];
    
    if (empty($user) or $user != "uche"){
        $respond = array('status'=>0, 'message'=>"Field required",'input'=>"user");
    } 
    else if(empty($pass) or $pass != "uc360") {   
        $respond = array('status'=>0,'message'=>"Field required",'input'=>"pass");
    }
    else{
        $respond = array('status'=>1,'message'=>"Your now logged in!");
          echo json_encode($respond);
    }
    hearder("location:home.php");
}

 ?>