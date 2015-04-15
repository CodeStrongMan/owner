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
	<th width="120">户名</th>
  	<th width="*">银行卡号</th>
  	<th width="120">银行</th>
  	<th width="120">操作</th>
    </tr>
  </thead>
  <tbody>
<#if (data.list==null)>
		<tr>
			<td colspan="5"><div class="alert alert-red"><strong>暂无数据</strong></div></td>
		</tr>
<#else>
      <#list data.list as list>
        <tr >
          <td>${list.code}</td>
          <td class="bold">${list.bankusername}</td>
          <td class="bold">${list.bankuser}</td>
          <td class="bold">${list.bank}</td>
          <td>
            <a onclick="onmol(this,1);" data-code="${list.code}" data-bankusername="${list.bankusername}" data-bankuser="${list.bankuser}" data-bank="${list.bank}" href="javascript:void(0);" class="button button-little bg-blue icon-pencil"></a>
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
		var url = "/admin.php/Alldata/serial_cat/do/load"
		$.get(url,function(data){
			//alert(data);
			ETlist(data['list'],'#nan-list','#theTemplate');
		})
	})
} 

var onmol = function(obj,key){
	var code      = $(obj).attr('data-code');
	var bankusername   = $(obj).attr('data-bankusername');
	var bankuser   = $(obj).attr('data-bankuser');
	var bank   = $(obj).attr('data-bank');

	var gid      = $(obj).attr('data-code');
	
	$('.mol').find('input[name="code"]').val(code);
	if(key==1){
		$('.mol').find('input[name="code"]').attr('disabled',true);
	}else{
		$('.mol').find('input[name="code"]').attr('disabled',false);
	} 
	
	$('.mol').find('input[name="bankusername"]').val(bankusername);
	$('.mol').find('input[name="bankuser"]').val(bankuser);
	$('.mol').find("option[value='"+bank+"']").attr('selected',"selected");
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
	        		var url = "/admin.php/Alldata/serial_cat_del/do/del/code/"+code;
	        		
        			$.get(url,function(data){
        				//alert(data);
        				switch(parseInt(data)){        				
	        				case 1:
	        					layer.msg('银行卡删除成功',2,{type:1,shade:false,rate:'left'});
	        					loadlist();
	        					break;
	        				case 2:
	        					layer.msg('银行卡删除失败',2,{type:2,shade:false,rate:'left'});
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
		var bankusername   = $('input[name="bankusername"]').val();
		var bankuser     = $('input[name="bankuser"]').val();
		var bank     = $('select[name="bank"]').val();

		var obj     = this;
		var url     = '/admin.php/Alldata/serial_cat_post';
		var data    = 'code='+code+'&bankusername='+bankusername+'&bankuser='+bankuser+'&bank='+bank;

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
	银行卡
		<span class="small">银行卡添加</span>
	</div>
	<div class="nan-head-right">
		<button onclick="onmol(this,2);" class="button button-small bg-dot icon-plus">添加银行卡</button>
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
		 <div class="nan-leb">户名：</div> 
		 <div><input class="input nan-input-3" type="text" name="bankusername"></div> 
		</div>
		<div class="line-big moform">
		 <div class="nan-leb">银行卡账号：</div> 
		 <div><input class="input nan-input-3" type="text" name="bankuser"></div> 
		</div>
		<div class="line-big moform">
		 <div class="nan-leb">银行名称：</div> 
		 <div><select class="input nan-input-3" type="text" name="bank">
		 		<option value="现金">现金</option>
		 		<option value="中国银行">中国银行</option>
		 		<option value="工商银行">工商银行</option>
		 		<option value="建设银行">建设银行</option>
		 		<option value="农业银行">农业银行</option>
		 		<option value="交通银行">交通银行</option>
		 		<option value="招商银行">招商银行</option>
		 		<option value="中信银行">中信银行</option>
		 		<option value="浦发银行">浦发银行</option>
			</select>
		 </div> 
		</div>

		<div class="line-big moform nan-but">
		 <div><input class="button border-green nan-input-1" type="submit" value='提交' id="thesubmit"></div>&nbsp;&nbsp;&nbsp;&nbsp;
		 <div><button class="button border-red nan-input-1" onclick="closemol()">关闭</button></div> 
		<div><input type="hidden" name="gid" value=""></div> 
		</div>

</div>

		
</body>
</html>