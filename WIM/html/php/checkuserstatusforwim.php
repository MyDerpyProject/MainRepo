<?php
session_start();
//$_SESSION['userID'] = 1;

$db = new PDO('mysql:host=localhost;dbname=youngbraxton_whim;charset=utf8','youngbraxton', 'h20164');

//$_SESSION['clickeddiv'] = 10760
//$_SESSION['userID'] = 1;

$sql = "SELECT * FROM `whim_event_invites_responded` WHERE `whimID` = {$_SESSION['clickeddiv']} AND `userID` = {$_SESSION['userID']} LIMIT 0, 30 ";
//$sql = "SELECT * FROM 'whim_event_invites_responded' WHERE `whimID` = {$_SESSION['clickeddiv']} AND 'userID' = {$_SESSION['userID']} ";
$response = $db ->query($sql);
//echo($sql);
foreach ($response as $row) {

  $output = $row['response'];
  //echo("something");


  }




 echo json_encode($output);
