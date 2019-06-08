<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<title>我的课程</title>
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

</head>
<body class="bg">
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo U('Index/Index/index');?>">UniCourse<sup>+</sup></a>
        </div>
        <div class="collapse navbar-collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li id="header-home">
                    <a href="<?php echo U('Teacher/Home/index',array('cno' =>$_REQUEST['cno']));?>">首页</a>
                </li>
                <li class="dropdown" id="header-course">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        课程 <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <?php  foreach (session('selectedCourses') as $key => $value) { ?>
                        <li>
                            <a href="<?php echo U('Teacher/Course/index',array('cno' =>$value['cno']));?>" ><?php echo ($value['cname']); ?></a>
                        </li>
                        <?php  } ?>
                        <?php  foreach (session('secondcourse') as $key => $value) { ?>
                        <li>
                            <a href="<?php echo U('Teacher/Course/index',array('cno' =>$value['cno']));?>" ><?php echo ($value['cname']); ?></a>
                        </li>
                        <?php  } ?>                          
                    </ul>
                </li> 
                   
            </ul>
            <ul class="nav navbar-nav navbar-right">  
                     
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <?php echo $_SESSION['tname']; ?>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                        <a href="<?php echo U('Teacher/UserProfile/index');?>"><div class="list-icon"><span class="icon-user"></span></div>我的资料</a>
                        </li>
                        <li class="divider"></li>
                       <!--  <?php if (session('isAssistant')==1) { ?>
                        <li>
                            <a href="<?php echo U('Assistant/Assistant/index');?>" id="assistant"><div class="list-icon"><span class="icon-book"></span></div>我担任的助教</a>
                        </li>
                        <li class="divider"></li>
                        <?php  } ?> -->
                        <?php if (session('examiner')==1) { ?>
                        <li>
                            <a href="<?php echo U('Examiner/Home/index');?>" id="assistant"><div class="list-icon"><span class="icon-user"></span></div>我参与评审的课程</a>
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
	<div id="main-container" class="container">
		<div class="row">
			<div class="col-lg-12" style="text-align:center">
				<h1>我的课程</h1>
			</div>
		</div>
		<div class="row">
			<?php if(is_array($course)): foreach($course as $key=>$v1): ?><div class="course-block">
					<div class="hide"><?php echo ($v1["cno"]); ?></div>

					<div class="thumbnail col-lg-2 col-md-2 col-sm-2 col-xs-2 block1 full ellipsis">
						<a href="<?php echo U('Teacher/Course/index',array('cno' =>$v1['cno']));?>"><?php echo ($v1["cname"]); ?></a>
					</div>
				</div><?php endforeach; endif; ?>
			<?php if(is_array($secondteacher)): foreach($secondteacher as $key=>$v2): ?><div class="course-block">
					<div class="hide"><?php echo ($v2["cno"]); ?></div>

					<div class="thumbnail col-lg-2 col-md-2 col-sm-2 col-xs-2 block1 full ellipsis">
						<a href="<?php echo U('Teacher/Course/index',array('cno' =>$v2['cno']));?>"><?php echo ($v2["cname"]); ?></a>
					</div>
				</div><?php endforeach; endif; ?>
			<div class="course-block">
				<div class="thumbnail col-lg-2 col-md-2 col-sm-2 col-xs-2 block1  full ellipsis">
					<a href="<?php echo U('Teacher/CreateCourse/index');?>" target="_parent"
					   title="添加新课程"><i class="icon-plus"></i></a>
				</div>
			</div>
		</div>
		<div class="modal fade" id="modal-feedback">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btn-closemodal">&times;</button>
							<h4 class="modal-title">系统更新提示</h4> 
						</div>
						<div class="modal-body">
								<div class="form-group">
										<label>更新日期：2018年5月6日</label>
									</div>
									<div class="form-group">
										1.新增<b>大作业/实验</b> Excel批量打分功能。
									</div>
									<div class="form-group">
										2.新增作业成绩分布图（在每个作业评分页面的最下方~）。
									</div>
									<div class="form-group">
										3.<b>普通作业</b>打分、评语优化，打完分/评完语会自动保存，您无需再点确定了
									</div>
									<div class="form-group">
										4.修复了大作业打分的各种bug。
									</div>
									<div class="form-group">
										5.修复了学生重复提交作业的bug。
									</div>
						</div>
						<form id="form-feedback" class="form">
							<div class="modal-body">
								<div class="form-group">
									<textarea name="vccontent" class="form-control"   placeholder="您可以在这里输入您的需求，发现的相关问题，以及其他想对我们说的，我们会及时处理。" style="height:150px" id="fbcontent"></textarea>
									<div class="errormessage" id="blankerror">请输入内容</div>
								</div>
								<input type="hidden" name="title" id="feedback-title" value="">
								<input type="hidden" name="utype" value="2">
								<div class="form-group">
									您也可以随时发邮件至unicourse@163.com与我们联系，我们将在第一时间给予反馈！
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" id="btn-submitcomment">提交</button>
								<button type="button" class="btn btn-default" data-dismiss="modal">直接进入系统</button>
							</div>
						</form>
					</div>
				</div>
		</div>
	</div>
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


	<script>
		$(document).ready(function() {
			$.post("<?php echo U('Teacher/Home/getNewversion');?>", function(data) {
					if (data.status == 0 ) {
						//alert("新特性：xxxxxxx");
						//CAR(1);
						$('#modal-feedback').modal({
							keyboard: true
						})
					}
					else {
						/*$('#modal-feedback').modal({
							keyboard: true
						})*/
						//alert("添加失败");
					}
			},'json');

			$("#btn-createcourse").click(function(event) {
				$('#cname').val($('#cname').val().replace(/\s+/g, ''));
				if($("#cname").val() == ""){
					$("#lb-cname").css("color","#F00");
					$("#cname").focus();
				} else {
					$("#lb-cname").css("color","#000");
				}
				$.post("<?php echo U('Teacher/Home/createcourse');?>", $("#form-createcourse").serialize(), function(data, textStatus, xhr) {
					if (data.status === 1) {
						alert("添加成功");
						CAR(1);
					} else {
						alert("添加失败");
					}
				},'json');
				return false;
			});

			$("#button-addcourse").click(function(event) {
				$('#dialog-createcourse').modal();
				return false;
			});
			$("#btn-cancel").click(function(event) {
				$("#dialog-createcourse").modal('hide');
			});
			$("#btn-submitcomment").click(function(event){
				$.post("<?php echo U('Teacher/Home/addComment');?>",$("#form-feedback").serialize(),function(data){
					if(data.status == 1){
						alert("提交成功，感谢您的反馈！我们将及时处理!");
						CAR(1);
					}
					else{
						alert("抱歉，提交失败了……如果想联系我们也可以发邮件到unicourse@163.com，谢谢您的支持");
                		CA(2);
					}
				})
			})
		});
	</script>
</body>
</html>