<?php

$con = mysqli_connect("localhost" , "root" , "" , "apratim");



$sid = $_GET['sid'] ; 

$status = "not active" ;



if ($con) {

    date_default_timezone_set('Asia/Kolkata');
    $time = date("hisa");


    $sqls = "UPDATE `login` SET `status` = 'not active' , `time2` ='$time'  WHERE `login`.`sess_tok` = $sid and  `login`.`status` = 'active'; ";

    $results = mysqli_query($con, $sqls);

    $aff = mysqli_affected_rows($con);



    if ($results) {

        if ($aff > 0) {

            echo "logged off successfully";

        } else {
            echo "session not found or already dismissed ";
        }

    } else {
        echo "error in logging off" . mysqli_error($con, $sqls);

    }



}


else{
    echo "data connection failed" ; 
}
?>