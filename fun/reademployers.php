<?php

error_reporting(0);

include("../connect.php");

$employer = $_POST['employer'];

if($employer == 'employer'){

    $sql = "SELECT * FROM `users` WHERE `accounttypeAR`='صاحب العمل' AND `accounttypeEN`='Employer' AND `accounttypeFR`='Employer' ORDER BY id DESC LIMIT 5 ";
    $result = $con->query($sql);
    
    while($row = $result->fetch_assoc()){
    
        $uid = $row['id'];

        $sql1 = "SELECT SUM(rating) AS totl FROM  `rating` WHERE `id` = $uid";
        $result1 = $con->query($sql1);
        while($row1 = $result1->fetch_assoc()){

            $urate = $row1['totl'];

         
        }


        $sql1 = "SELECT * FROM `rating` WHERE `id` = $uid";
        $result1 = $con->query($sql1);
        while($row1 = $result1->fetch_assoc()){

            $uratetotale = $result1->num_rows;

            $row['uratetotale']=$uratetotale ;
            $row['rate'] = $urate / $uratetotale ;
        }
       


        $data[] = $row;
    }
    
    echo json_encode($data);
}else{
    $sql = "SELECT * FROM `users` WHERE `accounttypeAR`='صاحب العمل' AND `accounttypeEN`='Employer' AND `accounttypeFR`='Employer' ORDER BY id DESC ";
    $result = $con->query($sql);
    
    while($row = $result->fetch_assoc()){
    
        $data[] = $row;
    }
    
    echo json_encode($data);
}


?>