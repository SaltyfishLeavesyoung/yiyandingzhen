<?php
    $hasRequired=$_POST["hasRequired"];
    
        $file = fopen("timesbeenrequired.txt" , "r");
        $totalrequired = (int)fread($file,filesize("timesbeenrequired.txt"));
    if($hasRequired){    
        $newtotalrequired = $totalrequired + 1;
        $file = fopen("timesbeenrequired.txt" , "w");
        fwrite($file,$newtotalrequired);   
    }


    $retarr[] = array(
        'totalrequired' => $totalrequired,
    );

    echo json_encode($retarr,JSON_UNESCAPED_UNICODE);


?>