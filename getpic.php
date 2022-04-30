<?php

$id = $_POST["id"];

$servername = "";
$username = "";
$password = "";

$conn = new mysqli($servername , $username, $password);

if ($conn -> connect_error) {
    die("ERROR CONNECTING" . $conn -> connect_error);
}

mysqli_select_db($conn , "yiyandingzhen");

    $maxrandval = mysqli_fetch_array($conn -> query("SELECT MAX(pic_id) FROM yiyandingzhen"));
    $rand = rand(0 ,(int)$maxrandval[0]);

    $dbsql = 'SELECT * FROM yiyandingzhen';
    $retvar = $conn -> query($dbsql);
    $data = mysqli_fetch_all($retvar);

    //避免结果不存在
    while ((mysqli_fetch_array($conn -> query("SELECT COUNT(pic_id) FROM yiyandingzhen where pic_id ='$rand'")))[0] == 0){
        $rand = rand(0 ,(int)$maxrandval[0] - 1);
    }
    
    
    if($id !== null){
        $fore = mysqli_fetch_array($conn -> query("SELECT fore FROM yiyandingzhen WHERE pic_id = {$id}" ));
        $mid = mysqli_fetch_array($conn -> query("SELECT mid FROM yiyandingzhen WHERE pic_id = {$id} " ));
        $suffix = mysqli_fetch_array($conn -> query("SELECT suffix FROM yiyandingzhen WHERE pic_id = {$id} " ));
        $picPath =  mysqli_fetch_array($conn -> query("SELECT pic_path FROM yiyandingzhen WHERE pic_id = {$id} " ));

        $picFolderPath = "pic";

        $retarr[] = array(
        
            'fore' => $fore,
            'mid' => $mid,
            'suffix' => $suffix,
            'picpath' => $picPath,
            'request-id' => $id,);
            echo json_encode($retarr); 
    }else{
       $fore = mysqli_fetch_array($conn -> query("SELECT fore FROM yiyandingzhen WHERE pic_id = {$rand} " ));
        $mid = mysqli_fetch_array($conn -> query("SELECT mid FROM yiyandingzhen WHERE pic_id = {$rand} " ));
        $suffix = mysqli_fetch_array($conn -> query("SELECT suffix FROM yiyandingzhen WHERE pic_id = {$rand} " ));
        $picPath =  mysqli_fetch_array($conn -> query("SELECT pic_path FROM yiyandingzhen WHERE pic_id = {$rand} " ));

        $picFolderPath = "pic";

        $retarr[] = array(
        
            'fore' => $fore,
            'mid' => $mid,
            'suffix' => $suffix,
            'picpath' => $picPath,
            'rand_status' => $rand_status,
            'rand' => $rand,
            'request-id' => $id,

    ); echo json_encode($retarr); 
    }

?>