<?php
session_start();

  //$username = $_POST['logout'];


         //if (isset($_SESSION['login'])==true and $logout == "logout") {
           //session_destroy();
           $loggedinsessionvalue =  $_SESSION['login'];
           $output = $loggedinsessionvalue;


      //  } elseif(isset($_SESSION['login'])==false) {


      //    }




 echo json_encode($output);
