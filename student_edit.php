<?php

session_start();

if(!isset($_SESSION['loginsuccess'])){

    header('Location:login-admin.php');
}

?>

<?php
include 'navbar.php';
?>

<script>


$(document).ready(function(){
$("#submit").click(function(){

console.log("Test");

var admno=$("#admno").val();


$.ajax({

type:'POST',
url:'studentsearchupdateapi.php',
data:{admno:admno},
success:function(response){

  console.log(response);

  $("#studentdetails").html(response);
}


})




})

})



</script>



  <div class="container border">
<div class="row">
<div class="col-md-12">
<h1 style="text-align:center; font-size:28px;">STUDENT SEARCH</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Admission Number
</td>
<td>
<input type="text" class="form-control" id="admno">
</td>
</tr>
<tr>
<td>
</td>
<td>
<button type="button" class="btn btn-success" id="submit">SUBMIT</button>
</td>
</tr>
</table>
</form>
<div class="row">
<div class="col-md-12">
<div id="studentdetails">

</div>
</div>
</div>
</div>
</div>
</div>  
</body>
</html>

<?php

include 'dbcon.php';

if(isset($_POST['submit'])){

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
    $password=$row['password'];
    echo "<tr><td>Admission Number</td><td><input type='text' class='form-control' name='admnos' value='$admno'></td></tr>";

    echo "<tr><td>Name</td><td><input type='text' class='form-control' name='names' value='$name'></td></tr>";
    echo "<tr><td>Roll Number</td><td><input type='text' class='form-control' name='rollnos' value='$rollno'></td></tr>"; 
    echo "<tr><td>College</td><td><input type='text' class='form-control' name='colleges' value='$college'></td></tr>";
    echo "<tr><td>User Name</td><td><input type='text' class='form-control' name='usernames' value='$username'></td></tr>";
    echo "<tr><td></td><td><button type='submit' class='btn btn-success' name='update'>UPDATE</button>  
        <button type='submit' class='btn btn-success' name='delete'>DELETE</button></td></tr>";
}
echo "</table> </form>";
    
}

else{

  echo "<script>alert('Invalid Credential')</script>";
}

}
?>

