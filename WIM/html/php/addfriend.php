
  <?
  session_start();
//$_SESSION['userID'] = 1;
       $db = new PDO('mysql:host=localhost;dbname=youngbraxton_HW09;charset=utf8','youngbraxton', 'h20164');

      // $mydata = $_POST['mydata'] or $_REQUEST['mydata'];
       //json_decode($mydata);





       $userID = $_SESSION['userID'];
       $friendID = $_POST['friendID'];


                //adds user to whim i creaded this event
                $sql = "INSERT INTO `youngbraxton_whim`.`whim_friends` (`userID`, `friendID`) VALUES (?, ?);";
                //$sql = "INSERT INTO `youngbraxton_whim`.`whim_i_created_this_event` (`whimID`, `userID`) VALUES (?, ?);";
                //$sql = "INSERT INTO `youngbraxton_whim`.`whim_event_invites` (`whimID`, `userID`) VALUES ( ?, ?);";
                $response = $db->prepare($sql);
                if ($response->execute(array($userID, $friendID))){
                  //echo "yay";
                  //$output = "logged out ya boy!";
                  //echo ("got it");
                  $output =  "something";

                }
                else {

                }





            echo json_encode($output);

            //var_dump($_POST);
