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

<script type="text/template" id="theTemplate">
<#macro userlist data>
<table id="table" class="table table-hover">
  <thead>
    <tr>
	<th width="100">编号</th>
	<th width="*">栏目名称</th>
	<th width="200">Model</th>
	<th width="200">Action</th>
	<th width="100">操作</th>
    </tr>
  </thead>
  <tbody>
      <#list data.list as list>
        <tr >
          <td>${list.id}</td>
          <td class="bold">${list.colname}</td>
          <td>${list.model}</td>
          <td>${list.action}</td>
          <td>
            <a onclick='onmol(this)' href="javascript:void(0);" data-id="${list.id}" data-seat="${list.seat}" data-colname="${list.colname}" data-model="${list.model}" data-action="${list.action}" data-sort="${list.sort}" data-icon="${list.icon}" class="button bg-blue button-small icon-pencil nan-edit" ></a>
            <a onclick='ondel(${list.id})' href="javascript:void(0);"class="button bg-red button-small icon-trash-o js-del" ></a>
          </td>
        </tr>
      </#list>
  </tbody>
</table>
</#macro>
</script>



<script>

var ajaxpage = function(obj){
	var dp = $(obj).attr('data-url');
	$(function(){
		var url      = "/admin.php/Funclist/index/do/load/p/"+dp;
		var the_load = layer.load(30);
		$.post(url,function(data,status){
			
			ETlist(data['list'],'#nan-list','#theTemplate');
			$("#pagebar").html(data['page']);
			if(status=='success'){
				layer.close(the_load);
			}
		})
	})
}


/*  var loadlist = function(){	
	$(function(){
		var url = "/admin.php/Funclist/index/do/load"
		$.get(url,function(data){
			ETlist(data);
		})
	})
} */
ajaxpage()
var onmol = function(obj){	
	var id      = $(obj).attr('data-id');
	var colname = $(obj).attr('data-colname');
	var model   = $(obj).attr('data-model');
	var action  = $(obj).attr('data-action');
	var sort    = $(obj).attr('data-sort');
	var seat    = $(obj).attr('data-seat');
	var icon    = $(obj).attr('data-icon');
	
	$('.mol').find('input[name="id"]').val(id);
	$('.mol').find('input[name="colname"]').val(colname);
	$('.mol').find('input[name="model"]').val(model);
	$('.mol').find('input[name="action"]').val(action);
	$('.mol').find('input[name="sort"]').val(sort);
	$('.mol').find('input[name="seat"]').val(seat);
	$('.mol').find('input[name="icon"]').val(icon);
	$.layer({
	    type: 1,
	    title: '栏目编辑',
	    maxmin: true,
	    area: ['600px', '400px'],
	    page: {dom: '.mol'},
	    shift: 'left',	    
	}); 
	
	
}
var ondel = function(id){
	$.layer({
	    shade: [0],
	    area: ['auto','auto'],
	    dialog: {
	        msg: '确定要删除吗？',
	        btns: 2,                    
	        type: 4,
	        btn: ['确定','取消'],
	        yes: function(){
	        		var url = "/admin.php/Funclist/col_del/do/del/id/"+id;
        			$.get(url,function(data){
		        		if(parseInt(data)==1){
		        			layer.msg('删除成功',1,{type:1,shade:false,rate:'left'});
		        			ajaxpage();
		        		}else{
		        			layer.msg('删除失败', 1, 2);
		        		}
		        	})	        	
	        }
	    }
	});
}


$(function(){
	$('#thesubmit').bind('click',function(){
		var id      = $('input[name="id"]').val();
		var colname = $('input[name="colname"]').val();
		var model   = $('input[name="model"]').val();
		var action  = $('input[name="action"]').val();
		var sort    = $('input[name="sort"]').val();
		var seat    = $('input[name="seat"]').val();
		var icon    = $('input[name="icon"]').val();
		var obj     = this;
		var url     = '/admin.php/Funclist/col_edit';
		var data    = 'seat='+seat+'&id='+id+'&colname='+colname+'&model='+model+'&action='+action+'&sort='+sort+'&icon='+icon;

		$.post(url,data,function(data){
			switch(parseInt(data)){
			
				case 1:
					$.Tips(obj,'栏目添加成功','success');
					layer.closeAll();
					ajaxpage();
					break;
				case 2:
					$.Tips(obj,'栏目添加失败','error');
					break;
				case 3:
					$.Tips(obj,'栏目修改成功','success');
					layer.closeAll();
					ajaxpage();
					break;
				case 4:
					$.Tips(obj,'栏目修改失败','error');
					break;
				default:
					$.Tips(obj,'操作有误','error');
					break;	
			}
		})
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
        hkjhk
    </div>
    <div class="dux-bread">
        <ul class="bread">
            <li><a href="#" class="icon-home"> 开始</a></li>
            <li><a href="#">栏目列表</a></li>
        </ul>
    </div>
    <div class="dux-admin">
        <div class="dux-tools">
            <div class="bread-head">栏目管理<span class="small">添加网站栏目</span></div>
            <br>
            <div class="tools-function clearfix">
                <div class="float-left">
                   <a class="button button-small bg-main icon-list" href="/admin.php/Funclist/index">栏目列表</a>
                </div>
                <div class="button-group float-right">
                    <button onclick="onmol(this)" class="button button-small bg-dot icon-plus"> 添加 </button> 
                </div>
        	</div>
    	</div>
        <br><form method="post">
    <div class="panel dux-box">
        <div class="table-responsive">
            <div id="nan-list"></div>
            
        </div>
        <div class="panel-foot table-foot clearfix"></div>
    </div>
    <div id="pagebar"></div>
</form>
</div>


	<div class='mol' style='display:none;'>

		<div class="line-big moform">
		 <div class="nan-leb">栏目标题：</div> 
		 <div><input class="input nan-input-3"  type="text" name="colname"></div> 
		</div>
		<div class="line-big moform">
		 <div class="nan-leb">Model：</div> 
		 <div><input class="input nan-input-2" type="text" name="model"></div> 
		</div>
		<div class="line-big moform">
		 <div class="nan-leb">Action：</div> 
		 <div><input class="input nan-input-2" type="text" name="action"></div> 
		</div>
		<div class="line-big moform">
		 <div class="nan-leb">排序：</div> 
		 <div><input class="input nan-input-2" type="text" name="sort"></div> 
		</div>
		<div class="line-big moform">
		 <div class="nan-leb">图标：</div> 
		 <div><input class="input nan-input-2" type="text" name="icon"></div> 
		</div>
		<div class="line-big moform nan-but">
		 <div><input class="button border-green nan-input-1" type="submit" value='提交' id="thesubmit"></div>&nbsp;&nbsp;&nbsp;&nbsp;
		 <div><input class="button border-red nan-input-1" type="reset" value='重置'></div> 
		 <div><input type="hidden" name="id" value=""></div> 
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