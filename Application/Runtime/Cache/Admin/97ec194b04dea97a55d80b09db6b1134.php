<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="zh-cn">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="renderer" content="webkit">
	<title>机器脑 - 网站后台管理</title>
	<link rel="stylesheet" href="/Public/Css/pintuer.css">
	<link rel="stylesheet" href="/Public/Css/admin.css">
	<script src="/Public/Js/jquery.js"></script>
	<script src="/Public/Js/respond.js"></script>
	<script src="/Public/Js/layer/layer.min.js"></script>
	<script src="/Public/Js/jquery.tips.js"></script>
	<script src="/Public/Js/et.js"></script>
	<script src="/Public/Js/my.js"></script>
</head>
<script type="text/template" id="theTemplate">
<#macro userlist data>
<table id="table" class="table table-condensed">
  <thead>
    <tr>
	<th width="120">编号</th>
  	<th width="*">分类名称</th>
  	<th width="120">操作</th>
    </tr>
  </thead>
  <tbody>
<#if (data.list==null)>
		<tr>
			<td colspan="3"><div class="alert alert-red"><strong>暂无数据</strong></div></td>
		</tr>
<#else>
      <#list data.list as list>
        <tr >
          <td>${list.code}</td>
          <td class="bold">${list.title}</td>
          <td>
            <a onclick="onmol(this,1);" data-code="${list.code}" data-title="${list.title}" data-pid="${list.pid}" href="javascript:void(0);" class="button button-little bg-blue icon-pencil"></a>
  		<a onclick="ondel(this);" data-code="${list.code}" href="javascript:void(0);" class="button button-little bg-red icon-trash-o" ></a>
          </td>
        </tr>
      </#list>
</#if>
  </tbody>
</table>
</#macro>
</script>

<script>
var the_top;
var loadlist = function(){	
	$(function(){
		var url = "/admin.php/Cmsmanager/link_cat/do/load"
		$.get(url,function(data){
			ETlist(data['list'],'#nan-list','#theTemplate');
		})
	})
} 

var onmol = function(obj,key){
	var code      = $(obj).attr('data-code');
	var title   = $(obj).attr('data-title');
	var gid      = $(obj).attr('data-code');
	
	$('.mol').find('input[name="code"]').val(code);
	if(key==1){
		$('.mol').find('input[name="code"]').attr('disabled',true);
	}else{
		$('.mol').find('input[name="code"]').attr('disabled',false);
	} 
	
	$('.mol').find('input[name="title"]').val(title);
	$('.mol').find('input[name="gid"]').val(gid);

	the_top = $.layer({
	    type: 1,
	    title: '分类编辑',
	    maxmin: true,
	    area: ['600px', '400px'],
	    page: {dom: '.mol'},
	    shift: 'left',	    
	}); 
}
var closemol = function(){
	layer.close(the_top);
}
//删除弹出
var ondel = function(obj){
	var code    = $(obj).attr('data-code');
	//alert(code);
	$.layer({
	    shade: [0],
	    area: ['auto','auto'],
	    dialog: {
	        msg: '确定要删除吗？',
	        btns: 2,                    
	        type: 4,
	        btn: ['确定','取消'],
	        yes: function(){
	        		var url = "/admin.php/Cmsmanager/link_cat_del/do/del/code/"+code;
	        		
        			$.get(url,function(data){
        				//alert(data);
        				switch(parseInt(data)){        				
	        				case 1:
	        					layer.msg('分类删除成功',2,{type:1,shade:false,rate:'left'});
	        					loadlist();
	        					break;
	        				case 2:
	        					layer.msg('分类删除失败',2,{type:2,shade:false,rate:'left'});
	        					break;
	        				default:
	        					layer.msg('操作有误',2,{type:3,shade:false,rate:'left'});
	        					break;	
        				}
		        	})	        	
	        }
	    }
	});
}

$(function(){
	$('#thesubmit').bind('click',function(){

		var code    = $('input[name="code"]').val();
		var title   = $('input[name="title"]').val();
		var gid     = $('input[name="gid"]').val();

		var obj     = this;
		var url     = '/admin.php/Cmsmanager/link_cat_post';
		var data    = 'code='+code+'&title='+title+'&gid='+gid;

		$.post(url,data,function(data){
			//alert(data);
			switch(parseInt(data)){			
				case 1:
					layer.msg('分类更新成功',2,{type:1,shade:false,rate:'left'});
					layer.close(the_top);
					loadlist();
					break;
				case 2:
					layer.msg('分类更新失败',2,{type:2,shade:false,rate:'left'});
					break;
				case 3:
					layer.msg('分类更新成功',2,{type:1,shade:false,rate:'left'});
					layer.close(the_top);
					loadlist();
					break;
				case 4:
					layer.msg('分类更新失败',2,{type:2,shade:false,rate:'left'});
					break;
				case 5:
					layer.msg('分类选择有误',2,{type:3,shade:false,rate:'left'});
					break;
				default:
					layer.msg('操作有误',2,{type:3,shade:false,rate:'left'});
					break;	
			}
		})
	})
})

loadlist();
</script>


<body style="background-color:#EFF3F6;">
<div class=" nbsp_40 bg-main">
	<div class="bread-head nan-head">
	链接分类
		<span class="small">链接分类添加</span>
	</div>
	<div class="nan-head-right">
		<button onclick="onmol(this,2);" class="button button-small bg-dot icon-plus">添加分类</button>
	</div>
</div>
<div id="nan-list"></div>

<div class='mol' style='display:none;'>

		<div class="line-big moform">
		 <div class="nan-leb">标识：</div> 
		 <div>
		 	<input class="input nan-input-3" type="text" name="code" >
		 </div> 
		</div>
		<div class="line-big moform">
		 <div class="nan-leb">分类名称：</div> 
		 <div><input class="input nan-input-3" type="text" name="title"></div> 
		</div>

		<div class="line-big moform nan-but">
		 <div><input class="button border-green nan-input-1" type="submit" value='提交' id="thesubmit"></div>&nbsp;&nbsp;&nbsp;&nbsp;
		 <div><button class="button border-red nan-input-1" onclick="closemol()">关闭</button></div> 
		 <div><input type="hidden" name="gid" value=""></div> 
		</div>

</div>

		
</body>
</html>