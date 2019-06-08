<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<title>作业详情</title>
	  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="__PUBLIC__/images/icon.png" mce_href="__PUBLIC__/images/icon.png" type="image/x-icon">
  <link  id="theme" href="__PUBLIC__/css/custom/bootstrap.style.css" rel="stylesheet">
  <link  href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet">
  <link href="__PUBLIC__/css/style.css" rel="stylesheet">

<!--[if lt IE 9]>
<script type="text/javascript" src="__PUBLIC__/js/ie-compatible.js"></script>
<![endif]-->
	<style>
		.text-grade {width:30px;}
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
			<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
				<div id="main-right">
					<div class="panel panel-primary" style="min-width:600px">
						<div class="panel-heading"><?php echo ($homework["0"]["htitle"]); ?></div>
						<div class="panel-body">
							<small class="pull-right"><?php echo ($homework["0"]["htime"]); ?></small>
							<?php echo ($homework["0"]["hcontent"]); ?>
							<br>
							<span class="label label-default">截止时间：</span>
							<?php echo ($homework["0"]["deadline"]); ?>
							<hr>
							<div>
								附件：
								<?php if ($homeworkfile[0]==null): ?>
								无
								<?php endif ?>
								<table class="table">
									<?php if(is_array($homeworkfile)): foreach($homeworkfile as $key=>$v): ?><tr>
											<td>
												<form action="<?php echo U('Teacher/CommonCourse/homeworkDownload');?>" method="POST" class="inline">
													<input type="hidden" name="fname" value="<?php echo ($v['fname']); ?>">
													<input type="hidden" name="fno" value="<?php echo ($v['fno']); ?>">
													<input type="hidden" name="cno" value="<?php echo I('cno');?>">
													<input type="submit" name="submit" value="<?php echo ($v["fname"]); ?>" class="btn btn-link pull-left">
													<small class="pull-right"><?php echo ($v["ftime"]); ?></small>
												</form>
												<form class="form-delete inline">
													<input type="hidden" name="fno" value="<?php echo ($v['fno']); ?>">
													<input type="hidden" name="cno" value="<?php echo I('cno');?>">
													<a class="btn btn-mini pull-left btn-delete">删除</a>
												</form>
											</td>
										</tr><?php endforeach; endif; ?>
								</table>
							</div>
							<hr>
							<!-- <div>
								上传附件（最大大小：30MB）：
								<div class="progress progress-striped active hide" id="progressbar" >
									<div class="progress-bar"  role="progressbar" style="width: 100%"></div>
								</div>
								<form id="form-upload" enctype="multipart/form-data">
									<input name="upload[]" type="file" multiple/>
									<input type="hidden" name="hno" value="<?php echo I('hno');?>">
									<input type="hidden" name="cno" value="<?php echo I('cno');?>">
									<a id="btn-upload" class="btn btn-primary">上传</a>
								</form>
							</div> -->
							<hr>
							<div>
								已提交情况：
								<form action="<?php echo U('Teacher/CommonCourse/studentHomeworkDownloadAll');?>">
									<input type="hidden" name="hno" value="<?php echo I('hno');?>" >
									<input type="hidden" name="cno" value="<?php echo I('cno');?>">
									<input type="hidden" name="mode" value="0">
									<input class="btn btn-link pull-left" type="submit" name="submit" value="下载全部" style="max-width:300px;overflow:hidden;"></form>
								<form action="<?php echo U('Teacher/CommonCourse/studentHomeworkDownloadAll');?>">
									<input type="hidden" name="hno" value="<?php echo I('hno');?>" >
									<input type="hidden" name="cno" value="<?php echo I('cno');?>">
									<input type="hidden" name="mode" value="1">
									<input class="btn btn-link pull-left" type="submit" name="submit" value="下载全部(自动重命名)" style="max-width:300px;overflow:hidden;"></form>
								<table class="table table-bordered">
									<tr>
										<td>文件</td>
										<td>提交人</td>
										<td>提交人学号</td>
										<td>提交时间</td>
										<td>分数</td>
										<!-- <td>详细</td> -->
									</tr>
									<?php if(is_array($homeworklist)): foreach($homeworklist as $key=>$v): ?><tr name="<?php echo ($v['sno']); ?>">
											<td>
												<form action="<?php echo U('Teacher/CommonCourse/studentHomeworkDownload');?>">
													<input type="hidden" name="fname" value="<?php echo ($v['fname']); ?>">
													<input type="hidden" name="fno" value="<?php echo ($v['fno']); ?>">
													<input type="hidden" name="cno" value="<?php echo I('cno');?>">
													<input class="btn btn-link pull-left download_link" type="submit" name="submit" value="<?php echo ($v["fname"]); ?>" style="max-width:300px;overflow:hidden;"></form>
											</td>
											<td><?php echo ($v["sname"]); ?></td>
											<td><?php echo ($v["sno"]); ?></td>
											<td><?php echo ($v["ftime"]); ?></td>
											<?php if($v["fgrade"] == 0): ?><td id="grade<?php echo ($v["sno"]); ?>" name="fgrade" grade="<?php echo ($v["fgrade"]); ?>">0</td>
											<?php else: ?>
											<td id="grade<?php echo ($v["sno"]); ?>" name="fgrade" grade="<?php echo ($v["fgrade"]); ?>"><?php echo ($v["fgrade"]); ?></td><?php endif; ?>
											<!-- <td><button class="btn-mark" fno="<?php echo ($v["fno"]); ?>" sno="<?php echo ($v["sno"]); ?>" hno="<?php echo I('hno');?>">详细</button></td> -->
										</tr>
										<!-- <tr id="scoretr<?php echo ($v['sno']); ?>" style="display:none">
											<td colspan="6">
												<div>
                               						<form action="<?php echo U('Examiner/Homeworkgrade/pointScore');?>" id="point_score_form<?php echo ($v['sno']); ?>"> 
                                    					<label id="owner_sno<?php echo ($v['sno']); ?>"></label></br>
                                    					<label id="owner_name<?php echo ($v['sno']); ?>"></label>
                                    					<?php if(is_array($pointlist)): foreach($pointlist as $key=>$p): ?><div class="form-group">
										   	 					<span><?php echo ($p["pname"]); ?>&nbsp*&nbsp<?php echo ($p["score"]); ?>%</span>
										    					<input type="text" class="form-control scores<?php echo ($v['sno']); ?>" name="<?php echo ($p["pname"]); ?>" pid="<?php echo ($p["pno"]); ?>" > 
										   	 					<div class="errormessage"></div>
									    					</div><?php endforeach; endif; ?>
                                    					<input id="fnohelp<?php echo ($v['sno']); ?>" type="hidden" name="fno" value="<?php echo ($v['fno']); ?>" >
                                    					<input id="hnohelp<?php echo ($v['sno']); ?>" type="hidden" name="hno" value="<?php echo I('hno');?>">
                                    					<input id="snohelp<?php echo ($v['sno']); ?>" type="hidden" name="sno" value="<?php echo ($v['sno']); ?>" >
														<input class="btn btn-primary point_score_button"  name="submit" value="提交" sno="<?php echo ($v['sno']); ?>">
														<label id="owner_name<?php echo ($v['sno']); ?>"></label>
                                					</form>
                            					</div>
											</td>
										</tr> --><?php endforeach; endif; ?>
								</table>
                            </div>            
                            <!--hr>
                            <div id="scorediv" style="display:none">
                                <form action="<?php echo U('Teacher/Homeworkgrade/pointScore');?>" id="point_score_form"> 
                                    <label id="owner_sno"></label></br>
                                    <label id="owner_name"></label>
                                    <?php if(is_array($pointlist)): foreach($pointlist as $key=>$p): ?><div class="form-group">
										    <span><?php echo ($p["pname"]); ?>&nbsp*&nbsp<?php echo ($p["score"]); ?>%</span>
										    <input type="text" class="form-control scores" name="<?php echo ($p["pname"]); ?>" pid="<?php echo ($p["pno"]); ?>" > 
										    <div class="errormessage"></div>
									    </div><?php endforeach; endif; ?>
                                    <input id="fnohelp" type="hidden" name="fno">
                                    <input id="hnohelp" type="hidden" name="hno" value="<?php echo I('hno');?>">
                                    <input id="snohelp" type="hidden" name="sno">
                                    <input class="btn btn-primary"  name="submit" value="提交" id="point_score_button" >
                                </form>
                            </div-->
							<hr>
							<div>
								未提交学生名单：
								<br/>
								<table class="table table-bordered">
									<tr>
										<td>姓名</td>
										<td>学号</td>
									</tr>
									<?php if(is_array($notupload)): foreach($notupload as $key=>$v): ?><tr>
											<td><?php echo ($v["sname"]); ?></td>
											<td><?php echo ($v["sno"]); ?></td>
										</tr><?php endforeach; endif; ?>
								</table>
							</div>
						</div>
					</div>


					<div></div>

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
		var gradelistall = [];
		var fnolistall = [];
		$(document).ready(function(){
			$("#btn-upload").click(function(event) {
				$("#progressbar").removeClass('hide');
				/* Act on the event */
				$("#form-upload").ajaxSubmit({
					url:"<?php echo U('Teacher/Homework/uploadHomeworkFile');?>",
					type:"POST",
					datatype:"script",
					success:function(data){
						if(data.status==1)
						{
							alert('上传成功');
						}
						else
						{
							alert('上传失败');
						}
						CA(1);
						location.reload();
					}
				});
			});

    //         $(".btn-mark").click(function() {
    //             var sno = $(this).attr("sno");
    //             var sname = $(this).parent().prev().prev().prev().prev().text();
    //             var fno =  $(this).attr("fno");

				// if($("#scoretr"+sno).css('display')=="none")
    //             $("#scoretr"+sno).css('display','table-row');
				// else
				// $("#scoretr"+sno).css('display','none');

    //             $("#owner_sno"+sno).html("学号： "+sno);
    //             $("#owner_name"+sno).html("姓名： "+sname);

    //             var fno = $(this).attr("fno");
    //             var fnolist = [fno];
    //             var msg = {fno:fno};
    //             $.post("<?php echo U('Teacher/Homeworkgrade/getPointscore');?>", msg, function(data) {
    //                 $(".scores"+sno).each(function(){
    //                     $(this).val(data[$(this).attr("name")]);
    //                 });
    //                 $("#fnohelp"+sno).val(fno);
    //                 $("#snohelp"+sno).val(sno);
				// 	if (data['status'] == 1) {
				// 		//alert('成功拿到打分');
				// 	}
    //                 else if(data['status'] == -1){
    //                     //do nothing
    //                 }
				// 	else {
				// 		alert('分项打分返回失败');
				// 	}
				// });
    //         });
			$(".btn-delete").click(function(event) {
				var $t = $(this);
				$t.addClass('disabled');
				$.post("<?php echo U('Teacher/Homework/deleteHomeworkFile');?>", $t.parent().serialize(), function(data, textStatus, xhr) {
					/*optional stuff to do after success */
					if(data.status==1) {
						$t.closest('tr').fadeOut();
					} else {
						$t.removeClass('disabled');
						if (data.info) {
							alert(data.info);
						} else {
							alert('删除失败');
						}
					}
				},'json');
			});

			$(".point_score_button").click(function(event){
				var sno = $(this).attr("sno");
				that =$(this);
				console.log($("#point_score_form"+sno).serialize());
				$.post("<?php echo U('Teacher/Homeworkgrade/pointScore');?>", $("#point_score_form"+sno).serialize(), function(data, textStatus, xhr) {
					if (data.status == 1) {
						alert("评分成功");
						$("#grade"+sno).html(data["grade"]);
						$("#scoretr"+sno).css('display','none');

					} else {
						alert("评分失败");
						window.location.reload();
					}
				},'json');
			})

			$(".download_link").each(function(){
				if($(this).val()==""){
					$(this).after("暂未提交");
					$(this).parent().parent().next().next().next().html("暂未提交")
					//$(this).parent().parent().next().next().next().next().find("input").first().val("0");
					if($(this).parent().parent().next().next().next().next().find("input").first().val()==""){
						$(this).parent().parent().next().next().next().next().html("0");
					}
					$(this).remove("");
				}
			})
		});
	</script>

</body>
</html>