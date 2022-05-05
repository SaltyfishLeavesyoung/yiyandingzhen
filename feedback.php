
<?php
    
    $feedback=$_POST["feedback"];
    
    //数据库
    require_once("password.php");

    $conn = new mysqli($servername , $username, $password);

    if ($conn -> connect_error) {
        die("ERROR CONNECTING" . $conn -> connect_error);
    }

    mysqli_select_db($conn , "yiyandingzhen");

    $maxval = mysqli_fetch_array($conn -> query("SELECT MAX(feedback_id) FROM feedback"));

    $feedback_id=   (int)$maxval[0] + 1;
    $time  = (int)time();
    //数据库保存
    $save_sql = "insert into feedback (feedback_id, feedback, time, hasRead) values ('$feedback_id','$feedback' ,'$time', 0)";
    $conn->query($save_sql);
    
    $retarr[] = array(
        
    );

    echo json_encode($retarr,JSON_UNESCAPED_UNICODE);
?>