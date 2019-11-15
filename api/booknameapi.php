<?php

include '../dbcon.php';

$sql="SELECT `Id`, `book-title` FROM `book_details`";

$result=$connection->query($sql);

if($result->num_rows>0){

    echo "<td>
    <select id='book' class='form-control'>";

    while($row=$result->fetch_assoc()){

        $book_id=$row['Id'];
        $book_name=$row['book-title'];

        echo "<option value='$book_id'>$book_name</option>";
    }
    echo "</td>";

}

?>