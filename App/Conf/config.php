<?php
return array(
	//'配置项'=>'配置值'

	//开启应用分组
	'APP_GROUP_LIST' => 'Index',
	'DEFAULT_GROUP' => 'Index',
	//配置数据库
	'DB_TYPE'   => 'mysql',
	'DB_HOST' => '127.0.0.1',
	'DB_USER' => 'root',
	'DB_PWD' => '',
	'DB_NAME' => 'shop',
	'DB_PORT' => '3306',
	'DB_PREFIX' => '',

	//数据字段验证
	'DB_FIELDTYPE_CHECK' => true,

	/*点语法默认解析
	'TMPL_VAR_IDENTIFY' => 'array',*/

	'TMPL_FILE_DEPR' => '_',

	//调试工具
	//'SHOW_PAGE_TRACE' => true,

	//url模式：0：普通模式（默认） 1：pathinfo模式 2：rewrite模式 3：兼容模式
	'URL_MODEL' => 1,

	//变量过滤
	'VAR_FILTERS'=>'htmlspecialchars',

	//URL伪静态
	'URL_HTML_SUFFIX'=>'html',

	//URL不区分大小写
	'URL_CASE_INSENSITIVE' =>true,

	'FTP0' => array(
		'FTP_SERVER' => '202.112.113.60', //ftp服务器
		'FTP_USER' => 'obe60', //ftp用户名
		'FTP_PASS' => '!RUC@INFO)obe',//ftp密码
		'FTP_PORT' => 21,//ftp端口
		'FTP_PASV' => true,//ftp是否开启被动模式
		'FTP_SSL' => false,//ftp是否使用SSL
		'FTP_TIMEOUT' => 60,//ftp超时时间
		'FTP_OS' => 0,//ftp服务器操作系统 //操作系统类型 0-linux 1-macos 2-windows
	),

	'FTP1' => array(
		 'FTP_SERVER' => '202.112.113.61', //ftp服务器
		 'FTP_USER' => 'obe61', //ftp用户名
		 'FTP_PASS' => '!RUC@INFO!obe',//ftp密码
		 'FTP_PORT' => 21,//ftp端口
		 'FTP_PASV' => true,//ftp是否开启被动模式
		 'FTP_SSL' => false,//ftp是否使用SSL
		 'FTP_TIMEOUT' => 60,//ftp超时时间
		 'FTP_OS' => 0,//ftp服务器操作系统 //操作系统类型 0-linux 1-macos 2-windows
	 ),
	//邮件配置
 	'THINK_EMAIL' => array(
		'SMTP_HOST'   => 'smtp.163.com', //SMTP服务器
		'SMTP_PORT'   => '25', //SMTP服务器端口
		'SMTP_USER'   => 'unicourse@163.com', //SMTP服务器用户名
		'SMTP_PASS'   => 'uni20130922', //SMTP服务器密码
		'FROM_EMAIL'  => 'unicourse@163.com', //发件人EMAIL
		'FROM_NAME'   => 'UniCourse 管理员', //发件人名称
		'REPLY_EMAIL' => '', //回复EMAIL（留空则为发件人EMAIL）
		'REPLY_NAME'  => '', //回复名称（留空则为发件人名称）
 	),

 	'LOG_RECORD' => true, // 开启日志记录
 	'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR,WARN,DEBUG,SQL',
);
?>
