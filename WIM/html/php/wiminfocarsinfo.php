<?php
session_start();
//$_SESSION['userID'] = 1;

$db = new PDO('mysql:host=localhost;dbname=youngbraxton_whim;charset=utf8','youngbraxton', 'h20164');

//$_SESSION['clickeddiv'] = 23;

$wimIDtopull = $_SESSION['clickeddiv'];




        $sql = "SELECT * FROM `Whim_event_carinfo` WHERE `initial_generate` LIKE  'true' AND `whimID` = ". $wimIDtopull .";";
        $response = $db ->query($sql);
             foreach ($response as $row) {

               $whimlookup = $wimIDtopull;
               $driverID = $row['driverID'];
               $carID = $row['carID'];
               $rider = $row['riderID'];

                   $sql = "SELECT * FROM `whim_users` WHERE `userID` = '{$driverID}'";
                   $response = $db ->query($sql);
                   foreach ($response as $row) {
                      $drivername = $row['first'] . " " . $row['last'];
                      }

                  $sql = "SELECT * FROM `Whim_event_carinfo` WHERE `whimID` = '{$whimlookup}' AND `driverID` = '{$driverID}' LIMIT 0, 30 ";
                  $response = $db ->query($sql);
                      foreach ($response as $row) {

                        $numberincar++;
                        }
                    //  $numberincar = mysql_num_rows($response);
                    //  echo "wee";
                    //  echo $numberincar;
              //  echo $carID;
              //  echo $drivername;
              //  echo $numberincar;

                $result['carID'] = $carID;
                $result['drivername'] = $drivername;
                $result['numberincar'] = $numberincar;

                //echo $row['last'];
          //reset $numberincar
          $numberincar = 0;
             }








array_push($bigarray, $result);

//var_dump($bigarray);


$output = $bigarray;

echo json_encode($output);
