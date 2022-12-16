<?php

$con = mysqli_connect("localhost", "root", "", "apratim");

$res = array();

$sid = $_GET['sid'];



if ($con) {

    session_start();

    

    $sqls = "select * from login where sess_tok = '$sid'";
    $results = mysqli_query($con, $sqls);

    $count = mysqli_num_rows($results);

    $row2 = mysqli_fetch_assoc($results);

    $sql = "select * from users";
    $result = mysqli_query($con, $sql);









    if ($count > 0) {


        if ($row2['status'] == "active") {

            while ($row1 = mysqli_fetch_assoc($result)) {

                $x = 0;


                if ($row1['username'] == $row2['username']) {

                    $res[$x]['id'] = $row1['id'];
                    $res[$x]['name'] = $row1['name'];
                    $res[$x]['username'] = $row1['username'];
                    $res[$x]['last_name'] = $row1['last'];

                }


            }
        } else {
            echo "session ended ";
        }

        echo json_encode($res, JSON_PRETTY_PRINT);

    } else {
        echo "token not saved";
    }



} else {
    echo "data connection failed";
}
?>