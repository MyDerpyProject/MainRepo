
  <?
  session_start();
//$_SESSION['userID'] = 1;
       $db = new PDO('mysql:host=localhost;dbname=youngbraxton_HW09;charset=utf8','youngbraxton', 'h20164');

      // $mydata = $_POST['mydata'] or $_REQUEST['mydata'];
       //json_decode($mydata);

       $invitefriends = json_decode(stripslashes($_POST['invitefriends']));



       $creatorID = $_SESSION['userID'];
       $host = $_SESSION['userID'];
       $destination = $_POST['destination'];
       $destinationaddress = $_POST['address'];
       $description = $_POST['description'];


       //$creatorID = "look";
       //$host = "look";
       //$destination = "look";
       //$destinationaddress = "look";
       //$description = "look";


       $starttime = "look";
       $endtime = "look";
       $numberofparticipants = "look";
       $areyoudriving = "look";
       $attire = $_POST['attire'];


       //$attire = "look";


       $mutualinvite = "look";
       $whimclass = "look";
       $wimname = $_POST['wimname'];
       $miscinfo = $_POST['miscinfo'];
       $backgroundpic =$_POST['backgroundimage'];


       //$wimname = "look";
       //$miscinfo = "look";

           //$sql = "INSERT INTO `youngbraxton_HW09`.`card_info` (`card_no`, `store`, `amount`) VALUES (?, ?, ?);";
           //$sql = "INSERT INTO `youngbraxton_whim`.`whim_users` (`userID`, `username`, `password`, `first`, `last`, `email`, `city`, `state`, `favcolor`, `favpet`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
           $sql = "INSERT INTO `youngbraxton_whim`.`whim_events` (`whimID`, `creatorID`, `host`, `destination`, `destinationaddress`, `description`, `starttime`, `endtime`, `numberofparticipants`, `areyoudriving`, `attire`, `otherattire`, `mutualinvite`, `whimclass`, `wimname`, `miscinfo`, `backgroundpic`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
           $response = $db->prepare($sql);
           if ($response->execute(array($creatorID,$host,$destination,$destinationaddress,$description,$starttime,$endtime,$numberofparticipants,$areyoudriving,$attire,$mutualinvite,$whimclass,$whimclass, $wimname, $miscinfo, $backgroundpic))){
             //print "Load completed <br>";
              $output = "wim created";




             $newwhimid = $db->lastInsertId();


             //echo ($newwhimid);

             $creatorIDinput = $_SESSION['userID'];
             //echo "whim ID: " . $newwhimid . "</br>";

             //automatically adds user to their own array


              //echo $friendsid;

                $sql = "INSERT INTO `youngbraxton_whim`.`whim_event_invites_responded` (`whimID`, `userID`, `response`) VALUES ( ?, ?, 'going');";
                //$sql = "INSERT INTO `youngbraxton_whim`.`whim_event_invites` (`whimID`, `userID`) VALUES ( ?, ?);";
                $response = $db->prepare($sql);
                if ($response->execute(array($newwhimid, $creatorIDinput))){
                  //echo "yay";
                  //$output = "logged out ya boy!";
                  //$output = "logged out ya boy! two";

                }
                else {

                }


                //adds user to whim i creaded this event
                $sql = "INSERT INTO `youngbraxton_whim`.`whim_i_created_this_event` (`whimID`, `userID`) VALUES (?, ?);";
                //$sql = "INSERT INTO `youngbraxton_whim`.`whim_event_invites` (`whimID`, `userID`) VALUES ( ?, ?);";
                $response = $db->prepare($sql);
                if ($response->execute(array($newwhimid, $creatorIDinput))){
                  //echo "yay";
                  //$output = "logged out ya boy!";
                  //echo ("got it");
                  //$output = "logged out ya boy! two";

                }
                else {

                }


            //   print "Whim Created <br>";
              // echo $newwhimid;



               // issues with getting friends array to import

               foreach($invitefriends as $friendsid){
                  echo $friendsid;


                  $sql = "INSERT INTO `youngbraxton_whim`.`whim_event_invites` (`whimID`, `userID`) VALUES ( ?, ?);";
                  $response = $db->prepare($sql);
                  if ($response->execute(array($newwhimid, $friendsid))){
                    //echo "yay";
                    //$output = "logged out ya boy!";

                  }
                  else {

                  }
               }

            }



          // }
           else {
             $output = "error happened";
           }

/*
           foreach ($invitefriends as $friendinvite) {
                         //echo $newwhimID;
                         $sql = "INSERT INTO `youngbraxton_whim`.`whim_event_invites` (`whimID`, `userID`) VALUES ( ?, ?);";
                         $response = $db->prepare($sql);
                         if ($response->execute(array($newwhimid, $friendinvite))){

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
*/
           $output = $destination;
           $output =  $invitefriends;

            echo json_encode($output);

            //var_dump($_POST);
