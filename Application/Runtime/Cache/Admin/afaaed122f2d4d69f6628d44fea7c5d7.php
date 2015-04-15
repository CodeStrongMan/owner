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
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
</script>
<body style="background-color:#EFF3F6;">
<form method="post" action="/admin.php/Cmsmanager/link_post" enctype="multipart/form-data">
<div class="nbsp_40"> </div>
<div class="clearfix nan-inline" >
	<label>链接分类</label>
	<select name="code" class="input wid_300">
		<option value="0">选择分类...</option>
		<?php foreach($cat_list as $v){?>
		<option value="<?php echo ($v["code"]); ?>" <?php if($v[code]==$item[code]){echo "selected";}?>><?php echo ($v["title"]); ?></option>
		<?php }?>
	</select>
</div>
<div class="clearfix nan-inline" >
	<label>链接标题</label>
	<input type="text" name="title" value="<?php echo ($item["title"]); ?>" class="input nan-the-input wid_300"  />
</div>
<div class="clearfix nan-inline" >
	<label>链接地址</label>
	<input type="text" name="link" value="<?php echo ($item["link"]); ?>" class='input nan-the-input wid_300'>	
</div>
<div class="clearfix nan-inline" >
	<label>排　　序</label>
	<input type="text" name="sort" value="<?php echo ($item["sort"]); ?>" class='input nan-the-input wid_100'>	
</div>
<div class="clearfix nan-inline" >
	<label>链接Logo</label>
	<input type="file" name="thumb_img" class='input nan-the-input wid_300'>	
</div>
<div class="clearfix nan-inline" >
	<label>链接简介</label>
	<textarea name="content" class='input nan-the-input wid_300'><?php echo ($item["content"]); ?></textarea>
</div>
<div class="clearfix nan-inline" >
	<input type="submit" class="button bg-main wid_80 nan_left " value="提交">
	<input type="reset" class="button bg-dot wid_80" value="重置">
	<input type="hidden" name="id" value="<?php echo ($item["id"]); ?>"/>
</div>
</form>


		
</body>
</html>