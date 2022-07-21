<?php

error_reporting(0);

include("../connect.php");

$email = $_POST['email'];
$phone = $_POST['phone'];


$sql = "SELECT * FROM `users`   WHERE `email` ='$email' OR `phone` = '$phone'";
$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {

    $count = $result->num_rows;

}



if ($count == 1 ) {
    
    echo json_encode("done");

} else {
    
    echo json_encode("not done");
}

?>