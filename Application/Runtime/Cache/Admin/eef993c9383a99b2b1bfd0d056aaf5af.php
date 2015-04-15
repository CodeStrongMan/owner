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

<script>
var Refresh = function(obj){
    var url = '/admin.php/System/onqq';
    $.get(url,function(data){
        if(parseInt(data)){
                $.Tips(obj,'缓存刷新成功','success');
        }else{
                $.Tips(obj,'缓存刷新成功','error');
        }
    })
}
var onsave = function(){
	

             var serviceqq  = $('textarea[name="serviceqq"]').val();
	var skillqq  = $('textarea[name="skillqq"]').val();



	var obj     = this;
	var url     = '/admin.php/System/qq_post';
	var data    = 'serviceqq='+serviceqq+'&skillqq='+skillqq;

	$.post(url,data,function(data){
		switch(parseInt(data)){			
			case 1:
				layer.msg('qq更新成功',2,{type:1,shade:false,rate:'left'});
				break;
			case 2:
				layer.msg('qq更新失败',2,{type:2,shade:false,rate:'left'});
				break;
			case 3:
				layer.msg('qq更新成功',2,{type:1,shade:false,rate:'left'});
				break;
			case 4:
				layer.msg('qq更新失败',2,{type:2,shade:false,rate:'left'});
				break;
			default:
				layer.msg('操作有误',2,{type:3,shade:false,rate:'left'});
				break;	
		}

	})
}
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
            <div class="nav-head">栏目清单</div>
            <?php foreach($side as $v){?>
            <li class="<?php if($v['model']==$inc){echo 'active';}?>">
                <a href="/admin.php/<?php echo ($v["model"]); ?>/<?php echo ($v["action"]); ?>" class="icon-<?php echo ($v["icon"]); ?>"> <?php echo ($v["colname"]); ?></a>
                </li>
		<?php }?>
        </ul>
    </div>  
    <div class="dux-bread">
        <ul class="bread">
            <li><a href="#" class="icon-home"> 开始</a></li>
            <li><a href="#">站点信息</a></li>
       	</ul>
    </div>
    <div class="dux-admin">
        <div class="dux-tools">
            <div class="bread-head">网站设置<span class="small">设置网站整体功能</span></div>
            <br>
            <div class="tools-function clearfix">
                <div class="float-left">
                	<button class="button bg-red" onclick="Refresh(this)">刷新缓存</button>
                	<div style="display:none;">
                    <a class="button button-small bg-back icon-mobile" href="#">手机设置</a>
                    <a class="button button-small bg-back icon-eye" href="#">模板设置</a>
                    <a class="button button-small bg-back icon-dashboard" href="#">性能设置</a>
                    <a class="button button-small bg-back icon-shield" href="#">安全设置</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
<div class="form-x dux-form form-auto">
    <div class="panel dux-box  active">
        <div class="panel-head">
            <strong>站点信息</strong>
        </div>
        <div class="panel-body">
            <div class="form-group">
                <div class="label">
                    <label for="sitename">售前客服QQ</label>
                </div>
                <div class="field">
                    <textarea class="input" name="serviceqq" rows="4" cols="62"><?php echo ($theone); ?></textarea>
                    <div class="input-note">客服QQ，使用"|"分割</div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">售后技术QQ</label>
                </div>
                <div class="field">
                    <textarea class="input" name="skillqq" rows="4" cols="62"><?php echo ($thetwo); ?></textarea>
                    <div class="input-note">客服QQ，使用"|"分割</div>
                </div>
            </div>

            

        </div>
        <div class="panel-foot">
            <div class="form-button">
                <div id="tips"></div>
                <button class="button bg-main" onclick="onsave();">保存</button>

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