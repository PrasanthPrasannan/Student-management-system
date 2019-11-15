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
url:'api/studentnames.php',
success:function(response){


   $("#studentname").html(response);
    console.log(response);
}

})

$.ajax({

type:'GET',
url:'api/booknameapi.php',
success:function(response){


   $("#bookname").html(response);
    console.log(response);
}

})

$("#submit").click(function(){

console.log("Test");

var student=$("#student").val();
var book=$("#book").val();

console.log(student);
console.log(book);


$.ajax({

type:'POST',
url:'api/bookreturnapi.php',
data:{student:student,book:book},
success:function(response){

 var res=JSON.parse(response);

var result=res.Result;

if(result=="Book Returned Successfully"){

alert("Book Returned Successfully");

window.location.href="bookreturn.php";
}
else{

    alert("Book Return Failed");

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
<h1 style="text-align:center; font-size:18px;">BOOK RETURN</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Select Student
</td>
<td> 
<div id="studentname">
</div>

 </td>


<!-- <td>
<select name="student" class="form-control">
<option value="">Select Student</option>
</select>
</td> -->
</tr>
<tr>
<td>
Select Book
</td>

<td> 
<div id="bookname">
</div>

 </td>






<!-- <td>
<select name="student" class="form-control">
<option value="">Select Student</option>
</select>
</td> -->
</tr>
<tr>
<td>
</td>
<td>
<button type='button' class='btn btn-success' id='submit'>RETURN</button>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>

<?php
if(isset($_POST['submit'])){

$student=$_POST['student'];
$book=$_POST['book'];


$sql="UPDATE `books_issue` SET `returnflag`=1 WHERE `student_id`=$student and `book_id`=$book";

$result=$connection->query($sql);

if($result===TRUE){

echo "<script>alert('Book Returned Successfully') </script>" ;

}
else 
{

   echo " <script>alert('Books Return Failed') </script>";
}



}


?>

