<?php
include '../dbcon.php';

if(isset($_POST['student'])){

$student=$_POST['student'];
$book=$_POST['book'];


$sql="UPDATE `books_issue` SET `returnflag`=1 WHERE `student_id`=$student and `book_id`=$book";

$result=$connection->query($sql);

$r=array();

if($result===TRUE){

    $r["Result"]="Book Returned Successfully";


}
else 
{
    $r["Result"]="Books Return Failed";

}
echo json_encode($r);
}
else{

    echo "Invvalid Data";
}