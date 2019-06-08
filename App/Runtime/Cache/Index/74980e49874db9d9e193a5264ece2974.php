<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>查看订单 || 家居饰品商城</title>
    <meta name="description" content="家居饰品商城，开发者：周岩">
    <meta name="keywords" content="家居饰品商城 | 周岩 | 黑龙江大学">
    <link rel="shortcut icon" href="__PUBLIC__/image/icon/litIcon.ico">
    <link href="__PUBLIC__/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/css/page_car.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/css/page.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- 顶部导航 -->
    <div id="top">
        <div class="car_wrap clear">
                <div class="welcome fl">
                        <span class="cor3"><a class="a-notlogin">欢迎光临，请</a>
                            <input type="hidden" value="<?php echo ($uid); ?>" id="input-uid"/>
                            <a title="会员直接登录" style="color:#FF2832;" target="_self" href="<?php echo U('Index/Index/login');?>" name="登录"
                                title="请登录网站" class="a-notlogin">登录</a>
                            <a><?php echo ($uname); ?></a>
                            <a><?php echo ($uid); ?></a>
                            <a title="新用户请先注册" rel="nofollw" target="_self" href="<?php echo U('Index/Index/signup');?>" name="免费注册"
                                title="免费注册账户" class="a-notlogin">免费注册
                            </a>
                        </span>
                    </div>
            <div class="topRight fr clear">
                <ul class="leftNav fl">
                    <li>
                       
                    </li>
                    <li class="myOrder">
                        
                    <li class="myLib">
                       
                        <div id="topLookTab">
                            <ul class="looktabnav clear">
                                
                                <ul>
                        </div>
                    </li>
                    </ul>
                    <ul class="rightNav fr">
                      
                        <li><a title="退出系统" name="退出" href="<?php echo U('Index/Index/quit');?>" class="login_a">退出</a></li>
                    </ul>
            </div>
        </div>
    </div>
    <!-- /顶部导航 -->
    <!-- logo与进度反馈区域 -->
    <div id="logo_line" class="car_wrap clear">
        <div class="logo fl">
            <a href="index.html">
                <img src="__PUBLIC__/image/logo.png" alt="家居饰品商城" title="欢迎进入家居饰品商城">
            </a>
        </div>
        <div class="shopCar_tit fl">
            <h1>我的订单</h1>
        </div>
       
    </div>
    <div class="car_hr"></div>
    <!-- /logo与进度反馈区域 -->
    <div class="content_show_wrapper">
        <div class="cart_notification cart_error" style="">
            <div class="message">
                <p></p>
            </div>
        </div>
        <div id="group_show">
            <div class="content_header clear">
                
                <div class="top_banner">
                    <ul class="header_icons">
                        <li> <span> <i class="icon_zhenpin header_icon png"></i> 真品防伪码 </span> </li>
                        <li> <span> <i class="icon_tuihuo header_icon png"></i> 30天无条件退货 </span> </li>
                        
                    </ul>
                </div>
                
            </div>
            <div class="groups_wrapper">
                <table class="cart_group_item  cart_group_item_product">
                    <thead>
                        <tr>
                            <th class="cart_overview">
                                <div class="cart_group_header">
                                    
                                </div>
                            </th>
                            <th class="cart_price">单价（元）</th>
                            <th class="cart_num">数量</th>
                            <th class="cart_total">        </th>
                            <th class="cart_option">申请退货</th>
                        </tr>
                    </thead>
                  
                    <tbody class="hide">
                        <?php if(is_array($orders)): foreach($orders as $key=>$b): ?><tr>
                                <input type="hidden" value="<?php echo ($b['bno']); ?>" id="btn-bno"/>
                            <td valign="top">
                                <div class="cart_item_desc clear">
                                    
                                 
                                    <div class="cart_item_desc_wrapper">
                                        <a class="cart_item_pic"  target="_blank"> <img src="<?php echo ($b['bimg']); ?>" alt="<?php echo ($b['bname']); ?>"> <span class="sold_out_pic png"></span> </a> <a class="cart_item_link" title="<?php echo ($b['cname']); ?>"  target="_blank"><?php echo ($b['bname']); ?></a>
                                       
                                        <div class="sale_info clear">
                                            <div class="tips_pop_full float_box JS_tips_pop_full">
                                                <div> <a class="sale_tag gift JS_sale_tag" data-promo-type="gift"> 满赠 <i class="icon_small png"></i> </a> </div>
                                                <div class="pop_box JS_pop_box">
                                                    <div><span class="arrow_t_1"><span class="arrow_t_2"></span></span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="tips_pop_full float_box JS_tips_pop_full">
                                                <div> <a class="sale_tag reduce JS_sale_tag" data-promo-type="reduce"> 满减 <i class="icon_small png"></i> </a> </div>
                                                <div class="pop_box JS_pop_box">
                                                    <div><span class="arrow_t_1"><span class="arrow_t_2"></span></span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="cart_item_price">
                                    <p class="jumei_price"><?php echo ($b['bprice']); ?></p>
                                    
                                </div>
                            </td>
                            <td>
                                <div class="cart_item_num ">
                                    <div class="item_quantity_editer clear" data-item-key="1057066_d150603p892053zc"> 
                                      <!-- <input class="item_quantity" value="<?php echo ($b['cnt']); ?>" type="text" id="btn-cnt"> --> 
                                        <p class="jumei_price" type="text" id="btn-cnt"><?php echo ($b['cnt']); ?></p> </div>
                                    <div class="item_shortage_tip"> </div>
                                </div>
                            </td>
                            <td>
                                <div class="cart_item_total">
                                    <p class="item_total_price"></p>
                                   
                                </div>
                            </td>
                            <td>
                                <div class="cart_item_option">
                                    <a id="tuikuan" class="icon_small delete_item png" data-item-key="1057066_d150603p892053zc" href="<?php echo U('Index/Index/delfromorder',array('bno'=>$b['bno'],'cnt'=>$b['cnt'],'ono'=>$b['ono']));?>" title=退款></a>
                                </div>
                            
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                
                    
                </table>
            </div>
            <div class="common_handler_anchor"></div>
            
            
        </div>
      
    </div>
    <!-- 页尾链接和版权信息 -->
    <div id="footer" class="">
        
       
        <p class="padt10 textc cor2 lh20">版权所有&nbsp;&copy;&nbsp;黑龙江大学
        </p>
        
    </div>
    <!-- /页尾链接和版权信息 -->
    <script src="__PUBLIC__/js/jquery-1.4.2.min.js"></script>
    <script src="__PUBLIC__/js/imgTab.js"></script>

    <script>
            $(document).ready(function(){
                var uid = $("#input-uid").val()
                var cnt=$("#btn-cnt").val()
                $(".login_a").hide()
                console.log(cnt)
                if(uid.length > 0){
                    console.log("in")
                    $(".a-notlogin").hide()
                    $(".login_a").show() 
                }
            
            })
           
            
            
        </script>
</body>

</html>