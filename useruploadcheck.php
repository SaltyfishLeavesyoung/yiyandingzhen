<?php
    
    $search_name = $_POST["search-name"];


    $servername = "";
    $username = "";
    $password = "";

    $conn = new mysqli($servername , $username, $password);

    if ($conn -> connect_error) {
        die("ERROR CONNECTING" . $conn -> connect_error);
    }

    mysqli_select_db($conn , "yiyandingzhen");

    $sql_search = "SELECT COUNT(*) FROM yiyandingzhen WHERE fore LIKE '$search_name%'";
    $retvar = $conn -> query($sql_search);

    $result_search = mysqli_fetch_all($retvar);

    $retarr[] = array(
        'result' => $result_search,
        'keyword' => $search_name,
    );

    echo json_encode($retarr,JSON_UNESCAPED_UNICODE);


?>