<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo ($site["site_keywords"]); ?>" />
<meta name="description" content="<?php echo ($site["site_description"]); ?>" />
<title><?php echo ($site["site_name"]); ?>-<?php echo ($site["site_short"]); ?></title>
<link href="/favicon.ico" rel="icon" type="image/x-icon" />
<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<link href="/favicon.ico" rel="bookmark" /> 
<link type="text/css" rel="stylesheet" href="/Public/site/css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="/Public/site/css/style.css">

<!-- <link type="text/css" rel="stylesheet" href="/Public/site/css/style.min.css"> -->
<script type="text/javascript" src="/Public/site/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/Public/site/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/Public/site/js/selectivizr-min.js"></script>
<script type="text/javascript" src="/Public/site/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="/Public/site/js/PJ.min.js"></script>
<script type="text/javascript" src="/Public/Js/layer/layer.min.js"></script>

</head>

<body>

<!-------------------------------header-------------------------------------------->
<div class="header">
	<div class="headerContainer">
    	<div class="topNav">
        	<ul class="clearfix">
            	<li>
                	<a href="/">
                    	<img src="/Public/site/img/logo.png">
                    </a>
                </li>
                <li class="clearfix navList">
                	<div class="list-menu">
                    	<a class="one-menu" href="/">首 页</a>
                    </div>   
             	<?php foreach($res as $v){?>
                    <div class="list-menu"> 
                    	<a class="one-menu" href="<?php echo U($v['link']);?>"><?php echo ($v["title"]); ?></a>     
                    	<?php foreach($v['content'] as $val){?>
                        <a class="two-menu" href='<?php echo ($val["1"]); ?>'><?php echo ($val["0"]); ?></a>
                        <?php }?>
                    </div>			
			<?php }?>

                </li>
                <li class="loginLi hide">
                	<a href="javascript:;">登录</a>
                    <a href="javascript:;">注册</a>
                </li>
                <li class="logged clearfix hide">
                	<div class="user">
                		<a href="#" class="user_name">138****5916</a>
                        <div class="user_tipBox">
                        	<a href="#"><i class="icon-user icon-white"></i> 用户中心</a>
                            <a href="#"><i class="icon-cog icon-white"></i> 账号设置</a>
                            <a href="#"><i class=" icon-arrow-right icon-white"></i> 退出登录</a>
                        </div> 
                    </div>
                    <div class="time">上午好！</div>
                </li>

            </ul>
        </div>
    </div>
</div>




<!-------------------------------------首页焦点图------------------------------------------------>
<div class="indexFocus">
	<ul>
    	  <li><img class="Ifocus" src="/Public/site/img/1.jpg"><img class="textImg" style="top:180px;margin-left:-410px;" src="/Public/site/img/2zi.png"></li>
        <li><img class="Ifocus" src="/Public/site/img/2.jpg"><img class="textImg" src="/Public/site/img/4zi.png" style="width:700px;"></li>
        <li><img class="Ifocus" src="/Public/site/img/3.jpg"><img class="textImg" src="/Public/site/img/5zi.png" style="width:700px;"></li>
    </ul>
    <div class="buttons">
    	<span class="arrow on"></span>
        <span class="arrow"></span>
        <span class="arrow"></span>
    </div>
