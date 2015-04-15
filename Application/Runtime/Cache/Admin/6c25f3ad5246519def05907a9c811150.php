<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="/Public/Css/admin.css" />
        <script src="/Public/Js/jquery-1.7.2.min.js"></script>
    <script>
        $(function(){
            $('input[level=1]').click(function(){
                var inputs = $(this).parents('.app').find('input');
                $(this).attr('checked')? inputs.attr('checked','checked') : inputs.removeAttr('checked');
            })
           $('input[level=2]').click(function(){
                var thedl = $(this).parents('dl').find('input');
                $(this).attr('checked')?thedl.attr('checked','checked'):thedl.removeAttr('checked');
            })
        })

           
    </script>
</head>
<body>
    <form action="<?php echo U('User/setAccess');?>" method='post'>
    <div id="wrap">
        <?php if(is_array($node)): foreach($node as $key=>$v): ?><div class="app">
                <p>
                    <strong>
                        <?php echo ($v["title"]); ?>
                    </strong>(<?php echo ($v["name"]); ?>)
                    <input type="checkbox" name='access[]' value='<?php echo ($v["id"]); ?>_1' level='1' <?php if($v["access"]): ?>checked="checked"<?php endif; ?>/>
                </p>
                <?php if(is_array($v["child"])): foreach($v["child"] as $key=>$vo): ?><dl>
                        <dt>
                            <strong><?php echo ($vo["title"]); ?></strong>(<?php echo ($vo["name"]); ?>)
                            <input type="checkbox" name='access[]' value='<?php echo ($vo["id"]); ?>_2' level='2' <?php if($vo["access"]): ?>checked="checked"<?php endif; ?>/>
                        </dt>
                        <?php if(is_array($vo["child"])): foreach($vo["child"] as $key=>$value): ?><dd>
                                <span><?php echo ($value["title"]); ?></span>(<?php echo ($value["name"]); ?>)
                                <input type="checkbox" name='access[]' value='<?php echo ($value["id"]); ?>_3' level='3' <?php if($value["access"]): ?>checked="checked"<?php endif; ?>/>
                            </dd><?php endforeach; endif; ?>
                    </dl><?php endforeach; endif; ?>
            </div><?php endforeach; endif; ?>
    </div>
    <input type="hidden" name='rid' value="<?php echo ($rid); ?>"/>
    <input type="submit"  value='保存提交' style='width:100px;height:50px;display:block;margin:20px auto;cursor:pointer;font-size:20px;font-weight:bold;' />
    </form>
</body>
</html>