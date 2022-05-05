<?php

require_once("password.php");


$conn = new mysqli($servername , $username, $password);

if ($conn -> connect_error) {
    die("ERROR CONNECTING" . $conn -> connect_error);
}

mysqli_select_db($conn , "yiyandingzhen");


    $dbsql = 'SELECT * FROM yiyandingzhen';
    $retvar = $conn -> query($dbsql);
    $data = mysqli_fetch_all($retvar);

       $result = mysqli_fetch_all($conn -> query("SELECT * FROM yiyandingzhen WHERE verified = 0 " ));
       $feedback = mysqli_fetch_all($conn -> query("SELECT * FROM feedback WHERE hasRead = 0 " ));


        $picFolderPath = "pic";

        $retarr[] = array(
            
            'result' => $result,
'feedback' => $feedback,
    ); 



    echo json_encode($retarr); 
