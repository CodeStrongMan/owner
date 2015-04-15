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
<div id="wrap">

    <#list data.list as list>
            <div class="app">
                <p>
                    <strong>
                        ${list.title}
                    </strong>(${list.name})
                    [<a href="javascript:void(0);" onclick="onmol(this)" level="2" pid="${list.id}">添加控制器</a>]

                </p>
         <#list list.child as ar>
                <dl>
                        <dt>
                            <strong>${ar.title}</strong>
                            (${ar.name})
                            [<a href="javascript:void(0);" onclick="onmol(this)" level="3" pid="${ar.id}">添加方法</a>]
                        </dt>
                        <#list ar.child as br>
                            <dd>
                                <span>${br.title}</span>(${br.name})
                                [<a href="javascript:void(0);" onclick="onmol(this)" data-name='${br.name}' data-title='${br.title}' data-sort='${br.sort}' data-status='${br.statue}'   data-id="${br.id}" pid='${br.pid}' level='3'>修改</a>]
                                [<a href="javascript:void(0);" onclick='ondel(${br.id})'>删除</a>]
                            </dd>
                        </#list>
                 </dl>
                 </#list>
            </div>
        </#list>

    </div>
</#macro>
</script>
<script src="/Public/Js/pintuer.min.js" ></script>
<script>
var the_id;
var onmol = function(obj){  
    var pid      = $(obj).attr('pid');
    var level      = $(obj).attr('level');
    var name   = $(obj).attr('data-name');
    var title      = $(obj).attr('data-title');
    var sort     = $(obj).attr('data-sort');
    var status   = $(obj).attr('data-status');
    var id   = $(obj).attr('data-id');
    var tname = $('#tname');
    var ttitle    = $('#ttitle');
    $('input[name="level"]').val(level);
    $('input[name="pid"]').val(pid);
    $('input[name="name"]').val(name);
    $('input[name="title"]').val(title);
    $('input[name="sort"]').val(sort);
    $('input[name="id"]').val(id);
    if(status){
        $('.radio').find('input[value="1"]').attr('checked','checked');
    }else{
        $('.radio').find('input[value="0"]').attr('checked','checked');
    }
    var the_title = '';
    switch(level){
        case '1':
            the_title = '应用';
            tname.html('应用');
            ttitle.html('应用');
            break;
        case '2':
            the_title = '控制器';
            tname.html('控制器');
            ttitle.html('控制器');
            break;
        case '3':
            the_title = '方法';
            tname.html('方法');
            ttitle.html('方法');
            break;
    }


    the_id = $.layer({
        type: 1,
        title: the_title,
        maxmin: true,
        area: ['600px', '400px'],
        page: {dom: '.mol'},
        shift: 'left',      
    });     
}

var ondel = function(obj){
   $.layer({
        shade: [0],
        area: ['auto','auto'],
        dialog: {
            msg: '确定要删除吗？',
            btns: 2,                    
            type: 4,
            btn: ['确定','取消'],
            yes: function(){
                    var url = "/admin.php/User/delNode/do/del/id/"+obj;

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

var ajaxpage = function(obj){
    var dp = $(obj).attr('data-url');
    $(function(){
        var url      = "/admin.php/User/node/do/load";
        var the_load = layer.load(30);
        $.post(url,function(data,status){

            ETlist(data['list'],'#nan-list','#theTemplate');
            if(status=='success'){
                layer.close(the_load);
            }
        })
    })
}

ajaxpage()

$(function(){
    $('#thesubmit').bind('click',function(){
        var pid      = $('input[name="pid"]').val();
        var level      = $('input[name="level"]').val();
        var id      = $('input[name="id"]').val();
        var name      = $('input[name="name"]').val();
        var title      = $('input[name="title"]').val();
        var status      = $('input[name="status"]').val();
        var sort      = $('input[name="sort"]').val();

        var obj     = this;
        var url     = '/admin.php/User/addNode';
        var data    = 'id='+id+'&name='+name+'&title='+title+'&status='+status+'&sort='+sort+'&pid='+pid+'&level='+level;

        $.post(url,data,function(data){

            switch(parseInt(data)){
            
                case 1:
                    layer.msg('节点添加成功',1,{type:1,shade:false,rate:'left'});
                    layer.close(the_id);
                    ajaxpage(); 
                    break;
                case 2:
                    layer.msg('节点添加失败',1,{type:2,shade:false,rate:'left'});
                    break;
                case 3:
                    layer.msg('节点修改成功',1,{type:1,shade:false,rate:'left'});
                    layer.close(the_id);
                    ajaxpage();
                    break;
                case 4:
                    layer.msg('节点修改失败',1,{type:2,shade:false,rate:'left'});
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
   


<div class="dux-bread">
        <ul class="bread">
            <li><a href="#" class="icon-home"> 开始</a></li>
            <li><a href="#">节点列表</a></li>
        </ul>
    </div>
    <div class="dux-admin">
        <div class="dux-tools">
            <div class="bread-head">节点管理<span class="small">添加节点</span></div>
            <br>
            <div class="tools-function clearfix">

                <div class="button-group float-right">
                    <button onclick="onmol(this)" class="button button-small bg-dot icon-plus" level='1' pid='0'> 添加应用 </button> 
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
         <div class="nan-leb"><span id="tname"></span>名称：</div> 
         <div><input class="input nan-input-3"  type="text" name="name"></div> 
        </div>
        <div class="line-big moform">
         <div class="nan-leb"><span id="ttitle"></span>描述：</div> 
         <div><input class="input nan-input-2" type="text" name="title"></div> 
        </div>
        <div class="line-big moform">
         <div class="nan-leb">是否开启：</div> 
         <div>
            <div class="button-group radio">
              <label class="button active"><input name="status" value="1" checked="checked" type="radio"><span class="icon icon-check text-green"></span> 开启</label>
              <label class="button"><input name="status" value="0" type="radio"><span class="icon icon-times"></span> 关闭</label>
            </div>
        </div> 
        </div>
        <div class="line-big moform">
         <div class="nan-leb">排序：</div> 
         <div><input class="input nan-input-2" type="text" name="sort" value='1'></div> 
        </div>
        

        <div class="line-big moform nan-but">
         <div><input class="button border-green nan-input-1" type="submit" value='提交' id="thesubmit"></div>&nbsp;&nbsp;&nbsp;&nbsp;
         <div><input class="button border-red nan-input-1" type="reset" value='重置'></div> 
         <div><input type="hidden" name="pid" value=""></div> 
         <div><input type="hidden" name="level" value=""></div> 
         <div><input type="hidden" name='id' value="0"></div>
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