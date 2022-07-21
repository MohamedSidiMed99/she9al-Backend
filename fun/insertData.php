<?php

error_reporting(0);

include("../connect.php");

$date = $_POST['date'];
$email = $_POST['email'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$phone = $_POST['phone'];
$experiance = $_POST['experiance'];
$age = $_POST['age'];
$about = $_POST['about'];
$salary = $_POST['salary'];


$accounttypeAR = $_POST['accounttypeAR'];
$accounttypeEN = $_POST['accounttypeEN'];
$accounttypeFR = $_POST['accounttypeFR'];


$genderAR = $_POST['genderAR'];
$genderEN = $_POST['genderEN'];
$genderFR = $_POST['genderFR'];

$cityAR = $_POST['cityAR'];
$cityEN = $_POST['cityEN'];
$cityFR = $_POST['cityFR'];

$workAR = $_POST['workAR'];
$workEN = $_POST['workEN'];
$workFR = $_POST['workFR'];

$img = $_FILES['img']['name'];
$upload ='../img/'.$img;
$tmp_name =$_FILES['img']['tmp_name'];

move_uploaded_file($tmp_name,$upload);


$document = $_FILES['document']['name'];
$upload ='../documents/'.$document;
$tmp_name =$_FILES['document']['tmp_name'];

move_uploaded_file($tmp_name,$upload);


$sql = "INSERT INTO `users` (
    `username`,
    `email`,
    `password`,
    `phone`,
    `date`,
    `salary`,
    `experiance`,
    `age`,
    `about`,
    `accounttypeAR`,`accounttypeEN`,`accounttypeFR`,
    `genderAR`,
    `genderEN`,
    `genderFR`,
    `cityAR`,`cityEN`,`cityFR`,
    `workAR`,`workEN`,`workFR`,
    `img`,
    `document`
) VALUES (
    '$name',
    '$email',
    '$pass',
    '$phone',
    '$date',
    '$salary',
    '$experiance',
    '$age',
    '$about',
    '$accounttypeAR','$accounttypeEN','$accounttypeFR',
    '$genderAR',
    '$genderEN',
    '$genderFR',
    '$cityAR','$cityEN','$cityFR',
    '$workAR','$workEN','$workFR',
    '$img',
    '$document'

)";

$result = $con->query($sql);


if($result){
    echo json_encode("done");
}

?>