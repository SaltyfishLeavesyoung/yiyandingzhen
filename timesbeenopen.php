<?php
    
    $hasloaded = $_POST["hasloaded"];

    
require_once("password.php");

    if($hasloaded){
        $file = fopen("timesbeenopen.txt" , "r");
        $totalvisit = (int)fread($file,filesize("timesbeenopen.txt"));
        $newtotalvisit = $totalvisit + 1;
        $file = fopen("timesbeenopen.txt" , "w");
        fwrite($file,$newtotalvisit);   
    }

    

    $retarr[] = array(
        'totalvisit' => $totalvisit,
    );

    echo json_encode($retarr,JSON_UNESCAPED_UNICODE);


?>