<?php

include 'navbar_student.php';
?>
<script>
$(document).ready(function(){

$.ajax({

type:'GET',
url:'api/viewissuedbookapi.php',
success:function(response){

  console.log(response);
  
  $("#issuebook").html(response);
}


})


})

</script>

<div id="issuebook">
</div>

