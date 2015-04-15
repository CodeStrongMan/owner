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
	<th width="100">角色ID</th>
	<th width="*">角色名称</th>
	<th width="200">角色描述</th>
	<th width="200">状态</th>
	<th width="200">操作</th>
    </tr>
  </thead>
  <tbody>
      <#list data.list as list>
        <tr >
          <td>${list.id}</td>
          <td class="bold">${list.name}</td>
          <td>${list.remark}</td>
          <td><#if (list.status ==1)><span style="color:#21C162;">正常</span><#else><span style="color:#DB0808;">锁定</span></#if></td>
          <td>
            <a onclick='onframe(this)' href="javascript:void(0);" data-id="${list.id}"  class="button bg-green button-small nan-edit" >分配权限</a>
            <a onclick='onmol(this)' href="javascript:void(0);" data-id="${list.id}" data-name="${list.name}" data-remark="${list.remark}" data-status="${list.status}" class="button bg-blue button-small icon-pencil nan-edit" ></a>
            <a onclick='ondel(${list.id})' href="javascript:void(0);"class="button bg-red button-small icon-trash-o js-del" ></a>
          </td>
        </tr>
      </#list>
  </tbody>
</table>
</#macro>
</script>
<script src="/Public/Js/pintuer.min.js" ></script>
<script>
var the_id;
var onmol = function(obj){	
	var id = $(obj).attr('data-id');
	var name = $(obj).attr('data-name');
	var remark = $(obj).attr('data-remark');
	var status = $(obj).attr('data-status');
	$('input[name="name"]').val(name);
	$('input[name="remark"]').val(remark);
	$('input[name="id"]').val(id);
	if(status==0){
		$('.radio').find('input[value="0"]').parents('.button').addClass('active');
		$('.radio').find('input[value="1"]').parents('.button').removeClass('active');
		
	}else{
		$('.radio').find('input[value="1"]').parents('.button').addClass('active');
		$('.radio').find('input[value="0"]').parents('.button').removeClass('active');
		
	}

	the_id = $.layer({
	    type: 1,
	    title: '栏目编辑',
	    maxmin: true,
	    area: ['600px', '400px'],
	    page: {dom: '.mol'},
	    shift: 'left',	    
	}); 	
}

//弹出框
var onframe = function(obj){
	var rid  = $(obj).attr('data-id');	
	 the_id = $.layer({
	    type: 2,
	    border: [0],
	    iframe: {
	        src: '/admin.php/User/access/rid/'+rid
	    },
	    title: false,
	    area: ['1000px','500px']
	}); 
	
}

var ajaxpage = function(obj){
	var dp = $(obj).attr('data-url');
	$(function(){
		var url      = "/admin.php/User/role/do/load/p/"+dp;
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

ajaxpage()

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
	        		var url = "/admin.php/User/delRole/do/del/id/"+id;
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
		var name      = $('input[name="name"]').val();
		var remark      = $('input[name="remark"]').val();
		var status      = $('.active').find('input[name="status"]').val();
		var id      = $('input[name="id"]').val();
		var obj     = this;
		var url     = '/admin.php/User/addRole';
		var data    = 'name='+name+'&remark='+remark+'&status='+status+'&id='+id;

		$.post(url,data,function(data){
			switch(parseInt(data)){
			
				case 1:
					layer.msg('角色添加成功',1,{type:1,shade:false,rate:'left'});
					layer.close(the_id);
					ajaxpage();	
					break;
				case 2:
					layer.msg('角色添加失败',1,{type:2,shade:false,rate:'left'});
					break;
				case 3:
					layer.msg('角色修改成功',1,{type:1,shade:false,rate:'left'});
					layer.close(the_id);
					ajaxpage();
					break;
				case 4:
					layer.msg('角色修改失败',1,{type:2,shade:false,rate:'left'});
					break;
				default:
					layer.msg('操作有误',1,{type:3,shade:false,rate:'left'});
					break;	
			}
		})
	})
})

     //模拟ax返回
        var AX = function(info){
            switch(parseInt(info)){ 
            case 1:
                layer.msg('分配权限成功',1,{type:1,shade:false,rate:'left'});
                layer.close(the_id);
                ajaxpage(); 
                break;
            case 2:
                layer.msg('分配权限失败',1,{type:2,shade:false,rate:'left'});
                layer.close(the_id);
                ajaxpage();
                break;

            default:
                layer.msg('操作有误',1,{type:3,shade:false,rate:'left'});
                break;  
        }
            
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
   


<div class="dux-bread">
        <ul class="bread">
            <li><a href="#" class="icon-home"> 开始</a></li>
            <li><a href="#">角色列表</a></li>
        </ul>
    </div>
    <div class="dux-admin">
        <div class="dux-tools">
            <div class="bread-head">角色管理<span class="small">添加角色</span></div>
            <br>
            <div class="tools-function clearfix">

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
		 <div class="nan-leb">角色名称：</div> 
		 <div><input class="input nan-input-3"  type="text" name="name"></div> 
		</div>
		<div class="line-big moform">
		 <div class="nan-leb">角色描述：</div> 
		 <div><input class="input nan-input-2" type="text" name="remark"></div> 
		</div>
		<div class="line-big moform">
		 <div class="nan-leb">是否开启：</div> 
		 <div>
		 	<div class="button-group radio">
			  <label class="button active">
			  	<input name="status" value="1" type="radio"><span class="icon icon-check text-green"></span> 开启</label>
			  <label class="button"><input name="status" value="0"  type="radio"><span class="icon icon-times"></span> 关闭</label>
			</div>
		</div> 
		</div>
		

		<div class="line-big moform nan-but">
		 <div><input class="button border-green nan-input-1" type="submit" value='提交' id="thesubmit"></div>&nbsp;&nbsp;&nbsp;&nbsp;
		 <div><input class="button border-red nan-input-1" type="reset" value='重置'></div> 
		 <div><input type="hidden" name="id" value="0"></div> 
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