
  <?
  session_start();

       $db = new PDO('mysql:host=localhost;dbname=youngbraxton_HW09;charset=utf8','youngbraxton', 'h20164');


       $userresponse = $_POST['response'];
       $wimIDtopull = $_SESSION['clickeddiv'];
       $userID = $_SESSION['userID'];


/*
       $sql = "SELECT * FROM `whim_events` WHERE `whimID` = ". $wimIDtopull ." LIMIT 0, 30 ";
       $response = $db ->query($sql);
       foreach ($response as $row) {

          $output = $row['whimID'];
        }
*/




           $sql = "INSERT INTO `youngbraxton_whim`.`whim_event_invites_responded` (`whimID`, `userID`, `response`) VALUES (?, ?, ?);";
           //$sql = "INSERT INTO `youngbraxton_whim`.`whim_events` (`whimID`, `creatorID`, `host`, `destination`, `destinationaddress`, `description`, `starttime`, `endtime`, `numberofparticipants`, `areyoudriving`, `attire`, `otherattire`, `mutualinvite`, `whimclass`, `wimname`, `miscinfo`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
           $response = $db->prepare($sql);
           if ($response->execute(array($wimIDtopull, $userID, $userresponse))){
             //print "Load completed <br>";
               //$output = $userresponse;

           }
           else {
               //$output = "sad";
           }


           $sql = "DELETE FROM `youngbraxton_whim`.`whim_event_invites` WHERE `whim_event_invites`.`whimID` = ? AND `whim_event_invites`.`userID` = ? LIMIT 1;";

           $response = $db->prepare($sql);
           if ($response->execute(array($wimIDtopull, $userID))){
             //print "Load completed <br>";
               //$output = $userresponse;

           }
           else {
               //$output = "sad";
           }


            echo json_encode($output);