</div>
<!-------------------------------------首页焦点图--end----------------------------------------------->
<!------------------------------------conatiner-------------------------------------------------->
<div class="container">
    <div class="index_tem freeTem">
        <div class="tem_title clearfix"><span>免费PC网站</span>
            <a href="<?php echo U('Product/index');?>" class="more"></a>
        </div>
       
        <div class="temBox">
            <ul class="clearfix">
            	<?php if(is_array($hotGoods)): foreach($hotGoods as $key=>$vo): ?><li>
                    <a class="webImg" href='<?php echo U("Details/index",array("id"=>$vo["id"]));?>'><img src="<?php echo ($vo["img"]); ?>"></a>
                    <div class="webType"><a href='<?php echo U("Details/index",array("id"=>$vo["id"]));?>'><?php echo ($vo["title"]); ?></a></div>
                </li><?php endforeach; endif; ?>
            </ul>
        </div>
    </div>
    <div class="indexMobile">
        <div class="mo_title clearfix"><span>免费手机网站</span>
            <a href="#" class="more"></a>
        </div>
        <div class="mobile_box">
            <ul class="mobile_web clearfix">
                <li>
                    <a class="mobile_img" href="#">
                        <img src="/Public/site/img/phonePic.png">
                    </a>
                    <a class="mobile_title" href="#">精品手机模板1</a>
                </li>
                <li>
                    <a class="mobile_img" href="#">
                        <img src="/Public/site/img/20150409135116.png">
                    </a>
                    <a class="mobile_title" href="#">精品手机模板2</a>
                </li>
                <li>
                    <a class="mobile_img" href="#">
                        <img src="/Public/site/img/20150409135232.png">
                    </a>
                    <a class="mobile_title" href="#">精品手机模板3</a>
                </li>
                <li>
                    <a class="mobile_img" href="#">
                        <img src="/Public/site/img/20150409135245.png">
                    </a>
                    <a class="mobile_title" href="#">精品手机模板4</a>
                </li>
                <li>
                    <a class="mobile_img" href="#">
                        <img src="/Public/site/img/20150409135254.png">
                    </a>
                    <a class="mobile_title" href="#">精品手机模板5</a>
                </li>
            </ul>
        </div>
        <div class="mobile_arrow mobile_prev"></div>
        <div class="mobile_arrow mobile_next"></div>
    </div>
    <div class="newsWrapper clearfix">
    	<div class="left">
        	<div class="title clearfix">
                <div class="lTit">技术文章</div>
            </div>
            <div class="shadow"></div>
            <div class="newsBox">
            	<div class="companyNews">
                	<ul>
                	<?php foreach($result[1] as $val){?>
                    	<li>
                        	<a class="clearfix" href='<?php echo U("/Content/index/id/$val[id]");?>'>
                            	<span><?php echo ($val["title"]); ?></span>
                                <span><?php echo (date("Y-m-d",$val["dateline"])); ?></span>
                            </a>
                        </li>
 			<?php }?>
                    </ul>
                    <div class="newMore"><a href="<?php echo U('Information/index/cid/1');?>"></a></div>
                </div>
                
            </div>
        </div>
        <div class="left" style="float:right;border:0;padding-right:20px;">
            <div class="title clearfix">
                <div class="lTit">行业资讯</div>
            </div>
            <div class="shadow"></div>
            <div class="newsBox">
                <div class="tradeNews">
                    <ul>
                    <?php foreach($result[2] as $val){?>
                        <li>
                            <a class="clearfix" href='<?php echo U("/Content/index/id/$val[id]");?>'>
                                <span><?php echo ($val["title"]); ?></span>
                                <span><?php echo (date("Y-m-d",$val["dateline"])); ?></span>
                            </a>
                        </li>
            <?php }?>
                    </ul>
                    <div class="newMore"><a href="<?php echo U('Information/index/cid/2');?>"></a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!----------------------------------container--end------------------------------------------------>
<block>
    <script>
            //首页手机模板展示滚动
            var liWidth = $('.indexMobile .mobile_web li').outerWidth() + parseInt($('.indexMobile .mobile_web li').css('marginRight'));
            var liNum = $('.indexMobile .mobile_web li').length;
            var sumWidth = liWidth*liNum;
            $('.indexMobile .mobile_web').width(sumWidth);
        function mobileScroll(offset){
            if($('.indexMobile .mobile_web').is(':animated')==true){return;}
            var newLeft =  parseInt($('.indexMobile .mobile_web').css('marginLeft')) + offset;
            $('.indexMobile .mobile_web').animate({'marginLeft':newLeft},500,function(){
                var currentW = Math.abs(parseInt($('.indexMobile .mobile_web').css('marginLeft'))) + liWidth*4;
                if(currentW >= $('.indexMobile .mobile_web').outerWidth()){
                  $('.indexMobile .mobile_next').hide();  
                }else{
                  $('.indexMobile .mobile_next').show();   
                }
                if(Math.abs(parseInt($('.indexMobile .mobile_web').css('marginLeft')))>0){
                   $('.indexMobile .mobile_prev').show();  
                }else{
                   $('.indexMobile .mobile_prev').hide();   
                }   
            });
        };
        $('.indexMobile .mobile_next').click(function(){
            mobileScroll(-liWidth*4);
        });
        $('.indexMobile .mobile_prev').click(function(){
            mobileScroll(liWidth*4);
        })
        $('.indexMobile').mouseenter(function(){
            var currentW = Math.abs(parseInt($('.indexMobile .mobile_web').css('marginLeft'))) + liWidth*4;
            if(currentW >= $('.indexMobile .mobile_web').outerWidth()){
              $('.indexMobile .mobile_next').hide();  
            }else{
              $('.indexMobile .mobile_next').show();   
            }
            if(Math.abs(parseInt($('.indexMobile .mobile_web').css('marginLeft')))>0){
               $('.indexMobile .mobile_prev').show();  
            }else{
               $('.indexMobile .mobile_prev').hide();   
            }
         })
        $('.indexMobile').mouseleave(function(){
            $('.indexMobile .mobile_arrow').hide(); 
         })
    </script>

