<?php

include '../dbcon.php';

session_start();

$Sid=$_SESSION['student_id'];

if(isset($_POST['admnos'])){

$student_delete=$_POST['admnos'];


$sql="DELETE FROM `student_details` WHERE `admno`=$student_delete";

$r=array();

$result=$connection->query($sql);


if($result===TRUE){

    $r["Status"]="Data Deleted";
}
else{

    $r["Status"]="Data Deletion Failed";
}
 echo json_encode($r);

}
else{
    echo "Invalid Data";
}
?>
