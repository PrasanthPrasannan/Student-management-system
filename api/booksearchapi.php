<?php
include '../dbcon.php';

if(isset($_POST['bookname'])){


$book_title=$_POST['bookname'];



$sql="SELECT * FROM `book_details` WHERE `book-title`='$book_title'";

$result=$connection->query($sql);

if($result->num_rows>0){

    echo "<form method='POST'><table class='table'> ";
    echo "<tr><th>Book Title</th><th>Description </th><th>Author</th><th>Price</th> <th>Distributor</th> <th>Publisher</th></tr>";
    while($row=$result->fetch_assoc()){

        $booktitle=$row['book-title'];
        $description=$row['description'];
        $author=$row['author'];
        $price=$row['price'];
        $distributor=$row['distributor'];
        $publisher=$row['publisher'];

        echo "<tr> <td> $booktitle  </td><td> $description </td> <td>$author</td><td>$price</td><td>$distributor</td><td>$publisher</td></tr>";
    }

    echo "</table> </form>";
}
    else{

        echo "<script>alert('Invalid Book Name')</script>";
    }
}


?>