<!----------------------------------fixMenu-------------------------------------------------------->
<div class="fixMenu">
	<div class="menuBox">
        <div class="onlineQQ fixBlock">
        	<a style="cursor:pointer;" class="clearfix">
            	<img class="blockIcon" src="/Public/site/img/qqOnline.png">
            	<span class="blockTxt">在线咨询</span>
            </a>
        </div>
        <div class="backTop fixBlock">
        	<a href="javascript:;" class="clearfix">
            	<img class="blockIcon" src="/Public/site/img/gotop.png">
                <span class="blockTxt" ></span>
                <span class="blockTxt">返回顶部</span>
            </a>
        </div>
    </div>    
</div>
<!----------------------------------rightMenu---end----------------------------------------------------->
<!----------------------------------footer-------------------------------------------------------->
<div class="footer">
	<div class="topF">
    	<div class="content clearfix">
    		<?php foreach($res as $v){?>
            <ul>             
			<li><a href="<?php echo U($v['link']);?>"><?php echo ($v["title"]); ?></a></li>
            	<?php foreach($v['content'] as $val){?>
			<li><a href="<?php echo ($val["1"]); ?>"><?php echo ($val["0"]); ?></a></li>
            	<?php }?>
            </ul>
		<?php }?>

            <div class="wxCode"><img src="/Public/site/img/qrcode.png" width='113px' height='135px'></div>
        </div>
    </div>
<div class="middleF" style="display:none;">
    <div class="content clearfix">
        <div class="contactUs">
            <div class="title">
                联系我们
            </div>
            <div calss="UsBox clearfix">
                <div class="address">
                    <p>
                        地 址：浙江温州乐清市柳市镇柳市大厦10楼1005
                    </p>
                    <p>
                        总 机：0577 - 27802780
                    </p>
                    <p>
                        E-Mail：eshion@eshion.net
                    </p>
                    <p>
                        邮编：325604
                    </p>
                </div>
                <div class="QQserver">
                    <div class="phone">
                        <p>
                            业务咨询：分机808、805
                        </p>
                        <p>
                            售后服务：分机801、803、804
                        </p>
                    </div>
                    <div class="QQ clearfix">
                        <a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a><a href="#"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="shellUs"></div>
    </div>
</div>
<div class="bottomF">
    <div class="content clearfix">
       <div class="pull-left"> <?php echo ($site["site_copyright"]); ?></div>
       <!--<div class="pull-left" style="margin-top:8px;margin-left:10px;"><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254638729'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/stat.php%3Fid%3D1254638729%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));</script>
       </div>-->
       <div style="clear:both;">
           <a href="javascript:;"><img src="/Public/site/img/b1.gif"></a>
           <a href="javascript:;"><img src="/Public/site/img/b2.gif"></a>
           <a href="javascript:;"><img src="/Public/site/img/b3.gif"></a>
           <a href="javascript:;"><img src="/Public/site/img/b4.gif"></a>
       </div>
    </div>

</div>


    

