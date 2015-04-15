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
var onsave = function(){
	
	var site_name         = $('input[name="site_name"]').val();
	var site_short        = $('input[name="site_short"]').val();
	var site_keywords     = $('input[name="site_keywords"]').val();
	var site_description  = $('textarea[name="site_description"]').val();
	var site_url          = $('input[name="site_url"]').val();
	var site_email        = $('input[name="site_email"]').val();
	var site_copyright    = $('input[name="site_copyright"]').val();


	var obj     = this;
	var url     = '/admin.php/System/sys_post';
	var data    = 'site_name='+site_name+'&site_short='+site_short+'&site_keywords='+site_keywords+'&site_description='+site_description+'&site_url='+site_url+'&site_email='+site_email+'&site_copyright='+site_copyright;

	$.post(url,data,function(data){
		//alert(data);
		switch(parseInt(data)){			
			case 1:
				layer.msg('站点更新成功',2,{type:1,shade:false,rate:'left'});
				layer.close(the_top);
				loadlist();
				break;
			case 2:
				layer.msg('站点更新失败',2,{type:2,shade:false,rate:'left'});
				break;
			case 3:
				layer.msg('站点更新成功',2,{type:1,shade:false,rate:'left'});
				break;
			case 4:
				layer.msg('站点更新失败',2,{type:2,shade:false,rate:'left'});
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
                	<a class="button button-small bg-main icon-exclamation-circle" href="#">站点信息</a>
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
                    <label for="sitename">站点标题</label>
                </div>
                <div class="field">
                    <input class="input" name="site_name" size="60" value="<?php echo ($list["site_name"]); ?>" datatype="*" type="text">
                    <div class="input-note">网站标题栏处显示</div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">站点副标题</label>
                </div>
                <div class="field">
                    <input class="input"  name="site_short" size="60" value="<?php echo ($list["site_short"]); ?>" type="text">
                    <div class="input-note">站点标题后面显示的副标题</div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">站点关键词</label>
                </div>
                <div class="field">
                    <input class="input"  name="site_keywords" size="60" value="<?php echo ($list["site_keywords"]); ?>" type="text">
                    <div class="input-note">搜索引擎所收录的关键词</div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">站点描述</label>
                </div>
                <div class="field">
                    <textarea class="input" name="site_description" rows="3" cols="62"><?php echo ($list["site_description"]); ?></textarea>
                    <div class="input-note">当前网站的描述信息</div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">站点网址</label>
                </div>
                <div class="field">
                    <input class="input" name="site_url" size="60" type="text" value="<?php echo ($list["site_url"]); ?>">
                    <div class="input-note">当前网站的域名，开启手机版后做PC跳转</div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">站长邮箱</label>
                </div>
                <div class="field">
                    <input class="input" name="site_email" size="60" value="<?php echo ($list["site_email"]); ?>" type="text">
                    <div class="input-note">站长邮箱方便联系</div>
                </div>
            </div>
            <div class="form-group">
                <div class="label">
                    <label for="sitename">站点版权</label>
                </div>
                <div class="field">
                    <input class="input" name="site_copyright" size="60" value="<?php echo ($list["site_copyright"]); ?>" type="text">
                    <div class="input-note">版权信息或备案号</div>
                </div>
            </div>
            <div class="form-group" style="display:none;">
                <div class="label">
                    <label for="sitename">站点统计</label>
                </div>
                <div class="field">
                    <textarea class="input" id="site_statistics" name="site_statistics" rows="3" cols="62"></textarea>
                    <div class="input-note">用于统计代码调用</div>
                </div>
            </div>
        </div>
        <div class="panel-foot">
            <div class="form-button">
                <div id="tips"></div>
                <button class="button bg-main" onclick="onsave();">保存</button>
                <!-- <button class="button bg" type="reset">重置</button> -->
            </div>
        </div>
    </div>
    </div>
   <!--  <form method="post" class="form-x dux-form form-auto" id="form" action="/admin.php/System/sys_post">
</form> -->
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