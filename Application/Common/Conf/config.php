<?php
return array(
	    	'DB_TYPE'   => 'mysql',
		'DB_HOST'   => 'paojiaokejiweb.gotoftp1.com',
		'DB_NAME'   => 'paojiaokejiweb',
		'DB_USER'   => 'paojiaokejiweb',
		'DB_PWD'    => 's2skrd6f',
		'DB_PORT'   => 3306,
		'DB_PREFIX' => 'nan_',
		/* 'DB_TYPE'   => 'mysql',
		'DB_HOST'   => 'localhost',
		'DB_NAME'   => 'nan_robot',
		'DB_USER'   => 'root',
		'DB_PWD'    => '111111',
		'DB_PORT'   => 3306,
		'DB_PREFIX' => 'nan_', */
		
        		'SHOW_PAGE_TRACE'=>true,
		'TMPL_L_DELIM'=>'<{',
		'TMPL_R_DELIM'=>'}>',


		'RBAC_SUPERADMIN' =>'haonanpaojiao',  //超级管理员名称
		'ADMIN_AUTH_KEY'    => 'superadmin',  //超级管理员标识
		'USER_AUTH_ON'        => true,         //是否开启权限验证
		'USER_AUTH_TYPE'    =>1,               //验证类型1：登陆验证 2：实时验证
		'USER_AUTH_KEY'      => 'uid',          //用户认证识别号
		'NOT_AUTH_MODULE'  => '',              //无需验证的模块
		'NOT_AUTH_ACTION'    =>  'serial_cat_post,serial_post,qq_post,sys_post,article_post,art_cat_post,one_post,one_cat_post,ad_post,ad_cat_post,link_post,link_cat_post,goods_post,goods_cat_post',             //无需验证的方法
		'RBAC_ROLE_TABLE'    => 'nan_role',   //角色表名称

		'RBAC_USER_TABLE'    => 'nan_role_user',  //角色与用户的中间表名称
		'RBAC_ACCESS_TABLE'  => 'nan_access',    //权限表名称
		'RBAC_NODE_TABLE'     => 'nan_node',         //节点表名称


);