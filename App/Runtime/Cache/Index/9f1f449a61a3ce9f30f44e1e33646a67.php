<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html ng-app="Unicourse">
<head>
	<title><?php echo ($cname); ?>　公告</title>
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
<body >
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

	<div id="main-container" class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-10" id="main-left">
					<div id="sidebar1" class="panel panel-info" style="width:110%">
		<div class="panel-heading"><div class="list-icon"><span class="icon-home"></span></div><?php echo ($cname); ?></div>
		<div class="list-group"  role="menu">
			<a id="left-announcement" class="list-group-item" href="<?php echo U('Index/Notice/index',array('cno' =>$_REQUEST['cno']));?>" ><div class="list-icon"><span class="icon-reorder"></span></div>公告</a>
			<a id="left-question" class="list-group-item" href="<?php echo U('Index/Question/index',array('cno' =>$_REQUEST['cno']));?>" ><div class="list-icon"><span class="icon-comments"></span></div>问答</a>
			<a id="left-group" class="list-group-item" href="<?php echo U('Index/Group/index',array('cno' =>$_REQUEST['cno']));?>"><div class="list-icon"><span class="icon-group"></span></div>小组</a>
			<a id="left-homework" class="list-group-item" href="<?php echo U('Index/Homework/index',array('cno' =>$_REQUEST['cno']));?>"><div class="list-icon"><span class="icon-edit"></span></div>作业</a>
			<a id="left-document" class="list-group-item" href="<?php echo U('Index/Document/index',array('cno' =>$_REQUEST['cno']));?>"><div class="list-icon"><span class="icon-file-text"></span></div>课件</a>
			<!--a id="left-intro" class="list-group-item" href="<?php echo U('Index/Introduction/index',array('cno' =>$_REQUEST['cno']));?>"><div class="list-icon"><span class="icon-info"></span></div>课程介绍</a-->
			<a id="left-outline" class="list-group-item" href="<?php echo U('Index/Outline/index',array('cno' =>$_REQUEST['cno']));?>"><div class="list-icon"><span class="icon-check-sign"></span></div>课程大纲</a>

		</div>
	</div>
	<div id="sidebar2" style="width:110%">
		<div class="panel panel-success">
			<div class="panel-heading">课程切换</div>
			<div class="list-group">
				<?php  foreach (session('selectedCourses') as $key => $value) { ?>
				<a id="left-<?php echo ($value['cname']); ?>" class="list-group-item left-changecourse" href="__URL__/index/cno/<?php echo ($value['cno']); ?>" ><?php echo ($value['cname']); ?></a>
				<?php  } ?>	
				<a href="<?php echo U('Index/Course/index');?>" class="list-group-item panel-footer">所有课程</a>
			</div>
		</div>
	</div>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">
				<div id="main-right">
					<div class="row">
						<div class="panel panel-primary">
							<div class="panel-heading">公告板</div>
							<ul class="list-group item">
								<?php if(is_array($home)): foreach($home as $key=>$v): ?><li class="list-group-item">
										<small class="pull-right time"><?php echo ($v["ntime"]); ?></small>
										<span class="content"><?php echo ($v["ncontent"]); ?></span>
									</li><?php endforeach; endif; ?>
								<?php if ($home[0]==null): ?>
								<li class="list-group-item">
									<div class="panel-body">还没有公告呢~~</div>
								</li>
								<?php endif ?></ul>
							<div class="panel-footer">
								<div class="page"><?php echo ($page); ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2">
				<div  id="corner" style="position:fixed;">
	<div id="btn-totop" class="corner-btn">
		<a href="#" title="回顶部" onclick="goTop();return false;">
			<span class=" icon-circle-arrow-up icon-3x"></span>
		</a>
	</div>
	<div id="btn-feedback" class="corner-btn" data-toggle="modal" data-target="#modal-feedback" title="意见反馈">
		<a href="#">
			<span class="icon-edit-sign icon-3x"></span>
		</a>
	</div>
</div>

<?php if($_SESSION['type']=='student') :?>
<div class="modal fade" id="modal-feedback">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btn-closemodal">&times;</button>
				<h4 class="modal-title">意见与建议</h4>
			</div>
			<form id="form-feedback" class="form" action="<?php echo U('Index/FeedBack/Add');?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="fbcontent">
							我们接受各种形式各种内容的反馈，您的意见与建议是我们前进的不竭动力~
							<img src="__PUBLIC__/images/shy.gif"></label>
						<textarea name="fbcontent" id="fbcontent" class="form-control"  placeholder="在这里输入您想说的" style="height:150px"></textarea>
						<div class="errormessage" id="blankerror">你好像啥都没写唉<img src="__PUBLIC__/images/kb.gif"></div>
					</div>
					<div class="form-group">
						<label for="feedback-chk">
							是否匿名：
							<input type="radio" name="anonymous" value="0" checked>
							否
							<input type="radio" name="anonymous" value="1">是</label>
					</div>
					<div class="form-group">
						您的吐槽将于
						<a href="<?php echo U('Index/FeedBack/Index');?>" target="_blank">吐槽区</a>
						中呈现，有什么想说的尽情说出来吧~<img src="__PUBLIC__/images/dx.gif">
						<br>
						<a href="<?php echo U('Index/FeedBack/Index');?>" target="_blank">看看大家都在说啥</a>
						<img src="__PUBLIC__/images/lks.gif"></div>
						<input type="hidden" name="title" id="feedback-title" value="">
				<input type="hidden" name="utype" value="1">
				</div>

				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btn-submitfeedback">提交</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php  endif ?>
<?php if($_SESSION['type']=='teacher' || $_SESSION['issuper']==1) :?>
<div class="modal fade" id="modal-feedback">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btn-closemodal">&times;</button>
				<h4 class="modal-title">意见与建议</h4>
			</div>
			<form id="form-feedback" class="form" action="<?php echo U('Index/FeedBack/Add');?>">
				<div class="modal-body">
					<div class="form-group">
						<label for="fbcontent">
							我们接受各种形式各种内容的反馈，您的意见与建议是我们前进的不竭动力!</label>
						<textarea name="fbcontent" class="form-control"   placeholder="在这里输入您想对我们说的" style="height:150px" id="fbcontent"></textarea>
						<div class="errormessage" id="blankerror">请输入内容</div>
					</div>
					<div class="form-group">
						<label for="feedback-chk">
							是否匿名：
							<input type="radio" name="anonymous" value="0" checked>
							否
							<input type="radio" name="anonymous" value="1">是</label>
					</div>
					<div class="form-group">
						您的意见与建议将在<a href="<?php echo U('Index/FeedBack/Index');?>" target="_blank">意见反馈</a>板块显示，如想私信请发邮件到unicourse@163.com或者直接联系我们，我们将尽快处理
					</div>
					<input type="hidden" name="title" id="feedback-title" value="">
				<input type="hidden" name="utype" value="2">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" id="btn-submitfeedback">提交</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php  endif ?>

			</div>
		</div>
	</div>
	<div id="info" data-activeitem="#left-announcement" data-activeheader="#header-course"></div>
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

</body>
</html>