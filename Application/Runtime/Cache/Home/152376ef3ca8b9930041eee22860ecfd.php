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

<script>
$(function(){
$.insideMove(0);
$.headerMove(248);    
})
</script>

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



<!---------------------------------内页导航-------------------------------------->
<div class="insideTitle">
    <div class="container">
    	<div class="title">
        	<span>模板详情</span>
        	<span>Template Details</span>
        </div>
        <div class="sideBox clearfix">
            <ul class="insideMenu clearfix">

				<li><a href="/Details/index/id/<?php echo ($list["id"]); ?>">模板详情</a></li>
            </ul>
            <div class="borderTop"></div>
        </div>
    </div>
</div>
<!---------------------------------内页导航---end------------------------------------>
<!-------------------------------header----end---------------------------------------->
<!-------------------------------container-------------------------------------------->
<div class="container" style="margin: 30px auto;">
	<div class="mbIntro">
        <div class="mb_title">网站简介</div>
        <div class="checkedMB clearfix">
        	<div class="checkedImg">
                <div class="imgBox">
            	   <img src="<?php echo ($list["img"]); ?>">
                </div>
            </div>
            <div class="checkedType">
                <div class="webType">
                    模板名称：<?php echo ($list["title"]); ?>
                </div>
                <div class="webNum">
                    产品编号：<?php echo ($list["mode"]); ?>
                </div>
                <div class="webColor">
                    颜色分类：<?php echo ($list["color"]); ?>
                </div>
                <div class="webClass">
                    应用分类：<?php echo ($list["appcat"]); ?>
                </div>
                <div class="webTrade">
                    行业分类：<?php echo ($cat_list["title"]); ?>
                </div>
                <div class="webKeyWord clearfix">
                    <div class="keyTil">
                        模板关键词：
                    </div>
                    <div class="keyWord clearfix">
                        <?php if(is_array($list['tag'])): foreach($list['tag'] as $key=>$v): ?><a href="#"><?php echo ($v); ?></a><?php endforeach; endif; ?>

                    </div>
                </div>
                <div class="btnBox clearfix">
                    <div class="preview">
                        <i class="icon-eye-open icon-white"></i>
                        <i class="icon-eye-open icon-white icon-transition"></i>
                        <a href="<?php echo ($list["link"]); ?>" target="_blank">在线预览</a>
                    </div>  
                    <div class="manage">
                        <i class="icon-user icon-white"></i>
                        <i class="icon-user icon-white icon-transition"></i>
                        <a href="javasript:;">后台预览</a>
                    </div>
                    <div class="trial" onclick="alertB('.alertShi')">
                        <i class="icon-star icon-white"></i>
                        <i class="icon-star icon-white icon-transition"></i>
                        <a href="javasript:;">试用体验</a>
                    </div>
                    <div class="setting" onclick="alertB('.alertJian')">
                        <i class="icon-fire icon-white"></i>
                        <i class="icon-fire icon-white icon-transition"></i>
                        <a href="javasript:;">免费建站</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="process">
            <div class="mb_title" style="margin:40px 0 10px 0;text-align:center;">建站流程</div>
            <img class="fuwuqi" src="/Public/site/img/fuwuqi.png">
            <img class="yuming" src="/Public/site/img/yuming.png">
            <img class="duijie" src="/Public/site/img/duijie.png">

            <div class="arrowBox clearfix">
                <div class="arrow arrow-middle">网<br/>站<br/>前<br/>台</div>
            </div>
            <div class="step step_1">
                <p>在免费网站市场选定网站样式，并将网站编号提供给客服人员。</p>
            </div>
            <div class="arrowBox clearfix">
                <div class="arrow arrow-left pull-left">域<br/>名</div>
                <div class="arrow arrow-right pull-right">域<br/>名</div>
            </div>
            <div class="left">
                <div class="step step_2">
                    <p>申请建站者自己提供域名。</p>
                </div>
            </div>
            <div class="right">
                <div class="step step_2">
                    <p>购买泡椒域名。
                        <div><a class="yellow-btn buy-btn" href="http://www.pojiaoidc.com/services/domain/" target="_blank" rel="nofollow">前去购买</a></div>
                    </p>
                </div>
            </div>
            <div class="arrowBox clearfix" style="margin-top:40px;">
                <div class="arrow arrow-left pull-left" style="line-height:26px;">服<br/>务<br/>器</div>
                <div class="arrow arrow-right pull-right" style="line-height:26px;">服<br/>务<br/>器</div>
            </div>
            <div class="left">
                <div class="step step_2">
                    <p>自己提供服务器。</p>
                </div>
            </div>
            <div class="right">
                <div class="step step_2">
                    <p>购买泡椒服务器。
                    <div><a href="http://www.pojiaoidc.com/services/webhosting/twhost.asp" target="_blank" rel="nofollow" class="yellow-btn buy-btn" href="#">前去购买</a></div>
                    </p>
                </div>
            </div>
            <div class="arrowBox clearfix" style="margin-top:40px;">
                <div class="arrow arrow-left pull-left" style="line-height:25px;">后<br/>期<br/>服<br/>务</div>
                <div class="arrow arrow-right pull-right" style="line-height:25px;">后<br/>期<br/>服<br/>务</div>
            </div>
            <div class="left">
                <div class="step step_2">
                    <p>由于建站申请人自己提供域名与空间，泡椒科技无法获得相应权限进行维护，故不提供后期任何维护服务。</p>
                </div>
            </div>
            <div class="right">
                <div class="step step_2">
                    <p>泡椒提供免费网站安全检测维护，网站前台、后台的修改等服务。
                        <div><input class="yellow-btn buy-btn" type="button" onclick="alertBox()" value="点击咨询"></div>
                    </p>
                </div>
            </div>
            <div class="arrowBox clearfix" style="margin-top:40px;">
                <div class="arrow arrow-left pull-left" style="line-height:18px;">技<br/>术<br/>对<br/>接</div>
                <div class="arrow arrow-right pull-right" style="line-height:18px;">技<br/>术<br/>对<br/>接</div>
            </div>
            <div class="left">
                <div class="step step_2">
                    <p>将建站申请人手中的域名空间与泡椒的前台、后台进去对接。</p>
                </div>
            </div>
            <div class="right">
                <div class="step step_2">
                    <p>对网站前台、域名、服务器、后台管理系统进行技术对接。</p>
                </div>
            </div>
            <div class="arrowBox clearfix">
                <div class="arrow arrow-middle">架<br/>设<br/>完<br/>成</div>
            </div>
            <div class="step step_1">
                <p>建站申请人进行网站检测并验收网站。</p>
                <div class="zixun"><input onclick="alertBox()" type="button" class="yellow-btn" value="咨询客服"></div>
            </div>
            
        </div>                
    </div>
