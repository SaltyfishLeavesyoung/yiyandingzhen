<?php


    $hasRead = $_POST["hasRead"];
    
    require_once("password.php");
    
    $conn = new mysqli($servername , $username, $password);
    
    if ($conn -> connect_error) {
        die("ERROR CONNECTING" . $conn -> connect_error);
    }
    
    mysqli_select_db($conn , "yiyandingzhen");
    
    
        $dbsql = 'SELECT * FROM yiyandingzhen';
        $retvar = $conn -> query($dbsql);
        $data = mysqli_fetch_all($retvar);
    
    
    
        $feedback = mysqli_fetch_all($conn -> query("SELECT * FROM feedback WHERE hasRead = 0 " ));    
        $save_sql = "UPDATE feedback SET hasRead = 1 WHERE hasRead = 0 ";
        $conn->query($save_sql);   
    
    
    

