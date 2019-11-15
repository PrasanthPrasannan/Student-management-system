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

var book_title=$("#book_title").val();
var description=$("#description").val();
var author=$("#author").val();
var price=$("#price").val();
var distributor=$("#distributor").val();
var publisher=$("#publisher").val();

console.log(book_title);
console.log(description);
console.log(author);
console.log(price);
console.log(distributor);
console.log(publisher);


$.ajax({

type:'POST',
url:'bookaddapi.php',
data:{book_title:book_title,description:description,author:author,price:price,distributor:distributor,publisher:publisher},

success:function(response){

var res=JSON.parse(response);

var result=res.Status;

if(result=="Book Inserted"){

alert("Book Added Successfully");

window.location.href="book_add.php";

}
else{

alert("Book Adding Failed");
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
<h1 style="text-align:center; font-size:18px;">ADD BOOK</h1>
<form method="POST">
<table class="table">
<tr>
<td>Book Title</td>
<td>
<input type="text" class="form-control" id="book_title">
</td>
</tr>
<tr>
<td>
Description
</td>
<td>
<input type="text" class="form-control" id="description">
</td>
</tr>
<tr>
<td>
Author
</td>
<td>
<input type="text" class="form-control" id="author">
</td>
</tr>
<tr>
<td>
Price
</td>
<td>
<input type="text" class="form-control" id="price">
</td>
</tr>
<tr>
<td>
Distributor
</td>
<td>
<input type="text" class="form-control" id="distributor">
</td>
</tr>
<tr>
<td>
Publisher
</td>
<td>
<input type="text" class="form-control" id="publisher">
</td>
</tr>
<tr>
<td></td>
<td>
<button type="button" class="btn btn-success" id="submit">ADD BOOK</button>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>
</body>
</html>

