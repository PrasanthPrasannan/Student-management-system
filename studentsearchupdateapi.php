<?php

include 'dbcon.php';

if(isset($_POST['admno'])){

$admission_number=$_POST['admno'];


$sql="SELECT * FROM `student_details` WHERE `admno`='$admission_number'";

$result=$connection->query($sql);

$r=array();

if($result->num_rows>0){

 
  echo "<form method='POST'> <table class='table'>";

  while($row=$result->fetch_assoc()){

    $admno=$row['admno'];
    $name=$row['name'];
    $rollno=$row['rollno'];
    $college=$row['college'];
    $username=$row['username'];
  
    echo "<tr><td>Admission Number</td><td><input type='text' class='form-control' id='admnos' value='$admno'></td></tr>";

    echo "<tr><td>Name</td><td><input type='text' class='form-control' id='names' value='$name'></td></tr>";
    echo "<tr><td>Roll Number</td><td><input type='text' class='form-control' id='rollnos' value='$rollno'></td></tr>"; 
    echo "<tr><td>College</td><td><input type='text' class='form-control' id='colleges' value='$college'></td></tr>";
    echo "<tr><td>User Name</td><td><input type='text' class='form-control' id='usernames' value='$username'></td></tr>";
    echo "<tr><td></td><td><button type='button' class='btn btn-success' id='update' value='$admission_number'>UPDATE</button>  
        <button type='button' class='btn btn-success' id='delete'>DELETE</button></td></tr>";
}
echo "</table> </form>";
    
}

else{

  echo "<script>alert('Invalid Credential')</script>";
}

}
?>

<script>
$(document).ready(function(){

$("#update").click(function(){

  console.log("test");

  var admnos=$("#admnos").val();
  var names=$("#names").val();
  var rollnos=$("#rollnos").val();
  var colleges=$("#colleges").val();
  var usernames=$("#usernames").val();
  
  console.log(admnos);
  console.log(names);
  console.log(rollnos);
  console.log(colleges);
  console.log(usernames);

 $.ajax({

type:'POST',
url:'studentsearchupdateapi-1.php',
data:{admnos:admnos,names:names,rollnos:rollnos,colleges:colleges,usernames:usernames},
success:function(response){

  var res=JSON.parse(response);

 var result=res.Status;

 if(result=="Updated Successfully"){

  alert('Data Updated Successfully');

  window.location.href='student_edit.php';

 }
 else{

    alert('Data Updated Failed');
 }
console.log(response);
}

 }) 



})


$("#delete").click(function(){

  console.log("test");

var admnos=$("#admnos").val();


$.ajax({

type:'POST',
url:'studentsearchdeleteapi-1.php',
data:{admnos:admnos},
success:function(response){

var res=JSON.parse(response);

var result=res.Status;

if(result=="Deleted Successfully"){

  alert('Data Deleted Successfully');

  window.location.href='student_edit.php';

}
else{
  alert('Data Deletion Failed');

}
console.log(response);

}

})


})



})



</script>

