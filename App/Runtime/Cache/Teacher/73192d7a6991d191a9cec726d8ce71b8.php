<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html ng-app="Unicourse">

<head>
    <title>指标点达成分析详情</title>
    <link rel="stylesheet" href="__PUBLIC__/css/bootswatch/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="__PUBLIC__/css/datatables.css" type="text/css" />

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

    <meta name="author" content="mzy wxb" />
    <style>
        .list-group-item:first-child {
            border-radius: 0px;
            border-top: none;
        }

        .tabtitle:visited,
        .tabtitle:active,
        .tabtitle:focus {
            outline: none;
            border: none;
        }

        .courseitem.cur .glyphicon-chevron-right {
            display: block;
        }

        .list-group-item {
            overflow: hidden;
        }

        .thumbnail {
            background-color: #F0F0F0
        }

        ;
    </style>
</head>

<body ng-app="Unicourse">
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
            <div class="col-lg-3 col-md-3 col-sm-3 hidden-xs" id="main-left">
                <div id="sidebar1" class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="list-icon">
                            <span class="icon-share"></span>
                        </div>
                        指标点
                    </div>
                    <div class="list-group" role="menu">
                        <?php if(is_array($levelone)): foreach($levelone as $key=>$o): ?><span class="hide hidepno"><?php echo ($o["pno"]); ?></span>
                            <a id="pno<?php echo ($o['pno']); ?>" class="list-group-item courseitem dela1" href="<?php echo U('Teacher/Charts/detail',array('cno' => $cno , 'pno' => $o['pno']));?>">
                                <?php echo ($o["pname"]); ?>
                            </a><?php endforeach; endif; ?>
                        <?php if ($levelone[0]==null): ?>
                        <span class="list-group-item">
                            没有一级指标点
                        </span>
                        <?php endif ?>
                    </div>


                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div id="main-right">
                    <div class="row">
                        <div class="panel panel-success" style="border-color:	#008080">
                            <div class="panel-heading" style="background-color:	#008080;border-color:#008080; font-weight: bold;font-size: 120%;">各作业达成情况</div>
                            <div>

                                <div id="hasnotbacked" style="padding:20px">
                                    <table class="table table-homework">
                                        <thead>
                                            <tr>
                                                <th style="font-size:20px;font-weight:bold" id="ttitle">作业名称</td>
                                                    <th style="font-size:20px;font-weight:bold" id="tdel">作业类型</td>
                                                        <th style="font-size:20px;font-weight:bold" id="tdel">平均成绩</td>
                                            </tr>
                                        </thead>

                                        <!--foreach name="leveltwo" item="t">
                                            <tr>
                                                <td><?php echo ($t["pname"]); ?></td>
                                                <td>
                                                    <input type="hidden" value="<?php echo ($t['pno']); ?>">
                                                    <a class="deli2 hide" href="#">
                                                        <span class='icon-trash sldel'></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        </foreach-->
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo U('Teacher/homework/detailnew',array('cno' => '11111111','hno' => '766'));?>">作业1</a>
                                                </td>
                                                <td>普通作业</td>
                                                <td>85</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="">作业2</a>
                                                </td>
                                                <td>普通作业</td>
                                                <td>99</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    <div style="text-align:center;"><?php echo ($page); ?></div>
                                    <!--div class="list-group-item" style="border-color:white!important">
                                        <input type="text" class="form-control" style="width:50%;display:inline;" name="htitle" id="p2"></input>
                                        <button id="btn_add2" class="btn btn-primary" style="margin-left:5%;">添加</button>
                                        <button id="btn_del2" class="btn btn-danger" status="n">删除</button>
                                    </div-->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="panel panel-success" style="border-color:	#008080">
                            <div class="panel-heading" style="background-color:	#008080;border-color:#008080; font-weight: bold;font-size: 120%;">各学生达成情况</div>
                            <div>

                                <div id="hasnotbacked" style="padding:20px">
                                    达成人数： <span style="font-size:40px;">2</span>人/4人
                                    <table class="table table-homework">
                                        <thead>
                                            <tr>
                                                <th style="font-size:20px;font-weight:bold" id="ttitle">学生学号</td>
                                                    <th style="font-size:20px;font-weight:bold" id="tdel">学生姓名</td>
                                                        <th style="font-size:20px;font-weight:bold" id="tdel">平均成绩</td>
                                            </tr>
                                        </thead>

                                        <!--foreach name="leveltwo" item="t">
                                                <tr>
                                                    <td><?php echo ($t["pname"]); ?></td>
                                                    <td>
                                                        <input type="hidden" value="<?php echo ($t['pno']); ?>">
                                                        <a class="deli2 hide" href="#">
                                                            <span class='icon-trash sldel'></span>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </foreach-->
                                        <tbody>
                                            <tr>
                                                <td><a href="#hasnotbacked3">2015201984</a>
                                                </td>
                                                <td>马正一</td>
                                                <td>85</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#hasnotbacked3">2015201974</a>
                                                </td>
                                                <td>左笑晨</td>
                                                <td>84</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#hasnotbacked3">2015201983</a>
                                                </td>
                                                <td>学生1</td>
                                                <td>83</td>
                                            </tr>
                                            <tr>
                                                <td><a href="#hasnotbacked3">2015201973</a>
                                                </td>
                                                <td>学生2</td>
                                                <td>82</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    <div style="text-align:center;"><?php echo ($page); ?></div>
                                    <!--div class="list-group-item" style="border-color:white!important">
                                            <input type="text" class="form-control" style="width:50%;display:inline;" name="htitle" id="p2"></input>
                                            <button id="btn_add2" class="btn btn-primary" style="margin-left:5%;">添加</button>
                                            <button id="btn_del2" class="btn btn-danger" status="n">删除</button>
                                        </div-->
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="panel panel-success" style="border-color:	#008080">
                            <div class="panel-heading" style="background-color:	#008080;border-color:#008080; font-weight: bold;font-size: 120%;">某学生详细达成分析</div>
                            <div>

                                <div id="hasnotbacked3" style="padding:20px">
                                    <h4> 学号：2015201984 姓名：马正一</h4>

                                    <table class="table table-homework">
                                        <thead>
                                            <tr>
                                                <th style="font-size:20px;font-weight:bold" id="ttitle">作业名称</td>
                                                    <th style="font-size:20px;font-weight:bold" id="tdel">作业类型</td>
                                                        <th style="font-size:20px;font-weight:bold" id="tdel">该指标点成绩</td>
                                            </tr>
                                        </thead>

                                        <!--foreach name="leveltwo" item="t">
                                                    <tr>
                                                        <td><?php echo ($t["pname"]); ?></td>
                                                        <td>
                                                            <input type="hidden" value="<?php echo ($t['pno']); ?>">
                                                            <a class="deli2 hide" href="#">
                                                                <span class='icon-trash sldel'></span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </foreach-->
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo U('Teacher/homework/detailnew',array('cno' => '11111111','hno' => '766'));?>">作业1</a>
                                                </td>
                                                <td>普通作业</td>
                                                <td>85</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="">作业2</a>
                                                </td>
                                                <td>普通作业</td>
                                                <td>99</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                    <div style="text-align:center;"><?php echo ($page); ?></div>
                                    <!--div class="list-group-item" style="border-color:white!important">
                                                <input type="text" class="form-control" style="width:50%;display:inline;" name="htitle" id="p2"></input>
                                                <button id="btn_add2" class="btn btn-primary" style="margin-left:5%;">添加</button>
                                                <button id="btn_del2" class="btn btn-danger" status="n">删除</button>
                                            </div-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-sm-1 hidden-xs">
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
    <input type="hidden" value="<?php echo ($_REQUEST['pno']); ?>" id="pnohelp" />
    <div id="info" data-item="#pno<?php echo ($_REQUEST['pno']); ?>" data-activeheader="#header-edit"></div>
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

    <script src="__PUBLIC__/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {

            
            $("#pno" + $("#pnohelp").val()).append("<span class='glyphicon glyphicon-chevron-right pull-right'></span>");
            $(".hidepno").each(function () {
                pno = $(this).html();
                href = "<?php echo U('Super/Target/del1',array('pno' => $o['pno']));?>"
                $(this).next().append("<a class='deli1 hide' href='#'><span class='icon-trash fldel'></span></a>");
            })

            $("#btn_add1").click(function () {
                var pname = $(this).prev().prev().val();
                if (pname == "") {
                    alert("指标点名称不能为空！");
                    return;
                }
                $.post("<?php echo U('Super/Target/addfl');?>", { 'pname': pname }, function (data) {
                    if (data.status == 1) {
                        alert("添加成功");
                        CAR(1);
                    }
                    else {
                        alert("添加失败，请稍后再试或联系管理员..");
                    }
                })
            })

            $("#btn_add2").click(function () {
                var pname = $(this).prev().val();
                var pno = $("#pnohelp").val();
                if (pname == "") {
                    alert("指标点名称不能为空！");
                    return;
                }
                $.post("<?php echo U('Super/Target/addsl');?>", { 'pno': pno, 'pname': pname }, function (data) {
                    if (data.status == 1) {
                        alert("添加成功");
                        CAR(1);
                    }
                    else {
                        alert("添加失败，请稍后再试或联系管理员..");
                    }
                })
            })

            $("#btn_del1").click(function () {
                if ($(this).attr("status") == "y") {
                    $(this).attr("status", "n");
                    $(".deli1").each(function () {
                        //$(this).css("display","block");
                        $(this).addClass("hide");
                    })
                }
                else {
                    $(this).attr("status", "y");
                    $(".deli1").each(function () {
                        //$(this).css("display","none");

                        $(this).removeClass("hide");
                    })
                }
            })
            $("#btn_del2").click(function () {
                if ($(this).attr("status") == "y") {
                    $(this).attr("status", "n");
                    $(".deli2").each(function () {
                        //$(this).css("display","block");
                        $(this).addClass("hide");

                        $("#tdel").addClass("hide")
                    })
                }
                else {
                    $(this).attr("status", "y");
                    $(".deli2").each(function () {
                        //$(this).css("display","none");
                        $("#tdel").removeClass("hide")

                        $(this).removeClass("hide");
                    })
                }
            })

            $(".fldel").each(function () {
                $(this).click(function () {
                    var that = $(this);
                    bootbox.confirm({
                        message: "您确认要删除该指标点吗？",
                        callback: function (result) {
                            if (result == true) {
                                pno = that.parent().parent().prev().html();
                                $.post("<?php echo U('Super/Target/delfl');?>", { 'pno': pno }, function (data) {
                                    if (data.status == 1) {
                                        alert("删除成功");
                                        CAR(1);
                                    }
                                    else {
                                        alert("删除失败，请稍后再试或联系管理员..");
                                    }
                                })
                            }
                            else {
                                //do nothing
                            }
                        }
                    });
                })
            })

            $(".sldel").each(function () {
                $(this).click(function () {
                    var that = $(this);
                    bootbox.confirm({
                        message: "您确认要删除该指标点吗？",
                        callback: function (result) {
                            if (result == true) {
                                pno = that.parent().prev().val();
                                $.post("<?php echo U('Super/Target/delsl');?>", { 'pno': pno }, function (data) {
                                    if (data.status == 1) {
                                        alert("删除成功");
                                        CAR(1);
                                    }
                                    else {
                                        alert("删除失败，请稍后再试或联系管理员..");
                                    }
                                })
                            }
                            else {
                                //do nothing
                            }
                        }
                    });
                })
            })

            $(".table-homework").DataTable({
                searching: false,
                language: {
                    "sProcessing": "处理中...",
                    "sLengthMenu": "显示 _MENU_ 项结果",
                    "sZeroRecords": "没有匹配结果",
                    "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                    "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                    "sInfoPostFix": "",
                    "sSearch": "搜索:",
                    "sUrl": "",
                    "sEmptyTable": "表中数据为空",
                    "sLoadingRecords": "载入中...",
                    "sInfoThousands": ",",
                    "oPaginate": {
                        "sFirst": "首页",
                        "sPrevious": "上页",
                        "sNext": "下页",
                        "sLast": "末页"
                    },
                    "oAria": {
                        "sSortAscending": ": 以升序排列此列",
                        "sSortDescending": ": 以降序排列此列"
                    }
                }
            });


 $('a[href*=#]').click(function() {
 if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
 var $target = $(this.hash);
 $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
 if ($target.length) {
 var targetOffset = $target.offset().top;
 $('html,body').animate({
 scrollTop: targetOffset
 },
 1000);
 return false;
 }
 }});


        

        })

    </script>
</body>

</html>