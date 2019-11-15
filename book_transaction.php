<?php
include 'navbar_student.php';
?>
<script>
$(document).ready(function(){


$.ajax({

type:'GET',
url:'api/studentbooktransaction.php',

success:function(response){

  $("#Studentbooktransaction").html(response);
console.log(response);

}

})


})

</script>
<div id="Studentbooktransaction">

</div>

