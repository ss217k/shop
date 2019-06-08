<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<title><?php echo ($cname); ?>　作业</title>
	  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="__PUBLIC__/images/icon.png" mce_href="__PUBLIC__/images/icon.png" type="image/x-icon">
  <link  id="theme" href="__PUBLIC__/css/custom/bootstrap.style.css" rel="stylesheet">
  <link  href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet">
  <link href="__PUBLIC__/css/style.css" rel="stylesheet">

<!--[if lt IE 9]>
<script type="text/javascript" src="__PUBLIC__/js/ie-compatible.js"></script>
<![endif]-->
    <style type="text/css">
        .EditCell_TextBox {
            width: 90%;
            border:1px solid #0099CC;
        }
    </style>
	<link href="__PUBLIC__/css/datetimepicker.css" rel="stylesheet">
	<script src="__PUBLIC__/js/edittable.js"></script>
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

	<div id="main-container" class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-10" id="main-left">
					<div id="sidebar1" class="panel panel-info" style="width:110%">
		<div class="panel-heading"><?php echo ($cname); ?></div>
		<div class="list-group"  role="menu">
			<a id="left-home" class="list-group-item" href="<?php echo U('Assistant/Course/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-home"></span>
				</div>
				主页
			</a>
			<a id="left-announcement" class="list-group-item" href="<?php echo U('Assistant/Notice/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-reorder"></span>
				</div>
				公告
			</a>
			<a id="left-question" class="list-group-item" href="<?php echo U('Assistant/Question/index',array('cno' => $_REQUEST['cno']));?>" >
				<div class="list-icon">
					<span class="icon-comments"></span>
				</div>
				问答
			</a>
			<a id="left-group" class="list-group-item" href="<?php echo U('Assistant/Group/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-group"></span>
				</div>
				小组
			</a>
			<a id="left-homework" class="list-group-item" href="<?php echo U('Assistant/Homework/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-edit"></span>
				</div>
				作业
			</a>
			<a id="left-document" class="list-group-item" href="<?php echo U('Assistant/Document/index',array('cno' => $_REQUEST['cno']));?>">
				<div class="list-icon">
					<span class="icon-file-text"></span>
				</div>
				课件
			</a>

			<a id="left-outline" class="list-group-item" href="<?php echo U('Assistant/Outline/index',array('cno' => $_REQUEST['cno']));?>">
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
		</div>
	</div>


			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">
                <div id="main-right">
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <a id="btn-newhomework" class="accordion-toggle title" data-toggle="collapse" href="#dialog-newhomework">点击布置新作业</a>
                            </div>
                            <div id="dialog-newhomework" class="collapse out panel-body">
                                <form id="form-homework" enctype="multipart/form-data" method="POST">
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
                                        <!--input type="submit" class="btn btn-default" style="margin-left:5px" name="Submit3" value="提交" onclick="GetTableData(document.getElementById('tabProduct'));return false;" id="btn-syllabus"/-->
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
                                            <label for="upload">上传附件(最大100M)</label>
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
                    <?php if(is_array($allhomework)): foreach($allhomework as $key=>$v): ?><div class="row">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <span class="hide"><?php echo ($v["hno"]); ?></span>
                                    <small class="pull-right time"><?php echo ($v["htime"]); ?></small>
                                    <?php if(($v["htype"] == 2) or ($v["htype"] == 3) ): ?><a href="<?php echo U('Assistant/Homework/detailnew',array('cno' => $_REQUEST['cno'],'cname' => $_REQUEST['cname'],'hno' => $v['hno']));?>" class="title" target="_blank"><?php echo ($v["htitle"]); ?>
                                        </a>
                                    <?php else: ?>                                    
                                        <a href="<?php echo U('Assistant/Homework/detail',array('cno' => $_REQUEST['cno'],'cname' => $_REQUEST['cname'],'hno' => $v['hno']));?>" class="title" target="_blank"><?php echo ($v["htitle"]); ?>
                                        </a><?php endif; ?>
                                    <br/>
                                    <span >截止日期<?php echo ($v["deadline"]); ?></span>
                                    <form class="form-delete inline">
                                        <input type="hidden" name="cno" value="<?php echo I('cno');?>">
                                        <input type="hidden" name="hno" value="<?php echo ($v['hno']); ?>">
                                        <a class="pull-right btn btn-xs btn-delete">删除</a>
                                    </form>
                                </div>
                            </div>
                        </div><?php endforeach; endif; ?>
                    <?php if ($allhomework[0]==null): ?>
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-body">还没有作业呢~~</div>
                        </div>
                    </div>
                    <?php endif ?>
                    <div class="row">
                        <div class="page"><?php echo ($page); ?></div>
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
	<div id="info" data-activeitem="#left-homework" ></div>
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
        window.UEDITOR_HOME_URL = '__ROOT__/Data/Ueditor/';
        $(document).ready(function(){
            UE.getEditor('textarea-hcontent');
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
                //console.log($("#dlyear").val());
                $("#form-homework").ajaxSubmit({
                    url:"<?php echo U('Assistant/Homework/addHomeworkHandle');?>",
                    type:"POST",
                    data: {
                        'jsonarr':JSON.stringify(arr)
                    },
                    success:function(data){
                        if(data.status == 1) {
                            alert('布置成功');
                            console.log(data);
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
            $(".btn-delete").click(function(event) {
                $s=$(this);
                bootbox.confirm("您确定要删除这个作业?<br>删除后所有学生的提交文件将删除且不能恢复", function(result) {
                    if(result==false){
                        CA(0);
                        return false;
                    }
                    else if(result==true){
                $.post("<?php echo U('Assistant/Homework/deleteHomework');?>", $s.closest('form').serialize(), function(data, textStatus, xhr) {
                    /*optional stuff to do after success */
                    if(data.status==1)
                        {
                            $s.closest('.row').fadeOut('normal');
                        }
                        else
                        {
                            alert('删除失败');
                            CA(1);
                        }
                });
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

	</script>
</body>
</html>