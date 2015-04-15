<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="zh-cn">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="renderer" content="webkit">
	<meta author="robotnor" content="zhn" />
	<title>机器脑 - 网站后台管理</title>
	<link rel="stylesheet" href="/Public/Css/pintuer.min.css">
	<link rel="stylesheet" href="/Public/Css/admin.css">
	<script src="/Public/Js/jquery.js"></script>
	<script src="/Public/Js/respond.min.js"></script>
	<script src="/Public/Js/layer/layer.min.js"></script>
	<script src="/Public/Js/jquery.tips.min.js"></script>
	<script src="/Public/Js/et.min.js"></script>
	<script src="/Public/Js/my.js"></script>
</head>

<script src="/Public/Js/Chart.min.js"></script>
<script>
$(function(){
	var url = '/admin.php/Index/time_tray'; 	
	$.get(url,function(data){	
		imgChart('#myChart',data['date'],data['data']);
	})
})


</script>

<script type="text/javascript">

/*跳转*/
function derect(url,time){
	setTimeout(function(){
		location.href = url;	
	},time);
}
function mes(info,obj,color){
	layer.tips(info, obj, {
		    style: ['background-color:#'+color+'; color:#fff', '#'+color],
		    maxWidth:185,
		    time: 1,
		    closeBtn:[0, false],

		});
}
var logout = function (obj){
	var url = '/admin.php/Login/do_logout';
	$.get(url,function(data){
		if(parseInt(data)==1){
			mes("退出成功",obj,'78BA32');
			derect("/admin.php/Login/login",1000);
		}else{
			mes("退出故障",obj,'C10005');
		}
		
	})
}
</script>
<body>
 <div class="dux-head clearfix">
        <div class="dux-logo">
            <a href="#" target="_blank">
                <img src="/Public/Images/logo.gif" style="margin-top:-3px;" alt="后台管理系统">
            </a>
            <button class="button icon-navicon admin-nav-btn" data-target=".admin-nav"></button>
            <button class="button icon-navicon icon-ellipsis-v admin-menu-btn" data-target=".admin-menu"></button>
        </div>
        <div class="dux-nav">
            <ul class="nav  nav-navicon nav-inline admin-nav">
                 <li class="active">
                 	<a href="/admin.php/" class="icon-home"> 首页</a>
                 </li>
                 <li >
                 	<a href="/admin.php/Funclist/index" class="icon-wrench"> 功能</a>
                 </li>
                 <li >
                 	<a href="/admin.php/Cmsmanager/index" class="icon-bars"> 内容</a>
                 </li>

                 <li>
                 	<a href="/admin.php/Alldata/index" class="
icon-bar-chart-o"> 数据</a>
                 </li>
                 <li >
                 	<a href="/admin.php/User/index" class="icon-file-text-o"> 用户</a>
                 </li>
                 
                 <li>
                 	<a href="/admin.php/System/index"class="icon-gear (alias)"> 系统</a>
                 </li>          
             </ul>
            <ul class="nav  nav-navicon nav-menu nav-inline admin-nav nav-tool">
               <li> <a href="/" class="icon-home"></a></li>
               <li style="display:none;"> <a href="#" class="icon-user"></a></li>
               <li> <a href="javascript:void(0)" onclick="logout(this)" class="dux-logout bg-red icon-power-off"></a></li>
            </ul>
        </div>
    </div>
   


   <div class="dux-sidebar">
        <ul class="nav  nav-navicon admin-menu">
            <div class="nav-head">首页</div>
            <li class="active">
            	<a href="#" class="icon-home"> 管理首页</a></li>
            	<div style="display:none;">
            <li>
                <a href="#" class="icon-tachometer"> 站点统计</a></li>
            <li>
                <a href="#" class="icon-shield"> 安全中心</a></li>
            <li>
                <a href="#" class="icon-bug"> 系统更新</a></li>
                </div>
       </ul>
    </div>
    <div class="dux-bread">
        <ul class="bread">
            <li><a href="#" class="icon-home"> 开始</a></li>
            <li><a href="#">首页</a></li>
        </ul>
    </div>
    
    <div class="dux-admin">
        <div class="dux-tools">
            <div class="bread-head">管理首页<span class="small">站点运行信息</span></div>
        </div>
        <br>
<div class="line-big">
    <div class="xm12">
        <div class="alert alert-yellow"><strong>提示：</strong>尊敬的admin(管理员)，欢迎您的使用，您的本次登录时间为 2015-01-14 15:44，登录IP为 127.0.0.1 </div>
    </div>
