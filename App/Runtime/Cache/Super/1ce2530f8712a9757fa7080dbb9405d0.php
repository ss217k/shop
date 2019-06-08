<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>课程-指标点一览</title>
    <link rel="stylesheet" href="__PUBLIC__/super_view/css/lib.css">
    <link rel="stylesheet" href="__PUBLIC__/super_view/css/index.css">

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

    <style>[ng\:cloak],[ng-cloak]{display: none;}</style>
  </head>
  <body ng-controller="mainCtrl" ng-cloak>
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
            </ul>

            <ul class="nav navbar-nav">
                <li id="header-edit">
                    <a href="<?php echo U('Super/Target/edit',array('pno'=>1));?>">编辑</a>
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li id="header-manage">
                    <a href="<?php echo U('Super/Target/manage',array('pno'=>'11111111'));?>">管理</a>
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li id="header-backup">
                    <a href="<?php echo U('Super/Backup/index');?>">备份</a>
                </li>
            </ul>

             <ul class="nav navbar-nav navbar-right">
                <li class="dropdown hidden-xs">
                    <a href="#" id="profile" class="dropdown-toggle" data-toggle="dropdown">
                        <span><?php echo $_SESSION['uname']; ?></span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo U('Super/SuperProfile/index');?>" id="username"><div class="list-icon"><span class="icon-user"></span></div>我的资料</a>
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

    <div class="main" ng-view></div>
    <div class="script-container" style="margin-top:100px;">
      <!--script id="t-query" type="text/ng-template">
        <div class="container query-area">
          <form class="form panel" ng-submit="query()">
            <div>
              <h4>查询条件</h4>
            </div>
            <div class="row">
              <div class="col-sm-4 column">
                <div class="form-group">
                  <label for="building">教学楼</label>
                  <ul class="building-list">
                    <li class="list-item" ng-repeat="t in buildingList">
                      <label>
                        <input type="checkbox" ng-model="t.checked"><span ng-bind="t.name"></span>
                      </label>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-4 column">
                <div class="form-group">
                  <label for="roomType">教室类型</label>
                  <select class="form-control" name="roomType" ng-model="q.roomType" ng-options="t.id as t.name for t in roomTypeList"></select>
                </div>
                <div class="form-group">
                  <label for="capacity">规模</label>
                  <div class="input-group">
                    <input class="form-control" name="capacity" type="number" placeholder="" min="0" ng-model="q.roomSize"><span class="input-group-addon">人</span>
                  </div>
                </div>
                <div class="form-group">
                  <label>时段</label>
                  <ul class="time-list">
                    <li class="list-item" ng-repeat="t in timeList">
                      <label>
                        <input type="checkbox" ng-model="t.checked" ng-change="changeQuery()"><span ng-bind="t.name"></span>
                      </label>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-sm-4 column date-area">
                <div class="form-group">
                  <label>日期</label>
                  <div style="margin-bottom: 15px">
                    <div ng-sem-selector query="q" change="changeSem"></div>
                  </div>
                  <div ng-school-calendar on-change="changeDates" clear-dates="clearDates"></div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <button class="btn btn-primary pull-right" type="submit" ng-class="{true: 'disabled'}[isQuerying]">查询</button>
                <button class="btn btn-link btn-clear pull-right" type="button" ng-click="clearDates()">清除日期</button>
              </div>
            </div>
          </form>
          <div class="panel" ng-controller="lendCtrl">
            <div>
              <h4>查询结果</h4>
            </div>
            <div>
              <div ng-if="rooms &amp;&amp; !isQuerying">
                <table class="table table-hover table-rooms" datatable="">
                  <thead>
                    <tr>
                      <th>选择</th>
                      <th>教学楼</th>
                      <th>教室号</th>
                      <th>教室类型</th>
                      <th>教室规模</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="t in rooms" ng-class="{true:'active'}[t.selected]" ng-click="t.selected = !t.selected">
                      <td>
                        <input type="checkbox" ng-model="t.selected">
                      </td>
                      <td ng-bind="t.bname"></td>
                      <td ng-bind="t.crname + '(' + t.crsize_full + ')'"></td>
                      <td ng-bind="t.crtype"></td>
                      <td ng-bind="t.crsize_full"></td>
                    </tr>
                  </tbody>
                </table>
                <hr ng-if="isAdmin">
                <div class="row" ng-if="isAdmin">
                  <div class="col-sm-12">
                    <div class="form-group"><span>已选中:</span>
                      <button class="btn btn-info room-block" ng-repeat="t in rooms" ng-bind="t.crname + '(' + t.crsize_full + ')'" ng-click="t.selected = false" ng-if="t.selected"></button>
                    </div>
                    <div class="form-group">
                      <textarea class="form-control" placeholder="在此输入备注，如单子编号、借教室组织等" ng-model="q.remarks"></textarea>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary pull-right" type="button" ng-click="lend()">借出</button>
                    </div>
                  </div>
                </div>
              </div>
              <div ng-show="isQuerying">
                <div class="progress">
                  <div class="progress-bar progress-bar-striped active" style="width: 100%"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </script-->
        <div class="container query-area-1">
          <!--form class="form panel">
            <div class="row">
              <div class="col-sm-4">
                <label>教学楼</label>
                <select class="form-control" ng-model="building" ng-change="getCurrentRooms()" ng-options="t.bno as t.bname for t in buildings"></select>
              </div>
              <div class="col-sm-4">
                <label>学期</label>
                <div ng-sem-selector query="q" change="query"></div>
              </div>
              <div class="col-sm-4">
                <label>周数</label>
                <input class="form-control" ng-model="week" ng-change="query()" type="nubmer" min="1" max="20">
              </div>
            </div>
          </form-->
          <div class="panel"  style="height:1200px;">
            <div class="clearfix" ng-if="!roomData">
              <h5>表格一览</h5>
            </div>
            <!--div class="table-container" ng-show="roomData &amp;&amp; roomList &amp;&amp; !isQuerying">
              <table class="table table-bordered table-classroom" ng-table-fixed ng-if="roomData &amp;&amp; roomList &amp;&amp; !isQuerying">
                <thead>
                  <tr>
                    <th></th>
                    <th>时段</th>
                    <th ng-repeat="r in roomList" ng-bind="r | roomName"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr class="tr-first" ng-repeat-start="(k, w) in weekdayList">
                    <td rowspan="7" ng-bind="w.name"></td>
                    <td class="td-time" ng-bind="timeList[0].name | className" title="{{timeList[0].name}}"></td>
                    <td ng-repeat="(i, r) in roomList" ng-class="['td-default', 'td-disabled', 'td-selected'][roomData[i].data[k * 7]]" ng-click="select(i, k, 0)" ng-bind="roomData[i].name[k * 7] | className" title="{{roomData[i].name[k * 7]}}"></td>
                  </tr>
                  <tr ng-repeat="(j, t) in timeList.slice(1)" ng-repeat-end>
                    <td class="td-time" ng-bind="t.name | className"></td>
                    <td ng-repeat="(i, r) in roomList" ng-class="['td-default', 'td-disabled', 'td-selected'][roomData[i].data[k * 7 + j + 1]]" ng-click="select(i, k, j + 1)" ng-bind="roomData[i].name[k * 7 + j + 1] | className" title="{{roomData[i].name[k * 7 + j + 1]}}"></td>
                  </tr>
                </tbody>
              </table>
              <div class="row" style="margin-top: 15px" ng-if="isAdmin">
                <div class="col-sm-12">
                  <div class="form-group"><span>已选中:</span>
                    <button class="btn btn-info room-block" ng-repeat="t in selects" ng-bind="roomName(t.room) + ' | 周' + t.weekday.name + ' | ' + t.period.name.split('(')[0]"></button>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" placeholder="在此输入备注，如单子编号、借教室组织等" ng-model="remarks"></textarea>
                  </div>
                  <div class="form-group clearfix">
                    <button class="btn btn-primary pull-right" type="button" ng-click="lend()" ng-class="{'disabled': !selects.length}">借出</button>
                  </div>
                </div>
              </div>
            </div-->
            <div class="table-container" ng-show="1">
                <table class="table table-bordered table-classroom" ng-table-fixed ng-if="1">
                    <thead>
                        <tr>
                            <th>一级指标点</th>
                            <th>二级指标点/课程</th>
                            <?php if(is_array($curriculas)): foreach($curriculas as $key=>$c): ?><th><?php echo ($c["cname"]); ?></th><?php endforeach; endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(is_array($cdata)): foreach($cdata as $key=>$cd): ?><tr class="tr-first">
                                <td rowspan="<?php echo ($cd["p2_len"]); ?>"><?php echo ($cd["pname"]); ?></td> 
                                <td class="td-time" title="p2_1"><?php echo ($cd["first_p2"]["pname"]); ?></td>
                                <?php if(is_array($cd['first_p2']['ps'])): foreach($cd['first_p2']['ps'] as $key=>$p): if($p == 1): ?><td class="td-disabled">已分配</td>
                                    <?php else: ?>
                                        <td class="td-default"></td><?php endif; endforeach; endif; ?>
                            </tr>
                            <?php if(is_array($cd['p2'])): foreach($cd['p2'] as $key=>$pp): ?><tr class="e">
                                    <td class="td-time"><?php echo ($pp["pname"]); ?></td>
                                    <?php if(is_array($pp['ps'])): foreach($pp['ps'] as $key=>$ps): if($ps == 1): ?><td class="td-disabled">已分配</td>
                                                <?php else: ?>
                                                    <td class="td-default"></td><?php endif; endforeach; endif; ?>
                                </tr><?php endforeach; endif; endforeach; endif; ?>
                    </tbody>
                </table>
            </div>
            <div ng-show="isQuerying">
              <div class="progress">
                <div class="progress-bar progress-bar-striped active" style="width: 100%"></div>
              </div>
            </div>
          </div>
        </div>

      <!--script id="t-history" type="text/ng-template">
        <div class="container">
          <table class="table table-bordered table-history" datatable dt-options="DT.options" dt-columns="DT.columns" dt-instance="DT.instance"></table>
        </div>
      </script>
      <script id="t-history-btn" type="text/ng-template"><a class="btn btn-sm btn-default" href="javascript: void(0)" ng-click="recall($id)">撤销</a></script>
      <script id="t-import" type="text/ng-template">
        <div class="container query-area-1">
          <form class="form panel">
            <div class="row">
              <div class="col-sm-4">
                <label for="school_year_label">学年</label>
                <select class="form-control" name="school_year" ng-model="q.school_year">
                  <option value="2016-2017" selected="selected">2016-2017</option>
                  <option value="2017-2018">2017-2018</option>
                  <option value="2018-2019">2018-2019</option>
                  <option value="2019-2020">2019-2020</option>
                  <option value="2020-2021">2020-2021</option>
                </select>
              </div>
              <div class="col-sm-4">
                <label for="school_term_label">学期</label>
                <select class="form-control" name="school_term" ng-model="q.school_term">
                  <option value="秋季学期" selected="selected">秋季学期</option>
                  <option value="春季学期">春季学期</option>
                </select>
              </div>
              <div class="col-sm-4">
                <label for="school_term_label">学期共有周数</label>
                <div class="input-group">
                  <input class="form-control" type="number" min="0" max="30" name="school_week_num" ng-model="q.school_week_num"><span class="input-group-addon">周</span>
                </div>
              </div>
            </div>
            <div class="form-group" style="margin-top: 15px">
              <label for="upload_label">Excel课表(<a href="example.xls" target="_blank">模板</a>)</label>
              <input type="file" nv-file-select="" uploader="uploader">
              <div class="progress" ng-show="uploader.queue[0] &amp;&amp; uploader.queue[0].isUploading">
                <div class="progress-bar" ng-style="{ 'width': uploader.progress + '%' }"></div>
              </div>
            </div>
            <button class="btn btn-primary" type="button" ng-click="upload()" ng-disabled="!uploader.getNotUploadedItems().length">导入</button>
          </form>
        </div>
      </script>
      <script id="t-lend-preview-1" type="text/ng-template">
        <div class="modal-header">
          <h5 class="modal-title">借出教室</h5>
        </div>
        <div class="modal-body">
          <div><strong>时间:</strong>
            <ul class="time-list">
              <li ng-repeat="d in dates" ng-bind="d | dateName"></li>
            </ul>
          </div>
          <div>
            <ul class="room-list">
              <li ng-repeat="t in fTimes"><span ng-bind="t.name"></span></li>
            </ul>
          </div>
          <div>
            <div><strong>教室列表:</strong></div>
            <ul class="room-list">
              <li class="list-item" ng-repeat="r in fRooms"><span ng-bind="r.bname"></span><span ng-bind="r.crname"></span><span ng-bind="'(' + r.crsize_full + ')'"></span></li>
            </ul>
          </div>
          <div><strong>备注：</strong><span ng-bind="q.remarks"></span></div>
          <div class="m-t-md">
            <div class="alert alert-info" ng-if="!lent &amp;&amp; !fail">确定借出？</div>
            <div class="alert alert-success" ng-if="lent">借出成功</div>
            <div class="alert alert-danger" ng-if="fail">出错</div>
            <div class="progress" ng-show="isLoading">
              <div class="progress-bar progress-bar-striped active" style="width: 100%"></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" ng-click="confirm()" ng-if="!lent">借出</button>
          <button class="btn btn-default" ng-click="cancel()" ng-if="!lent">取消</button>
          <button class="btn btn-default" ng-click="cancel()" ng-if="lent">关闭</button>
        </div>
      </script>
      <script id="t-lend-preview-2" type="text/ng-template">
        <div class="modal-header">
          <h5 class="modal-title">借出教室</h5>
        </div>
        <div class="modal-body">
          <div><strong>时间:</strong><span>  第</span><span ng-bind="week"></span><span>周</span></div>
          <div><strong>教学楼:</strong><span ng-bind="buildingName"></span></div>
          <div><strong>教室列表:</strong>
            <ul class="room-list">
              <li class="list-item" ng-repeat="t in selects"><span ng-bind="roomName(t.room)"></span><span ng-bind="'周' + t.weekday.name"></span><span ng-bind="t.period.name.split('(')[0]"></span></li>
            </ul>
          </div>
          <div><strong>备注：</strong><span ng-bind="remarks"></span></div>
          <div class="m-t-md">
            <div class="alert alert-info" ng-if="!lent &amp;&amp; !fail">确定借出？</div>
            <div class="alert alert-success" ng-if="lent">借出成功</div>
            <div class="alert alert-danger" ng-if="fail">出错</div>
            <div class="progress" ng-show="isLoading">
              <div class="progress-bar progress-bar-striped active" style="width: 100%"></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" ng-click="confirm()" ng-if="!lent">借出</button>
          <button class="btn btn-default" ng-click="cancel()" ng-if="!lent">取消</button>
          <button class="btn btn-default" ng-click="cancel()" ng-if="lent">关闭</button>
        </div>
      </script-->
    </div>
    <footer class="footer"><span>Powered by UniCourse</span></footer>
    <div class="progress-layer" ng-show="isProgressing">
      <div class="progress-container">
        <div class="info">正在处理，请稍候</div>
        <div class="progress">
          <div class="progress-bar progress-bar-striped active" style="width: 100%"></div>
        </div>
      </div>
    </div>
    <div class="login-layer" ng-cloak ng-if="isLogging">
      <div class="login-container">
        <form class="form-signin" ng-submit="login()">
          <h2 class="form-signin-heading">管理员登录</h2>
          <label class="sr-only" for="inputEmail">用户名</label>
          <input class="form-control" type="text" name="usernumber" placeholder="用户名" required autofocus="" ng-model="user.usernumber">
          <label class="sr-only" for="inputPassword">密码</label>
          <input class="form-control" type="password" name="password" placeholder="密码" required ng-model="user.password">
          <input class="form-control" type="text" name="code" placeholder="验证码" required ng-model="user.code"><img id="code" ng-src="../../classroom/index/verify">
          <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button><a class="btn-cancel btn-lg btn-link btn-block" href="javascript: void(0)" ng-click="cancelLogin()">取消</a>
        </form>
      </div>
    </div>
    <script src="__PUBLIC__/super_view/js/lib.min.js"></script>
    <script src="__PUBLIC__/super_view/js/index.js?v=1.2"></script>
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
</html>