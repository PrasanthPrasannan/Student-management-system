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

console.log("test");

var bookname=$("#bookname").val();


$.ajax({

type:'POST',
url:'booksearchapi.php',
data:{bookname:bookname},
success:function(response){

    console.log(response);
    
    $("#booksearch").html(response);

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
<h1 style="text-align:center; font-size:18px;">EDIT BOOK</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Book Title
</td>
<td>
<input type="text" class="form-control" id="bookname"> 
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
<div class="row">
<div class="col-md-12">
<div id="booksearch">
</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>

<?php
include 'dbcon.php';
if(isset($_POST['submit'])){


$book_title=$_POST['bookname'];



$sql="SELECT * FROM `book_details` WHERE `book-title`='$book_title'";

$result=$connection->query($sql);

if($result->num_rows>0){
    echo "<div class='container border'> <div class='row'> <div class='col-md-12'>";
    echo "<h1 style='text-align:center; font-size:18px;'>Book Details</h1>";
    echo "<form method='POST'><table class='table'>";
  
    while($row=$result->fetch_assoc()){

        $booktitle=$row['book-title'];
        $description=$row['description'];
        $author=$row['author'];
        $price=$row['price'];
        $distributor=$row['distributor'];
        $publisher=$row['publisher'];

        echo "<tr><td>BOOK TITLE</td><td><input type='text' class='form-control' id='title' value='$booktitle'> </td></tr>";       
        echo "<tr><td>DESCRIPTION</td><td><input type='text' class='form-control' id='desp' value='$description'> </td></tr>";
        echo "<tr><td>AUTHOR</td><td><input type='text' class='form-control' id='atr' value='$author'> </td></tr>";
        echo "<tr><td>PRICE</td><td><input type='text' class='form-control' id='prc' value='$price'> </td></tr>";
        echo "<tr><td>PRICE</td><td><input type='text' class='form-control' id='distributor' value='$distributor'> </td></tr>";
        echo "<tr><td>PRICE</td><td><input type='text' class='form-control' id='publisher' value='$publisher'> </td></tr>";
        echo "<tr><td></td><td><button type='button' class='btn btn-success' id='Update'>UPDATE</button>
          <button type='button' class='btn btn-success' id='delete'>DELETE</button></td></tr>";
    }

    echo "</table> </form>";
    echo "</div> </div> </div>";

}
    else{

        echo "<script>alert('Invalid Book Name')</script>";
    }
}
?>

