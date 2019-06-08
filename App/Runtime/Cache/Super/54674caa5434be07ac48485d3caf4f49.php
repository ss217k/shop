<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html ng-app="Unicourse">
<head>
	<title>指标分配</title>
	  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="__PUBLIC__/images/icon.png" mce_href="__PUBLIC__/images/icon.png" type="image/x-icon">
  <link  id="theme" href="__PUBLIC__/css/custom/bootstrap.style.css" rel="stylesheet">
  <link  href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet">
  <link href="__PUBLIC__/css/style.css" rel="stylesheet">

<!--[if lt IE 9]>
<script type="text/javascript" src="__PUBLIC__/js/ie-compatible.js"></script>
<![endif]-->

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?837af77cdd844632ad02ef10fb7851f0";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

	<link href="__PUBLIC__/css/bootstrap-switch.css" rel="stylesheet">
	<link href="__PUBLIC__/css/bootstrap-select.min.css" rel="stylesheet">
	<style>
		.myoption{
			font-size:30px;
		}
		.btn-info {
    		color: #000;
    		background-color: #f6f6f6;
    		border-color: #f6f6f6;
			font-size:40px;
		}
		.btn-info :hover {
    		color: #000;
    		background-color: #f6f6f6;
    		border-color: #f6f6f6;
			font-size:40px;
		}
		.btn-info.active, .btn-info:active, .btn-info:hover, .open>.dropdown-toggle.btn-info {
    		color: #000000;
    		background-color: #f6f6f6;
    		border-color: #f6f6f6;
		}
		.btn-info.active, .btn-info:active, .btn-info:hover, .open>.dropdown-toggle.btn-info {
			color: #000;
			background-color: #f6f6f6;
			border-color: #f6f6f6;
		}
		.btn-info.active.focus, .btn-info.active:focus, .btn-info.active:hover, .btn-info:active.focus, .btn-info:active:focus, .btn-info:active:hover, .open>.dropdown-toggle.btn-info.focus, .open>.dropdown-toggle.btn-info:focus, .open>.dropdown-toggle.btn-info:hover {
			color: #000;
			background-color: #f6f6f6;
			border-color: #f6f6f6;
		}


		.btn-info.focus, .btn-info:focus {
			color: #000;
			background-color: #f6f6f6; 
			border-color: #f6f6f6;
		}
		.selectpicker{
			width:40%;
		}
	</style>
</head>
<body class="bg">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header hidden-xs">
            <a class="navbar-brand" href="<?php echo U('Index/Index/index');?>">UniCourse<sup>+</sup></a>
        </div>
        <div class=" navbar-collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li id="header-home">
                    <a href="<?php echo U('Index/Index/index');?>">首页</a>
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li id="header-edit">
                    <a href="<?php echo U('Super/Target/edit',array('pno'=>1));?>">编辑</a>
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li id="header-manage">
                    <a href="<?php echo U('Super/Target/manage',array('pno'=>'11111111'));?>">管理</a>
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li id="header-backup">
                    <a href="<?php echo U('Super/Backup/index');?>">备份</a>
                </li>
            </ul>

             <ul class="nav navbar-nav navbar-right">
                <li class="dropdown hidden-xs">
                    <a href="#" id="profile" class="dropdown-toggle" data-toggle="dropdown">
                        <span><?php echo $_SESSION['uname']; ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo U('Super/SuperProfile/index');?>" id="username"><div class="list-icon"><span class="icon-user"></span></div>我的资料</a>
                        </li>
                        <li class="divider"></li>
                        <?php if (session('isAssistant')==1) { ?>
                        <li>
                            <a href="<?php echo U('Assistant/Assistant/index');?>" id="assistant"><div class="list-icon"><span class="icon-book"></span></div>我担任的助教</a>
                        </li>
                        <li class="divider"></li>
                        <?php  } ?>
                        <li>
                            <a href="<?php echo U('Index/Login/logout');?>" id="btn-logout"><div class="list-icon"><span class="icon-signout"></span></div>登出</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
 
	<div id="main-container" class="container" style="min-height:700px">
		<div class="row">
			<div class="col-lg-12" style="text-align:center">
				<h1>
					<select class="selectpicker" data-style="btn-info" style="width:40%;" id="myselect">
						<option value="0" class="myoption">课程分类</option>
						<option value="1" class="myoption">全校公共课</option>
						<option value="2" class="myoption">学科基础</option>
						<option value="3" class="myoption">专业必修</option>
						<option value="4" class="myoption">专业选修</option>
					</select>
				</h1>
				<div style="position:absolute;left:83%;top:10%;">
					<span style="margin-left:1%;">删除模式</span>
					<input style="position:absolute;" type="checkbox" name="my-checkbox" class='pull-right'> 
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="thumbnail col-lg-2 col-md-2 col-sm-2 col-xs-2 block1 ellipsis" style="line-height: 30px;">
				<p>
					<a href="<?php echo U('Super/View/index');?>">切换
						<br>
						<small>指标点视角</small>
					</a>
				</p>
				<p style="position:absolute;top:75px;right:0px;width:100%">
					<input class="hide" value="<?php echo ($v['cno']); ?>" />
						<a class="btn btn-primary btn-apply btn-sm btn-a" href="<?php echo U('Super/View/index');?>" style="color:white;" >查看</a>
				</p>		
			</div>	
			<?php if(is_array($curriculum)): foreach($curriculum as $key=>$v): ?><div class="thumbnail col-lg-2 col-md-2 col-sm-2 col-xs-2 block1 ellipsis" style="line-height: 30px;">
					<span class="hide typjudge"><?php echo ($v["typ"]); ?></span>
					<span class="hide"><?php echo ($v["cno"]); ?></span>
					<p>
						<a><?php echo ($v["cname"]); ?>
							<br>
							<small><?php echo ($v["ctype"]); ?></small>
						</a>
					</p>
					<p style="position:absolute;top:75px;right:0px;width:100%">
						<input class="hide" value="<?php echo ($v['cno']); ?>" />
						<a class="btn btn-success btn-apply btn-sm btn-a" href="<?php echo U('Super/Target/arrange',array('cno' => $v['cno'], 'pno' => 1));?>" >分配指标</a>
					</p>
				</div><?php endforeach; endif; ?>
			<div class="course-block">
				<div class="thumbnail col-lg-2 col-md-2 col-sm-2 col-xs-2 block1  full ellipsis">
					<a href="<?php echo U('Super/Curricula/index');?>" target="_parent"
					   title="添加新课程"><i class="icon-plus"></i></a>
				</div>
			</div>
			<?php if ($curriculum[0]==null): ?>
			<div>没有课程</div>
			<?php endif ?>
		</div>
	</div>
	<div id="info" data-activeheader="#header-home"></div>
	<footer id="footer">
	<div class="container">
		<div class="col-lg-12">
			Copyright&nbsp;&copy;&nbsp;2013-2018&nbsp;UniCourse,&nbsp;All Rights Reserved.
		</div>
	</div>
