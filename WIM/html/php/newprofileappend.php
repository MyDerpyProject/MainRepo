
  <?
  session_start();

       $db = new PDO('mysql:host=localhost;dbname=youngbraxton_HW09;charset=utf8','youngbraxton', 'h20164');


       //$invitefriends = json_decode(stripslashes($_POST['invitefriends']));




       $email = $_POST['email'];
       $firstname = $_POST['firstname'];
       $lastname = $_POST['lastname'];
       $username = $_POST['username'];
       $city = $_POST['city'];
       $state = $_POST['state'];
       $favoritecolor = $_POST['favoritecolor'];
       $favoritepet = $_POST['favoritepet'];
       $bio = $_POST['bio'];


       $email = 'testyine';
       $firstname =  'testyine';
       $lastname = 'testyine';
       $username = 'testyine';
       $city = 'testyine';
       $state = 'testyine';
       $favoritecolor = 'testyine';
       $favoritepet = 'testyine';
       $bio = 'testyine';

       //$sql = "UPDATE `youngbraxton_HW09`.`card_info` SET `amount` = '0' WHERE `card_info`.`card_no` = '233596';";
       //$sql = "UPDATE `youngbraxton_whim`.`whim_users` SET `username` = \'brasadfxtonyoung\' WHERE `whim_users`.`userID` = 124;";
       $sql = "UPDATE `youngbraxton_whim`.`whim_users` SET `username` = \'whatever\', `password` = \'comeon\' WHERE `whim_users`.`userID` = 124;";
        //$response = $db->prepare($sql);

       $response = $db->query($sql);
