<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <title><?php echo ($cname); ?>　创建课程</title>
      <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="__PUBLIC__/images/icon.png" mce_href="__PUBLIC__/images/icon.png" type="image/x-icon">
  <link  id="theme" href="__PUBLIC__/css/custom/bootstrap.style.css" rel="stylesheet">
  <link  href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet">
  <link href="__PUBLIC__/css/style.css" rel="stylesheet">

<!--[if lt IE 9]>
<script type="text/javascript" src="__PUBLIC__/js/ie-compatible.js"></script>
<![endif]-->
    <link href="__PUBLIC__/css/amazeui.css" rel="stylesheet" type="text/css" media="screen"/>
    <script src="__PUBLIC__/js/edittable.js"></script>
    <style type="text/css">
        .EditCell_TextBox {
            width: 90%;
            border:1px solid #0099CC;
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
<input type="hidden" name="cno" value="<?php echo I('cno');?>" id="cnohelp">
<div id="main-container" class="container">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-10" id="main-left">
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10" id="content">
            <div class="panel panel-success" style="border-color: #DB7093">
                <div class="panel-heading" style="background-color:	#DB7093;border-color: #DB7093;height: 50px; font-weight: bold;
            font-size: 120%;">课程创建
                    <div class="list-icon" style="position:relative;left:80%;top:20%;" id="suggestion">
                                    <span class="icon-question"></span>
                                    <div id="words" >
                        <p>在这里您可以创建课程</p>
                        <p>和之前不同的是您需要填写您的课程所支持的工程认证体系中的指标点，您可以在表格中双击指标点名称，便会弹出输入框以输入您想要的名字。</p>
                        <p>当然您可以点击新增来添加指标点，或勾选一行后点击删除来删除不必要的行。</p>
                                    </div>
                                </div>
                </div>
                <div class="panel-body">
                    <div class="am-u-sm-12">
                        <div class="card-box">
                            <form action="" class="am-form" id="form-submit">
                                    <div class="am-form-group">
                                            <label for="doc-select-0">学年</label>
                                            <select id="doc-select-0" name="cyear">
                                                <option value="0" disabled="disabled" selected="selected">请选择学年</option>
                                                <?php $__FOR_START_1575236382__=2000;$__FOR_END_1575236382__=2018;for($i=$__FOR_START_1575236382__;$i < $__FOR_END_1575236382__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?>-<?php echo ($i+1); ?></option><?php } ?>
                                            </select>
                                            <span class="am-form-caret"></span>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="doc-vld-name-2">课程名称：</label>
                                        <input type="text" id="doc-vld-name-2" minlength="3" placeholder="输入课程名称" name="cname"/> 
                                    </div>
                                    <div class="am-form-group">
                                        <label for="doc-select-1">所属学院</label>
                                        <select id="doc-select-1" name="cschool">
                                            <option value="">请选择学院</option>
                                            <option value="信息学院">信息学院</option>
                                        </select>
                                        <span class="am-form-caret"></span>
                                    </div>
                                    <div class="am-form-group">
                                        <label for="curricula_select">课程种类</label>
                                        <select name="ccno" id="curricula_select">
                                            <option value="0" >请选择课程</option>
                                            <?php foreach ($curricula as $key => $value): ?>
                                            <option value="<?php echo ($value['cno']); ?>"><?php echo ($value['cname']); ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <!--div id="extra" class="am-form-group">
                                        <label for="tabProduct">工程认证指标点</label>
                                        <table width="600" border="0" cellpadding="0" cellspacing="0" name="tabProduct" id="tabProduct" class="table table-bordered">             
                                            <tr>
                                                <th width="32" align="center"></th>
                                                <th width="150" EditType="TextBox">指标点名称</th>
                                            </tr>
                                            <tr>
                                                <td align="center"><input type="checkbox" name="checkbox2" value="checkbox" /></td>
                                                <td width="150" name="Num" EditType="TextBox">理论知识讲授</td>
                                            </tr>
                                            <tr>
                                                <td align="center"><input type="checkbox" name="checkbox2" value="checkbox" /></td>
                                                <td width="150" name="Num" EditType="TextBox">终身学习意识培养</td>
                                            </tr>
                                        </table> 
                                        <input type="button" class="btn btn-default" style="margin-left:5px" name="Submit" value="新增" onclick="AddRow(document.getElementById('tabProduct'),1)" />
                                        <input type="button" class="btn btn-default" style="margin-left:5px" name="Submit2" value="删除" onclick="DeleteRow(document.getElementById('tabProduct'),1)" />
                                 
                                        <br />
                                        <div class="errormessage"></div>
                                    </div-->
                                    <div>
                                    <a id="btn-sub" class="btn btn-primary" style="margin-top:5px;float:right">提交</a>
                                </div>
                            </form>
                                
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

<script>
    //var tabProduct = document.getElementById("tabProduct");
    // 设置表格可编辑
    // 可一次设置多个，例如：EditTables(tb1,tb2,tb2,......)
    //EditTables(tabProduct);
    $("#btn-sub").click(function(){
        $("#form-submit").ajaxSubmit({   
            url:"<?php echo U('Teacher/CreateCourse/register');?>",
            type:"POST",
            success:function(data){
                if(data.status==1)
                {
                    alert("创建课程 成功");
                    CAR(1);
                }
                else
                {
                    alert("创建课程 失败，错误代码："+data.status+" ，快去和管理员联系吧");      
                    //location.reload();
                }
            }
        });
    });
</script>
</body>
<!--script src="__PUBLIC__/js/TBOutline.js"></script-->
</html>