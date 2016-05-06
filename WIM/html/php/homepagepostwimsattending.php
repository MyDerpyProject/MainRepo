<?php
session_start();
//$_SESSION['userID'] = 1;

$db = new PDO('mysql:host=localhost;dbname=youngbraxton_whim;charset=utf8','youngbraxton', 'h20164');

//$sql = "SELECT * FROM `whim_event_invites_responded` WHERE `userID` = 1 AND `response` LIKE \'g\' LIMIT 0, 30 ";
$sql = "SELECT * FROM `whim_event_invites_responded` WHERE `userID` = '" . $_SESSION['userID']. "';";
$response = $db ->query($sql);

$bigarray = array();
foreach ($response as $row) {

  $sql = "SELECT * FROM `whim_events` WHERE `whimID` = ". $row['whimID']." LIMIT 0, 30 ";
  $response = $db ->query($sql);
  foreach ($response as $row) {

    $result['whimID'] = $row['whimID'];

    $result['creatorID'] = $row['creatorID'];
    $result['host'] = $row['host'];
    $result['destination'] = $row['destination'];
    $result['destinationaddress'] = $row['destinationaddress'];
    $result['description'] = $row['description'];
    $result['starttime'] = $row['starttime'];
    $result['endtime'] = $row['endtime'];
    $result['numberofparticipants'] = $row['numberofparticipants'];
    $result['areyoudriving'] = $row['areyoudriving'];
    $result['attire'] = $row['attire'];
    $result['otherattire'] = $row['otherattire'];
    $result['mutualinvite'] = $row['mutualinvite'];
    $result['whimclass'] = $row['whimclass'];
    $result['wimname'] = $row['wimname'];
    $result['miscinfo'] = $row['miscinfo'];
    $result['backgroundpic'] = $row['backgroundpic'];

    /* $smallarray = array($whimID, $creatorID, $host, $destination, $description, $starttime, $endtime,
     $numberofparticipants, $areyoudriving, $attire, $mutualinvite, $whimclass, $wimname, $miscinfo);*/
     //var_dump($smallarray);
     //echo("</br></br>");


     array_push($bigarray, $result);

     //var_dump($bigarray);

  }
}


$output = $bigarray;

 echo json_encode($output);
