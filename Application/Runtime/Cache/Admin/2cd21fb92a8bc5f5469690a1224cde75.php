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
<form method="post" action="/admin.php/Alldata/serial_post">
<div class="nbsp_40"> </div>
<div class="clearfix nan-inline" >
	<label>关联银行卡</label>
	<select name="code" class="input wid_300">
		<?php if(is_array($cat)): foreach($cat as $key=>$v): ?><option value="<?php echo ($v["code"]); ?>"><?php echo ($v["bank"]); ?>--<?php echo ($v["bankusername"]); ?></option><?php endforeach; endif; ?>
	</select>
</div>
<div class="clearfix nan-inline" >
	<label>收　　　入</label>
	<input type="text" name="income" value="0.00" class="input nan-the-input wid_300"  />
</div>
<div class="clearfix nan-inline" >
	<label>支　　　出</label>
	<input type="text" name="expend" value="0.00" class="input nan-the-input wid_300"  />
</div>
<div class="clearfix nan-inline" >
	<label>关 联 成 员</label>
	<textarea style="width:700px;height:200px;" name="remark"></textarea>
</div>
<div class="clearfix nan-inline" >
	<input type="submit" class="button bg-main wid_80 nan_left " value="提交">
	<input type="reset" class="button bg-dot wid_80" value="重置">
</div>
</form>

		
</body>
</html>