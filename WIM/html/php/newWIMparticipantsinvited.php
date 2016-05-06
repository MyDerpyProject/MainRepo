<?php
session_start();
//$_SESSION['userID'] = 1;

$db = new PDO('mysql:host=localhost;dbname=youngbraxton_whim;charset=utf8','youngbraxton', 'h20164');

$invitefriends = json_decode(stripslashes($_POST['invitefriends']));
$bigarray = array();

foreach($invitefriends as $friendsid){

  $sql = "SELECT * FROM `whim_users` WHERE `userID` = ". $friendsid ." LIMIT 0, 30 ";
  //$sql = "SELECT * FROM `whim_events` WHERE `whimID` = ". $row['whimID']." LIMIT 0, 30 ";
  $response = $db ->query($sql);
  foreach ($response as $row) {

     $result['userID'] = $row['userID'];

     $result['username'] = $row['username'];
     $result['first'] = $row['first'];
     $result['last'] = $row['last'];
     $result['city'] = $row['city'];
     $result['state'] = $row['state'];
     //echo $row['last'];



     array_push($bigarray, $result);

     //var_dump($bigarray);

  }
}


$output = $bigarray;

 echo json_encode($output);
