<?php
include 'dbcon.php';

if(isset($_POST['book_title'])){

$booktitle=$_POST['book_title'];
$description=$_POST['description'];
$author=$_POST['author'];
$price=$_POST['price'];
$distributor=$_POST['distributor'];
$publisher=$_POST['publisher'];


$sql="INSERT INTO `book_details`(`book-title`, `description`, `author`, `price`, `distributor`, `publisher`) VALUES ('$booktitle','$description','$author',$price,'$distributor','$publisher')";

$result=$connection->query($sql);

$r=array();

if($result===TRUE){

    $r["Status"]="Book Inserted";
}
else 
{
 $r["Status"]="Book Insertion Failed";
    
}

echo json_encode($r);

}
else{
    echo "Invalid Data";
}

?>