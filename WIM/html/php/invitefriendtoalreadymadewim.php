
  <?
  session_start();
//$_SESSION['userID'] = 1;
       $db = new PDO('mysql:host=localhost;dbname=youngbraxton_HW09;charset=utf8','youngbraxton', 'h20164');

      // $mydata = $_POST['mydata'] or $_REQUEST['mydata'];
       //json_decode($mydata);
       $_SESSION['clickeddiv'] = 1076;

       $invitefriends = json_decode(stripslashes($_POST['invitefriends']));
       $wimIDtopull = $_SESSION['clickeddiv'];


       $sql = "SELECT * FROM `whim_event_invites` WHERE `whimID` = '{$wimIDtopull}'";
       $response = $db ->query($sql);
            foreach ($response as $row) {
                echo $row['userID'];
                echo "something";
            }

            //echo "yeah";

           foreach ($invitefriends as $friendinvite) {
                         //echo $newwhimID;
                         $sql = "INSERT INTO `youngbraxton_whim`.`whim_event_invites` (`whimID`, `userID`) VALUES ( ?, ?);";
                         $response = $db->prepare($sql);
                         if ($response->execute(array($wimIDtopull, $friendinvite))){

                           //print "things Friends Invited <br>";
                           //echo $_SESSION['newwhimid'];
                         }
                         else {
                           //print "Please Complete Required Fields for your friends <br>";
                           //echo $_SESSION['newwhimid'];
                         }

                         //echo$whimeventID;
                         //echo $friendinvite . "</br>";
                       }


            echo json_encode($output);

            //var_dump($_POST);
