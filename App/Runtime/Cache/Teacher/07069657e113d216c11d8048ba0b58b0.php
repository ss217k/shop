<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<title><?php echo ($cname); ?>　课程管理</title>
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

	<style>
	.manage-title,.manage-title:visited,.manage-title:link{
		color:inherit;
		text-decoration: none;
		display: inline-block;
	}
	.manage-title:hover{
		color:inherit;
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
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">
				<div id="main-right">
					<div class="row">
						<div class="panel panel-danger">
							<div class="panel-heading">
								<a class="title manage-title">学生管理</a>
							</div>
							<div  id="panel-students">
								<form id="form-delete" name="deletestudent" action="<?php echo U('Teacher/Management/deleteStudent');?>" method="POST" class="inline">
									<table  class="table">
										<tr>
											<th style="width:10px"><input type="checkbox"  onclick="AllCheck (this.form);" style="zoom:150%;"/></th>
											<td>姓名</td>
											<td>学号</td>
										</tr>
										<?php if(is_array($student)): foreach($student as $key=>$v): ?><tr>
												<td style="width:10px"><input type="checkbox" id="students" name="<?php echo ($v['sno']); ?>" class="checklist" style="zoom:150%;"></td>
												<td><?php echo ($v["sname"]); ?></td>
												<td><?php echo ($v["sno"]); ?></td>
											</tr><?php endforeach; endif; ?>
									</table>
									<div style="text-align:center;"><?php echo ($page); ?></div>
									<div class="list-group-item">
										<input type="hidden" name="cno" value="<?php echo I('cno');?>">
										<a id="btn-delete" class="btn btn-danger">删除所选学生</a>
									</div>
								</form>
								<div class="panel-footer">
									<form id="form-add" class="form">
										<span class="pull-left">输入学号添加学生：</span>
										<div class="form-group inline">
											<div class="col-xs-6">
												<input type="text" name="sno" class="form-control" required/>
											</div>
											<input type="hidden" name="cno" value="<?php echo I('cno');?>"/>
											<a id="btn-add" class="btn btn-primary">添加</a>
										</div>
									</form>
									<br>
									<form id="upload4add" class="form">
										<input name="upload[]" type="file" id="upload" data-cno="<?php echo I('cno');?>" multiple/>
										<input type="hidden" name="cno" value="<?php echo I('cno');?>">
										<input type="hidden" name="cname" value="<?php echo I('cname');?>">
										<a id="btn-upload4add" class="btn btn-primary">上传文件(.xlsx)以添加学生</a>
										<span class="help-block" style="font-size:5px;">名单格式要求：
											表格B列为学号（必选），C列为姓名。</span>
										<div style="clear:both"></div>
									</form>
									<div class="progress progress-striped active hide" id="progressbar">
									  	<div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									  	</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--div class="row">
						<div class="panel  panel-warning">
							<div class="panel-heading">课程介绍</div>
							<div class="panel-body">
								<form id="form-intro" class="form">
									<div class="form-group">
										<label for="intro">课程简介</label>
										<textarea name="intro" class="form-control"><?php echo ($teacher["0"]["intro"]); ?></textarea>
									</div>
									<div class="form-group">
										<label for="intro">考核方式</label>
										<textarea name="checkway" class="form-control"><?php echo ($teacher["0"]["checkway"]); ?></textarea>
									</div>
									<div class="form-group">
										<label for="cnotes">备注</label>
										<textarea name="cnotes" class="form-control"><?php echo ($teacher["0"]["cnotes"]); ?></textarea>
									</div>
										<input type="hidden" name="cno" value="<?php echo I('cno');?>">
									<div class="form-group">
										<a id="btn-intro" class="btn btn-primary">修改</a>
									</div>
								</form>
							</div>
						</div>
					</div-->
					<div class="row">
						<div class="panel panel-success">
							<div class="panel-heading">
								<a class="title manage-title">助教管理</a>
							</div>
							<div  id="panel-assi">
								<form id="form-delete-assi" name="deletestudent" action="<?php echo U('Teacher/Management/deleteAssi');?>" method="POST" class="inline">
									<table  class="table">
										<tr>
											<th style="width:10px"><input type="checkbox" onclick="AllCheck (this.form);" style="zoom:150%;"/></th>
											<td>姓名</td>
											<td>学号</td>
										</tr>
										<?php if(is_array($assi)): foreach($assi as $key=>$v): ?><tr>
												<td style="width:10px"><input type="checkbox" name="<?php echo ($v['sno']); ?>" class="checklist" style="zoom:150%;"></td>
												<td><?php echo ($v["sname"]); ?></td>
												<td><?php echo ($v["sno"]); ?></td>
											</tr><?php endforeach; endif; ?>
									</table>
									<div style="text-align:center;"><?php echo ($apage); ?></div>
									<div class="list-group-item">
										<input type="hidden" name="cno" value="<?php echo I('cno');?>" id="cnohelp">
										<a id="btn-delete-assi" class="btn btn-danger">删除所选助教</a>
										<a id="btn-delete-assi" class="btn btn-primary" style="margin-left:10px;" href="<?php echo U('Teacher/AssistantManage/index',array('cno' => $_REQUEST['cno'],'ano' => $assi[0]['ano']));?>">助教权限管理</a>
									</div>
								</form>
								<div class="panel-footer">
									<form id="form-add-assi" class="form">
										<span class="pull-left">输入学号添加助教：</span>
										<div class="form-group inline">
											<div class="col-xs-6">
												<input type="text" name="sno" class="form-control" required/>
											</div>
											<input type="hidden" name="cno" value="<?php echo I('cno');?>"/>
											<a id="btn-add-assi" class="btn btn-primary">添加</a>
										</div>
									</form>
									<br>
									<div class="progress progress-striped active hide" id="progressbar">
									  	<div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									  	</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row"></div>
					<div class="row">
						<?php if (session('notfirstteacher')==0) { ?>
						<div class="panel panel-warning">
							<div class="panel-heading">
								<a class="title manage-title">其他教师管理</a>
							</div>
							<div  id="panel-second">
								<form id="form-delete-secondteacher" name="deletesecondteacher" action="<?php echo U('Teacher/Management/deletesecondteacher');?>" method="POST" class="inline">
									<table  class="table">
										<tr>
											<th style="width:10px"><input type="checkbox" onclick="AllCheck (this.form);" style="zoom:150%;"/></th>
											<td>姓名</td>
											<td>教师编号</td>
										</tr>
										<?php if(is_array($secondteacher)): foreach($secondteacher as $key=>$v): ?><tr>
												<td style="width:10px"><input type="checkbox" name="<?php echo ($v['tno']); ?>" class="checklist" style="zoom:150%;"></td>
												<td><?php echo ($v["tname"]); ?></td>
												<td><?php echo ($v["tno"]); ?></td>
											</tr><?php endforeach; endif; ?>
									</table>
									<div style="text-align:center;"><?php echo ($apage); ?></div>
									<div class="list-group-item">
										<input type="hidden" name="cno" value="<?php echo I('cno');?>">
										<a id="btn-delete-secondteacher" class="btn btn-danger">删除所选教师</a>
									</div>
								</form>
								<div class="panel-footer">
									<form id="form-add-secondteacher" class="form">
										<span class="pull-left">输入教师号添加教师：</span>
										<div class="form-group inline">
											<div class="col-xs-6">
												<input type="text" name="tno" class="form-control" required/>
											</div>
											<input type="hidden" name="cno" value="<?php echo I('cno');?>"/>
											<a id="btn-add-secondteacher" class="btn btn-primary">添加</a>
										</div>
									</form>
									<br>
									<div class="progress progress-striped active hide" id="progressbar">
									  	<div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
									  	</div>
									</div>
								</div>
							</div>
						</div>
						<?php  } ?>
					</div>
					
					<div class="row">
						<div class="panel panel-danger">
							<div class="panel-heading">
								  <a id="btn-deletecourse" class="accordion-toggle title" data-toggle="collapse" href="#dialog-newhomework">删除课程</a>
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
	<div id="info" data-activeitem="#left-intro"></div>
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

	<script src="__PUBLIC__/js/jquery.form.js"></script>
	<script>
		$(document).ready(function(){
			UE.getEditor('textarea-hcontent');
			if($(".tr-apply").text()==""){$("#dialog-apply").addClass('hide');}

			if(typeof(FileReader)!='undefined'){
			   	$("#upload").uploadifive({
			   		auto:true,
			   		buttonText:'<div class="uploadifive-xlsx">上传文件(.xlsx)以添加学生</div>',
			   		fileSizeLimit:'30MB',
			   		uploadScript: "<?php echo U('Teacher/Document/uploadStudentList/');?>",
			   		formData:{cno:$("#upload").attr("data-cno")},
			   		onUploadComplete:function(file,data){
			   			if ($.parseJSON(data).status === 1) {
			   				alert('添加成功');
			   				CAR(1);
			   			} else {
			   				alert('添加失败，请检查文件格式或联系管理员');
			   			}
			   		}
			   	});
			   	$("#btn-upload4add").remove();
			}

			$("#btn-add").click(function(event) {
				/* Act on the event */
				$.post("<?php echo U('Teacher/Management/addStudent');?>", $("#form-add").serialize(), function(data, textStatus, xhr) {
					/*optional stuff to do after success */
					if(data.status==1)
					{
						alert('添加成功');
						CAR(0.5)
					}
					else
					{
						if(data.status==2)
						{
							alert('该学生已在本课程中');
							CA(1);
						}else
						{
							if(data.status==3)
							{
								alert('该学生不存在');
							}
							else{
								alert('添加失败');
							}
							CA(2);
						}

					}

				},'json');
			});

			$("#btn-add-assi").click(function(event) {
				/* Act on the event */
				$.post("<?php echo U('Teacher/Management/addAssi');?>", $("#form-add-assi").serialize(), function(data, textStatus, xhr) {
					/*optional stuff to do after success */
					if(data.status==1)
					{
						alert('添加成功');
						CAR(0.5)
					}
					else
					{
						if(data.status==2)
						{
							alert('该助教已在本课程中');
							CA(1);
						}else
						{
							if(data.status==3)
							{
								alert('该助教不存在');
							}
							else{
								alert('添加失败');
							}
							CA(2);
						}

					}

				},'json');
			});

			$("#btn-add-secondteacher").click(function(event) {
				/* Act on the event */
				$.post("<?php echo U('Teacher/Management/addsecondteacher');?>", $("#form-add-secondteacher").serialize(), function(data, textStatus, xhr) {
					/*optional stuff to do after success */
					if(data.status==1)
					{
						alert('添加成功');
						CAR(0.5)
					}
					else
					{
						if(data.status==2)
						{
							alert('该助教已在本课程中');
							CA(1);
						}else
						{
							if(data.status==3)
							{
								alert('该助教不存在');
							}
							else{
								alert('添加失败');
							}
							CA(2);
						}

					}

				},'json');
			});

			$("#btn-upload4add").click(function(event) {

				$("#form-upload4add").ajaxSubmit({
					url:"<?php echo U('Teacher/Document/uploadStudentList');?>",
					type:"POST",
					datatype:"script",
					beforeSubmit :  showProgress,
					success:function(data){
						if(data.status==1)
						{
							$("#progressbar").addClass("hide");
							alert('导入成功');
						}
						else
						{
							$("#progressbar").addClass("hide");
							alert('导入失败');
							CA(1);
						}

					}
				});
			});

			$("#btn-delete").click(function(event) {
				/* Act on the event */
				$.post("<?php echo U('Teacher/Management/deleteStudent');?>", $("#form-delete").serialize(), function(data, textStatus, xhr) {
					/*optional stuff to do after success */
					if(data.status==1)
					{
						alert('删除成功');
						CAR(1);
					}
					else
					{
						alert('删除竟然失败了');
					}

				},'json');
			});

			$("#btn-delete-assi").click(function(event) {
				/* Act on the event */
				$.post("<?php echo U('Teacher/Management/deleteAssi');?>", $("#form-delete-assi").serialize(), function(data, textStatus, xhr) {
					/*optional stuff to do after success */
					if(data.status == 1 || data.status == 4)
					{
						alert('删除成功');
						CAR(1);
					}
					else
					{
						alert('删除竟然失败了 , 错误代号：'+data.status);
					}

				},'json');
			});

			$("#btn-delete-secondteacher").click(function(event) {
				/* Act on the event */
				$.post("<?php echo U('Teacher/Management/deletesecondteacher');?>", $("#form-delete-secondteacher").serialize(), function(data, textStatus, xhr) {
					/*optional stuff to do after success */
					if(data.status == 1 || data.status == 4)
					{
						alert('删除成功');
						CAR(1);
					}
					else
					{
						alert('删除竟然失败了 , 错误代号：'+data.status);
					}

				},'json');
			});

			$("#btn-intro").click(function(event) {
				/* Act on the event */
				$.post("<?php echo U('Teacher/Management/updateIntroductionHandle');?>", $("#form-intro").serialize(), function(data, textStatus, xhr) {
					/*optional stuff to do after success */
					if(data.status==1)
					{
						alert("修改成功");
						CA(0.5);
					}
					else
					{
						alert("修改失败");
						CA(1);
					}

				},'json');
			});
			$("#btn-deletecourse").click(function(event) {
				/* Act on the event */
				//alert("s");
				var cno = $("#cnohelp").val();
				bootbox.confirm({
                    message: "您确认要删除这门课程吗？" ,
                	callback: function(result) {
                    	if(result==true){
							$.post("<?php echo U('Teacher/Management/delcourse');?>",{'cno':cno},function(data){
							if(data.status==1){
								alert("删除成功");
								setTimeout(function() {
									window.location.href="<?php echo U('Teacher/home/index');?>"; 
								}, 1 * 2000);
							}
							else{
								alert("删除失败，请稍后再试或联系管理员..");
							}})
						}
    	                else{
							//do nothing
    	                }
        	        }});
			});

		});
		var selectState = false;  
		// 全选或者全取消  
		function AllCheck(thisform)  
		{  
			for (var i = 0; i < thisform.elements.length; i++)  
			{  
			// 提取控件    
			var checkbox = thisform.elements[i];  
			checkbox.checked = !selectState;  
			}  
			selectState = !selectState;  
		}  
	</script>
</body>
</html>