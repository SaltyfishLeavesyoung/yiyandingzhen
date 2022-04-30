<?php
    
    $hasloaded = $_POST["hasloaded"];

    
    $servername = "";
    $username = "";
    $password = "";

    $conn = new mysqli($servername , $username, $password);

    if ($conn -> connect_error) {
        die("ERROR CONNECTING" . $conn -> connect_error);
    }

    mysqli_select_db($conn , "yiyandingzhen");

    $sql_search = "SELECT totalvisit FROM siteinfo";
    $retvar = $conn -> query($sql_search);

    $result = mysqli_fetch_array($retvar);

    if($hasloaded){
        $totalvisit = $result[0]+1;
        $conn -> query("delete from siteinfo where totalvisit='$result[0]' ");
        $conn -> query("insert into siteinfo (totalvisit) values ('$totalvisit')");
    }

    

    $retarr[] = array(
        'totalvisit' => $totalvisit,
    );

    echo json_encode($retarr,JSON_UNESCAPED_UNICODE);


?>