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


$.ajax({

type:'GET',
url:'api/studenteditprofileapi.php',
success:function(response){


$("#studentedit").html(response);

console.log(response);

}

})



})


</script>

<div id="studentedit">

</div>
