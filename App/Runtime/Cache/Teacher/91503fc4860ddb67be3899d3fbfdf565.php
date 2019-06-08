<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<title><?php echo ($cname); ?>　主页</title>
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

	<link href="__PUBLIC__/css/datetimepicker.css" rel="stylesheet">
	<script src="__PUBLIC__/js/edittable.js"></script>
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
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="main-left">
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
				图表分析
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
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
				<div id="main-right">
					<div class="row">
						<div class="panel panel-warning">
							<div class="panel-heading">发布公告</div>
							<div class="panel-body">

								<form id="form-notice">
									<textarea id="textarea-notice" class="form-control" name="notice" ></textarea>
									<input type="hidden" name="cno" value="<?php echo I('cno');?>">
									<a id="btn-notice" class="btn btn-primary pull-right" style="margin-top:5px">发布</a>
								</form>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="panel panel-danger" id="dialog-apply">
							<div class="panel-heading">课程加入申请</div>

							<form id="form-approve" action="<?php echo U('Teacher/Management/approve');?>" method="POST">
								<div class="panel-body">
									<?php if(is_array($apply)): foreach($apply as $key=>$v): ?><div class="tr-apply">
											<input type="checkbox" name="<?php echo ($v['sno']); ?>">
											<?php echo ($v["sname"]); ?>
											<?php echo ($v["sno"]); ?>
										</div><?php endforeach; endif; ?>
								</div>

								<div class="panel-footer">
									<input type="hidden" name="cno" value="<?php echo I('cno');?>">
									<a id="btn-approve" class="btn btn-danger">批准加入</a>
								</form>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="panel panel-info">
							<div class="panel-heading">上传课件</div>
							<div class="panel-body" style="padding:0px">
								<form id="form-upload" enctype="multipart/form-data">
									<input name="upload[]" type="file" id="upload" data-cno="<?php echo I('cno');?>" multiple/>
									<input type="hidden" name="cno" value="<?php echo I('cno');?>">
									<input type="hidden" name="cname" value="<?php echo I('cname');?>">
									<!-- <input type="submit" value="上传" class="btn btn-primary pull-right" >
									-->
									<a id="btn-upload" class="btn btn-primary pull-right">上传</a>
									<div style="clear:both"></div>
								</form>
								<div class="progress progress-striped active hide" id="progressbar">
								  <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
								  </div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<a  id="btn-newhomework">布置新作业</a>
							</div>
							<div id="dialog-newhomework" class="panel-body">
								<form id="form-homework" enctype="multipart/form-data">
                                    <input type="hidden" name="cno" value="<?php echo ($cno); ?>">
                                    <input type="hidden" name="cname" value="<?php echo ($cname); ?>">
                                    <div class="form-group">
                                        <label for="htype">类型</label>
                                        <select name="htype" id="htype" class="form-control">
                                            <option value="0" disabled="disabled" selected="selected">---&nbsp&nbsp请选择布置作业的类型&nbsp&nbsp---</option>
                                            <option value="1">普通作业</option>
                                            <option value="2">实验</option>
                                            <option value="3">大实验/大作业</option>
                                            <option value="4">小测验</option>
                                            <option value="5">期中考试</option>
                                            <option value="6">期末考试</option>
                                        </select> 
                                        <div class="errormessage"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="htitle">标题</label>
                                        <input type="text" class="form-control" name="htitle" id="htitle">
                                        <div class="errormessage"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="hcontent">内容</label>
                                        <textarea id="textarea-hcontent" name="hcontent" classs="form-control" id="hcontent"></textarea>
                                        <div class="errormessage"></div>
                                    </div>
                                    <div id="extra" class="form-group" style="display:none">
                                        <label for="tabProduct">评分标准</label>
                                        <table width="600" border="0" cellpadding="0" cellspacing="0" name="tabProduct" id="tabProduct" class="table table-bordered">             
                                            <tr>
                                                <th width="32" align="center"></th>
                                                <th width="150" EditType="TextBox">评分细则</th>
                                                <th width="150" EditType="TextBox">所占比例</th>
                                            </tr>
                                            <tr>
                                                <td align="center"><input type="checkbox" name="checkbox2" value="checkbox" /></td>
                                                <td width="150" name="Num" EditType="TextBox">评分标准1</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><input type="checkbox" name="checkbox2" value="checkbox" /></td>
                                                <td width="150" name="Num" EditType="TextBox">评分标准2</td>
                                                <td>0</td>
                                            </tr>
                                        </table> 
                                        <input type="button" class="btn btn-default" style="margin-left:5px" name="Submit" value="新增" onclick="AddRow(document.getElementById('tabProduct'),1)" />
                                        <input type="button" class="btn btn-default" style="margin-left:5px" name="Submit2" value="删除" onclick="DeleteRow(document.getElementById('tabProduct'),1)" />
                                        <!--input type="button" class="btn btn-primary" style="margin-top:5px;margin-left:5px" name="Submit22" value="重置" onclick="confirm('该操作会将两个表格全部重置，您确定要这么做吗？');window.location.reload()" /-->
                                        <br />
                                        <div class="errormessage"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="dlyear">截止时间</label>
                                        <div class="input-append date form_datetime input-group " id="datetimepicker1" data-date-format="yyyy-MM-dd hh:mm:ss" >
                                            <span class="input-group-addon add-on"> <i class="icon-calendar"></i>
                                            </span>
                                            <input type="text" class="form-control" name="dlyear" id="dlyear" readonly>
                                        </div>
                                        <div class="errormessage"></div>
                                    </div>
                                    <div class="form-group">
                                        <div>
                                            <label for="upload">上传附件(最大30M)</label>
                                            <input name="upload[]" type="file" multiple/>
                                            <br/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <a id="btn-homework" class="btn btn-primary" style="margin-right:1em">布置</a>
                                        <a id="btn-cancelhomework2" class="btn btn-default" data-toggle="collapse" href="#dialog-newhomework">取消</a>
                                    </div>
                                </form>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
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
	<div id="info" data-activeitem="#left-home" ></div>
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

	<script src="__PUBLIC__/js/bootstrap-datetimepicker.js"></script>
	<script src="__PUBLIC__/js/jquery.form.js"></script>
	<script>
		var tabProduct = document.getElementById("tabProduct");

		// 设置表格可编辑
		// 可一次设置多个，例如：EditTables(tb1,tb2,tb2,......)
		EditTables(tabProduct);

		$(document).ready(function() {
			UE.getEditor('textarea-hcontent');
			if($(".tr-apply").text()==""){$("#dialog-apply").addClass('hide');}

		   	$('#datetimepicker1').datetimepicker({
		        language:  'cn',
		        format: 'yyyy-mm-dd hh:ii',
		        weekStart: 1,
		        todayBtn:  1,
		        autoclose: 1,
		        todayHighlight: 1,
		        startView: 2,
		        forceParse: 0,
		        showMeridian: 1
		    });
		    if(typeof(FileReader)!='undefined'){
			   	$("#upload").uploadifive({
			   		auto:true,
			   		buttonText:'<div class="uploadifive-text">点击选择文件</div>',
			   		fileSizeLimit:'30MB',
			   		uploadScript: "<?php echo U('Teacher/Document/uploadDocument/');?>",
			   		formData:{cno:$("#upload").attr("data-cno")},
			   		onUploadComplete:function(file,data) {
			   			//console.log(file,data);
			   		}
			   	});
			   	$("#btn-upload").remove();
			   }
	   	$("#btn-notice").click(function(event) {
			if($("#textarea-notice").val().replace(/\ /g,"")==""){
				$("#textarea-notice").focus();
				return false;
			}
			/* Act on the event */
			$.post("<?php echo U('Teacher/Notice/addNotice');?>", $("#form-notice").serialize(), function(data, textStatus, xhr) {
				/*optional stuff to do after success */
				if(data.status==1)
				{
					alert('发布成功，<a href="'+$("#left-announcement").attr("href")+'">点此查看所有公告</a>');
				}
				else
				{
					alert('发布失败 错误编号：'+data.status);
					CA(1);
				}
			},'json');
		});

			$("#btn-upload").click(function(event) {

				$("#form-upload").ajaxSubmit({
					url:"<?php echo U('Teacher/Document/uploadDocument/');?>",
					type:"POST",
					datatype:"script",
					beforeSubmit :  showProgress,
					success:function(data){
						if(data.status==1)
						{
							$("#progressbar").addClass("hide");
							alert('上传成功,<a href="'+$("#left-document").attr("href")+'"点击查看所有课件</a>');
						}
						else
						{
							$("#progressbar").addClass("hide");
							alert('上传失败');
							CA(1);
						}

					}
				});
			});

			$("#btn-homework").click(function(event) {
				$(".errormessage").text("");
				if($("#htype").children('option:selected').val()=="0"){$("#htype").siblings('.errormessage').text('请选择作业类型');$("#htype").focus();return false;}
				if($("#htitle").val()==""){$("#htitle").siblings('.errormessage').text('请输入标题');$("#htitle").focus();return false;}
				if($("#hcontent").val()==""){$("#hcontent").siblings('.errormessage').text('请输入内容');$("#hcontent").focus();return false;}
				if($("#dlyear").val()==""){$("#datetimepicker1").siblings('.errormessage').text('日期不能为空');$("#dlyear").focus();return false;}
				alert("正在处理……");
				var arr = new Array();
				var numofrows = $("#tabProduct").find("tr").size()-1;
				var pnaiter;
				var psciter;
				var pna;
				var value;
				var jsonitem;
				for(var j=0;j<numofrows;j++){
					pnaiter = $("#tabProduct").find("tr").eq(j+1).find('td').eq(1);
					psciter = pnaiter.next();
					pna = pnaiter.html();
					value = psciter.html();
					jsonitem ={'pname':pna,'score':parseInt(value)};
					arr.push(jsonitem);
				}
				$("#form-homework").ajaxSubmit({
					url:"<?php echo U('Teacher/Homework/addHomeworkHandle');?>",
					type:"POST",
					data: {
						'jsonarr':JSON.stringify(arr)
					},
					success:function(data){
						if(data.status == 1) {
							alert('布置成功');
							CAR(1);
						}
						else if(data.status == 3) {
							alert('评分标准和必须为100%，再检查一下吧！');
						}
						else
						{
							if (data.info) {
								alert(data.info);
							} else {
								alert('布置失败了……（可能因为附件过大）');
							}
						}
					}
				});
			});

            $("#htype").change(function(){
                var selected=$(this).children('option:selected').val();
                if(selected=="1"||selected=="4"||selected=="5"||selected=="6"){
                    $("#extra").css("display","none");
                }else if(selected=="2"||selected=="3"){
                    $("#extra").css("display","block");
                }
            });

		});
		
	   $("#btn-approve").click(function(event) {
			/* Act on the event */
			$("#form-approve").ajaxSubmit({
				url:"<?php echo U('Teacher/Management/approve');?>",
				type:"POST",
				datatype:"json",
				success:function(data){
					if(data.status==1)
					{
						alert('批准成功');
						CAR(1);
					}
					else
					{
						alert('批准失败');
						CAR(1);
					}
				}
			});
		});

	</script>
</body>
</html>