<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <title><?php echo ($cname); ?>　大纲</title>
      <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="__PUBLIC__/images/icon.png" mce_href="__PUBLIC__/images/icon.png" type="image/x-icon">
  <link  id="theme" href="__PUBLIC__/css/custom/bootstrap.style.css" rel="stylesheet">
  <link  href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet">
  <link href="__PUBLIC__/css/style.css" rel="stylesheet">

<!--[if lt IE 9]>
<script type="text/javascript" src="__PUBLIC__/js/ie-compatible.js"></script>
<![endif]-->
    <link href="__PUBLIC__/css/OutlineStyle.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/bootswatch/bootstrap.min.css" type="text/css"/>
    <meta name="author" content="wxb mzy" />
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
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10" >
                <div id="main-right">
                    <div class="row">
                        <div class="panel panel-success" style="border-color: #750075">
                            <div class="panel-heading" style="background-color: #8702A8; font-weight: bold;font-size: 120%;">课程大纲</div>
                            <div class="panel-body">
                                <form id="form-notice">
                                    <table class="table_view" style="padding-bottom:0px" width="100%">
                                        <tbody>
                                            <tr>
                                                <th colspan="4" style="text-align:center;"> 课程基本信息 </th>
                                            </tr>
                                            <tr>
                                                <th width="120px" class="rowhead"> 教学班名称 </th>
                                                <td width="200px"> <?php echo ($cname); ?> </td>
                                                <th width="120px" class="rowhead"> 课程名称 </th>
                                
                                                <td width="200px" ><?php echo ($curricula_name[0]['cname']); ?></td>
                                           
                                
                                            </tr> 
                                            <tr>
                                                <th width="120px" class="rowhead"> 教学班号 </td>
                                                <td width="200px"> <?php echo ($cno); ?> </td>
                                                <th width="120px" class="rowhead"> 课程号</td>
                                                <td width="200px"> <?php echo ($curricula_name[0]['cno']); ?> </td>
                                            </tr> 
                                            <tr>
                                                <th class="rowhead"> 课程类别 </td>
                                                <td> <?php echo ($curricula[0]['ctype']); ?> </td>
                                                <th class="rowhead"> 学分 </td>
                                                <td> <?php echo ($curricula[0]['ccredit']); ?> </td>
                                            </tr>
                                            <tr>
                                                <th class="rowhead"> 先修课程 </th>
                                                <td colspan="3"><?php echo ($curricula[0]['cpreno']); ?></td>
                                            </tr>
                                            <tr>
                                                <th class="rowhead"> 授课对象 </th>
                                                <td colspan="3"><?php echo ($course[0]['cto']); ?></td>
                                            </tr>
                                            <tr>
                                                <th class="rowhead"> 课程目标 </th>
                                                <td colspan="3"> <?php echo ($course[0]['cgoal']); ?></td>
                                            </tr>
                                            <tr>
                                                <th class="rowhead"> 课程简介 </th>
                                                <td colspan="3"> <?php echo ($course[0]['cnotes']); ?>	</td>
                                            </tr>
                                            <tr>
                                                <th class="rowhead"> 学习要求 </th>
                                                <td colspan="3">  <?php echo ($course[0]['crequire']); ?></td>
                                            </tr>
                                            <tr>
                                                <th class="rowhead">推荐材料及阅读文献 </th>
                                                <td colspan="3"><?php echo ($course[0]['cbook']); ?> </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                    
                                    <table class="table_view" style="padding-top:0px; padding-bottom:0px;"  width="100%">
                                        <tbody>
                                            <tr>
                                                <th colspan="<?php echo ($colnum+1); ?>" style="text-align:center;"> 教学环节及考核分布 </th>
                                            </tr>
                                            <tr>
                                                <th scope="col" abbr="Starter" class="colhead" width="100px">名称</th>
                                                <?php if(is_array($syllabus_point_name)): foreach($syllabus_point_name as $key=>$pn): ?><th scope="col" abbr="Starter" class="colhead"><?php echo ($pn["pname"]); ?></th><?php endforeach; endif; ?>   
                                            </tr>
                                            <?php if(is_array($syllabus_section_name)): foreach($syllabus_section_name as $key=>$sn): ?><tr>
                                                    <th scope="row" class="colhead"><?php echo ($sn["sname"]); ?></th>
                                                    <?php if(is_array($syllabus_point_name)): foreach($syllabus_point_name as $key=>$pn): if(getcontribution($cno,$sn['sno'],$pn['pno']) == 0): ?><td name="<?php echo ($pn['pno']); ?>">/</td>  
                                                    <?php else: ?>    
                                                    <td><?php echo getcontribution($cno,$sn['sno'],$pn['pno']);?>%</td><?php endif; endforeach; endif; ?>     
                                                </tr><?php endforeach; endif; ?>
                                        </tbody>
                                    </table>

                                    <table class="table_view" style="padding-top:0px; padding-bottom:0px;"  width="100%">
                                        <tbody>
                                            <tr>
                                                <th colspan="4" style="text-align:center;"> 教师基本信息 </th>
                                            </tr>
                                        
                                             <tr>
                                                <th class="rowhead" width="130px"> 教师职工号 </td>
                                                <td width="200px"> <?php echo ($teacher[0]['tno']); ?> </td>
                                                <th class="rowhead" width="120px"> 教师姓名 </td>
                                                <td width="200px"> <?php echo ($teacher[0]['tname']); ?> </td>
                                            </tr> 
                                            <tr>
                                                <th class="rowhead"> 教师联系电话 </td>
                                                <td><?php echo ($teacher[0]['phone']); ?></td>
                                                <th class="rowhead"> 教师E-mail </td>
                                                <td><?php echo ($teacher[0]['email']); ?> </td>
                                            </tr>
                                            <tr>
                                                <th class="rowhead"> 教师办公地点 </td>
                                                <td> <?php echo ($teacher[0]['office']); ?></td>
                                                <th class="rowhead"> 教师学院 </td>
                                                <td class="tschool"> <?php echo ($teacher[0]['tschool']); ?></td>
                                            </tr>
                                           

                                        </tbody>
                                    </table>
                                    <table class="table_view" style="padding-top:0px; padding-bottom:0px;"  width="100%">
                                        <tbody>
                                            <tr>
                                                <th colspan="3" style="text-align:center;"> 课程助教信息 </th>
                                            </tr>
                                           <tr>
                                                <th scope="col" abbr="Starter" class="colhead">助教学号</th>
                                                <th scope="col" abbr="Starter" class="colhead">助教姓名</th>
                                                <th scope="col" abbr="Starter" class="colhead">助教学院</th>
                                           </tr>
                                           <?php if(is_array($assistant)): foreach($assistant as $key=>$an): ?><tr>
                                                    <td><?php echo ($an['ano']); ?></td>
                                                    <td><?php echo ($an['sname']); ?></td>
                                                    <td class="aschool"><?php echo ($an['school']); ?></td>
                                                </tr><?php endforeach; endif; ?>
                                        </tbody>
                                    </table>

                                     <table class="table_view" style="padding-top:0px; padding-bottom:0px;"  width="100%">
                                        <tbody>
                                            <tr>
                                                <th colspan="5" style="text-align:center;"> 教学进度及基本内容 </th>
                                            </tr>
                                        
                                            <tr>
                                                <th scope="col" abbr="Starter" width="80px" class="colhead">教学周</th>
                                                <th scope="col" abbr="Starter" width="100px" class="colhead">章节名称</th>
                                                <th scope="col" abbr="Starter" class="colhead">讲授内容及掌握程度</th>
                                                <th scope="col" abbr="Starter" class="colhead">学习内容	</th>
                                                <th scope="col" abbr="Starter" class="colhead">学习时间(小时)	</th>
                                           </tr>
                                            <?php if(is_array($schedule)): foreach($schedule as $key=>$sc): ?><tr style="font-size:12px;font-weight:normal" >
                                               <td><?php echo ($sc["cweek"]); ?></td>
                                                <td><?php echo ($sc["cname"]); ?></td>
                                                <td><?php echo ($sc["crequire"]); ?></td>
                                                <td><?php echo ($sc["cdetail"]); ?></td>
                                                <td><?php echo ($sc["chour"]); ?></td>   
                                            </tr><?php endforeach; endif; ?>
                                            
                                        </tbody>
                                    </table>
                                </form>
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
    <div id="info" data-activeitem="#left-outline" ></div>
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
            $(document).ready(function(){
                $(".aschool").each(function(){
                    if($(this).html()==""){
                        $(this).html("信息学院");
                    }
                })
                $(".tschool").each(function(){
                    //xconsole.log($(this).html())
                    if($(this).html()==""){
                        $(this).html("信息学院")
                    }
                })
            });
    </script>
</body>
</html>