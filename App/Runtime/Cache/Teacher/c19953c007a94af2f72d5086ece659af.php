<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html ng-app="Unicourse">

<head>
    <title>作业指标点分配</title>
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

    <link rel="stylesheet" href="__PUBLIC__/css/datatables.css" type="text/css" />

    <meta name="author" content="wxb" />
    <style>
        .tables {
            border: 0px;
            width: 100%;
            margin: 20px;
            margin-top: 0;
            font-size: 15px;
        }

        .panel-body {
            height: 400px;
        }

        #btn_add {
            position: absolute;
            right: 10%;
            font-size: 15px;
            padding: 10px;
            padding-left: 20px;
            padding-right: 20px;
        }

        #classes:hover {
            color: #99ccff;
            font-size: 15px;
        }

        .list-group-item.active {
            background-color: #336699 !important;
        }

        .list-group-item.active:focus {
            background-color: #336699 !important;
        }

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
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" id="main-left">
                <div class="panel panel-success" style="border-color:	#1f2c39;">
                    <div class="panel-heading" style="color:white;background-color:	#1f2c39;border-color:#1f2c39; font-weight: bold;font-size: 120%;">
                        指标点列表
                    </div>
                    <div class="panel-body" style="overflow:auto; ">
                        <input type="hidden" value="<?php echo ($_REQUEST['hno']); ?>" id="hnohelp">
                        <input type="hidden" value="<?php echo ($_REQUEST['cno']); ?>" id="cnohelp">
                        <ul class="nav nav-pills nav-stacked" id="exers">
                            <?php if(is_array($allpoint)): foreach($allpoint as $key=>$p): ?><a href="<?php echo U('Teacher/HomeworkPoint/index',array('pno' => $p['pno'],'cno' => $_REQUEST['cno']));?>" class="list-group-item courseitem"
                                    id="par<?php echo ($p['pno']); ?>"><?php echo ($p['pname']); ?></a><?php endforeach; endif; ?>
                            <?php if ($allpoint[0]==null): ?>
                            <span class="list-group-item">
                                暂未为课程分配指标点！
                            </span>
                            <?php endif ?>
                        </ul>
                    </div>
                </div>
                </br>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8" id="main-right">
                <div class="panel panel-success" style="border-color:#1f2c39;height:10%">
                    <div class="panel-heading" style="color:white;background-color:	#1f2c39;border-color:#1f2c39; font-weight: bold;font-size: 120%;">指标点列表</div>
                    <div class="panel-body" style="overflow:hidden">
                        <div style="overflow: auto; height: 400px;width:100%">
                            <table class="tables table-homework">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>作业标题</th>
                                        <th>作业类型</th>
                                    </tr>
                                </thead>

                                <!--foreach name="allpoint" item="ap">        
                                        <tr>
                                            <td>
                                                <input type="hidden" name="geta" value="<?php echo getDistribution(I('hno'),$ap['pno']);?>">
                                                <input type="checkbox" name="<?php echo ($ap['pno']); ?>" class="checklist" style="zoom:150%;">
                                            </td>
                                            <td><?php echo ($ap['pname']); ?></td>
                                            <td><?php echo ($ap['fpname']); ?></td>
                                        </tr>
                                    </foreach-->
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="<?php echo ($ap['pno']); ?>" class="checklist" style="zoom:150%;">
                                        </td>
                                        <td>
                                            作业1
                                        </td>
                                        <td>
                                            大作业
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="<?php echo ($ap['pno']); ?>" class="checklist" style="zoom:150%;">
                                        </td>
                                        <td>
                                            作业2
                                        </td>
                                        <td>
                                            普通作业
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="<?php echo ($ap['pno']); ?>" class="checklist" style="zoom:150%;">
                                        </td>
                                        <td>
                                            作业3
                                        </td>
                                        <td>
                                            普通作业
                                        </td>
                                    </tr>

                                </tbody>
                                <?php if ($allpoint[0]==null): ?>
                                <span class="list-group-item">
                                    暂未为课程分配指标点！
                                </span>
                                <?php endif ?>
                            </table>
                        </div>
                        <button id="btn_add" class="btn btn-primary">提交</button>
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

    <div id="info" data-item="#pno<?php echo ($_REQUEST['pno']); ?>" data-activeheader="#header-manage"></div>
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
            var hno = $("#hnohelp").val();
            var cno = $("#cnohelp").val();
            $("#par" + hno).addClass("active");
            $(".checklist").each(function () {
                if ($(this).prev().val() == 'y') {
                    $(this).attr("checked", true);
                }
            })
            $("#btn_add").click(function () {
                var pnolist = [];
                $(".checklist").each(function () {
                    if ($(this).is(':checked')) {
                        pnolist.push($(this).attr("name"));
                    }
                })
                var hno = $("#hnohelp").val();
                $.post("<?php echo U('Teacher/HomeworkPoint/DistributePoint');?>", { 'pnolist': JSON.stringify(pnolist), 'hno': hno, 'cno': cno }, function (data) {
                    if (data.status != 0) {
                        alert('分配成功！');
                        CAR(1);
                    }
                    else {
                        alert('分配失败 错误编号：' + data.status);
                        CA(1);
                    }
                }, 'json');
            })
        })

        var isCheckAll = false;
        function swapCheck() {
            if (isCheckAll) {
                $("input[type='checkbox']").each(function () {
                    this.checked = false;
                });
                isCheckAll = false;
            } else {
                $("input[type='checkbox']").each(function () {
                    this.checked = true;
                });
                isCheckAll = true;
            }
        }


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
            },
            paging: false, info: false
        });
    </script>
</body>

</html>