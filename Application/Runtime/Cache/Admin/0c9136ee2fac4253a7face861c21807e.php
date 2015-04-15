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
    
<body style="background-color:#EFF3F6;">
<form method="post" action="/admin.php/Cmsmanager/article_post">
<div class="nbsp_40"> </div>
<div class="clearfix nan-inline" >
	<label>文章分类</label>
	<select name="cat_id" class="input wid_300">
		<option value="0">分类名称</option>
		<?php foreach($cat_list as $v){?>
		<option value="<?php echo ($v["id"]); ?>" <?php if($v['id']==$item[cat_id]){echo 'selected';}?>><?php echo ($v["lev"]); echo ($v["title"]); ?></option>
		<?php }?>
	</select>
</div>
<div class="clearfix nan-inline" >
	<label>文章标题</label>
	<input type="text" name="title" value="<?php echo ($item["title"]); ?>" class="input nan-the-input wid_300"  />
</div>
<div class="clearfix nan-inline" >
	<label>文章内容</label>
	<textarea id="container" name="content" class="ueditor" style="width:700px;height:200px;"><?php echo ($item["content"]); ?></textarea>
</div>
<div class="clearfix nan-inline" >
	<input type="submit" class="button bg-main wid_80 nan_left " value="提交" onclick="disClick(this);">
	<input type="reset" class="button bg-dot wid_80" value="重置">
	<input type="hidden" name="id" value="<?php echo ($item["id"]); ?>"/>
</div>
</form>

<script type="text/javascript" src="/Public/ue/ueditor.config.js"></script>
    <script type="text/javascript" src="/Public/ue/ueditor.all.js"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
		
</body>
</html>