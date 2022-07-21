<?php

error_reporting(0);

include("../connect.php");

$work = $_POST['work'];

if($work == 'worker'){

    $sql = "SELECT * FROM `users` WHERE `accounttypeAR`='عامل' AND `accounttypeEN`='Worker' AND `accounttypeFR`='Brute' ORDER BY id DESC LIMIT 5 ";
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
       
        

        // $row['rate'] = $uid;
        $data[] = $row;
    }
    
    echo json_encode($data);
}else{
    $sql = "SELECT * FROM `users` WHERE `accounttypeAR`='عامل' AND `accounttypeEN`='Worker' AND `accounttypeFR`='Brute' ORDER BY id DESC ";
    $result = $con->query($sql);
    
    while($row = $result->fetch_assoc()){
    

        $data[] = $row;
    }
    
    echo json_encode($data);
}


?>