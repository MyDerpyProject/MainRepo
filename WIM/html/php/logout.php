<?php
session_start();

  //$username = $_POST['logout'];


         //if (isset($_SESSION['login'])==true and $logout == "logout") {
           session_destroy();
           unset( $_SESSION['login']);
           unset( $_SESSION['userID']);



           $output = "logged out ya boy!";


      //  } elseif(isset($_SESSION['login'])==false) {


      //    }




 echo json_encode($output);
