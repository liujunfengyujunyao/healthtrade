<?php 
return array(

	/* 数据库设置 */
    'DB_TYPE'               =>  'Mysql',     // 数据库类型
    'DB_HOST'               =>  'pipiyaode.mysql.rds.aliyuncs.com', // 服务器地址
    'DB_NAME'               =>  'healthtrade',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'Apple116165',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'he_',    // 数据库表前缀

	//'配置项'=>'配置值'

	//'配置项'=>'配置值'
	//配置url访问模式
   // 0 (普通模式); 1 (PATHINFO 模式); 2 (REWRITE  模式); 3 (兼容模式)  默认为PATHINFO 模式 //
	'URL_MODEL' =>  1,
	//开启页面 trace功能  代码追踪
	'SHOW_PAGE_TRACE' => true,

    //自动加载自定义配置文件

    //自动加载 自定义 函数文件
    // 'LOAD_EXT_FILE' => '',
);
