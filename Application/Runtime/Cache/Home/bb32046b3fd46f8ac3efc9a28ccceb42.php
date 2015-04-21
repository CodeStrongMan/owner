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
$.headerMove(248);
$.insideMove(1);
});
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



<!---------------------------------内页导航--------------------------------------->
<div class="insideTitle">
    <div class="container">
    	<div class="title">
        	<span>网站托管</span>
        	<span>website</span>
        </div>
        <div class="sideBox clearfix">
            <ul class="insideMenu clearfix">
                <li><a href="/Siteprice/index">网站定制</a></li>
            	<li><a href="/Siteprice/index">网站托管</a></li>
            </ul>
            <div class="borderTop"></div>
        </div>
    </div>
</div>
<!---------------------------------内页导航---end------------------------------------>
<!-------------------------------------header--end---------------------------------------------->
<!-------------------------------container-------------------------------------------->
<div class=container>
	<div class="deposit">
    	<div class="problem">
        	<p class="text01"><span>在<b>网站运营</b>过程中</span><br/>您曾有过以下困惑么？</p>
            <ul>
            	<li>没精力，没时间</li>
                <li>找不到团队，人员流失</li>
                <li>周期长，走弯路，没效果</li>
                <li>营销成本高，推广技术停止落后</li>
            </ul>
        </div>
        <div class="title">泡椒科技————网站运营服务商，拿效果说话</div>
        <div class="start clearfix">
            <div class="left pull-left">
            	<img src="/Public/site/img/deposit_start.jpg">
            </div>
            <div class="right pull-left">
            	<div class="start_now clearfix">
					<a href="#" class="start_btn"></a>
                    <p><span><b>三个月</b>让您的</span><br/><span>网络营销<b>即可启动</b></span></p>   
                </div>
                <ul>
                	<li class="clearfix">
                    	<span>短</span>
                        <span>周期短，节约时间成本</span>
                    </li>
                    <li class="clearfix">
                    	<span>平</span>
                        <span>效果好，而且持续平稳</span>
                    </li>
                    <li class="clearfix">
                    	<span>快</span>
                        <span>见效快速，大量客户网站运营<br/>第一天接到询盘</span>
                    </li>
                </ul>         
            </div>
        </div>
        <div class="title">泡椒科技————网站运营服务商，拿效果说话</div>
        <div class="project clearfix">
        	<div class="left pull-left clearfix">
            	<div class="left_top clearfix">
                    <div class="fixed pull-left">
                        <div class="project_title clearfix">
                            <img src="/Public/site/img/project_01.png">
                            <span>定位</span>
                        </div>
                        <div class="desc">单人咨询专家为您提供</div>
                        <ul class="detail">
                            <li>盈利模式定位</li>
                            <li>目标客户定位</li>
                            <li>核心产品定位</li>
                            <li>核心竞争力定位</li>
                            <li>品牌差异定位</li>
                            <li>关键词定位</li>
                        </ul>
                    </div>
                    <div class="jianzhan pull-left">
                        <div class="project_title clearfix">
                            <img src="/Public/site/img/project_02.png">
                            <span>建站</span>
                        </div>
                        <ul class="detail">
                            <li>价值39800元的高级营销型网站一个</li>
                            <li>由项目总监亲自策划</li>
                            <li>高级设计师担当设计</li>
                            <li>万网G1空间一个</li>
                            <li>.com域名一个</li>
                            <li>Talk99使用一年</li>
                        </ul>
                    </div>
                </div>
                <div class="left_bottom clearfix">
                    <div class="paojiao pull-left"><img src="/Public/site/img/project_pj.png"></div>
                    <div class="train pull-left">
                    	<div class="project_title clearfix">
                            <img src="/Public/site/img/project_04.png">
                            <span>培训</span>
                        </div>
                    	<ul class="detail">
                            <li>客服主管培训</li>
                            <li>Talk99操作培训</li>
                            <li>营销型网站后台培训</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="right pull-left">
            	<div class="project_title clearfix">
                    <img src="/Public/site/img/project_03.png">
                    <span>推广</span>
                </div>
                <div class="desc">百度自然排名</div>
                <ul class="detail">
                    <li>15个精准关键词排名首页</li>
                    <li>定制关键词筛选表格</li>
                    <li>45篇高端新闻稿发布</li>
                    <li>45篇高质量的站内更新</li>
                    <li>15篇关键词转换页撰写</li>
                </ul>
                <div class="desc">百度竞价推广</div>
                <ul class="detail">
                    <li>1000个以上的优质关键词</li>
                    <li>5个以上计划，15个以上的单元</li>
                    <li>45条以上的创意</li>
                    <li>8个百度优惠页面设计</li>
                    <li>10个百度附加创意</li>
                </ul>
            </div>
        </div>
        <div class="title">泡椒科技————网站运营服务商，拿效果说话</div>
        <div class="advantage clearfix">
        	<div class="items">
            	<div class="sheng">省心</div>
                <div class="sheng_detail">定位、建站、推广、培训<br/><span>全程服务</span></div>
            </div>
            <div class="items">
            	<div class="sheng">省钱</div>
                <div class="sheng_detail">人工、办公、管理、培训<br/><span>"0"成本，低投入安心90天</span></div>
            </div>
            <div class="items">
            	<div class="sheng">专业</div>
                <div class="sheng_detail">单人咨询、牛商网专门研发团队，<span>实时研究最新技术</span></div>
            </div>
            <div class="items">
            	<div class="sheng">高效</div>
                <div class="sheng_detail">为你打造最佳方案，<span>3个月内，获得大量网络询盘</span></div>
            </div>
            <div class="items" style="margin:0;">
            	<div class="sheng">可靠</div>
                <div class="sheng_detail"><span>近百位</span>技术精英为您服务</div>
            </div>
        </div>
        <div class="compute clearfix">
        	<div class="compute_title clearfix">
            	<span><img src="/Public/site/img/compute.png"></span>
                <span>不算不知道</span>
                <span>一算吓一跳</span>
                <i>企业独立运营网站一个月的费用</i>
            </div>
            <div class="left pull-left">
            	<ul>
                	<li class="clearfix">
                    	<span>一个季度工资</span>
                        <span>49500</span>
                    </li>
                    <li class="clearfix">
                    	<span>网站营销定位</span>
                        <span>5000</span>
                    </li>
                    <li class="clearfix">
                    	<span>营销网站一个</span>
                        <span>39800</span>
                    </li>
                    <li class="clearfix">
                    	<span>关键词表格</span>
                        <span>5000</span>
                    </li>
                    <li class="clearfix">
                    	<span>TALK99三个坐席</span>
                        <span>3090</span>
                    </li>
                    <li class="clearfix">
                    	<span>G1空间1年时间</span>
                        <span>1980</span>
                    </li>
                    <li class="clearfix">
                    	<span>.com国际域名</span>
                        <span>139</span>
                    </li>
                    <li class="clearfix">
                    	<span>高端软文发布</span>
                        <span>11700</span>
                    </li>
                    <li class="clearfix">
                    	<span>客服系统搭建、培训</span>
                        <span>5000</span>
                    </li>
                    <li class="clearfix">
                    	<span>关键词转换页</span>
                        <span>30000</span>
                    </li>
                    <li class="clearfix">
                    	<span>合计</span>
                        <span>151209</span>
                    </li>
                </ul>
            </div>
            <div class="middle_shadow pull-left"><img src="/Public/site/img/middle_shadow.png"></div>
            <div class="right pull-left">
            	<ul>
                	<li class="clearfix">
                    	<span>岗位名</span>
                        <span>工资</span>
                    </li>
                    <li class="clearfix">
                    	<span>SEO</span>
                        <span>5000</span>
                    </li>
                    <li class="clearfix">
                    	<span>竞价</span>
                        <span>3500</span>
                    </li>
                    <li class="clearfix">
                    	<span>编辑</span>
                        <span>3500</span>
                    </li>
                    <li class="clearfix">
                    	<span>设计师</span>
                        <span>4500</span>
                    </li>
                    <li class="clearfix">
                    	<span>每月工资合计</span>
                        <span>16500</span>
                    </li>
                </ul>
                <div class="remark">
                	<div>备注</div>
                    <div>以上成本不包括<span>招聘成本培训成本、管理成本、时间成本</span>等</div>
                </div>
            </div>
        </div>
        <div class="title">
        	<span style="margin-left:170px;">选择泡椒————选择省心、放心、安心</span>
        	<input id="click_consult" onclick="alertBox()" class="zixun btn-success btn" type="button" value="点击咨询"/>
        </div>
	</div>
</div>

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