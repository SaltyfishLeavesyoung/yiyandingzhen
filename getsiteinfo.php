<?php

require_once("password.php");

$conn = new mysqli($servername , $username, $password);

if ($conn -> connect_error) {
    die("ERROR CONNECTING" . $conn -> connect_error);
}

mysqli_select_db($conn , "yiyandingzhen");


    $total_pic_num = mysqli_fetch_array($conn -> query("SELECT COUNT(*) FROM yiyandingzhen")) ;

    $dbsql = 'SELECT * FROM yiyandingzhen';
    $retvar = $conn -> query($dbsql);
    $data = mysqli_fetch_all($retvar);



    $retarr[] = array(
        
        'total_pic_num' => $total_pic_num

    );

    echo json_encode($retarr); 

?>