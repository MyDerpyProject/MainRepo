
  <?
  session_start();

       $db = new PDO('mysql:host=localhost;dbname=youngbraxton_HW09;charset=utf8','youngbraxton', 'h20164');


       //$invitefriends = json_decode(stripslashes($_POST['invitefriends']));



       $creatorID = " unknown";
       $host = " unknown";
      // $destination = $_POST['destination'];
       //$destinationaddress = $_POST['address'];
       //$description = $_POST['description'];


       $destination = " unknown";
       $destinationaddress = " unknown";
       $description = " unknown";


       $starttime = " unknown";
       $endtime = " unknown";
       $numberofparticipants = " unknown";
       $areyoudriving = " unknown";
      // $attire = $_POST['attire'];


       $attire = " unknown";


       $mutualinvite = " unknown";
       $whimclass = "look";
      // $wimname = $_POST['wimname'];
       //$miscinfo = $_POST['miscinfo'];


       $wimname = " unknown";
       $miscinfo = " unknown";

           //$sql = "INSERT INTO `youngbraxton_HW09`.`card_info` (`card_no`, `store`, `amount`) VALUES (?, ?, ?);"
           //$sql = "INSERT INTO `youngbraxton_whim`.`whim_users` (`userID`, `username`, `password`, `first`, `last`, `email`, `city`, `state`, `favcolor`, `favpet`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
           $sql = "INSERT INTO `youngbraxton_whim`.`whim_users` (`userID`, `username`, `password`, `first`, `last`, `email`, `city`, `state`, `favcolor`, `favpet`) VALUES (NULL,  ?,  ?,  ?,  ?,  ?,  ?,  ?,  ?,  ?);";
          // $sql = "INSERT INTO `youngbraxton_whim`.`whim_events` (`whimID`, `creatorID`, `host`, `destination`, `destinationaddress`, `description`, `starttime`, `endtime`, `numberofparticipants`, `areyoudriving`, `attire`, `otherattire`, `mutualinvite`, `whimclass`, `wimname`, `miscinfo`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
           $response = $db->prepare($sql);
           if ($response->execute(array($creatorID,$host,$destination,$destinationaddress,$description,$starttime,$endtime,$numberofparticipants,$areyoudriving))){
             //print "Load completed <br>";
             //$output = "logged out ya boy!";




             $newwhimid = $db->lastInsertId();
             //echo "whim ID: " . $newwhimid . "</br>";


               //print "Whim Created <br>";
               //echo $newwhimid;



               // issues with getting friends array to import




           }
           else {
             //print "Load Failed <br>";
           }


           $output = $newwhimid;
            echo json_encode($output);
