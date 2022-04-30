<script>
            //禁用“确认重新提交表单”
            window.history.replaceState(null, null, window.location.href);
</script>


<!DOCTYPE html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>1</title>
    <link href="font-awesome-4.7.0\css\font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="index.css" rel="stylesheet" type="text/css"/>
    <script src="particles.min.js"></script>
</head>

<body>

       <div id="particles-js"></div>




    <div class="nav">
    sss

    </div>




    <div id="pic-box">


        <div class="log">
        </div>

        <div id='pic'>
            <img alt="" id='rand-pic'>
        </div>
        <div id="pic-info-title">
                <h1 id="fore-title"></h1>
                <h2 id="mid-title"></h1>
                <h2 id="suffix-title"></h1>
        </div>
        
        <script type="text/javascript" src="https://pss.bdstatic.com/r/www/cache/static/protocol/https/jquery/jquery-1.10.2.min_65682a2.js"></script>
 <script type="text/javascript">
               

                function getpic(){
                    console.log("图片获取开始");
                    $.getJSON("getpic.php",function(picjson){
                        var picinfo = picjson;
                        var fore = picinfo[0].fore.fore;
                        var rand = picinfo[0].rand;
                        var mid = picinfo[0].mid.mid;
                        var suffix = picinfo[0].suffix.suffix;
                        var picpath = picinfo[0].picpath.pic_path;
                        console.log(picinfo[0]);
                        console.log(fore,mid,suffix);
                        console.log(picpath,rand);
                        document.getElementById("rand-pic").src=picpath;
                        document.getElementById("fore-title").innerHTML=fore;
                        document.getElementById("mid-title").innerHTML=mid;
                        document.getElementById("suffix-title").innerHTML=suffix;

                    })
 
                }
                    
                getpic();
                
            </script>

        <button onclick="getpic()" type="$_GET" name="rand" class="rand-button"><em class="fa fa-refresh"></em></button>
       
           


    </div>

    <div id="bottom-site-info">
        <div id="declaration"><a>声明</a></div>
        <script>
            $.getJSON("getsiteinfo.php",function(siteinfojson){
                var siteinfo = siteinfojson;
                
                var totalpicnum = siteinfo[0].total_pic_num[0];
                document.getElementById("total-pic-num").innerHTML=totalpicnum;
            }
            )
        </script>
                    <p>收集了<em id="total-pic-num"></em>张</p>
    </div>
 
  
</body>



