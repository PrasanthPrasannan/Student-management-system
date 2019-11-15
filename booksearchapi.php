<?php
include 'dbcon.php';

if(isset($_POST['bookname'])){


$book_title=$_POST['bookname'];



$sql="SELECT * FROM `book_details` WHERE `book-title`='$book_title'";

$result=$connection->query($sql);

$r=array();

if($result->num_rows>0){
    
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
        echo "<tr><td></td><td><button type='button' class='btn btn-success' id='Update' value='$book_title'>UPDATE</button>
          <button type='button' class='btn btn-success' id='delete'>DELETE</button></td></tr>";
    }

    echo "</table> </form>";
    
    }
   
    // echo json_encode($r);

}
    else{

        echo "<script>alert('Invalid Book Name')</script>";
    
}


?>

<script>
$(document).ready(function(){
$("#Update").click(function(){

  console.log("Test");

  var title=$("#title").val();
  var desp=$("#desp").val();
  var atr=$("#atr").val();
  var prc=$("#prc").val();
  var distributor=$("#distributor").val(); 
  var publisher=$("#publisher").val();


  console.log(title);
  console.log(desp);
  console.log(atr);
  console.log(prc);
  console.log(distributor);
  console.log(publisher);


  $.ajax({


 type:'POST',
 url:'booksearchupdateapi.php',
 data:{title:title,desp:desp,atr:atr,prc:prc,distributor:distributor,publisher:publisher},
 success:function(response){

     var res=JSON.parse(response);

     var result=res.Status;

     if(result=="updated Successfully"){
      
      alert("Udpated Successfully");
      window.location.href='book_edit.php';
 }
 else{
  alert("Updation Failed");

 }

     console.log(response);
 }



  })


})

$("#delete").click(function(){

console.log("test");

var book_title=$("#title").val();

$.ajax({

type:'POST',
url:'booksearchdeleteapi.php',
data:{title:book_title},
success:function(response){

    var res=JSON.parse(response);

     var result=res.Status;

    if(result=="Deletion Successfully"){

    alert("Deleted Successfully");
    window.location.href='book_edit.php';
    }
    else{
      
      alert("Deletion Failed");

    }

  console.log(response);

}


})


})


})

</script>
