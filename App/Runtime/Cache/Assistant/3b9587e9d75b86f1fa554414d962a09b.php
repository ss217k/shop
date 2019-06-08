<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html ng-app="Unicourse">
<head>
	<title>Unicourse新鲜事</title>
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

	<style>
	.list-group-item:first-child{border-radius: 0px;border-top:none;}
	.tabtitle:visited,.tabtitle:active,.tabtitle:focus{outline: none;border:none;}
	.courseitem .glyphicon-chevron-right{display:none;}
	.courseitem.cur .glyphicon-chevron-right{display:block;}
	.list-group-item{overflow: hidden;}
	</style>
</head>
<body ng-app="Unicourse">
	
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
		<div class="row" ng-controller="news">
			<div class="col-lg-3 col-md-3 col-sm-3 hidden-xs" id="main-left">
				<div id="sidebar1" class="panel panel-primary">
					<div class="panel-heading">
						<div class="list-icon">
							<span class="icon-book"></span>
						</div>
						我担任助教的课程
					</div>
					<div class="list-group"  role="menu">
						<?php if(is_array($course)): foreach($course as $key=>$v1): ?><span class="hide"><?php echo ($v1["cno"]); ?></span>
							<a  href="javascript:void(0);" title="<?php echo ($v1["cname"]); ?>" class="list-group-item courseitem" data-id="<?php echo ($v1['cno']); ?>" ng-click="changeCourse('<?php echo ($v1['cno']); ?>')" ng-class="{true:'cur'}[cno=='<?php echo ($v1["cno"]); ?>']">
								<?php echo ($v1["cname"]); ?>
								<span class="glyphicon glyphicon-chevron-right pull-right"></span>
							</a><?php endforeach; endif; ?>
						<a href="javascript:void(0);" class="list-group-item courseitem" data-id="0" ng-click="changeCourse('');" ng-class="{true:'cur'}[cno==0]">
							全部
							<span class="glyphicon glyphicon-chevron-right pull-right"></span>
						</a>
					</div>
				</div>
				<!-- <div id="sidebar2">
					<div class="panel panel-success">
						<div class="panel-heading"><div class="list-icon"><span class="icon-calendar"></span></div>日程提醒</div>
						<ul class="list-group">
							<?php if(is_array($schedule)): foreach($schedule as $key=>$v2): ?><li class="list-group-item">
									<span class="hide">日程编号<?php echo ($v2["sdno"]); ?></span> <strong><?php echo ($v2["rname"]); ?></strong>
									<br>
									<?php echo ($v2["rnotes"]); ?>
									<br>
									<small class="time ">截止时间：<?php echo ($v2["rdeadline"]); ?></small>
								</li><?php endforeach; endif; ?>
							<li class="list-group-item">
								<a href="<?php echo U('Index/Schedule/index');?>">查看更多</a>
							</li>
							<?php if ($schedule[0]==null): ?>
							<li class="list-group-item">
								当前没有日程提醒（试试
								<a href="<?php echo U('Index/Schedule/index');?>">添加日程提醒</a>
								吧）
							</li>
							<?php endif ?></ul>
					</div>
				</div> -->
			</div>
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<div id="main-right">
					<div class='row' style="min-width:450px">
						<div style="position:relative">
							<ul class="nav nav-tabs newstype">
							  <li ng-class="{true:'active'}[type==0]"><a href="javascript:void(0);" data-type='0' ng-click="changeType(0);" class="tabtitle">全部</a></li>
							  <li ng-class="{true:'active'}[type==1]"><a href="javascript:void(0);" data-type='1' ng-click="changeType(1);" class="tabtitle">问答</a></li>
							  <li ng-class="{true:'active'}[type==2]"><a href="javascript:void(0);" data-type='2' ng-click="changeType(2);" class="tabtitle">公告</a></li>
							  <li ng-class="{true:'active'}[type==3]"><a href="javascript:void(0);" data-type='3' ng-click="changeType(3);" class="tabtitle">作业</a></li>
							  <li ng-class="{true:'active'}[type==4]"><a href="javascript:void(0);" data-type='4' ng-click="changeType(4);" class="tabtitle">课件</a></li>
							  <li ng-class="{true:'active'}[type==5]"><a href="javascript:void(0);" data-type='5' ng-click="changeType(5);" class="tabtitle">大纲</a></li>	
							  <span class="pull-right" style="margin-top:10px;margin-right:5px"><a href='{{courseurl}}' ng-hide="cno==0">进入课程>></a></span>
							</ul>

						</div>
						<!-- <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<label class="control-label col-lg-3 col-md-3 col-sm-3 col-xs-3">课程：</label>
							<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
								<select name="n_cno" id="n_cno" class="form-control">
									<option value="0">全部</option>
									<?php foreach ($course as $key => $value): ?>
									<option value="<?php echo ($value['cno']); ?>"><?php echo ($value['cname']); ?></option>
									<?php endforeach ?></select>
							</div>
						</div> -->

					<div class="list-group" style="border:top:none;">
						<div class="list-group-item" ng-repeat="n in news" >
							<a href="">{{n.n_sname}}</a>在<a href="{{n.curl}}">{{n.n_cname}}</a>{{n.eventstr}}:<br>
							<a href="{{n.contenturl}}">
							{{n.n_content}}</a>
						</div>
						<div class="list-group-item" style="text-align:center;">
							<button class="btn btn-link" id="btn-more" ng-click="getMoreNews();" ng-hide="stop||onload">加载更多</button>
							<span ng-show="onload">加载中……</span>
							<span ng-show="stop">没有更多新消息了</span>
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
	<div id="info" data-activeheader="#header-home"></div>
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
		app.controller('news',function($scope,$http){
			$scope.type=0;
			$scope.cno="";
			$scope.stop=false;
			$scope.onload=false;
			$scope.page=0;
			$scope.news=[];
			var perpage=10;

			$scope.getNews=function(add){
				if($scope.stop) return false;
				var url=" <?php echo U('Assistant/Home/morenews');?> ";
				var data={page:$scope.page,cno:$scope.cno,type:$scope.type};
				$scope.onload=true;
				$http.post(url,data).success(function(data){

					if(data.status==0){
						if(add) $scope.news=$scope.news.concat(data.data);
						else $scope.news=data.data;
						if(data.data.length<perpage){
							$scope.stop=true;
						}
					}
					else if(data.status==1){
						$scope.stop=true;
						if(!add) $scope.news=[];
					}
					for(var i=0;i<$scope.news.length;i++){
						switch($scope.news[i].n_type){
							case '1':
							$scope.news[i].eventstr="提了新问题";
							$scope.news[i].curl=window.APP_URL+"/Assistant/question/index/cno/"+$scope.news[i].n_cno;
							$scope.news[i].contenturl=window.APP_URL+'/Assistant/question/questiondetail/qno/'+$scope.news[i].n_contentid+'/cno/'+$scope.news[i].n_cno;
							break;
							case '2':
							$scope.news[i].eventstr="发布了新公告";
							$scope.news[i].curl=window.APP_URL+"/Assistant/notice/index/cno/"+$scope.news[i].n_cno;
							$scope.news[i].contenturl=window.APP_URL+"/Assistant/notice/index/cno/"+$scope.news[i].n_cno;
							break;
							case '3':
							$scope.news[i].eventstr="布置了新作业";
							$scope.news[i].curl=window.APP_URL+"/Assistant/homework/index/cno/"+$scope.news[i].n_cno;
							$scope.news[i].contenturl=window.APP_URL+"/Assistant/homework/index/cno/"+$scope.news[i].n_cno+".html#panel-"+$scope.news[i].n_contentid;
							break;
							case '4':
							$scope.news[i].eventstr="上传了课件";
							$scope.news[i].curl=window.APP_URL+"/Assistant/document/index/cno/"+$scope.news[i].n_cno;
							$scope.news[i].contenturl=window.APP_URL+'/Assistant/document/index/cno/'+$scope.news[i].n_cno;
							break;
							case '5':
							$scope.news[i].eventstr="编辑了课程大纲";
							$scope.news[i].curl=window.APP_URL+"/Assistant/Outline/index/cno/"+$scope.news[i].n_cno;
							$scope.news[i].contenturl=window.APP_URL+'/Assistant/Outline/index/cno/'+$scope.news[i].n_cno;
							break;
							default:
							$scope.news[i].eventstr="";
						}
					}
					$scope.onload=false;
				});
			}
			$scope.changeType=function(type){
				$scope.type=type;
				$scope.page=0;
				$scope.stop=false;
				$scope.getNews();
			}
			$scope.changeCourse=function(cno){
				$scope.cno=cno;
				$scope.courseurl=window.APP_URL+"/Assistant/notice/index/cno/"+$scope.cno;
				$scope.page=0;
				$scope.stop=false;
				$scope.getNews();
			}


			$scope.getMoreNews=function(){
				$scope.page+=perpage;
				$scope.getNews(true);
			}
			$scope.getNews();
			$(window).scroll(function(){
				if($(window).scrollTop() > $(document).height() - $(window).height() - 100) {
	            $scope.getMoreNews();
	        }
			});
		});

	</script>
</body>
</html>