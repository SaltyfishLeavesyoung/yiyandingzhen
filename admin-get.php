<?php

$servername = "";
$username = "";
$password = "";

$conn = new mysqli($servername , $username, $password);

if ($conn -> connect_error) {
    die("ERROR CONNECTING" . $conn -> connect_error);
}

mysqli_select_db($conn , "yiyandingzhen");


    $dbsql = 'SELECT * FROM yiyandingzhen';
    $retvar = $conn -> query($dbsql);
    $data = mysqli_fetch_all($retvar);

       $result = mysqli_fetch_all($conn -> query("SELECT * FROM yiyandingzhen WHERE verified = 0 " ));


        $picFolderPath = "pic";

        $retarr[] = array(
        
            'result' => $result

    ); 



    echo json_encode($retarr); 
