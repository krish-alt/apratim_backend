<?php

$con = mysqli_connect("localhost", "root", "", "apratim");


$username = $_POST['username'];
$pass = $_POST['pass'];




if ($con) {

    $sql = "select * from users where username = '$username' and password = '$pass'";

    $result = mysqli_query($con, $sql);

    $count = mysqli_num_rows($result);

    // while($row =  mysqli_fetch_assoc($results)) {

    //     if($row['username']== $_POST['username']){

    //         if($row['username'] == $_POST['pass']){

    //             echo "login successfully" ;
    //         }



    //     }
    // }

    if ($count > 0) {

        session_start();
        //create random sid

        date_default_timezone_set('Asia/Kolkata');

        $today = date('Ymd');
        $time = date("hisa");
        $range = $today;
        $rand = rand(0, $range);

        $sid = $time + $rand;

        $_SESSION['sid'] = $sid ; 

        // $_SESSION['sessionid'] = $sid ;  

        $status = "active";
       

        //first time user






        $_SESSION['username'] = $username;
        $_SESSION['password'] = $pass;


        $sql = "INSERT INTO `login`(`username`, `password`, `sess_tok`, `status`,`time1`) VALUES ('$username','$pass','$sid','$status' , '$time')";
        $results = mysqli_query($con, $sql);



        echo "login successfully";
        
    } else {
        echo "user not found";
    }



} else {
    echo "data connection failed";
}
?>