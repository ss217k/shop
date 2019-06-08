<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <title><?php echo ($cname); ?>　大纲修改</title>
    <meta name="author" content="wxb mzy zxc lr" />
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
        td,th{
            font-size:10pt;
            line-height:155%;
        }
        table{
            border-width: 1px;
            border-bottom-width: 0px;
            border-style: solid;
            border-bottom-style: none;
            border-color: #CCCCCC;
        }
        td{
            border-bottom-width: 1px!important;
            border-bottom-style: solid!important;
            border-bottom-color: #CCCCCC!important;
        }
        .EditCell_TextBox {
            width: 90%;
            border:1px solid #0099CC;
        }
        .EditCell_DropDownList {
            width: 90%;
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
    <link href="__PUBLIC__/css/OutlineStyle.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/bootswatch/bootstrap.min.css" type="text/css"/>
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
        <div class="col-lg-8 col-md-8 col-sm-10 col-xs-10">
            <div id="main-right">
                <div class="row">
                        <div class="panel panel-success" style="border-color: #750075">
                            <div class="panel-heading" style="background-color: #8702A8;height: 50px; font-weight: bold;font-size: 120%;">课程大纲修改</div>
                            <div class="panel-body">
                                <form id="form-intro" class="form">
                                    <h3>课程基本信息</h3>
                                    <div class="form-group">
                                        <label for="intro">教学班名称</label>
                                        <?php if(is_array($cnames)): foreach($cnames as $key=>$cn): ?><input name="n" class="form-control" value="<?php echo ($cn["cname"]); ?>"></input><?php endforeach; endif; ?>  
                                    </div>
                                    <div class="form-group">
                                        <label for="intro">课程名称</label>
                                        <?php if(is_array($coursename)): foreach($coursename as $key=>$con): ?><input name="intro" class="form-control" value=<?php echo ($con["cname"]); ?> disabled="disabled"></input><?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="cnotes">教学班号</label>
                                        <input name="cnotes" class="form-control" disabled="disabled" value="<?php echo ($cno); ?>"></input>
                                    </div>
                                    <div class="form-group">
                                        <label for="cnotes">所属学院</label>
                                        <?php if(is_array($cnames)): foreach($cnames as $key=>$scn): ?><input name="cschool" class="form-control" disabled="disabled" value="<?php echo ($scn["cschool"]); ?>"></input><?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="cnotes">授课对象</label>
                                        <?php if(is_array($coursename)): foreach($coursename as $key=>$ton): ?><textarea name="t" class="form-control"><?php echo ($ton["cto"]); ?></textarea><?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="intro">课程目标</label>
                                         <?php if(is_array($coursename)): foreach($coursename as $key=>$gon): ?><textarea name="o" class="form-control"><?php echo ($gon["cgoal"]); ?></textarea><?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="cnotes">课程简介</label>
                                        <?php if(is_array($coursename)): foreach($coursename as $key=>$ion): ?><textarea name="i" class="form-control"><?php echo ($ion["cnotes"]); ?></textarea><?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="cnotes">学习要求</label>
                                        <?php if(is_array($coursename)): foreach($coursename as $key=>$ron): ?><textarea name="r" class="form-control"><?php echo ($ron["crequire"]); ?></textarea><?php endforeach; endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="cnotes">推荐材料及阅读文献</label>
                                        <?php if(is_array($coursename)): foreach($coursename as $key=>$bon): ?><textarea name="b" class="form-control"><?php echo ($bon["cbook"]); ?></textarea><?php endforeach; endif; ?>
                                    </div>
                                    
                                    <input type="hidden" name="cno" value="<?php echo I('cno');?>">
                                    <div class="form-group">
                                        <a id="btn-intro" class="btn btn-primary">提交</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                         <div class="panel panel-success" style="border-color: #750075">
                            <div class="panel-heading" style="background-color: #8702A8;height: 50px; font-weight: bold;font-size: 120%;">课程大纲修改
                                 <div class="list-icon" style="position:relative;left:80%;top:20%;" id="suggestion">
                                    <span class="icon-question"></span>
                                    <div id="words" >
                                <p>在这里您可以填写课程每一周的安排，之后学生便会在大纲中看到安排啦！<p/>
                                <p>填写方法：先选择您要填写的周数，之后双击表格每一块便可进行编辑，编辑完毕后点击提交便可完成一周的编辑。<p/>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form id="form_schedule" name="form_schedule" method="post" action="">
                                 <h3>修改进度安排</h3>
                                 <table width="700" border="0" cellpadding="0" cellspacing="0" id="tabProduct_schedule" class = "table_view">             
                                        <tr bgcolor="#EFEFEF">
                                            <th width="150" Name="Num" EditType="TextBox">教学周</th>
                                            <th width="150" Name="Num" EditType="TextBox">章节名称</th>
                                            <th width="150" Name="Num" EditType="TextBox">讲授内容及掌握程度</th>
                                            <th width="150" Name="Num" EditType="TextBox">学习内容</th>
                                            <th width="150" Name="Num" EditType="TextBox">学习时间(小时)</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <select name="checkway" id="checkway" style="width:80px">
                                                    <option value="0" disabled="disabled">---&nbsp&nbsp点击选择周数&nbsp&nbsp---</option>
                                                    <option value="1" selected="selected">第一周</option>
                                                    <option value="2">第二周</option>
                                                    <option value="3">第三周</option>
                                                    <option value="4">第四周</option>
                                                    <option value="5">第五周</option>
                                                    <option value="6">第六周</option>
                                                    <option value="7">第七周</option>
                                                    <option value="8">第八周</option>
                                                    <option value="9">第九周</option>
                                                    <option value="10">第十周</option>
                                                    <option value="11">第十一周</option>
                                                    <option value="12">第十二周</option>
                                                    <option value="13">第十三周</option>
                                                    <option value="14">第十四周</option>
                                                    <option value="15">第十五周</option>
                                                    <option value="16">第十六周</option>
                                                    <option value="17">第十七周</option>
                                                    <option value="18">第十八周</option>
                                                </select>                                                
                                            </td>
                                            <?php if(is_array($schedule)): foreach($schedule as $key=>$schn): ?><td class="td_check" id="scname"><?php echo ($schn["cname"]); ?></td>   
                                                <td class="td_check" id="screquire"><?php echo ($schn["crequire"]); ?></td>
                                                <td class="td_check" id="scdetail"><?php echo ($schn["cdetail"]); ?></td>
                                                <td class="td_check" id="schour"><?php echo ($schn["chour"]); ?></td><?php endforeach; endif; ?>
                                        </tr>   
                                    </table>
                                    <br />
                                    <!--input type="button" class="btn btn-primary" style="margin-top:5px;margin-left:5px" name="Submit" value="新增" onclick="AddRow(document.getElementById('tabProduct_schedule'),1)" />
                                    <input type="button" class="btn btn-primary" style="margin-top:5px;margin-left:5px" name="Submit2" value="删除" onclick="DeleteRow(document.getElementById('tabProduct_schedule'),1)" />
                                    <input type="button" class="btn btn-primary" style="margin-top:5px;margin-left:5px" name="Submit22" value="重置" onclick="confirm('该操作会将两个表格全部重置，您确定要这么做吗？');window.location.reload()" /-->
                                    <input type="submit" class="btn btn-primary" style="margin-top:5px;margin-left:5px" name="Submit3" value="提交" onclick="GetTableData(document.getElementById('tabProduct_schedule'));return false;" id="btn-schedule"/>
                                    <span style="color:#bbbbbb;margin-left:60px;"><small>注：请在填完一周的进度安排后点一次提交</small></span>
                                </form>
                            </div>
                        </div>
                         <div class="panel panel-success" style="border-color: #750075">
                            <div class="panel-heading" style="background-color: #8702A8;height: 50px; font-weight: bold;font-size: 120%;">课程大纲修改
                                <div class="list-icon" style="position:relative;left:80%;top:20%;" id="suggestion">
                                    <span class="icon-question"></span>
                                    <div id="words" >
                                <p>在这里您可以填写课程环节与成绩考核分布情况。<p/>
                                <p>填写方法：双击表格中您想要编辑的部分，输入所占比例如50，编辑完毕后点击提交即可。<p/>
                                <p>您当然可以选择某一个环节不记入考核分布如小测验，只需要将其每个指标点填0即可，但您必须保证表格每一列的百分比相加为100！<p/>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form id="form1" name="form1" method="post" action="">
                                    <h3>修改环节分布</h3>
                                    <table width="600" border="0" cellpadding="0" cellspacing="0" id="tabProduct" class = "table_view">             
                                        <tr bgcolor="#EFEFEF">
                                            <th width="150" Name="Num" EditType="TextBox">名称</th>
                                            <?php if(is_array($syllabus_point_name)): foreach($syllabus_point_name as $key=>$pn): ?><th width="150"  name="Num" EditType="TextBox" pname="<?php echo ($pn["pno"]); ?>"><?php echo ($pn["pname"]); ?>(%)</th><?php endforeach; endif; ?>   
                                        </tr>                          
                                        <tr id="1">
                                            <th>普通作业</th>
                                            <?php if(is_array($syllabus_point_name)): foreach($syllabus_point_name as $key=>$pn): ?><td name="<?php echo ($pn["pno"]); ?>"><?php echo getcontribution($cno,1,$pn['pno']);?></td><?php endforeach; endif; ?>
                                        </tr>
                                        <tr id="2">
                                            <th>实验</th>
                                            <?php if(is_array($syllabus_point_name)): foreach($syllabus_point_name as $key=>$pn): ?><td name="<?php echo ($pn["pno"]); ?>"><?php echo getcontribution($cno,2,$pn['pno']);?></td><?php endforeach; endif; ?>
                                        </tr>
                                        <tr id="3">
                                            <th>大实验/大作业</th>
                                            <?php if(is_array($syllabus_point_name)): foreach($syllabus_point_name as $key=>$pn): ?><td name="<?php echo ($pn["pno"]); ?>"><?php echo getcontribution($cno,3,$pn['pno']);?></td><?php endforeach; endif; ?>
                                        </tr>
                                        <tr id="4">
                                            <th>小测验</th>
                                            <?php if(is_array($syllabus_point_name)): foreach($syllabus_point_name as $key=>$pn): ?><td name="<?php echo ($pn["pno"]); ?>"><?php echo getcontribution($cno,4,$pn['pno']);?></td><?php endforeach; endif; ?>
                                        </tr>
                                        <tr id="5">
                                            <th>期中考试</th>
                                            <?php if(is_array($syllabus_point_name)): foreach($syllabus_point_name as $key=>$pn): ?><td name="<?php echo ($pn["pno"]); ?>"><?php echo getcontribution($cno,5,$pn['pno']);?></td><?php endforeach; endif; ?>
                                        </tr>
                                        <tr id="6">
                                            <th>期末考试</th>
                                            <?php if(is_array($syllabus_point_name)): foreach($syllabus_point_name as $key=>$pn): ?><td name="<?php echo ($pn["pno"]); ?>"><?php echo getcontribution($cno,6,$pn);?></td><?php endforeach; endif; ?>
                                        </tr>
                                    </table>
                                    <br />
                                    <!--input type="button" class="btn btn-primary" style="margin-top:5px;margin-left:5px" name="Submit22" value="重置" onclick="confirm('该操作会将两个表格全部重置，您确定要这么做吗？');window.location.reload()" /-->
                                    <input type="submit" class="btn btn-primary" style="margin-top:5px;margin-left:5px" name="Submit3" value="提交" onclick="GetTableData(document.getElementById('tabProduct'));return false;" id="btn-syllabus"/>
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

</body>
<script>
    var tabProduct = document.getElementById("tabProduct");
var tabProducts = document.getElementById("tabProduct_schedule");
// 设置表格可编辑
// 可一次设置多个，例如：EditTables(tb1,tb2,tb2,......)
EditTables(tabProduct,1);//修改环节分布
EditTables(tabProducts,0);//修改进度安排
//设置多个表格可编辑
function EditTables(table, b){
   // for(var i=0;i < arguments.length;i++){
    SetTableCanEdit(table,b);
    //}
}
//设置表格是可编辑的
function SetTableCanEdit(table,flag){
    for(var i=1; i<table.rows.length;i++){
        SetRowCanEdit(table.rows[i],flag);
    }
}
function SetRowCanEdit(row,flag){
    if(flag==0){
        for(var j=1;j<row.cells.length; j++){
            //如果当前单元格指定了编辑类型，则表示允许编辑
            var editType = row.cells[j].getAttribute("EditType");
            if(!editType){
                //如果当前单元格没有指定，则查看当前列是否指定
                editType = row.parentNode.rows[0].cells[j].getAttribute("EditType");
            }
            if(editType){
                row.cells[j].ondblclick = function (){
                    EditCell(this,flag);
                }
            }
        }
    }
    else{
        for(var j=0;j<row.cells.length; j++){
            //如果当前单元格指定了编辑类型，则表示允许编辑
            var editType = row.cells[j].getAttribute("EditType");
            if(!editType){
                //如果当前单元格没有指定，则查看当前列是否指定
                editType = row.parentNode.rows[0].cells[j].getAttribute("EditType");
            }
            if(editType){
                row.cells[j].ondblclick = function (){
                    EditCell(this,flag);
                }
            }
        }
    }
}
//设置指定单元格可编辑
function EditCell(element,flag){
    var editType = element.getAttribute("EditType");
    if(!editType){
        //如果当前单元格没有指定，则查看当前列是否指定
        editType = element.parentNode.parentNode.rows[0].cells[element.cellIndex].getAttribute("EditType");
    }
    switch(editType){
        case "TextBox":
            CreateTextBox(element, element.innerText,flag);
            break;
        case "DropDownList":
            CreateDropDownList(element);
            break;
        default:
            break;
    }
}
//为单元格创建可编辑输入框
function CreateTextBox(element, value, flag){
//检查编辑状态，如果已经是编辑状态，跳过
    var editState = element.getAttribute("EditState");
    if(editState != "true"){
        //创建文本框
        if(flag){
            var textBox = document.createElement("input");
            textBox.style.width = "30%";
        }
        else{
            var textBox = document.createElement("textarea");
            textBox.style.width = "100%";
        }
        textBox.type = "text";
        textBox.className="EditCell_TextBox";
        //设置文本框当前值
        if(!value){
            value = element.getAttribute("Value");
        }
        textBox.value = value;
        textBox.style.color = "black";
        //设置文本框的失去焦点事件
        textBox.onblur = function (){
            CancelEditCell(this.parentNode, this.value);
        }
        //向当前单元格添加文本框
        ClearChild(element);
        element.appendChild(textBox);
//        var baifenhao = document.createElement("span");
//        baifenhao.innerHTML = "%";
//        element.appendChild(baifenhao);
        textBox.focus();
        textBox.select();
        //改变状态变量
        element.setAttribute("EditState", "true");
        element.parentNode.parentNode.setAttribute("CurrentRow", element.parentNode.rowIndex);
    }
}
//为单元格创建选择框
function CreateDropDownList(element, value){
//检查编辑状态，如果已经是编辑状态，跳过
    var editState = element.getAttribute("EditState");
    if(editState != "true"){
        //创建下接框
        var downList = document.createElement("Select");
        downList.className="EditCell_DropDownList";
        //添加列表项
        var items = element.getAttribute("DataItems");
        if(!items){
            items = element.parentNode.parentNode.rows[0].cells[element.cellIndex].getAttribute("DataItems");
        }
        if(items){
            items = eval("[" + items + "]");
            for(var i=0; i<items.length; i++){
                var oOption = document.createElement("OPTION");
                oOption.text = items[i].text;
                oOption.value = items[i].value;
                downList.options.add(oOption);
            }
        }
        //设置列表当前值
        if(!value){
            value = element.getAttribute("Value");
        }
        downList.value = value;
        //设置创建下接框的失去焦点事件
        downList.onblur = function (){
            CancelEditCell(this.parentNode, this.value, this.options[this.selectedIndex].text);
        }
        //向当前单元格添加创建下接框
        ClearChild(element);
        element.appendChild(downList);
        downList.focus();
        //记录状态的改变
        element.setAttribute("EditState", "true");
        element.parentNode.parentNode.setAttribute("LastEditRow", element.parentNode.rowIndex);
    }
}
//取消单元格编辑状态
function CancelEditCell(element, value, text){
    element.setAttribute("Value", value);
    if(text){
        element.innerText = text;
    }else{
        element.innerText = value;
    }
    element.setAttribute("EditState", "false");
//检查是否有公式计算
    CheckExpression(element.parentNode);
}
//清空指定对象的所有字节点
function ClearChild(element){
    element.innerText = "";
}
//添加行
function AddRow(table, index){
    var lastRow = table.rows[table.rows.length-1];
    var newRow = lastRow.cloneNode(true);
    //计算新增加行的序号，需要引入jquery 的jar包
    var startIndex = $.inArray(lastRow,table.rows);
    table.tBodies[0].appendChild(newRow);
    newRow.cells[1].innerText='请输入种类';
    SetRowCanEdit(newRow);
    return newRow;
}
//删除行
function DeleteRow(table, index){
    var sum=0;
    for(var i=table.rows.length - 1; i>0;i--){
        var chkOrder = table.rows[i].cells[0].firstChild;
        if(chkOrder){
            if(chkOrder.type = "CHECKBOX"){
                if(chkOrder.checked){
                    sum++; 
                }
            }
        }
    }
    if(sum == table.rows.length - 1){
        alert("您至少要保留一行！");
        return ;
    }
    for(var i=table.rows.length - 1; i>0;i--){
        var chkOrder = table.rows[i].cells[0].firstChild;
        if(chkOrder){
            if(chkOrder.type = "CHECKBOX"){
                if(chkOrder.checked){
                    //执行删除
                    table.deleteRow(i);
                }
            }
        }
    }
}
//提取表格的值,JSON格式
function GetTableData(table){
    var tableData = new Array();
    for(var i=1; i<table.rows.length;i++){
        tableData.push(GetRowData(tabProduct.rows[i]));
    }
    return tableData;
}
//提取指定行的数据，JSON格式
function GetRowData(row){
    var rowData = {};
    for(var j=0;j<row.cells.length; j++){
        name = row.parentNode.rows[0].cells[j].getAttribute("Name");
        if(name){
            var value = row.cells[j].getAttribute("Value");
            if(!value){
                value = row.cells[j].innerText;
            }
            rowData[name] = value;
        }
    }
//alert("ProductName:" + rowData.ProductName);
//或者这样：alert("ProductName:" + rowData["ProductName"]);
    return rowData;
}
//检查当前数据行中需要运行的字段
function CheckExpression(row){
    for(var j=0;j<row.cells.length; j++){
        expn = row.parentNode.rows[0].cells[j].getAttribute("Expression");
        //如指定了公式则要求计算
        if(expn){
            var result = Expression(row,expn);
            var format = row.parentNode.rows[0].cells[j].getAttribute("Format");
            if(format){
                //如指定了格式，进行字值格式化
                row.cells[j].innerText = formatNumber(Expression(row,expn), format);
            }else{
                row.cells[j].innerText = Expression(row,expn);
            }
        }
    }
}
//计算需要运算的字段
function Expression(row, expn){
    var rowData = GetRowData(row);
//循环代值计算
    for(var j=0;j<row.cells.length; j++){
        name = row.parentNode.rows[0].cells[j].getAttribute("Name");
        if(name){
            var reg = new RegExp(name, "i");
            expn = expn.replace(reg, rowData[name].replace(/\,/g, ""));
        }
    }
    return eval(expn);
}
function formatNumber(num,pattern){
    var strarr = num?num.toString().split('.'):['0'];
    var fmtarr = pattern?pattern.split('.'):[''];
    var retstr='';
// 整数部分
    var str = strarr[0];
    var fmt = fmtarr[0];
    var i = str.length-1;
    var comma = false;
    for(var f=fmt.length-1;f>=0;f--){
        switch(fmt.substr(f,1)){
            case '#':
                if(i>=0 ) retstr = str.substr(i--,1) + retstr;
                break;
            case '0':
                if(i>=0) retstr = str.substr(i--,1) + retstr;
                else retstr = '0' + retstr;
                break;
            case ',':
                comma = true;
                retstr=','+retstr;
                break;
        }
    }
    if(i>=0){
        if(comma){
            var l = str.length;
            for(;i>=0;i--){
                retstr = str.substr(i,1) + retstr;
                if(i>0 && ((l-i)%3)==0) retstr = ',' + retstr;
            }
        }
        else retstr = str.substr(0,i+1) + retstr;
    }
    retstr = retstr+'.';
// 处理小数部分
    str=strarr.length>1?strarr[1]:'';
    fmt=fmtarr.length>1?fmtarr[1]:'';
    i=0;
    for(var f=0;f<fmt.length;f++){
        switch(fmt.substr(f,1)){
            case '#':
                if(i<str.length) retstr+=str.substr(i++,1);
                break;
            case '0':
                if(i<str.length) retstr+= str.substr(i++,1);
                else retstr+='0';
                break;
        }
    }
    return retstr.replace(/^,+/,'').replace(/\.$/,'');
}
</script>
<script>
$(document).ready(function(){
    $("#btn-syllabus").click(function(event) {
            var r=confirm("您确定要提交吗？")
            if (r==false)
            {
               return ;
            }
            var arr = new Array();
            var section_arr = new Array();
            var rowiter = $("#tabProduct").find("tr").first().next();
            var sid = 1;
            var numofrows = $("#tabProduct tr").length-1;
            var numofcols = ($("#tabProduct").find("tr").find("td").length)/(numofrows); //列数
            for(var j=0;j<numofrows;j++){
                var pnoiter = $("#tabProduct").find("th").first().next();
                var coliter = rowiter.find("th").first();
                var section_name = coliter.text();
                var section_item = {'sno':sid,'sname':section_name};
                section_arr.push(section_item);
                coliter = rowiter.find("td").first();
                var pid = parseInt(pnoiter.attr('pname'));
                for(k=0;k<numofcols;k++){
                    var value = coliter.text();
                    var jsonitem ={'sno':sid,'pno':pid,'contribution':parseInt(value)};
                    arr.push(jsonitem);
                    coliter = coliter.next();
                    pnoiter = pnoiter.next();
                    pid = parseInt(pnoiter.attr('pname'));
                }
                rowiter = rowiter.next();
                sid++; 
            }
            cno = $("#cnohelp").val();//辅助获得课程编号
            console.log(arr);
            console.log(section_arr);
            $.post("<?php echo U('Teacher/Outline/submitOutline');?>",{'jsonarr':JSON.stringify(arr),'sections':JSON.stringify(section_arr),'cno':cno},function(data){  
                if(data.status==1)
                {
                    alert('编辑成功！');
                }
                else if(data.status==4)
                {
                    alert('表格中每个指标点的和的比重必须为1，再检查一下吧！');
                    CA(1);
                }
                else
                {
                    alert('发布失败 错误编号：'+data.status);
                    CA(1);
                } 
            },'json');         
        });
$("#btn-intro").click(function(event){
                $.post("<?php echo U('Teacher/Outline/changeoutlineinfo');?>",
                    $("#form-intro").serialize(), function(data){
                       // console.log(data);
                        if(data.status==1)
                        {
                          alert("修改成功");
                          //location.reload();
                        }
                        else
                        {
                          alert("修改失败");
                          //location.reload();
                        }
                    },
                "json");
            });
});
$("#btn-schedule").click(function(event){
    var weeknow = parseInt($("#checkway").val());
    var cno = $("#cnohelp").val();
    var cname = $("#scname").text();
    var crequire = $("#screquire").text();
    var cdetail = $("#scdetail").text();
    var chour = $("#schour").text();
    $.post("<?php echo U('Teacher/Outline/changeweekinfo');?>",{'cweek':weeknow,'cno':cno,'cname':cname,'crequire':crequire,'cdetail':cdetail,'chour':chour},function(data){  
        if(data.status==1)
        {
          alert("修改成功");
          //location.reload();
        }
        else
        {
          alert("修改失败");
          //location.reload();
        }
    },'json');
});
$("#checkway").change(function(event){
    var weeknow = parseInt($("#checkway").val());
    var cno = $("#cnohelp").val();
    $.post("<?php echo U('Teacher/Outline/changeweek');?>",{'cweek':weeknow,'cno':cno},function(data){  
        $("#scname").html(data["cname"]);
        $("#screquire").html(data["crequire"]);
        $("#scdetail").html(data["cdetail"]);
        $("#schour").html(data["chour"]);
    },'json');         
});
</script>    
<!--script src="__PUBLIC__/js/bootstrap.js"></script-->
</html>