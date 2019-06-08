<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <title><?php echo ($cname); ?>　备份</title>
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

    <link rel="stylesheet" href="css/bootswatch/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="__PUBLIC__/css/dropzone.css">
    <style>
        body{
            font-size: 15px;
        }
        #suggestion:hover #words{display: block;}
        #words{
            position: absolute;
            display: none;
            z-index: 5;
            width:350px;
            height: 230px;
            padding:20px;
            right:-138px;
            float:right;
            color: 	black;
            background-color:#DCDCDC;
            box-shadow:2px 2px 1px rgba(0, 0, 0, 0.3);
            font-size: 13px;
            text-align: left;
            filter:alpha(Opacity=80);
            -moz-opacity:0.6;
            opacity: 0.7;
        }
    </style>
</head>
<body>
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
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-10" id="main-left">
                	<div id="sidebar1" class="panel panel-info" style="width:110%">
		<div class="panel-heading"><?php echo ($cname); ?></div>
		<div class="list-group"  role="menu">
			<a id="left-home" class="list-group-item" href="<?php echo U('Teacher/Course/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-home"></span>
				</div>
				主页
			</a>
			<a id="left-announcement" class="list-group-item" href="<?php echo U('Teacher/Notice/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-reorder"></span>
				</div>
				公告
			</a>
			<a id="left-question" class="list-group-item" href="<?php echo U('Teacher/Question/index',array('cno' => $_REQUEST['cno']));?>" >
				<div class="list-icon">
					<span class="icon-comments"></span>
				</div>
				问答
			</a>
			<a id="left-group" class="list-group-item" href="<?php echo U('Teacher/Group/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-group"></span>
				</div>
				小组
			</a>
			<a id="left-homework" class="list-group-item" href="<?php echo U('Teacher/Homework/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-edit"></span>
				</div>
				作业
			</a>
			<a id="left-document" class="list-group-item" href="<?php echo U('Teacher/Document/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-file-text"></span>
				</div>
				课件
			</a>
			<a id="left-intro" class="list-group-item" href="<?php echo U('Teacher/Management/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-info"></span>
				</div>
				课程管理
			</a>

			<a id="left-outline" class="list-group-item" href="<?php echo U('Teacher/Outline/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-check-sign"></span>
				</div>
				课程大纲
			</a>
			<!--a id="left-save" class="list-group-item" href="<?php echo U('Teacher/Homework/saveAllHomework',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-copy"></span>
				</div>
				作业备份

			</a-->
			<a id="left-save" class="list-group-item" href="<?php echo U('Teacher/Backup/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-copy"></span>
				</div>
				作业备份
			</a>
			<a id="left-chart" class="list-group-item" href="<?php echo U('Teacher/Charts/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-bar-chart"></span>
				</div>
				达成度分析
			</a>		
		</div>
	</div>

	<div id="sidebar2" style="width:110%">
		<div class="panel panel-success">
			<div class="panel-heading">您的课程</div>
			<div class="list-group">
				<?php foreach (session('selectedCourses') as $key => $value): ?>
				<a id="course<?php echo ($value['cno']); ?>" class="left-changecourse list-group-item" href="<?php echo U('Teacher/Course/index',array('cno' =>$value['cno']));?>" ><?php echo ($value['cname']); ?></a>
				<?php endforeach ?>
				<?php foreach (session('secondcourse') as $key => $value): ?>
				<a id="course<?php echo ($value['cno']); ?>" class="left-changecourse list-group-item" href="<?php echo U('Teacher/Course/index',array('cno' =>$value['cno']));?>" ><?php echo ($value['cname']); ?></a>
				<?php endforeach ?></div>

		</div>


	</div>


            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10" >
            <div id="main-right">
                <div class="row">         
                    <div class="panel panel-success" style="border-color:	#008080">
                        <div class="panel-heading" style="background-color:	#008080;border-color:#008080; font-weight: bold;font-size: 120%;">作业备份
                            <div class="list-icon" style="position:relative;left:80%;top:20%;" id="suggestion">
                                <span class="icon-question"></span>
                                <div id="words" >
                            <p>已备份：查看已备份的作业/考试等，点击下载到本地</p>
                            <p>未备份：尚未备份的作业/考试等</p>
                            <p>已备份本地文件：查看已备份的本地文件，点击下载到本地</p>
                            <p>备份本地文件：通过拖拽或双击已备份本地的资料文件</p>
                            <p>备份到本地：将所有课程资料，包括课件、作业、考试、学生名单等，下载到本地</p>
                        </div>
                            </div>
                        </div>
                        
                        <div>
                            <div>
                                <nav class="navbar" role="navigation"> 
                                    <div class="container-fluid"> 
                                        <div> 
                                            <ul class="nav navbar-nav nav-tabs"> 
                                                <li class="active"><a href="<?php echo U('Teacher/Backup/index',array('cno' => $_REQUEST['cno']));?>">已备份</a></li> 
                                                <li><a href="<?php echo U('Teacher/Backup/ready',array('cno' => $_REQUEST['cno']));?>">未备份</a></li> 
                                                <li><a href="<?php echo U('Teacher/Backup/localview',array('cno' => $_REQUEST['cno']));?>">已备份本地文件</a></li>
                                                <li><a href="<?php echo U('Teacher/Backup/local',array('cno' => $_REQUEST['cno']));?>">备份本地文件</a></li>
                                                <li><a href="<?php echo U('Teacher/Homework/saveAllHomework',array('cno' => $_REQUEST['cno']));?>" onclick="if(confirm('确定下载所有课程资料?')==false)return false;">备份全部资料到本地</a></li>
                                                <!--li><a href="<?php echo U('Teacher/Backup/ftpsave',array('cno' => $_REQUEST['cno']));?>">ftp测试</a></li-->                                                                
                                            </ul> 
                                        </div> 
                                    </div> 
                                </nav>
                            </div>
                            <div style="width: 100%;height: 100%;border-radius: 5px;" id="hasbackuped">
                                <table  class="table">
                                        <tr>
                                            <td width="4em"></td>
                                            <td>备份项名称</td>
                                            <td>备份文件大小</td>
                                        </tr>
                                        <?php if(is_array($backuplist)): foreach($backuplist as $key=>$b): ?><tr>
                                            <td></td>
                                            <td><a href="<?php echo U('Teacher/Backup/getBackup',array('cno' => $_REQUEST['cno'] , 'hno' => $b['hno'] , 'bno' => $b['bno'] , 'fname' => $b['bname']));?>"><?php echo ($b["htitle"]); ?></a></td>
                                            <!--td><?php echo ($b["size"]); ?>KB</td-->
                                            <td>
                                                    <?php if($b["bsize"] < 1024 ): echo ($b["bsize"]); ?>B
                                                            <?php elseif($b["ksize"] < 1024): echo ($b["ksize"]); ?>KB
                                                            <?php elseif($b["msize"] < 1024): echo ($b["msize"]); ?>MB
                                                            <?php else: ?> <?php echo ($b["gsize"]); ?>GB<?php endif; ?>
                                            </td>
                                        </tr><?php endforeach; endif; ?>              
                                </table>
                                <div>
                                        <div class="page"><?php echo ($page); ?></div>
                                </div>
                                       
                                <?php if ($backuplist[0]==null): ?>
                                    <div class="panel-body">您还没有备份过任何作业哦~</div>
                                <?php endif ?>     
                            </div>
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
    </div>
    <div id="info" data-activeitem="#left-save" ></div>
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
<script src="__PUBLIC__/js/dropzone.min.js"></script>
</html>