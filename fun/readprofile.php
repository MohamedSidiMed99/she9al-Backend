<?php

error_reporting(0);

include("../connect.php");


$id =$_POST['id'];

$sql = "SELECT * FROM `users` WHERE `id` =$id ";
$result = $con->query($sql);

while($row = $result->fetch_assoc()){


    $sql1 = "SELECT SUM(rating) AS totl FROM  `rating` WHERE `id` = $id";
    $result1 = $con->query($sql1);
    while($row1 = $result1->fetch_assoc()){

        $urate = $row1['totl'];

     
    }


    $sql1 = "SELECT * FROM `rating` WHERE `id` = $id";
    $result1 = $con->query($sql1);
    while($row1 = $result1->fetch_assoc()){

        $uratetotale = $result1->num_rows;
        $row['uratetotale']=$uratetotale ;
        $row['rate'] = $urate / $uratetotale ;
    }

    $data = $row;
}

echo json_encode($data);

?>