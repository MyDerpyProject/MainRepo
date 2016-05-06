<?php
session_start();
//$_SESSION['userID'] = 1;
$searchforfriendsquery = $_POST['searchrequest'];


$db = new PDO('mysql:host=localhost;dbname=youngbraxton_whim;charset=utf8','youngbraxton', 'h20164');
$bigarray = array();

  $sql = "SELECT * FROM `whim_users` WHERE `first` LIKE '{$searchforfriendsquery}' LIMIT 0 , 30";
  //I would like for it to do this but... it doesnt work... $sql = "SELECT * FROM `whim_users` WHERE `first` LIKE '{$searchforfriendsquery}' OR 'last' LIKE '{$searchforfriendsquery}' OR 'email' LIKE '{$searchforfriendsquery}' OR 'username' LIKE '{$searchforfriendsquery}' LIMIT 0 , 30";

  if($response = $db ->query($sql)){
    //echo"yay";
  }
  foreach ($response as $row) {
    //echo($row['userID']);
     $result['userID'] = $row['userID'];

     $result['username'] = $row['username'];
     $result['first'] = $row['first'];
     $result['last'] = $row['last'];
     //echo $row['last'];



     array_push($bigarray, $result);

     //var_dump($bigarray);

  }



$output = $bigarray;

 echo json_encode($output);
