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
<form method="post" action="/admin.php/Cmsmanager/goods_post" enctype="multipart/form-data">
<div class="nbsp_40"> </div>
<div class="clearfix nan-inline" >
	<label>产品分类</label>
	<select name="code" class="input wid_300">
		<option value="0">选择分类...</option>
		<?php foreach($cat_list as $v){?>
		<option value="<?php echo ($v["code"]); ?>" <?php if($v[code]==$item[code]){echo "selected";}?>><?php echo ($v["title"]); ?></option>
		<?php }?>
	</select>
</div>
<div class="clearfix nan-inline" >
	<label>模板型号</label>
	<input type="text" name="mode" value="<?php echo ($item["mode"]); ?>" class="input nan-the-input wid_200"  />
</div>
<div class="clearfix nan-inline" >
	<label>模板标题</label>
	<input type="text" name="title" value="<?php echo ($item["title"]); ?>" class="input nan-the-input wid_300"  />
</div>
<div class="clearfix nan-inline" >
	<label>模板类型</label>
	<select class="input wid_300" name='type'>
		<option value='1' <?php if($item["type"]==1): ?>selected<?php endif; ?>>中文模板</option>
		<option value='2' <?php if($item["type"]==2): ?>selected<?php endif; ?>>英文模板</option>
		<option value='3' <?php if($item["type"]==3): ?>selected<?php endif; ?>>商城模板</option>
	</select>
</div>
<div class="clearfix nan-inline" >
	<label>模板颜色</label>
	<input type="text" name="color" value="<?php echo ($item["color"]); ?>" class="input nan-the-input wid_200"  />
</div>
<div class="clearfix nan-inline" >
	<label>应用分类</label>
	<input type="text" name="appcat" value="<?php echo ($item["appcat"]); ?>" class="input nan-the-input wid_200"  />
</div>
<div class="clearfix nan-inline" >
	<label>标　　签</label>
	<input type="text" name="tag" value="<?php echo ($item["tag"]); ?>" class="input nan-the-input wid_300"  />
	<b style="font-size:18px;color:red;">　　标签请用“/”隔开,例如：“机电/仪器/设备”</b>
</div>
<div class="clearfix nan-inline" >
	<label>试用链接</label>
	<input type="text" name="link" value="<?php echo ($item["link"]); ?>" class="input nan-the-input wid_300"  />
</div>


<div class="clearfix nan-inline" >
	<label>产品首图</label>
    <input size="100" type="file" name="img" class="input nan-the-input wid_300" />
</div>


<div class="clearfix nan-inline" >
	<input type="submit" class="button bg-main wid_80 nan_left " value="提交" onclick="disClick(this);">
	<input type="reset" class="button bg-dot wid_80" value="重置">
	<input type="hidden" name="id" value="<?php echo ($item["id"]); ?>"/>
</div>

</form>


		
</body>
</html>