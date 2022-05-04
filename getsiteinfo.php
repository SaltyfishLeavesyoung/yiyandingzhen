<?php

require_once("password.php");

$conn = new mysqli($servername , $username, $password);

if ($conn -> connect_error) {
    die("ERROR CONNECTING" . $conn -> connect_error);
}

mysqli_select_db($conn , "yiyandingzhen");


    $total_pic_num = mysqli_fetch_array($conn -> query("SELECT COUNT(*) FROM yiyandingzhen")) ;
    $wait_to_verify = mysqli_fetch_array($conn -> query("SELECT COUNT(*) FROM yiyandingzhen where verified = 0")) ;


    $retarr[] = array(
        
        'total_pic_num' => $total_pic_num,
        'wait_to_verify' => $wait_to_verify
    );

    echo json_encode($retarr); 

?>