<?php

        $file = fopen("timesbeenrequired.txt" , "r");
        $totalrequired = (int)fread($file,filesize("timesbeenrequired.txt"));
        $newtotalrequired = $totalrequired + 1;
        $file = fopen("timesbeenrequired.txt" , "w");
        fwrite($file,$newtotalrequired);   



    $retarr[] = array(
        'totalrequired' => $totalrequired,
    );

    echo json_encode($retarr,JSON_UNESCAPED_UNICODE);


?>