<?php   session_start();  ?>

<html>
  <head>
       <title> Home </title>
  </head>
  <body>
      <?php
      if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
       {
           header("Location:login.php");  
       }

          echo "<span style = \" color: red; padding: 0px 5px 0px 400px; text-transform: uppercase;\">". $_SESSION['use']."</span>";

          echo "Login Success";

          echo "<a href='logout.php' style = \"text-decoration: none;\"> Logout</a> "; 
      ?>
    </body>
</html>