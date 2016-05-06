<?php
session_start();

//$username = "youngbraxton";
//$password = "h20164";
$username = $_POST['username'];
$password = $_POST['password'];

   $db = new PDO('mysql:host=localhost;dbname=youngbraxton_whim;charset=utf8','youngbraxton','h20164');
     $sql = "SELECT * FROM `whim_users` WHERE `username` = '{$username}' LIMIT 1";
       if ($response = $db->prepare($sql)){
         if($response->execute() ) {
           //$output = "true";
           foreach ($response as $row) {
            //can pull data from table (need to figure out how do to it in an array)
            $arraytosend = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9]);
            $varforloggedinIDsession = $row[0];
           }

         }else {
           $output = $sql;
         }
       }else {
         $output = "death and taxes";
       }
     //print "Acct: " . $acct . " ; Store: " . $name . " ; Value= " . $value . "<br>";




 //$output = "didnt work";


//sets up php session variable

     //print "We got the password:" . $_POST['xmypass'] . "<br />";
     $sql = "SELECT * FROM `whim_users` WHERE `username` LIKE '" . $username ."';";
     $response = $db ->query($sql);

         foreach ($response as $row) {
           if($row['password'] == $password) {
             //echo "Yay! They match!";
             $_SESSION['login']= "true";
             $_SESSION['userID']= $varforloggedinIDsession;
             //echo $varforloggedinIDsession;
             //echo $_SESSION['loggedinID'];
             array_push($arraytosend, "true", $_SESSION['loggedinID']);

           } else {
             $incorrectpassword = True;
           }
           //$passwordauthentication = $row['password'];
           //$_SESSION['authentication'] =$passwordauthentication;

         }





         if (isset($_SESSION['login'])==true) {
            //$output = "loggedin";


        } elseif(isset($_SESSION['login'])==false) {


          }


$output = $arraytosend;

 echo json_encode($output);
