<?php

include '../dbcon.php';

if(isset($_POST['admno'])){

$admtn_number=$_POST['admno'];

$sql="SELECT  `name`, `rollno`, `admno`, `college`, `username`, `password` FROM `student_details` WHERE `admno`='$admtn_number'";

$result=$connection->query($sql);

if($result->num_rows>0){
  echo "<form method='POST'> <table class='table'>";
  echo "<tr><th>Name</th><th>Roll Number</th><th>Admission Number</th><th>College</th><th>User Name</th><th>Password</th></tr>";

  while($row=$result->fetch_assoc()){


    $name=$row['name'];
    $rollno=$row['rollno'];
    $admno=$row['admno'];
    $college=$row['college'];
    $username=$row['username'];
    $password=$row['password'];
  
    echo "<tr><td>$name</td><td>$rollno</td><td>$admno</td><td>$college</td><td>$username</td><td>$password</td></tr>";

  }

    echo "</table> </form>";
}
else{

  echo "<script>alert('Invalid Admission Number')</script>";

}

}

?>
