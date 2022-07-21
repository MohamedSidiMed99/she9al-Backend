<?php

error_reporting(0);

include("../connect.php");

$id = $_POST['id'];
$userrateid = $_POST['userrateid'];
$rating = $_POST['rating'];

$sql = "SELECT * FROM `rating` WHERE `id` = $id AND `userrateid` = $userrateid ";
$result = $con->query($sql);

while($row = $result->fetch_assoc()){
   
    $count = $result->num_rows;
}



if($count >0){
    $sql = "UPDATE `rating` SET 
    `rating` = $rating
     WHERE `id`=$id  AND `userrateid` =$userrateid";

    $result = $con->query($sql);

    echo json_encode("updated");

}else{
    $sql = "INSERT INTO  `rating`(`id`,`userrateid`,`rating`) VALUES($id,$userrateid,$rating) ";
    $result = $con->query($sql);

    echo json_encode("inserted");
}


?>