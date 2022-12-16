<?php

$con = mysqli_connect("localhost", "root", "", "apratim");

$name = $_POST['name'];
$last = $_POST['last'];
$username = $_POST['username'];
$pass = $_POST['pass'];
$college = $_POST['college'];



if ($con) {

    $sqls = "select * from users";
    $results = mysqli_query($con, $sqls);

    while ($row = mysqli_fetch_assoc($results)) {

        if ($row['username'] == $_POST['username']) {

            echo "user already exist";

            exit;



        }
    }


    $sql = "INSERT INTO `users`(`name`, `last`, `username`, `password`, `college_name`) VALUES ('$name','$last','$username','$pass','$college')";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $x = 0;

        echo "registered successfully";

    } else {
        echo "error";
    }


} else {
    echo "data connection failed";
}
?>
