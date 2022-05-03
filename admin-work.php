<?php


    $exception_post = $_POST["exception"];
    $exception[] = explode(",",$exception_post);  
    
    
    
    require_once("password.php");
    
    $conn = new mysqli($servername , $username, $password);
    
    if ($conn -> connect_error) {
        die("ERROR CONNECTING" . $conn -> connect_error);
    }
    
    mysqli_select_db($conn , "yiyandingzhen");
    
    
        $dbsql = 'SELECT * FROM yiyandingzhen';
        $retvar = $conn -> query($dbsql);
        $data = mysqli_fetch_all($retvar);
    
           $result = mysqli_fetch_all($conn -> query("SELECT * FROM yiyandingzhen WHERE verified = 0 " ));
    
        if($exception[0][0]==""){
            $sql_request = "UPDATE yiyandingzhen SET verified = 1 WHERE verified = 0";
            $mode = 1;
            $conn -> query($sql_request);
        }else if($exception[0][0]==114514){
            for($i=1;$i<count($exception[0]);$i++){
                $exception_for = $exception[0][$i];
                $sql_request = "DELETE FROM yiyandingzhen WHERE pic_id = $exception_for";
                $conn -> query($sql_request);
            
            }
            $mode = 3;
        }
        else{
            $sql_request = "UPDATE yiyandingzhen SET verified = 1 WHERE verified = 0";
            $conn -> query($sql_request);
            for($i=0;$i<count($exception[0]);$i++){
                $exception_for = $exception[0][$i];
                $sql_request = "UPDATE yiyandingzhen SET verified = 0 WHERE pic_id = '$exception_for' ";
                $conn -> query($sql_request);
            
            }
            $mode = 2;
    }
    
        
    
            $retarr[] = array(
                'request' => $sql_request,
                '?' => $mode,
                'result' => $result,
                'exception' => count($exception[0]),
                'status' => $status
    
        ); 
    
    
    
    
        echo json_encode($retarr); 
    

