<?php

include 'dbcon.php';

if(isset($_POST['student'])){

$student=$_POST['student'];
$book=$_POST['book'];
$return_date=$_POST['returndate'];

$sql="INSERT INTO `books_issue`(`student_id`, `book_id`, `issuedate`, `returndate`) VALUES($student,$book,now(),'$return_date')";

$result=$connection->query($sql);

$r=array();

if($result===TRUE){

    $r["Status"]="Books Issued Successfully";

}
else{

    $r["Status"]="Books Issue Failed";

}
echo json_encode($r);
}
else{

    echo "Invalid Data";
}

?>