</div>
<!-------------------------------container---end----------------------------------------->
<!-------------------------------试用体验弹层----------------------------------------->
<div class="alertShi hide">
    <div class="topClose" onclick="closeB('.alertShi')"></div>
    <div class="kaifa">模块开发中，敬请期待...</div>
    <div class="shenqing">请点击下方客服申请试用资格</div>
    <div class="qqBox clearfix">
        <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=839899344&amp;site=qq&amp;menu=yes"><img src="/Public/site/img/pa.gif">试用专员：小郭</a>
        <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=511734447&amp;site=qq&amp;menu=yes"><img src="/Public/site/img/pa.gif">试用专员：小郑</a>
    </div>
</div>
<!-------------------------------免费建站弹层----------------------------------------->   
<div class="alertJian hide">
    <div class="topClose" onclick="closeB('.alertJian')"></div>  
    <table>
        <tr>
            <td style="width:70px;">建站所需：</td>
            <td>域名、服务器、前台网页、后台管理系统、技术支持...</td>
        </tr>
        <tr>
            <td>泡椒提供</td>
            <td>免费网站、免费后台管理系统、免费技术建设、免费后期维护...</td>
        </tr>
        <tr>
            <td colspan="2" style="font-weight:bold;">马上申请免费建站,请联系下方客服专员。
            </td>
        </tr>
        <tr>
            <td class="qqs" colspan="2">
                <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=511734447&amp;site=qq&amp;menu=yes"><img src="/Public/site/img/pa.gif">试用专员：小郑</a>
                <a href="http://wpa.qq.com/msgrd?v=3&amp;uin=839899344&amp;site=qq&amp;menu=yes"><img src="/Public/site/img/pa.gif">试用专员：小郭</a>
            </td>
        </tr>
    </table>
</div>

<!----------------------------------fixMenu-------------------------------------------------------->
<div class="fixMenu">
	<div class="menuBox">
        <div class="onlineQQ fixBlock" onclick="alertBox();">
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
            <div class="service clearfix">客户服务中心<a class="closeA" onclick="closeBox()"></a></div>
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