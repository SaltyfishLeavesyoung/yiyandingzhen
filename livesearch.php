<?php
    $search_name = $_POST["search-name"];


require_once("password.php");

    $conn = new mysqli($servername , $username, $password);

    if ($conn -> connect_error) {
        die("ERROR CONNECTING" . $conn -> connect_error);
    }

    mysqli_select_db($conn , "yiyandingzhen");

    
   
    $sql_search = "SELECT * FROM yiyandingzhen WHERE fore LIKE '%$search_name%'";
    if (is_numeric($search_name)){
        $search_name = (int)$search_name;
        $sql_search = "SELECT * FROM yiyandingzhen WHERE pic_id = '$search_name'";
    }
    
    $sql_latest_search = "SELECT * from yiyandingzhen where time = (SELECT max(time) FROM yiyandingzhen)";
    $retvar = $conn -> query($sql_search);
    $retvar_latest = $conn -> query($sql_latest_search);
    $result_search = mysqli_fetch_all($retvar);
    $result_latest_search = mysqli_fetch_all($retvar_latest);


    $retarr[] = array(
        'result' => $result_search,
        'latest' => $result_latest_search,
        'keyword' => $search_name,
    );

    echo json_encode($retarr,JSON_UNESCAPED_UNICODE);




?>