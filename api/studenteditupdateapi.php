<?php

include '../dbcon.php';

session_start();

$Sid=$_SESSION['student_id'];

if(isset($_POST['admnos'])){

  $admnos=$_POST['admnos'];
  $names=$_POST['names'];
  $rollnos=$_POST['rollnos'];
  $colleges=$_POST['colleges'];
  $usernames=$_POST['usernames'];
  

  $sql="UPDATE `student_details` SET `name`='$names',`rollno`=$rollnos,`admno`=$admnos,`college`='$colleges',`username`='$usernames' WHERE `Id`='$Sid'";

 $result=$connection->query($sql);

 $r=array();

if($result===TRUE){

    $r["Status"]="Data Updated";

}
else{

    $r["Status"]="Data Updation Failed";

}
echo json_encode($r);
}
else{

    echo "Invalid Data";
}