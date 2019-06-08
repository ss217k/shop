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

    <link href="__PUBLIC__/css/custom-styles.css" rel="stylesheet" />
    <style>
        .text-grade {width:30px;}

        .points{
			margin-top:10px;
			font-family: Georgia, "Microsoft YaHei", "Helvetica Neue", Helvetica, Arial, sans-serif,'Segoe UI';
			color:white;
		}

		.points span{
			display:inline-block;
			margin:5px 0 0 2px;
			padding:5px 10px;
		}

		.points .label{
			color:white;
		}
    </style>
</head>
<body>
    
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header hidden-xs">
            <a class="navbar-brand" href="<?php echo U('Index/Index/index');?>">UniCourse<sup>+</sup></a>
        </div>
        <div class=" navbar-collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <li id="header-home">

                    <a href="<?php echo U('Assistant/assistant/index');?>">首页</a>
                </li>
                 <!--li id="header-course">
                    <a href="<?php echo U('Assistant/Assistant/index');?>">课程</a>
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
                <li class="dropdown hidden-xs">
                    <a href="#" id="profile" class="dropdown-toggle" data-toggle="dropdown">
                        <span><?php echo $_SESSION['uname']; echo $_SESSION['tname']; ?>(助教身份)</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo U('Index/UserProfile/index');?>" id="username"><div class="list-icon"><span class="icon-user"></span></div>我的资料</a>
                        </li>
                        <li class="divider"></li>
                        <!-- <?php if (session('usedtobeteacher')==1) { ?>
                        <li>
                            <a href="<?php echo U('Assistant/assistant/translate2');?>" id="assistant"><div class="list-icon"><span class="icon-book"></span></div>恢复至教师角色</a>
                        </li>
                        <?php  } ?> -->
                        <?php if (session('usedtobeteacher')==0) { ?>
                        <li>
                            <a href="<?php echo U('Assistant/assistant/translate');?>" id="assistant"><div class="list-icon"><span class="icon-book"></span></div>恢复至学生角色</a>
                        </li>
                        <?php  } ?>
                        <?php if (session('examiner')==1) { ?>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo U('Examiner/Home/index');?>" id="assistant"><div class="list-icon"><span class="icon-user"></span></div>我参与评审的课程</a>
                        </li>
                        <?php  } ?>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo U('Index/Login/logout');?>" id="btn-logout"><div class="list-icon"><span class="icon-signout"></span></div>登出</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <input type="hidden" name="hno" value="<?php echo I('hno');?>" id="hnohelp">
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
                            <div class="points">
                                <?php if(is_array($points)): foreach($points as $key=>$p): ?><span class="point_label label label-primary" data-pno="<?php echo ($p["ppno"]); ?>"><?php echo ($p["pname"]); ?></span><?php endforeach; endif; ?>
                            </div>
                            <hr>
                            <div>
                                附件：
                                <?php if ($homeworkfile[0]==null): ?>
                                无
                                <?php endif ?>
                                <table class="table">
                                    <?php if(is_array($homeworkfile)): foreach($homeworkfile as $key=>$v): ?><tr>
                                            <td>
                                                <form action="<?php echo U('Assistant/CommonCourse/homeworkDownload');?>" method="POST" class="inline">
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
                            一键打分：</br>
                            <form action="<?php echo U('Assistant/Homeworkgrade/downloadTemplate');?>" method="POST" class="inline">
                                <input type="hidden" name="hno" value="<?php echo I('hno');?>">
                                <input type="hidden" name="cno" value="<?php echo I('cno');?>">
                                <input type="submit" name="submit" value="下载打分模板文件(.xlsx)" class="btn btn-link">
                            </form>
                            <!--a id="btn-download4add" class="btn btn-link">下载打分模板文件(.xlsx)</a-->
                            <div class="panel-footer">
                                    <br>
                                    <form id="upload4add" class="form">
                                        <input name="upload[]" type="file" id="upload" data-cno="<?php echo I('cno');?>" multiple/>
                                        <input type="hidden" name="cno" value="<?php echo I('cno');?>">
                                        <input type="hidden" name="cname" value="<?php echo I('cname');?>">
                                        <a id="btn-upload4add" class="btn btn-primary">上传模板文件(.xlsx)以打分</a>
                                        <div style="clear:both"></div>
                                    </form>
                                    <div class="progress progress-striped active hide" id="progressbar">
                                      	<div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                      	</div>
                                    </div>
                            </div>
                            <hr>
                            <div>
                                已提交情况：
                                <form action="<?php echo U('Assistant/CommonCourse/studentHomeworkDownloadAll');?>">
                                    <input type="hidden" name="hno" value="<?php echo I('hno');?>" >
                                    <input type="hidden" name="cno" value="<?php echo I('cno');?>">
                                    <input type="hidden" name="mode" value="0">
                                    <input class="btn btn-link pull-left" type="submit" name="submit" value="下载全部" style="max-width:300px;overflow:hidden;"></form>
                                <form action="<?php echo U('Assistant/CommonCourse/studentHomeworkDownloadAll');?>">
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
                                        <td style="width:6%">分数</td>
                                        <!--18.3.5<td style="width:8%"><button id="markAll" hno="<?php echo I('hno');?>">提交</button></td>-->
                                    </tr>
                                    <?php if(is_array($homeworklist)): foreach($homeworklist as $key=>$v): ?><tr name="<?php echo ($v['sno']); ?>">
                                            <td>
                                                <form action="<?php echo U('Assistant/CommonCourse/studentHomeworkDownload');?>">
                                                    <input type="hidden" name="fname" value="<?php echo ($v['fname']); ?>">
                                                    <input type="hidden" name="fno" value="<?php echo ($v['fno']); ?>">
                                                    <input type="hidden" name="cno" value="<?php echo I('cno');?>">
                                                    <input class="btn btn-link pull-left download_link" type="submit" name="submit" value="<?php echo ($v["fname"]); ?>" style="max-width:300px;overflow:hidden;"></form>
                                                    <!-- <td>
                                                <a href="<?php echo U('Assistant/Course/download',array('furl'=>$v['furl'],'cno'=>$v['cno']));?>"><?php echo ($v["fname"]); ?></a>
                                                -->
                                            </td>
                                            <td><?php echo ($v["sname"]); ?></td>
                                            <td><?php echo ($v["sno"]); ?></td>
                                            <td><?php echo ($v["ftime"]); ?></td>
                                            <td  title="提示"  
                                            data-container="body" data-toggle="popover" data-placement="right" 
                                            data-content="评分成功！" data-html="true">
                                                <input id="grade<?php echo ($v["sno"]); ?>" class="text-grade" name="fgrade" value="<?php echo ($v["fgrade"]); ?>" grade="<?php echo ($v["fgrade"]); ?>" placeholder="无" fno="<?php echo ($v["fno"]); ?>" sno="<?php echo ($v["sno"]); ?>" hno="<?php echo I('hno');?>"/>
                                                <!--div style="display:none;">评分成功！
                                                    <img src="__PUBLIC__/images/success.png" style="height:20px;width:20px;"/>
                                                </div>
                                                <div style="display:none;">评语成功！
                                                    <img src="__PUBLIC__/images/success.png" style="height:20px;width:20px;"/>
                                                </div-->
                                            </td>
                                            <!--18.3.5<td><button class="btn-mark" fno="<?php echo ($v["fno"]); ?>" sno="<?php echo ($v["sno"]); ?>" hno="<?php echo I('hno');?>">打分</button></td>-->
                                        </tr>
                                        <tr style="display:none" class="comment-tr">
                                           <td colspan="6">评语<input type="text" class="form-control text-review" fno="<?php echo ($v["fno"]); ?>" freview="<?php echo ($v["freview"]); ?>"></td> 
                                        </tr><?php endforeach; endif; ?>
                                </table>
                            </div>
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
                            <hr>
                            <div>    
                                <div class="panel-body">
                                    成绩分布图：
                                    <div style="width:45%;margin-bottom:-5%;position:relative;left:30%">
                                        <canvas id="canvas2"></canvas>
                                    </div>
                                </div>
                             </div>
                            <hr>
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
    
    <script src="__PUBLIC__/js/charts.js"></script>
    <script>
        var gradelistall = [];
        var fnolistall = [];
        $(document).ready(function(){
            var options = {
                trigger: ''
            }

        $("[data-toggle='popover']").popover(options);

            //$("[data-toggle='popover']").popover("show");
            var curfno = 0;
            //UE.getEditor('textarea-hcontent');
            if($(".tr-apply").text()==""){$("#dialog-apply").addClass('hide');}
            if(typeof(FileReader)!='undefined'){
               	$("#upload").uploadifive({
               		auto:true,
               		buttonText:'<div class="uploadifive-xlsx">上传模板文件(.xlsx)以打分</div>',
               		fileSizeLimit:'100MB',
               		uploadScript: "<?php echo U('Assistant/Homeworkgrade/uploadGradeList/');?>",
               		formData:{cno:$("#upload").attr("data-cno"),hno:$("#hnohelp").val()},
               		onUploadComplete:function(file,data){
               			if ($.parseJSON(data).status === 1) {
               				alert('评分成功');
               				CAR(1);
               			} else {
               				alert('评分失败，请检查文件格式或联系管理员');
               			}
               		}
               	});
               	$("#btn-upload4add").remove();
            }
            $("#btn-upload").click(function(event) {
                $("#progressbar").removeClass('hide');
                /* Act on the event */
                $("#form-upload").ajaxSubmit({
                    url:"<?php echo U('Assistant/Homework/uploadHomeworkFile');?>",
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
            
            //暂时下线 18.3.5
            /*$("#markAll").click(function (event) {
                var gradelistall = [];
                var snolistall = [];
                $('.btn-mark').each(function () {
                    //alert('hi');
                    var sno = $(this).attr('sno');
                    
                    var grade = $("#grade" + sno).val();
                    if(grade == "") grade = "0";
                    
                    snolistall.push(sno);
                    gradelistall.push(grade);
                });
                var hnolistall = [$(this).attr('hno')];
                var msg={snolist:snolistall,hnolist:hnolistall,gradelist:gradelistall}
                console.log(msg);
                $.post("<?php echo U('Assistant/Homeworkgrade/marknewGrade');?>", msg, function(data) {
                //$.getJSON("http://unicourse.ruc.edu.cn/Assistant/Homework/markGrade", msg, function(data) {
                    if (data.status != 0) {
                        alert('提交全部打分成功');
                    }
                    else {
                        alert('提交全部打分失败');
                    }
                });
            });*/

            //submit review new 18.4.26
            $(".text-review").change(function(){
                var curfno= $(this).attr('fno');
                var text = $(this).val();
                var msg = {fno:curfno,text:text};
                console.log(curfno);
                var that = $(this);
                //console.log($(this));
                //console.log($(this).prev())
                //that.prev().css("display","none");
                $.post("<?php echo U('Assistant/Homeworkgrade/writereview');?>", msg, function(data){
                    if(data.status==1){
                        console.log(that.parent().prev().children().first());
                        //that.css("display","none");
                        //$(".popover").show();
                        that.parent().parent().prev().children().first().next().next().next().next().attr("data-content","<img src='__PUBLIC__/images/success.png' style='height:20px;width:20px;'/>评语成功")
                        that.parent().parent().prev().children().first().next().next().next().next().popover('show')
                        setTimeout(function(){
                            that.parent().parent().prev().children().first().next().next().next().next().popover('hide')
                        },1000)
                        //that.parent().parent().prev().children().first().next().next().next().next().children().first().next().next().fadeIn(1000);
                        //that.parent().parent().prev().children().first().next().next().next().next().children().first().next().next().fadeOut(1000);
                    }
                    else
                    {
                        alert("没交作业就不要评价啦！");
                        //location.reload();
                    }
                });
            });            

            //submit grade new 18.3.5
            $(".text-grade").change(function() {
                var msg = {};
                var snolist = [];
                var gradelist = [];
                var hnolist = [];
                var sno = $(this).attr('sno');
                var grade = $("#grade"+sno).val(); 
                var hno = $(this).attr('hno');
                var re = /^[1-9]+[0-9]*]*$/;
                if(grade>100 || grade<0 || (!re.test(grade) && grade!=0)) {
                    alert('打分范围为0-100的整数！请您重新打分');
                    CAR(1);
                    return;
                }
                snolist = [sno];
                gradelist = [grade];
                hnolist = [hno];
                msg = {snolist:snolist,hnolist:hnolist,gradelist:gradelist};
                var that = $(this);
                //console.log(msg);
                $.post("<?php echo U('Assistant/Homeworkgrade/marknewGrade');?>", msg, function(data) {
                //$.getJSON("http://unicourse.ruc.edu.cn/Assistant/Homework/markGrade", msg, function(data) {
                    if (!data.status) {
                        alert('打分失败');
                    }
                    else{
                        that.parent().attr("data-content","<img src='__PUBLIC__/images/success.png' style='height:20px;width:20px;'/>评分成功")
                        that.parent().popover('show');
                        setTimeout(function(){
                            that.parent().popover('hide');
                        },1000)
                        //that.next().fadeIn(1000);
                        //that.next().fadeOut(1000);
                    }
                });
            });


            //暂时下线 18.3.5
            // submit one  grade
            /*$(".btn-mark").click(function() {
                var msg = {};
                var snolist = [];
                var gradelist = [];
                var hnolist = [];
                var sno = $(this).attr('sno');
                var grade = $("#grade"+sno).val(); 
                var hno = $(this).attr('hno');
                snolist = [sno];
                gradelist = [grade];
                hnolist = [hno]
                msg = {snolist:snolist,hnolist:hnolist,gradelist:gradelist};
                //console.log(msg);
                $.post("<?php echo U('Assistant/Homeworkgrade/marknewGrade');?>", msg, function(data) {
                //$.getJSON("http://unicourse.ruc.edu.cn/Assistant/Homework/markGrade", msg, function(data) {
                    if (data.status != 0) {
                        alert('打分成功');
                    }
                    else {
                        alert('打分失败');
                    }
                });
            });*/
            
            $(".btn-delete").click(function(event) {
                var $t = $(this);
                $t.addClass('disabled');
                $.post("<?php echo U('Assistant/Homework/deleteHomeworkFile');?>", $t.parent().serialize(), function(data, textStatus, xhr) {
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
            $(".download_link").each(function(){
                if($(this).val()==""){
                    $(this).after("暂未提交");
                    $(this).parent().parent().next().next().next().html("暂未提交")
                    //$(this).parent().parent().next().next().next().next().find("input").first().val("0");
                    //console.log($(this).parent().parent().next().next().next().next().find("input").first().val());
/*
                    if($(this).parent().parent().next().next().next().next().find("input").first().val()==""){
                        $(this).parent().parent().next().next().next().next().find("input").first().val("0");
                    }*/
                }
                if($(this).parent().parent().next().next().next().next().find("input").first().val()=="NULL"){
                        $(this).parent().parent().next().next().next().next().find("input").first().val("0");
                }
            })

            $(".text-grade").focus(function(event){
                //$(this).parent().popover("show");
                var comment = $(this).parent().parent().next().find("input").first();
                var review = comment.attr('freview');
                if(review != "NULL")
                {
                    comment.val(review);
                }
                else
                {
                    comment.val("");
                }

                console.log("focus!");
                
                var that = $(this);
                

                
                $(".comment-tr").each(function(){
                    if($(this).prev().children().first().next().next().next().next()!=that)
                    $(this).css("display","none");
                })
                if(that.parent().parent().next().css('display')=="none")
                    that.parent().parent().next().css('display','table-row');
                else
                    that.parent().parent().next().css('display','none');
                
                
                
            })

            /*$(".text-grade").blur(function(event){
                console.log("focus!");
                
                if($(this).parent().parent().next().css('display')!="none")
				$(this).parent().parent().next().css('display','none');

            })*/
            $(".point_label").each(function(){
				console.log("in!")
				var labels = ["label-primary","label-success","label-info","label-warning","label-danger"]
				var pno = parseInt($(this).attr("data-pno"))%5
				//console.log(labels[pno])
				$(this).addClass(labels[pno])
			})


            function init_chart(){
                var colorset = {
                    red: '#FF6666',
                    orange: '#FF9900',
                    yellow: '#FFFF00',
                    green: '#33CC99',
                    blue: '#3399CC',
                    purple:'purple',
                    gray:'gray',
                    brown:'brown',
                    semi_red:'rgb(255, 99, 132)',
                    semi_blue:'rgb(54, 162, 235)',
                    semi_yellow:'rgb(255, 205, 86)'
                }
                var config2 = {
                    type: 'pie',
                    data: {
                        // labels: ["90-100","86-89","83-85","80-82","75-79","70-74","60-69","0-59"],
                        labels: [90,86,83,80,75,70,60,0],

                        datasets: [{
                            data: [
                                7,5,10,5,3,4,1,10
                            ],
                            backgroundColor: [
                                colorset.red,
                                colorset.orange,
                                colorset.yellow,
                                colorset.green,
                                colorset.blue,
                                colorset.purple,
                                colorset.gray,
                                colorset.brown,
                            ],
                            label: 'Dataset 1'
                        }]
                    },
                    options: {
                        legend: {
                            position: 'right',
                        }
                    }
                };
                var ctx2 = document.getElementById("canvas2").getContext("2d");
                $.post("<?php echo U('Assistant/Homework/getGradeProportion');?>",{labels:config2.data.labels,hno:$("#hnohelp").val(),cno:$("#cnohelp").val()},function(res){
                    console.log(res);
                    if(res.status != 0)
                    {
                        config2.data.datasets[0].data = res.dis;
                        window.myLine = new Chart(ctx2, config2);
                    }
                    // var dat = res.data;
                    // config2.data.datasets[0].data = dat;
                    // window.myLine = new Chart(ctx2, config2);
                });
                // window.myLine = new Chart(ctx2, config2);
            }
            init_chart();
        });
    </script>
</body>
</html>