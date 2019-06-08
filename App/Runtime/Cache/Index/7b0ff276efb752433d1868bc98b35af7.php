<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html ng-app="Unicourse">
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
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
	<style>
		.tabProduct {
			padding:0;
			font:"Helvetica Neue",Arial, Helvetica, sans-serif;
			font-size: 15px;
			color: #555;
			overflow:hidden;
			background:	#FDF5E6;
			width:90%;
			margin:5% auto 0;
		}
		.comment{
			word-wrap:break-word; 
			word-break:break-all;
			width:70%;
			position:absolute;
			top:10px;
			left:10px;
			z-index:-1;
			height:160px;
			border:#CCCCCC 1px solid; 
			border-radius:3px;
			padding-top: 10px;
			color:#006699;
			text-align:center;
			 font-size:15px;
			display:block;
		}
		.tabProduct  th, td {padding:18px 28px 18px; text-align:center; border-right:1px solid #FF69B4;}
		.tabProduct th {padding-top:22px; text-shadow: 1px 1px 1px #fff; background:#FFF0F5;}
		.tabProduct td {border-top:1px solid #FF69B4; border-right:1px solid #FF69B4;background-color: #FFECF5}
		@font-face {
    			/* font-properties */
    			font-family: "myfont";
    			src :url("__PUBLIC__/font/belta-bold.ttf");
		}
		.myscore{
			font-family:"myfont";
			font-size:100px;
			color:red;
		}
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
                    <a href="<?php echo U('Index/Index/index');?>">首页</a>
                </li>
                <li class="dropdown" id="header-course">
                    <a href="#" class="dropdown-toggle"  data-toggle="dropdown">
                        课程 <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <?php
 foreach (session('selectedCourses') as $key => $value) { ?>
                        <li>
                            <a href="<?php echo U('Index/Notice/index',array('cno' =>$value['cno']));?>" ><?php echo ($value['cname']); ?></a>
                        </li>
                        <?php
 } ?>
                        <li class="divider"></li>
                        <li >
                            <a href="<?php echo U('Index/Course/index');?>">所有课程</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown" id="header-question">
                    <a href="<?php echo U('Index/Question/index');?>" class="dropdown-toggle" data-toggle="dropdown">
                        问答 <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo U('Index/Question/myQuestion');?>">我的提问</a>
                        </li>
                        <li>
                            <a href="<?php echo U('Index/Question/myFocusQuestion');?>">我的关注</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo U('Index/Question/allQuestion');?>">所有问答</a>
                        </li>
                    </ul>
                </li>
                <li id="header-group">
                    <a href="<?php echo U('Index/Group/mygroup');?>">小组</a>
                </li>
                <!--li id="header-group">
                    <a href="<?php echo U('Index/Analysis/index');?>">分析</a>
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
                <li id="header-message" class="dropdown hidden-xs" ng-controller="messages">
                    <a id="title-msg" data-toggle="dropdown" class="dropdown-toggle" href="<?php echo U('Index/Home/getmsg');?>">
                        <span class="glyphicon glyphicon-envelope" title="消息" ng-bind="msgs.length"></span>
                    </a>
                    <ul id="newmsg" class="dropdown-menu">
                        <li ng-repeat="msg in messages" >
                            <div class="msgitem"><a href="">
                                {{msg.actor_name}}</a><span>在问题<a href="{{'__APP__/question/questionDetail/qno/'+msg.position_no+'/mid/'+msg.m_id}}"><span class="msgcontent">{{msg.position_name}}</span></a>中添加了回复</div>
                        </li>
                        <li class='divider' ng-if="messages.length"></li>
                        <li >
                            <a href='<?php echo U('Index/Home/showmsg');?>' target="_blank">查看全部历史消息</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown hidden-xs">
                    <a href="#" id="profile" class="dropdown-toggle" data-toggle="dropdown">
                        <span><?php echo $_SESSION['uname']; ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo U('Index/UserProfile/index');?>" id="username"><div class="list-icon"><span class="icon-user"></span></div>我的资料</a>
                        </li>
                        <li class="divider"></li>
                        <?php if (session('isAssistant')==1) { ?>
                        <li>
                            <a href="<?php echo U('Assistant/Assistant/index');?>" id="assistant"><div class="list-icon"><span class="icon-book"></span></div>我担任的助教</a>
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
		<div class="panel-heading"><div class="list-icon"><span class="icon-home"></span></div><?php echo ($cname); ?></div>
		<div class="list-group"  role="menu">
			<a id="left-announcement" class="list-group-item" href="<?php echo U('Index/Notice/index',array('cno' =>$_REQUEST['cno']));?>" ><div class="list-icon"><span class="icon-reorder"></span></div>公告</a>
			<a id="left-question" class="list-group-item" href="<?php echo U('Index/Question/index',array('cno' =>$_REQUEST['cno']));?>" ><div class="list-icon"><span class="icon-comments"></span></div>问答</a>
			<a id="left-group" class="list-group-item" href="<?php echo U('Index/Group/index',array('cno' =>$_REQUEST['cno']));?>"><div class="list-icon"><span class="icon-group"></span></div>小组</a>
			<a id="left-homework" class="list-group-item" href="<?php echo U('Index/Homework/index',array('cno' =>$_REQUEST['cno']));?>"><div class="list-icon"><span class="icon-edit"></span></div>作业</a>
			<a id="left-document" class="list-group-item" href="<?php echo U('Index/Document/index',array('cno' =>$_REQUEST['cno']));?>"><div class="list-icon"><span class="icon-file-text"></span></div>课件</a>
			<!--a id="left-intro" class="list-group-item" href="<?php echo U('Index/Introduction/index',array('cno' =>$_REQUEST['cno']));?>"><div class="list-icon"><span class="icon-info"></span></div>课程介绍</a-->
			<a id="left-outline" class="list-group-item" href="<?php echo U('Index/Outline/index',array('cno' =>$_REQUEST['cno']));?>"><div class="list-icon"><span class="icon-check-sign"></span></div>课程大纲</a>

		</div>
	</div>
	<div id="sidebar2" style="width:110%">
		<div class="panel panel-success">
			<div class="panel-heading">课程切换</div>
			<div class="list-group">
				<?php  foreach (session('selectedCourses') as $key => $value) { ?>
				<a id="left-<?php echo ($value['cname']); ?>" class="list-group-item left-changecourse" href="__URL__/index/cno/<?php echo ($value['cno']); ?>" ><?php echo ($value['cname']); ?></a>
				<?php  } ?>	
				<a href="<?php echo U('Index/Course/index');?>" class="list-group-item panel-footer">所有课程</a>
			</div>
		</div>
	</div>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">
				<div id="main-right">
					<div style="color: red; margin:5px;">请同学们提交作业后做好备份。</div>
					<?php if(is_array($homework)): foreach($homework as $key=>$v): ?><div class="panel panel-default" id="panel-<?php echo ($v['hno']); ?>">
							<div class="panel-heading">
								<span class="hide"><?php echo ($v['htype']); ?></span>
								<span class="hide" htype="<?php echo ($v['htype']); ?>"><?php echo ($v['htype']); ?></span>
								<a  class="accordion-toggle title homework-title" data-toggle="collapse"  href="#collapse-<?php echo ($v['hno']); ?>" id="hno-<?php echo ($v['hno']); ?>" ><?php echo ($v["htitle"]); ?></a>
								<?php if($v['htype']==1): ?><span><small> &nbsp&nbsp普通作业</small></span>
								<?php elseif($v['htype']==2): ?> <span><small>&nbsp&nbsp实验</small></span>
								<?php elseif($v['htype']==3): ?> <span><small>&nbsp&nbsp大作业</small></span>
								<?php elseif($v['htype']==4): ?> <span><small>&nbsp&nbsp小测验</small></span>
								<?php elseif($v['htype']==5): ?> <span><small>&nbsp&nbsp期中考试</small></span>
								<?php elseif($v['htype']==6): ?> <span><small>&nbsp&nbsp期末考试</small></span>
								<?php else: endif; ?>
								<?php if($v['issubmit']==1): ?><span id="hw-check-<?php echo ($v['hno']); ?>" class="hw-check finished pull-right">已提交</span>
									<?php else: ?>
									<span id="hw-check-<?php echo ($v['hno']); ?>" class="hw-check unfinished pull-right"></span><?php endif; ?>
								<span class="hide deadline"><?php echo ($v["deadline"]); ?></span>
							</div>
							<div class="panel-body out collapse" id="collapse-<?php echo ($v['hno']); ?>">
								<div>
									<small class="time pull-right"><?php echo ($v["htime"]); ?></small>
									<span class="content"><?php echo ($v["hcontent"]); ?></span>
								</div>
								<div>
									<label class="label label-default">截止日期：</label>
									<span id="deadline-<?php echo ($v['hno']); ?>"><?php echo ($v["deadline"]); ?></span>
								</div>

								<div class="points">
									<?php if(is_array($v['points'])): foreach($v['points'] as $key=>$p): ?><span class="point_label label" data-pno="<?php echo ($p["ppno"]); ?>"><?php echo ($p["pname"]); ?></span><?php endforeach; endif; ?>
								</div>
								<hr>
								<div>
									<span class="fujian">附件:</span>
									<table class="table" style="width: 10px">
										<?php if(is_array($v['homeworkfile'])): foreach($v['homeworkfile'] as $key=>$vv): ?><tr>
												<td>
													<form action="<?php echo U('Index/Common/homeworkDownload');?>" method="POST" class="inline">
														<input type="hidden" name="fname" value="<?php echo ($vv['fname']); ?>">
														<input type="hidden" name="fno" value="<?php echo ($vv['fno']); ?>">
														<input type="submit" name="submit" value="<?php echo ($vv['fname']); ?>" class="btn btn-link " title="上传时间：<?php echo ($vv["ftime"]); ?>"></form>
													<span class="hide"><?php echo ($vv["ftime"]); ?></span>
												</td>
											</tr><?php endforeach; endif; ?>
										<?php if ($vv==null): ?>
										无
										<?php endif ?>
									</table>
								</div>
								<?php if((($v['htype']==3) OR ($v['htype']==2)) OR $v['issubmit'] == 1): ?><div class="row">
										<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="height:200px;">
											<a class="left carousel-control" href="#carousel-example-generic<?php echo ($v['hno']); ?>" data-slide="prev" style="top:50%;left:90%;position:relative;" >
												<span class="glyphicon glyphicon-chevron-left"></span>
											</a>
										</div>
										<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10" style="height:250px;" >

											<div id="carousel-example-generic<?php echo ($v['hno']); ?>" class="carousel slide" data-ride="carousel" style="height:200px;">
												<!--ol class="carousel-indicators">
													<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
												<li data-target="#carousel-example-generic" data-slide-to="1"></li>
												<li data-target="#carousel-example-generic" data-slide-to="2"></li>
												</ol-->
												<div class="carousel-inner" style="text-align:center;height:250px">
													<?php if((($v['htype']==3) OR ($v['htype']==2))): ?><div class="item">	
															<table width="600" border="0" cellpadding="0" cellspacing="0" class="tabProduct">
																<tr>
																	<?php if(is_array($v['homeworkpunion'])): foreach($v['homeworkpunion'] as $key=>$w): ?><td><?php echo ($w["pname"]); ?> (<?php echo ($w["score"]); ?>%)</td><?php endforeach; endif; ?>
																</tr>
																<?php if($v['issubmit']==1 ): ?><tr>
																		<?php if(is_array($v['stuexpscore'])): foreach($v['stuexpscore'] as $key=>$s): ?><td><?php echo ($s["score"]); ?> </td><?php endforeach; endif; ?>
																	</tr><?php endif; ?>
																<?php if($v['issubmit']==0 ): ?><tr>
																		<?php if(is_array($v['homeworkpunion'])): foreach($v['homeworkpunion'] as $key=>$s): ?><td>暂未提交</td><?php endforeach; endif; ?>
																	</tr><?php endif; ?>
															</table>
														</div><?php endif; ?>
													<?php if($v['issubmit']==1 ): ?><div class="item" style="width:100%;height:100%">
															<!--div style="float:right;margin-top:5%;margin-right:5%; z-index:100; width:100px; height:100px;background-color:#2F4F4F; border-radius:50px;">
																<span class="grade_mark" style=" height:100px; line-height:100px; font-size:60px;display:block; color:#FFF; text-align:center"><?php echo ($v['homeworkgrade']); ?></span>
															</div -->
															
															<!--div class="row">
																<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
																	去年6月，我国加入了《华盛顿协议》、成为该协议签约成员，这标志着具有国际实质等效的工程教育专业认证的帷幕在我国已经拉开。工程教育专业认证遵循三个基本理念：成果导向、以学生为中心、持续改进。这些理念对引导和促进专业建设与教学改革、保障和提高工程教育人才培养质量至关重要。成果导向教育已成为美国、英国
																</div>	
																<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
																	<div class="myscore">
																		100	
																	</div>
																</div>	
															</div-->
															<div class="row" style="height:30%;">
																<div  class="col-lg-6 col-md-6 col-sm-6 col-xs-6 " style="text-align:left;">
																		<h3>评语：</h3><p class="review"><?php echo ($v['homeworkreview']); ?></p>
																</div>	
															</div>
															<div class="row">
																<div  class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="text-align:right;padding-right:10%;font-size:26px;">
																	成绩:<span class="myscore">
																		<?php echo ($v['homeworkgrade']); ?>	
																	</span>
																	<input type="hidden" value="<?php echo ($v['homeworkgrade']); ?>" class="ghelp"/>
																</div>	
															</div>
															
														</div><?php endif; ?>
												</div>
											</div>
										</div>
										<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1" style="height:250px">
											<a class="right carousel-control" href="#carousel-example-generic<?php echo ($v['hno']); ?>" data-slide="next" style="top:50%;position:relative;">
												<span class="glyphicon glyphicon-chevron-right"></span>
											</a>
										</div>
									</div><?php endif; ?>
								<?php if($v['issubmit']==1 ): ?><div style="position:relative">
										<!--div style="position:absolute; z-index:2; width:100px; height:100px; left:70%;top: -80%; background-color:#2F4F4F; border-radius:50px;">
											<span class="grade_mark" style=" height:100px; line-height:100px; font-size:60px;display:block; color:#FFF; text-align:center"><?php echo ($v['homeworkgrade']); ?></span>
										</div-->
										<?php if(($v['htype']==3) OR ($v['htype']==2)): ?><!--table width="600" border="0" cellpadding="0" cellspacing="0" class="tabProduct">
												<tr>
													<?php if(is_array($v['homeworkpunion'])): foreach($v['homeworkpunion'] as $key=>$w): ?><td><?php echo ($w["pname"]); ?> (<?php echo ($w["score"]); ?>%)</td><?php endforeach; endif; ?>
												</tr>
												<tr>
													<?php if(is_array($v['stuexpscore'])): foreach($v['stuexpscore'] as $key=>$s): ?><td><?php echo ($s["score"]); ?> </td><?php endforeach; endif; ?>
												</tr>
											</table--><?php endif; ?>
											
										<span>已提交：<br>
											<form action="<?php echo U('Index/Common/studentHomeworkDownload');?>" method="GET" class="inline">
											<input type="hidden" name="fname" value="<?php echo ($v['fname']); ?>">
											<input type="hidden" name="fno" value="<?php echo ($v['fno']); ?>">
											<input type="submit" name="submit" value="<?php echo ($v['fname']); ?>" class="btn btn-link "></form>
										</span>
										<?php if($v['hfreeze'] == 0): ?><form class="delete-form inline">
												<input type="hidden" name="cno" value="<?php echo I('cno');?>">
												<input type="hidden" name="hno" value="<?php echo ($v['hno']); ?>">
												<a href="#" class="delete-homework btn btn-warning btn-small">删除</a>
											</form><?php endif; ?>
									</div>
									
									<?php if($v['hfreeze'] == 0): ?><div class="hide">
											提交作业（最大100MB）：
											<form class="form-upload" enctype="multipart/form-data" method="post">
												<input name="upload" type="file"  class="input-file"/>
												<input name="cno" type="hidden" value="<?php echo ($cno); ?>">
												<input name="hno" type="hidden" value="<?php echo ($v['hno']); ?>">
												<a class="btn btn-primary btn-upload" type="submit">提交</a>
											</form>
										</div><?php endif; ?>
								<?php elseif($v['belong']==1): ?>
									<?php if($v['hfreeze'] == 0): ?><div>
											<!--table width="600" border="0" cellpadding="0" cellspacing="0" class="tabProduct">
													<tr>
														<?php if(is_array($v['homeworkpunion'])): foreach($v['homeworkpunion'] as $key=>$w): ?><td><?php echo ($w["pname"]); ?> </td><?php endforeach; endif; ?>
													</tr>
													<tr>
														<?php if(is_array($v['homeworkpunion'])): foreach($v['homeworkpunion'] as $key=>$w): ?><td><?php echo ($w["score"]); ?>% </td><?php endforeach; endif; ?>
													</tr>
											</table-->
											提交作业（最大100MB）：
											<form class="form-upload" enctype="multipart/form-data" method="post">
												<input name="upload" type="file"  class="input-file"/>
												<input name="cno" type="hidden" value="<?php echo ($cno); ?>">
												<input name="hno" type="hidden" value="<?php echo ($v['hno']); ?>">
												<a class="btn btn-primary btn-upload" type="submit">提交</a>
											</form>
										</div>
									<?php else: ?>
										<div>很遗憾，该作业已经被老师冻结了，需要补交的话就快去联系老师吧！！</div><?php endif; endif; ?>
							</div>
						</div><?php endforeach; endif; ?>
					<?php if ($homework[0]==null): ?>
					<div class="panel panel-default">
						<div class="panel-body">老师还没布置作业诶~~走喽，出去玩儿喽~~</div>
					</div>
					<?php endif ?>
					<div >
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

	<div id="info" data-activeitem="#left-homework" data-activeheader="#header-course" data-domain=""></div>
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
		$(document).ready(function() {
			$('.carousel').carousel();
			$(".carousel-inner").each(function(){
				$(this).find(".item").first().addClass("active");
			})
			$(".review").each(function(){
				if($(this).html()==""){
					$(this).html("助教好懒啊，连评语都不给🙄");
				}
			})
    		var scroll_top=$(document).scrollTop();
    		if($(document).scrollTop() + $(window).height() < $(document).height()){
    			$('body,html').animate({'scrollTop':scroll_top-60},100);
    		}
			$.each($(".finished"), function(index, val) {
				// 作业提交，实验提交，大作业提交，小测提交照片，考试提交照片备份
				$s = $(this);
				if( $(this).prev().prev().prev().attr("htype")==1){
					$s.closest('.panel').addClass('panel-success');
				}
				else if($(this).prev().prev().prev().attr("htype")==3){
					var i = 0;
					$s.closest('.panel').addClass('panel-success');
					$s.closest('.panel-heading').css("background-color", "#008080");
					$s.closest('.panel-heading').css("border-color", "#008080");
					$s.closest('.panel').css("border-color", "#008080");
				}
				else if($(this).prev().prev().prev().attr("htype")==2){
					$s.closest('.panel').addClass('panel-info');
				}
				else if($(this).prev().prev().prev().attr("htype")==4){
					$s.closest('.panel').addClass('panel-success');
					$s.closest('.panel-heading').css("background-color", "#BA55D3");
					$s.closest('.panel-heading').css("border-color", "#BA55D3");
					$s.closest('.panel').css("border-color", "#BA55D3");
				}
				else if($(this).prev().prev().prev().attr("htype")==5){
					$s.closest('.panel').addClass('panel-success');
					$s.closest('.panel-heading').css("background-color", "#696969");
					$s.closest('.panel-heading').css("border-color", "#696969");
					$s.closest('.panel').css("border-color", "#696969");
				}
				else if($(this).prev().prev().prev().attr("htype")==6){
					$s.closest('.panel').addClass('panel-success');
					$s.closest('.panel-heading').css("background-color", "#1f2c39");
					$s.closest('.panel-heading').css("border-color", "#1f2c39");
					$s.closest('.panel').css("border-color", "#1f2c39");
				}
			});
			$(".ghelp").each(function(){
				//console.log($(this).val());
				if($(this).val()==""){
					//console.log("in!");
					$(this).prev().html("尚未出分");
					$(this).prev().css('font-size',"40px");
				}
			});

			$.each($(".unfinished"), function(index, val) {
				$s = $(this);
				$date = $s.siblings('.deadline').text();

				$s.text(daojishi($date));

				if($(this).prev().prev().prev().attr("htype")==4){
					$s.closest('.panel').addClass('panel-info');
					$s.closest('.panel-heading').css("background-color", "#D8BFD8");
					$s.closest('.panel-heading').css("border-color", "#D8BFD8");
					$s.closest('.panel').css("border-color", "#D8BFD8");
				}
				else if($(this).prev().prev().prev().attr("htype")==5){
					$s.closest('.panel').addClass('panel-info');
					$s.closest('.panel-heading').css("background-color", "#C0C0C0");
					$s.closest('.panel-heading').css("border-color", "#C0C0C0");
					$s.closest('.panel').css("border-color", "#C0C0C0");
				}
				else if($(this).prev().prev().prev().attr("htype")==6){
					$s.closest('.panel').addClass('panel-info');
					$s.closest('.panel-heading').css("background-color", "#B0C4DE");
					$s.closest('.panel-heading').css("border-color", "#B0C4DE");
					$s.closest('.panel').css("border-color", "#B0C4DE");
				}

				if (checkDate($date)) {
					if($(this).prev().prev().prev().attr("htype")==1){
						$s.closest('.panel').addClass('panel-warning');
					}						
					else if($(this).prev().prev().prev().attr("htype")==2){
						$s.closest('.panel').addClass('panel-info');
						$s.closest('.panel-heading').css("background-color", "#FFD700");
						$s.closest('.panel-heading').css("border-color", "#FFD700");
						$s.closest('.panel').css("border-color", "#FFD700");
					}
					else if($(this).prev().prev().prev().attr("htype")==3){
						$s.closest('.panel').addClass('panel-info');
						$s.closest('.panel-heading').css("background-color", "#DAA520");
						$s.closest('.panel-heading').css("border-color", "#DAA520");
						$s.closest('.panel').css("border-color", "#DAA520");
					}
				} 
				else {
					if($(this).prev().prev().prev().attr("htype")==1){
						$s.closest('.panel').addClass('panel-danger');
					}						
					else if($(this).prev().prev().prev().attr("htype")==3){
						$s.closest('.panel').addClass('panel-info');
						$s.closest('.panel-heading').css("background-color", "#8B0000");
						$s.closest('.panel-heading').css("border-color", "#8B0000");
						$s.closest('.panel').css("border-color", "#8B0000");
					}
					else if($(this).prev().prev().prev().attr("htype")==2){
						$s.closest('.panel').addClass('panel-info');
						$s.closest('.panel-heading').css("background-color", "#CD5C5C");
						$s.closest('.panel-heading').css("border-color", "#CD5C5C");
						$s.closest('.panel').css("border-color", "#CD5C5C");
					}
				}

			});

			$(".btn-upload").click(function() {
				var $s = $(this);
				file = $s.siblings('.input-file').val();
				if (file == "") {
					alert('先选个文件嘿<img src="__PUBLIC__/images/kb.gif"/>');
					CA(1);
					return false;
				}
				$s.text('提交中……');
				$s.closest('form').ajaxSubmit({
					url : "<?php echo U('Index/Homework/upload');?>",
					type : 'POST',
					datatype : "script",
					success : function(data) {
						$s.text('提交');
						if (data.status == 1) {
							alert("提交成功");
							var dm=document.domain;
							var $curPanel = $s.closest('.panel');

							CA(1);
							setTimeout(function () {
								var s = location.href.split('html')[0] + 'html';
								var newhref = s + '#' + $curPanel.attr('id');
								location.href = newhref;
								location.reload();
							}, 1000);
						} else {
							if (data.info) {
								alert(data.info);
							} else {
								alert('提交文件失败，请检查文件名、文件大小等');
							}
						}
					}
				});
			});

			// 打开对应的面板
			(function () {
				var panel = location.href.match(/#panel\-[0-9]+/);
				if (panel) {
					$(panel).find('.panel-body').slideDown();
				}
			})();


			$(".delete-homework").click(function() {
				$s = $(this);
				$s.closest('form').ajaxSubmit({
					url : "<?php echo U('Index/Homework/deleteHomework');?>",
					type : 'POST',
					datatype : "json",
					success : function(data) {
						if (data.status == 1) {
							// 把文件删除，把表单展现出来，写得有点渣，暂时不改了
							$s.parent().parent().hide();
							$s.parent().parent().next(".hide").removeClass('hide');
						} else {
							alert(data.info || '删除失败，请联系管理员');
						}
					}
				});
			});

			$(".point_label").each(function(){
				console.log("in!")
				var labels = ["label-primary","label-success","label-info","label-warning","label-danger"]
				var pno = parseInt($(this).attr("data-pno"))%5
				//console.log(labels[pno])
				$(this).addClass(labels[pno])
			})
		});


		function checkDate(data) {
			//data：截止日期
			var a = data.split(RegExp(":|-| ", "g"));
			var date1 = new Date(a[0], Number(a[1]) - 1, Number(a[2]), a[3], a[4], a[5]);
			var date2 = new Date();
			if (date2 > date1) {
				return false;
			}
			return true;
		}

		function daojishi(data) {
			//data：截止日期
			var a = data.split(RegExp(":|-| ", "g"));
			var date1 = new Date(a[0], Number(a[1]) - 1, Number(a[2]), a[3], a[4], a[5]);
			var date2 = new Date();
			var value;
			//要返回的那个东西（格式：过期/还剩 X天X分X秒）

			var days;
			var leave1;
			var hours;
			var leave2;
			var minutes;
			var leave3;
			var seconds;

			if (date2 <= date1) {
				date3 = date1 - date2;
				days = Math.floor(date3 / (24 * 3600 * 1000));
				leave1 = date3 % (24 * 3600 * 1000);
				hours = Math.floor(leave1 / (3600 * 1000));
				leave2 = leave1 % (3600 * 1000);
				minutes = Math.floor(leave2 / (60 * 1000));
				leave3 = leave2 % (60 * 1000);
				seconds = Math.round(leave3 / 1000);
				value = "还剩" + days + "天" + hours + "小时" + minutes + "分钟" + seconds + "秒";
			} else if (date2 > date1) {
				date3 = date2 - date1;
				days = Math.floor(date3 / (24 * 3600 * 1000));
				leave1 = date3 % (24 * 3600 * 1000);
				hours = Math.floor(leave1 / (3600 * 1000));
				leave2 = leave1 % (3600 * 1000);
				minutes = Math.floor(leave2 / (60 * 1000));
				leave3 = leave2 % (60 * 1000);
				seconds = Math.round(leave3 / 1000);
				value = "您已超时 " + days + "天 " + hours + "时 " + minutes + "分 " + seconds + "秒 ";
			}
			return value;
		}
</script>
</body>
</html>