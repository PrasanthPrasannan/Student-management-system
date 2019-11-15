<?php

session_start();

$Sid=$_SESSION['student_id'];

include '../dbcon.php';

if(isset($_POST['current_pwd'])){

$current_pwd=$_POST['current_pwd'];
$new_pwd=$_POST['newpwd'];
$confirm_pwd=$_POST['confirmpwd'];

$hash_currentpwd=md5($current_pwd);
$hash_newpwd=md5($new_pwd);
$hash_conformpwd=md5($confirm_pwd);

$sql="SELECT `password` FROM `student_details` WHERE `Id`=$Sid";


$result=$connection->query($sql);

if($result->num_rows>0){

    $r=array();

while($row=$result->fetch_assoc()){

 $password=$row['password'];

 if($password===$hash_currentpwd){

if($hash_newpwd===$hash_conformpwd){

    $sql1="UPDATE `student_details` SET `password`='$hash_conformpwd' WHERE `Id`=$Sid";

   

    $result1=$connection->query($sql1);

    
    if($result1===TRUE){

        $r["Status"]="Password Changed Successfully";

    }
    else{

        $r["Status"]="Password Changing Failed";
    
    }

   
}
 
else{

    echo "<script>alert('Current Password Invalid')</script>";
}


}

else{

echo "<script>alert('Invalid Credential')</script>";

}

}
}
echo json_encode($r);
}
else{
    echo "Invalid Data";
}
?>