<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>家居饰品商城 || shop</title>
        <meta name="description" content="家居饰品商城，开发者：周岩">
        <meta name="keywords" content="家居饰品商城 | 周岩 | 黑龙江大学">
        <link rel="shortcut icon" href="__PUBLIC__/image/icon/litIcon.ico">
        <link href="__PUBLIC__/css/reset.css" rel="stylesheet" type="text/css" />
        <link href="__PUBLIC__/css/page.css" rel="stylesheet" type="text/css" />
        <script src="__PUBLIC__/js/jquey-1.8.0.min.js"></script>
        <script type="text/javascript" src="..js/index.js"></script>
    </head>

    <body>
        
        </div>
        <!-- 顶部导航 -->
        <div id="top">
            <div class="wrap clear">
                    <div class="welcome fl">
                            <span class="cor3"><a class="a-notlogin">欢迎光临，请</a>
                                <input type="hidden" value="<?php echo ($uid); ?>" id="input-uid"/>
                                <input type="hidden" value="<?php echo ($utype); ?>" id="input-utype"/>
                                <a title="会员直接登录" style="color:#FF2832;" target="_self" href="<?php echo U('Index/Index/login');?>" name="登录"
                                    title="请登录网站" class="a-notlogin">登录</a>
                                
                                <a><?php echo ($uid); ?></a>
                                <a title="新用户请先注册" rel="nofollw" target="_self" href="<?php echo U('Index/Index/signup');?>" name="免费注册"
                                    title="免费注册账户" class="a-notlogin">免费注册
                                </a>
                            </span>
                        </div>
                <div class="topRight fr clear">
                    <ul class="leftNav fl">
                        <li class="myOrder">
                            
                            
                        </li>
                        <li class="myOrder">
                           
                            
                        </li>
                  
                       
                        </ul>
                        <ul class="rightNav fr">
                                <li><a title="添加商品" name="添加商品" href="<?php echo U('Index/Index/addb');?>" class="pdsj">添加商品</a><span class="sep">|</span></li>
                                <li><a title="查看用户订单" name="查看用户订单" href="<?php echo U('Index/Index/sjlookOrder');?>" class="sjck">查看用户订单</a><span class="sep">|</span></li>
                            <li><a title="我的订单" name="我的订单" href="<?php echo U('Index/Index/lookOrder');?>" class="wddd">我的订单</a><span class="sep">|</span></li>
                            <li><a title="商城销售情况统计" name="商城销售情况统计" href="<?php echo U('Index/Index/chart');?>" class="qktj">商城销售情况统计</a><span class="sep">|</span></li>
                            <li><a title="用户退款单" name="用户退款单" href="<?php echo U('Index/Index/tuikuan');?>" class="yhtk">用户退款单</a><span class="sep">|</span></li>
                            <li><a title="充值" name="充值" href="<?php echo U('Index/Index/top');?>" class="cj">充值</a><span class="sep">|</span></li>
                            <li><a title="发布公告" name="发布公告" href="<?php echo U('Index/Index/detail');?>" class="fbgg">发布公告</a><span class="sep">|</span></li>
                            <li><a title="退出系统" name="退出" href="<?php echo U('Index/Index/quit');?>" class="login_a">退出</a></li>
                            
                        </ul>
                </div>
            </div>
        </div>
   
        <div id="logo_line" class="wrap clear">
            <div class="logo fl">
                <a href="<?php echo U('Index/Index/index');?>">
                    <img src="__PUBLIC__/image/logo.png" alt="家居饰品商城" title="欢迎进入家居饰品商城">
                </a>
            </div>
            <div class="search fr">
                
                <input type="text" name="searchMess" autocomplete="on" placeholder="输入您想购买的商品名称" class="text gray" id="input-search">
                <input type="submit" name="g" value="搜索" class="button" title="点击我搜索吧！" id="btn-search">
               
           
            </div>
          
            <div id="cart_box" class="cart_box fr clear ccc" >
                <a id="cart" class="cart_link" rel="nofollow"  href="<?php echo U('Index/Index/lookShoppingCar');?>">
                    <img src="__PUBLIC__/image/icon/cart.gif" width="28" height="28" class="cart_gif">
                    <span class="text">去购物车结算</span>
                    <span class="num" style="display: none;"></span>
                    <s class="icon_arrow_right"></s>
                </a>
               
            </div>
        </div>
   
        <div id="navbar">
            <div class="wrap clear">
                <h3 class="navindex"><a  title="家居在线，欢迎购买">家居饰品商城   </a></h3>
                <ul>
                    <li class=""><a class="current" title="进入主页" href="<?php echo U('Index/Index/index');?>">主页</a></li>
                    <li class="today">
                        <a title="浏览商品列表" href="<?php echo U('Index/Index/bypageshow',array('btype'=>'0'));?>">浏览家居
                                <em class="white_arrow"></em>
                            </a>
                        <div id="looktab">
                            <ul class="looktabnav">
                                
                            </ul>
                        </div>
                    </li>
                    
                    
                    <li class="loveclub">
                        
                        <div class="loveclubtab">
                            
                        </div>
                    </li>
                </ul>
                
            </div>
        </div>
      
        <div id="section" class="wrap clear">
   
            <div id="navbox" class="navbox clear">
                <ul>
                    <li class="list">
                        <div id="list_cont" class="list_cont">
                            <h3>
                                <a  href="<?php echo U('Index/Index/bypageshow',array('btype'=>'1'));?>" >墙纸挂饰</a>
                            </h3>
                         
                            
                        </div>
                    </li>
                    <li class="list">
                        <div id="list_cont" class="list_cont">
                            <h3>
                                <a  href="<?php echo U('Index/Index/bypageshow',array('btype'=>'2'));?>" >家居饰品
                                </a>
                            </h3>
                           
                            
                        </div>
                    </li>
                    <li class="list">
                        <div id="list_cont" class="list_cont">
                            <h3>
                                <a  href="<?php echo U('Index/Index/bypageshow',array('btype'=>'3'));?>" >生活家具</a>
                            </h3>
                         
                           
                        </div>
                    </li>
                    <li class="list">
                        <div id="list_cont" class="list_cont">
                            <h3>
                                <a  href="<?php echo U('Index/Index/bypageshow',array('btype'=>'4'));?>" >摆件装饰</a>
                            </h3>
                        
                           
                        </div>
                    </li>
                    <li class="list">
                        <div class="list_cont">
                            <h3>
                                <a href=""></a>
                            </h3>
                      
                         
                        </div>
                    </li>
                </ul>
            </div>
        
            <div class="anythingSlider clear">
                <div class="tWrapper" style="overflow: hidden; ">
                    <ul>
                        <?php if(is_array($hd)): foreach($hd as $key=>$b): ?><li>
                            <dl>
                                <dt>
                                    <a href="<?php echo U('Index/Index/showDetail',array('bno'=>$b['bno']));?>" title="<?php echo ($b['bname']); ?>" ><img width="700" height="456" src="<?php echo ($b['bimg']); ?>" alt="<?php echo ($b['bname']); ?>"></a>
                                </dt>
                               
                            </dl>
                        </li><?php endforeach; endif; ?>
                        
                    </ul>
                </div>
            </div>
            <div class="public">
                <div id="news" class="m">
                    <div class="mt">
                        <h2>公告</h2>
                     
                    </div>
                    <div class="mc">
                        <ul>
                            <?php if(is_array($zhan3)): foreach($zhan3 as $key=>$b): ?><li clstag="h|keycount|2015|09b1"><a target="_blank" ><span><?php echo ($b['stype']); ?></span><?php echo ($b['sdetail']); ?></a></li><?php endforeach; endif; ?>
                            
                        </ul>
                    </div>
                </div>
               
                
            </div>
        </div>
        
     
        <!-- 广告区域 -->
        
        <!-- 商品内容列表区域 -->
        <div id="content" class="wrap clear">
            <div class="getLove">
                <div class="getLoveTop tip2">
                    <span class="littleBar2"></span>
                    <h4></h4>
                    <span><a class="getLoveList2"  href="<?php echo U('Index/Index/bypageshow',array('btype'=>'0'));?>">更多&gt;&gt;</a></span>
                </div>
                <div class="shopList">
                    <div class="shopListLeft">
                        <a href=""><img src="__PUBLIC__/image/logo.png" alt=""></a>
                        <div class="shopList_info">
                            <h3>618享受超低价！</h3>
                            <h3>家居饰品独家来袭</h3>
                            <p>
                               
                            </p>
                        </div>
                    </div>
                    <div class="shopListRight">
                        <div class="shopListRightTop clear">
                            <?php if(is_array($zhan)): foreach($zhan as $key=>$b): ?><a class="borderNone" href="<?php echo U('Index/Index/showDetail',array('bno'=>$b['bno']));?>"><img src="<?php echo ($b['bimg']); ?>" height="177" width="217" alt=""></a><?php endforeach; endif; ?>
                        </div>
                        <div class="clear">
                            <?php if(is_array($zhan2)): foreach($zhan2 as $key=>$b): ?><a class="borderNone" href="<?php echo U('Index/Index/showDetail',array('bno'=>$b['bno']));?>"><img src="<?php echo ($b['bimg']); ?>" alt=""></a><?php endforeach; endif; ?>
                        </div>
                    </div>
                </div>
            </div>
          

        </div>
        <!-- /商品内容列表区域 -->
        <div class="bottomBanner wrap"><a ><img src=""></a></div>
        <!-- 服务 -->
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
                            
                    </div>
                </div>
                <span class="clr"></span>
            </div>
        </div>
        <!-- /服务 -->
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
                    var utype=$("#input-utype").val()
                    $(".login_a").hide()
                    $(".ccc").hide()
                    $(".wddd").hide()
                    $(".cj").hide()
                    $(".pdsj").hide()
                    $(".qktj").hide()
                    $(".sjck").hide()
                    $(".yhtk").hide()
                    $(".fbgg").hide()
                    console.log(uid.length)
                    if(uid.length > 0){
                        console.log("in")
                        $(".a-notlogin").hide()
                        $(".login_a").show() 
                        $(".wddd").show()
                        $(".cj").show()
                        $(".ccc").show()
                    }
                    console.log(utype.length)
                    if(utype.length==2){
                        $(".pdsj").show()
                        $(".qktj").show()
                        $(".cj").hide()
                        $(".wddd").hide()
                        $(".ccc").hide()
                        $(".sjck").show()
                        $(".yhtk").show()
                        $(".fbgg").show()
                    }
                    $("#btn-search").click(function(){
                        searchKey =$("#input-search").val()
                        toUrl = "<?php echo U('Index/Index/showsearch',array('key'=>'@#'));?>"
                        toUrl = toUrl.replace("%40%23",searchKey)
                        console.log(toUrl)
                        location.href = toUrl
                    })
                })
                
            </script>

    </body>

</html>