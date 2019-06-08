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
                        <h3> 注册新用户</h3>
                    </div>
                    <div class="body">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td class="t">
                                        手机号码：
                                    </td>
                                    <td class="z_index2">
                                        <input type="text" value="" tabindex="1" onfocus="check_username_focus()" maxlength="40" autocomplete="off" class="text" name="logname" id="txt_username" style="border-color: rgb(127, 157, 185);">
                                        
                                       
                                    </td>
                                </tr>
                                <tr>
                                    <td class="t">
                                        登录密码：
                                    </td>
                                    <td id="in_password">
                                        <input type="password" tabindex="2" style="display:'';" onpaste="return false;" onblur="password_check()" onkeyup="txtPassword_strong_check()" onfocus="check_password_focus()" class="text" name="password" id="txt_password">
                                        <input type="text" tabindex="2" style="display:none" onpaste="return false;" onblur="password_check()" onkeyup="txtPassword_strong_check()" onfocus="check_password_focus()" class="text" name="hid_txt_password" id="hid_txt_password"><span style="display:none" class="prompt" id="capslock_change"><span class="icon"></span>大写键盘已打开</span><span style="display: none;" class="warn" id="spn_password_ok"></span><span style="display: none;" class="cue" id="spn_password_wrong"></span><span class="warn warn_p" style="display: none" id="spnPwdStrongTips">密码强度:<span style="display: none;" id="spnPwdStrong1" class="msg_level"><span class="s1">弱</span><span>中</span><span>强</span></span><span style="display: none;" class="msg_level" id="spnPwdStrong2"><span class="s1">弱</span><span class="s2">中</span><span>强</span></span><span style="display: none;" class="msg_level" id="spnPwdStrong3"><span class="s1">弱</span><span class="s2">中</span><span class="s3">强</span>
                                        </span>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="t">
                                        确认密码：
                                    </td>
                                    <td id="in_repassword">
                                        <input type="password" tabindex="3" style="display:'';" onpaste="return false" onkeydown="CheckdoSubmit(event)" onkeyup="repassword_session_check()" onblur="repassword_check()" onfocus="check_repassword_focus()" class="text" name="again_password" id="txt_repassword">
                                        <input type="text" tabindex="3" style="display:none" onpaste="return false" onkeydown="CheckdoSubmit(event)" onkeyup="repassword_session_check()" onblur="repassword_check()" onfocus="check_repassword_focus()" class="text" name="hid_txt_repassword" id="hid_txt_repassword">
                                        <span style="display: none;" class="warn" id="spn_repassword_ok"></span><span class="cue" style="display: none;" id="spn_repassword_wrong"></span>
                                    </td>
                                </tr>
                                <tr style="display: " id="tb_tr_reg_vcode">
                                    <td class="t">
                                        邮箱地址：
                                    </td>
                                    <td>
                                        <input type="text"  maxlength="20" autocomplete="off" class="text" name="address" id="txt_vcode"><span class="warn" id="spn_vcode_ok"></span><span style="display: none;" class="cue" id="spn_vcode_wrong"></span>
                                        
                                    </td>
                                </tr>
                              
                                <tr>
                                    <td class="t">
                                        &nbsp;
                                    </td>
                                    <td>
                                        <input tabindex="7"  value="               立刻注册" title="注册" class="btn_login" name="g" id="btn_register" style="font-size:18px;line-height:36px; height:36px;">

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
                var mobile = $("#txt_username").val()
                var passwd = $("#txt_password").val()
                var repasswd=$("#txt_repassword").val()
                var addr = $("#txt_vcode").val()
                if(mobile.length == 0 || passwd.length == 0){
                	alert("用户名与密码不能为空")
                	return
                }
                if(repasswd!=passwd){
                    alert("两次密码输入不同！")
                    return
                }
                $.post("<?php echo U('Index/Index/insertsignup');?>",{"mobile":mobile,"passwd":passwd,"addr":addr},function(res){
                    console.log(res)
                    if(res.status == 1){
                        location.href="<?php echo U('Index/Index/signupsuccess');?>"
                    }else if(res.status == 2){
                        alert("已有相同手机号，不可注册")
                    }else{
                        alert("注册失败！")
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