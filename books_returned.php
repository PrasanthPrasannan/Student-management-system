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
url:'api/booksreturnedapi.php',
success:function(response){

  console.log(response);
  $("#booksreturn").html(response);
}


})

})

</script>

<div id="booksreturn">

</div>
