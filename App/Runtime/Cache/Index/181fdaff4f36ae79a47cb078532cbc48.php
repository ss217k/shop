<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>家居饰品城 || shop</title>
    <meta name="description" content="家居饰品商城，开发者：周岩">
    <meta name="keywords" content="家居饰品商城 | 周岩 | 黑龙江大学">
    <link rel="shortcut icon" href="__PUBLIC__/image/icon/litIcon.ico">
    <link href="__PUBLIC__/css/reset.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/css/page.css" rel="stylesheet" type="text/css" />
    <script src="__PUBLIC__/js/jquey-1.8.0.min.js"></script>
</head>

<body>
    <!-- 顶部导航 -->
    <div id="top">
        <div class="wrap clear">
                <div class="welcome fl">
                        <span class="cor3"><a class="a-notlogin">欢迎光临，请</a>
                            <input type="hidden" value="<?php echo ($uid); ?>" id="input-uid"/>
                            <input type="hidden" value="<?php echo ($utype); ?>" id="input-utype"/>
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
                    
                    <li class="myOrder">
                       
                       
                        
                   
                </ul>
                <ul class="rightNav fr">
                    
                    <li><a title="退出系统" name="退出" href="<?php echo U('Index/Index/quit');?>" class="login_a">退出</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /顶部导航 -->
    <!-- logo与search区域 -->
    <div id="logo_line" class="wrap clear">
        <div class="logo fl">
            <a href="http://localhost/shop/index.php/index/index/index.html">
                <img src="__PUBLIC__/image/logo.png" alt="家居饰品商城" title="欢迎进入">
            </a>
        </div>
        <div class="search fr">
            
            
        </div>

        <div id="cart_box" class="cart_box fr clear ccc">
            <a id="cart" class="cart_link" rel="nofollow" href="<?php echo U('Index/Index/lookShoppingCar');?>">
                <img src="__PUBLIC__/image/icon/cart.gif" width="28" height="28" class="cart_gif">
                <span class="text">去购物车结算</span>
                <span class="num" style="display: none;"></span>
                <s class="icon_arrow_right"></s>
            </a>
       
        </div>
    </div>
    <!-- /logo与search区域 -->
    <!-- 导航条 -->
    <div id="navbar">
        <div class="wrap clear">
            <h3 class="navindex"><a title="家居饰品商城">家居饰品商城</a></h3>
            <ul>
                <li class=""><a  title="进入主页" href="<?php echo U('Index/Index/index');?>">主页</a></li>
                <li class="today">
                    <a class="current" title="浏览商品列表" href="<?php echo U('Index/Index/bypageshow',array('btype'=>'0'));?>">浏览家居
                        <em class="white_arrow"></em>
                    </a>
                  
                </li>
                
                
            </ul>
            <div class="sales fr"></div>
        </div>
    </div>
    <!-- /导航条 -->
    <!-- 焦点图 -->
    
    <!-- /焦点图  -->
    <div id="content" class="wrap clear">
        <div class="leftCont fl">
            <!-- 筛选条件列表 -->
            <div class="address wrap clear">
                <div class="addressTo fl clear">
                    
                </div>
                <div class="productNum fr">
                    <span>共</span>
                    <b><?php echo ($searchNum); ?></b>
                    <span>款产品</span>
                   
                </div>
            </div>
            <div class="screen wrap">
                
               
                
              
              
               
            </div>
            <!-- /筛选条件列表 -->
            <!-- 配送地址 -->
           
            <!-- /配送地址 -->
            <!-- 商品列表区域 -->
            <div class="productListWrap clear">
                <?php if(is_array($searchBooks)): foreach($searchBooks as $key=>$b): ?><div class="productItem">
                        <div class="imgBox">
                            <a href="<?php echo U('Index/Index/showDetail',array('bno'=>$b['bno']));?>" target="_blank">
                                <img src="<?php echo ($b['bimg']); ?>" alt=""
                                    style="height:188px;width: 188px;">
                            </a>
                        </div>
                        <div class="infoCont">
                            <div class="titleRow">
                                <a class="productTitle" title="" href="<?php echo U('Index/Index/showDetail',array('bno'=>$b['bno']));?>" target="_blank"><?php echo ($b["bname"]); ?>
                                    <span class="feature"><span class="featureItem"> </span> <span
                                            class="featureItem"> </span></span>
                                </a>
                            </div>
                            <div class="saleRow">
                                <div class="col fl">
                                    <span class="price"><span class="priceYue">约</span> <span class="priceSign">¥</span>
                                        <span class="priceNum"><?php echo ($b["bprice"]); ?></span> </span>
                                </div>
                                <div class="col end fr">
                                    <span class="weekSale">月销量<span class="num"><?php echo ($b["bnum"]); ?></span></span>
                                </div>
                            </div>
                            <div class="infoRow commentRow">
                               
                                <span class="userScore"> <span class="iconSuppleXingGrey"></span> <span
                                        class="iconSuppleXingLight" style="width: 60.59px"></span> </span>
                            </div>
                            <div class="infoRow seller">
                                <a class="sellerLink"  >共有<?php echo ($b["bzs"]); ?>商家在售</a>
                            </div>
                        </div>
                    </div><?php endforeach; endif; ?>

            </div>
            <!-- /商品列表区域 -->
       
            <div class="page wrap">
                
            </div>
           
        </div>
        <!-- 右部推荐 -->
        <div class="rightCont fr">
            <div class="hotGood">
                <h3><a >热卖商品</a></h3>
                <ul class="seeclip_list clear">
                    <?php if(is_array($rm)): foreach($rm as $key=>$b): ?><li>
                        <a href="<?php echo U('Index/Index/showDetail',array('bno'=>$b['bno']));?>"><img src="<?php echo ($b['bimg']); ?>" alt=""></a>
                    </li><?php endforeach; endif; ?>
                </ul>
            </div>
           
        </div>
    </div>
    <!-- /右部推荐 -->
    
    <div id="service-2014" clstag="h|keycount|2015|32a">
        <div class="slogen clear">
            <span class="item fore1">
                <i></i><b>多</b>品类齐全，轻松购物
            </span>
            <span class="item fore2">
                <i></i><b>快</b>多仓直发，极速配送
            </span>
            <span class="item fore3">
                <i></i><b>好</b>正品行货，精致服务
            </span>
            <span class="item fore4">
                <i></i><b>省</b>天天低价，畅选无忧
            </span>
        </div>
        <div class="w wrap clear">
            
            
            
           
            <div id="coverage">
                <div class="dt">
                    自营覆盖区县
                </div>
                <div class="dd">
                    <p>已向全国2050个区县提供自营配送服务，支持货到付款、POS机刷卡和售后上门服务。</p>
                    <p class="ar"></p>
                </div>
            </div>
            <span class="clr"></span>
        </div>
    </div>
    
    <!-- 页尾链接和版权信息 -->
    <div id="footer" class="">
       
        
        <p class="padt10 textc cor2 lh20">
            版权所有&nbsp;&copy;&nbsp;黑龙江大学
        </p>
        
    </div>
    <!-- /页尾链接和版权信息 -->
    <script src="__PUBLIC__/js/jquery-1.4.2.min.js"></script>
    <script src="__PUBLIC__/js/imgTab.js"></script>

    <script>
        $(document).ready(function(){
            var uid = $("#input-uid").val()
            var utype=$("#input-utype").val()
            $(".login_a").hide()
            $(".ccc").hide()
            console.log(uid.length)
            if(uid.length > 0){
                console.log("in")
                $(".a-notlogin").hide()
                $(".ccc").show()
                $(".login_a").show()
            }
            if(utype.length==2){
                $(".ccc").hide()
            }
        })
    </script>

    
</body>

</html>