<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>购物车 || 家居饰品商城</title>
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
                            <input type="hidden" value="<?php echo ($Price); ?>" id="input-price"/>
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
            <h1>购物车</h1>
        </div>
        <div class="order_path order_path_1 ">
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
                            <th class="cart_price">价格（元）</th>
                            <th class="cart_num">数量</th>
                            <th class="cart_total">小计（元）</th>
                            <th class="cart_option">操作</th>
                        </tr>
                    </thead>
                  
                    <tbody class="hide">
                        <?php if(is_array($cars)): foreach($cars as $key=>$b): ?><tr>
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
                                        <!--<input class="item_quantity" value="<?php echo ($b['cnt']); ?>" type="text"> --> 
                                        <p class="jumei_price"><?php echo ($b['cnt']); ?></p>
                                    </div>
                                    <div class="item_shortage_tip"> </div>
                                </div>
                            </td>
                            <td>
                                <div class="cart_item_total">
                                    <p class="item_total_price"><?php echo ($b['sumprice']); ?></p>
                                   
                                </div>
                            </td>
                            <td>
                                <div class="cart_item_option">
                                    <a class="icon_small delete_item png" data-item-key="1057066_d150603p892053zc" href="<?php echo U('Index/Index/delfromcar',array('bno'=>$b['cbno']));?>" title=删除></a>
                                </div>
                            
                            </td>
                        </tr><?php endforeach; endif; ?>
                    </tbody>
                
                    <tfoot>
                        <tr>
                            <td colspan="5"> 商品金额： <span class="group_total_price">￥<?php echo ($Price); ?></span> </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="common_handler_anchor"></div>
            <div class="common_handler">
                <div class="right_handler"> 共 <span class="total_amount"> <?php echo ($num); ?> </span> &nbsp;种商品 &nbsp;&nbsp; 商品应付总额：<span class="total_price">￥<?php echo ($Price); ?></span> <a id="go_to_order" class="btn" >去结算</a> </div>
                <label for="js_all_selector" class="cart_all_selector_wrapper">
                     </label> <a class="go_back_shopping" href="http://localhost/shop/index">继续购物</a> <span class="seperate_line">|</span> 
                <form id="form_to_order" action="" method="post" style="display: none;">
                    <input name="items_key" type="hidden"> </form>
            </div>
            
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
                $(".login_a").hide()
                //console.log(uid.length)
                if(uid.length > 0){
                  //  console.log("in")
                    $(".a-notlogin").hide()
                    $(".login_a").show() 
                }
            })
            var price=$("#input-price").val()
            console.log(price)
            $("#go_to_order").click(function(){
                if(price==0){
                    alert("请选购商品！")
                }else{
                    location.href="<?php echo U('Index/Index/lookorderform');?>"
                }
            })
            
            
        </script>
</body>

</html>