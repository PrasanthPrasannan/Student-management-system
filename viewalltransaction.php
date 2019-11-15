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


$.ajax({

type:'GET',
url:'api/viewalltransactionapi.php',
success:function(response){

  $("#viewalltransaction").html(response);

console.log(response);

}



})


})

</script>

<div id="viewalltransaction">

</div>