<?php
session_start();

$userID = $_SESSION['clickeddiv'];
//echo "something";
//echo $userID;

$db = new PDO('mysql:host=localhost;dbname=youngbraxton_whim;charset=utf8','youngbraxton','h20164');
  $sql = "SELECT * FROM `whim_users` WHERE `userID` = '{$userID}' LIMIT 1";
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



    $output = $arraytosend;

     echo json_encode($output);
