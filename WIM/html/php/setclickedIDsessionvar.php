<?php
session_start();


  $_SESSION['clickeddiv']= $_POST['selecteddivID'];
  //$_SESSION['clickeddiv'] = "77";
  echo $_SESSION['clickeddiv'];

$output = "booboo";

 echo json_encode($output);
