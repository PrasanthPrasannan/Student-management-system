<?php

session_start();

if(!isset($_SESSION['student_id']))
{

    header('Location:student-login.php');

}
?>

<?php

include 'navbar_student.php';

?>
<script>
$(document).ready(function(){
$("#success").click(function(){

console.log("test");

 var current_pwd=$("#current_pwd").val();
 var newpwd=$("#newpwd").val();
 var confirmpwd=$("#confirmpwd").val();

 console.log(current_pwd);
 console.log(newpwd);
 console.log(confirmpwd);


 $.ajax({

type:'POST',
url:'api/changepasswordapi.php',
data:{current_pwd:current_pwd,newpwd:newpwd,confirmpwd:confirmpwd},
success:function(response){
  
   var res=JSON.parse(response);

   var result=res.Status;

   if(result=="Password Changed Successfully"){

       alert("Password Changed Successfully");
       
       window.location.href='student-login.php';
   }
   else{

    alert("Password Changed Successfully");

   }

    console.log(response);
}

 })

})


})

</script>

<div class="container border">
<div class="row">
<div class="col-md-12">
<h1 style="text-align:center; font-size:28px;">CHANGE PASSWORD</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Current Password
</td>
<td>
<input type="password" class="form-control" id="current_pwd">
</td>
</tr>
<tr>
<td>
New Password
</td>
<td>
<input type="password" class="form-control" id="newpwd">
</td>
</tr>
<tr>
<td>
Confirm Password
</td>
<td>
<input type="password" class="form-control" id="confirmpwd">
</td>
</tr>
<tr>
<td></td>
<td>
<button type="button" class="btn btn-success" id="success">Change Password</button>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>