</div>
<!--QQ弹窗-->
<div class="alert_QQservice">
    <div class="QQservice_box">
        <div class="QQ_title">
            <div class="service clearfix">客户服务中心<a class="closeA"></a></div>
        </div>
        <div class="content">
            <div class="tabbable">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab1" data-toggle="tab">售前咨询</a></li>
                    <li><a href="#tab2" data-toggle="tab">售后服务</a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab1">
                        <table class="table">
                            <tr>
                                <td class="theme" colspan="3">&gt;  客服</td>
                            </tr>
                            <?php if(is_array($onqq["serviceqq"])): foreach($onqq["serviceqq"] as $key=>$v): ?><tr>
                                <td>
                                    <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($v["1"]); ?>&site=qq&menu=yes">
                                    <span><img src="/Public/site/img/pa.gif"></span><span><?php echo ($v["0"]); ?></span>
                                    </a>
                                </td>
                            </tr><?php endforeach; endif; ?>


                        </table>
                    </div>
                    <div class="tab-pane" id="tab2">
                        <table class="table">
                            <tr>
                                <td class="theme" colspan="3">&gt;  售后技术</td>
                            </tr>
                            <?php if(is_array($onqq["skillqq"])): foreach($onqq["skillqq"] as $key=>$v): ?><tr>
                                <td>
                                        <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo ($v["1"]); ?>&site=qq&menu=yes">
                                    <span><img src="/Public/site/img/pa.gif"></span><span><?php echo ($v["0"]); ?></span>
                                    </a>
                                </td>
                                <td>7 x 24小时,为您处理技术问题</td>
                                
                            </tr><?php endforeach; endif; ?>
                        </table>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
<!----------------------------------footer---end---------------------------------------------------->
<!----------------------------------登录注册弹层---------------------------------------------------->
<div class="newUser hide" style="width:400px;position:fixed;left:50%;margin-left:-200px;top:50%;background:#FFF;z-index:1001;padding:20px;">
	<a href="#" class="close_btn"></a>
    <div class="tabbable"> <!-- Only required for left/right tabs -->
    	<ul class="nav nav-tabs">
    		<li class="active"><a href="#tab1" data-toggle="tab">登录</a></li>
   			<li><a href="#tab2" data-toggle="tab">注册</a></li>
    	</ul>
    	<div class="tab-content">
    		<div class="tab-pane active login" id="tab1">
    			<input type="text" class="user" placeholder="请输入您的邮箱或者手机" />
                <input type="password" class="password" placeholder="请输入您密码" />
                <div class="findP clearfix">
                	<label>
                		<input type="checkbox" />
                    	<span>自动登录</span>
                    </label>
                    <a class="forgetP" href="#">忘记密码</a>
                </div>
                <input class="sub_btn" type="button" value="登 录">
                <div class="comLogin clearfix">
                	<div class="comT">联合登录</div>
                    <div class="ways">
                    	<a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                    </div>
                </div>
    		</div>
    		<div class="tab-pane register" id="tab2">
   				<input class="account" type="text" placeholder="请输入您的手机号码" />
                <div class="tiptxt clearfix"><img src="/Public/site/img/wrong.png"><span></span></div>
                <input class="code" type="text" placeholder="短信验证码"/><input class="codeBtn" type="button" value="获取验证码" />
                <div class="tiptxt clearfix"><img src="/Public/site/img/wrong.png"><span></span></div>
                <input class="passW passW01" type="password" placeholder="请输入密码" />
                <div class="tiptxt clearfix"><img src="/Public/site/img/wrong.png"><span></span></div>
                <input class="passW passW02" type="password" placeholder="请再次输入密码" />
                <div class="tiptxt clearfix"><img src="/Public/site/img/wrong.png"><span></span></div>
                <input class="email" type="text" placeholder="请输入您的邮箱" />
                <div class="tiptxt clearfix"><img src="/Public/site/img/wrong.png"><span></span></div>
                <input class="nickname" type="text" placeholder="请输入用户昵称" />
                <div class="tiptxt clearfix"><img src="/Public/site/img/wrong.png"><span></span></div>
                <input class="sub_btn" type="button" value="注 册">
                <div class="comLogin clearfix">
                	<div class="comT">联合登录</div>
                    <div class="ways">
                    	<a href="#"></a>
                        <a href="#"></a>
                        <a href="#"></a>
                    </div>
                </div>
    		</div>
    	</div>
    </div>
