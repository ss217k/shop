<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html ng-app="Unicourse">
<head>
	<title>课程广场</title>
	  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="__PUBLIC__/images/icon.png" mce_href="__PUBLIC__/images/icon.png" type="image/x-icon">
  <link  id="theme" href="__PUBLIC__/css/custom/bootstrap.style.css" rel="stylesheet">
  <link  href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet">
  <link href="__PUBLIC__/css/style.css" rel="stylesheet">

<!--[if lt IE 9]>
<script type="text/javascript" src="__PUBLIC__/js/ie-compatible.js"></script>
<![endif]-->
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
                <li class="dropdown" id="header-course">
                    <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
                        课程 <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
 foreach (session('selectedCourses') as $key => $value) { ?>
                        <li>
                            <a href="<?php echo U('Index/Notice/index',array('cno' =>$value['cno']));?>" ><?php echo ($value['cname']); ?></a>
                        </li>
                        <?php
 } ?>
                        <li class="divider"></li>
                        <li >
                            <a href="<?php echo U('Index/Course/index');?>">所有课程</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown" id="header-question">
                    <a href="<?php echo U('Index/Question/index');?>" class="dropdown-toggle" data-toggle="dropdown">
                        问答 <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo U('Index/Question/myQuestion');?>">我的提问</a>
                        </li>
                        <li>
                            <a href="<?php echo U('Index/Question/myFocusQuestion');?>">我的关注</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo U('Index/Question/allQuestion');?>">所有问答</a>
                        </li>
                    </ul>
                </li>
                <li id="header-group">
                    <a href="<?php echo U('Index/Group/mygroup');?>">小组</a>
                </li>
                <!--li id="header-group">
                    <a href="<?php echo U('Index/Analysis/index');?>">分析</a>
                </li-->
               <!--  <li id="header-schedule">
                    <a href="<?php echo U('Index/Schedule/index');?>">日程</a>
                </li>
                 -->
            </ul>

             <ul class="nav navbar-nav navbar-right">
                <button class="navbar-toggle"><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <!--<li id="header-theme" class="dropdown hidden-xs">
                    <a id="btn-theme" data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="glyphicon glyphicon-eye-open" title="切换主题"></span>
                    </a>
                    <ul id="list-theme" class="dropdown-menu">
                        <li class="list-theme-item" data-theme="__PUBLIC__/css/bootswatch/bootstrap.min.css">
                            <a href="#">default</a>
                        </li>
                        <li class="list-theme-item" data-theme="__PUBLIC__/css/bootswatch/bootstrap.amelia.min.css">
                            <a href="#">amelia</a>
                        </li>
                        <li class="list-theme-item" data-theme="__PUBLIC__/css/bootswatch/bootstrap.cerulean.min.css">
                            <a href="#">cerulean</a>
                        </li>
                        <li class="list-theme-item" data-theme="__PUBLIC__/css/bootswatch/bootstrap.cosmo.min.css">
                            <a href="#">cosmo</a>
                        </li>
                        <li class="list-theme-item" data-theme="__PUBLIC__/css/bootswatch/bootstrap.cyborg.min.css">
                            <a href="#">cyborg</a>
                        </li>
                        <li class="list-theme-item" data-theme="__PUBLIC__/css/bootswatch/bootstrap.flatly.min.css">
                            <a href="#">flatly</a>
                        </li>
                        <li class="list-theme-item" data-theme="__PUBLIC__/css/bootswatch/bootstrap.readable.min.css">
                            <a href="#">readable</a>
                        </li>
                        <li class="list-theme-item" data-theme="__PUBLIC__/css/bootswatch/bootstrap.simplex.min.css">
                            <a href="#">simplex</a>
                        </li>
                        <li class="list-theme-item" data-theme="__PUBLIC__/css/bootswatch/bootstrap.slate.min.css">
                            <a href="#">slate</a>
                        </li>
                        <li class="list-theme-item" data-theme="__PUBLIC__/css/bootswatch/bootstrap.spacelab.min.css">
                            <a href="#">spacelab</a>
                        </li>
                        <li class="list-theme-item" data-theme="__PUBLIC__/css/bootswatch/bootstrap.united.min.css">
                            <a href="#">united</a>
                        </li>
                    </ul>
                </li>-->
                <li id="header-message" class="dropdown hidden-xs" ng-controller="messages">
                    <a id="title-msg" data-toggle="dropdown" class="dropdown-toggle" href="<?php echo U('Index/Home/getmsg');?>">
                        <span class="glyphicon glyphicon-envelope" title="消息" ng-bind="msgs.length"></span>
                    </a>
                    <ul id="newmsg" class="dropdown-menu">
                        <li ng-repeat="msg in messages" >
                            <div class="msgitem"><a href="">
                                {{msg.actor_name}}</a><span>在问题<a href="{{'__APP__/question/questionDetail/qno/'+msg.position_no+'/mid/'+msg.m_id}}"><span class="msgcontent">{{msg.position_name}}</span></a>中添加了回复</div>
                        </li>
                        <li class='divider' ng-if="messages.length"></li>
                        <li >
                            <a href='<?php echo U('Index/Home/showmsg');?>' target="_blank">查看全部历史消息</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown hidden-xs">
                    <a href="#" id="profile" class="dropdown-toggle" data-toggle="dropdown">
                        <span><?php echo $_SESSION['uname']; ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo U('Index/UserProfile/index');?>" id="username"><div class="list-icon"><span class="icon-user"></span></div>我的资料</a>
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
				<h1>课程广场</h1>
			</div>
		</div>
		<div class="row">
			<?php if(is_array($course)): foreach($course as $key=>$v): ?><div class="thumbnail col-lg-2 col-md-2 col-sm-2 col-xs-2 block1 ellipsis" style="line-height: 30px;">
					<span class="hide"><?php echo ($v["cno"]); ?></span>
					<p>
						<a href="<?php echo U('Index/Notice/index',array('cno' => $v['cno']));?>"><?php echo ($v["cname"]); ?>
							<br>
							<small><?php echo ($v["tname"]); ?></small>
						</a>
					</p>
					<p>
						<?php if (!$v['isin']): ?>
						<form class="form-apply">
							<input type="hidden" name="cno" value="<?php echo ($v['cno']); ?>">
							<a  class="btn btn-success btn-apply btn-sm">申请加入</a>
						</form>
						<?php endif ?>
					</p>
				</div><?php endforeach; endif; ?>
			<?php if ($course[0]==null): ?>
			<div>没有课程</div>
			<?php endif ?>
		</div>
	</div>
	<div id="info" data-activeheader="#header-course"></div>
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

	<script type="text/javascript">
		$(".btn-apply").click(function(event) {
			/* Act on the event */
			$.post("<?php echo U('Index/Course/apply');?>", $(this).closest('form').serialize(), function(data, textStatus, xhr) {
				/*optional stuff to do after success */
				if(data.status==1)
				{
					alert("申请成功，等待验证");
					CA(1);
				}else
				{
					alert("已发送申请，再申请一次也是一样的~");
					CA(1);
				}
			});
		});
	</script>
</body>
</html>