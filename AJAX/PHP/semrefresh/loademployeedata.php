<?php
$empid = $_GET['empid'];
$conn = new mysqli('localhost', 'root', 'root', 'ajax');
//Check for connection error
if($conn->connect_error){
  die("Error in DB connection: ".$conn->connect_errno." : ".$conn->connect_error);    
}
if (isset($empid)) {
    $select  = " SELECT * FROM emp_info WHERE emp_id = '$empid'";
    $result = $conn->query($select);
    echo '<table class="table table-bordered">';
    while($row = $result->fetch_object()){
        echo '<tr>'
            .'<td>'.$row->emp_name.'</td>'
            .'<td>'.$row->email.'</td>'
            .'<td>'.$row->phone.'</td>'
            .'</tr>';
    }
    echo '</table>';
}     
?>     