</div>
<script>
$.headerMove(550);
//表单验证
$(function(){
    //注册账号输入框
     $('.newUser .register .account').focus(function(){
        $(this).next('.tiptxt').addClass('tip').css('visibility','visible').children('span').html('请填写您最常用的手机号码');
     });
    $('.newUser .register .account').blur(function(){
        var tel = $(this).val();
        var reg = /^1\d{10}$/;
         if (!reg.test(tel)) {
               $(this).addClass('wrong')
                .next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('手机格式不正确');
            return;
         }else{
              $(this).removeClass('wrong').addClass('right')
               .next('.tiptxt')
               .css('visibility','hidden')
               .removeClass('tip'); 
        }         
    });
    //注册验证码输入框
    $('.newUser .register .code').focus(function(){
       $(this).next().next('.tiptxt')
           .addClass('tip').css('visibility','visible')
           .children('span').html('请填写您收到的短信验证码');   
    });
    $('.newUser .register .code').blur(function(){
        var code = $(this).val();
        var reg = /^[0-9]\d{5}$/;
        if (!reg.test(code)) {
               $(this).addClass('wrong')
                .next().next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('验证码格式不正确');
            return;
         }else{
              $(this).removeClass('wrong').addClass('right')
                .next().next('.tiptxt')
               .css('visibility','hidden')
               .removeClass('tip'); 
        }      
        
    }) ;
    //注册密码输入框
    $('.newUser .tab-content .register .passW01').focus(function(){
      $(this).next('.tiptxt').addClass('tip').css('visibility','visible').children('span').html('请输入6-16位密码，区分大小写，不可包含空格');   
    });
    $('.newUser .tab-content .register .passW01').blur(function(){
        var passW = $(this).val();
        var reg = /^[a-zA-Z]{1}([a-zA-Z0-9]|[._]){5,19}$/;
        if(!reg.test(passW)){
            $(this).addClass('wrong')
                .next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('密码格式不正确');
                return;
        }else{
            $(this).removeClass('wrong').addClass('right')
               .next('.tiptxt')
               .css('visibility','hidden')
               .removeClass('tip')
               .children('span').html('');
        }  ;   
    });
    //注册密码再次输入
     $('.newUser .tab-content .register .passW02').focus(function(){
         $(this).next('.tiptxt').addClass('tip').css('visibility','visible').children('span').html('请再次输入密码'); 
     });
     $('.newUser .tab-content .register .passW02').blur(function(){
        if($(this).val()!==$('.newUser .tab-content .register .passW01').val()){
            $(this).addClass('wrong')
                .next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('两次输入密码不一致');
        }else if($(this).val()==''){
            $(this).addClass('wrong')
                .next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('请输入密码');
        }else{
          $(this).removeClass('wrong').addClass('right')
               .next('.tiptxt')
               .css('visibility','hidden')
               .removeClass('tip')
               .children('span').html('');  
        }
     });
    //注册邮箱验证
      $('.newUser .tab-content .register .email').focus(function(){
           $(this).next('.tiptxt').addClass('tip').css('visibility','visible').children('span').html('请填写您最常用的邮箱'); 
      })
    $('.newUser .tab-content .register .email').blur(function(){
        var email = $(this).val();
        var reg =  /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!reg.test(email)){
             $(this).addClass('wrong')
                .next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('邮箱格式不正确');
        }else{
             $(this).removeClass('wrong').addClass('right')
               .next('.tiptxt')
               .css('visibility','hidden')
               .removeClass('tip')
               .children('span').html('');
        }
    })
/*    //注册用户昵称
     $('.newUser .tab-content .register .nickname').focus(function(){
        $(this).next('.tiptxt').addClass('tip').css('visibility','visible').children('span').html('请填写您的用户昵称');     
     })
     $('.newUser .tab-content .register .nickname').blur(function(){
         var name = $(this).val();
         var reg = /[a-zA-Z0-9]{1,10}|[\u4E00-\uFA29]{1,5}/g;
         if(!reg.test(name)){
             $(this).addClass('wrong')
                .next('.tiptxt')
                .removeClass('tip')
                .css('visibility','visible')
                .children('span').html('昵称格式不正确');
         }else{
            $(this).removeClass('wrong').addClass('right')
               .next('.tiptxt')
               .css('visibility','hidden')
               .removeClass('tip')
               .children('span').html('');    
         }
     })*/
    //注册获取验证码点击
    $('.newUser .register .codeBtn').click(function(){
        var num = 60;//60秒可重发
        function goon(){
            var timer = setTimeout(function(){
            if(num>0){
             num = num - 1;
                 $('.newUser .register .codeBtn').attr('disabled','disabled').val('重新发送'+'('+num+')'); 
                goon();
                }else{
                    $('.newUser .register .codeBtn').removeAttr('disabled').val('获取验证码');
                    return;
                }
            },1000) 
        };
         goon();
    });
    
});
</script>

</body>
</html>