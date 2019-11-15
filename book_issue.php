<?php

include  'navbar.php';
?>
<script>
$(document).ready(function(){


$.ajax

({

type:'GET',
url:'api/studentnames.php',
success:function(response){

    console.log(response);

    $("#studentnames").html(response);
}

})


$.ajax({

type:'GET',
url:'api/booknameapi.php',
success:function(response){

    console.log(response);

    $("#booknames").html(response);
}

})





$("#submit").click(function(){

console.log("Test");

var student=$("#student").val();
var book=$("#book").val();
var returndate=$("#returndate").val();

console.log(student);
console.log(book);
console.log(returndate);

$.ajax({

type:'POST',
url:'bookissueapi.php',
data:{student:student,book:book,returndate:returndate},
success:function(response){

var res=JSON.parse(response);

var result=res.Status;

 if(result=="Books Issued Successfully"){

     alert("Books Issued Successfully");

     window.location.href='book_issue.php';
 }
 else{

    alert("Books Issue Failed");
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
<h1 style="text-align:center; font-size:18px;">BOOK ISSUE</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Select Student
</td>
<td>
<div id="studentnames">
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
<div id="booknames">

</div>
</td>
<!-- <td>
<select name="book" class="form-control">
<option value="">Select Book</option>
</select>
</td> -->
</tr>
<tr>
<td>
Return Date
</td>
<td>
<input type="date" class="form-control" id="returndate">
</td>
</tr>
<tr>
<td></td>
<td>
<button type="button" class="btn btn-success" id="submit">SUBMIT</button>
</td>
</tr>
</table>
</form>
</div>
</div>

<?php

include 'dbcon.php';

if(isset($_POST['submit'])){

$student=$_POST['student'];
$book=$_POST['book'];
$return_date=$_POST['returndate'];

$sql="INSERT INTO `books_issue`(`student_id`, `book_id`, `issuedate`, `returndate`) VALUES($student,$book,now(),'$return_date')";

$result=$connection->query($sql);

if($result===TRUE){

    echo "<script>alert('Books Issued Successfully')</script>";
}
else{
    echo "<script>alert('Books Issue Failed')</script>";
}

}

?>