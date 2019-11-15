<?php

session_start();

if(!isset($_SESSION['student_id'])){

header('Location:student-login.php');

}

?>

<?php
include 'navbar_student.php';

?>
<script>

$(document).ready(function(){


 console.log("Test");

 $.ajax({

type:'GET',
url:'api/studentviewapi.php',
success:function(response){

$("#studentview").html(response);
console.log(response);

}


 })




})

</script>

<div id="studentview">
</div>


