<?php

$id = $_POST["id"];
$add1 = $_POST["add1"];

require_once("password.php");

$conn = new mysqli($servername , $username, $password);

if ($conn -> connect_error) {
    die("ERROR CONNECTING" . $conn -> connect_error);
}

mysqli_select_db($conn , "yiyandingzhen");


    $beng = mysqli_fetch_array($conn -> query("SELECT beng FROM yiyandingzhen WHERE pic_id = {$id}")) ;
    if($add1){
        $newbeng = $beng[0] + 1;
        $conn -> query("UPDATE yiyandingzhen SET beng = {$newbeng} WHERE pic_id = {$id}");
    }

    $retarr[] = array(
        'beng' => $beng,
    );

    echo json_encode($retarr); 

?>