</div>
<div class="line-big">
    <div class="xm3">
        <div class="panel dux-box dux-dashboard">
            <div class="clearfix">
                <div class="media media-x ">
                    <div class="float-left">
                        <div class="txt dashboard-head radius-small bg-red  icon-dashboard"></div>
                    </div>
                    <div class="media-body text-center">
                        <h2><strong>40%</strong></h2>
                        安全检测
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div class="xm3">
        <div class="panel dux-box dux-dashboard">
            <div class="clearfix">
                <div class="media media-x ">
                    <div class="float-left">
                        <div class="txt dashboard-head radius-small bg-yellow icon-bar-chart-o"></div>
                    </div>
                    <div class="media-body text-center">
                        <h2><strong>22</strong></h2>
                        今日网站访问
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div class="xm3">
        <div class="panel dux-box dux-dashboard">
            <div class="clearfix">
                <div class="media media-x ">
                    <div class="float-left">
                        <div class="txt dashboard-head radius-small bg-blue icon-paw"></div>
                    </div>
                    <div class="media-body text-center">
                        <h2><strong>0</strong></h2>
                        今日蜘蛛访问
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>
    <div class="xm3">
        <div class="panel dux-box dux-dashboard">
            <div class="clearfix">
                <div class="media media-x ">
                    <div class="float-left">
                        <div class="txt dashboard-head radius-small bg-green icon-puzzle-piece"></div>
                    </div>
                    <div class="media-body text-center">
                        <h2><strong>0</strong></h2>
                        碎片使用数量
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
</div>

<div class="line-big">
    <div class="xm12">
        <div class="panel dux-box">
            <div class="panel-head">网站近期访问概况</div>
            <div class="panel-body">
                <div style="height:200px;">
				<canvas id="myChart" width="1150" height="200"></canvas>
                    <!--<canvas width="1648" height="200" style="width: 1648px; height: 200px;" id="chart"></canvas>-->
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<div class="line-big">
    <div class="xm6">
        <div class="panel dux-box">
            <div class="panel-head"><strong>系统信息</strong>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td align="right" width="100">访问地址：</td>
                            <td><a href="/admin.php/Index/index" target="_blank">/admin.php/Index/index</a>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">IP：</td>
                            <td><?php echo ($data["ip"]); ?>:<?php echo ($data["port"]); ?></td>
                        </tr>
                        <tr>
                            <td align="right">服务器：</td>
                            <td><?php echo ($data["server"]); ?></td>

                        </tr>
                        <tr>
                            <td align="right">服务器版本：</td>
                            <td><?php echo ($data["server_ver"]); ?></td>
                        </tr>
                        <tr>
                            <td align="right">语言：</td>
                            <td><?php echo ($data["lang"]); ?></td>
                        </tr>
                      
                        <tr>
                            <td align="right">语言版本：</td>
                            <td><?php echo ($data["lang_ver"]); ?></td>
                        </tr>
                        <tr>
                            <td align="right">服务器日期：</td>
                            <td><?php echo (date("Y-m-d",$data["time"])); ?></td>
                        </tr>
                        <tr>
                            <td align="right">屏蔽函数：</td>
                            <td>无</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>
    </div>
    <div class="xm6">
        <div class="panel dux-box">
            <div class="panel-head"><strong>程序信息</strong>
            </div>
            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td align="right">程序版本：</td>
                            <td>15.1.15</td>
                        </tr>
                        <tr>
                            <td align="right">最新版本：</td>
                            <td><a href="#">检查版本</a>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">商业授权：</td>
                            <td colspan="3" id="authorize"> <a id="checkAuthorize" class=" badge bg-main" href="javascript:;">查询授权</a></td>
                        </tr>
                        <tr>
                            <td align="right" width="110">程序支持：</td>
                            <td><a href="#" target="_blank">机器脑官网</a>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">开发团队：</td>
                            <td><a href="#" target="_blank">机器脑</a>
                            </td>
                        </tr>
                        <tr>
                            <td align="right">文档中心：</td>
                            <td><a href="#" target="_blank">文档中心</a></td>
                        </tr>
                        <tr>
                            <td align="right">QQ：</td>
                            <td>839899344</td>
                        </tr>
                        <tr>
                            <td align="right">其他：</td>
                            <td><a href="#">捐赠支持</a>  <a href="#">使用协议</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



<div class="dux-sidebar">
        <ul class="nav  nav-navicon admin-menu">
            <div class="nav-head">功能</div>
            <?php foreach($side as $v){?>
            <li class="<?php if($v['action']==$inck){echo 'active';}?>">
                <a href="/admin.php/<?php echo ($v["model"]); ?>/<?php echo ($v["action"]); ?>" class="icon-<?php echo ($v["icon"]); ?>"><?php echo ($v["colname"]); ?></a>
            </li>
			<?php }?>
       </ul>
    </div>

</body>
</html>