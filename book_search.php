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

    var bookname=$('#bookname').val();

    console.log(bookname);




 $.ajax({

 type:'POST',
 url:'api/booksearchapi.php',
 data:{bookname:bookname},
 success:function(response){

$("#book").html(response);
console.log(response);


 }



 }) 


})

})


</script>
  
</div>
</div>
</div>

<div class="container border">
<div class="row">
<div class="col-md-12">
<h1 style="text-align:center; font-size:18px;">SEARCH BOOK</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Book Title
</td>
<td>
   <input type="text" class="form-control"id="bookname"> 
</td>
</tr>
<tr>
<td></td>
<td>
<button type="button" class="btn btn-success" id="submit">SEARCH</button> 
</td>
</tr>
</table>
</form>
<div id="book">

</div>
</div>
</div>
</div>
</body>
</html>

