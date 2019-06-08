<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html ng-app="Unicourse">

<head>
    <title>达成度分析</title>
      <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" href="__PUBLIC__/images/icon.png" mce_href="__PUBLIC__/images/icon.png" type="image/x-icon">
  <link  id="theme" href="__PUBLIC__/css/custom/bootstrap.style.css" rel="stylesheet">
  <link  href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet">
  <link href="__PUBLIC__/css/style.css" rel="stylesheet">

<!--[if lt IE 9]>
<script type="text/javascript" src="__PUBLIC__/js/ie-compatible.js"></script>
<![endif]-->
    <style>
        @font-face {
            /* font-properties */
            font-family: "DPC";
            src: url("__PUBLIC__/font/DIN Pro Condensed Bold.otf");
        }

        body {
            background-color: #f7f7f7;
        }

        #my-container {
            background-color: #f7f7f7;
            /*padding-top:60px;*/
            margin: 0px auto;
            padding: 60px 0px 20px;
            min-height: 890px;
        }

        header h2 {
            display: block;
            width: 100%;
            text-align: center;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 17px;
            font-weight: bold;
            color: rgb(51, 51, 51);
            text-shadow: rgb(255, 255, 255) 1px 1px 0px;
            padding: 7px 0px;
        }

        #statistics-league-filter {
            margin-bottom: 10px;
            text-align: center;
        }

        .white-box {
            display: block;
            background: rgb(255, 255, 255);
        }

        .no-overflow {
            overflow: hidden;
        }

        #statistics-league-filter .stat-filter-container {
            display: block;
            overflow: hidden;
            clear: both;
            padding: 10px 15px;
        }

        #statistics-options {
            display: block;
            width: 100%;
            float: left;
            overflow: hidden;
        }

        #statistics-options table tbody tr {
            border-bottom: 1px solid #DDD;
        }

        #statistics-options table tbody tr td {
            border-right: 1px solid #DDD;
            text-align: center;
            width: 120px;
            text-shadow: 1px 1px 1px #FFF;
            cursor: pointer;
        }

        #statistics-options table tbody tr td span.heading {
            display: block;
            padding-top: 23px;
            font-size: 10px;
            font-weight: bold;
            color: #333;
            padding-bottom: 1px;
        }

        #statistics-options table tbody tr td span.stat {
            display: block;
            padding-bottom: 20px;
            font-size: 28px;
            font-weight: bold;
            color: #FD4A32;
        }

        #statistics-options table tbody tr td.selected,
        #statistics-options table tbody tr td:hover {
            background: rgb(229, 25, 25);
            background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…VpZ2h0PSIxMDEiIGZpbGw9InVybCgjZ3JhZC11Y2dnLWdlbmVyYXRlZCkiIC8+Cjwvc3ZnPg==);
            background: -moz-radial-gradient(center, ellipse cover, rgba(229, 25, 25, 1) 43%, rgba(207, 4, 4, 1) 100%);
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(43%, rgba(229, 25, 25, 1)), color-stop(100%, rgba(207, 4, 4, 1)));
            background: -webkit-radial-gradient(center, ellipse cover, rgba(229, 25, 25, 1) 43%, rgba(207, 4, 4, 1) 100%);
            background: -o-radial-gradient(center, ellipse cover, rgba(229, 25, 25, 1) 43%, rgba(207, 4, 4, 1) 100%);
            background: -ms-radial-gradient(center, ellipse cover, rgba(229, 25, 25, 1) 43%, rgba(207, 4, 4, 1) 100%);
            background: radial-gradient(ellipse at center, rgba(229, 25, 25, 1) 43%, rgba(207, 4, 4, 1) 100%);
        }

        #statistics-options table tbody tr td .hover-content {
            font-size: 13px;
            color: #FFF;
            font-weight: bold;
            text-shadow: none;
            display: none;
        }

        #statistics-options table tbody tr td.selected span.heading {
            color: #FFF;
            text-shadow: none;
        }

        #statistics-options table tbody tr td.selected span.stat {
            color: #FFF;
            text-shadow: none;
        }


        #statistics-graph {
            display: block;
            float: left;
            width: 100%;
            height: 425px;
            overflow: hidden;
            margin-left: 15px;
        }


        .ability-row {
            background-color: white;
            margin-top: 20px;
        }

        .ut-bio-stats_item {
            margin-bottom: 60px;
            width: 100%;
            margin-right: 20px;
        }

        .ut-bio-stats_title {
            -ms-flex-align: center;
            align-items: center;
            cursor: pointer;
            display: -ms-flexbox;
            display: flex;
            font-weight: 400;
            height: 38px;
            margin: 15px 0;
            padding: 0 20px;
            position: relative;
        }

        .ut-bio-stats_data-type {
            color: #666;
            font-family: 'DPC';
            font-size: 1.6rem;
        }

        .ut-bio-stats_data-type,
        .ut-bio-traits_data-type,
        .ut-bio-traits_data-value,
        .ut-bio-traits_feature,
        .ut-data_label--table {
            font-size: 1.4rem;
            font-weight: 400;
            line-height: 1.8rem;
            padding: 0 10px 0 20px;
            text-align: left;
            text-transform: uppercase;
        }

        .ut-bio-stats_data-type,
        .ut-bio-stats_data-value,
        .ut-data_label--table,
        .ut-data_val--table {
            height: 59px;
        }

        .ut-bio-stats_data-value {
            color: #f3f3f3;
            font-size: 2.4rem;
            padding: 0 20px 0 10px;
            text-align: right;
        }

        .ut-bio-stats_data-value--great {
            color: #24ae24;
        }

        .ut-bio-stats_data-value,
        .ut-data_val--table {
            padding: 0 20px 0 10px;
            text-align: right;
        }

        .ut-bio-stats_data-value,
        .ut-bio-stats_title-value,
        .ut-bio-versions_link,
        .ut-data_val,
        .ut-data_val--table,
        .ut-form_error-value,
        .ut-item-list-view_stat--primary:nth-of-type(-n+2) .ut-item_stat--num {
            font-weight: 700;
        }

        .ut-bio-stats_data-value,
        .ut-bio-stats_title-value,
        .ut-bio-versions_link,
        .ut-data_val,
        .ut-data_val--table,
        .ut-form_error-value,
        .ut-item-list-view_stat .ut-item_stat--num,
        .ut-item-list-view_stat--primary:nth-of-type(-n+2) .ut-item_stat--num {
            font-family: 'DPC';
            letter-spacing: -.5px;
        }

        .ut-bio-stats_content table {

            width: calc(100% - 5px);
        }

        .ut-bio-stats_content table tr {
            display: table-row;
            vertical-align: inherit;
        }

        .ut-bio-stats_title {
            -ms-flex-align: center;
            align-items: center;
            cursor: pointer;
            display: flex;
            font-weight: 400;
            height: 38px;
            margin: 15px 0;
            padding: 0 20px;
            position: relative;
            font-family: 'DPC', 'DIN Alternate', 'Franklin Gothic Medium Cond', 'Arial Narrow', HelveticaNeue-Light, sans-serif;
        }

        .ut-bio-stats_title-type {
            -ms-flex-positive: 1;
            flex-grow: 1;
            font-family: 'DPC';
            font-size: 2rem;
            letter-spacing: -.4px;
            line-height: 2.2rem;
            text-transform: uppercase;
        }

        .ut-bio-stats_title-value--great {
            color: #24ae24;
            font-size: 4rem;
            letter-spacing: -1px;
            font-weight: 700;
        }

        .ut-bio-stats_title-value--good {
            color: #90c039;
            font-size: 4rem;
            letter-spacing: -1px;
            font-weight: 700;
        }

        .ut-bio-stats_title-value--average {
            color: #f2b600;
            font-size: 4rem;
            letter-spacing: -1px;
            font-weight: 700;
        }

        .ut-bio-stats_data-row-b {
            border-top: 2px solid #eaeaea;
        }

        .ut-bio-stats_graph {
            background: #eaeaea;
            height: 7px;
            width: 100%;
        }

        .ut-bio-stats_graph-bar--great {
            fill: #24ae24;
        }

        .ut-bio-stats_graph-bar {
            fill: transparent;
            -webkit-transform: skew(-45deg);
            -ms-transform: skew(-45deg);
            transform: skew(-45deg);
            fill: #24ae24;
        }

        .ut-bio-stats_data-value--good {
            color: #90c039;
        }

        .ut-bio-stats_data-value--average {
            color: #f2b600;
        }

        .ut-bio-stats_graph-bar--good {
            fill: #90c039;
        }

        .ut-bio-stats_graph-bar--average {
            color: #f2b600;
        }






        .radar-row {
            margin-top: 30px;
            background-color: white;
        }


        .strength-row {
            margin-top: 30px;
            background-color: white;
        }

        .character-card {
            text-align: left;
        }

        .two-cols,
        .three-cols {
            display: inline-block;
            width: 100%;
            vertical-align: bottom;
        }

        .character-card .style {
            margin-top: 1em;
            padding: .2em 1em;
        }

        .character-card .home,
        .character-card .away {
            text-align: left;
            width: 49.5%;
        }

        .two-cols .home,
        .two-cols .away {
            position: relative;
            width: 50%;
        }

        .two-cols .home {
            float: left;
        }

        .two-cols .away {
            float: right;
        }

        .character-card .home,
        .character-card .away {
            text-align: left;
            width: 49.5%;
        }

        .character-card .strengths h3,
        .character-card .weaknesses h3 {
            text-align: center;
        }

        h3 {
            font-size: 1.333em;
            line-height: 2em;
            font-weight: bold;
            color: #606060;
        }

        .character-card.singular .strengths .grid {
            border-right: 1px solid #E0E0E0;
        }

        .grid {
            width: 100%;
        }

        .character-card.singular .strengths .grid td {
            padding-right: 1em;
            white-space: normal;
            width: 72%;
        }

        .grid td {
            padding: .2em;
            white-space: nowrap;
        }

        .iconize-icon-left {
            padding-left: 1.8em;
        }

        .button-icon-left .ui-icon,
        .iconize-icon-left .ui-icon {
            left: .2em;
            right: auto;
            margin-left: 0;
        }

        .ui-icon {
            display: block;
            overflow: hidden;
            height: 16px;
            width: 16px;
            text-indent: -99999px;
            background-repeat: no-repeat;
        }

        .level55 {
            background-color: #35AB53;
        }

        .level55,
        .level45,
        .level35,
        .level25,
        .level15,
        .level33,
        .level23,
        .level13 {
            border-radius: 3px;
            padding: 0 .2em;
            font-weight: bold;
            line-height: 1.4em;
            color: #fff;
        }

        .level15 {
            background-color: #CA2027;
        }

        .level25 {
            background-color: #E47A39;
        }

        .level45 {
            background-color: #8BBA4B;
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

    <div class="container" id="my-container">
        <div class="row">
            <header>
                <a class="header-link" href="" onclick="return false;">
                    <h2>马正一</h2>
                </a>
            </header>
            <div id="statistics-league-filter" class="white-box no-overflow">
                <div class="stat-filter-container">
                    <label for="competition">选择课程</label>
                    <select id="club_id" onchange="switch_club(this.value,this.options[this.selectedIndex].text);">
                        <optgroup label="League Teams">
                            <option value="85" selected="selected">全部课程</option>
                            <option value="28">汇编语言</option>
                        </optgroup>
                    </select>
                    <label for="competition">从</label>
                    <select id="competition" onchange="switch_competition(this.value);">
                        <optgroup label="Domestic Competitions">
                            <option value="23" selected="selected">2013-2014学年</option>
                            <option value="23" selected="selected">2014-2015学年</option>
                        </optgroup>
                        <!--optgroup label="International Competitions">
                            <option value="5">Champions League</option>
                        </optgroup-->
                    </select>
                    <label for="competition-season">到</label>
                    <select label="competition-season" id="season" onchange="switch_season(this.value);">
                        <option value="23" selected="selected">2017-2018学年</option>
                        <option value="23" selected="selected">2016-2017学年</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div id="statistics-options" class="white-box no-overflow">
                    <table>
                        <tbody>
                            <tr>
                                <td id="stat-1" class="selected">
                                    <span class="heading" style="display: block;">课程数</span>
                                    <span class="stat" style="display: block;">641</span>
                                    <span class="hover-content" style="display: none;">点击查看详情→</span>
                                </td>
                                <td id="stat-2">
                                    <span class="heading">学分数</span>
                                    <span class="stat">23</span>
                                    <span class="hover-content" style="display: none;">点击查看详情→</span>
                                </td>
                                <td id="stat-3">
                                    <span class="heading" style="display: block;">文件数</span>
                                    <span class="stat" style="display: block;">3</span>
                                    <span class="hover-content" style="display: none;">点击查看详情→</span>
                                </td>
                            </tr>
                            <tr>
                                <td id="stat-4">
                                    <span class="heading" style="display: block;">平均分</span>
                                    <span class="stat" style="display: block;">92</span>
                                    <span class="hover-content" style="display: none;">点击查看详情→</span>
                                </td>
                                <td id="stat-5">
                                    <span class="heading" style="display: block;">准时率</span>
                                    <span class="stat" style="display: block;">80%</span>
                                    <span class="hover-content" style="display: none;">点击查看详情→</span>
                                </td>
                                <td id="stat-6">
                                    <span class="heading" style="padding-top: 10px !important; display: block;">达成度</span>
                                    <span class="stat" style="padding-bottom: 12px !important; display: block;">92%</span>
                                    <span class="hover-content" style="display: none;">点击查看详情→</span>
                                </td>
                            </tr>
                            <tr>
                                <td id="stat-7">
                                    <span class="heading" style="display: block;">最擅长</span>
                                    <span class="stat" style="display: block;">理论知识</span>
                                    <span class="hover-content" style="display: none;">点击查看详情→</span>
                                </td>
                                <td id="stat-8">
                                    <span class="heading">最不擅长</span>
                                    <span class="stat">动手能力</span>
                                    <span class="hover-content" style="display: none;">点击查看详情→</span>
                                </td>
                                <td id="stat-9">
                                    <span class="heading" style="display: block;">人才类型</span>
                                    <span class="stat" style="display: block;">科研型</span>
                                    <span class="hover-content" style="display: none;">点击查看详情→</span>
                                </td>
                            </tr>
                            <tr>
                                <td id="stat-10">
                                    <span class="heading" style="display: block;">?</span>
                                    <span class="stat" style="display: block;">?</span>
                                    <span class="hover-content" style="display: none;">点击查看详情→</span>
                                </td>
                                <td id="stat-11">
                                    <span class="heading" style="display: block;">?</span>
                                    <span class="stat" style="display: block;">?</span>
                                    <span class="hover-content" style="display: none;">点击查看详情→</span>
                                </td>
                                <td id="stat-12">
                                    <span class="heading" style="display: block;">?</span>
                                    <span class="stat" style="display: block;">?</span>
                                    <span class="hover-content" style="display: none;">点击查看详情→</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10">
                <div id="statistics-graph" class="white-box">
                    <div id="stat-graph-1" class="stat-graph graph-with-tabs" style="">
                        <div style="width:100%;">
                            <canvas id="canvas-1"></canvas>
                        </div>
                    </div>
                    <div id="stat-graph-2" class="stat-graph graph-with-tabs" style="display: none;">
                        <div style="width:100%;">
                            <canvas id="canvas-2"></canvas>
                        </div>
                    </div>

                    <div id="stat-graph-3" class="stat-graph graph-with-tabs" style="display: none;">
                        <div style="width:100%;">
                            <canvas id="canvas-3"></canvas>
                        </div>   
                    </div>
                    <div id="stat-graph-4" class="stat-graph graph-with-tabs" style="display: none;">
                        <div style="width:100%;">
                            <canvas id="canvas-4"></canvas>
                        </div> 
                    </div>
                    <div id="stat-graph-5" class="stat-graph graph-with-tabs" style="display: none;">
                        <div style="width:100%;">
                            <canvas id="canvas-5"></canvas>
                        </div>     
                    </div>
                    <div id="stat-graph-6" class="stat-graph graph-with-tabs" style="display: none;">
                        <div style="width:100%;">
                            <canvas id="canvas-6"></canvas>
                        </div>   
                    </div>
                    <div id="stat-graph-7" class="stat-graph graph-with-tabs" style="display: none;">
                        <div style="width:100%;">
                            <canvas id="canvas-7"></canvas>
                        </div>
                    </div>

                    <div id="stat-graph-8" class="stat-graph graph-with-tabs" style="display:none">
                        <div style="width:100%;">
                            <canvas id="canvas-8"></canvas>
                        </div>
                    </div>
                    <div id="stat-graph-9" class="stat-graph graph-with-tabs" style="display: none;">
                        <div style="width:100%;">
                            <canvas id="canvas-9" style="height:100%;"></canvas>
                        </div>
                    </div>
                    <div id="stat-graph-10" class="stat-graph graph-with-tabs" style="display: none;">
                        <div class="graph-top">
                            <h3 class="graph-title">Average Defensive Actions</h3>
                            <div class="graph-top-links">
                                <a id="stat-10_type" class="selected" href="javascript:void(0);" onclick="showAverageDefensiveActions('type');">Type</a>
                                <a id="stat-10_by_match" href="javascript:void(0);" onclick="showAverageDefensiveActions('overtime');">By match</a>
                            </div>
                        </div>
                        <div id="the-graph-10-type" class="graph_cover" rel="stat-10#stat-10_type">
                            <div id="the-graph-10" class="graph tab-content-holder">
                                <div class="loading-box">
                                    <img class="loading-image" src="http://www.squawka.com/wp-content/themes/squawka_web/img/loading/loading-charts.gif">
                                    <div class="loading-text">Loading Visualisations</div>
                                </div>
                            </div>
                        </div>
                        <div id="the-graph-10-overtime" class="graph_cover" rel="stat-10#stat-10_by_match">
                            <div id="the-graph-10ot" class="graph tab-content-holder">
                                <div class="loading-box">
                                    <img class="loading-image" src="http://www.squawka.com/wp-content/themes/squawka_web/img/loading/loading-charts.gif">
                                    <div class="loading-text">Loading Visualisations</div>
                                </div>
                            </div>
                        </div>
                        <div class="league-link">
                            <a href="#" class="leaderboard" target="_blank" rel="defensive-actions">Compare Sergio Ramos against others</a>
                            <button class="share log-in-trigger">
                                <img src="http://www.squawka.com/wp-content/themes/squawka_web/img/share-icon.png">
                                <span>Share</span>
                            </button>
                        </div>
                    </div>
                    <div id="stat-graph-11" class="stat-graph graph-with-tabs" style="display: none;">
                        <div class="graph-top">
                            <h3 class="graph-title">Total Defensive Errors</h3>
                            <div class="graph-top-links"></div>
                        </div>
                        <div class="graph_cover" rel="stat-11">
                            <div id="the-graph-11" class="graph tab-content-holder">
                                <div class="loading-box">
                                    <img class="loading-image" src="http://www.squawka.com/wp-content/themes/squawka_web/img/loading/loading-charts.gif">
                                    <div class="loading-text">Loading Visualisations</div>
                                </div>
                            </div>
                        </div>
                        <div class="league-link">
                            <a href="#" class="leaderboard" target="_blank" rel="defensive-errors">Compare Sergio Ramos against others</a>
                            <button class="share log-in-trigger">
                                <img src="http://www.squawka.com/wp-content/themes/squawka_web/img/share-icon.png">
                                <span>Share</span>
                            </button>
                        </div>
                    </div>
                    <div id="stat-graph-12" class="stat-graph graph-with-tabs" style="display: none;">
                        <div class="graph-top">
                            <h3 class="graph-title">Discipline</h3>
                            <div class="graph-top-links">
                                <a id="stat-12_yellow_cards" class="selected" href="javascript:void(0);" onclick="showCards('yellow');">Yellow Cards</a>
                                <a id="stat-12_red_cards" href="javascript:void(0);" onclick="showCards('red');">Red Cards</a>
                                <a id="stat-12_over_time" href="javascript:void(0);" onclick="showCards('overtime');">Over time</a>
                            </div>
                        </div>
                        <div id="stat-graph-12-yellow" class="graph_cover" rel="stat-12#stat-12_yellow_cards">
                            <div id="the-graph-12" class="graph tab-content-holder">
                                <div class="loading-box">
                                    <img class="loading-image" src="http://www.squawka.com/wp-content/themes/squawka_web/img/loading/loading-charts.gif">
                                    <div class="loading-text">Loading Visualisations</div>
                                </div>
                            </div>
                        </div>
                        <div id="stat-graph-12-red" class="graph_cover" style="display:none;" rel="stat-12#stat-12_red_cards">
                            <div id="the-graph-12a" class="graph tab-content-holder">
                                <div class="loading-box">
                                    <img class="loading-image" src="http://www.squawka.com/wp-content/themes/squawka_web/img/loading/loading-charts.gif">
                                    <div class="loading-text">Loading Visualisations</div>
                                </div>
                            </div>
                        </div>
                        <div id="stat-graph-12-overtime" class="graph_cover" style="display:none;" rel="stat-12#stat-12_over_time">
                            <div id="the-graph-12ot" class="graph tab-content-holder">
                                <div class="loading-box">
                                    <img class="loading-image" src="http://www.squawka.com/wp-content/themes/squawka_web/img/loading/loading-charts.gif">
                                    <div class="loading-text">Loading Visualisations</div>
                                </div>
                            </div>
                        </div>
                        <div class="league-link">
                            <a href="#" class="leaderboard" target="_blank" rel="discipline">Compare Sergio Ramos against others</a>
                            <button class="share log-in-trigger">
                                <img src="http://www.squawka.com/wp-content/themes/squawka_web/img/share-icon.png">
                                <span>Share</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row ability-row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="ut-bio-stats ut-grid-view">
                    <div class="ut-bio-stats_item ut-grid-view_item ng-scope">
                        <div class="ut-bio-stats_header">
                            <h6 class="ut-bio-stats_title">
                                <span class="ut-bio-stats_title-type ng-binding">一级指标点</span>
                                <span class="ut-bio-stats_title-value ut-bio-stats_title-value--great">
                                    86
                                </span>
                            </h6>
                            <svg class="ut-bio-stats_graph">
                                <rect class="ut-bio-stats_graph-bar ut-bio-stats_graph-bar--great" height="100%" width-percent="86" width="86%"></rect>
                            </svg>


                            <!--svg class="ut-icon ut-icon-plus"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://www.easports.com/fifa/ultimate-team/fut/database/player/155862/Sergio%20Ramos#ut-icon-plus" class="ut-icon_symbol"></use></svg-->

                            <!--svg class="ut-icon ut-icon-minus"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://www.easports.com/fifa/ultimate-team/fut/database/player/155862/Sergio%20Ramos#ut-icon-minus" class="ut-icon_symbol"></use></svg-->
                            </h6>
                            <!--svg class="ut-bio-stats_graph">
                                <rect class="ut-bio-stats_graph-bar ut-bio-stats_graph-bar--great" height="100%" width-percent="86" width="86%"></rect>
                              </svg-->
                        </div>
                        <div class="ut-bio-stats_content">
                            <table class="ut-bio-stats_data">
                                <tbody>
                                    <!-- ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点1</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--great">84</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row-b">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点2</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--good">70</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row-b">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点3</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--great">87</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="ut-bio-stats ut-grid-view">
                    <div class="ut-bio-stats_item ut-grid-view_item ng-scope">
                        <div class="ut-bio-stats_header">
                            <h6 class="ut-bio-stats_title">
                                <span class="ut-bio-stats_title-type ng-binding">一级指标点</span>
                                <span class="ut-bio-stats_title-value ut-bio-stats_title-value--great">
                                    86
                                </span>
                            </h6>
                            <svg class="ut-bio-stats_graph">
                                <rect class="ut-bio-stats_graph-bar ut-bio-stats_graph-bar--great" height="100%" width-percent="86" width="86%"></rect>
                            </svg>


                            <!--svg class="ut-icon ut-icon-plus"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://www.easports.com/fifa/ultimate-team/fut/database/player/155862/Sergio%20Ramos#ut-icon-plus" class="ut-icon_symbol"></use></svg-->

                            <!--svg class="ut-icon ut-icon-minus"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://www.easports.com/fifa/ultimate-team/fut/database/player/155862/Sergio%20Ramos#ut-icon-minus" class="ut-icon_symbol"></use></svg-->
                            </h6>
                            <!--svg class="ut-bio-stats_graph">
                                    <rect class="ut-bio-stats_graph-bar ut-bio-stats_graph-bar--great" height="100%" width-percent="86" width="86%"></rect>
                                  </svg-->
                        </div>
                        <div class="ut-bio-stats_content">
                            <table class="ut-bio-stats_data">
                                <tbody>
                                    <!-- ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点1</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--average">50</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row-b">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点2</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--great">87</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row-b">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点3</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--great">87</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="ut-bio-stats ut-grid-view">
                    <div class="ut-bio-stats_item ut-grid-view_item ng-scope">
                        <div class="ut-bio-stats_header">
                            <h6 class="ut-bio-stats_title">
                                <span class="ut-bio-stats_title-type ng-binding">一级指标点</span>
                                <span class="ut-bio-stats_title-value ut-bio-stats_title-value--great">
                                    86
                                </span>
                            </h6>
                            <svg class="ut-bio-stats_graph">
                                <rect class="ut-bio-stats_graph-bar ut-bio-stats_graph-bar--great" height="100%" width-percent="86" width="86%"></rect>
                            </svg>


                            <!--svg class="ut-icon ut-icon-plus"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://www.easports.com/fifa/ultimate-team/fut/database/player/155862/Sergio%20Ramos#ut-icon-plus" class="ut-icon_symbol"></use></svg-->

                            <!--svg class="ut-icon ut-icon-minus"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://www.easports.com/fifa/ultimate-team/fut/database/player/155862/Sergio%20Ramos#ut-icon-minus" class="ut-icon_symbol"></use></svg-->
                            </h6>
                            <!--svg class="ut-bio-stats_graph">
                                        <rect class="ut-bio-stats_graph-bar ut-bio-stats_graph-bar--great" height="100%" width-percent="86" width="86%"></rect>
                                      </svg-->
                        </div>
                        <div class="ut-bio-stats_content">
                            <table class="ut-bio-stats_data">
                                <tbody>
                                    <!-- ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点1</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--great">84</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row-b">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点2</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--great">87</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row-b">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点3</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--great">87</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="ut-bio-stats ut-grid-view">
                    <div class="ut-bio-stats_item ut-grid-view_item ng-scope">
                        <div class="ut-bio-stats_header">
                            <h6 class="ut-bio-stats_title">
                                <span class="ut-bio-stats_title-type ng-binding">一级指标点</span>
                                <span class="ut-bio-stats_title-value ut-bio-stats_title-value--great">
                                    86
                                </span>
                            </h6>
                            <svg class="ut-bio-stats_graph">
                                <rect class="ut-bio-stats_graph-bar ut-bio-stats_graph-bar--great" height="100%" width-percent="86" width="86%"></rect>
                            </svg>


                            <!--svg class="ut-icon ut-icon-plus"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://www.easports.com/fifa/ultimate-team/fut/database/player/155862/Sergio%20Ramos#ut-icon-plus" class="ut-icon_symbol"></use></svg-->

                            <!--svg class="ut-icon ut-icon-minus"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://www.easports.com/fifa/ultimate-team/fut/database/player/155862/Sergio%20Ramos#ut-icon-minus" class="ut-icon_symbol"></use></svg-->
                            </h6>
                            <!--svg class="ut-bio-stats_graph">
                                            <rect class="ut-bio-stats_graph-bar ut-bio-stats_graph-bar--great" height="100%" width-percent="86" width="86%"></rect>
                                          </svg-->
                        </div>
                        <div class="ut-bio-stats_content">
                            <table class="ut-bio-stats_data">
                                <tbody>
                                    <!-- ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点1</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--great">84</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row-b">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点2</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--great">87</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row-b">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点3</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--great">87</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="ut-bio-stats ut-grid-view">
                    <div class="ut-bio-stats_item ut-grid-view_item ng-scope">
                        <div class="ut-bio-stats_header">
                            <h6 class="ut-bio-stats_title">
                                <span class="ut-bio-stats_title-type ng-binding">一级指标点</span>
                                <span class="ut-bio-stats_title-value ut-bio-stats_title-value--great">
                                    86
                                </span>
                            </h6>
                            <svg class="ut-bio-stats_graph">
                                <rect class="ut-bio-stats_graph-bar ut-bio-stats_graph-bar--great" height="100%" width-percent="86" width="86%"></rect>
                            </svg>


                            <!--svg class="ut-icon ut-icon-plus"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://www.easports.com/fifa/ultimate-team/fut/database/player/155862/Sergio%20Ramos#ut-icon-plus" class="ut-icon_symbol"></use></svg-->

                            <!--svg class="ut-icon ut-icon-minus"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://www.easports.com/fifa/ultimate-team/fut/database/player/155862/Sergio%20Ramos#ut-icon-minus" class="ut-icon_symbol"></use></svg-->
                            </h6>
                            <!--svg class="ut-bio-stats_graph">
                                                <rect class="ut-bio-stats_graph-bar ut-bio-stats_graph-bar--great" height="100%" width-percent="86" width="86%"></rect>
                                              </svg-->
                        </div>
                        <div class="ut-bio-stats_content">
                            <table class="ut-bio-stats_data">
                                <tbody>
                                    <!-- ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点1</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--great">84</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row-b">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点2</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--good">74</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row-b">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点3</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--great">87</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="ut-bio-stats ut-grid-view">
                    <div class="ut-bio-stats_item ut-grid-view_item ng-scope">
                        <div class="ut-bio-stats_header">
                            <h6 class="ut-bio-stats_title">
                                <span class="ut-bio-stats_title-type ng-binding">一级指标点</span>
                                <span class="ut-bio-stats_title-value ut-bio-stats_title-value--good">
                                    76
                                </span>
                            </h6>
                            <svg class="ut-bio-stats_graph">
                                <rect class="ut-bio-stats_graph-bar ut-bio-stats_graph-bar--good" height="100%" width-percent="76" width="76%"></rect>
                            </svg>


                            <!--svg class="ut-icon ut-icon-plus"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://www.easports.com/fifa/ultimate-team/fut/database/player/155862/Sergio%20Ramos#ut-icon-plus" class="ut-icon_symbol"></use></svg-->

                            <!--svg class="ut-icon ut-icon-minus"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="https://www.easports.com/fifa/ultimate-team/fut/database/player/155862/Sergio%20Ramos#ut-icon-minus" class="ut-icon_symbol"></use></svg-->
                            </h6>
                            <!--svg class="ut-bio-stats_graph">
                                                    <rect class="ut-bio-stats_graph-bar ut-bio-stats_graph-bar--great" height="100%" width-percent="86" width="86%"></rect>
                                                  </svg-->
                        </div>
                        <div class="ut-bio-stats_content">
                            <table class="ut-bio-stats_data">
                                <tbody>
                                    <!-- ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点1</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--great">84</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row-b">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点2</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--good">70</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                    <tr class="ut-bio-stats_data-row-b">
                                        <th class="ut-bio-stats_data-type ng-binding">二级指标点3</th>
                                        <td class="ut-bio-stats_data-value ut-bio-stats_data-value--average">50</td>
                                    </tr>
                                    <!-- end ngRepeat: info in section.stats -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row radar-row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <canvas id="canvas-radar" style="height:500px;"></canvas>
            </div>
        </div>

        <div class="row strength-row">
            <div class="character-card singular">
                <div class="two-cols">
                    <div class="strengths home">
                        <h3>
                            <span style="color: #35AB53;">+</span> Strength</h3>
                        <table class="grid">

                            <tbody>
                                <tr>
                                    <td>
                                        <div title="Player ability in not 'giving the ball away' (calculated by dispossessions, turnovers and inaccurate passes)"
                                            class="iconize iconize-icon-left">
                                            <span title="Offensive" class="incidents-icon ui-icon attrOffensive"></span>
                                            科研能力
                                        </div>
                                    </td>
                                    <td style="text-align: right;">
                                        <span class="level55">Very Strong</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div title="Passing accuracy (calculated by accurate and inaccurate passes)" class="iconize iconize-icon-left">
                                            <span title="Offensive" class="incidents-icon ui-icon attrOffensive"></span>
                                            理论知识
                                        </div>
                                    </td>
                                    <td style="text-align: right;">
                                        <span class="level55">Very Strong</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div title="Headers won against opposition player (calculated by aerial duels)" class="iconize iconize-icon-left">
                                            <span title="Offensive" class="incidents-icon ui-icon attrOffensive"></span>
                                            可持续意识
                                        </div>
                                    </td>
                                    <td style="text-align: right;">
                                        <span class="level45">Strong</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div title="Dribbling success (calculated by dribbles won and lost)" class="iconize iconize-icon-left">
                                            <span title="Offensive" class="incidents-icon ui-icon attrOffensive"></span>
                                            写作能力
                                        </div>
                                    </td>
                                    <td style="text-align: right;">
                                        <span class="level45">Strong</span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <div class="weaknesses away">
                        <h3>
                            <span style="color: #CA2027;">-</span> Weaknesses</h3>
                        <table class="grid">

                            <tbody>
                                <tr>
                                    <td>
                                        <div title="Crossing accuracy (calculated by crosses)" class="iconize iconize-icon-left">
                                            <span title="Offensive" class="incidents-icon ui-icon attrOffensive"></span>动手能力
                                        </div>
                                    </td>
                                    <td style="text-align: right;">
                                        <span class="level15">Very Weak</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <div title="Frequency of getting booked (calculated by cards shown)" class="iconize iconize-icon-left">
                                            <span title="Defensive" class="incidents-icon ui-icon attrDefensive"></span>发现能力
                                        </div>
                                    </td>
                                    <td style="text-align: right;">
                                        <span class="level25">Weak</span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clear"></div>
                <hr>
                <div class="style">

                    <h3>学习风格</h3>
                    <ul>

                        <li title="Player is a potential threat in scoring from corners, crossed free kicks and long throw-ins" class="iconize iconize-icon-left">
                            <span title="Offensive" class="incidents-icon ui-icon attrOffensive"></span>
                            钻研性
                        </li>

                    </ul>

                    <div class="clear"></div>

                </div>
                <div class="clear"></div>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
                                    <?php if(is_array($cd['first_p2']['ps'])): foreach($cd['first_p2']['ps'] as $key=>$p): if($p == 1): ?><td class="td-disabled"></td>
                                            <?php else: ?>
                                            <td class="td-default"></td><?php endif; endforeach; endif; ?>
                                </tr>
                                <?php if(is_array($cd['p2'])): foreach($cd['p2'] as $key=>$pp): ?><tr class="e">
                                        <td class="td-time"><?php echo ($pp["pname"]); ?></td>
                                        <?php if(is_array($pp['ps'])): foreach($pp['ps'] as $key=>$ps): if($ps == 1): ?><td class="td-disabled"></td>
                                                <?php else: ?>
                                                <td class="td-default"></td><?php endif; endforeach; endif; ?>
                                    </tr><?php endforeach; endif; endforeach; endif; ?>
                        </tbody>
                    </table>
                </div>
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

    <script src="__PUBLIC__/js/charts.js"></script>
    <script>
        $(document).ready(function () {
            $("#statistics-options table tbody tr td.selected, #statistics-options table tbody tr td").hover(function () {
                $(this).children().each(function () {
                    if ($(this).css("display") == "block") {
                        $(this).css("display", "none");
                    }
                    else {
                        $(this).css("display", "block");
                    }
                })
            });
            $("#statistics-options table tbody tr td").click(function () {

                $("#statistics-options table tbody tr td").each(function () {
                    $(this).removeClass("selected");
                })
                $(this).addClass("selected");
                var id = $(this).attr("id")
                var id_num =  id.split("-")[1]

                $(".stat-graph").each(function(){
                    $(this).css("display","none")
                })
                console.log("#stat-graph-"+id_num)
                $("#stat-graph-"+id_num).css("display","block");
                //window.myLine_2 = new Chart(document.getElementById('canvas-2').getContext('2d'), config_2);

                                
            });



        })


        function initChart() {
            var config = {
                type: 'line',
                data: {
                    labels: ['2013-2014', '2014-2015', '2015-2016', '2016-2017', '2017-2018'],
                    datasets: [{
                        label: 'My First dataset',
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: [
                            1, 2, 3, 4, 5, 6, 7
                        ],
                        fill: false,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: '学年课程数一览'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }
            };

            var color = Chart.helpers.color;
            var config2 = {
                type: 'radar',
                data: {
                    labels: [['一级指标点', '1'], ['一级指标点', '2'], ['一级指标点', '3'], ['一级指标点', '4'], ['一级指标点', '5'], ['一级指标点', '6']],
                    datasets: [{
                        label: "能力",
                        backgroundColor: color(window.chartColors.red).alpha(0.2).rgbString(),
                        borderColor: window.chartColors.red,
                        pointBackgroundColor: window.chartColors.red,
                        data: [
                            50, 60, 70, 80, 90, 100,
                        ]
                    }]
                },
                options: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'N维能力图'
                    },
                    scale: {
                        ticks: {
                            beginAtZero: true
                        }
                    }
                }
            };

            var config_1 = {
                type: 'line',
                data: {
                    labels: ['2013-2014', '2014-2015', '2015-2016', '2016-2017', '2017-2018'],
                    datasets: [{
                        label: '课程数',
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: [
                            1, 2, 3, 4, 5, 6, 7
                        ],
                        fill: false,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: '学年课程数一览'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }
            };

            var config_2 = {
                type: 'line',
                data: {
                    labels: ['2013-2014', '2014-2015', '2015-2016', '2016-2017', '2017-2018'],
                    datasets: [{
                        label: '学分数',
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: [
                            4,8,15,16,24
                        ],
                        fill: false,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: '学年学分数一览'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }
            };

            var config_3 = {
                type: 'line',
                data: {
                    labels: ['2013-2014', '2014-2015', '2015-2016', '2016-2017', '2017-2018'],
                    datasets: [{
                        label: '文件数',
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: [
                            1,3,3,4
                        ],
                        fill: false,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: '学年文件数一览'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }
            };

            var config_4 = {
                type: 'line',
                data: {
                    labels: ['2013-2014', '2014-2015', '2015-2016', '2016-2017', '2017-2018'],
                    datasets: [{
                        label: '课程平均分',
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: [
                            0,89,86,90,94,93,90,95
                        ],
                        fill: false,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: '课程平均分变化图'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }
            };

            var config_5 = {
                type: 'line',
                data: {
                    labels: ['2013-2014', '2014-2015', '2015-2016', '2016-2017', '2017-2018'],
                    datasets: [{
                        label: '准时率',
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: [
                            0,100,100,100,95
                        ],
                        fill: false,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: '作业提交准时率变化图'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }
            };

            var config_6 = {
                type: 'line',
                data: {
                    labels: ['2013-2014', '2014-2015', '2015-2016', '2016-2017', '2017-2018'],
                    datasets: [{
                        label: '课程达成度',
                        backgroundColor: window.chartColors.red,
                        borderColor: window.chartColors.red,
                        data: [
                            0,15,20,24,30
                        ],
                        fill: false,
                    }]
                },
                options: {
                    responsive: true,
                    title: {
                        display: true,
                        text: '课程达成度变化图'
                    },
                    tooltips: {
                        mode: 'index',
                        intersect: false,
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    },
                    scales: {
                        xAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Month'
                            }
                        }],
                        yAxes: [{
                            display: true,
                            scaleLabel: {
                                display: true,
                                labelString: 'Value'
                            }
                        }]
                    }
                }
            };

            var config_9 = {
			type: 'pie',
			data: {
				datasets: [{
					data: [
						30,20,20,20,10
					],
					backgroundColor: [
						window.chartColors.red,
						window.chartColors.orange,
						window.chartColors.yellow,
						window.chartColors.green,
						window.chartColors.blue,
					],
					label: 'Dataset 1'
				}],
				labels: [
					'理论型',
					'实践型',
					'创新型',
					'科研型',
					'xxx'
				]
			},
			options: {
				responsive: true
			}
		};

        var config_8 = {
				type: 'bar',
				data: {
			labels: ['理论知识',
					'实践能力',
					'创新能力',
					'ooo',
					'xxx'],
			datasets: [{
				label: '得分',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
					90,70,80,20,95
				]
			}]

		},
				options: {
					responsive: true,
					legend: {
						position: 'top',
					},
					title: {
						display: true,
						text: '能力得分'
					}
				}
			}

            window.onload = function () {
                /*var ctx = document.getElementById('canvas').getContext('2d');
                window.myLine = new Chart(ctx, config);*/
                window.myLine_1 = new Chart(document.getElementById('canvas-1').getContext('2d'), config_1);
                window.myLine_2 = new Chart(document.getElementById('canvas-2').getContext('2d'), config_2);
                window.myLine_3 = new Chart(document.getElementById('canvas-3').getContext('2d'), config_3);
                window.myLine_4 = new Chart(document.getElementById('canvas-4').getContext('2d'), config_4);
                window.myLine_5 = new Chart(document.getElementById('canvas-5').getContext('2d'), config_5);
                window.myLine_6 = new Chart(document.getElementById('canvas-6').getContext('2d'), config_6);
                window.myLine_7 = new Chart(document.getElementById('canvas-7').getContext('2d'), config_8);
                window.myLine_8 = new Chart(document.getElementById('canvas-8').getContext('2d'), config_8);
                window.myLine_9 = new Chart(document.getElementById('canvas-9').getContext('2d'), config_9);

                window.myRadar = new Chart(document.getElementById('canvas-radar'), config2);
                
            };



            var colorNames = Object.keys(window.chartColors);
        }

        initChart();
    //initRadar();
    </script>

</body>

</html>