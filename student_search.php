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

  var admno=$("#admno").val();

  console.log(admno);

  console.log("Test");

$.ajax({

type:'POST',
url:'api/studentsearchapi.php',
data:{admno:admno},
success:function(response){


  $("#student").html(response);
  console.log(response);
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
<div id="student">
</div>
</div>
</div>
</div>  
</body>
</html>

