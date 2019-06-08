<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>注册新用户 || shop</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="shortcut icon" href="__PUBLIC__/image/icon/litIcon.ico">
    <link href="__PUBLIC__/css/newUser.css" rel="stylesheet">
    <link href="__PUBLIC__/css/reset.css" rel="stylesheet">
    <script src="__PUBLIC__/js/jquey-1.8.0.min.js" type="text/javascript"></script>
</head>

<body>
    <!-- 注册页面头部 -->
    <div class="register_wrap">
        <div class="register_content register_content2 clear">
            <div class="register_operate" id="__ddnav_menu">
                
            </div>
            <div class="register_logo">
                <a  href="index.html" title="返回首页" name="ddnav_logo">
                   
                </a>
            </div>
            <div class="banner clear">
                <div class="bannerHeader fr sprite"></div>
            </div>

        </div>
       <!--  <div class="registerhead_bottom"></div> -->
    </div>
    <!-- /注册页面头部 -->
    <!-- 注册页面主体 -->
    <div class="registerMian">
        <form>
            <div id="bd">
                <div class="register_box">
                    <div class="head">
                        
                        <p class="coupon_words">
                            
                        </p>
                        <h3> 发布公告</h3>
                    </div>
                    <div class="body">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td class="t">
                                        公告类型：
                                    </td>
                                    <td class="z_index2">
                                        <input type="text" value="" tabindex="1" onfocus="check_username_focus()" maxlength="40" autocomplete="off" class="text" name="logname" id="txt_type" style="border-color: rgb(127, 157, 185);">
                                        
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td class="t">
                                        公告内容：
                                    </td>
                                    <td id="in_password">
                                            <input type="text" value="" tabindex="1" onfocus="check_username_focus()" maxlength="40" autocomplete="off" class="text" name="logname" id="txt_meg" style="border-color: rgb(127, 157, 185);">
                                        </span>
                                        </span>
                                    </td>
                                </tr>
                               
                              
                                <tr>
                                    <td class="t">
                                        &nbsp;
                                    </td>
                                    <td>
                                        <input tabindex="7"  value="               发布公告" title="发布公告" class="btn_login" name="g" id="btn_register" style="font-size:18px;line-height:36px; height:36px;">

                                    </td>
                                </tr>
                                <tr>
                                    <td class="t">
                                        &nbsp;
                                    </td>
                                    <td class="clause">
                                        <span class="float_l">
                                       
                                        <span style="display: none" class="cue" id="spn_agreement_wrong"></span><span style="display: none" class="cue" id="spn_err_msg"></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                       
                    </div>
                </div>
            </div>
            <script type="text/javascript">
            </script>
            
        </form>
    </div>
    <!-- /注册页面主体 -->
    <div id="footer" class="padb10">
        <p class="padt10 textc cor2 lh20">
           
        </p>
        <p class="padt5 textc cor2 lh20">版权所有&nbsp;&copy;&nbsp;黑龙江大学
        </p>
    </div>
    <script src="__PUBLIC__/js/jquey-1.8.0.min.js" type="text/javascript"></script>
    <!-- <script src="__PUBLIC__/js/register.js" type="text/javascript"></script> -->
    <script src="__PUBLIC__/js/check_browser.js" type="text/javascript"></script>
    <script>

        
        $(document).ready(function(){

            $("#btn_register").click(function(){
                var type = $("#txt_type").val()
                var meg = $("#txt_meg").val()
                if(type.length == 0 || meg.length == 0){
                	alert("内容不能为空")
                	return
                }
                
                $.post("<?php echo U('Index/Index/insertDetail');?>",{"type":type,"meg":meg},function(res){
                    console.log(res)
                    if(res.status == 1){
                        alert("发布成功！")
                        location.href="<?php echo U('Index/Index/index');?>"
                    }else{
                        alert("发布失败！")
                    }

                })
            })
        })
    
    </script>

<script>
        $(document).ready(function(){
            var uid = $("#input-uid").val()
            console.log(uid.length)
            if(uid.length > 0){
                console.log("in")
                $(".a-notlogin").hide()
            }
        })
</script>


</body>

</html>