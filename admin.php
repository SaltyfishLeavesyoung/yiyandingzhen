
<?php
$psword=$_GET['password'];
    if ($psword != ""){
        echo "你有密码吗？想当管理我可以给你捏~";
        exit();
    };
?>

<html>
    
<head>
    <script>
        //禁用“确认重新提交表单”
        window.history.replaceState(null, null, window.location.href);
    </script>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
</head>
<style>
    body{
        font-size:20px;
    }
.pic-box{
    padding: 10px;
    height: 100px;
    display: block;
    border: 2px soild black;
}
#result-box{
    background-color: aliceblue;
    padding: 10px;
    border: 2px soild black;
}
.upload-form{
    position: fixed;
    bottom: 20px;
    right: 20px;
    padding: 20px;
    background: aliceblue;
}
.upload-form textarea{
    height: 100px;
    
}
</style>

<div id="result-box">
    
</div>

<div class="upload-form">
<form id="upload-form">
    
<textarea name="exception" placeholder="除开？114514 to delete, ,to sep"></textarea>

</form>
<button onclick="upload()" type="$_POST" name="upload">通过了</button>
</div>





<script type="text/javascript" src="https://pss.bdstatic.com/r/www/cache/static/protocol/https/jquery/jquery-1.10.2.min_65682a2.js"></script>
<link href="font-awesome-4.7.0\css\font-awesome.css" rel="stylesheet" type="text/css" />

        <script>

            $.getJSON("admin-get.php", function(picjson) {
                
                var picinfo = picjson;
                
                console.log(picinfo);
                resultnum = picinfo[0].result.length;
                var result_box = document.getElementById("result-box");
                
                for (i = 0; i < resultnum; i++) {
                    
                var fore = picinfo[0].result[i][1];
                var mid = picinfo[0].result[i][2];
                var suffix = picinfo[0].result[i][3];
                var picpath = picinfo[0].result[i][4];
                var id = picinfo[0].result[i][0]
                
                var pic_box = document.createElement("img");
                result_box.appendChild(pic_box);
                pic_box.src= picpath;
                pic_box.className= "pic-box";

                var word_box = document.createElement("a");
                result_box.appendChild(word_box);
                word_box.innerHTML= fore + "|" + mid + "|" + suffix +":" + id;
                word_box.className= "word-box";
                
    };
})

    function upload(){
        var ToUpload = new FormData(document.getElementById("upload-form"));
                        $.ajax({
                            cache: false,
                            url: "admin-work.php",
                            type: "post",
                            processData: false,
                            contentType: false,
                            data: ToUpload,
                            success: function(resultjson) {
                                var resultjson = JSON.parse(resultjson);
                                console.log(resultjson);
                                
                            }
                        })
                        location.reload();
    }
            
    
        </script>
    






    </html>