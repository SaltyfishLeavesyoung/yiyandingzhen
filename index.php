<!DOCTYPE html>
<script>
    //禁用“确认重新提交表单”
    window.history.replaceState(null, null, window.location.href);
</script>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=0.8, minimum-scale=0.7, maximum-scale=2.0, user-scalable=yes" />
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>义眼丁真收集站</title>
    <link href="font-awesome-4.7.0\css\font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="index.css" rel="stylesheet" type="text/css" />
    <link href="favicon.ico" rel="shortcut icon">
    <script type="text/javascript" src="https://pss.bdstatic.com/r/www/cache/static/protocol/https/jquery/jquery-1.10.2.min_65682a2.js"></script>
    <script type="text/javascript" src="js\jquery-form.js"></script>
</head>

<body onclick="">

    <div class="bg">
        <div class="bg-1"></div>

    </div>

    <div id="particles-js"></div>

    <script>
        if (document.body.clientWidth > 480) {
            var script1 = document.createElement('script');
            script1.setAttribute('type', 'text/javascript');
            script1.setAttribute('src', "particles.js");
            document.getElementById("particles-js").appendChild(script1);
            var script2 = document.createElement('script');
            script2.setAttribute('type', 'text/javascript');
            script2.setAttribute('src', "js\\particles-app.js");
            document.getElementById("particles-js").appendChild(script2);

        }
    </script>

    <!-- 中间的大盒子 -->
    <div id="pic-box">

        <script>
            function status_switch() {

                // 开关图标切换
                if (!document.getElementById("status-switch-icon").classList.contains('fa-search')) {
                    {
                        document.getElementById("status-switch-icon").classList.remove('fa-random');
                        document.getElementById("status-switch-icon").classList.add('fa-search', 'fa-flip-horizontal');
                    }
                    document.getElementById('rand-pic-section').classList.remove("big-box-scale-up");
                    document.getElementById('rand-pic-section').classList.add("big-box-scale-down");
                    setTimeout(function() {
                        document.getElementById('rand-pic-section').style.display = "none";
                    }, 399);
                    setTimeout(function() {
                        document.getElementById('pic-search-section').style.display = "block";
                        document.getElementById('pic-search-section').classList.add("big-box-scale-up");
                        document.getElementById('pic-search-section').classList.remove("big-box-scale-down");
                    }, 399);
                } else {
                    document.getElementById("status-switch-icon").classList.remove('fa-search', 'fa-flip-horizontal');
                    document.getElementById("status-switch-icon").classList.add('fa-random');
                    document.getElementById('pic-search-section').classList.remove("big-box-scale-up");
                    document.getElementById('pic-search-section').classList.add("big-box-scale-down");
                    setTimeout(function() {
                        document.getElementById('pic-search-section').style.display = "none";
                    }, 399);
                    setTimeout(function() {
                        document.getElementById('rand-pic-section').style.display = "block";
                        document.getElementById('rand-pic-section').classList.add("big-box-scale-up");
                        document.getElementById('rand-pic-section').classList.remove("big-box-scale-down");
                    }, 399);
                }

            }
            //基于class做状态转换
        </script>


        <!-- 随机搜索切换按钮 -->
        <div onclick="status_switch()" id="status-switch-box" class="nav-button">
            <em id="status-switch-icon" class="fa fa-random">
            </em>
        </div>

        <div id="pic-box-icon">
            <a onclick="getpic(0)"><img id="pic-box-icon-img" src="favicon.png" alt="义眼丁真收集站"></a>
        </div>

        <div id="rand-pic-section">
            <div id='pic'>
                <img alt="" id='rand-pic'>
            </div>
            <div id="pic-info-title">
                <h1 id="fore-title"></h1>
                <h2 id="mid-title">
                    </h1>
                    <h2 id="suffix-title">
                        </h1>
            </div>

            <button onclick="getpic()" type="$_GET" name="rand" class="rand-button" id="rand-button"><em class="fa fa-refresh"></em></button>


            <script type="text/javascript">
                var i_pic_size = 0;
                window.i_pic_size = i_pic_size;

                function checkfontsize() {
                    var suffix_length = document.getElementById("suffix-title").innerText.length;
                    var mid_length = document.getElementById("mid-title").innerText.length;
                    var fore_length = document.getElementById("fore-title").innerText.length;
                    var maxlength = 12;
                    if (suffix_length > maxlength && window.i_pic_size == 0) {
                        // document.getElementById("pic-box").style.width = 400 + 'px';
                        document.getElementById("suffix-title").style.fontSize = 20 + 'px';
                        document.getElementById("suffix-title").style.top = 0 + 'px';
                        window.i_pic_size = window.i_pic_size + 1;
                    } else if (suffix_length <= 2 && window.i_pic_size == 0) {
                        // document.getElementById("pic-box").style.width = 400 + 'px';
                        document.getElementById("suffix-title").style.fontSize = 40 + 'px';
                        document.getElementById("suffix-title").style.top = -5 + 'px';
                        window.i_pic_size = window.i_pic_size + 1;
                    } else {
                        // document.getElementById("pic-box").style.width = 'fit-content';
                        document.getElementById("suffix-title").style.fontSize = 30 + 'px';
                        document.getElementById("suffix-title").style.top = 0 + 'px';
                    }
                }

                function checkpicsize() {
                    document.getElementById("rand-pic").style.maxWidth = (window.innerWidth - 100) + "px";

                }


                function getpic(id) {
                    console.log("图片获取开始");
                    if (id !== null && id !== undefined) {
                        if (window.i_pic_size !== 0) {
                            window.i_pic_size = 0;
                        }

                        $.ajax({
                            url: "getpic.php",
                            type: "post",
                            dataType: "text",
                            data: {
                                id
                            },
                            
                            success: function(resultjson) {
                                var picinfo = JSON.parse(resultjson);
                                var fore = picinfo[0].fore.fore;
                                var mid = picinfo[0].mid.mid;
                                var suffix = picinfo[0].suffix.suffix;
                                var picpath = picinfo[0].picpath[0];
                                
                                document.getElementById("fore-title").innerHTML = fore;
                                document.getElementById("mid-title").innerHTML = mid;
                                document.getElementById("suffix-title").innerHTML = suffix;
                                document.getElementById("pic-id").innerHTML = id;
                                loading();
                                document.getElementById("rand-pic").src = picpath;
                                document.title = fore + "|" + "义眼丁真收集站";

                                checkfontsize();
                                checkpicsize();
                                
                            }
                        })


                    } else {
                        if (window.i_pic_size !== 0) {
                            window.i_pic_size = 0;
                        }
                        $.getJSON("getpic.php", function(picjson) {
                            var picinfo = picjson;
                            if(picinfo[0].fore.fore){
                                var fore = picinfo[0].fore.fore;
                                var rand = picinfo[0].rand;
                                var mid = picinfo[0].mid.mid;
                                var suffix = picinfo[0].suffix.suffix;
                                var picpath = picinfo[0].picpath.pic_path;
                                
                                document.getElementById("fore-title").innerHTML = fore;
                                document.getElementById("mid-title").innerHTML = mid;
                                document.getElementById("suffix-title").innerHTML = suffix;
                                document.getElementById("pic-id").innerHTML = rand;
                                loading();
                                document.getElementById("rand-pic").src = picpath;
                                document.title = fore + "|" + "义眼丁真收集站";
                                checkfontsize();
                                checkpicsize(); 
                            }else{
                                getpic();
                            }
                            
                            
                        })


                    }


                }


                function loading() {
                    document.getElementById("rand-button").setAttribute("onclick"," ");
                    document.getElementById("rand-button").classList.add("rand-button-active");
                    
                    document.getElementById("rand-pic").style.display = "none";
                    var loading = document.createElement("i");
                    var loadingtext = document.createElement("i");
                    loading.className = "fa fa-circle fa-spin fa-3x fa-fw margin-bottom";
                    loading.id = "loading-anime";
                    loadingtext.innerText = "加载中";
                    loadingtext.id = "loading-text";
                    document.getElementById("pic").appendChild(loading);
                    document.getElementById("pic").appendChild(loadingtext);
                    console.log("loading");
                    document.getElementById("rand-pic").onload = function() {
                        document.getElementById("rand-pic").style.display = "block";
                        loading.remove();
                        loadingtext.remove();
                        console.log("loading complete");
                        //延时一秒
                        setTimeout(function(){
                        document.getElementById("rand-button").classList.remove("rand-button-active");
                        document.getElementById("rand-button").setAttribute("onclick","getpic()");
                    },1000);
                    }
                    
                }


                getpic();
            </script>






        </div>


        <div class="pic-id-box">
            <i id="pic-id"></i>
        </div>


        <div id="pic-search-section">


            <form autocomplete="off">
                <input oninput="showsearchresult()" onkeydown="return keydown(event)" name="search-name" id="search-box" type="search" placeholder="搜索">
            </form>



            <div id="search-result-box"></div>

            <script type="text/javascript">

                function keydown(e) {
                    if(e.keyCode===13){
                        return false
                    }
                }


                function showsearchresult() {
                    if (document.getElementById("search-box").value == "") {
                        $("#search-result-box").empty();
                    }

                    $.ajax({
                        url: "livesearch.php",
                        type: "post",
                        dataType: "text",
                        data: {
                            "search-name": document.getElementById("search-box").value
                        },
                        success: function(resultjson) {

                            $("#search-result-box").empty();
                            var search_result_box, result_li;

                            var resultjson = JSON.parse(resultjson);

                            // 返回结果数量
                            var resultnum = resultjson[0].result.length;

                            //yy数组
                            var resultfore = [];
                            for (i = 0; i < resultnum; i++) {
                                search_result_box = document.getElementById("search-result-box");

                                resultfore.push(resultjson[0].result[i][1]);

                                result_li = document.createElement("a");

                                result_li.innerHTML = resultjson[0].result[i][1] + " " + resultjson[0].result[i][2] + " " + resultjson[0].result[i][3];
                                result_li.className = "search-result";

                                id = resultjson[0].result[i][0];
                                result_li.id = "search-result" + id;
                                result_li_id = "search-result" + id;

                                search_result_box.appendChild(result_li);


                                if (resultnum == window.totalpicnum) {
                                    $("#search-result-box").empty();
                                    result_li = document.createElement("a");

                                    result_li.innerHTML = "最新上传的：" + resultjson[0].latest[0][1];
                                    id = resultjson[0].latest[0][0];
                                    result_li.className = "search-result";
                                    search_result_box.appendChild(result_li);




                                } else {
                                    document.getElementById(result_li_id).setAttribute("onclick", "livesearchclick(" + id + ")");

                                }


                            }

                        }


                    })

                }

                function livesearchclick(id) {
                    getpic(id);
                    status_switch();

                }
            </script>



        </div>


    </div>






    <!-- 底部导航 -->
    <div id="bottom-site-info">

        <!-- 开关底部导航栏 -->
        <script>
            function declaration() {
                if (!document.getElementById("declaration-box").style.display) {
                    document.getElementById('declaration-box').style.display = "block";
                    document.getElementById('declaration-box').classList.add("box-scale-up");
                    document.getElementById('declaration-box').classList.remove("box-scale-down");
                } else {
                    document.getElementById('declaration-box').classList.remove("box-scale-up");
                    document.getElementById('declaration-box').classList.add("box-scale-down");
                    setTimeout(function() {
                        document.getElementById('declaration-box').style.display = "";
                    }, 200);

                }
            }

            function declarationoff() {
                document.getElementById('declaration-box').classList.remove("box-scale-up");
                document.getElementById('declaration-box').classList.add("box-scale-down");
                setTimeout(function() {
                    document.getElementById('declaration-box').style.display = "";
                }, 200);

            }

            function recommendation() {
                if (!document.getElementById("recommendation-box").style.display) {
                    document.getElementById('recommendation-box').style.display = "block";
                    document.getElementById('recommendation-box').classList.add("box-scale-up");
                    document.getElementById('recommendation-box').classList.remove("box-scale-down");
                } else {
                    document.getElementById('recommendation-box').classList.remove("box-scale-up");
                    document.getElementById('recommendation-box').classList.add("box-scale-down");
                    setTimeout(function() {
                        document.getElementById('recommendation-box').style.display = "";
                    }, 200);

                }
            }

            function recommendationoff() {
                document.getElementById('recommendation-box').classList.remove("box-scale-up");
                document.getElementById('recommendation-box').classList.add("box-scale-down");
                setTimeout(function() {
                    document.getElementById('recommendation-box').style.display = "";
                }, 200);

            }

            function upload() {

                if (!document.getElementById("upload-box").style.display) {
                    document.getElementById('upload-box').style.display = "block";
                    document.getElementById('upload-box').classList.add("box-scale-up");
                    document.getElementById('upload-box').classList.remove("box-scale-down");
                } else {
                    document.getElementById('upload-box').classList.remove("box-scale-up");
                    document.getElementById('upload-box').classList.add("box-scale-down");
                    setTimeout(function() {
                        document.getElementById('upload-box').style.display = "";
                    }, 200);

                }
            }

            function uploadoff() {
                document.getElementById('upload-box').classList.remove("box-scale-up");
                document.getElementById('upload-box').classList.add("box-scale-down");
                setTimeout(function() {
                    document.getElementById('upload-box').style.display = "";
                }, 200);

            }

            function statistics() {


                if (!document.getElementById("statistics-box").style.display) {
                    document.getElementById('statistics-box').style.display = "block";
                    document.getElementById('statistics-box').classList.add("box-scale-up");
                    document.getElementById('statistics-box').classList.remove("box-scale-down");
                } else {
                    document.getElementById('statistics-box').classList.remove("box-scale-up");
                    document.getElementById('statistics-box').classList.add("box-scale-down");
                    setTimeout(function() {
                        document.getElementById('statistics-box').style.display = "";
                    }, 200);

                }
            }

            function statisticsoff() {
                document.getElementById('statistics-box').classList.remove("box-scale-up");
                document.getElementById('statistics-box').classList.add("box-scale-down");
                setTimeout(function() {
                    document.getElementById('statistics-box').style.display = "";
                }, 200);

            }
        </script>

        <div onclick="declaration()" class="nav-button" id="declaration-button"><a>声明</a></div>
        <div onclick="recommendation()" class="nav-button" id="recommendation-button"><a>引流</a></div>
        <div onclick="upload()" class="nav-button" id="upload-button"><a>上传</a></div>
        <div onclick="statistics()" class="nav-button" id="statistics-button"><a>统计</a></div>


        <div id="declaration-box">
            <p>欢迎来到义眼丁真收集站。</p>
            <p>这里收集了广大网友为<ruby>丁真珍珠<rt>བསྟན་འཛིན་བརྩོན་འགྲུས་</rt></ruby>先生所制作的义眼丁真图片。</p>
            <p>大部分内容来自互联网与用户上传，不代表本站管理者的意见，如果侵犯到您的权益请联系我，但我本人并没有任何对丁真本人的恶意。</p>
            <p>虽然大家可能抱着恶搞的心态在制作这些图片，但是请多多支持中国扶贫事业，不要以戏谑的眼光去看待我们的基层工作者，这是一项关乎民生的千年大计。</p>
            <p>我相信大家的三棺一定很正吧。</p>

        </div>


        <div id="recommendation-box">
            <ul id="recommendation-list">

                <a target="_blank" href="https://tieba.baidu.com/f?kw=%E5%AD%99%E7%AC%91%E5%B7%9D&ie=utf-8">
                    <li>
                        <svg t="1650785579855" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1403" width="200" height="200">
                            <path d="M1024 862.826667a161.152 161.152 0 0 1-161.173333 161.173333h-701.632a161.152 161.152 0 0 1-161.173334-161.173333v-701.632a161.194667 161.194667 0 0 1 161.173334-161.173334h701.632a161.194667 161.194667 0 0 1 161.173333 161.173334v701.632z" fill="#306FB6" p-id="1404"></path>
                            <path d="M828.842667 250.261333h-173.461334v-36.522666a17.066667 17.066667 0 0 0-17.066666-17.066667h-41.941334a17.045333 17.045333 0 0 0-17.045333 17.066667v263.296h-24.896a17.066667 17.066667 0 0 0-17.045333 17.066666V810.218667a17.066667 17.066667 0 0 0 17.045333 17.088h257.365333a17.066667 17.066667 0 0 0 17.066667-17.088v-58.986667h-0.256v-198.144h0.256v-58.986667a17.066667 17.066667 0 0 0-17.066667-17.066666H655.381333v-150.72h173.461334a17.066667 17.066667 0 0 0 17.066666-17.066667v-41.941333a17.066667 17.066667 0 0 0-17.066666-17.045334z m-93.376 302.848c9.429333 0 17.045333 7.637333 17.045333 17.066667v164.010667a17.066667 17.066667 0 0 1-17.045333 17.066666h-104.981334a17.045333 17.045333 0 0 1-17.045333-17.066666v-164.010667a17.066667 17.066667 0 0 1 17.045333-17.066667h104.981334zM197.909333 657.408h41.941334a17.088 17.088 0 0 0 17.088-17.088v-358.741333h174.528v358.741333a17.066667 17.066667 0 0 0 17.045333 17.088h41.941333a17.088 17.088 0 0 0 17.088-17.088v-417.749333c0-9.408-7.658667-17.066667-17.088-17.066667h-292.522666a17.066667 17.066667 0 0 0-17.045334 17.066667v417.749333a17.024 17.024 0 0 0 17.024 17.088z" fill="#FFFFFF" p-id="1405"></path>
                            <path d="M492.970667 739.2v-0.170667a110.656 110.656 0 0 1-110.656-110.656h-0.106667v-296.042666a17.066667 17.066667 0 0 0-17.066667-17.045334h-41.941333a17.045333 17.045333 0 0 0-17.045333 17.045334v296.042666h-0.362667a110.677333 110.677333 0 0 1-110.677333 110.656v0.170667a17.045333 17.045333 0 0 0-17.045334 17.066667v42.112a17.066667 17.066667 0 0 0 17.045334 17.066666 186.602667 186.602667 0 0 0 148.928-74.176 186.624 186.624 0 0 0 148.928 74.176 17.045333 17.045333 0 0 0 17.045333-17.066666v-42.112a17.024 17.024 0 0 0-17.045333-17.066667z" fill="#FFFFFF" p-id="1406"></path>
                            <path d="M865.450667 873.685333c17.664-3.797333 15.253333-24.896 14.741333-29.504-0.874667-7.125333-9.237333-19.541333-20.586667-18.581333-14.293333 1.28-16.362667 21.930667-16.362666 21.930667-1.962667 9.557333 4.608 29.952 22.208 26.154666z m18.752 36.693334c-0.533333 1.493333-1.664 5.290667-0.682667 8.597333 1.962667 7.402667 8.405333 7.744 8.405333 7.744h9.258667v-22.613333h-9.898667a10.837333 10.837333 0 0 0-7.082666 6.272z m14.037333-72.085334c9.749333 0 17.621333-11.221333 17.621333-25.109333 0-13.866667-7.872-25.088-17.621333-25.088-9.728 0-17.642667 11.221333-17.642667 25.088 0 13.888 7.893333 25.109333 17.642667 25.109333z m41.984 1.664c13.034667 1.706667 21.418667-12.202667 23.082667-22.762666 1.706667-10.538667-6.698667-22.762667-15.936-24.853334-9.258667-2.112-20.778667 12.672-21.845334 22.357334-1.258667 11.797333 1.685333 23.573333 14.698667 25.258666z m31.936 61.973334s-20.16-15.594667-31.936-32.448c-15.957333-24.874667-38.634667-14.762667-46.208-2.112-7.552 12.650667-19.328 20.629333-20.992 22.741333-1.685333 2.090667-24.362667 14.336-19.328 36.672 5.034667 22.336 22.72 21.909333 22.72 21.909333s13.013333 1.28 28.138667-2.112c15.104-3.349333 28.117333 0.832 28.117333 0.832s35.306667 11.818667 44.970667-10.944c9.621333-22.72-5.482667-34.538667-5.482667-34.538666z m-60.394667 33.877333h-22.954666c-9.92-1.984-13.866667-8.746667-14.357334-9.898667-0.490667-1.173333-3.306667-6.613333-1.813333-15.850666 4.288-13.866667 16.490667-14.848 16.490667-14.848h12.224v-15.04l10.410666 0.149333v55.488z m42.752-0.170667h-26.410666c-10.24-2.624-10.709333-9.92-10.709334-9.92v-29.205333l10.709334-0.170667v26.261334c0.64 2.794667 4.117333 3.306667 4.117333 3.306666h10.88v-29.397333h11.413333v39.125333z m37.376-77.994666c0-5.034667-4.181333-20.224-19.733333-20.224-15.552 0-17.642667 14.336-17.642667 24.469333 0 9.685333 0.810667 23.189333 20.16 22.741333 19.328-0.426667 17.216-21.909333 17.216-26.986666z" fill="#FFFFFF" p-id="1407"></path>
                        </svg>
                        孙笑川吧
                    </li>
                </a>
                <a target="_blank" href="https://www.bilibili.com/bangumi/play/ep433964?spm_id_from=333.337.0.0&from_spmid=666.25.episode.0">
                    <li>
                        <svg t="1650785793374" class="icon" viewBox="0 0 1129 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1918" width="200" height="200">
                            <path d="M234.909 9.656a80.468 80.468 0 0 1 68.398 0 167.374 167.374 0 0 1 41.843 30.578l160.937 140.82h115.07l160.936-140.82a168.983 168.983 0 0 1 41.843-30.578A80.468 80.468 0 0 1 930.96 76.445a80.468 80.468 0 0 1-17.703 53.914 449.818 449.818 0 0 1-35.406 32.187 232.553 232.553 0 0 1-22.531 18.508h100.585a170.593 170.593 0 0 1 118.289 53.109 171.397 171.397 0 0 1 53.914 118.288v462.693a325.897 325.897 0 0 1-4.024 70.007 178.64 178.64 0 0 1-80.468 112.656 173.007 173.007 0 0 1-92.539 25.75h-738.7a341.186 341.186 0 0 1-72.421-4.024A177.835 177.835 0 0 1 28.91 939.065a172.202 172.202 0 0 1-27.36-92.539V388.662a360.498 360.498 0 0 1 0-66.789A177.03 177.03 0 0 1 162.487 178.64h105.414c-16.899-12.07-31.383-26.555-46.672-39.43a80.468 80.468 0 0 1-25.75-65.984 80.468 80.468 0 0 1 39.43-63.57M216.4 321.873a80.468 80.468 0 0 0-63.57 57.937 108.632 108.632 0 0 0 0 30.578v380.615a80.468 80.468 0 0 0 55.523 80.469 106.218 106.218 0 0 0 34.601 5.632h654.208a80.468 80.468 0 0 0 76.444-47.476 112.656 112.656 0 0 0 8.047-53.109v-354.06a135.187 135.187 0 0 0 0-38.625 80.468 80.468 0 0 0-52.304-54.719 129.554 129.554 0 0 0-49.89-7.242H254.22a268.764 268.764 0 0 0-37.82 0z m0 0" fill="#20B0E3" p-id="1919"></path>
                            <path d="M348.369 447.404a80.468 80.468 0 0 1 55.523 18.507 80.468 80.468 0 0 1 28.164 59.547v80.468a80.468 80.468 0 0 1-16.094 51.5 80.468 80.468 0 0 1-131.968-9.656 104.609 104.609 0 0 1-10.46-54.719v-80.468a80.468 80.468 0 0 1 70.007-67.593z m416.02 0a80.468 80.468 0 0 1 86.102 75.64v80.468a94.148 94.148 0 0 1-12.07 53.11 80.468 80.468 0 0 1-132.773 0 95.757 95.757 0 0 1-12.875-57.133V519.02a80.468 80.468 0 0 1 70.007-70.812z m0 0" fill="#20B0E3" p-id="1920"></path>
                        </svg>
                        纪录片《无穷之路》
                    </li>
                </a>
                <a target="_blank" href="https://space.bilibili.com/672328094?spm_id_from=333.337.0.0">
                    <li>
                        <svg t="1650785793374" class="icon" viewBox="0 0 1129 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1918" width="200" height="200">
                            <path d="M234.909 9.656a80.468 80.468 0 0 1 68.398 0 167.374 167.374 0 0 1 41.843 30.578l160.937 140.82h115.07l160.936-140.82a168.983 168.983 0 0 1 41.843-30.578A80.468 80.468 0 0 1 930.96 76.445a80.468 80.468 0 0 1-17.703 53.914 449.818 449.818 0 0 1-35.406 32.187 232.553 232.553 0 0 1-22.531 18.508h100.585a170.593 170.593 0 0 1 118.289 53.109 171.397 171.397 0 0 1 53.914 118.288v462.693a325.897 325.897 0 0 1-4.024 70.007 178.64 178.64 0 0 1-80.468 112.656 173.007 173.007 0 0 1-92.539 25.75h-738.7a341.186 341.186 0 0 1-72.421-4.024A177.835 177.835 0 0 1 28.91 939.065a172.202 172.202 0 0 1-27.36-92.539V388.662a360.498 360.498 0 0 1 0-66.789A177.03 177.03 0 0 1 162.487 178.64h105.414c-16.899-12.07-31.383-26.555-46.672-39.43a80.468 80.468 0 0 1-25.75-65.984 80.468 80.468 0 0 1 39.43-63.57M216.4 321.873a80.468 80.468 0 0 0-63.57 57.937 108.632 108.632 0 0 0 0 30.578v380.615a80.468 80.468 0 0 0 55.523 80.469 106.218 106.218 0 0 0 34.601 5.632h654.208a80.468 80.468 0 0 0 76.444-47.476 112.656 112.656 0 0 0 8.047-53.109v-354.06a135.187 135.187 0 0 0 0-38.625 80.468 80.468 0 0 0-52.304-54.719 129.554 129.554 0 0 0-49.89-7.242H254.22a268.764 268.764 0 0 0-37.82 0z m0 0" fill="#20B0E3" p-id="1919"></path>
                            <path d="M348.369 447.404a80.468 80.468 0 0 1 55.523 18.507 80.468 80.468 0 0 1 28.164 59.547v80.468a80.468 80.468 0 0 1-16.094 51.5 80.468 80.468 0 0 1-131.968-9.656 104.609 104.609 0 0 1-10.46-54.719v-80.468a80.468 80.468 0 0 1 70.007-67.593z m416.02 0a80.468 80.468 0 0 1 86.102 75.64v80.468a94.148 94.148 0 0 1-12.07 53.11 80.468 80.468 0 0 1-132.773 0 95.757 95.757 0 0 1-12.875-57.133V519.02a80.468 80.468 0 0 1 70.007-70.812z m0 0" fill="#20B0E3" p-id="1920"></path>
                        </svg>
                        🥵顿顿解馋🥵小草莓🍓
                    </li>
                </a>
                <a target="_blank" href="https://space.bilibili.com/1463028352?spm_id_from=333.337.0.0">
                    <li>
                        <svg t="1650785793374" class="icon" viewBox="0 0 1129 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1918" width="200" height="200">
                            <path d="M234.909 9.656a80.468 80.468 0 0 1 68.398 0 167.374 167.374 0 0 1 41.843 30.578l160.937 140.82h115.07l160.936-140.82a168.983 168.983 0 0 1 41.843-30.578A80.468 80.468 0 0 1 930.96 76.445a80.468 80.468 0 0 1-17.703 53.914 449.818 449.818 0 0 1-35.406 32.187 232.553 232.553 0 0 1-22.531 18.508h100.585a170.593 170.593 0 0 1 118.289 53.109 171.397 171.397 0 0 1 53.914 118.288v462.693a325.897 325.897 0 0 1-4.024 70.007 178.64 178.64 0 0 1-80.468 112.656 173.007 173.007 0 0 1-92.539 25.75h-738.7a341.186 341.186 0 0 1-72.421-4.024A177.835 177.835 0 0 1 28.91 939.065a172.202 172.202 0 0 1-27.36-92.539V388.662a360.498 360.498 0 0 1 0-66.789A177.03 177.03 0 0 1 162.487 178.64h105.414c-16.899-12.07-31.383-26.555-46.672-39.43a80.468 80.468 0 0 1-25.75-65.984 80.468 80.468 0 0 1 39.43-63.57M216.4 321.873a80.468 80.468 0 0 0-63.57 57.937 108.632 108.632 0 0 0 0 30.578v380.615a80.468 80.468 0 0 0 55.523 80.469 106.218 106.218 0 0 0 34.601 5.632h654.208a80.468 80.468 0 0 0 76.444-47.476 112.656 112.656 0 0 0 8.047-53.109v-354.06a135.187 135.187 0 0 0 0-38.625 80.468 80.468 0 0 0-52.304-54.719 129.554 129.554 0 0 0-49.89-7.242H254.22a268.764 268.764 0 0 0-37.82 0z m0 0" fill="#20B0E3" p-id="1919"></path>
                            <path d="M348.369 447.404a80.468 80.468 0 0 1 55.523 18.507 80.468 80.468 0 0 1 28.164 59.547v80.468a80.468 80.468 0 0 1-16.094 51.5 80.468 80.468 0 0 1-131.968-9.656 104.609 104.609 0 0 1-10.46-54.719v-80.468a80.468 80.468 0 0 1 70.007-67.593z m416.02 0a80.468 80.468 0 0 1 86.102 75.64v80.468a94.148 94.148 0 0 1-12.07 53.11 80.468 80.468 0 0 1-132.773 0 95.757 95.757 0 0 1-12.875-57.133V519.02a80.468 80.468 0 0 1 70.007-70.812z m0 0" fill="#20B0E3" p-id="1920"></path>
                        </svg>
                        理塘丁真
                    </li>
                </a>
                <a target="_blank" href="https://zh.wikipedia.org/wiki/%E4%B8%81%E7%9C%9F">
                    <li>
                        <svg t="1650810336859" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1707" width="200" height="200">
                            <path d="M966.784 233.6a15.04 15.04 0 0 1-3.008 8.992c-2.016 2.592-4.192 4-6.784 4-20 2.016-36.384 8.416-48.992 19.2-12.8 10.816-25.792 31.808-39.2 62.4L662.4 793.6c-1.408 4.384-5.216 6.4-11.392 6.4a13.12 13.12 0 0 1-11.392-6.4l-115.808-242.016-133.184 242.016c-2.816 4.384-6.4 6.4-11.392 6.4-6.016 0-9.792-2.208-11.808-6.4L164.832 328.416c-12.608-28.8-26.016-48.992-40-60.384s-33.6-18.592-58.592-21.184c-2.208 0-4.192-1.184-6.016-3.392a10.976 10.976 0 0 1-2.784-7.808c0-7.584 2.208-11.392 6.4-11.392 17.984 0 36.992 0.8 56.8 2.4 18.4 1.6 35.584 2.4 51.808 2.4 16.416 0 36-0.8 58.4-2.4 23.392-1.6 44.192-2.4 62.4-2.4 4.384 0 6.4 3.808 6.4 11.392s-1.408 11.2-4 11.2c-18.016 1.408-32.384 6.016-42.816 13.792s-15.584 18.016-15.584 30.816c0 6.4 2.208 14.592 6.4 24.192l167.392 378.4 95.2-179.616-88.608-185.792c-16-33.184-28.992-54.592-39.2-64.192s-25.792-15.392-46.592-17.6c-2.016 0-3.616-1.184-5.408-3.392s-2.592-4.8-2.592-7.808c0-7.584 1.792-11.392 5.6-11.392 18.016 0 34.592 0.8 49.792 2.4 14.592 1.6 30.016 2.4 46.592 2.4 16.192 0 33.184-0.8 51.392-2.4 18.592-1.6 36.992-2.4 55.008-2.4 4.384 0 6.4 3.808 6.4 11.392s-1.216 11.2-4 11.2c-36.192 2.4-54.208 12.8-54.208 30.816 0 8 4.192 20.608 12.608 37.6l58.592 119.008 58.4-108.8c8-15.392 12.192-28.384 12.192-38.816 0-24.8-18.016-38.016-54.208-39.584-3.2 0-4.8-3.808-4.8-11.2 0-2.816 0.8-5.184 2.4-7.584s3.2-3.584 4.8-3.584c12.992 0 28.8 0.8 47.808 2.4 18.016 1.6 32.992 2.4 44.608 2.4 8.384 0 20.608-0.8 36.8-2.016a612.48 612.48 0 0 1 51.392-2.816c3.2 0 4.8 3.2 4.8 9.6 0 8.608-3.008 12.992-8.8 12.992-20.992 2.208-38.016 8-50.784 17.408s-28.8 30.816-48 64.416l-78.208 143.2 105.216 214.4 155.392-361.408c5.408-13.184 8-25.408 8-36.384 0-26.4-18.016-40.416-54.208-42.208-3.2 0-4.8-3.808-4.8-11.2 0-7.584 2.4-11.392 7.2-11.392 13.216 0 28.8 0.8 47.008 2.4 16.8 1.6 30.784 2.4 42.016 2.4 12 0 25.6-0.8 41.216-2.4 16.192-1.6 30.784-2.4 43.808-2.4 4 0 6.016 3.2 6.016 9.6z" p-id="1708"></path>
                        </svg>
                        <ruby>丁真珍珠<rt>བསྟན་འཛིན་བརྩོན་འགྲུས་</rt></ruby>
                    </li>
                </a>
            </ul>
        </div>

        <div id="upload-box">




            <div id="upload-pic-box">
                <a id="pic-path">上传一张图片吧</a>
                <form id="upload-form">
                    <input onchange="validateFileType()" type="file" accept="image/gif,image/jpeg,image/jpg,image/png,image/svg" name="user-upload" id="user-upload">

            </div>

            <input class="upload-input" id="upload-input-fore" name="upload-input-fore" oninput="showpicstatus()" placeholder="义眼丁真">
            <input class="upload-input" id="upload-input-mid" name="upload-input-mid" placeholder="鉴定为">
            <input class="upload-input" id="upload-input-suffix" name="upload-input-suffix" placeholder="假">
            </form>

            <a id="upload-checkbox-box"><input id="upload-checkbox" type="checkbox">我确定我没有上传<strong>任何</strong>反动、R18以及暴力的图片</a>
            <a id="show-upload-status"></a>


            <button onclick="uploadpic()" type="$_POST" name="upload" class="upload-pic-button"><em class="fa fa-upload"></em></button>



            <script>
                function uploadpic() {

                    if (!document.getElementById("user-upload").value) {
                        document.getElementById("show-upload-status").innerHTML = "请上传一张图片";
                    } else if (document.getElementById("upload-input-fore").value == "" || document.getElementById("upload-input-mid").value == "" || document.getElementById("upload-input-suffix").value == "") {
                        document.getElementById("show-upload-status").innerHTML = "请输入信息（没有的打一个空格）";
                    } else if (document.getElementById("upload-checkbox").checked == false) {
                        document.getElementById("show-upload-status").innerHTML = "请勾选";
                    } else if (document.getElementById("upload-checkbox").checked == true && document.getElementById("user-upload").value) {
                        document.getElementById("show-upload-status").innerHTML = "正在上传";
                        var picToUpload = new FormData(document.getElementById("upload-form"));
                        $.ajax({
                            cache: false,
                            url: "userupload.php",
                            type: "post",
                            processData: false,
                            contentType: false,
                            data: picToUpload,
                            success: function(resultjson) {
                                var resultjson = JSON.parse(resultjson);
                                document.getElementById("show-upload-status").innerHTML = "上传成功，序号为" + resultjson[0].id;
                                document.getElementById("upload-input-fore").value = "";
                                document.getElementById("upload-input-mid").value = "";
                                document.getElementById("upload-input-suffix").value = "";
                                document.getElementById("user-upload").value = "";
                            }
                        })
                    }
                }

                function showpicstatus() {

                    $.ajax({
                        url: "useruploadcheck.php",
                        type: "post",
                        dataType: "text",
                        data: {
                            "search-name": document.getElementById("upload-input-fore").value
                        },
                        success: function(resultjson) {
                            var upload_status;

                            var resultjson = JSON.parse(resultjson);
                            // 返回结果数量
                            var resultnum = resultjson[0].result.length;
                            for (i = 0; i < resultnum; i++) {

                                if (resultjson[0].result[0][0] == 0) {
                                    document.getElementById("pic-path").innerHTML = "这个丁真还没被上传过";
                                } else if (resultjson[0].result[0][0] == window.totalpicnum) {
                                    document.getElementById("pic-path").innerHTML = "这个丁真还没被上传过";
                                } else {
                                    document.getElementById("pic-path").innerHTML = "有" + resultjson[0].result[0][0] + "个类似的丁真，查一下是否重复";
                                }

                            }
                        }
                    })
                };

                function showfilename() {
                    var file = document.getElementById("user-upload").value;
                    var image = document.querySelector("img");
                    var filepath = file.substring(file.lastIndexOf("\\") + 1);
                    if (!file) {
                        document.getElementById("pic-path").innerHTML = "上传失败了，再试试？";
                    }
                    if (file) {
                        document.getElementById("pic-path").innerHTML = "在下方输入这个丁真的信息";
                        document.getElementById("upload-pic-box").classList.add("upload-pic-box-success");

                    }
                }

                function validateFileType() {
                    var fileName = document.getElementById("user-upload").value;
                    var idxDot = fileName.lastIndexOf(".") + 1;
                    var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
                    if (extFile == "jpg" || extFile == "jpeg" || extFile == "png" || extFile == 'gif') {
                        showfilename();
                    } else {
                        alert("你怎么骗我，\n哼，上传点正常格式的照片！（jpg/png/gif）");
                    }
                }
            </script>

        </div>

        <div id="statistics-box">
            <em id="total-pic-num"></em>
            <i id="total-pic-num-text" >张照片已收集</i>
            <br/>
            <em id="totalvisit"></em>
            <i id="totalvisit-text" >次访问已达成</i>
            <br/>
            <em id="waittoverify"></em>
            <i id="waittoverify-text" >张照片待审核</i>

            <!-- 页面统计 -->
            <script>
                $.getJSON("getsiteinfo.php", function(siteinfojson) {
                    var siteinfo = siteinfojson;
                    var waittoverify = siteinfo[0].wait_to_verify[0];
                    var totalpicnum = siteinfo[0].total_pic_num[0];
                    document.getElementById("total-pic-num").innerHTML = totalpicnum;
                    document.getElementById("waittoverify").innerHTML = waittoverify;
                    window.totalpicnum = totalpicnum;
                })


                $.ajax({
                    url: "timesbeenopen.php",
                    type: "post",
                    dataType: "text",
                    data: {
                        "hasloaded": true
                    },
                    success: function(resultjson) {
                        var resultjson = JSON.parse(resultjson);
                        var totalvisit = resultjson[0].totalvisit;
                        document.getElementById("totalvisit").innerHTML = totalvisit;
                    }
                })
            </script>

        </div>
    </div>






</body>