</footer>
<script src="__PUBLIC__/dist/js/lib.js"></script>
<script src="__ROOT__/Data/Ueditor/ueditor.all.min.js"></script>
<script src="__ROOT__/Data/Ueditor/ueditor.config.js"></script>
<script src="__PUBLIC__/dist/js/unicourse.js"></script>
<script >
window.PUBLIC_URL='__PUBLIC__';
window.ROOT_URL='__ROOT__';
window.APP_URL="__APP__";
window.UNAME="<?php echo ($_SESSION['uname']); ?>"+"<?php echo ($_SESSION['tname']); ?>";
window.UID="<?php echo ($_SESSION['uid']); ?>";
window.CNO="<?php echo ($cno); ?>";
window.UEDITOR_HOME_URL = '__ROOT__/Data/Ueditor/';
window.UEDITOR_CONFIG.initialFrameHeight = 100;
</script>
<script>
    /**
     * 消息模块
     */
app.controller('messages', ['$scope', '$http', function($scope,$http){
        $http.get('<?php echo U('Index/Home/getmsg');?>').success(function(data){
                //console.log(data);
                if(data && data.message){
                    $scope.messages=data.message;
                }
            });
    }]);

</script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?6c8c3ce0743dd12cf03043954fddd040";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>

	<script src="__PUBLIC__/js/bootstrap-switch.js"></script>
	<script src="__PUBLIC__/js/bootstrap-select.min.js"></script>
	<script>
		$("[name='my-checkbox']").bootstrapSwitch();
		$('input[name="my-checkbox"]').on('switchChange.bootstrapSwitch', function(event, state) {
			console.log(state); // true | false
			if(state == true){
				$(".btn-a").each(function(){
					$(this).removeClass("btn-success");
					$(this).addClass("btn-danger");
					$(this).html("删除课程")
					$(this).attr("href","javascript:void(0);")
					$(this).click(function(){
					var that = $(this);
					bootbox.confirm({
                    	message: "您确认要删除这门课程吗？" ,
                    	callback: function(result) {
                        	if(result==true){
								cno = that.prev().val();
								$.post("<?php echo U('Super/Curricula/del');?>",{'cno':cno},function(data){
								if(data.status==1){
									alert("删除成功");
									CAR(1);
								}
								else{
									alert("删除失败，请稍后再试或联系管理员..");
								}})
							}
    	                    else{
								//do nothing
        	                }
            	        }});
					})
				})
			}
			else{
				$(".btn-a").each(function(){
					$(this).removeClass("btn-danger");
					$(this).addClass("btn-success");
					$(this).html("分配指标");
					$(this).attr("href","<?php echo U('Super/Target/arrange',array('cno' => $v['cno'], 'pno' => 1));?>")
					$(this).unbind("click");
				})
			}
		});
		$("#myselect").change(function(){
			console.log($(this).val());
			var val = $(this).val()
			$(".typjudge").each(function(){
				if(parseInt($(this).html()) != val && val!=0){
					console.log("hide");
					$(this).parent().css('display','none');
				}
				else{
					$(this).parent().css('display','block');
				}
			})
		})
	</script>
</body>
</html>