<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>结果反馈 || shop</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <link rel="shortcut icon" href="__PUBLIC__/image/icon/litIcon.ico">
        <link href="__PUBLIC__/css/page.css" rel="stylesheet" type="text/css" />
        <link href="__PUBLIC__/css/reset.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="__PUBLIC__/js/jquey-1.8.0.min.js"></script>
    </head>
        <script type="text/javascript">
        $(function  () {
            $("document").triggerHandler("click");
            $(".gotoLogin").click(function  () {
                $(".gotoLogin").attr("href","login.html");
            });
        })

        </script>
    <body>
        <!-- 顶部导航 -->
        <div id="top">
            <div class="car_wrap clear">
                    <div class="welcome fl">
                            <span class="cor3"><a class="a-notlogin"></a>
                                <input type="hidden" value="<?php echo ($uid); ?>" id="input-uid"/>
                                
                        </div>
                <div class="topRight fr clear">
                    <ul class="leftNav fl">
                        
                      
                </div>
            </div>
        </div>
        <!-- /顶部导航 -->
        <!-- logo与进度反馈区域 -->
        <div id="logo_line" class="car_wrap clear">
            <div class="logo fl">
                <a href="index.html">
                   
                </a>
            </div>
            <div class="shopCar_tit fl">
                <h1></h1>
            </div>
            <div class="banner clear">
                <div class="bannerHeader fr sprite" style="margin-top: 40px"></div>
            </div>
        </div>
        <div class="car_hr"></div>
        <!-- /logo与进度反馈区域 -->
        <!-- 购买结果反馈 -->
        <div class="backInfo car_wrap">
            <p class="info">尊敬的顾客，您已经注册成功，请登录您的账户，去商城购物！更多精彩等您来发现! <a class="red gotoLogin" href="<?php echo U('Index/Index/login');?>"> &nbsp; &nbsp;立刻登录&gt;&gt;</a></p>
        </div>
        <div id="footer" class="clear">
            
            <p class="padt10 textc cor2 lh20">版权所有&nbsp;&copy;&nbsp;黑龙江大学
            </p>
        </div>

        <script>
                $(document).ready(function(){
                    var uid = $("#input-uid").val()
                    $(".login_a").hide()
                    console.log(uid.length)
                    if(uid.length > 0){
                        console.log("in")
                        $(".a-notlogin").hide()
                        $(".login_a").show() 
                    }
                })
            </script>
    </body>

</html>