<?php
    
    include_once "pinyin.php";

    $fore = $_POST['upload-input-fore'];
    $mid = $_POST['upload-input-mid'];
    $suffix = $_POST['upload-input-suffix'];

    $file_result = $_FILES["user-upload"];
    $file = $_FILES["user-upload"]["name"];
    $file_suffix = substr($file,strpos($file,"."));

    //数据库
require_once("password.php");

    $conn = new mysqli($servername , $username, $password);

    if ($conn -> connect_error) {
        die("ERROR CONNECTING" . $conn -> connect_error);
    }

    mysqli_select_db($conn , "yiyandingzhen");
    $total_pic_num = mysqli_fetch_array($conn -> query("SELECT COUNT(*) FROM yiyandingzhen"))[0] ;
    $max_id = mysqli_fetch_array($conn -> query("SELECT MAX(pic_id) FROM yiyandingzhen"));
    $pic_id = $max_id[0] + 1;
    $new_file = $pic_id.'_'.Pinyin::getPinyin($fore).$file_suffix;
    
    $savepath = "pic";
    if(is_dir($savepath)){
        move_uploaded_file($_FILES["user-upload"]["tmp_name"],$savepath."/".$new_file);
        $SERVER = $_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
        $pic_url = $savepath.'/'.$new_file;
        $time = time();
    }


    //数据库保存
    $save_sql = "insert into yiyandingzhen (pic_id, fore, mid, suffix, pic_path, time) values ('$pic_id' ,'$fore', '$mid', '$suffix', '$pic_url', '$time')";
    
    if ($conn->query($save_sql) === TRUE){ 
        $sql_status = "ok";
    }


    $retarr[] = array(
        'result' => $file_result,
        'file_suffix' => $file_suffix,
        'new_file_name' => $new_file,
        'pic_fore' => $fore,
        'pic_mid' => $mid,
        'pic_suffix' => $suffix,
        'pic_url' => $pic_url,
        'id' => $pic_id,
        'sql' => $sql_status
    );

    echo json_encode($retarr,JSON_UNESCAPED_UNICODE);


?>