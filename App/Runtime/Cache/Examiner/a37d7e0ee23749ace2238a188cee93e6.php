<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<title><?php echo ($cname); ?>　图表分析</title>
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
    <script src="__PUBLIC__/js/charts.js"></script>
    <meta name="author" content="wxb" />
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
                        <?php if (session('isAssistant')==1) { ?>
                        <li>
                            <a href="<?php echo U('Assistant/Assistant/index');?>" id="assistant"><div class="list-icon"><span class="icon-book"></span></div>我担任的助教</a>
                        </li>
                        <li class="divider"></li>
                        <?php  } ?>
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
    <!-- <div class="hide" id="coursenumber"><?php echo ($cno); ?></div> -->
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
				<?php endforeach ?></div>
		</div>
	</div>


            </div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-10" >
                <div id="main-right">
				<div class="row">
                <div class="panel panel-success" style="border-color:#2C3E50;">
                    <div class="panel-heading" style="color:white;background-color:#2C3E50;border-color:#2C3E50; font-weight: bold;font-size: 120%;">
                        各任务完成情况统计</div>
                    <div class="panel-body">
                        <div class="col-xs-3 col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body easypiechart-panel">
                                    <h4>上机实验</h4>
                                    <div class="easypiechart" id="easypiechart-blue" data-percent="82" ><span class="percent">82%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-3 col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body easypiechart-panel">
                                    <h4>作业</h4>
                                    <div class="easypiechart" id="easypiechart-red" data-percent="46" ><span class="percent">46%</span>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="col-xs-3 col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body easypiechart-panel">
                                    <h4>大作业</h4>
                                    <div class="easypiechart" id="easypiechart-teal" data-percent="84" ><span class="percent">84%</span>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="col-xs-3 col-md-3">
                            <div class="panel panel-default">
                                <div class="panel-body easypiechart-panel">
                                    <h4>思考题</h4>
                                    <div class="easypiechart" id="easypiechart-purple" data-percent="53" ><span class="percent">53%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-success" style="border-color:#2C3E50;">
                    <div class="panel-heading" style="color:white;background-color:#2C3E50;border-color:#2C3E50; font-weight: bold;font-size: 120%;">
                        作业提交情况分析</div>
                    <div class="panel-body">
                        <div style="width:70%;position:relative;left:15%">
                            <canvas id="canvas1"></canvas>
                        </div>
                    </div>
                </div>

                <div class="panel panel-success" style="border-color:#2C3E50;">
                    <div class="panel-heading" style="color:white;background-color:#2C3E50;border-color:#2C3E50; font-weight: bold;font-size: 120%;">
                        期中考试情况统计</div>
                    <div class="panel-body">
                        <div style="width:45%;margin-bottom:-5%;position:relative;left:30%">
                            <canvas id="canvas2"></canvas>
                        </div>
                    </div>
                </div>

                <div class="panel panel-success" style="border-color:#2C3E50;">
                    <div class="panel-heading" style="color:white;background-color:#2C3E50;border-color:#2C3E50; font-weight: bold;font-size: 120%;">
                        各章节均衡性</div>
                    <div class="panel-body">
                        <div style="width:60%;margin-bottom:-15%;position:relative;left:25%">
                            <canvas id="canvas3"></canvas>
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
	<div id="info" data-activeitem="#left-announcement"></div>
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

<script>
    var colorset = {
        red: '#FF6666',
        orange: '#FF9900',
        yellow: '#FFFF00',
        green: '#33CC99',
        blue: '#3399CC',
        semi_red:'rgb(255, 99, 132)',
        semi_blue:'rgb(54, 162, 235)',
        semi_yellow:'rgb(255, 205, 86)'
    }

    var config1 = {
        type: 'line',
        data: {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "按时提交人数",
                borderColor:colorset.yellow,
                backgroundColor:colorset.yellow,
                data: [20,30,15,25,10,27,30],
                fill: false,
            }, {
                label: "未提交人数",
                borderColor: colorset.blue,
                backgroundColor: colorset.blue,
                data: [10,0,15,5,20,3,0],
                fill: false,
            },{
                label: "满分人数",
                borderColor: colorset.red,
                backgroundColor: colorset.red,
                data: [10,15,5,20,4,24,20],
                fill: false,
            }]
        },
        options: {
            title:{
                display: true,
                text: "历史作业提交人数"
            },
            tooltips: {
                mode: 'index',
                callbacks: {
                    footer: function(tooltipItems, data) {
                        var sum = 0;
                        tooltipItems.forEach(function(tooltipItem) {
                            sum += data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index];
                        });
                        return 'Sum: ' + sum;
                    },
                }
            }
        }
    };

    var config2 = {
        type: 'pie',
        data: {
            labels: ["90-100","86-89","80-85","60-70","60分以下"],
            datasets: [{
                data: [
                    7,5,10,5,3
                ],
                backgroundColor: [
                    colorset.red,
                    colorset.orange,
                    colorset.yellow,
                    colorset.green,
                    colorset.blue,
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

    var config3 = {
        type: 'radar',
        data: {
            labels: ["第一部分", "第二部分", "第三部分", "第四部分", "第五部分", "第六部分", "第七部分","第八部分"],
            datasets: [{
                label: "出勤人数",
                backgroundColor: Chart.helpers.color(colorset.semi_red).alpha(0.7).rgbString(),
                borderColor: colorset.semi_red,
                pointBackgroundColor: colorset.semi_red,
                data: [30,25,20,24,16,19,17,28]
            }, {
                label: "作业提交人数",
                backgroundColor: Chart.helpers.color(colorset.semi_blue).alpha(0.7).rgbString(),
                borderColor: colorset.blue,
                pointBackgroundColor: colorset.blue,
                data: [28,29,30,24,20,18,29,23]
            }]
        },
        options: {
            legend: {
                position: 'right',
            }
        }
    };
    
    window.onload = function() {
        var ctx1 = document.getElementById("canvas1").getContext("2d");
        var ctx2 = document.getElementById("canvas2").getContext("2d");
        var ctx3 = document.getElementById("canvas3").getContext("2d");
        
        window.myLine = new Chart(ctx1, config1);
        window.myLine = new Chart(ctx2, config2);
        window.myLine = new Chart(ctx3, config3);
    };
</script>
<script src="__PUBLIC__/js/jquery-1.10.2.js"></script>
<script src="__PUBLIC__/js/easypiechart.js"></script>
 <script src="__PUBLIC__/js/easypiechart-data.js"></script> 
</body>
</html>