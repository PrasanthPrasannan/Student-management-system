
<?php
include '../dbcon.php';

$sql="SELECT `Id`, `name` FROM `student_details`";

$result=$connection->query($sql);

if($result->num_rows>0){

    echo "<td>

    <select id='student' class='form-control'>";

    while($row=$result->fetch_assoc()){

        $student_id=$row['Id'];
        $student_name=$row['name'];

echo "<option value='$student_id'>  $student_name</option>";

    }

    echo "</td>";
}

?>