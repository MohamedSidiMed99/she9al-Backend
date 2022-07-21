<?php

error_reporting(0);

include("../connect.php");

$email = $_POST['email'];
$pass = $_POST['pass'];
// $data = [];

$sql = "SELECT * FROM `users`   WHERE `email` ='$email' AND `password` = '$pass'";
$result = $con->query($sql);

while ($row = $result->fetch_assoc()) {

    $count = $result->num_rows;

}



if ($count > 0 ) {

        $sql = "SELECT * FROM `users` WHERE `email` = '$email' ";
        $result = $con->query($sql);
        while ($row = $result->fetch_assoc()) {
            $data = $row;
        }
    
        echo json_encode($data);
    
    // echo json_encode("done");

} else {
    
    echo json_encode("not done");
}




?>